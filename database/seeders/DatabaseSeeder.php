<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Memanggil seeder untuk mengisi data 'katas'
        $this->call(KatasTableSeeder::class);
        $this->call(BeritaSeeder::class);
        $this->call(TujuanSeeder::class);
        $this->call(SettingSeeder::class);
    }
}
