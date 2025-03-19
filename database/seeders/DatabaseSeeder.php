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

        // Memanggil seeder orangtua
        $this->call(MahasiswaSeeder::class);

        // Memanggil seeder orang tua
        $this->call(OrangTuaSeeder::class);

        // Senat
        $this->call(SenatSeeder::class);

        // Panitia
        $this->call(PanitiaSeeder::class);
    }
}
