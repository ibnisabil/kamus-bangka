<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting; // <-- Import Model
use Illuminate\Support\Facades\DB; // <-- Import DB

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Kosongkan tabel settings
        DB::table('settings')->truncate();

        // 2. Siapkan data (link dari iframe statis Anda)
        $data_settings = [
            [
                'key' => 'youtube_link',
                'value' => 'https://www.youtube.com/embed/AeQ7QibRF_8'
            ],
            [
                'key' => 'gmaps_link',
                'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.0273302512965!2d106.1163734!3d-2.143214!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e22c72928310947%3A0x726866b128aafd50!2sDinas%20Pariwisata%20Kota%20Pangkalpinang!5e0!3m2!1sid!2sid!4v1761619357075!5m2!1sid!2sid'
            ],
        ];

        // 3. Masukkan data ke database
        foreach ($data_settings as $data) {
            Setting::create($data);
        }
    }
}