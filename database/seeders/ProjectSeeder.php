<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::factory(10)->state(function () {
            return [
                'project_category_id' => rand(1, 5),
            ];
        })->create();
    }
}
