<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Donation;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        // Category::truncate();


        Category::create([
            'name' => 'Monthly Packages',
            'description' => ' Every food parcel contains food items that suffice the family needs to prepare 3 meals a day for an entire month.',
            'image' => 'images/causes/packages3.jpg',
        ]);
        Category::create([
            'name' => 'Daily Meals',
            'description' => 'Its carefully curated to provide a hearty, nutritious meal for a family of four. It consists of a main course, a side dish, and a delectable dessert.',
            'image' => 'images/causes/dailyMeals.jpg',
        ]);
        Category::create([
            'name' => 'Restaurants Coupons',
            'description' => 'You can donate the value of a coupon, every one will equal the value of a meal in one of our partners restaurants.',
            'image' => 'images/causes/cop.jpg',
        ]);


    }
}
