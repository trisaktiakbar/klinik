<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\LaporanDaftarController;
use App\Http\Controllers\LaporanPasienController;
use App\Http\Controllers\PasienController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PoliController;

Route::middleware([Authenticate::class])->group(function () {
    Route::resource('poli', PoliController::class);
    Route::resource('pasien', PasienController::class);
    Route::resource('daftar', DaftarController::class);

    Route::get('daftar/{id}/diagnosis-tindakan', [DaftarController::class, 'show']);
    Route::put('daftar/{id}/diagnosis-tindakan', [DaftarController::class, 'updateDiagnosa']);

    Route::resource('laporan-pasien', LaporanPasienController::class);
    Route::resource('laporan-daftar', LaporanDaftarController::class);
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});


Route::get('mahasiswa', [MahasiswaController::class, 'index']);

Route::get('profil', function () {
    return "Hello World";
});

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
