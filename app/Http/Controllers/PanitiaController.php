<?php

namespace App\Http\Controllers;

use App\Models\Panitia;
use Illuminate\Http\Request;

class PanitiaController extends Controller
{
    public function panitia()
    {
        $data = Panitia::all();
        return view('frontend.table-panitia', compact('data'));
    }

    public function absent($uuid)
    {
        $data = Panitia::where('uuid', $uuid)->first();
        
        if ($data->status == 1) {
            $data->update(['status' => 0]);
            $panitia_keluar = Panitia::where('status', 0)->count();
            $total_panitia = Panitia::count();
            return redirect('/input')->with([
                'message' => 'Anda telah Keluar!',
                'type' => 'error', // ❌ untuk keluar
                'user_data' => $data,
                'role' => 'panitia',
                'total_panitia' => $total_panitia,
                'panitia_keluar' => $panitia_keluar
            ]);
            
        } else {
            $data->update(['status' => 1]);
            $panitia_keluar = Panitia::where('status', 0)->count();
            $total_panitia = Panitia::count();
            return redirect('/input')->with([
                'message' => 'Absen berhasil!',
                'type' => 'success',
                'user_data' => $data,
                'role' => 'panitia',
                'total_panitia' => $total_panitia,
                'panitia_keluar' => $panitia_keluar
            ]);
    }
    }
}
