<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name;
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->realText(200),
            'client' => fake()->country(),
            'publish_date' => fake()->date(),
            'url' => fake()->url,
        ];
    }
}
