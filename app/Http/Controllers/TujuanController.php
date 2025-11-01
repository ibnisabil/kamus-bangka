<?php

namespace App\Http\Controllers;

use App\Models\Tujuan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class TujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tujuans = Tujuan::orderBy('urutan')->paginate(10);
        return view('admin.tujuans.index', compact('tujuans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tujuans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'urutan' => 'required|integer',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $gambarPath = $request->file('gambar')->store('tujuan', 'public');

        Tujuan::create([
            'judul' => $validatedData['judul'],
            'deskripsi' => $validatedData['deskripsi'],
            'urutan' => $validatedData['urutan'],
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('admin.tujuans.index')->with('success', 'Item tujuan baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tujuan $tujuan)
    {
        // Tidak kita gunakan
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tujuan $tujuan)
    {
        // [DIISI] Arahkan ke view formulir edit
        return view('admin.tujuans.edit', compact('tujuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tujuan $tujuan)
    {
        // [DIISI] Logika validasi dan update
        
        // 1. Validasi (gambar sekarang boleh kosong/nullable)
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'urutan' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Boleh kosong
        ]);

        // 2. Siapkan data untuk diupdate
        $dataToUpdate = $validatedData;

        // 3. Cek jika ada file gambar BARU yang di-upload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama (jika bukan placeholder)
            if ($tujuan->gambar && !\Illuminate\Support\Str::startsWith($tujuan->gambar, 'http')) {
                Storage::disk('public')->delete($tujuan->gambar);
            }
            
            // Simpan gambar baru
            $gambarPath = $request->file('gambar')->store('tujuan', 'public');
            $dataToUpdate['gambar'] = $gambarPath;
        }

        // 4. Update data di database
        $tujuan->update($dataToUpdate);

        return redirect()->route('admin.tujuans.index')->with('success', 'Item tujuan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tujuan $tujuan)
    {
        // [DIISI] Logika hapus
        
        // 1. Hapus file gambar dari storage (jika bukan placeholder)
        if ($tujuan->gambar && !\Illuminate\Support\Str::startsWith($tujuan->gambar, 'http')) {
             Storage::disk('public')->delete($tujuan->gambar);
        }
        
        // 2. Hapus data dari database
        $tujuan->delete();

        return redirect()->route('admin.tujuans.index')->with('success', 'Item tujuan berhasil dihapus.');
    }
}