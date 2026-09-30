<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            ['name' => 'Laravel', 'category' => 'Backend', 'proficiency' => 75, 'sort_order' => 1],
            ['name' => 'Tailwind CSS', 'category' => 'Frontend', 'proficiency' => 80, 'sort_order' => 2],
            ['name' => 'MySQL', 'category' => 'Database', 'proficiency' => 65, 'sort_order' => 3],
            ['name' => 'HTML & CSS', 'category' => 'Frontend', 'proficiency' => 85, 'sort_order' => 4],
        ];

        foreach ($skills as $skill) {
            Skill::firstOrCreate(['name' => $skill['name']], $skill);
        }
    }
}
