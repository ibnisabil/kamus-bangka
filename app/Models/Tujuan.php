<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tujuan extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'urutan',
    ];
}
