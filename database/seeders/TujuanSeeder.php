<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tujuan; // <-- Import Model
use Illuminate\Support\Facades\DB; // <-- Import DB

class TujuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Kosongkan tabel tujuans terlebih dahulu
        DB::table('tujuans')->truncate();

        // 2. Siapkan data (sesuai data statis Anda)
        $data_tujuans = [
            [
                'judul' => 'Pelestarian',
                'deskripsi' => 'Menjaga bahasa Bangka dari kepunahan di era modernisasi dan Digitalisasi.',
                'gambar' => 'images/pelestarian.png', // Ganti dengan path gambar Anda
                'urutan' => 1,
            ],
            [
                'judul' => 'Kekayaan Dialek Lokal',
                'deskripsi' => 'Mendokumentasikan dan menyajikan keragaman bahasa antar wilayah.',
                'gambar' => 'images/dialek-lokal.png', // Ganti dengan path gambar Anda
                'urutan' => 2,
            ],
            [
                'judul' => 'Modul Pembelajaran',
                'deskripsi' => 'Menyediakan fitur dan alat bantu untuk penguasaan bahasa secara praktis.',
                'gambar' => 'images/Pembelajaran.png', // Ganti dengan path gambar Anda
                'urutan' => 3,
            ],
            [
                'judul' => 'Sumber Daya Riset',
                'deskripsi' => 'Menjadi rujukan data terstruktur untuk kebutuhan akademis dan penelitian.',
                'gambar' => 'images/sumberdaya.png', // Ganti dengan path gambar Anda
                'urutan' => 4,
            ],
            [
                'judul' => 'Platform Kolaborasi',
                'deskripsi' => 'Mendorong partisipasi aktif komunitas dalam pengembangan konten.',
                'gambar' => 'images/kolaborasi.png', // Ganti dengan path gambar Anda
                'urutan' => 5,
            ],
        ];

        // 3. Masukkan data ke database
        foreach ($data_tujuans as $data) {
            Tujuan::create($data);
        }
    }
}