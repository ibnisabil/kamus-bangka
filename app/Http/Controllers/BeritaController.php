<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * [ADMIN] Menampilkan daftar berita
     */
    public function index()
    {
        $beritas = Berita::latest()->paginate(10);
        return view('admin.beritas.index', compact('beritas'));
    }

    /**
     * [ADMIN] Menampilkan form untuk membuat berita baru
     */
    public function create()
    {
        return view('admin.beritas.create');
    }

    /**
     * [ADMIN] Menyimpan berita baru ke database
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'isi_lengkap' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $gambarPath = $request->file('gambar')->store('berita', 'public');
        $slug = Str::slug($request->judul);

        Berita::create([
            'judul' => $validatedData['judul'],
            'slug' => $slug,
            'kategori' => $validatedData['kategori'],
            'excerpt' => $validatedData['excerpt'],
            'isi_lengkap' => $validatedData['isi_lengkap'],
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('admin.beritas.index')->with('success', 'Berita baru berhasil ditambahkan.');
    }

    /**
     * [PUBLIK] Menampilkan halaman detail untuk satu berita.
     */
    public function show(Berita $berita)
    {
        return view('berita.show', [
            'berita' => $berita
        ]);
    }

    /**
     * [ADMIN] Menampilkan form untuk mengedit berita
     */
    public function edit(Berita $berita)
    {
        // [DIISI] Arahkan ke view formulir edit
        return view('admin.beritas.edit', compact('berita'));
    }

    /**
     * [ADMIN] Memperbarui berita di database
     */
    public function update(Request $request, Berita $berita)
    {
        // [DIISI] Logika validasi dan update
        
        // 1. Validasi (gambar sekarang boleh kosong/nullable)
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'isi_lengkap' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Boleh kosong
        ]);

        // 2. Siapkan data untuk diupdate
        $dataToUpdate = $validatedData;

        // 3. Cek jika judul berubah, buat slug baru
        if ($request->judul != $berita->judul) {
            $dataToUpdate['slug'] = Str::slug($request->judul);
        }

        // 4. Cek jika ada file gambar BARU yang di-upload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            Storage::disk('public')->delete($berita->gambar);
            
            // Simpan gambar baru
            $gambarPath = $request->file('gambar')->store('berita', 'public');
            $dataToUpdate['gambar'] = $gambarPath;
        }

        // 5. Update data di database
        $berita->update($dataToUpdate);

        return redirect()->route('admin.beritas.index')->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * [ADMIN] Menghapus berita dari database
     */
    public function destroy(Berita $berita)
    {
        // [DIISI] Logika hapus
        
        // 1. Hapus file gambar dari storage
        Storage::disk('public')->delete($berita->gambar);
        
        // 2. Hapus data dari database
        $berita->delete();

        return redirect()->route('admin.beritas.index')->with('success', 'Berita berhasil dihapus.');
    }
}