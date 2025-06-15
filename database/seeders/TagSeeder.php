<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'App',
            'IT',
            'Business',
            'Mac',
            'Design',
            'Office',
            'Creative',
            'Studio',
            'Smart Tips',
            'Marketing',
        ];

        foreach ($tags as $tag) {
            DB::table('tags')->insert([
                'name' => $tag,
                'slug' => Str::slug($tag),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
