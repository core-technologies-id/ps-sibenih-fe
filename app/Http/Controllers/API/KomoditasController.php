<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Sibenih\Master\Komoditas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KomoditasController extends Controller
{
    public function index() {
        $req = app()->request;
        $list = DB::table('sibenih_mas_komoditas');

        $idField = $req->idField ?? 'id';
        $displayField = $req->displayField ?? 'nama';

        if (isset($req->where)) {
            $list = $list->whereRaw($req->where);
        }

        $list = $list->get();

        $newResponse = [];
        foreach ($list as $li) {
            $newResponse[] = [
                'id' => $li->{$idField},
                'text' => $li->{$displayField}
            ];
        }

        return response()->json([
            'results' => $newResponse
        ], 200);
    }
}
