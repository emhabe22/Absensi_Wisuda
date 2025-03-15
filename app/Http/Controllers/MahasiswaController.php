<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function scan($nim)
    {
        $data = Mahasiswa::where('nim', $nim)->first();
        if (!$data) {
            return abort(404);
        }
        return response()->json($data);
    }
}
