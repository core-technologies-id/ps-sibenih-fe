<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('root');
Route::get('/info-perbenihan/ketersediaan-benih', [\App\Http\Controllers\InfoPerbenihan\KetersediaanBenihController::class, 'index'])->name('InfoPerbenihan.KetersediaanBenih');
Route::post('/info-perbenihan/ketersediaan-benih', [\App\Http\Controllers\InfoPerbenihan\KetersediaanBenihController::class, 'search'])->name('InfoPerbenihan.KetersediaanBenih.search');
Route::get('/info-perbenihan/laporan-penyaluran-benih', function () {
    return view('pages.info_perbenihan.lap_penyaluran_benih');
})->name('InfoPerbenihan.LapPenyaluranBenih');
Route::get('/info-perbenihan/laporan-produksi-benih', function () {
    return view('pages.info_perbenihan.lap_produksi_benih');
})->name('InfoPerbenihan.LapProduksiBenih');
Route::get('/bpsbtph-sumsel/prosedur-pelayanan', function () {
    return view('pages.bpsbtph_sumsel.prosedur_pelayanan');
})->name('BpsbtphSumsel.ProsedurPelayanan');

Route::get('/download', [\App\Http\Controllers\DownloadController::class, 'index'])->name('download');

// Auth
Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Penyebaran Varietas
Route::resource('penyebaran_varietas', \App\Http\Controllers\Sibenih\PenyebaranVarietasController::class)->middleware('auth');

// registrasi
Route::get('/registrasi', [\App\Http\Controllers\RegistrasiController::class, 'index'])->name('registrasi')->middleware('guest');
Route::post('/registrasi/process', [\App\Http\Controllers\RegistrasiController::class, 'process'])->name('registrasi.process')->middleware('guest');

// Export data petani registrasi
Route::get('/registrasi/export', [\App\Http\Controllers\RegistrasiController::class, 'export'])->name('registrasi.export')->middleware('guest');

// stok beni
Route::get('/stokBenih', [\App\Http\Controllers\Sibenih\StokBenihController::class, 'index'])->name('stokBenih')->middleware('auth');
Route::post('/stokBenih', [\App\Http\Controllers\Sibenih\StokBenihController::class, 'proccess'])->name('stokBenih.proccess')->middleware('auth');

// tanampangan
Route::resource('tanampangan', \App\Http\Controllers\Sibenih\TanamPanganController::class)->middleware('auth');
Route::get('/tanampangan/daftar_permohonan/print/{id}', [\App\Http\Controllers\Sibenih\TanamPanganController::class, 'export'])->name('tanampangan.daftar_permohonan.print')->middleware('auth');


Route::get('/varietas/get_data', [\App\Http\Controllers\Sibenih\VarietasController::class, 'get_data'])->name('varietas.get_data')->middleware('auth');
Route::get('/produsen/get_data', [\App\Http\Controllers\Sibenih\ProdusenController::class, 'get_data'])->name('produsen.get_data');
Route::get('/produsen_alamat/get_produsen', [\App\Http\Controllers\Sibenih\ProdusenAlamatController::class, 'get_produsen'])->name('produsen_alamat.get_produsen');
Route::get('/produsen_alamat/data_alamat', [\App\Http\Controllers\Sibenih\ProdusenAlamatController::class, 'data_alamat'])->name('produsen_alamat.data_alamat');