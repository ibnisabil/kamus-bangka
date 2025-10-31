<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kata extends Model
{
    use HasFactory;

    /**
     * Properti $fillable adalah daftar 'izin' bagi Laravel,
     * memberitahu kolom mana saja yang boleh diisi secara massal
     * (misalnya, saat kita membuat atau mengupdate data dari form).
     */
    protected $fillable = [
        'kata_bangka',
        'arti_indonesia',
        'definisi', // BARU
        'contoh',   // BARU
        'sinonim',  // BARU
    ];
}

