<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Store::firstOrCreate([
            'name' => 'Epic360',
            'location' => 'Germany',
            'currency' => '€',
            'email_notifications' => true,
        ]);
    }
}
