<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\OrangTua;
use App\Models\Panitia;
use App\Models\Rektorat;
use App\Models\Senat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $all = Mahasiswa::count();
        $all2 = OrangTua::count();
        $all3 = Panitia::count();
        $all4 = Senat::count();
        $all5 = Rektorat::count();
        $all6 = $all + $all2 + $all3 + $all4 + $all5; // Menjumlahkan semua data

        $mahasiswa = Mahasiswa::all(); // Ambil semua data mahasiswa

        return view('welcome', compact('all', 'mahasiswa', 'all2', 'all3', 'all4', 'all5', 'all6',));
    }

    public function mahasiswaList()
    {
        $mahasiswa = DB::table('mahasiswas')->select('nama', 'nim', 'jurusan')->get();
        return view('frontend.tabel-mahasiswa', compact('mahasiswa'));
    }
}
