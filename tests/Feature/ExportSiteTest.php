<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Vite;
use Tests\TestCase;

class ExportSiteTest extends TestCase
{
    use RefreshDatabase;

    private string $fixturePath;

    protected function setUp(): void
    {
        parent::setUp();

        $this->fixturePath = sys_get_temp_dir().'/vikomakss-export-'.bin2hex(random_bytes(8));
        File::ensureDirectoryExists($this->fixturePath.'/public/build/assets');
        File::ensureDirectoryExists($this->fixturePath.'/public/images');
        File::ensureDirectoryExists($this->fixturePath.'/storage/app');
        File::put($this->fixturePath.'/public/build/manifest.json', json_encode([
            'resources/css/app.css' => ['file' => 'assets/app.css', 'src' => 'resources/css/app.css', 'isEntry' => true],
            'resources/js/app.js' => ['file' => 'assets/app.js', 'src' => 'resources/js/app.js', 'isEntry' => true],
        ], JSON_THROW_ON_ERROR));
        File::put($this->fixturePath.'/public/build/assets/app.css', '@font-face{src:url("/build/assets/font.woff2")}');
        File::put($this->fixturePath.'/public/build/assets/font.woff2', 'font fixture');
        File::put($this->fixturePath.'/public/build/assets/app.js', 'console.log("preview");');
        File::put($this->fixturePath.'/public/images/example.svg', '<svg/>');
        File::put($this->fixturePath.'/public/favicon.svg', '<svg/>');
        File::put($this->fixturePath.'/public/index.php', '<?php echo "private backend";');
        File::put($this->fixturePath.'/public/hot', 'http://localhost:5173');
        File::put($this->fixturePath.'/public/.env', 'SECRET=do-not-export');

        $this->app->usePublicPath($this->fixturePath.'/public');
        $this->app->useStoragePath($this->fixturePath.'/storage');
        Vite::swap(new \Illuminate\Foundation\Vite);
    }

    protected function tearDown(): void
    {
        File::deleteDirectory($this->fixturePath);

        parent::tearDown();
    }

    public function test_exports_both_languages_with_project_modals_and_repository_relative_assets(): void
    {
        Project::factory()->featured()->create(['title' => ['lv' => 'Publisks projekts', 'en' => 'Public project']]);
        Project::factory()->draft()->create(['title' => ['lv' => 'Slepens projekts', 'en' => 'Private project']]);

        $this->artisan('site:export', ['--url' => 'https://nito112233.github.io/vikomakss/'])->assertSuccessful();

        $output = $this->fixturePath.'/storage/app/static-preview';

        foreach (PublicWebsiteTest::publicPages() as [$path, $locale, $heading]) {
            $html = File::get($output.($path === '/' ? '' : $path).'/index.html');
            $this->assertStringContainsString('<html lang="'.$locale.'">', $html);
            $this->assertStringContainsString($heading, $html);
            $this->assertStringContainsString('name="robots" content="noindex, nofollow"', $html);
            $this->assertStringNotContainsString('vikomakss.test', $html);
            $this->assertStringNotContainsString('localhost:5173', $html);
            $this->assertStringNotContainsString('Slepens projekts', $html);
        }

        $projects = File::get($output.'/en/projects/index.html');
        $this->assertStringContainsString('Public project', $projects);
        $this->assertStringContainsString('data-project-open=', $projects);
        $this->assertStringContainsString('https://nito112233.github.io/vikomakss/projekti', $projects);
        $this->assertStringContainsString('https://nito112233.github.io/vikomakss/build/assets/app.js', $projects);
        $this->assertStringContainsString('https://nito112233.github.io/vikomakss/images/legacy/saeima.jpg', $projects);
        $this->assertStringContainsString('url("https://nito112233.github.io/vikomakss/build/assets/font.woff2")', File::get($output.'/build/assets/app.css'));
        $this->assertFileExists($output.'/images/example.svg');
        $this->assertFileExists($output.'/favicon.svg');
        $this->assertFileExists($output.'/.nojekyll');
        $this->assertFileDoesNotExist($output.'/index.php');
        $this->assertFileDoesNotExist($output.'/.env');
        $this->assertFileDoesNotExist($output.'/hot');
        $this->assertDirectoryDoesNotExist($output.'/admin');
    }

    public function test_rejects_urls_with_a_query_or_credentials(): void
    {
        $this->artisan('site:export', ['--url' => 'https://example.com/preview?token=secret'])->assertFailed();
        $this->artisan('site:export', ['--url' => 'https://user:secret@example.com/preview'])->assertFailed();
        $this->assertDirectoryDoesNotExist($this->fixturePath.'/storage/app/static-preview');
    }

    public function test_a_failed_page_stops_the_export_and_removes_partial_output(): void
    {
        Route::get('en/about', fn () => response('Broken page', 500))->name('en.about');
        Route::getRoutes()->refreshNameLookups();

        $this->artisan('site:export', ['--url' => 'https://example.com/preview'])
            ->expectsOutput('Cannot export /en/about: HTTP 500')
            ->assertFailed();

        $this->assertFileDoesNotExist($this->fixturePath.'/storage/app/static-preview/index.html');
    }
}
