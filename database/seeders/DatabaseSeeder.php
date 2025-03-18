<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\OrangTua;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'), // Pastikan password dienkripsi
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $parent = OrangTua::create([
            'nama' => 'VIKTOR TAEK',
            'status' => false,
        ]);
        $parentId = $parent->id;

        $mahasiswa = [
            [
                'nim' => '1811027',
                'nik' => '3201012345678901',
                'nama' => 'Marselus Junito Bau',
                'jurusan' => 'Teknik Mesin S1',
                'email' => 'jhunitomakbalin@gmail.com',
                'no_hp' => '0821 4429 5420',
                'alamat' => 'DUSUN NAEKASAK RT. 01 RW. 01 DESA SISI,  KEC. KOBALIMA, KAB. MALAKA, NUSA TENGGARA TIMUR',
                'ipk' => 2.63,
                'tempat_tanggal_lahir' => 'NAEKASAK / 3 JUNI 1999',
                'foto' => 'budi.jpg',
                'status' => 0,
                'orang_tua_id' => $parentId,
            ],
];
        foreach ($mahasiswa as &$mhs) {
            $data = $mhs['nim']; // Hanya encode NIM tanpa URL
            $qrPath = 'qrcodes/' . $mhs['nim'] . '.png'; // Path penyimpanan
        
            // Generate QR Code dengan setting optimal
            $qrCode = QrCode::format('png')
                ->size(400) // Ukuran lebih besar agar mudah dipindai
                ->errorCorrection('H') // Tingkat error correction tinggi
                ->margin(2) // Beri margin agar tidak terlalu rapat
                ->color(0, 0, 0) // Warna hitam
                ->backgroundColor(255, 255, 255) // Background putih
                ->generate($data);
        
            // Simpan QR Code ke storage
            Storage::disk('public')->put($qrPath, $qrCode);
        
            // Simpan path QR Code ke database
            $mhs['qr_code'] = $qrPath;
        }
        foreach ($parent as & $pr) {
            $data = $parent->id; // Ambil ID orang tua
            $qrPath = 'parent/' . $parent->id . '.png';
            
            // Generate QR Code
            $qrCode = QrCode::format('png')
                ->size(400)
                ->errorCorrection('H')
                ->margin(2)
                ->color(0, 0, 0)
                ->backgroundColor(255, 255, 255)
                ->generate($data);
            
            // Simpan QR Code ke storage
            Storage::disk('public')->put($qrPath, $qrCode);
            
            // Simpan path QR Code ke database
            $parent->update(['qr_code' => $qrPath]);            
        }
        

          Mahasiswa::insert($mahasiswa);
    }
}
