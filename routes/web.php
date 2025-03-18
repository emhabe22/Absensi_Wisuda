<?php

use App\Http\Controllers\{
    DashboardController,
    LoginController,
    MahasiswaController,
    OrangTuaController,
    PanitiaController,
    RektoratController,
    SenatController
};
use Illuminate\Support\Facades\Route;

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Login
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/', [LoginController::class, 'loginPost']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // Mahasiswa
    Route::get('/mahasiswa', [MahasiswaController::class, 'mahasiswa'])->name('mahasiswa');
    Route::get('/mahasiswa/edit/{nim}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::post('/mahasiswa/update/{nim}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');

    // Orang Tua
    Route::get('/orangtua', [OrangTuaController::class, 'orangtua'])->name('orangtua');

    // Panitia
    Route::get('/panitia', [PanitiaController::class, 'panitia'])->name('panitia');

    // Form Input
    Route::get('/input', fn() => view('frontend.form-input'));

    // Edit Mahasiswa
    Route::get('/editmahasiswa', fn() => view('frontend.edit-mahasiswa'));
});

// Absent Routes
Route::post('/absent/{nim}', [MahasiswaController::class, 'absent'])->name('mahasiswa.absent');
Route::post('/parent-absent/{id}', [OrangTuaController::class, 'absent'])->name('orangtua.absent');
Route::post('/senat-absent/{uuid}', [SenatController::class, 'absent'])->name('senat.absent');
Route::post('/rektorat-absent/{uuid}', [RektoratController::class, 'absent'])->name('rektorat.absent');

// Senat
Route::get('/senat', [SenatController::class, 'senat'])->name('senat');

// Rektorat
Route::get('/rektorat', [RektoratController::class, 'rektorat'])->name('rektorat');
