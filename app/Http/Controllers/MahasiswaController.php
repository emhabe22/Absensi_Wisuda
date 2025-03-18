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
        //Mahasiswa
        $data->refresh(); // Ambil ulang data dari database sebelum mengubah status

        if ($data->status == 1) {
            $data->update(['status' => 0]);
            return redirect('/input')->with([
                'message' => 'Anda telah Keluar!',
                'type' => 'error', // ❌ untuk keluar
                'mahasiswa' => $data
            ]);
            
        } else {
            $data->update(['status' => 1]);
            return redirect('/input')->with([
                'message' => 'Absen berhasil!',
                'type' => 'success',
                'mahasiswa' => $data
            ]);
    }
    }
}