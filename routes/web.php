<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\OrangTuaController;
use App\Http\Controllers\PanitiaController;
use App\Models\Mahasiswa;
use App\Models\OrangTua;
use App\Models\Panitia;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('welcome');
});

// Login
Route::group(['middleware'], function () {
    Route::get('/', [LoginController::class, 'login'])->name('login');
    Route::post('/', [LoginController::class, 'loginPost']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'mahasiswa'])->name('mahasiswa');
Route::post('/absent/{nim}', [MahasiswaController::class, 'absent'])->name('absent');
Route::post('/absentOut/{nim}', [MahasiswaController::class, 'absentOut'])->name('absentOut');

// Orang Tua
Route::get('/orangtua', [OrangTuaController::class, 'orangtua'])->name('orangtua');

// Panitia
Route::get('/panitia', [PanitiaController::class, 'panitia'])->name('panitia');

Route::get('/input', function () {
    return view('frontend.form-input');
});
