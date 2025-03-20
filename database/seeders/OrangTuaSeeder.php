<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\OrangTua;
use Illuminate\Database\Seeder;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class OrangTuaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua mahasiswa dari database
        $mahasiswaList = Mahasiswa::all();

        foreach ($mahasiswaList as $mahasiswa) {
            // Data orang tua untuk setiap mahasiswa
            $parents = [
                [
                    'nama' => 'Ayah dari ' . $mahasiswa->nama,
                    'tipe' => 'A',
                    'status' => false,
                    'mahasiswa_id' => $mahasiswa->id
                ],
                [
                    'nama' => 'Ibu dari ' . $mahasiswa->nama,
                    'tipe' => 'I',
                    'status' => false,
                    'mahasiswa_id' => $mahasiswa->id
                ]
            ];

            foreach ($parents as $data) {
                // Simpan data orang tua ke database
                $parent = OrangTua::create($data);

                // Ambil NIM dari objek mahasiswa, bukan dari $data
                $nim = strtolower(str_replace([' ', '.', ',', '-'], '_', $mahasiswa->nim));

                // Tentukan nama file berdasarkan tipe orang tua
                $fileName = $parent->id . '_' . ($data['tipe'] === 'A' ? 'ayah_' : 'ibu_') . $nim . '.png';
                $qrPath = 'qr/qr-orangtua/' . $fileName; // Path penyimpanan

                // Generate QR Code
                $qrCode = QrCode::format('png')
                    ->size(400) // Ukuran lebih besar agar mudah dipindai
                    ->errorCorrection('H') // Tingkat error correction tinggi
                    ->margin(2) // Beri margin agar tidak terlalu rapat
                    ->color(0, 0, 0) // Warna hitam
                    ->backgroundColor(255, 255, 255) // Background putih
                    ->generate($fileName);

                // Pastikan folder tujuan ada, jika tidak buat foldernya
                $qrDirectory = public_path('qr/qr-orangtua');
                if (!file_exists($qrDirectory)) {
                    mkdir($qrDirectory, 0777, true);
                }

                // Simpan QR Code langsung ke folder public/qr/qr-orangtua/
                file_put_contents($qrDirectory . '/' . $fileName, $qrCode);

                // Simpan path QR Code ke database
                $parent->update(['qr_code' => $qrPath]);
            }
        }
    }
}
