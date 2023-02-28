<?php

namespace App\Http\Controllers\Sibenih;

use App\Http\Controllers\Controller;
use App\Models\Sibenih\Master\Kabupaten;
use App\Models\Sibenih\Master\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function get_data(Request $request)
    {
        if (isset($request->kabupaten)) {
            $data = new Kecamatan();
            $kom = new Kabupaten();
            $data = $data->where('idkabupaten', $request->kabupaten)->get();
            if ($data) {
                return response()->json($data, 200);
            }
            return response()->json([], 200);
        } else {
            $data = new Kecamatan();
            return response()->json($data->get(), 200);
        }
    }
}
