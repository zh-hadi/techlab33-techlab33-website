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
            'website_name' => 'Techlab33',
            'website_email' => 'info@techlab33.com',
            // 'website_logo' => 'uploads/logo/logo.png',
            // 'website_favicon' => 'uploads/logo/favicon.ico',
            'address' => '27/1B , Shaymoli
Alamin Apon Heights
Dhaka 1207 , Bangladesh ',
            'phone' => '+8801741 584 868',
            'whatsapp_number' => '8801741584868',
            'telephone' => '+8802222 244 024',
            'hotline_number' => $this->faker->tollFreePhoneNumber,
            'facebook_link' => 'https://www.facebook.com/techlab33',
            'linkedin_link' => 'https://www.linkedin.com/company/techlab33ltd',
            'x_link' => 'https://x.com/techlab33',
            'instagram_link' => null,
            'youtube_link' => 'https://www.youtube.com/@TechLab33Ltd-b9e',
            'google_map_location' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4369.078155069282!2d90.36207327592808!3d23.77592148779485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1e1f84e3b17%3A0x473348f44864fee4!2sTech%20Lab33%20Ltd.!5e1!3m2!1sen!2sbd!4v1748075903960!5m2!1sen!2sbd',
        ];
    }
}
