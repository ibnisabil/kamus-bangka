<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // <-- Menggunakan import Facades

class KatasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        // Menghapus data yang sudah ada di tabel 'katas' sebelum menyisipkan data baru
        DB::table('katas')->delete(); // <-- Menggunakan DB tanpa \

        DB::table('katas')->insert(array ( // <-- Menggunakan DB tanpa \
            0 =>
            array (
                'id' => 1,
                'kata_bangka' => 'maken',
                'arti_indonesia' => 'makan',
                'definisi' => 'test',
                'contoh' => 'test',
                'sinonim' => 'test',
                'created_at' => '2025-10-13 15:36:09',
                'updated_at' => '2025-10-16 07:46:26',
            ),
            1 =>
            array (
                'id' => 2,
                'kata_bangka' => 'Maken',
                'arti_indonesia' => 'Makan',
                'definisi' => 'makan adalah sebuah kegiatan bla bla',
                'contoh' => 'yo makan cek',
                'sinonim' => 'santap',
                'created_at' => '2025-10-15 13:12:51',
                'updated_at' => '2025-10-15 15:22:09',
            ),
            2 =>
            array (
                'id' => 3,
                'kata_bangka' => 'bebulek',
                'arti_indonesia' => 'berbohong',
                'definisi' => 'bebulek adalah sebuah ungkapan yang tidak benar benar',
                'contoh' => 'ki ne bebulek lah gawi ee',
                'sinonim' => 'ungkapan',
                'created_at' => '2025-10-15 15:28:25',
                'updated_at' => '2025-10-15 15:28:25',
            ),
            3 =>
            array (
                'id' => 4,
                'kata_bangka' => 'nginum',
                'arti_indonesia' => 'minum',
                'definisi' => 'minum bla bla',
                'contoh' => 'test text',
                'sinonim' => 'test text',
                'created_at' => '2025-10-16 07:45:11',
                'updated_at' => '2025-10-16 07:45:11',
            ),
        ));


    }
}
