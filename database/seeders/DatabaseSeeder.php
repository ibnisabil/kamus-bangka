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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
        // Memanggil seeder untuk mengisi data 'katas'
        $this->call(KatasTableSeeder::class);
        $this->call(BeritaSeeder::class);
        $this->call(TujuanSeeder::class);
        $this->call(SettingSeeder::class);
    }
}
