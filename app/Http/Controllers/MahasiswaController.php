<?php

namespace App\Http\Controllers;

require '../vendor/autoload.php';

use App\Models\Mahasiswa;
use App\Models\OrangTua;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Illuminate\Support\Facades\Session;

class MahasiswaController extends Controller
{
    public function mahasiswa()
    {
        $data = Mahasiswa::all();
        return view('frontend.table-mahasiswa', compact('data'));
    }

    public function absent($nim)
    {
        $data = Mahasiswa::where('nim', $nim)->first();

        // Pastikan data ditemukan sebelum mengakses properti status
        if (!$data) {
            return redirect('/input')->with([
                'message' => 'Data dengan NIM tersebut tidak ditemukan!',
                'type' => 'error'
            ]);
        }

        if ($data->status == 1) {
            $data->update(['status' => 0]);
            $mahasiswaKeluar = Mahasiswa::where('status', 0)->count();
            $totalMahasiswa = Mahasiswa::count();

            return redirect('/input')->with([
                'message' => 'Keluar!',
                'type' => 'error', // ❌ untuk keluar
                'user_data' => $data,
                'role' => 'mahasiswa',
                'total_mahasiswa' => $totalMahasiswa,
                'mahasiswa_keluar' => $mahasiswaKeluar
            ]);
        } else {
            $data->update(['status' => 1]);
            $mahasiswaKeluar = Mahasiswa::where('status', 0)->count();
            $totalMahasiswa = Mahasiswa::count();

            return redirect('/input')->with([
                'message' => 'Masuk!',
                'type' => 'success',
                'user_data' => $data,
                'role' => 'mahasiswa',
                'total_mahasiswa' => $totalMahasiswa,
                'mahasiswa_keluar' => $mahasiswaKeluar
            ]);
        }
    }
}
