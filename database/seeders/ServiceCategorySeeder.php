<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data = [
            [
                'name' => 'Web Development',
                'description' => 'We build fast, responsive websites tailored to your business needs using modern, scalable, and secure web technologies.',
                'icon' => 'bi bi-window',
            ],
            [
                'name' => 'App Development',
                'description' => 'We develop mobile apps for Android and iOS with sleek interfaces, great performance, and custom features for users.',
                'icon' => 'bi bi-phone',
            ],
            [
                'name' => 'Custom Software',
                'description' => 'We create software solutions that automate tasks, improve productivity, and integrate with your existing systems seamlessly.',
                'icon' => 'bi bi-cpu',
            ],
            [
                'name' => 'UI/UX Design',
                'description' => 'We design user-friendly interfaces with smooth experiences that enhance engagement and reflect your brand identity perfectly.',
                'icon' => 'bi bi-easel',
            ]
        ];



        foreach($data as $item){
            ServiceCategory::factory()->create([
                'name' => $item['name'],
                'description' => $item['description'],
                'icon' => $item['icon']
            ]);
        }

    }
}
