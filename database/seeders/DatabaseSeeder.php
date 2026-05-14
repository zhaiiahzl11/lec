<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Lecture::query()->delete();

        $this->call([
            Lecture1Seeder::class,
            Lecture2Seeder::class,
            Lecture3Seeder::class,
            Lecture4Seeder::class,
            Lecture5Seeder::class,
            Lecture6Seeder::class,
            Lecture7Seeder::class,
            Lecture8Seeder::class,
            Lecture9Seeder::class,
        ]);
    }
}
