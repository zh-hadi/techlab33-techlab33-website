<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\ProjectCategory;
use App\Models\ServiceCategory;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Techlab33 Ltd',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin@admin.com'),
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
            ProjectSeeder::class,
            ServiceSeeder::class,
            FeatureSeeder::class,
        ]);
    }
}
