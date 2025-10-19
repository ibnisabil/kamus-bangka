<?php

namespace App\Http\Controllers;

use App\Models\Kata;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Menampilkan halaman beranda (logika lama, tetap dibutuhkan jika JS gagal).
     */
    public function index(Request $request)
    {
        // Fungsi ini sekarang hanya sebagai fallback jika JavaScript tidak aktif
        return view('beranda', [
            'query' => $request->input('search'),
            'hasil' => [], // Dikosongkan karena hasil akan diambil oleh JavaScript
            'selectedDialek' => $request->input('dialek'),
        ]);
    }

    /**
     * Menampilkan halaman tentang.
     */
    public function tentang()
    {
        return view('tentang');
    }

    /**
     * =========================================================
     * BARU: Fungsi khusus untuk menangani permintaan Live Search (AJAX)
     * =========================================================
     * Fungsi inilah yang akan dipanggil oleh JavaScript di "belakang layar".
     */
    public function searchLive(Request $request)
    {
        $query = $request->input('search');
        $dialek = $request->input('dialek');

        $hasil = [];

        // Hanya cari jika ada input query
        if ($query) {
            $queryBuilder = Kata::query();

            // Logika pencarian dua arah (di kedua kolom)
            $queryBuilder->where(function ($q) use ($query) {
                $q->where('kata_bangka', 'like', '%' . $query . '%')
                  ->orWhere('arti_indonesia', 'like', '%' . $query . '%');
            });

            // Filter dialek jika dipilih
            if ($dialek && $dialek !== 'semua') {
                $queryBuilder->where('dialek', $dialek);
            }

            $hasil = $queryBuilder->get();
        }

        // Mengembalikan data dalam format JSON, bukan view HTML
        return response()->json($hasil);
    }
}

