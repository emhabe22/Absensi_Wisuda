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

    public function absent(Request $request,$id){
        $data = Mahasiswa::where('id', $id)->findOrFail();

        $data->update([
            'status' => true
        ]);
        $data->save();
        return redirect('/mahasiswa');
    }

    public function absentOut($id){
        $data = Mahasiswa::where('id', $id)->where('status','=',true)->findOrFail();
        $data->update([
            'status' => false
        ]);
        $data->save();
        return redirect('/mahasiswa');
    }
}
