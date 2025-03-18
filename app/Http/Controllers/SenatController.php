<?php

namespace App\Http\Controllers;
require '../vendor/autoload.php';
use App\Models\Mahasiswa;
use App\Models\OrangTua;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class SenatController extends Controller
{
    public function absent($uuid){
        $data = Mahasiswa::where('nim', $uuid)->first();
        $templatePath = public_path('template/template.png'); 
    
        // Path foto mahasiswa
        $fotoPath = public_path('storage/foto/' . $uuid . '.jpg'); 
    
        // Buat gambar dari template
        $manager = new ImageManager(new Driver());
        
        $img = $manager->read($templatePath);
    
    
        // Tambahkan foto mahasiswa (resize dulu)
        if (file_exists($fotoPath)) {
            $foto = $manager->read($fotoPath)->resize(150, 150);
            $img->place($foto, 'top-left', 100, 100); // Sesuaikan posisi
        }
    
        // Tambahkan Nama
        $img->text($data->nama, 300, 200, function ($font) {
            $font->file(public_path('fonts/arial.ttf'));
            $font->size(50);
            $font->color('#000');
            $font->align('left');
        });
    
        // Tambahkan NIM
        $img->text($data->nim, 300, 270, function ($font) {
            $font->file(public_path('fonts/arial.ttf'));
            $font->size(40);
            $font->color('#000');
            $font->align('left');
        });
        // Path penyimpanan hasil gambar
        $gambarHasil = 'storage/gambar/' . $uuid . '.png';
        $img->save(public_path($gambarHasil));
    
        Session::flash('gambar', asset($gambarHasil));
    
        //Mahasiswa
        $data->refresh(); // Ambil ulang data dari database sebelum mengubah status
    
        if ($data->status == 1) {
            $data->update(['status' => 0]);
            session()->flash('danger', 'Anda telah Keluar!');
            return redirect('/senat')->with('message', 'Kamu keluar');
        } else {
            $data->update(['status' => 1]);
            session()->flash('success', 'Absen berhasil!');
            return redirect('/senat')->with('gambar', asset($gambarHasil));
        }
    }
}
