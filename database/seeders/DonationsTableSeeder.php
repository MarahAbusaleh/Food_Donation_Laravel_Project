<?php

namespace Database\Seeders;

use App\Models\Donation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DonationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Donation::truncate();
        Donation::create([
            'category_id' => 1, 
                'name' => 'Donation 1',
                'description' => 'Description for Donation 1',
                'price' => 100.00,
                'image' => 'donation1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
        ]);
        Donation::create([
            'category_id' => 2, 
                    'name' => 'Donation 2',
                    'description' => 'Description for Donation 2',
                    'price' => 50.00,
                    'image' => 'donation2.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
        ]);
    }
}
