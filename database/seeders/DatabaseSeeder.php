<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(SettingSeeder::class);
        $this->call(UserSeeder::class);

<<<<<<< HEAD
=======
        $this->call(SettingSeeder::class);
        $this->call(UserSeeder::class);
>>>>>>> 9f193ae5c5da1dd26eec2444224fb402a6caba64
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
