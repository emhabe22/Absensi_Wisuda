<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function mahasiswa(){
        $data = Mahasiswa::all();
        return view('frontend.table-mahasiswa', compact('data'));
    }
    
    public function absent(Request $request){
        $nim = $request->query('nim');
        $data = Mahasiswa::where('nim', $nim)->first();
        $data->update([
            'status' => true
        ]);
        $data->save();
        return redirect('/mahasiswa');
    }
    public function absentOut(Request $request){
        $nim = $request->query('nim');
        $data = Mahasiswa::where('nim', $nim)->first();
        $data->update([
            'status' => false
        ]);
        $data->save();
        return redirect('/mahasiswa');
    }
}
    

