<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasVarietas5Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sibenih_mas_varietas')->insert([
            ["komoditas_id" => 5, "nama" => "Betet"],
            ["komoditas_id" => 5, "nama" => "Bhakti"],
            ["komoditas_id" => 5, "nama" => "Camar"],
            ["komoditas_id" => 5, "nama" => "Fore Belu"],
            ["komoditas_id" => 5, "nama" => "Gelatik"],
            ["komoditas_id" => 5, "nama" => "Kenari"],
            ["komoditas_id" => 5, "nama" => "Kutilang"],
            ["komoditas_id" => 5, "nama" => "Manyar"],
            ["komoditas_id" => 5, "nama" => "Merak"],
            ["komoditas_id" => 5, "nama" => "Merpati"],
            ["komoditas_id" => 5, "nama" => "Murai"],
            ["komoditas_id" => 5, "nama" => "No.129"],
            ["komoditas_id" => 5, "nama" => "Nuri"],
            ["komoditas_id" => 5, "nama" => "Parkit"],
            ["komoditas_id" => 5, "nama" => "Perkutut"],
            ["komoditas_id" => 5, "nama" => "Sampeong"],
            ["komoditas_id" => 5, "nama" => "Sriti"],
            ["komoditas_id" => 5, "nama" => "Vima-1"],
            ["komoditas_id" => 5, "nama" => "Walet"],
            ["komoditas_id" => 5, "nama" => "Lokal"],
        ]);
    }
}
