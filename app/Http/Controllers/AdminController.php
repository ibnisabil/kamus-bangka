<?php

namespace App\Http\Controllers;

use App\Models\Kata;
use App\Models\Berita;
use App\Models\Tujuan; // <-- 1. TAMBAHKAN MODEL 'TUJUAN'
use App\Models\Setting; // <-- 2. TAMBAHKAN MODEL 'SETTING'
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller; // Pastikan ini ada

class AdminController extends Controller
{
    /**
     * [BARU] Menampilkan halaman dashboard admin dengan statistik.
     */
    public function dashboard()
    {
        $jumlahKamus = Kata::count();
        $jumlahBerita = Berita::count();
        $jumlahTujuan = Tujuan::count(); // <-- 3. TAMBAHKAN HITUNGAN TUJUAN
        $jumlahSetting = Setting::count(); // <-- 4. TAMBAHKAN HITUNGAN SETTING

        return view('admin.dashboard', [
            'jumlahKamus' => $jumlahKamus,
            'jumlahBerita' => $jumlahBerita,
            'jumlahTujuan' => $jumlahTujuan, // <-- 5. KIRIM KE VIEW
            'jumlahSetting' => $jumlahSetting, // <-- 6. KIRIM KE VIEW
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // [DIUBAH] Ambil data dengan pagination & kirim ke view yang benar
        $katas = Kata::latest()->paginate(10); 
        return view('admin.katas.index', compact('katas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // [DIUBAH] Kirim ke view yang benar
        return view('admin.katas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kata_bangka' => 'required|string|max:255',
            'arti_indonesia' => 'required|string|max:255',
            'definisi' => 'nullable|string',
            'contoh' => 'nullable|string',
            'sinonim' => 'nullable|string',
        ]);

        Kata::create($request->all());
        return redirect()->route('katas.index')->with('success', 'Kata berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kata $kata)
    {
        // Fungsi ini tidak kita gunakan, bisa diabaikan
        // [DIUBAH] Kirim ke view yang benar (jika suatu saat dipakai)
        return view('admin.katas.show', compact('kata'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kata $kata)
    {
        // [DIUBAH] Kirim ke view yang benar
        return view('admin.katas.edit', compact('kata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kata $kata)
    {
        $request->validate([
            'kata_bangka' => 'required|string|max:255',
            'arti_indonesia' => 'required|string|max:255',
            'definisi' => 'nullable|string',
            'contoh' => 'nullable|string',
            'sinonim' => 'nullable|string',
        ]);

        $kata->update($request->all());
        return redirect()->route('katas.index')->with('success', 'Kata berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kata $kata)
    {
        $kata->delete();
        return redirect()->route('katas.index')->with('success', 'Kata berhasil dihapus.');
    }
}