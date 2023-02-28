<?php

namespace App\Http\Controllers\Sibenih;

use App\Http\Controllers\Controller;
use App\Models\Sibenih\PohonInduk;
use Illuminate\Http\Request;

class PohonIndukController extends Controller
{
    public function index()
    {
        $pohonInduks = PohonInduk::join('sibenih_mas_varietas as varietas', 'varietas.id', '=', 'sibenih_pohon_induk.s1_varietas_id')
            ->join('sibenih_mas_komoditas as komoditas', 'komoditas.id', '=', 'sibenih_pohon_induk.s1_komoditas_id')
            ->join('pentas_sitepat_user as user', 'user.id', '=', 'sibenih_pohon_induk.admin_id')
            ->select(
                'sibenih_pohon_induk.*',
                'komoditas.nama as komoditas_nama',
                'varietas.nama as varietas_nama',
                'user.name as admin_name'
            )->get();

        return view('pages.sibenih.pohonInduk.view', [
            'pohonInduks' => $pohonInduks
        ]);
    }
}
