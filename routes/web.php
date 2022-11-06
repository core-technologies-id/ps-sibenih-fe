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
Route::get('/info-perbenihan/laporan-penyaluran-benih', function() {
    return view('pages.info_perbenihan.lap_penyaluran_benih');
})->name('InfoPerbenihan.LapPenyaluranBenih');
Route::get('/info-perbenihan/laporan-produksi-benih', function() {
    return view('pages.info_perbenihan.lap_produksi_benih');
})->name('InfoPerbenihan.LapProduksiBenih');
