<?php

namespace Database\Seeders;

use App\Models\ProjectCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'App',
            'Web Design',
            'Software',
            'UI/UX Design',
            'E-commerce',
        ];

        foreach ($categories as $category) {
            ProjectCategory::factory()->create([
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        }
    }
}
