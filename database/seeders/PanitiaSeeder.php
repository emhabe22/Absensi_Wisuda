<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Panitia;
use Illuminate\Support\Str;

class PanitiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $panitiaData = [
            ['nama' => 'Awan Uji Krismanto, ST., MT., Ph.D.', 'section' => 'Rektor - Penanggung Jawab'],
            ['nama' => 'Dr. Ir. Jimmy, ST., MT.', 'section' => 'Wakil Rektor I - Pengarah'],
            ['nama' => 'Dr. Ir. Nusa Sebayang, MT.', 'section' => 'Wakil Rektor II - Pengarah'],
            ['nama' => 'Dr. Hardianto, ST., MT.', 'section' => 'Wakil Rektor III - Pengarah'],
            ['nama' => 'Prof. Dr. Ir. Lalu Mulyadi, MT.', 'section' => 'Direktur Pascasarjana'],
            ['nama' => 'Dr. I Komang Somawirata, ST., MT.', 'section' => 'Dekan FTI'],
            ['nama' => 'Dr. Debby Budi Susanti, ST., MT.', 'section' => 'Dekan FTSP'],
            ['nama' => 'Dr. Aladin Eko Purkuncoro, ST., MT.', 'section' => 'Ketua - Sekretariat'],
            ['nama' => 'Dr. Lila Ayn Ratna Winanda, ST., MT.', 'section' => 'Bendahara'],
            ['nama' => 'Dr. Dimas Indra Laksamana, ST., MT.', 'section' => 'Sekretaris Direktur Pascasarjana'],
            ['nama' => 'Dr. Irine Budi Sulistiawati, ST., MT.', 'section' => 'Wakil Dekan I FTI'],
            ['nama' => 'Silvester Sari Sai, ST., MT.', 'section' => 'Wakil Dekan I FTSP'],
            ['nama' => 'Drs. Sumanto, M.Si.', 'section' => 'Wakil Dekan III FTI'],
            ['nama' => 'Ida Soewarni, ST., MT.', 'section' => 'Wakil Dekan III FTSP'],
            ['nama' => 'Mawan Kriswantono, SE.', 'section' => 'Ketua - Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Dr. Erni Yulianti, ST., MT.', 'section' => 'Anggota - Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Dr. Renny Septiari, ST., MT.', 'section' => 'Anggota - Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Dr. Eko Yohanes, ST., MT.', 'section' => 'Anggota - Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Tutut Nani Prihatmi, S.S., ST., M.Ds.', 'section' => 'Anggota - Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Dr. Irmalia Suyani Faradisa, ST., MT.', 'section' => 'Anggota - Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Singgih Wahyudi, S.Komp., MT.', 'section' => 'Ketua - Perlengkapan dan Kebersihan'],
            ['nama' => 'Edwin Septarianto, ST.', 'section' => 'Anggota - Perlengkapan dan Kebersihan'],
            ['nama' => 'Reni Rupianti, S.M., M.M.', 'section' => 'Ketua - Dokumentasi dan Publikasi'],
            ['nama' => 'Amar Rizqi Afdholy, ST., MT.', 'section' => 'Anggota - Dokumentasi dan Publikasi'],
            ['nama' => 'FX. Art Wibisono, ST., M.Kom.', 'section' => 'Ketua - Transportasi'],
            ['nama' => 'Drs. Sumanto, M.Si.', 'section' => 'Anggota - Transportasi'],
            ['nama' => 'Oky Sumihardi, A.Md.Kep.', 'section' => 'Ketua - Kesehatan'],
            ['nama' => 'Dedy Kristiono', 'section' => 'Ketua - Petugas Pedel'],
            ['nama' => 'Handoko', 'section' => 'Anggota - Petugas Pedel'],
            ['nama' => 'Syamsu Priyono', 'section' => 'Anggota - Petugas Pedel'],
        ];

        foreach ($panitiaData as &$data) {
            $data['uuid'] = Str::uuid();
            $data['status'] = 0;
            $data['foto'] = strtolower(str_replace([' ', ',', '.', '-'], '_', $data['nama'])) . '.png';

            $panitia = Panitia::create($data);

            // Buat QR Code
            $qrPath = 'qrcodes/panitia-' . $panitia->uuid . '.png';
            $qrCode = QrCode::format('png')
                ->size(400)
                ->errorCorrection('H')
                ->margin(2)
                ->color(0, 0, 0)
                ->backgroundColor(255, 255, 255)
                ->generate($panitia->uuid);

            // Simpan QR Code ke storage
            Storage::disk('public')->put($qrPath, $qrCode);

            // Simpan path QR Code ke database
            $panitia->update(['qr_code' => $qrPath]);
        }
    }
}
