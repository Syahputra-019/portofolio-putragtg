<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::firstOnCreate([], [
            'name' => 'Syahputra Tirta Wijaya',
            'headline' => 'Fresh Graduate Full-Stack Developer',
            'bio' => 'Lulusan D3 Teknologi Informasi, Universitas Brawijaya, Fokus di pegembangan web pakai Laravel dan Tailwind CSS.',
            'email' => 'syahputratira.001@gmail.com',
            'location' => 'Malang, Indonesia',
            'social_links' => [
                'github' => 'https://github.com/Syahputra-019'
            ],
        ]);
    }
}
