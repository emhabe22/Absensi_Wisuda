<?php

use App\Http\Controllers\MahasiswaController;
use App\Models\Mahasiswa;
use App\Models\OrangTua;
use App\Models\Panitia;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mahasiswa', function () {
    $data = Mahasiswa::all();
    return view('frontend.table-mahasiswa',compact('data'));
});

Route::get('/orangtua', function () {
    $data = OrangTua::all();
    return view('frontend.table-orangtua',compact('data'));
});

Route::get('/panitia', function () {
    $data = Panitia::all();
    return view('frontend.table-panitia',compact('data'));
});
Route::get('/input', function () {
    return view('frontend.form-input');
});
Route::get('/absent', [MahasiswaController::class, 'absent'])->name('absent');
Route::get('/absentOut', [MahasiswaController::class, 'absentOut'])->name('absentOut');
