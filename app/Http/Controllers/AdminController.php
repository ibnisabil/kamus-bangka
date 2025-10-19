<?php

namespace App\Http\Controllers;

use App\Models\Kata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $katas = Kata::all();
        return view('admin.dashboard', compact('katas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Memvalidasi data yang masuk dari form
        $request->validate([
            'kata_bangka' => 'required|string|max:255',
            'arti_indonesia' => 'required|string|max:255',
            'dialek' => 'required|string',
            'definisi' => 'nullable|string', // Validasi baru
            'contoh' => 'nullable|string',   // Validasi baru
            'sinonim' => 'nullable|string',  // Validasi baru
        ]);

        // Membuat data baru menggunakan semua data yang tervalidasi
        Kata::create($request->all());

        return redirect()->route('katas.index')->with('success', 'Kata berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kata $kata)
    {
        // Fungsi ini tidak kita gunakan, bisa diabaikan
        return view('admin.show', compact('kata'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kata $kata)
    {
        return view('admin.edit', compact('kata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kata $kata)
    {
        // Memvalidasi data yang masuk dari form
        $request->validate([
            'kata_bangka' => 'required|string|max:255',
            'arti_indonesia' => 'required|string|max:255',
            'dialek' => 'required|string',
            'definisi' => 'nullable|string', // Validasi baru
            'contoh' => 'nullable|string',   // Validasi baru
            'sinonim' => 'nullable|string',  // Validasi baru
        ]);

        // Memperbarui data yang ada menggunakan semua data yang tervalidasi
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

