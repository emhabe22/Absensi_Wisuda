<?php

namespace App\Http\Controllers;
use App\Models\Rektorat;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class RektoratController extends Controller
{
    public function rektorat(){
        $data = Rektorat::all();
        return view('frontend.table-rektorat', compact('data'));
    }
    public function absent($uuid){
        $data = Rektorat::where('uuid', $uuid)->first();
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
