<?php

namespace App\Http\Controllers\Sibenih;

use App\Http\Controllers\Controller;
use App\Models\ProdusenAlamat;
use App\Models\Produsen;
use App\Models\Kecamatan;
use App\Models\Kabupaten;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class ProdusenAlamatController extends Controller
{
    // return $request;
    public function get_produsen(Request $request)
    {
        if (isset($request->id)) {
            $data = new ProdusenAlamat();
            $data = $data->where('s1_produsen_id', $request->id)->get();
            if ($data) {
                return response()->json($data, 200);
            }
            return response()->json([], 200);
        } else {
            $data = new Produsen();
            return response()->json($data->get(), 200);
        }
    }

    public function data_alamat(Request $request)
    {
        if (isset($request->id)) {
            $data = new ProdusenAlamat();
            $data = $data->join('sibenih_mas_kabupaten as kabupaten', 'kabupaten.id', '=', 'sibenih_mas_produsen_alamat.s2_kabupaten_id')
                ->join('sisaras_kecamatan as kecamatan', 'kecamatan.idkecamatan', '=', 'sibenih_mas_produsen_alamat.s2_kecamatan_id')
                ->select(
                    'sibenih_mas_produsen_alamat.*',
                    'kabupaten.nama as kabupaten',
                    'kecamatan.kecamatan as kecamatan',
                )
                ->get();
            $data = $data->where('id', $request->id)->first();
            if ($data) {
                return response()->json($data, 200);
            }
            return response()->json([], 200);
        } else {
            $data = new ProdusenAlamat();
            return response()->json($data->get(), 200);
        }
    }   
}
