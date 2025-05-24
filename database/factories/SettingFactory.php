<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'website_name' => "Techlab33",
            'website_email' => "info@techlab33.com",
            // 'website_logo' => 'uploads/logo/logo.png',
            // 'website_favicon' => 'uploads/logo/favicon.ico',
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'telephone' => $this->faker->phoneNumber,
            'hotline_number' => $this->faker->tollFreePhoneNumber,
            'facebook_link' => 'https://facebook.com/' . $this->faker->userName,
            'linkedin_link' => 'https://linkedin.com/in/' . $this->faker->userName,
            'x_link' => 'https://x.com/' . $this->faker->userName,
            'instagram_link' => 'https://instagram.com/' . $this->faker->userName,
            'google_map_location' => 'https://maps.google.com/?q=' . $this->faker->latitude . ',' . $this->faker->longitude,
        ];
    }
}
