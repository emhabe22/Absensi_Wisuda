<?php

namespace App\Http\Controllers;

use App\Models\OrangTua;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Illuminate\Support\Facades\Session;
class OrangTuaController extends Controller
{
    public function orangtua(){
        $data = OrangTua::with('mahasiswa')->get();
        return view('frontend.table-orangtua', compact('data'));
    }

    public function absent($id){
    $data = OrangTua::where('id', $id)->first();
    //Mahasiswa
    $data->refresh(); // Ambil ulang data dari database sebelum mengubah status
    if ($data->status == 1) {
        $data->update(['status' => 0]);
        return redirect('/input')->with([
            'message' => 'Anda telah Keluar!',
            'type' => 'error', // ❌ untuk keluar
            'user_data' => $data,
            'role' => 'senat',
        ]);
        
    } else {
        $data->update(['status' => 1]);
        return redirect('/input')->with([
            'message' => 'Absen berhasil!',
            'type' => 'success',
            'user_data' => $data,
            'role' => 'senat',
        ]);
}
    }
}
