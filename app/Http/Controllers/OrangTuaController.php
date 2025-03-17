<?php

namespace App\Http\Controllers;

use App\Models\OrangTua;
use Illuminate\Http\Request;

class OrangTuaController extends Controller
{
    public function orangtua(){
        $data = OrangTua::all();
        return view('frontend.table-orangtua', compact('data'));
    }
}
