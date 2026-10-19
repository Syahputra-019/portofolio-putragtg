<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        Experience::firstOrCreate(
            ['title' => 'D3 Teknologi Informasi', 'institution' => 'Universitas Brawijaya'],
            [
                'type' => 'education',
                'description' => 'Fokus di pengembangan web, database, dan pemrograman terapan.',
                'start_date' => '2023-08-01',
                'end_date' => '2026-07-01',
            ]
        );
    }
}