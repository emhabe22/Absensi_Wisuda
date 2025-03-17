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
    
    public function absent($nim){
        $data = Mahasiswa::where('nim', $nim)->first();
        if($data->status == true){
            $data->update([
                'status' => false
            ]);
            $data->save();
            return redirect('/input')->with('message', 'Kamu keluar ');
        }
        else {
            $data->update([
                'status' => true
            ]);
            $data->save();
            return redirect('/mahasiswa');
        }
      
    }

   
}
    

