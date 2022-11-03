<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasVarietas6Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sibenih_mas_varietas')->insert([
            ["komoditas_id" => 6, "nama" => "Anoa"],
            ["komoditas_id" => 6, "nama" => "Badak"],
            ["komoditas_id" => 6, "nama" => "Banteng"],
            ["komoditas_id" => 6, "nama" => "Bima"],
            ["komoditas_id" => 6, "nama" => "Bison"],
            ["komoditas_id" => 6, "nama" => "Blawak"],
            ["komoditas_id" => 6, "nama" => "DM 1 Situraja"],
            ["komoditas_id" => 6, "nama" => "Domba"],
            ["komoditas_id" => 6, "nama" => "Gajah"],
            ["komoditas_id" => 6, "nama" => "Garuda Biga"],
            ["komoditas_id" => 6, "nama" => "Garuda Dua"],
            ["komoditas_id" => 6, "nama" => "HypoMa 1"],
            ["komoditas_id" => 6, "nama" => "HypoMa 2"],
            ["komoditas_id" => 6, "nama" => "Jepara"],
            ["komoditas_id" => 6, "nama" => "Jerapah"],
            ["komoditas_id" => 6, "nama" => "Kancil"],
            ["komoditas_id" => 6, "nama" => "Kelinci"],
            ["komoditas_id" => 6, "nama" => "Kidang"],
            ["komoditas_id" => 6, "nama" => "Komodo"],
            ["komoditas_id" => 6, "nama" => "Landak"],
            ["komoditas_id" => 6, "nama" => "Lokan Tuban"],
            ["komoditas_id" => 6, "nama" => "Macan"],
            ["komoditas_id" => 6, "nama" => "Mahesa"],
            ["komoditas_id" => 6, "nama" => "Panther"],
            ["komoditas_id" => 6, "nama" => "Pelanduk"],
            ["komoditas_id" => 6, "nama" => "Rusa"],
            ["komoditas_id" => 6, "nama" => "Sandle"],
            ["komoditas_id" => 6, "nama" => "Sima"],
            ["komoditas_id" => 6, "nama" => "Simpai"],
            ["komoditas_id" => 6, "nama" => "Singa"],
            ["komoditas_id" => 6, "nama" => "Talam 1"],
            ["komoditas_id" => 6, "nama" => "Talar 1"],
            ["komoditas_id" => 6, "nama" => "Talar 2"],
            ["komoditas_id" => 6, "nama" => "Tapir"],
            ["komoditas_id" => 6, "nama" => "Tigo Ampe"],
            ["komoditas_id" => 6, "nama" => "Trenggiling"],
            ["komoditas_id" => 6, "nama" => "Tupai"],
            ["komoditas_id" => 6, "nama" => "Turangga"],
            ["komoditas_id" => 6, "nama" => "Zebra"],
            ["komoditas_id" => 6, "nama" => "Lokal"],
        ]);
    }
}
