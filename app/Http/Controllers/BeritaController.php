<?php

namespace App\Http\Controllers;

use App\Models\Berita;   // <-- PENTING: Import model Berita
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Menampilkan halaman detail untuk satu berita.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\View\View
     */
    public function show(Berita $berita)
    {
        // Berkat Route Model Binding (yang menggunakan 'slug' dari Model),
        // Laravel sudah otomatis menemukan berita yang benar.
        
        // Kita hanya perlu mengirim data $berita ke view 'berita.show'
        return view('berita.show', [
            'berita' => $berita
        ]);
    }
}