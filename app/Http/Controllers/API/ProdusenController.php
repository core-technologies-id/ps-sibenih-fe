<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdusenController extends Controller
{
    public function index() {
        $req = app()->request;
        $list = DB::table('sibenih_produsen');

        $idField = $req->idField ?? 'id';
        $displayField = $req->displayField ?? 'nama_pt';

        if (isset($req->where)) {
            $list = $list->whereRaw($req->where);
        }

        $list = $list->get();

        $newResponse = [];
        foreach ($list as $li) {
            
            $newResponse[] = [
                'id' => $li->{$idField},
                'text' => $li->{$displayField},
            ];
        }

        return response()->json([
            'results' => $newResponse
        ], 200);
    }
}
