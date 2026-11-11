<?php

namespace Tests\Feature;

use App\Models\Project;
use Database\Seeders\ProjectSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class PublicWebsiteTest extends TestCase
{
    use RefreshDatabase;

    public static function publicPages(): array
    {
        return [
            'Latvian home' => ['/', 'lv', 'Labs gaiss.'],
            'Latvian services' => ['/pakalpojumi', 'lv', 'Labs klimats sākas ar labu risinājumu.'],
            'Latvian projects' => ['/projekti', 'lv', 'Ēkas mainās. Kvalitāte paliek.'],
            'Latvian about' => ['/par-mums', 'lv', 'Inženierija ar atbildību.'],
            'Latvian contact' => ['/kontakti', 'lv', 'Laba sadarbība sākas ar sarunu.'],
            'English home' => ['/en', 'en', 'Better air.'],
            'English services' => ['/en/services', 'en', 'A better climate starts with the right solution.'],
            'English projects' => ['/en/projects', 'en', 'Buildings change. Quality endures.'],
            'English about' => ['/en/about', 'en', 'Engineering with responsibility.'],
            'English contact' => ['/en/contact', 'en', 'Good partnerships start with a conversation.'],
        ];
    }

    #[DataProvider('publicPages')]
    public function test_public_pages_render_in_the_requested_language(string $path, string $locale, string $heading): void
    {
        $this->get($path)
            ->assertOk()
            ->assertSee('<html lang="'.$locale.'">', false)
            ->assertSee($heading)
            ->assertDontSee('site.nav.');
    }

    public function test_homepage_only_displays_published_featured_projects(): void
    {
        $this->freezeTime();
        Project::factory()->featured()->create(['title' => ['lv' => 'Atlasītais projekts', 'en' => 'Featured project']]);
        Project::factory()->draft()->featured()->create(['title' => ['lv' => 'Melnraksts', 'en' => 'Draft']]);
        Project::factory()->create(['title' => ['lv' => 'Neatlasīts projekts', 'en' => 'Not featured']]);

        $this->get('/')
            ->assertOk()
            ->assertSee('Atlasītais projekts')
            ->assertDontSee('Melnraksts')
            ->assertDontSee('Neatlasīts projekts');
    }

    public function test_portfolio_shows_all_published_projects_without_category_filters(): void
    {
        $this->freezeTime();
        Project::factory()->create(['category' => 'hospitality', 'title' => ['lv' => 'Viesnīcas projekts']]);
        Project::factory()->create(['category' => 'public', 'title' => ['lv' => 'Biroja projekts']]);
        Project::factory()->draft()->create(['title' => ['lv' => 'Nepublicēts projekts']]);

        $this->get('/projekti?category=hospitality')
            ->assertOk()
            ->assertSee('Viesnīcas projekts')
            ->assertSee('Biroja projekts')
            ->assertDontSee('Nepublicēts projekts')
            ->assertDontSee('class="filter-nav"', false)
            ->assertDontSee('project-card-category');
    }

    public function test_project_modal_content_is_translated_and_has_the_correct_location(): void
    {
        $this->freezeTime();
        $project = Project::factory()->create([
            'slug' => 'sample-project',
            'title' => ['lv' => 'Projekta nosaukums', 'en' => 'Translated project name'],
            'description' => ['lv' => 'Projekta apraksts', 'en' => 'Translated project description'],
            'location' => 'Stokholma, Zviedrija',
            'area' => 2390,
        ]);

        $this->get('/en/projects')
            ->assertOk()
            ->assertSee('Translated project name')
            ->assertSee('Translated project description')
            ->assertSee('Stockholm, Sweden')
            ->assertSee('2 390')
            ->assertSee('data-project-open="project-content-'.$project->id.'"', false)
            ->assertSee('aria-haspopup="dialog"', false)
            ->assertDontSee('/en/projects/sample-project')
            ->assertDontSee('Projekta nosaukums');
    }

    public function test_projects_do_not_have_individual_pages(): void
    {
        Project::factory()->create(['slug' => 'sample-project']);

        $this->get('/projekti/sample-project')->assertNotFound();
        $this->get('/en/projects/sample-project')->assertNotFound();
    }

    public function test_future_projects_are_not_public(): void
    {
        $this->freezeTime();
        $project = Project::factory()->featured()->create([
            'published_at' => now()->addDay(),
            'title' => ['lv' => 'Nākotnes projekts', 'en' => 'Future project'],
        ]);

        $this->get('/projekti')->assertOk()->assertDontSee('Nākotnes projekts');
    }

    public function test_obsolete_category_queries_are_ignored(): void
    {
        $this->get('/projekti?category=unknown')->assertOk();
        $this->get('/projekti?category[]=public')->assertOk();
    }

    public function test_project_seeder_can_be_run_again_without_duplicates(): void
    {
        $this->seed(ProjectSeeder::class);
        $this->seed(ProjectSeeder::class);

        $this->assertDatabaseCount('projects', 27);
    }

    public function test_archive_import_preserves_existing_project_edits(): void
    {
        $existing = Project::factory()->create([
            'slug' => 'national-library',
            'title' => ['lv' => 'Saglabāts nosaukums', 'en' => 'Preserved title'],
        ]);

        $this->seed(ProjectSeeder::class);

        $this->assertSame('Saglabāts nosaukums', $existing->fresh()->translation('title', 'lv'));
        $this->assertDatabaseCount('projects', 27);
        $this->assertDatabaseHas('projects', ['slug' => 'ministru-kabinets', 'cooling' => 55]);
    }
}
