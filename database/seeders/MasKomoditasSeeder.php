<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasKomoditasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sibenih_mas_komoditas')->insert([
            ["nama" => "Padi Hibrida"],
            ["nama" => "Padi Non Hibrida"],
            ["nama" => "Jagung Hibrida"],
            ["nama" => "Jagung Komposit"],
            ["nama" => "Kacang Hijau"],
            ["nama" => "Kacang Tanah"],
            ["nama" => "Kedelai"],
            ["nama" => "Ubi Jalar"],
            ["nama" => "Ubi Kayu"],
        ]);
    }
}
