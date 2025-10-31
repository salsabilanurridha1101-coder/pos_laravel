<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // inputkan sesuai dengan variabel yang ada di User.php
        $faker = Factory::create("id-ID");
        for ($i=0; $i < 10; $i++) {
            User::create([
                "name" => $faker->name(),
                "email" => $faker->email(),
                "password" => Hash::make("123")
            ]);
        }
    }
}
