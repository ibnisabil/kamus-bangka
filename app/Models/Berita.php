<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'judul',
        'slug',
        'kategori',
        'gambar',
        'excerpt',
        'isi_lengkap',
    ];

    /**
     * Mengambil kunci rute untuk model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        // Memberitahu Laravel untuk menggunakan kolom 'slug' untuk URL
        return 'slug';
    }
}