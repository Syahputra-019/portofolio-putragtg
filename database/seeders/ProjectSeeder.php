<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project = Project::firstOrCreate(
            ['slug' => Str::slug('Aplikasi Kasir Toko')],
            [
                'title' => 'Aplikasi Kasir Toko',
                'description' => 'Sistem kasir buat UMKM, dari input transaksi sampai laporan penjualan harian. Dibangun pakai Laravel di backend dan Tailwind CSS buat tampilannya.',
                'is_featured' => true,
                'sort_order' => 1,
            ]
        );

        $skillIds = Skill::whereIn('name', ['Laravel', 'Tailwind CSS', 'MySQL'])->pluck('id');
        $project->skills()->sync($skillIds);
    }
}
