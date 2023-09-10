<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Abeda',
            'email' => 'abeda@gmail.com',
            'password' => '1234',
            'mobile' => '0798244236',
            'address' => 'irbid',
            'is_logged' => '1',
        ]);
    }
}
