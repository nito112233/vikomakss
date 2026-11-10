<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Project> */
class ProjectFactory extends Factory
{
    public function definition(): array
    {
        return [
            'slug' => fake()->unique()->slug(),
            'title' => ['lv' => 'Testa projekts', 'en' => 'Test project'],
            'summary' => ['lv' => 'Ventilācijas sistēma.', 'en' => 'Ventilation system.'],
            'description' => ['lv' => 'Projektā veikta ventilācijas sistēmas izbūve.', 'en' => 'Ventilation installation for the project.'],
            'image' => 'images/legacy/saeima.jpg',
            'category' => 'public',
            'services' => ['ventilation'],
            'location' => 'Rīga',
            'is_featured' => false,
            'sort_order' => 0,
            'published_at' => now()->subMinute(),
            'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
        ];
    }

    public function draft(): static
    {
        return $this->state(fn () => ['published_at' => null]);
    }

    public function featured(): static
    {
        return $this->state(fn () => ['is_featured' => true]);
    }
}
