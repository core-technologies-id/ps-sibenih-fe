<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sibenih_mas_kelas')->insert([
            ["nama" => "Benih Penjenis Label Kuning (BS)"],
            ["nama" => "Benih Dasar Label Putih (BD)"],
            ["nama" => "Benih Pokok Label Ungu (BP)"],
            ["nama" => "Benih Sebar Label Biru (BR)"],
            ["nama" => "Benih Pokok Label Ungu 1 (BP1)"],
            ["nama" => "Benih Sebar Label Biru 1 (BR1)"],
            ["nama" => "Benih Sebar Label Biru 2 (BR2)"],
            ["nama" => "Benih Sebar Label Biru 3 (BR3)"],
            ["nama" => "Benih Sebar Label Biru 4 (BR4)"],
        ]);
    }
}
