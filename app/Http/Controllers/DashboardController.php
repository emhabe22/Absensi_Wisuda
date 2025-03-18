<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\OrangTua;
use App\Models\Panitia;
use App\Models\Rektorat;
use App\Models\Senat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung jumlah total setiap kategori
        $all = Mahasiswa::count();
        $all2 = OrangTua::count();
        $all3 = Panitia::count();
        $all4 = Senat::count();
        $all5 = Rektorat::count();
        $all6 = $all + $all2 + $all3 + $all4 + $all5; // Total keseluruhan

        $mahasiswa = Mahasiswa::all(); // Ambil semua data mahasiswa
        $orangtua = OrangTua::all(); // Ambil semua data orangtua
        $panitia = Panitia::all(); // Ambil semua data panitia
        $senat = Senat::all(); // Ambil semua data senat
        $rektorat = Rektorat::all(); // Ambil semua data rektorat

        return view('welcome', compact(
            'all',
            'mahasiswa',
            'all2',
            'orangtua',
            'all3',
            'panitia',
            'all4',
            'senat',
            'all5',
            'rektorat',
            'all6'
        ));
    }
}
