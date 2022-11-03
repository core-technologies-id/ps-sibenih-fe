<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasVarietas8Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sibenih_mas_varietas')->insert([
            ["komoditas_id" => 8, "nama" => "Antin 1"],
            ["komoditas_id" => 8, "nama" => "Beta 1"],
            ["komoditas_id" => 8, "nama" => "Beta 2"],
            ["komoditas_id" => 8, "nama" => "Borobudur"],
            ["komoditas_id" => 8, "nama" => "Cangkuang"],
            ["komoditas_id" => 8, "nama" => "Cilembu"],
            ["komoditas_id" => 8, "nama" => "Jago"],
            ["komoditas_id" => 8, "nama" => "Kalasan"],
            ["komoditas_id" => 8, "nama" => "Kambili"],
            ["komoditas_id" => 8, "nama" => "Kidal"],
            ["komoditas_id" => 8, "nama" => "Kuningan Merah"],
            ["komoditas_id" => 8, "nama" => "Kuningan Putih"],
            ["komoditas_id" => 8, "nama" => "Mendut"],
            ["komoditas_id" => 8, "nama" => "Muara Takus"],
            ["komoditas_id" => 8, "nama" => "Nagara KB-1"],
            ["komoditas_id" => 8, "nama" => "Papua Pattipi"],
            ["komoditas_id" => 8, "nama" => "Papua Solossa"],
            ["komoditas_id" => 8, "nama" => "Prambanan"],
            ["komoditas_id" => 8, "nama" => "Sari"],
            ["komoditas_id" => 8, "nama" => "Sawentar"],
            ["komoditas_id" => 8, "nama" => "Sewu"],
            ["komoditas_id" => 8, "nama" => "Shiroyutaka"],
            ["komoditas_id" => 8, "nama" => "Sukuh"],
            ["komoditas_id" => 8, "nama" => "Lokal"],
        ]);
    }
}
