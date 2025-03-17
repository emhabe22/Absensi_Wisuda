<?php

namespace App\Http\Controllers;

use App\Models\Panitia;
use Illuminate\Http\Request;

class PanitiaController extends Controller
{
    public function panitia(){
        $data = Panitia::all();
        return view('frontend.table-panitia', compact('data'));
    }
}
