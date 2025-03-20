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
    public function senat()
    {
        $data = Senat::all();
        return view('frontend.table-senat', compact('data'));
    }

    public function absent($uuid)
    {
        $data = Senat::where('uuid', $uuid)->first();
        //Mahasiswa


        if ($data->status == 1) {
            $data->update(['status' => 0]);
            $senat_keluar = Senat::where('status', 0)->count();
            $totalsenat = Senat::count();
            return redirect('/input')->with([
                'message' => 'Keluar !',
                'type' => 'error', // ❌ untuk keluar
                'user_data' => $data,
                'role' => 'senat',
                'total_senat' => $totalsenat,
                'senat_keluar' => $senat_keluar
            ]);
        } else {
            $data->update(['status' => 1]);
            $senat_keluar = Senat::where('status', 0)->count();
            $totalsenat = Senat::count();
            return redirect('/input')->with([
                'message' => 'Masuk !',
                'type' => 'success',
                'user_data' => $data,
                'role' => 'senat',
                'total_senat' => $totalsenat,
                'senat_keluar' => $senat_keluar
            ]);
        }
    }
}
