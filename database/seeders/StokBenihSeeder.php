<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokBenihSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sibenih_stok_benih')->insert([
            [
                'tgl' => '2022-10-07',
                'komoditas' => 'Padi Hibrida',
                'nama_pt' => 'PT. Produsen Sibenih',
                'alamat_usaha' => 'Palembang, Sumatera Selatan',
                'tlp' => '1234567890',
                'varietas' => 'BSHS 1H',
                'kelas_benih' => 'BP',
                'kota' => 'Empat Lawang',
                'stok_benih' => '9',
                'user' => '',
            ],
            [
                'tgl' => '2022-10-19',
                'komoditas' => 'Padi Hibrida',
                'nama_pt' => 'PT. Produsen Sibenih',
                'alamat_usaha' => 'Palembang, Sumatera Selatan',
                'tlp' => '1234567890',
                'varietas' => 'Adirasa-64',
                'kelas_benih' => 'BP',
                'kota' => 'Musi Rawas',
                'stok_benih' => '7',
                'user' => '',
            ],
            [
                'tgl' => '2022-09-23',
                'komoditas' => 'Padi Non Hibrida',
                'nama_pt' => 'PT. Produsen Sibenih',
                'alamat_usaha' => 'Palembang, Sumatera Selatan',
                'tlp' => '1234567890',
                'varietas' => 'Tuntang',
                'kelas_benih' => 'BP',
                'kota' => 'OKUT',
                'stok_benih' => '4',
                'user' => '',
            ],
            [
                'tgl' => '2022-09-23',
                'komoditas' => 'Jagung Hibrida',
                'nama_pt' => 'PT. Produsen Sibenih',
                'alamat_usaha' => 'Palembang, Sumatera Selatan',
                'tlp' => '1234567890',
                'varietas' => 'AS-4',
                'kelas_benih' => 'BD',
                'kota' => 'OKUT',
                'stok_benih' => '77',
                'user' => '',
            ],
            [
                'tgl' => '2022-09-23',
                'komoditas' => 'Jagung Hibrida',
                'nama_pt' => 'PT. Produsen Sibenih',
                'alamat_usaha' => 'Palembang, Sumatera Selatan',
                'tlp' => '1234567890',
                'varietas' => 'AS-3',
                'kelas_benih' => 'BP',
                'kota' => 'OKUT',
                'stok_benih' => '4',
                'user' => '',
            ],
            [
                'tgl' => '2022-09-23',
                'komoditas' => 'Jagung Hibrida',
                'nama_pt' => 'PT. Produsen Sibenih',
                'alamat_usaha' => 'Palembang, Sumatera Selatan',
                'tlp' => '1234567890',
                'varietas' => 'A1',
                'kelas_benih' => 'BS',
                'kota' => 'OKUT',
                'stok_benih' => '9',
                'user' => '',
            ],
            [
                'tgl' => '2022-09-23',
                'komoditas' => 'Jagung Komposit',
                'nama_pt' => 'PT. Produsen Sibenih',
                'alamat_usaha' => 'Palembang, Sumatera Selatan',
                'tlp' => '1234567890',
                'varietas' => 'Nakula',
                'kelas_benih' => 'BS',
                'kota' => 'OKUT',
                'stok_benih' => '9999',
                'user' => '',
            ]
        ]);
    }
}
