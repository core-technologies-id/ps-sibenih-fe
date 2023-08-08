<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\User;
use App\Models\Produsen;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\sibenih_mas_kabupaten;
use Illuminate\Support\Facades\Validator;

class RegistrasiController extends Controller
{
    public function index()
    {
        $produsen = Produsen::select('nomor_tiket')->where('nomor_tiket', '!=', null)->count();
        $depan = 'A';

        if ($produsen) {
            $number = $produsen + 1;
            if ($number < 10) {
                $nol = '000';
            } elseif ($number < 100) {
                $nol = '00';
            } elseif ($number < 1000) {
                $nol = '0';
            } else {
                $nol = '';
            }
            $nomer_tiket = $depan . $nol . $number;
        } else {
            $nomer_tiket = $depan . '0001';
        }
        $kabs = Kabupaten::all();
        return view('pages.registrasi.index', compact('kabs', 'nomer_tiket'));
    }

    public function export()
    {

        $data = User::where('status_usaha', '=', null)->orderBy('id', 'DESC')->first();
        $pdf = PDF::loadView('pages.registrasi.form_register_petani', compact('data'));
        return $pdf->stream("form_register_petani " . date('d-m-Y') . '.pdf');
    }

    public function process(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'is_petani' => 'required|string',
            'nomor_tiket' => 'required|string|unique:sibenih_produsen,nomor_tiket',
            'nomor_rekomendasi' => 'required|string',
            'nama_pt' => 'required|string|unique:sibenih_produsen,nama_pt', //Kelompok Tani / Perusahaan
            'tahun_usaha' => 'required|string',
            'npwp' => 'required|string',
            'nama_pimpinan' => 'required|string', //Nama Petani / Pimpinan
            'nik_pimpinan' => 'required|string',
            'alamat_usaha' => 'required|string', //Alamat
            'kota' => 'required|string',
            'hp' => 'required|numeric|unique:sibenih_produsen,hp', //Nomor HP
            'email' => 'nullable|string', //Alamat email
            'status_usaha' => 'required|string',
            'bentuk_usaha' => 'required|string',
            'foto_pimpinan' => 'nullable|file|max:2048',
            'logo_usaha' => 'nullable|file|max:2048',
            'foto_ktp' => 'nullable|file|max:2048', // Upload foto KTP
            'username' => 'required|string|unique:sibenih_produsen,username',
            'password' => 'required|string',
            'password_conf' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('flash_error', 'Invalid input!');
        }

        Produsen::insert([
            // 'is_petani' => $request->is_petani,
            'nomor_tiket' => $request->nomor_tiket,
            'nomor_rekomendasi' => $request->nomor_rekomendasi,
            'nama_pt' => $request->nama_pt,
            'tahun_usaha' => $request->tahun_usaha,
            'npwp' => $request->npwp,
            'nama_pimpinan' => $request->nama_pimpinan,
            'nik_pimpinan' => $request->nik_pimpinan,
            'alamat_usaha' => $request->alamat_usaha,
            'kota' => $request->kota,
            'hp' => $request->hp,
            'email' => $request->email,
            'status_usaha' => $request->status_usaha,
            'bentuk_usaha' => $request->bentuk_usaha,
            'foto_pimpinan' => $request->foto_pimpinan,
            'logo_usaha' => $request->logo_usaha,
            'foto_ktp' => $request->foto_ktp,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'created_at' => now(),
        ]);

        return redirect('login')->with('success', 'Registrasi Berhasil!');
    }
}
