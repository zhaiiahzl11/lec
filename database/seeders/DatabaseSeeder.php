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
        // Always ensure Biostatistics seeders run to keep 50+ questions per lecture updated
        $this->call([
            BiostatisticsLecture1Seeder::class,
            BiostatisticsLecture2Seeder::class,
            BiostatisticsLecture3Seeder::class,
        ]);

        if (\App\Models\Lecture::count() >= 15) {
            return;
        }

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
            HistologyLecture1Seeder::class,
            HistologyLecture2Seeder::class,
            HistologyLecture3Seeder::class,
        ]);
    }
}
