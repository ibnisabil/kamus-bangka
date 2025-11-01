<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Setting; // <-- Import Model Setting
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Menampilkan halaman formulir pengaturan.
     */
    public function index()
    {
        // Ambil semua settings dan ubah jadi format 'key' => 'value'
        // agar mudah digunakan di view
        $settings = Setting::all()->pluck('value', 'key');

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Menyimpan data pengaturan yang di-submit dari formulir.
     */
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'youtube_link' => 'nullable|url',
            'gmaps_link' => 'nullable|url',
        ]);

        // Simpan atau update data satu per satu
        // 'updateOrCreate' akan membuat baris baru jika 'key' belum ada,
        // atau meng-update 'value' jika 'key' sudah ada.
        Setting::updateOrCreate(
            ['key' => 'youtube_link'],
            ['value' => $request->input('youtube_link')]
        );

        Setting::updateOrCreate(
            ['key' => 'gmaps_link'],
            ['value' => $request->input('gmaps_link')]
        );

        // Redirect kembali ke halaman yang sama dengan pesan sukses
        return redirect()->back()->with('success', 'Pengaturan berhasil disimpan.');
    }
}