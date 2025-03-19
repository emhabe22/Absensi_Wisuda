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
            ['nama' => 'Prof. Dr. Ir. Lalu Mulyadi, MT.', 'section' => 'Direktur Pascasarjana - Pengarah'],
            ['nama' => 'Dr. I Komang Somawirata, ST., MT.', 'section' => 'Dekan FTI - Pengarah'],
            ['nama' => 'Dr. Debby Budi Susanti, ST., MT.', 'section' => 'Dekan FTSP - Pengarah'],

            // Ketua, Sekretaris, Bendahara
            ['nama' => 'Dr. Aladin Eko Purkuncoro, ST., MT.', 'section' => 'Ketua'],
            ['nama' => 'Dr. Lila Ayn Ratna Winanda, ST., MT.', 'section' => 'Sekretaris'],
            ['nama' => 'Dr. Dimas Indra Laksamana, ST., MT.', 'section' => 'Bendahara'],

            // Bidang Acara dan Gladi Resik
            ['nama' => 'Tito Arif Sutrisno, S.P., M.T.', 'section' => 'Bidang Acara dan Gladi Resik'],
            ['nama' => 'Krishna Himawan Subiyanto, ST., M.Sc.', 'section' => 'Bidang Acara dan Gladi Resik'],

            // Bidang Acara dan Pengatur Wisudawan
            ['nama' => 'Dr. Irine Budi Sulistiawati, ST., MT.', 'section' => 'Bidang Acara dan Pengatur Wisudawan'],
            ['nama' => 'Silvester Sari Sai, ST., MT.', 'section' => 'Bidang Acara dan Pengatur Wisudawan'],
            ['nama' => 'Drs. Sumanto, M.Si.', 'section' => 'Bidang Acara dan Pengatur Wisudawan'],
            ['nama' => 'Ida Soewarni, ST., MT.', 'section' => 'Bidang Acara dan Pengatur Wisudawan'],

            // Seksi Pengaturan dan Persiapan Wisudawan
            ['nama' => 'Mawan Kriswantono, SE.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan - Ketua'],
            ['nama' => 'Dr. Yosimson P. Martaha, ST., MT.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Dr. Ir. Hery Setyobudiarso, M.Sc.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Dedy Kurnia Sunaryo, ST., MT.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Dr. Maria C. Endrawati, ST., MT.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Eka Pratici Wulandari, SE.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Sulistyani', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Soeparno', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Ahmad Prihartono', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],

            // Persiapan Pengaturan Prosesi Senat
            ['nama' => 'Alfiah, SE.', 'section' => 'Persiapan Pengaturan Prosesi Senat - Ketua'],
            ['nama' => 'Winda Novianti', 'section' => 'Persiapan Pengaturan Prosesi Senat'],
            ['nama' => 'Zakiah Intan F., SE., MM.', 'section' => 'Persiapan Pengaturan Prosesi Senat'],

            // Penerima Tamu Umum
            ['nama' => 'Ardiyanto Maksimilianus Gai, ST., M.Si.', 'section' => 'Penerima Tamu Umum - Ketua'],
            ['nama' => 'Krisna Febrian Anugrahputra, ST., MT., M.Sc.', 'section' => 'Penerima Tamu Umum'],
            ['nama' => 'Puji Rahayu, S.Pd., M.Pd.', 'section' => 'Penerima Tamu Umum'],

            // Protokol
            ['nama' => 'Maria Istiqom, SS., M.Pd.', 'section' => 'Protokol - Ketua'],
            ['nama' => 'Devia Amanda Renzanie, SE.', 'section' => 'Protokol'],
            ['nama' => 'Dewi Yulia Rahma, Amd. Ak.', 'section' => 'Protokol'],
            ['nama' => 'Duta Kampus (4 Mahasiswa)', 'section' => 'Protokol'],

            // Perlengkapan, Pengaturan Tempat, dan Kebersihan
            ['nama' => 'Singgih Wahyudi, S.Komp., MT.', 'section' => 'Perlengkapan, Pengaturan Tempat, dan Kebersihan - Ketua'],
            ['nama' => 'Edwin Septarianto, ST.', 'section' => 'Perlengkapan, Pengaturan Tempat, dan Kebersihan'],
            ['nama' => 'Basuki Suwiyono', 'section' => 'Perlengkapan, Pengaturan Tempat, dan Kebersihan'],
            ['nama' => 'Femia Yuhandika', 'section' => 'Perlengkapan, Pengaturan Tempat, dan Kebersihan'],

            // Dokumentasi, Publikasi, dan Dekorasi
            ['nama' => 'Reni Rupianti, SM., MM.', 'section' => 'Dokumentasi, Publikasi, dan Dekorasi - Ketua'],
            ['nama' => 'Amar Rizqi Afdholy, ST., MT.', 'section' => 'Dokumentasi, Publikasi, dan Dekorasi'],
            ['nama' => 'Mita Emiriasari, SP.', 'section' => 'Dokumentasi, Publikasi, dan Dekorasi'],
            ['nama' => 'Muhammad Agil Dzaki, ST.', 'section' => 'Dokumentasi, Publikasi, dan Dekorasi'],
            ['nama' => 'M. Yanuar S.', 'section' => 'Dokumentasi, Publikasi, dan Dekorasi'],

            // Kesehatan
            ['nama' => 'Oky Sumihardi, A.Md.Kep.', 'section' => 'Kesehatan - Ketua'],
            ['nama' => 'KSR (2 Orang)', 'section' => 'Kesehatan'],

            // Keamanan
            ['nama' => 'Mott. Jawad', 'section' => 'Keamanan'],
            ['nama' => 'Ahmad Joko Cahyono', 'section' => 'Keamanan'],
            ['nama' => 'Muhammad Kevin', 'section' => 'Keamanan']
        ];

        foreach ($panitiaData as &$data) {
            // Format nama menjadi slug untuk file (mengganti karakter tidak aman)
            $formattedName = strtolower(str_replace([' ', ',', '.', '-'], '_', $data['nama']));

            $data['uuid'] = Str::uuid();
            $data['status'] = 0;
            $data['foto'] = $formattedName . '.png';

            $panitia = Panitia::create($data);

            // Buat QR Code dengan nama file berdasarkan nama panitia
            $qrPath = 'panitia-absent/' . $formattedName . '.png';
            $qrCode = QrCode::format('png')
                ->size(400)
                ->errorCorrection('H')
                ->margin(2)
                ->color(0, 0, 0)
                ->backgroundColor(255, 255, 255)
                ->generate($panitia->nama);

            // Simpan QR Code ke storage
            Storage::disk('public')->put($qrPath, $qrCode);

            // Simpan path QR Code ke database
            $panitia->update(['qr_code' => $qrPath]);
        }
        // foreach ($panitiaData as &$data) {
        //     $data['uuid'] = Str::uuid();
        //     $data['status'] = 0;
        //     $data['foto'] = strtolower(str_replace([' ', ',', '.', '-'], '_', $data['nama'])) . '.png';

        //     $panitia = Panitia::create($data);

        //     // Buat QR Code
        //     $qrPath = 'panitia-absent/' . $panitia->uuid . '.png';
        //     $qrCode = QrCode::format('png')
        //         ->size(400)
        //         ->errorCorrection('H')
        //         ->margin(2)
        //         ->color(0, 0, 0)
        //         ->backgroundColor(255, 255, 255)
        //         ->generate($panitia->uuid);

        //     // Simpan QR Code ke storage
        //     Storage::disk('public')->put($qrPath, $qrCode);

        //     // Simpan path QR Code ke database
        //     $panitia->update(['qr_code' => $qrPath]);
        // }
    }
}
