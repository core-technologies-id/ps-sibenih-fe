<?php

namespace App\Http\Controllers\Sibenih;

use App\Http\Controllers\Controller;
use App\Models\Produsen;
use App\Models\Sibenih\KelasBenih;
use App\Models\Sibenih\Komoditas;
use App\Models\Sibenih\StokBenih;
use App\Models\Sibenih\Varietas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StokBenihController extends Controller
{
    public function get_data(Request $request)
    {
        $all = $request->all();
        $req = DB::table('sibenih_stok_benih as main')
                ->selectRaw('main.*, prod.nama_pt as produsen, prod.kota as kota, komoditas.nama as komoditas, varietas.nama as varietas, kelas.nama as kelas')
                ->leftJoin('sibenih_produsen as prod', 'prod.id', '=', 'main.produsen_id')
                ->leftJoin('sibenih_mas_komoditas as komoditas', 'komoditas.id', '=', 'main.s2_komoditas_id')
                ->leftJoin('sibenih_mas_varietas as varietas', 'varietas.id', '=', 'main.s2_varietas_id')
                ->leftJoin('sibenih_mas_kelas as kelas', 'kelas.id', '=', 'main.s2_kelas_benih_id');

        if (isset($request->komoditas_id)) {
            $req = $req->where('main.s2_komoditas_id', $request->komoditas_id);
        }
        if (isset($request->varietas_id)) {
            $req = $req->where('main.s2_varietas_id', $request->varietas_id);
        }
        if (isset($request->kelas_benih_id)) {
            $req = $req->where('main.s2_kelas_benih_id', $request->kelas_benih_id);
        }
        if (isset($request->city)) {
            $req = $req->where('prod.kota', $request->city);
        }

        $req = $req->get();

        return response()->json([
            'data' => $req
        ]);
    }

    public function index()
    {
        $prods = Produsen::all();
        $komoditas = Komoditas::all();
        $varietas = Varietas::all();
        $kelas_benih = KelasBenih::all();
        return view('pages.sibenih.stokBenih.form', [
            'prods' => $prods,
            'komoditas' => $komoditas,
            'varietas' => $varietas,
            'kelas_benih' => $kelas_benih
        ]);
    }

    public function proccess(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'nama_pt' => 'required|string',
            'produsen_id' => 'required|integer',
            's2_komoditas_id' => 'required',
            's2_varietas_id' => 'required',
            // 'kelas_benih' => 'required|string',
            's2_kelas_benih_id' => 'required|string',
            // 'alamat_usaha' => 'required|string',
            // 'tlp' => 'required|string',
            // 'kota' => 'required|string',
            'sisa_stok_benih' => 'required|numeric',
            'produksi_benih' => 'required|numeric',
            'pengadaan_luar_provinsi' => 'required|numeric',
            'jml_stok_benih' => 'required|numeric',
            'benih_bantuan' => 'required|numeric',
            'non_benih_bantuan' => 'required|numeric',
            'penyaluran_luar_provinsi' => 'required|numeric',
            'jml_penyaluran_benih' => 'required|numeric',
            'sisa_bulan_ini' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('flash_error', 'Invalid input!');
        }

        $input = Arr::except($request->all(), ['_token', 'model', '_method', 'tlp', 'alamat_usaha', 'kota']);
        $input['tgl'] = Carbon::now();
        $input['user'] = null;

        StokBenih::insert($input);
        return back()->with('flash_success', 'Data berhasil disimpan!');
    }
}
