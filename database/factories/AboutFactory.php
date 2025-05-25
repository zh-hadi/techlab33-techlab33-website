<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\About>
 */
class AboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => ' Software Company in Bangladesh-Tech Lab 33 Ltd.',
            'content' => fake()->paragraph(10),
            'video_url' => 'https://www.youtube.com/watch?v=XO6lsayFUvQ',
            'clients' => '178',
            'projects' => '453',
            'hoursofsupport' => '1540',
            'workers' => '08',
            'skill_title' => fake()->paragraph(),
            'testimonial_title' => fake()->paragraph()
        ];
    }
}
