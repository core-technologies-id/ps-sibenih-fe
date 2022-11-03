<?php

namespace App\Http\Controllers\InfoPerbenihan;

use App\Http\Controllers\Controller;
use App\Models\sibenih_mas_kabupaten;
use App\Models\sibenih_mas_kelas;
use App\Models\sibenih_mas_komoditas;
use App\Models\sibenih_mas_varietas;
use App\Models\sibenih_stok_benih;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class KetersediaanBenihController extends Controller
{
    public function index()
    {
        $komoditas = new sibenih_mas_komoditas();
        $komoditas = $komoditas->get();
        $kelas = new sibenih_mas_kelas();
        $kelas = $kelas->get();
        $varietas = new sibenih_mas_varietas();
        $varietas = $varietas->get();
        $kabupaten = new sibenih_mas_kabupaten();
        $kabupaten = $kabupaten->get();
        return view('pages.info_perbenihan.ketersediaan_benih', compact('komoditas','kelas','varietas','kabupaten'));
    }

    public function search(Request $request) {
        $komoditas = new sibenih_mas_komoditas();
        $komoditas = $komoditas->get();
        $kelas = new sibenih_mas_kelas();
        $kelas = $kelas->get();
        $varietas = new sibenih_mas_varietas();
        $varietas = $varietas->get();
        $kabupaten = new sibenih_mas_kabupaten();
        $kabupaten = $kabupaten->get();

        $sibenih = new sibenih_stok_benih();
        $wheres = [];
        if (isset($request->komoditas_value)) {
            $wheres[] = ['komoditas', '=', $request->komoditas_value];
        }
        $sibenih = $sibenih->where($wheres)->get();
        $c_val = Arr::except($request->all(), '_token');

        return view('pages.info_perbenihan.ketersediaan_benih', compact('komoditas','kelas','varietas','kabupaten','sibenih','c_val'));
    }
}
