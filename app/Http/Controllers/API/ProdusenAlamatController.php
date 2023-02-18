<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdusenAlamatController extends Controller
{
    public function index() {
        $req = app()->request;
        $list = DB::table('sibenih_mas_produsen_alamat')
            ->select(
                'sibenih_mas_produsen_alamat.*',
                'kabupaten.name as kabupaten',
                'kecamatan.name as kecamatan',
                'desa.name as desa'
            )
            ->join('master_regencies as kabupaten', 'kabupaten.id', '=', 'sibenih_mas_produsen_alamat.s2_kabupaten_id')
            ->join('master_districts as kecamatan', 'kecamatan.id', '=', 'sibenih_mas_produsen_alamat.s2_kecamatan_id')
            ->join('master_villages as desa', 'desa.id', '=', 'sibenih_mas_produsen_alamat.s2_desa_id')
        ;

        $idField = $req->idField ?? 'id';
        $displayField = $req->displayField ?? 's1_alamat_lengkap';

        if (isset($req->where)) {
            $list = $list->whereRaw($req->where);
        }

        $list = $list->get();

        $newResponse = [];
        foreach ($list as $li) {
            $newResponse[] = [
                'id' => $li->{$idField},
                'text' => $li->{$displayField},
                'kabupaten' => $li->kabupaten,
                'kecamatan' => $li->kecamatan,
                'desa' => $li->desa,
            ];
        }

        return response()->json([
            'results' => $newResponse
        ], 200);
    }
}
