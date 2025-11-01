<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\TujuanController; // <-- 1. TAMBAHKAN INI
use App\Http\Controllers\SettingController;

// == RUTE UNTUK HALAMAN PUBLIK ==
Route::get('/', [PublicController::class, 'index'])->name('beranda');
Route::get('/tentang', [PublicController::class, 'tentang'])->name('tentang');
Route::get('/buku-digital', function () {
    return view('buku_digital');
})->name('buku.digital');
Route::get('/search-live', [PublicController::class, 'searchLive'])->name('search.live');
Route::get('/berita/{berita:slug}', [BeritaController::class, 'show'])->name('berita.show');

// == RUTE UNTUK PENGGUNA YANG SUDAH LOGIN ==
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        return redirect()->route('admin.dashboard');
    })->name('dashboard');

    Route::prefix('admin')->group(function() {
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        
        Route::resource('katas', AdminController::class);
        Route::resource('beritas', BeritaController::class)->names('admin.beritas');

        // <-- 2. TAMBAHKAN RUTE BARU INI
        Route::resource('tujuans', TujuanController::class)->names('admin.tujuans');

        // [BARU] Rute untuk Halaman Pengaturan
    Route::get('/pengaturan', [SettingController::class, 'index'])->name('admin.settings.index');
    Route::post('/pengaturan', [SettingController::class, 'update'])->name('admin.settings.update');
    });
});

require __DIR__.'/auth.php';