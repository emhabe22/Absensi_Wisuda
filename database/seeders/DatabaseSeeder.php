<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Intervention\Image\ImageManagerStatic as Image;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $mahasiswa = [
            [
                'nim' => '22001001',
                'nik' => '3201012345678901',
                'nama' => 'Budi Santoso',
                'jurusan' => 'Teknik Informatika',
                'email' => 'budi@example.com',
                'no_hp' => '081234567890',
                'alamat' => 'Jakarta, Indonesia',
                'ipk' => 3.75,
                'foto' => 'budi.jpg',
                'status' => true
            ],
            [
                'nim' => '22001002',
                'nik' => '3201012345678902',
                'nama' => 'Siti Aminah',
                'jurusan' => 'Sistem Informasi',
                'email' => 'siti@example.com',
                'no_hp' => '081298765432',
                'alamat' => 'Surabaya, Indonesia',
                'ipk' => 3.85,
                'foto' => 'siti.jpg',
                'status' => false
            ]
        ];

        foreach ($mahasiswa as &$mhs) {
    $url = url('/scan/' . $mhs['nim']);
    $qrPath = 'qrcodes/' . $mhs['nim'] . '.svg'; // Simpan sebagai SVG

    // Generate QR Code dalam format SVG
    $qrCode = QrCode::format('svg')->size(200)->generate($url);

    // Simpan SVG ke storage (public/storage/qrcodes/)
    Storage::disk('public')->put($qrPath, $qrCode);

    // Simpan path QR Code ke database
    $mhs['qr_code'] = $qrPath;
}
        Mahasiswa::insert($mahasiswa);
    
    }
}
