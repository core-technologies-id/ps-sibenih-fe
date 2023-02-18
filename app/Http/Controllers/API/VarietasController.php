<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VarietasController extends Controller
{
    public function index() {
        $req = app()->request;
        $list = DB::table('sibenih_mas_varietas');

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
