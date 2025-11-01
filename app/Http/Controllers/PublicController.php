<?php

namespace App\Http\Controllers;

use App\Models\Kata;
use App\Models\Berita;
use App\Models\Tujuan;
use App\Models\Setting; // <-- 1. TAMBAHKAN INI
use Illuminate\Http\Request;
use Illuminate\Routing\Controller; // <-- Pastikan ini ada

class PublicController extends Controller
{
    /**
     * Menampilkan halaman beranda.
     */
    public function index(Request $request)
    {
        $beritas = Berita::latest()->take(4)->get();
        return view('beranda', [
            'query' => $request->input('search'),
            'hasil' => [],
            'beritas' => $beritas
        ]);
    }

    /**
     * Menampilkan halaman tentang.
     */
    public function tentang()
    {
        // Ambil data tujuan
        $tujuans = Tujuan::orderBy('urutan', 'asc')->get();
        
        // [BARU] Ambil data settings
        $settings = Setting::all()->pluck('value', 'key');
        
        // Kirim kedua data ke view
        return view('tentang', [
            'tujuans' => $tujuans,
            'settings' => $settings // <-- 2. TAMBAHKAN INI
        ]);
    }

    /**
     * Fungsi khusus untuk menangani permintaan Live Search (AJAX)
     */
    public function searchLive(Request $request)
    {
        $query = $request->input('search');
        $hasil = [];

        if ($query) {
            $queryBuilder = Kata::query();
            $queryBuilder->where(function ($q) use ($query) {
                $q->where('kata_bangka', 'like', '%' . $query . '%')
                  ->orWhere('arti_indonesia', 'like', '%' . $query . '%');
            });
            $hasil = $queryBuilder->get();
        }
        
        return response()->json($hasil);
    }
}