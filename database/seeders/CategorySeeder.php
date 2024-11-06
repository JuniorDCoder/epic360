<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Headphones',
                'image' => 'categories/headphone.png',
                'starting_price' => 160.00
            ],
            [
                'name' => 'Computers',
                'image' => 'categories/computer.png',
                'starting_price' => 150.00
            ],
            [
                'name' => 'Drones',
                'image' => 'categories/drone.png',
                'starting_price' => 140.00
            ],
            [
                'name' => 'EarPods',
                'image' => 'categories/earpod.png',
                'starting_price' => 130.00
            ],
            [
                'name' => 'Microphones',
                'image' => 'categories/mic.png',
                'starting_price' => 125.00
            ],
            [
                'name' => 'Speakers',
                'image' => 'categories/speaker.png',
                'starting_price' => 120.00
            ],
            [
                'name' => 'Watches',
                'image' => 'categories/watch.png',
                'starting_price' => 135.00
            ],
        ];

        foreach($categories as $category){
            Category::firstOrCreate($category);
        }
    }
}
