<?php

namespace App\Http\Controllers;
require '../vendor/autoload.php';
use App\Models\Senat;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class SenatController extends Controller
{
    public function senat(){
        $data = Senat::all();
        return view('frontend.table-senat', compact('data'));
    }
    
    public function absent($uuid){
        $data = Senat::where('uuid', $uuid)->first();
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
