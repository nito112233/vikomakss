<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'slug' => 'national-library',
                'title' => [
                    'lv' => 'Latvijas Nacionālā bibliotēka',
                    'en' => 'National Library of Latvia',
                ],
                'summary' => [
                    'lv' => 'Ventilācijas sistēma vienā no Latvijas atpazīstamākajām sabiedriskajām ēkām.',
                    'en' => 'Ventilation for one of Latvia’s most recognisable public buildings.',
                ],
                'description' => [
                    'lv' => 'Bibliotēkas ēkā īstenots ventilācijas sistēmas projekts. Darbs ir daļa no Vikomakss pieredzes sabiedriskos objektos ar atšķirīgām telpu funkcijām.',
                    'en' => 'A ventilation system project for the library building, part of Vikomakss’s experience in public buildings with varied uses.',
                ],
                'category' => 'public',
                'image' => 'images/legacy/national-library.jpg',
                'area' => null,
                'airflow' => null,
                'cooling' => null,
                'services' => [
                    'ventilation',
                ],
                'is_featured' => true,
                'sort_order' => 0,
                'location' => 'Rīga',
                'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
            ],
            [
                'slug' => 'saeimas-eka',
                'title' => [
                    'lv' => 'Saeimas ēka',
                    'en' => 'Parliament building',
                ],
                'summary' => [
                    'lv' => 'Mūsdienīga gaisa apmaiņa ēkā ar vēsturisku raksturu.',
                    'en' => 'Modern air exchange in a building with a historic character.',
                ],
                'description' => [
                    'lv' => 'Saeimas ēkā veikti ventilācijas sistēmas darbi. Vēsturiskā vidē tehniskajām sistēmām jāiekļaujas ēkas arhitektūrā, saglabājot tās raksturu.',
                    'en' => 'Ventilation system work in the Parliament building. In a historic setting, technical systems need to respect the architecture and character of the building.',
                ],
                'category' => 'public',
                'image' => 'images/legacy/saeima.jpg',
                'area' => 2390,
                'airflow' => 6,
                'cooling' => 120,
                'services' => [
                    'ventilation',
                ],
                'is_featured' => true,
                'sort_order' => 1,
                'location' => 'Rīga',
                'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
            ],
            [
                'slug' => 'elefant-hotel',
                'title' => [
                    'lv' => 'Viesnīca Elefant',
                    'en' => 'Elefant Hotel',
                ],
                'summary' => [
                    'lv' => 'Ventilācijas un dzesēšanas risinājumi viesnīcas ikdienai.',
                    'en' => 'Ventilation and cooling solutions for everyday hotel comfort.',
                ],
                'description' => [
                    'lv' => 'Viesnīcā Elefant izbūvēta ventilācijas un gaisa dzesēšanas sistēma. Projekts ietver gaisa apmaiņas un temperatūras risinājumus viesnīcas ēkai.',
                    'en' => 'Installation of ventilation and air cooling systems at Elefant Hotel, providing air exchange and temperature solutions for the hotel building.',
                ],
                'category' => 'hospitality',
                'image' => 'images/legacy/elefant.jpg',
                'area' => 7800,
                'airflow' => 10,
                'cooling' => 550,
                'services' => [
                    'ventilation',
                    'cooling',
                ],
                'is_featured' => true,
                'sort_order' => 2,
                'location' => 'Rīga',
                'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
            ],
            [
                'slug' => 'galerija-centrs',
                'title' => [
                    'lv' => 'Galerija Centrs',
                    'en' => 'Galerija Centrs',
                ],
                'summary' => [
                    'lv' => 'Gaisa apmaiņas sistēma pilsētas centra tirdzniecības ēkai.',
                    'en' => 'An air exchange system for a city-centre retail building.',
                ],
                'description' => [
                    'lv' => 'Tirdzniecības centrā Galerija Centrs veikti ventilācijas sistēmas darbi. Arhīvā norādītā projekta platība ir 32 000 m² un gaisa plūsma — 60 m³/s.',
                    'en' => 'Ventilation system work at Galerija Centrs shopping centre. The project archive records an area of 32,000 m² and an airflow of 60 m³/s.',
                ],
                'category' => 'commercial',
                'image' => 'images/legacy/galerija-centrs.jpg',
                'area' => 32000,
                'airflow' => 60,
                'cooling' => null,
                'services' => [
                    'ventilation',
                ],
                'is_featured' => false,
                'sort_order' => 3,
                'location' => 'Rīga',
                'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
            ],
            [
                'slug' => 'maza-gilde',
                'title' => [
                    'lv' => 'Mazā Ģilde',
                    'en' => 'Small Guild',
                ],
                'summary' => [
                    'lv' => 'Tehnoloģijas un komforts līdzās vēsturiskai arhitektūrai.',
                    'en' => 'Technology and comfort alongside historic architecture.',
                ],
                'description' => [
                    'lv' => 'Koncertzālē Mazā Ģilde veikti ventilācijas un gaisa dzesēšanas sistēmas darbi. Risinājums paredzēts ēkai ar īpašu vēsturisku un vizuālu raksturu.',
                    'en' => 'Ventilation and air cooling system work at the Small Guild concert hall, a building with a distinctive historic and visual character.',
                ],
                'category' => 'public',
                'image' => 'images/legacy/maza-gilde.jpg',
                'area' => 560,
                'airflow' => 4,
                'cooling' => 80,
                'services' => [
                    'ventilation',
                    'cooling',
                ],
                'is_featured' => false,
                'sort_order' => 4,
                'location' => 'Rīga',
                'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
            ],
            [
                'slug' => 'origo',
                'title' => [
                    'lv' => 'Centrālā stacija un Origo',
                    'en' => 'Central Station & Origo',
                ],
                'summary' => [
                    'lv' => 'Ventilācija un dzesēšana intensīvi izmantotai pilsētvides ēkai.',
                    'en' => 'Ventilation and cooling for a busy urban destination.',
                ],
                'description' => [
                    'lv' => 'Centrālajā dzelzceļa stacijā un tirdzniecības centrā Origo veikti ventilācijas un gaisa dzesēšanas sistēmas darbi. Arhīvā projektam norādīta 18 894 m² platība.',
                    'en' => 'Ventilation and air cooling system work at the Central Railway Station and Origo shopping centre. The project archive records an area of 18,894 m².',
                ],
                'category' => 'commercial',
                'image' => 'images/legacy/origo.jpg',
                'area' => 18894,
                'airflow' => 37,
                'cooling' => 960,
                'services' => [
                    'ventilation',
                    'cooling',
                ],
                'is_featured' => false,
                'sort_order' => 5,
                'location' => 'Rīga',
                'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['slug' => $project['slug']],
                [...$project, 'published_at' => now()->subDay()],
            );
        }
    }
}
