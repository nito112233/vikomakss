<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Vite;
use RuntimeException;

#[Signature('site:export {--url= : The full public preview URL, including the repository path}')]
#[Description('Export the public website and its assets to storage/app/static-preview')]
class ExportSite extends Command
{
    public function handle(Kernel $kernel): int
    {
        $baseUrl = rtrim((string) $this->option('url'), '/');

        if (! filter_var($baseUrl, FILTER_VALIDATE_URL)
            || ! in_array(parse_url($baseUrl, PHP_URL_SCHEME), ['http', 'https'], true)
            || preg_match('~[?#]~', $baseUrl)
            || parse_url($baseUrl, PHP_URL_USER) !== null
            || ! preg_match('~^(/[a-zA-Z0-9_-]+)*$~', parse_url($baseUrl, PHP_URL_PATH) ?? '')) {
            $this->error('Pass a full http(s) URL, for example --url=https://nito112233.github.io/vikomakss');

            return self::FAILURE;
        }

        if (! File::isFile(public_path('build/manifest.json'))) {
            $this->error('Build the frontend first with npm run build.');

            return self::FAILURE;
        }

        $outputPath = storage_path('app/static-preview');
        $originalRequest = app('request');
        $originalUrl = app('url');
        $originalLocale = app()->getLocale();
        $originalSessionDriver = config('session.driver');
        $originalDebug = config('app.debug');
        $originalHotFile = Vite::hotFile();

        URL::swap(clone $originalUrl);
        URL::useOrigin($baseUrl);
        URL::useAssetOrigin($baseUrl);
        config(['session.driver' => 'array', 'app.debug' => false]);
        Vite::useHotFile($outputPath.'/hot');

        File::ensureDirectoryExists($outputPath);
        File::cleanDirectory($outputPath);

        try {
            foreach (['lv', 'en'] as $locale) {
                foreach (['home', 'services', 'projects', 'about', 'contact'] as $page) {
                    $route = Route::getRoutes()->getByName($locale.'.'.$page);

                    if ($route === null) {
                        throw new RuntimeException('Missing public route: '.$locale.'.'.$page);
                    }

                    $path = trim($route->uri(), '/');
                    $request = Request::create($baseUrl.'/'.$path, 'GET', server: [
                        'SCRIPT_FILENAME' => public_path('index.php'),
                        'SCRIPT_NAME' => (parse_url($baseUrl, PHP_URL_PATH) ?? '').'/index.php',
                    ]);
                    $response = $kernel->handle($request);

                    if ($response->getStatusCode() !== 200) {
                        throw new RuntimeException('Cannot export /'.$path.': HTTP '.$response->getStatusCode());
                    }

                    $html = str_replace('<head>', '<head>'.PHP_EOL.'    <meta name="robots" content="noindex, nofollow">', $response->getContent());
                    $directory = $outputPath.($path === '' ? '' : '/'.$path);
                    File::ensureDirectoryExists($directory);
                    File::put($directory.'/index.html', $this->resolveCssUrls($html, $baseUrl));
                    $kernel->terminate($request, $response);
                    $this->line('Exported /'.$path);
                }
            }

            File::ensureDirectoryExists($outputPath.'/build');
            File::copyDirectory(public_path('build/assets'), $outputPath.'/build/assets');
            File::copyDirectory(public_path('images'), $outputPath.'/images');
            File::copy(public_path('favicon.svg'), $outputPath.'/favicon.svg');

            foreach (File::allFiles($outputPath.'/build/assets') as $file) {
                if ($file->getExtension() === 'css') {
                    File::put($file->getPathname(), $this->resolveCssUrls($file->getContents(), $baseUrl));
                }
            }

            File::put($outputPath.'/.nojekyll', '');
        } catch (RuntimeException $exception) {
            File::cleanDirectory($outputPath);
            $this->error($exception->getMessage());

            return self::FAILURE;
        } finally {
            config(['session.driver' => $originalSessionDriver, 'app.debug' => $originalDebug]);
            app()->instance('request', $originalRequest);
            URL::swap($originalUrl);
            Vite::useHotFile($originalHotFile);
            app()->setLocale($originalLocale);
        }

        $this->info('Public preview exported to '.$outputPath);

        return self::SUCCESS;
    }

    private function resolveCssUrls(string $content, string $baseUrl): string
    {
        return preg_replace_callback('~url\(([\"\']?)/(?!/)~', fn (array $matches): string => 'url('.$matches[1].$baseUrl.'/', $content);
    }
}
