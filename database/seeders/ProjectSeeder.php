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
            [
                'slug' => 'ministru-kabinets',
                'title' => [
                    'lv' => 'Latvijas Republikas Ministru kabineta ēka',
                    'en' => 'Cabinet of Ministers building',
                ],
                'summary' => [
                    'lv' => 'Ventilācijas sistēma Ministru kabineta ēkai.',
                    'en' => 'Ventilation system for the Cabinet of Ministers building.',
                ],
                'description' => [
                    'lv' => 'Latvijas Republikas Ministru kabineta ēka: veikti ventilācijas sistēmas darbi. Projekta tehniskie rādītāji: gaisa plūsma 2,8 m³/s, aukstumapgāde 55 kW.',
                    'en' => 'Cabinet of Ministers building: ventilation system work. Project specifications: airflow 2.8 m³/s, cooling capacity 55 kW.',
                ],
                'category' => 'public',
                'image' => 'images/legacy/ministru-kabinets.jpg',
                'area' => null,
                'airflow' => 2.8,
                'cooling' => 55,
                'services' => [
                    'ventilation',
                ],
                'is_featured' => false,
                'sort_order' => 6,
                'location' => 'Rīga',
                'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
            ],
            [
                'slug' => 'baltais-vejs',
                'title' => [
                    'lv' => 'Biroju ēka Baltais Vējš',
                    'en' => 'Baltais Vējš office building',
                ],
                'summary' => [
                    'lv' => 'Ventilācija un gaisa dzesēšana biroju ēkai.',
                    'en' => 'Ventilation and air cooling for an office building.',
                ],
                'description' => [
                    'lv' => 'Biroju ēka Baltais Vējš: veikti ventilācijas un gaisa dzesēšanas sistēmas darbi. Projekta tehniskie rādītāji: platība 2 700 m², gaisa plūsma 2 m³/s, aukstumapgāde 450 kW.',
                    'en' => 'Baltais Vējš office building: ventilation and air cooling system work. Project specifications: area 2,700 m², airflow 2 m³/s, cooling capacity 450 kW.',
                ],
                'category' => 'commercial',
                'image' => 'images/legacy/baltais-vejs.jpg',
                'area' => 2700,
                'airflow' => 2,
                'cooling' => 450,
                'services' => [
                    'ventilation',
                    'cooling',
                ],
                'is_featured' => false,
                'sort_order' => 7,
                'location' => 'Rīga',
                'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
            ],
            [
                'slug' => 'latvijas-krajbanka',
                'title' => [
                    'lv' => 'Latvijas Krājbanka — centrālais birojs',
                    'en' => 'Latvijas Krājbanka headquarters',
                ],
                'summary' => [
                    'lv' => 'Ventilācijas sistēma bankas centrālajam birojam.',
                    'en' => 'Ventilation system for the bank’s headquarters.',
                ],
                'description' => [
                    'lv' => 'Latvijas Krājbanka — centrālais birojs: veikti ventilācijas sistēmas darbi. Projekta tehniskie rādītāji: platība 7 180 m², gaisa plūsma 16 m³/s.',
                    'en' => 'Latvijas Krājbanka headquarters: ventilation system work. Project specifications: area 7,180 m², airflow 16 m³/s.',
                ],
                'category' => 'commercial',
                'image' => 'images/legacy/krajbanka.jpg',
                'area' => 7180,
                'airflow' => 16,
                'cooling' => null,
                'services' => [
                    'ventilation',
                ],
                'is_featured' => false,
                'sort_order' => 8,
                'location' => 'Rīga',
                'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
            ],
            [
                'slug' => 'europa-royale-riga',
                'title' => [
                    'lv' => 'Viesnīca Europa Royale Riga',
                    'en' => 'Europa Royale Riga Hotel',
                ],
                'summary' => [
                    'lv' => 'Ventilācijas un gaisa dzesēšanas sistēma viesnīcai.',
                    'en' => 'Ventilation and air cooling system for a hotel.',
                ],
                'description' => [
                    'lv' => 'Viesnīca Europa Royale Riga: veikti ventilācijas un gaisa dzesēšanas sistēmas darbi. Projekta tehniskie rādītāji: platība 2 773 m², gaisa plūsma 7 m³/s, aukstumapgāde 228 kW.',
                    'en' => 'Europa Royale Riga Hotel: ventilation and air cooling system work. Project specifications: area 2,773 m², airflow 7 m³/s, cooling capacity 228 kW.',
                ],
                'category' => 'hospitality',
                'image' => 'images/legacy/europa-royale.jpg',
                'area' => 2773,
                'airflow' => 7,
                'cooling' => 228,
                'services' => [
                    'ventilation',
                    'cooling',
                ],
                'is_featured' => false,
                'sort_order' => 9,
                'location' => 'Rīga',
                'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
            ],
            [
                'slug' => 'sky-more',
                'title' => [
                    'lv' => 'Tirdzniecības centrs Sky & More',
                    'en' => 'Sky & More shopping centre',
                ],
                'summary' => [
                    'lv' => 'Ventilācijas un gaisa dzesēšanas risinājums tirdzniecības centram.',
                    'en' => 'Ventilation and air cooling for a shopping centre.',
                ],
                'description' => [
                    'lv' => 'Tirdzniecības centrs Sky & More: veikti ventilācijas un gaisa dzesēšanas sistēmas darbi. Projekta tehniskie rādītāji: platība 17 800 m², gaisa plūsma 50 m³/s, aukstumapgāde 1200 kW.',
                    'en' => 'Sky & More shopping centre: ventilation and air cooling system work. Project specifications: area 17,800 m², airflow 50 m³/s, cooling capacity 1200 kW.',
                ],
                'category' => 'commercial',
                'image' => 'images/legacy/sky-more.jpg',
                'area' => 17800,
                'airflow' => 50,
                'cooling' => 1200,
                'services' => [
                    'ventilation',
                    'cooling',
                ],
                'is_featured' => false,
                'sort_order' => 10,
                'location' => 'Rīga',
                'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
            ],
            [
                'slug' => 'riga-plaza',
                'title' => [
                    'lv' => 'Tirdzniecības centrs Riga Plaza',
                    'en' => 'Riga Plaza shopping centre',
                ],
                'summary' => [
                    'lv' => 'Ventilācijas sistēma 70 000 m² plašam tirdzniecības objektam.',
                    'en' => 'Ventilation system for a 70,000 m² retail building.',
                ],
                'description' => [
                    'lv' => 'Tirdzniecības centrs Riga Plaza: veikti ventilācijas sistēmas darbi. Projekta tehniskie rādītāji: platība 70 000 m², gaisa plūsma 200 m³/s.',
                    'en' => 'Riga Plaza shopping centre: ventilation system work. Project specifications: area 70,000 m², airflow 200 m³/s.',
                ],
                'category' => 'commercial',
                'image' => 'images/legacy/riga-plaza.jpg',
                'area' => 70000,
                'airflow' => 200,
                'cooling' => null,
                'services' => [
                    'ventilation',
                ],
                'is_featured' => false,
                'sort_order' => 11,
                'location' => 'Rīga',
                'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
            ],
            [
                'slug' => 'spice',
                'title' => [
                    'lv' => 'Mēbeļu un interjera centrs Spice',
                    'en' => 'Spice furniture and interior centre',
                ],
                'summary' => [
                    'lv' => 'Ventilācijas sistēma mēbeļu un interjera centram.',
                    'en' => 'Ventilation system for a furniture and interior centre.',
                ],
                'description' => [
                    'lv' => 'Mēbeļu un interjera centrs Spice: veikti ventilācijas sistēmas darbi. Projekta tehniskie rādītāji: platība 24 690 m², gaisa plūsma 52 m³/s.',
                    'en' => 'Spice furniture and interior centre: ventilation system work. Project specifications: area 24,690 m², airflow 52 m³/s.',
                ],
                'category' => 'commercial',
                'image' => 'images/legacy/spice.jpg',
                'area' => 24690,
                'airflow' => 52,
                'cooling' => null,
                'services' => [
                    'ventilation',
                ],
                'is_featured' => false,
                'sort_order' => 12,
                'location' => 'Rīga',
                'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
            ],
            [
                'slug' => 'nissan',
                'title' => [
                    'lv' => 'Autocentrs Nissan',
                    'en' => 'Nissan car centre',
                ],
                'summary' => [
                    'lv' => 'Ventilācijas un gaisa dzesēšanas sistēma autocentram.',
                    'en' => 'Ventilation and air cooling system for a car centre.',
                ],
                'description' => [
                    'lv' => 'Autocentrs Nissan: veikti ventilācijas un gaisa dzesēšanas sistēmas darbi. Projekta tehniskie rādītāji: platība 2 980 m², gaisa plūsma 6 m³/s, aukstumapgāde 100 kW.',
                    'en' => 'Nissan car centre: ventilation and air cooling system work. Project specifications: area 2,980 m², airflow 6 m³/s, cooling capacity 100 kW.',
                ],
                'category' => 'commercial',
                'image' => 'images/legacy/nissan.jpg',
                'area' => 2980,
                'airflow' => 6,
                'cooling' => 100,
                'services' => [
                    'ventilation',
                    'cooling',
                ],
                'is_featured' => false,
                'sort_order' => 13,
                'location' => 'Rīga',
                'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
            ],
            [
                'slug' => 'volvo',
                'title' => [
                    'lv' => 'Autocentrs Volvo',
                    'en' => 'Volvo car centre',
                ],
                'summary' => [
                    'lv' => 'Ventilācijas un dzesēšanas sistēmu darbi autocentrā.',
                    'en' => 'Ventilation and cooling system work at a car centre.',
                ],
                'description' => [
                    'lv' => 'Autocentrs Volvo: veikti ventilācijas un gaisa dzesēšanas sistēmas darbi. Projekta tehniskie rādītāji: platība 5 805 m², gaisa plūsma 15 m³/s, aukstumapgāde 185 kW.',
                    'en' => 'Volvo car centre: ventilation and air cooling system work. Project specifications: area 5,805 m², airflow 15 m³/s, cooling capacity 185 kW.',
                ],
                'category' => 'commercial',
                'image' => 'images/legacy/volvo.jpg',
                'area' => 5805,
                'airflow' => 15,
                'cooling' => 185,
                'services' => [
                    'ventilation',
                    'cooling',
                ],
                'is_featured' => false,
                'sort_order' => 14,
                'location' => 'Rīga',
                'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
            ],
            [
                'slug' => 'islande-hotel',
                'title' => [
                    'lv' => 'Viesnīca Islande',
                    'en' => 'Islande Hotel',
                ],
                'summary' => [
                    'lv' => 'Ventilācijas un gaisa dzesēšanas risinājums viesnīcas ēkai.',
                    'en' => 'Ventilation and air cooling for a hotel building.',
                ],
                'description' => [
                    'lv' => 'Viesnīca Islande: veikti ventilācijas un gaisa dzesēšanas sistēmas darbi. Projekta tehniskie rādītāji: platība 10 000 m², gaisa plūsma 18 m³/s, aukstumapgāde 380 kW.',
                    'en' => 'Islande Hotel: ventilation and air cooling system work. Project specifications: area 10,000 m², airflow 18 m³/s, cooling capacity 380 kW.',
                ],
                'category' => 'hospitality',
                'image' => 'images/legacy/islande.jpg',
                'area' => 10000,
                'airflow' => 18,
                'cooling' => 380,
                'services' => [
                    'ventilation',
                    'cooling',
                ],
                'is_featured' => false,
                'sort_order' => 15,
                'location' => 'Rīga',
                'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
            ],
            [
                'slug' => 'rigas-tec-2',
                'title' => [
                    'lv' => 'Rīgas TEC-2',
                    'en' => 'Riga TEC-2 power plant',
                ],
                'summary' => [
                    'lv' => 'Ventilācijas un gaisa dzesēšanas sistēmu darbi enerģētikas objektā.',
                    'en' => 'Ventilation and air cooling system work at an energy facility.',
                ],
                'description' => [
                    'lv' => 'Rīgas TEC-2: veikti ventilācijas un gaisa dzesēšanas sistēmas darbi.',
                    'en' => 'Riga TEC-2 power plant: ventilation and air cooling system work.',
                ],
                'category' => 'industrial',
                'image' => 'images/legacy/tec-2.jpg',
                'area' => null,
                'airflow' => null,
                'cooling' => null,
                'services' => [
                    'ventilation',
                    'cooling',
                ],
                'is_featured' => false,
                'sort_order' => 16,
                'location' => 'Acone, Salaspils novads',
                'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
            ],
            [
                'slug' => 'galerija-riga',
                'title' => [
                    'lv' => 'Tirdzniecības centrs Galerija Rīga',
                    'en' => 'Galleria Riga shopping centre',
                ],
                'summary' => [
                    'lv' => 'Ventilācijas un gaisa dzesēšanas sistēma tirdzniecības centram.',
                    'en' => 'Ventilation and air cooling system for a shopping centre.',
                ],
                'description' => [
                    'lv' => 'Tirdzniecības centrs Galerija Rīga: veikti ventilācijas un gaisa dzesēšanas sistēmas darbi.',
                    'en' => 'Galleria Riga shopping centre: ventilation and air cooling system work.',
                ],
                'category' => 'commercial',
                'image' => 'images/legacy/galerija-riga.jpg',
                'area' => null,
                'airflow' => null,
                'cooling' => null,
                'services' => [
                    'ventilation',
                    'cooling',
                ],
                'is_featured' => false,
                'sort_order' => 17,
                'location' => 'Rīga',
                'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
            ],
            [
                'slug' => 'skanstes-7',
                'title' => [
                    'lv' => 'Biroju ēka Skanstes ielā 7',
                    'en' => 'Office building at Skanstes iela 7',
                ],
                'summary' => [
                    'lv' => 'Ventilācijas un gaisa dzesēšanas sistēmu darbi biroju ēkā.',
                    'en' => 'Ventilation and air cooling system work in an office building.',
                ],
                'description' => [
                    'lv' => 'Biroju ēka Skanstes ielā 7: veikti ventilācijas un gaisa dzesēšanas sistēmas darbi.',
                    'en' => 'Office building at Skanstes iela 7: ventilation and air cooling system work.',
                ],
                'category' => 'commercial',
                'image' => 'images/legacy/skanstes-7.jpg',
                'area' => null,
                'airflow' => null,
                'cooling' => null,
                'services' => [
                    'ventilation',
                    'cooling',
                ],
                'is_featured' => false,
                'sort_order' => 18,
                'location' => 'Rīga',
                'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
            ],
            [
                'slug' => 'valsts-ienemumu-dienests',
                'title' => [
                    'lv' => 'Valsts ieņēmumu dienesta ēka',
                    'en' => 'State Revenue Service building',
                ],
                'summary' => [
                    'lv' => 'Ventilācijas sistēma Valsts ieņēmumu dienesta ēkai.',
                    'en' => 'Ventilation system for the State Revenue Service building.',
                ],
                'description' => [
                    'lv' => 'Valsts ieņēmumu dienesta ēka: veikti ventilācijas sistēmas darbi.',
                    'en' => 'State Revenue Service building: ventilation system work.',
                ],
                'category' => 'public',
                'image' => 'images/legacy/vid.jpg',
                'area' => null,
                'airflow' => null,
                'cooling' => null,
                'services' => [
                    'ventilation',
                ],
                'is_featured' => false,
                'sort_order' => 19,
                'location' => 'Rīga',
                'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
            ],
            [
                'slug' => 'lendeet-stockholm',
                'title' => [
                    'lv' => 'Dzīvojamā ēka Lendeet',
                    'en' => 'Lendeet residential building',
                ],
                'summary' => [
                    'lv' => 'Ventilācijas sistēma dzīvojamai ēkai Stokholmā.',
                    'en' => 'Ventilation system for a residential building in Stockholm.',
                ],
                'description' => [
                    'lv' => 'Dzīvojamā ēka Lendeet: veikti ventilācijas sistēmas darbi.',
                    'en' => 'Lendeet residential building: ventilation system work.',
                ],
                'category' => 'residential',
                'image' => 'images/legacy/lendeet.jpg',
                'area' => null,
                'airflow' => null,
                'cooling' => null,
                'services' => [
                    'ventilation',
                ],
                'is_featured' => false,
                'sort_order' => 20,
                'location' => 'Stokholma, Zviedrija',
                'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
            ],
            [
                'slug' => 'hornslandet-stockholm',
                'title' => [
                    'lv' => 'Dzīvojamā ēka Hornslandet',
                    'en' => 'Hornslandet residential building',
                ],
                'summary' => [
                    'lv' => 'Ventilācijas risinājums dzīvojamai ēkai Zviedrijā.',
                    'en' => 'Ventilation system for a residential building in Sweden.',
                ],
                'description' => [
                    'lv' => 'Dzīvojamā ēka Hornslandet: veikti ventilācijas sistēmas darbi.',
                    'en' => 'Hornslandet residential building: ventilation system work.',
                ],
                'category' => 'residential',
                'image' => 'images/legacy/hornslandet.jpg',
                'area' => null,
                'airflow' => null,
                'cooling' => null,
                'services' => [
                    'ventilation',
                ],
                'is_featured' => false,
                'sort_order' => 21,
                'location' => 'Stokholma, Zviedrija',
                'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
            ],
            [
                'slug' => 'ausekla-4',
                'title' => [
                    'lv' => 'Dzīvojamā ēka Ausekļa ielā 4',
                    'en' => 'Residential building at Ausekļa iela 4',
                ],
                'summary' => [
                    'lv' => 'Ventilācijas sistēmas darbi dzīvojamā ēkā Rīgā.',
                    'en' => 'Ventilation system work in a residential building in Riga.',
                ],
                'description' => [
                    'lv' => 'Dzīvojamā ēka Ausekļa ielā 4: veikti ventilācijas sistēmas darbi.',
                    'en' => 'Residential building at Ausekļa iela 4: ventilation system work.',
                ],
                'category' => 'residential',
                'image' => 'images/legacy/ausekla-4.jpg',
                'area' => null,
                'airflow' => null,
                'cooling' => null,
                'services' => [
                    'ventilation',
                ],
                'is_featured' => false,
                'sort_order' => 22,
                'location' => 'Rīga',
                'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
            ],
            [
                'slug' => 'dienvidu-pakavs',
                'title' => [
                    'lv' => 'Dzīvojamā ēka Dienvidu pakavs',
                    'en' => 'Dienvidu pakavs residential building',
                ],
                'summary' => [
                    'lv' => 'Ventilācijas sistēma dzīvojamai ēkai Vienības gatvē.',
                    'en' => 'Ventilation system for a residential building on Vienības gatve.',
                ],
                'description' => [
                    'lv' => 'Dzīvojamā ēka Dienvidu pakavs: veikti ventilācijas sistēmas darbi.',
                    'en' => 'Dienvidu pakavs residential building: ventilation system work.',
                ],
                'category' => 'residential',
                'image' => 'images/legacy/dienvidu-pakavs.jpg',
                'area' => null,
                'airflow' => null,
                'cooling' => null,
                'services' => [
                    'ventilation',
                ],
                'is_featured' => false,
                'sort_order' => 23,
                'location' => 'Rīga',
                'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
            ],
            [
                'slug' => 'gailezers-operaciju-bloks',
                'title' => [
                    'lv' => 'Austrumu slimnīcas jaunais operāciju bloks',
                    'en' => 'East Hospital new operating theatre block',
                ],
                'summary' => [
                    'lv' => 'Ventilācijas un gaisa dzesēšanas sistēmas slimnīcas operāciju blokam.',
                    'en' => 'Ventilation and air cooling systems for a hospital operating theatre block.',
                ],
                'description' => [
                    'lv' => 'Austrumu slimnīcas jaunais operāciju bloks: veikti ventilācijas un gaisa dzesēšanas sistēmas darbi.',
                    'en' => 'East Hospital new operating theatre block: ventilation and air cooling system work.',
                ],
                'category' => 'public',
                'image' => 'images/legacy/gailezers.png',
                'area' => null,
                'airflow' => null,
                'cooling' => null,
                'services' => [
                    'ventilation',
                    'cooling',
                ],
                'is_featured' => false,
                'sort_order' => 24,
                'location' => 'Rīga',
                'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
            ],
            [
                'slug' => 'bauskas-1-vidusskola',
                'title' => [
                    'lv' => 'Bauskas 1. vidusskola',
                    'en' => 'Bauska Secondary School No. 1',
                ],
                'summary' => [
                    'lv' => 'Ventilācijas sistēma skolas ēkai Bauskā.',
                    'en' => 'Ventilation system for a school building in Bauska.',
                ],
                'description' => [
                    'lv' => 'Bauskas 1. vidusskola: veikti ventilācijas sistēmas darbi.',
                    'en' => 'Bauska Secondary School No. 1: ventilation system work.',
                ],
                'category' => 'public',
                'image' => 'images/legacy/bauskas-1-vidusskola.jpg',
                'area' => null,
                'airflow' => null,
                'cooling' => null,
                'services' => [
                    'ventilation',
                ],
                'is_featured' => false,
                'sort_order' => 25,
                'location' => 'Bauska',
                'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
            ],
            [
                'slug' => 'stradina-slimnica-a-korpuss',
                'title' => [
                    'lv' => 'P. Stradiņa slimnīca — A korpuss',
                    'en' => 'Pauls Stradiņš Hospital — Building A',
                ],
                'summary' => [
                    'lv' => 'Ventilācijas sistēmas darbi slimnīcas A korpusā.',
                    'en' => 'Ventilation system work in the hospital’s Building A.',
                ],
                'description' => [
                    'lv' => 'P. Stradiņa slimnīca — A korpuss: veikti ventilācijas sistēmas darbi.',
                    'en' => 'Pauls Stradiņš Hospital — Building A: ventilation system work.',
                ],
                'category' => 'public',
                'image' => 'images/legacy/stradini.jpg',
                'area' => null,
                'airflow' => null,
                'cooling' => null,
                'services' => [
                    'ventilation',
                ],
                'is_featured' => false,
                'sort_order' => 26,
                'location' => 'Rīga',
                'source_url' => 'https://vikomakss.lv/lv/lielie-projekti',
            ],
        ];

        foreach ($projects as $project) {
            Project::firstOrCreate(
                ['slug' => $project['slug']],
                [...$project, 'published_at' => now()->subDay()],
            );
        }
    }
}
