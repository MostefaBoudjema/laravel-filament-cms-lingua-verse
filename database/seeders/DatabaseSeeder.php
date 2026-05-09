<?php

namespace Database\Seeders;

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
        // 1. Core Users
        $this->call([
            UserSeeder::class,
        ]);

        // 2. Business Data
        $this->call([
            ServiceSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
            AuthorSeeder::class,
            PostSeeder::class,
            TestimonialSeeder::class,
            ContactSeeder::class,
            QuoteRequestSeeder::class,
            SettingSeeder::class,
        ]);
    }
}
