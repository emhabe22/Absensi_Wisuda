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
use App\Models\Rektorat;
use App\Models\Senat;

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

       
     

        $mahasiswa = [
            [
            'nim' => '1811027',
            'nik' => '3201012345678901',
            'nama' => 'Marselus Junito Bau',
            'jurusan' => 'Teknik Mesin S1',
            'email' => 'jhunitomakbalin@gmail.com',
            'no_hp' => '082144295420',
            'alamat' => 'DUSUN NAEKASAK RT. 01 RW. 01 DESA SISI, KEC. KOBALIMA, KAB. MALAKA, NUSA TENGGARA TIMUR',
            'ipk' => 2.63,
            'tempat_tanggal_lahir' => 'NAEKASAK / 3 JUNI 1999',
            'foto' => 'budi.jpg',
            'status' => 0,
            ],
            [
            'nim' => '1811028',
            'nik' => '3201012345678902',
            'nama' => 'Maria Clara',
            'jurusan' => 'Teknik Sipil S1',
            'email' => 'mariaclara@gmail.com',
            'no_hp' => '082144295421',
            'alamat' => 'JALAN RAYA TIMOR RT. 02 RW. 02 DESA TIMOR, KEC. KOBALIMA, KAB. MALAKA, NUSA TENGGARA TIMUR',
            'ipk' => 3.45,
            'tempat_tanggal_lahir' => 'TIMOR / 5 MEI 1998',
            'foto' => 'clara.jpg',
            'status' => 0,
            ],
            [
            'nim' => '1811029',
            'nik' => '3201012345678903',
            'nama' => 'John Doe',
            'jurusan' => 'Teknik Elektro S1',
            'email' => 'johndoe@gmail.com',
            'no_hp' => '082144295422',
            'alamat' => 'JALAN KUPANG RT. 03 RW. 03 DESA KUPANG, KEC. KUPANG, KAB. KUPANG, NUSA TENGGARA TIMUR',
            'ipk' => 3.75,
            'tempat_tanggal_lahir' => 'KUPANG / 10 OKTOBER 1997',
            'foto' => 'john.jpg',
            'status' => 1,
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
        
        

        $dataId=Mahasiswa::insert($mahasiswa);

        $parents = [
            ['nama' => 'VIKTOR TAEK', 
            'status' => false, 
            'mahasiswa_id' => $dataId],
            
            ['nama' => 'JOHN DOE',
             'status' => false, 
             'mahasiswa_id' => $dataId]
        ];
        
        foreach ($parents as $data) {
            $parent = OrangTua::create($data);
            $dataId = $parent->id;
            $qrPath = 'parent-absent/' . $dataId . '.png';
        
            // Generate QR Code
            $qrCode = QrCode::format('png')
                ->size(400)
                ->errorCorrection('H')
                ->margin(2)
                ->color(0, 0, 0)
                ->backgroundColor(255, 255, 255)
                ->generate($dataId);
        
            // Simpan QR Code ke storage
            Storage::disk('public')->put($qrPath, $qrCode);
        
            // Simpan path QR Code ke database
            $parent->update(['qr_code' => $qrPath]);
        }

        $senat = [
            [
                'uuid' => 'S' . rand(1, 100),
                'nama' => 'Senat Pertama',
                'section' => 'Section A',
                'status' => 0,
                'foto' => 'senat1.jpg',
            ],
            [
                'uuid' => 'S' . rand(101, 200),
                'nama' => 'Senat Kedua',
                'section' => 'Section B',
                'status' => 1,
                'foto' => 'senat2.jpg',
            ]
        ];

        foreach ($senat as $data) {
            $senats = Senat::create($data);
            $dataId = $senats->uuid;
            $qrPath = 'senat-absent/' . $dataId . '.png';
            
            // Generate QR Code
            $qrCode = QrCode::format('png')
                ->size(400)
                ->errorCorrection('H')
                ->margin(2)
                ->color(0, 0, 0)
                ->backgroundColor(255, 255, 255)
                ->generate($dataId);
        
            // Simpan QR Code ke storage
            Storage::disk('public')->put($qrPath, $qrCode);
        
            // Simpan path QR Code ke database
            $senats->update(['qr_code' => $qrPath]);
        }
        
    }    
    
}
