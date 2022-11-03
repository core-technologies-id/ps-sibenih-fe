<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasVarietas9Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sibenih_mas_varietas')->insert([
            ["komoditas_id" => 9, "nama" => "Adira-1"],
            ["komoditas_id" => 9, "nama" => "Adira-2"],
            ["komoditas_id" => 9, "nama" => "Adira-4"],
            ["komoditas_id" => 9, "nama" => "Darul Hidayah"],
            ["komoditas_id" => 9, "nama" => "Litbang UK 2"],
            ["komoditas_id" => 9, "nama" => "Malang-1"],
            ["komoditas_id" => 9, "nama" => "Malang-2"],
            ["komoditas_id" => 9, "nama" => "Malang-4"],
            ["komoditas_id" => 9, "nama" => "Malang-6"],
            ["komoditas_id" => 9, "nama" => "Uj-3"],
            ["komoditas_id" => 9, "nama" => "Uj-5"],
            ["komoditas_id" => 9, "nama" => "Lokal"],
        ]);
    }
}
