<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function get_komoditas() {
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
    public function get_kelas_benih() {
        $req = app()->request;
        $list = DB::table('sibenih_mas_kelas');

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

    public function get_varietas() {
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
    public function get_kota() {
        $req = app()->request;
        $list = DB::table('sibenih_mas_kabupaten');

        $idField = $req->idField ?? 'nama';
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
    public function index()
    {
        $news = DB::table('pentas_sitepat_news')->orderBy('id', 'DESC')->limit(6)->get();
        return view('pages.home', [
            'news' => $news,
        ]);
    }

    public function search_produk(Request $request) {
        $validator = Validator::make($request->all(), [
            'tgl_mulai' => 'required',
            'tgl_sampai' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('flash_error', 'Invalid input!');
        }

        $data_produk = DB::table('sibenih_stok_benih')
            ->join('sibenih_mas_komoditas as komoditas', 'komoditas.id', '=', 'sibenih_stok_benih.s2_komoditas_id')
            ->join('sibenih_mas_varietas as varietas', 'varietas.id', '=', 'sibenih_stok_benih.s2_varietas_id')
            ->join('sibenih_mas_kelas as kelas', 'kelas.id', '=', 'sibenih_stok_benih.s2_kelas_benih_id')
            ->join('sibenih_produsen', 'sibenih_stok_benih.produsen_id', '=', 'sibenih_produsen.id' )
        ;

        if (isset($request->kota)) {
            $data_produk = $data_produk->where('sibenih_produsen.kota', $request->kota);
        }
        if (isset($request->komoditas_id)) {
            $data_produk = $data_produk->where('sibenih_stok_benih.s2_komoditas_id', $request->komoditas_id);
        }
        if (isset($request->varietas_id)) {
            $data_produk = $data_produk->where('sibenih_stok_benih.s2_varietas_id', $request->varietas_id);
        }
        if (isset($request->kelas_benih_id)) {
            $data_produk = $data_produk->where('sibenih_stok_benih.s2_kelas_benih_id', $request->kelas_benih_id);
        }

        $data_produk = $data_produk
            ->select(
                'sibenih_stok_benih.*',
                'komoditas.nama as komoditas',
                'varietas.nama as varietas',
                'sibenih_produsen.nama_pt as nama_prod',
                'kelas.nama as kelas'
            )
            ->get();

        return view('pages.produk_benih', compact('data_produk'));
    }

    public function detail_news($id)
    {
        $data = DB::table('pentas_sitepat_news')->where('id', $id)->first();

        return view('pages.detailNews', [
            'data' => $data
        ]);
    }

    public function all_news()
    {
        $news = DB::table('pentas_sitepat_news')->orderBy('id', 'DESC')->paginate(9);
        return view('pages.allNews', [
            'news' => $news
        ]);
    }
}
