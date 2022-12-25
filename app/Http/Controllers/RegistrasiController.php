<?php

namespace App\Http\Controllers;

use App\Models\Produsen;
use App\Models\sibenih_mas_kabupaten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $kabs = sibenih_mas_kabupaten::all();
        return view('pages.registrasi.index', compact('kabs', 'nomer_tiket'));
    }

    public function process(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomor_tiket' => 'required|string|unique:sibenih_produsen,nomor_tiket',
            'nama_pt' => 'required|string|unique:sibenih_produsen,nama_pt',
            'tahun_usaha' => 'required|string',
            'npwp' => 'required|string',
            'nama_pimpinan' => 'required|string',
            'nik_pimpinan' => 'required|string',
            'alamat_usaha' => 'required|string',
            'kota' => 'required|string',
            'hp' => 'required|string|unique:sibenih_produsen,hp',
            'email' => 'required|string',
            'status_usaha' => 'required|string',
            'bentuk_usaha' => 'required|string',
            'logo_usaha' => 'nullable|string',
            'foto_pimpinan' => 'nullable|string',
            'foto_ktp' => 'nullable|string',
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
            'nama_pt' => $request->nama_pt,
            'nomor_tiket' => $request->nomor_tiket,
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
            'logo_usaha' => $request->logo_usaha,
            'foto_pimpinan' => $request->foto_pimpinan,
            'foto_ktp' => $request->foto_ktp,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'created_at' => now()
        ]);

        // return redirect('/login')->with('flash_success', 'Registrasi Berhasil!');
        return back()->with('flash_success', 'Registrasi Berhasil!');
    }
}
