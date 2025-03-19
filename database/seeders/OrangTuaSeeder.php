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
                    'nama' => 'Ayah dari ' . $mahasiswa->nama, // Bisa diganti dengan data yang lebih spesifik
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
                $parent = OrangTua::create($data);
                $parentId = $parent->id;
                $qrPath = 'parent-absent/' . $parentId . '.png';

                // Generate QR Code
                $qrCode = QrCode::format('png')
                    ->size(400)
                    ->errorCorrection('H')
                    ->margin(2)
                    ->color(0, 0, 0)
                    ->backgroundColor(255, 255, 255)
                    ->generate($parentId);

                // Simpan QR Code ke storage
                Storage::disk('public')->put($qrPath, $qrCode);

                // Simpan path QR Code ke database
                $parent->update(['qr_code' => $qrPath]);
            }
        }
    }
}
