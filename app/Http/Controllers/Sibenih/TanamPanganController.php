<?php

namespace App\Http\Controllers\Sibenih;

use App\Models\Produsen;
use App\Models\Kabupaten;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\ProdusenAlamat;
use Illuminate\Support\Carbon;
use App\Models\Sibenih\Varietas;
use App\Models\Sibenih\Komoditas;
use App\Models\Sibenih\KelasBenih;
use App\Models\Sibenih\TanamPangan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TanamPanganController extends Controller
{
    public function index()
    {
        $kabupatens = Kabupaten::all();
        $varietas = Varietas::all();
        $kelas_benih = KelasBenih::all();
        $komoditas = Komoditas::all();
        $produsens = Produsen::all();
        $produsenAlamat = ProdusenAlamat::all();

        $tanampangan = TanamPangan::all()->count();
        $depan = 'BTP';

        if ($tanampangan) {
            $number = $tanampangan + 1;
            if ($number < 10) {
                $nol = '00';
            } elseif ($number < 100) {
                $nol = '0';
            } else {
                $nol = '';
            }
            $nomer_antrian = $depan . $nol . $number;
        } else {
            $nomer_antrian = $depan . '001';
        }

        return view('pages.sibenih.tanamPangan.form', [
            'kabupatens' => $kabupatens,
            'varietas' => $varietas,
            'kelas_benih' => $kelas_benih,
            'komoditas' => $komoditas,
            'produsens' => $produsens,
            'produsenAlamat' => $produsenAlamat,
            'nomer_antrian' => $nomer_antrian,
        ]);
    }

    public function proccess(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "s1_nomor_lapangan" => "max:255",
            "s1_nomer_antrian" => "required",
            "s1_block" => "required",
            "s1_musim_tanam" => "required",
            "s1_komoditas_id" => "required",
            "s1_produsen_id" => "required",
            "s1_produsen_alamat_id" => "required",
            "s2_varietas_id" => "required",
            "s2_jenis_tanaman" => "required",
            "s2_tgl_panen" => "nullable|date|string",
            "s3_produsen_id" => "required",
            "s3_kelas_benih_id" => "required",
            "s3_no_kel_benih" => "required",
            "s3_no_label_sumber" => "required",
            "s3_jml_benih" => "required",
            "s2_kelas_benih_id" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('flash_error', 'Invalid input!');
        }

        $input = Arr::except($request->all(), [
            '_token', '_method', 's6_ttd',
            's6_label_benih', 's6_dena_lokasi', 's6_surat_rekom',
            's6_surat_pengantar', 's1_alamat'
        ]);

        if ($request->hasfile('s6_ttd')) {
            $input['s6_ttd'] = null;
        }

        if ($request->hasfile('s6_label_benih')) {
            $input['s6_label_benih'] = null;
        }

        if ($request->hasfile('s6_dena_lokasi')) {
            $input['s6_dena_lokasi'] = null;
        }

        if ($request->hasfile('s6_surat_rekom')) {
            $input['s6_surat_rekom'] = null;
        }

        if ($request->hasfile('s6_surat_pengantar')) {
            $input['s6_surat_pengantar'] = null;
        }

        if ($request->s7_pemeriksaan_lapangan) {
            $input['s7_pemeriksaan_lapangan'] = true;
        } else {
            $input['s7_pemeriksaan_lapangan'] = false;
        }

        if ($request->s7_disertifikasi) {
            $input['s7_disertifikasi'] = true;
        } else {
            $input['s7_disertifikasi'] = false;
        }

        $input['created_at'] = now();
        $input['s2_tgl_panen'] = new Carbon($input['s2_tgl_panen']);
        $input['s2_tgl_tebar'] = new Carbon($input['s2_tgl_tebar']);
        $input['s2_tgl_tanam'] = new Carbon($input['s2_tgl_tanam']);
        $input['s2_tgl_pendhl'] = new Carbon($input['s2_tgl_pendhl']);
        $input['s2_tgl_vegetatif'] = new Carbon($input['s2_tgl_vegetatif']);
        $input['s2_tgl_primordia'] = new Carbon($input['s2_tgl_primordia']);
        $input['s2_tgl_masak'] = new Carbon($input['s2_tgl_masak']);
        $input['admin_id'] = auth()->user()->id;

        TanamPangan::insert($input);
        
        return back()->with('flash_success', 'Data berhasil disimpan!');
    }
}
