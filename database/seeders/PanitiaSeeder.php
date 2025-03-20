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
            ['nama' => 'Ir. Kartiko Ardi Widodo, MT', 'section' => 'Ketua P2PUTN Malang - Penasehat'],
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
            ['nama' => 'Suryo Adi Wibowo, ST., MT.', 'section' => 'Bendahara'],
            ['nama' => 'Ir. Munasih, MT.', 'section' => 'Bendahara'],

            // Bidang Acara, Perlengkapan, dan Gladi Resik
            ['nama' => 'Moh. Syahru Romadhon Sholeh, ST., M.Ars.', 'section' => 'Bidang Acara, Perlengkapan, dan Gladi Resik'],
            ['nama' => 'Tito Arif Sutrisno, S.P., M.T.', 'section' => 'Bidang Acara, Perlengkapan, dan Gladi Resik'],
            ['nama' => 'Krishna Himawan Subiyanto, ST., M.Sc.', 'section' => 'Bidang Acara, Perlengkapan, dan Gladi Resik'],

            // Bidang Acara dan Pengatur Wisudawan
            ['nama' => 'Dr. Dimas Indra Laksamana, ST., MT.', 'section' => 'Bidang Acara dan Pengatur Wisudawan'],
            ['nama' => 'Dr. Irrine Budi Sulistiawati, ST., MT.', 'section' => 'Bidang Acara dan Pengatur Wisudawan'],
            ['nama' => 'Silvester Sari Sai, ST., MT.', 'section' => 'Bidang Acara dan Pengatur Wisudawan'],
            ['nama' => 'Drs. Sumanto, M.Si.', 'section' => 'Bidang Acara dan Pengatur Wisudawan'],
            ['nama' => 'Ida Soewarni, ST., MT.', 'section' => 'Bidang Acara dan Pengatur Wisudawan'],

            // Seksi Pengaturan dan Persiapan Wisudawan
            ['nama' => 'Mawan Kriswantono, SE., M.Pd.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan - Ketua'],
            ['nama' => 'Dr. Erni Yulianti, ST., MT.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Dr. Renny Septiari, ST., MT.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Dr. Eko Yohanes, ST., MT.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Tutut Nani Prihatmi, S.S., S.Pd, Md', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Dr. Irmalia Suryani Faradisa, ST., MT.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Sotoyhadi, ST., MT.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Dr. Ir. Iftitah Runawa., MT.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Emmalia Adriantantri, ST., MM', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Rini Kartika Dewi, ST., MT.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Faidliyah Nilna Minah, ST., MT.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Yoseph Agus Pranoto, ST., MT.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Deddy Rudhistiari, S.Kom., M.Cs.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Erni Yunita Sinaga, S.Si., M.Si', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Dr. Yosimson P. Manaha, ST., MT.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Nenny Roostrianawaty, ST., MT.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Ir. Gaguk Sukowiyono, MT.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Hamka, ST., MT.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Dr. Maria C. Endrawati, ST., MIUEM', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Ir. Titik Poerwati, MT.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Dedy Kurnia Sunaryo, ST., MT.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Adkha Yuliananda Mabrur, ST., MT.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Dr. Ir. Hery Setyobudiarso, M.Sc.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Vitha Rachmawati, ST., MT.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Dewi Saraswati, SE.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Merytha Tirta Fitrianti, Amd', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Eka Pratiwi Wulandari., SE', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Widodo', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Sindi Sintiana, ST', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Sandy Firdiansah, S.Sn.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Dyah Ayu Novitasari, S.ST', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Ina Anggraini, Amd.', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Ardian Bagus', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Fahmi R.A., ST', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Ahmad Prihartono', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Bulqis Leyla Mamtri', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Nuning Irawati, Amd', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Arif Subasir, SE', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Eltoni Hutabarat', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Sulistyani', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Andik Prio Wicaksono', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Fiqih Thabaroni NH.S.Komp', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Angelita J. J., S.Tr.Kom', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],
            ['nama' => 'Soeparno', 'section' => 'Seksi Pengaturan dan Persiapan Wisudawan'],

            // Persiapan Pengaturan Prosesi Senat
            ['nama' => 'Alfiah, SE.', 'section' => 'Persiapan Pengaturan Prosesi Senat - Ketua'],
            ['nama' => 'Winda Novianti', 'section' => 'Persiapan Pengaturan Prosesi Senat'],
            ['nama' => 'Zakiah Intan F., SE., MM.', 'section' => 'Persiapan Pengaturan Prosesi Senat'],

            // Penerima Tamu Umum
            ['nama' => 'Maria Istiqom, SS., M.Pd.', 'section' => 'Penerima Tamu Umum - Ketua'],
            ['nama' => 'Devia Amanda Renzanie, SE.', 'section' => 'Penerima Tamu Umum'],
            ['nama' => 'Dewi Yulia Rahma, Amd. Ak.', 'section' => 'Penerima Tamu Umum'],
            ['nama' => 'Duta Kampus 1(4) Mahasiswa', 'section' => 'Penerima Tamu Umum'],
            ['nama' => 'Duta Kampus 2(4) Mahasiswa', 'section' => 'Penerima Tamu Umum'],
            ['nama' => 'Duta Kampus 3(4) Mahasiswa', 'section' => 'Penerima Tamu Umum'],
            ['nama' => 'Duta Kampus 4(4) Mahasiswa', 'section' => 'Penerima Tamu Umum'],

            // Protokol
            ['nama' => 'Ardiyanto Maksimilianus Gai, ST., M.Si.', 'section' => 'Protokol - Ketua'],
            ['nama' => 'Krisna Febrian Anugrahputra, ST., MT., M.Sc.', 'section' => 'Protokol'],
            ['nama' => 'Puji Rahayu, S.Pd., M.Pd.', 'section' => 'Protokol'],

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

            // Petugas Pedel
            ['nama' => 'FX. Ari Wibisono, ST., M.Kom.', 'section' => 'Petugas Pedel'],

            // Petugas Doa
            ['nama' => 'Drs. Sumanto, MSi', 'section' => 'Petugas Doa'],

            // Konsumsi
            ['nama' => 'Mei Nurhayati, Amd', 'section' => 'Konsumsi - Ketua'],
            ['nama' => 'Imam Sujono', 'section' => 'Konsumsi - Anggota'],
            ['nama' => 'Evelin Hutabarat, SE', 'section' => 'Konsumsi - Anggota'],
            ['nama' => 'Laila Fauziah, SE', 'section' => 'Konsumsi - Anggota'],
            ['nama' => 'Wiwin Febriyanti', 'section' => 'Konsumsi - Anggota'],

            // Koor
            ['nama' => 'Vega Aditama, ST., MT.', 'section' => 'Koor - Ketua'],
            ['nama' => 'Paduan Suara Mahasiswa ITN', 'section' => 'Koor - Anggota'],

            // Transportasi
            ['nama' => 'Dedy Kristiono', 'section' => 'Transportasi - Ketua'],
            ['nama' => 'Handoko', 'section' => 'Transportasi - Anggota'],
            ['nama' => 'Neiky Aris Bintoro', 'section' => 'Transportasi - Anggota'],
            ['nama' => 'Syamsul Priyono', 'section' => 'Transportasi - Anggota'],

            // Kesehatan
            ['nama' => 'Oky Sumihardi, A.Md.Kep.', 'section' => 'Kesehatan - Ketua'],
            ['nama' => 'KSR (2 Orang)', 'section' => 'Kesehatan'],

            // Keamanan
            ['nama' => 'Mott. Jawad', 'section' => 'Keamanan'],
            ['nama' => 'Ahmad Joko Cahyono', 'section' => 'Keamanan'],
            ['nama' => 'Muhammad Kevin', 'section' => 'Keamanan']
        ];

        foreach ($panitiaData as &$data) {
            // Ambil inisial dari nama (misal: "John Doe" → "JD")
            $nama = $data['nama'];
            $inisial = strtoupper(preg_replace('/[^A-Za-z]/', '', implode('', array_map(fn($n) => $n[0] ?? '', explode(' ', $nama)))));

            // Buat "UUID" super pendek: 2 huruf inisial + 3 angka random
            $uuid = $inisial . mt_rand(100, 999);

            $data['uuid'] = $uuid; // Gunakan sebagai ID unik
            $data['status'] = 0;

            // Simpan data awal ke database
            $panitia = Panitia::create($data);

            // Bentuk nama file: uuid.png
            $fileName = "{$uuid}.png";

            // Perbarui nama foto di database
            $panitia->update(['foto' => $fileName]);

            // Pastikan folder tujuan ada, jika tidak buat foldernya
            $qrDirectory = public_path('qr/qr-panitia');
            if (!file_exists($qrDirectory)) {
                mkdir($qrDirectory, 0777, true);
            }

            // Buat QR Code (berisi UUID)
            $qrPath = 'qr/qr-panitia/' . $fileName; // Path penyimpanan
            $qrCode = QrCode::format('png')
                ->size(400) // Ukuran lebih besar agar mudah dipindai
                ->errorCorrection('H') // Tingkat error correction tinggi
                ->margin(2) // Beri margin agar tidak terlalu rapat
                ->color(0, 0, 0) // Warna hitam
                ->backgroundColor(255, 255, 255) // Background putih
                ->generate($uuid);

            // Simpan QR Code langsung ke folder public/qr/qr-panitia/
            file_put_contents($qrDirectory . '/' . $fileName, $qrCode);

            // Simpan path QR Code ke database
            $panitia->update(['qr_code' => $qrPath]);
        }
    }
}
