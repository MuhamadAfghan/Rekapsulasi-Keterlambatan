<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'ps',
            'email' => 'ps@tes',
            'password' => bcrypt('ps'),
            'role' => 'ps',
        ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@tes',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);

        $this->call([
            RayonSeeder::class,
            RombelSeeder::class,
            StudentSeeder::class,
        ]);
    }
}
