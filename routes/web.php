    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\PublicController;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\ProfileController;

    // == RUTE UNTUK HALAMAN PUBLIK ==
    Route::get('/', [PublicController::class, 'index'])->name('beranda');
    Route::get('/tentang', [PublicController::class, 'tentang'])->name('tentang');

    // BARU: Rute khusus untuk Live Search (API Endpoint)
    Route::get('/search-live', [PublicController::class, 'searchLive'])->name('search.live');

    // == RUTE UNTUK PENGGUNA YANG SUDAH LOGIN ==
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('/dashboard', function () {
            return redirect()->route('katas.index');
        })->name('dashboard');

        Route::prefix('admin')->group(function() {
            Route::resource('katas', AdminController::class);
        });
    });

    require __DIR__.'/auth.php';


