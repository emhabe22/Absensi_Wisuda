<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\OrangTuaController;
use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\RektoratController;
use App\Http\Controllers\SenatController;
use App\Models\Mahasiswa;
use App\Models\OrangTua;
use App\Models\Panitia;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    $all=Mahasiswa::all()->count();
    $all2=OrangTua::all()->count();
    $all3= $all + $all2;
    $all4=Panitia::all()->count();
    return view('welcome',compact('all3','all2','all','all4'));
});

// Login
    Route::get('/', [LoginController::class, 'login'])->name('login');
    Route::post('/', [LoginController::class, 'loginPost']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::middleware(['auth'])->group(function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'mahasiswa'])->name('mahasiswa');
    Route::get('/mahasiswa/edit/{nim}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::post('/mahasiswa/update/{nim}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
// Orang Tua
Route::get('/orangtua', [OrangTuaController::class, 'orangtua'])->name('orangtua');

// Panitia
Route::get('/panitia', [PanitiaController::class, 'panitia'])->name('panitia');
Route::get('/input', function () {
    return view('frontend.form-input');
});

Route::get('/editmahasiswa', function () {
    return view('frontend.edit-mahasiswa');
});
});
// Mahasiswa

Route::post('/absent/{nim}', [MahasiswaController::class, 'absent'])->name('absent');
Route::post('/parent-absent/{id}', [OrangTuaController::class, 'absent'])->name('absent');
Route::post('/senat-absent/{id}', [SenatController::class, 'absent'])->name('absent');
Route::post('/rektorat-absent/{id}', [RektoratController::class, 'absent'])->name('absent');




