<?php

namespace Database\Seeders;

use App\Models\Senat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class SenatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $senat = [
            [
                'uuid' => 'S001',
                'nama' => 'Prof. Dr. Eng. Ir. Abraham Lomi, MSEE',
                'section' => 'Section A',
                'status' => 0,
                'foto' => 'abraham_lomi.png',
            ],
            [
                'uuid' => 'S002',
                'nama' => 'Dr. Debby Budi Susanti, ST., MT',
                'section' => 'Section B',
                'status' => 0,
                'foto' => 'debby_budi_susanti.png',
            ],
            [
                'uuid' => 'S003',
                'nama' => 'Ir. Kartiko Ardi Widodo, MT',
                'section' => 'Section A',
                'status' => 0,
                'foto' => 'kartiko_ardi_widodo.png',
            ],
            [
                'uuid' => 'S004',
                'nama' => 'Lenni Saragih, SKM., M.Kes',
                'section' => 'Section B',
                'status' => 0,
                'foto' => 'lenni_saragih.png',
            ],
            [
                'uuid' => 'S005',
                'nama' => 'Dr. I Komang Astana Widi, ST., MT',
                'section' => 'Section C',
                'status' => 0,
                'foto' => 'komang_astana_widi.png',
            ],
            [
                'uuid' => 'S006',
                'nama' => 'Dr. F. Yudi Limpraptono, ST., MT',
                'section' => 'Section D',
                'status' => 0,
                'foto' => 'yudi_limpraptono.png',
            ],
            [
                'uuid' => 'S007',
                'nama' => 'Dr. Irine Budi Sulistiawati, ST., MT',
                'section' => 'Section E',
                'status' => 0,
                'foto' => 'irine_budi_sulistiawati.png',
            ],
            [
                'uuid' => 'S008',
                'nama' => 'Martinus Edwin Tjahjadi, ST., M.Geom.Sc., Ph.D',
                'section' => 'Section A',
                'status' => 0,
                'foto' => 'martinus_edwin_tjahjadi.png',
            ],
            [
                'uuid' => 'S009',
                'nama' => 'Dr. Agung Witjaksono, ST., MT',
                'section' => 'Section B',
                'status' => 0,
                'foto' => 'agung_witjaksono.png',
            ],
            [
                'uuid' => 'S010',
                'nama' => 'Dr. Ir. Hery Setyobudiarso, M.Sc',
                'section' => 'Section C',
                'status' => 0,
                'foto' => 'hery_setyobudiarso.png',
            ],
            [
                'uuid' => 'S011',
                'nama' => 'Ir. Fourry Handoko, ST., SS., MT., Ph.D., IPU, ASEAN Eng',
                'section' => 'Section D',
                'status' => 0,
                'foto' => 'fourry_handoko.png',
            ],
            [
                'uuid' => 'S012',
                'nama' => 'Prof. Dr. Ir. Lalu Mulyadi, MT',
                'section' => 'Section E',
                'status' => 0,
                'foto' => 'lalu_mulyadi.png',
            ],
            [
                'uuid' => 'S013',
                'nama' => 'Prof. Dr. Ir. Julianus Hutabarat, MT',
                'section' => 'Section F',
                'status' => 0,
                'foto' => 'julianus_hutabarat.png',
            ],
            [
                'uuid' => 'S014',
                'nama' => 'Dr. Eng. I Komang Somawirata, ST., MT',
                'section' => 'Section G',
                'status' => 0,
                'foto' => 'komang_somawirata.png',
            ],
            [
                'uuid' => 'S015',
                'nama' => 'Prof. Dr. Eng. Ir. I Made Wartana, MT',
                'section' => 'Section H',
                'status' => 0,
                'foto' => 'i_made_wartana.png',
            ],
            [
                'uuid' => 'S016',
                'nama' => 'Prof. Dr. Eng. Aryuanto Soetedjo, ST., MT',
                'section' => 'Section I',
                'status' => 0,
                'foto' => 'aryuanto_soetedjo.png',
            ],
            [
                'uuid' => 'S017',
                'nama' => 'Prof. Dr. Ir. Sutanto Hidayat, MT',
                'section' => 'Section J',
                'status' => 0,
                'foto' => 'sutanto_hidayat.png',
            ],
            [
                'uuid' => 'S018',
                'nama' => 'Awan Uji Krismanto, ST., MT., Ph.D',
                'section' => 'Section K',
                'status' => 0,
                'foto' => 'awan_uji_krismanto.png',
            ],
            [
                'uuid' => 'S019',
                'nama' => 'Dr. Ir. Jimmy, ST., MT',
                'section' => 'Section L',
                'status' => 0,
                'foto' => 'jimmy.png',
            ],
            [
                'uuid' => 'S020',
                'nama' => 'Dr. Ir. Nusa Sebayang, MT',
                'section' => 'Section M',
                'status' => 0,
                'foto' => 'nusa_sebayang.png',
            ],
            [
                'uuid' => 'S021',
                'nama' => 'Dr. Hardianto, ST., MT',
                'section' => 'Section N',
                'status' => 0,
                'foto' => 'hardianto.png',
            ],
        ];

        foreach ($senat as $data) {
            $senats = Senat::create($data);
            $dataId = $senats->uuid;
            $qrPath = 'qr/qr-senat/' . $dataId . '.png'; // Path yang akan disimpan ke database

            // Generate QR Code
            $qrCode = QrCode::format('png')
                ->size(400)
                ->errorCorrection('H')
                ->margin(2)
                ->color(0, 0, 0)
                ->backgroundColor(255, 255, 255)
                ->generate($dataId);

            // Tentukan direktori penyimpanan
            $qrDirectory = public_path('qr/qr-senat');

            // Pastikan folder tujuan ada, jika tidak buat foldernya
            if (!file_exists($qrDirectory)) {
                mkdir($qrDirectory, 0777, true);
            }

            // Simpan QR Code langsung ke folder public/qr/qr-senat/
            file_put_contents($qrDirectory . '/' . $dataId . '.png', $qrCode);

            // Simpan path QR Code ke database
            $senats->update(['qr_code' => $qrPath]);
        }

    }
}
