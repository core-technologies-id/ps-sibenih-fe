<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MasKabupatenSeeder::class,
            MasKelasSeeder::class,
            MasKomoditasSeeder::class,
            MasVarietas1Seeder::class,
            MasVarietas2Seeder::class,
            MasVarietas3Seeder::class,
            MasVarietas4Seeder::class,
            MasVarietas5Seeder::class,
            MasVarietas6Seeder::class,
            MasVarietas7Seeder::class,
            MasVarietas8Seeder::class,
            MasVarietas9Seeder::class,
        ]);
    }
}
