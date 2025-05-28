<?php

namespace Database\Seeders;

use App\Models\ProjectCategory;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Hadiuzzaman',
            'email' => 'h@g.c',
        ]);

        $this->call([
            SettingSeeder::class,
            TestimonialSeeder::class,
            AboutSeeder::class,
            SkillSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
            PostSeeder::class,
            ContactSeeder::class,
            ProjectCategorySeeder::class,
            ProjectSeeder::class
        ]);
    }
}
