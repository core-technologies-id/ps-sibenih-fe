<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasVarietas4Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sibenih_mas_varietas')->insert([
            ["komoditas_id" => 4, "nama" => "Abimanyu"],
            ["komoditas_id" => 4, "nama" => "Anoman 1"],
            ["komoditas_id" => 4, "nama" => "Antasena"],
            ["komoditas_id" => 4, "nama" => "Arjuna"],
            ["komoditas_id" => 4, "nama" => "Bayu"],
            ["komoditas_id" => 4, "nama" => "Bisma"],
            ["komoditas_id" => 4, "nama" => "Guluk Guluk"],
            ["komoditas_id" => 4, "nama" => "Gumarang"],
            ["komoditas_id" => 4, "nama" => "Harapan Baru"],
            ["komoditas_id" => 4, "nama" => "Kalingga"],
            ["komoditas_id" => 4, "nama" => "Kresna"],
            ["komoditas_id" => 4, "nama" => "Lagaligo"],
            ["komoditas_id" => 4, "nama" => "Lamuru"],
            ["komoditas_id" => 4, "nama" => "Manado Kuning"],
            ["komoditas_id" => 4, "nama" => "Manding"],
            ["komoditas_id" => 4, "nama" => "Motoro Kiki"],
            ["komoditas_id" => 4, "nama" => "Nakula"],
            ["komoditas_id" => 4, "nama" => "Palaka"],
            ["komoditas_id" => 4, "nama" => "Parikesit"],
            ["komoditas_id" => 4, "nama" => "Plet Kuning"],
            ["komoditas_id" => 4, "nama" => "Provit A1"],
            ["komoditas_id" => 4, "nama" => "Provit A2"],
            ["komoditas_id" => 4, "nama" => "Rama"],
            ["komoditas_id" => 4, "nama" => "Sadewa"],
            ["komoditas_id" => 4, "nama" => "Srikandi"],
            ["komoditas_id" => 4, "nama" => "Srikandi Kunig 1"],
            ["komoditas_id" => 4, "nama" => "Srikandi Putih 1"],
            ["komoditas_id" => 4, "nama" => "Sukmaraga"],
            ["komoditas_id" => 4, "nama" => "Surya"],
            ["komoditas_id" => 4, "nama" => "Talango"],
            ["komoditas_id" => 4, "nama" => "Wisanggeni"],
            ["komoditas_id" => 4, "nama" => "Wiyasa"],
            ["komoditas_id" => 4, "nama" => "Lokal"],
        ]);
    }
}
