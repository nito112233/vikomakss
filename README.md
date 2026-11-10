# Vikomakss

Local foundation for the new Vikomakss website: Laravel 13, Filament 5, and MySQL.
The first public version includes Home, Services, Projects, About and Contact in
Latvian (default) and English, with responsive navigation and a shared footer.
Filament remains at its initial login/dashboard setup; no project resource has
been added to the admin panel.

## Public website

| Page | Latvian | English |
| --- | --- | --- |
| Home | `/` | `/en` |
| Services | `/pakalpojumi` | `/en/services` |
| Projects | `/projekti` | `/en/projects` |
| About | `/par-mums` | `/en/about` |
| Contact | `/kontakti` | `/en/contact` |

Projects are stored in MySQL with translated JSON text fields, real archive photos,
optional technical data, categories and publication status. Each project has a detail
page. Category filters are normal links and work without JavaScript. Language
switching preserves the current page/project and selected category.

Six sample projects from the old website are already seeded. On a fresh checkout:

```sh
valet php artisan migrate
valet php artisan db:seed --class=ProjectSeeder
```

The seeder is repeatable by slug; rerunning it replaces the six sample records with
the archive data. It does not delete other projects or change admin accounts.

- Page templates: `resources/views/pages/`.
- Shared header/footer: `resources/views/layouts/site.blade.php`.
- Latvian and English copy: `lang/lv/site.php`, `lang/en/site.php`.
- Public styles and interactions: `resources/css/app.css`, `resources/js/app.js`.
- Company contact details: `config/website.php` (copied from the old site; confirm
  before a public launch).
- Image origins and licensing: `public/images/credits.json`.

Stock staff portraits are visibly labelled placeholders and have no invented staff
names. Stock architecture/technical photos are illustrative; project images come
from the old Vikomakss portfolio. The contact form validates inputs and prepares a
message in the visitor's own email app. It does not silently send messages or store
enquiries; outgoing server email can be implemented later.

## Requirements

- PHP 8.4+ with the usual Laravel extensions, including `pdo_mysql`, `intl`, and `zip`.
- Composer 2.
- Node.js compatible with Vite 8 (20.19+ or 22.12+), and npm.
- MySQL. The existing local server is at `127.0.0.1:3306`.

## Run on this Mac with Valet

The local URL is http://vikomakss.test, served directly by Valet. There is no need
to run `php artisan serve`.

The project requires PHP 8.4. The `.valetrc` file records this requirement; configure
Valet to use it for this site by running the following once in your own terminal:

```sh
cd /Users/dastinszvans/Sites/vikomakss
valet isolate php@8.4
```

Valet may ask for your Mac administrator password to configure PHP-FPM and restart
Nginx. Site isolation applies PHP 8.4 to Vikomakss while other sites retain their
existing PHP versions. On another machine, first park or link the project in Valet.
The `.valetrc` file alone does not activate site isolation.

Open:

- Public welcome page: http://vikomakss.test
- Filament admin: http://vikomakss.test/admin
- phpMyAdmin: http://pma.test

The local admin email is `admin@vikomakss.test`. Its generated password is in
`.local/admin-credentials.txt`, which is ignored by Git. This account exists only
in the current local database; it is not created automatically on other machines.

For terminal commands, use the site's PHP through Valet:

```sh
valet php artisan migrate:status
valet php artisan test
valet composer install
```

Alternatively, select PHP 8.4 for just your current terminal session:

```sh
export PATH="/opt/homebrew/opt/php@8.4/bin:$PATH"
```

Assets have already been built. When changing public CSS/JS, run `npm run dev` in a
second terminal, or rebuild once with `npm run build`. Filament's standard admin
assets are published by Composer and do not need a running Vite server.

## Check the installation

1. Open `/admin` while signed out. It should redirect to `/admin/login`.
2. Sign in using the local credentials. The Filament dashboard should appear.
3. Sign out and check that `/admin` requires login again.
4. In phpMyAdmin, select the `vikomakss` database and browse `users`. There should
   be one local admin with `is_admin = 1`; the password is stored as a hash.
5. Inspect `migrations`: all five migrations should have run. A browser login also
   creates a row in `sessions`, because sessions are stored in MySQL.
6. Run the checks below with PHP 8.4 selected:

```sh
php artisan migrate:status
php artisan db:show
php artisan test
npm run build
```

The tests cover all public pages in both languages, published project visibility,
category filters, translated project details, repeatable seeding, and admin access. Automated tests use a
separate in-memory SQLite database as configured in `phpunit.xml`; they do not
reset the local MySQL database. The MySQL connection and migrations can be checked
with `db:show`, `migrate:status`, and phpMyAdmin.

## Database and phpMyAdmin

Local database settings are in `.env`:

- Connection: `mysql`
- Host: `127.0.0.1`
- Port: `3306`
- Database: `vikomakss`
- Username: `vikomakss`
- Password: the generated `DB_PASSWORD` value in `.env`

Use your existing phpMyAdmin session, or sign in as `vikomakss` using that password.
This database account has privileges only on `vikomakss`, not other databases.
The existing MySQL service was already running; no DBngin changes were needed.

Laravel stores sessions, cache, and queued jobs in MySQL. The ten tables
are `users`, `password_reset_tokens`, `sessions`, `cache`, `cache_locks`, `jobs`,
`job_batches`, `failed_jobs`, `migrations`, and `projects`.

After editing `.env`, run `php artisan config:clear` to discard cached settings.
Email currently goes to `storage/logs/laravel.log` rather than being sent externally.

## Create another admin

With PHP 8.4 selected:

```sh
php artisan make:filament-user
php artisan app:grant-admin your-email@example.com
```

The first command asks for a name, email, and password. The second explicitly grants
admin access. Ordinary users have `is_admin = 0` and cannot access the panel,
including in the local environment. Public registration is not enabled.

## Install a fresh checkout

The repository contains source code, dependency lock files, and database migrations.
It does not contain local credentials, installed dependencies, or database records.

```sh
composer install
cp .env.example .env
```

Create a MySQL database and database user, then fill in the `DB_*` values in `.env`.
Set `APP_URL` to your local URL. Then run:

```sh
php artisan key:generate
php artisan migrate
php artisan storage:link
npm ci
npm run build
php artisan make:filament-user
php artisan app:grant-admin your-email@example.com
valet isolate php@8.4
```

If Composer reports that it cannot authenticate against GitHub, check its global
GitHub token. The initial installation needed a temporary clean Composer home to
avoid an existing authentication issue; the global Composer configuration was not
changed.

## Git and eventual hosting

`.env`, `.local/`, `vendor/`, `node_modules/`, compiled assets, and uploaded files are
ignored by Git. Commit the source and lock files normally. GitHub does not back up
MySQL records or uploaded media; these need separate backups.

GitHub Actions runs the PHP tests on pushes and pull requests, using SQLite in
memory. It does not connect to the local MySQL server.

No hosting has been configured. Later, choose PHP/MySQL hosting compatible with the
locked dependencies, point its web root at `public/`, configure a separate production
`.env`, build assets, and run migrations. Migrations create the schema; moving local
content will require a database export/import and copying uploaded media.
