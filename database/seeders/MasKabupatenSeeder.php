<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasKabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sibenih_mas_kabupaten')->insert([
            ['nama' => 'Palembang'],
            ['nama' => 'Prabumulih'],
            ['nama' => 'Muara Enim'],
            ['nama' => 'OKU'],
            ['nama' => 'OKUT'],
            ['nama' => 'OKUS'],
            ['nama' => 'Musi Rawas'],
            ['nama' => 'Lubuklinggau'],
            ['nama' => 'Musi Rawas Utara'],
            ['nama' => 'PALI'],
            ['nama' => 'Empat Lawang'],
            ['nama' => 'Pagar Alam'],
            ['nama' => 'Lahat'],
            ['nama' => 'Ogan Ilir'],
            ['nama' => 'OKI'],
            ['nama' => 'Banyuasin'],
            ['nama' => 'Musi Banyuasin'],
        ]);
    }
}
