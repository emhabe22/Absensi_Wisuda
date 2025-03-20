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

    public function absent($id)
    {
        $data = Panitia::find($id);

        if (!$data) {
            return redirect('/input')->with([
                'message' => 'Data tidak ditemukan!',
                'type' => 'error'
            ]);
        }

        // Update status absen
        $data->update(['status' => $data->status == 1 ? 0 : 1]);

        return redirect('/input')->with([
            'message' => $data->status == 1 ? 'Absen berhasil!' : 'Anda telah Keluar!',
            'type' => $data->status == 1 ? 'success' : 'error'
        ]);
    }
}
