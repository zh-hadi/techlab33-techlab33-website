<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
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
                'name' => 'AI Service Development',
                'description' => 'We build intelligent AI-powered tools that automate tasks, enhance decision-making, and improve user interactions efficiently.',
                'icon' => 'bi bi-robot',
            ],
        ];



        foreach($data as $item){
            Service::factory()->create([
                'name' => $item['name'],
                'slug' => Str::slug($item['name']),
                'description' => $item['description'],
                'icon' => $item['icon']
            ]);
        }

    }
}
