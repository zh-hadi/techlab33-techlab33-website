<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            ['name' => 'PHP', 'percentage' => 100],
            ['name' => 'JavaScript', 'percentage' => 95],
            ['name' => 'jQuery', 'percentage' => 90],
            ['name' => 'Laravel', 'percentage' => 98],
            ['name' => 'WordPress', 'percentage' => 85],
            ['name' => 'ReactJS', 'percentage' => 90],
            ['name' => 'Bootstrap', 'percentage' => 92],
            ['name' => 'Tailwind CSS', 'percentage' => 94],
            ['name' => 'HTML', 'percentage' => 98],
            ['name' => 'CSS', 'percentage' => 95],
            ['name' => 'MySQL', 'percentage' => 96],
            ['name' => 'Git & GitHub', 'percentage' => 90],
            ['name' => 'REST API', 'percentage' => 88],
        ];

        foreach ($skills as $skill) {
            Skill::factory()->create([
                'name' => $skill['name'],
                'percentage' => $skill['percentage'],
            ]);
        }
    }
}
