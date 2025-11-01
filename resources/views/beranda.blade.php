@extends('layouts.public_layout')

@section('content')

{{-- [OPSIONAL TAPI DISARANKAN] Tambahkan ini di layout utama Anda (layouts.public_layout) di dalam <head> --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
{{-- Jika tidak, baris di atas bisa diletakkan di sini, tapi lebih baik di <head> --}}


{{-- =================================== --}}
{{-- HERO SECTION ANDA (TIDAK BERUBAH) --}}
{{-- =================================== --}}
<div class="relative -mt-[96px]">
    {{-- Background Video and Overlay --}}
    <video src="{{ asset('videos/background-video.mp4') }}" autoplay loop muted playsinline class="absolute z-0 w-full h-full object-cover"></video>
    <div class="absolute z-10 w-full h-full bg-black opacity-60"></div> {{-- Opacity sedikit dinaikkan untuk kontras lebih baik --}}

    {{-- Main Content Container (Dipertahankan justify-start) --}}
    <div class="relative z-20 container mx-auto px-6 pt-[120px] pb-[120px] min-h-[calc(100vh+96px)] flex flex-col items-center justify-center">

        {{-- Hero Section (Title and Description) --}}
        <section class="max-w-4xl mx-auto text-center pt-8 md:pt-12">

            <div class="space-y-1 mb-12">
                {{-- Headings --}}
                <h1 class="text-3xl md:text-6xl font-extrabold text-white leading-tight font-serif text-shadow-lg">
                    Selamat Datang
                </h1>
                <h2 class="text-4xl md:text-6xl font-extrabold text-white font-serif text-shadow-lg">
                    di <span class="text-blue-400">KATAKA</span>
                </h2>
                <h2 class="text-3xl md:text-6xl font-extrabold text-white font-serif text-shadow-lg">
                    Kamus Pariwisata Bangka
                </h2>

                {{-- Description --}}
                <p class="text-white/90 text-md md:text-lg max-w-2xl mx-auto mt-6 mb-8 font-light">
                    Cari dan temukan <span class="font-semibold text-white">Bahasa Indonesia</span> <i class="fa-solid fa-arrow-right-arrow-left mx-1 text-blue-300"></i> <span class="font-semibold text-white">Bahasa Bangka</span> dengan mudah, sehingga anda dapat mempelajari dan melestarikannya.
                </p>
            </div>

            {{-- Search Card DIBUAT MINIMALIS --}}
            <div class="w-full">
                {{-- Search Card Header DIHAPUS, fokus ke input --}}
                <div class="space-y-4 max-w-xl mx-auto">
                    
                    {{-- =============================================== --}}
                    {{-- === [PERUBAHAN DIMULAI DI SINI] === --}}
                    {{-- =============================================== --}}

                    {{-- [DIUBAH] Ganti 'grid' dengan 'relative' wrapper --}}
                    <div class="relative w-full">
                        
                        {{-- [DIUBAH] Input mendapat padding kanan (pr) untuk memberi ruang bagi tombol --}}
                        <input
                            type="text"
                            id="search-input"
                            class="w-full px-5 py-3 bg-white text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-blue-300 focus:border-blue-400 rounded-xl border-2 border-transparent transition duration-300 shadow-xl 
                                   pr-20 md:pr-28" {{-- Padding kanan: pr-20 (mobile, icon), md:pr-28 (desktop, 'Cari') --}}
                            placeholder="ketika istilah kata pariwisata yang dicari"
                            autocomplete="off">

                        {{-- [DIUBAH] Tombol sekarang 'absolute' dan diposisikan di dalam input --}}
                        <button type="button" id="search-button" 
                                class="absolute inset-y-1.5 right-1.5 flex items-center justify-center bg-blue-600 text-white rounded-lg px-4 hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-300 font-semibold shadow-md
                                       w-auto {{-- Hapus w-full dan py-3 --}}
                                       gap-2 {{-- Tetap beri gap --}}
                                       active:scale-98 {{-- Tetap beri efek klik --}}
                                       ">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <span class="hidden md:inline">Cari</span>
                        </button>
                    </div>
                    
                    {{-- =============================================== --}}
                    {{-- === [PERUBAHAN BERAKHIR DI SINI] === --}}
                    {{-- =============================================== --}}

                </div>

                {{-- Search Results Area --}}
                <div class="w-full pt-10 text-left max-w-3xl mx-auto">
                    {{-- Result Count Container (Dipercantik) --}}
                    <div id="result-count-container" class="mb-4 text-center"></div>

                    <div id="search-results-container" class="max-h-[60vh] md:max-h-[50vh] overflow-y-auto pr-2 space-y-6">
                        {{-- Hasil akan dimuat di sini oleh JavaScript --}}
                    </div>
                </div>
            </div>

        </section>
    </div>
</div>
{{-- =================================== --}}
{{-- AKHIR HERO SECTION ANDA         --}}
{{-- =================================== --}}



{{-- ======================================================= --}}
{{-- === [KODE BARU] SECTION CAROUSEL BERITA DIMULAI === --}}
{{-- ======================================================= --}}
<section id="berita" class="bg-gray-100 py-16 md:py-24">
    <div class="container mx-auto px-6">

        <div class="mb-12 text-center">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-2 font-serif">
                Berita & Artikel Terbaru
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Ikuti perkembangan pariwisata Bangka terkini.
            </p>
        </div>

        {{-- Kita beri class 'swiperBerita' untuk inisialisasi JS --}}
        <div class="swiper swiperBerita w-full relative">
            
            <div class="swiper-wrapper">

            @forelse($beritas as $berita)
            <div class="swiper-slide bg-white rounded-xl shadow-lg overflow-hidden flex flex-col h-auto">
                {{-- Gambar Berita (Pastikan Anda sudah setup Storage:link) --}}
                {{-- Ganti 'path/ke/default.jpg' jika Anda belum setup storage --}}
                
                {{-- [CATATAN]: Saya perbaiki sedikit kode gambar Anda agar bisa handle placeholder & upload --}}
                <img src="{{ \Illuminate\Support\Str::startsWith($berita->gambar, 'http') ? $berita->gambar : Storage::url($berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-56 object-cover">
                
                {{-- Konten Teks Card --}}
                <div class="p-6 flex flex-col flex-grow">
                    <span class="text-sm text-blue-600 font-semibold mb-2 uppercase">{{ $berita->kategori }}</span>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">{{ $berita->judul }}</h3>
                    <p class="text-gray-600 text-base mb-4 flex-grow line-clamp-3">
                        {{ $berita->excerpt }}
                    </p>
                    
                    {{-- [INI BAGIAN PENTING] Link diubah ke route 'berita.show' --}}
                    <a href="{{ route('berita.show', $berita) }}" class="text-blue-600 font-semibold hover:text-blue-800 self-start transition duration-300">
                        Baca Selengkapnya <i class="fa-solid fa-arrow-right text-xs ml-1"></i>
                    </a>
                </div>
            </div>
            @empty
            {{-- Ini akan tampil jika $beritas kosong --}}
            <div class="swiper-slide bg-white rounded-xl shadow-lg overflow-hidden flex flex-col h-auto p-10 text-center">
                 <p class="text-gray-600">Belum ada berita untuk ditampilkan.</p>
            </div>
            @endforelse
            </div>
            
            <div class="swiper-pagination"></div>

            {{-- Tombol ini akan muncul di luar container utama agar lebih mudah terlihat --}}
        </div>

    </div>
</section>
{{-- ===================================================== --}}
{{-- === [KODE BARU] SECTION CAROUSEL BERITA SELESAI === --}}
{{-- ===================================================== --}}


@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        // --- [KODE BARU] UNTUK INISIALISASI CAROUSEL ---
        const swiper = new Swiper('.swiperBerita', {
            // Parameter opsional
            loop: {{ $beritas->count() > 1 ? 'true' : 'false' }}, // Nonaktifkan loop jika slide <= 1
            slidesPerView: 1,   // Tampil 1 slide di mobile
            spaceBetween: 30,   // Jarak antar slide 30px
            
            // Responsiveness (Breakpoints)
            breakpoints: {
                // Saat lebar layar >= 768px (md di Tailwind)
                768: {
                    slidesPerView: 2, // Tampilkan 2 slide
                    spaceBetween: 30
                },
                // Saat lebar layar >= 1024px (lg di Tailwind)
                1024: {
                    slidesPerView: {{ $beritas->count() < 3 ? $beritas->count() : 3 }}, // Tampilkan 3 slide (atau kurang jika data < 3)
                    spaceBetween: 40
                }
            },

            // Pagination (titik-titik navigasi)
            pagination: {
                el: '.swiper-pagination',
                clickable: true, // Bisa diklik
            },
            
            // Autoplay
            autoplay: {
                delay: 5000, // Pindah setiap 5 detik
                disableOnInteraction: false, // Tetap autoplay setelah di-swipe manual
            },

            // Keyboard navigation
            keyboard: {
                enabled: true,
            },
        });
        // --- [AKHIR KODE BARU CAROUSEL] ---


        // --- [KODE SEARCH ANDA YANG SUDAH ADA] ---
        const searchInput = document.getElementById('search-input');
        const searchButton = document.getElementById('search-button');
        const resultsContainer = document.getElementById('search-results-container');
        const resultCountContainer = document.getElementById('result-count-container');

        /**
         * Melakukan pencarian kata ke API dan menampilkan hasilnya.
         */
        function performSearch() {
            const query = searchInput.value.trim();

            if (query.length === 0) {
                searchInput.focus();
                resultsContainer.innerHTML = '';
                resultCountContainer.innerHTML = '';
                return;
            }

            // Skeleton Card untuk Loading State - Diperbarui untuk gaya modern
            const skeletonCard = `
                <div class="bg-white/95 rounded-xl p-6 text-gray-800 animate-pulse shadow-2xl">
                    <div class="grid grid-cols-1 sm:grid-cols-[2fr_1fr_2fr] gap-4 items-center mb-6 border-b border-gray-100 pb-6">
                        <div class="text-center space-y-2">
                            <div class="h-3 bg-gray-200 rounded w-1/3 mx-auto"></div>
                            <div class="h-8 bg-gray-300 rounded-lg w-3/4 mx-auto"></div>
                        </div>
                        <div class="text-center">
                            <div class="h-6 w-6 bg-blue-200 rounded-full mx-auto"></div>
                        </div>
                        <div class="text-center space-y-2">
                            <div class="h-3 bg-gray-200 rounded w-1/3 mx-auto"></div>
                            <div class="h-8 bg-gray-300 rounded-lg w-3/4 mx-auto"></div>
                            <div class="h-3 bg-gray-200 rounded w-1/4 mx-auto mt-1"></div>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex gap-4">
                            <div class="h-5 w-5 bg-gray-200 rounded"></div>
                            <div class="flex-1 space-y-2">
                                <div class="h-3 bg-gray-200 rounded-md w-1/4"></div>
                                <div class="h-3 bg-gray-300 rounded-md w-full"></div>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="h-5 w-5 bg-gray-200 rounded"></div>
                            <div class="flex-1 space-y-2">
                                <div class="h-3 bg-gray-200 rounded-md w-1/4"></div>
                                <div class="h-3 bg-gray-300 rounded-md w-full"></div>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            resultCountContainer.innerHTML = '';
            resultsContainer.innerHTML = skeletonCard + skeletonCard; // Tampilkan 2 skeleton

            fetch(`{{ route('search.live') }}?search=${encodeURIComponent(query)}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
    // Tampilan hitungan hasil diperbarui
    resultCountContainer.innerHTML = `
        <p class="text-center text-white/80 text-lg mb-6 font-light">
            Menampilkan <span class="font-semibold text-white">${data.length}</span> hasil pencarian untuk "<span class="font-semibold">${query}</span>"
        </p>
    `;
    resultsContainer.innerHTML = '';

    if (data.length === 0) {
        resultsContainer.innerHTML = `
            <div class="bg-white/30 backdrop-blur-sm rounded-xl text-center text-white/90 py-10 px-6 shadow-xl flex flex-col items-center justify-center space-y-4">
                <i class="fa-regular fa-face-frown-open text-5xl text-blue-300"></i>
                <p class="text-2xl md:text-3xl font-bold text-white leading-tight">Kata Tidak Ditemukan</p>
                <p class="text-base text-white/70 max-w-md">
                    Maaf, kami tidak menemukan hasil untuk "<span class="font-semibold">${query}</span>".
                    Coba periksa kembali ejaan atau pilih kata lain.
                </p>
            </div>
        `;
        return;
    }

    data.forEach(item => {
        // --- [PERUBAHAN DIMULAI DI SINI] ---

        // Ikon dan layout detail yang lebih clean
        const definisiHtml = item.definisi ? `
            <div class="flex gap-3 items-start">
                <i class="fa-solid fa-book-open text-base text-blue-500 flex-shrink-0 mt-1 w-5 text-center"></i>
                <div>
                    <h4 class="font-semibold text-gray-500 text-sm mb-0.5">Definisi</h4>
                    <p class="text-gray-800 text-base">${item.definisi}</p>
                </div>
            </div>` : '';

        const contohHtml = item.contoh ? `
            <div class="flex gap-3 items-start">
                <i class="fa-solid fa-lightbulb text-base text-yellow-500 flex-shrink-0 mt-1 w-5 text-center"></i>
                <div>
                    <h4 class="font-semibold text-gray-500 text-sm mb-0.5">Contoh</h4>
                    <p class="italic text-gray-800 text-base">"${item.contoh}"</p>
                </div>
            </div>` : '';

        const sinonimHtml = item.sinonim ? `
            <div class="flex gap-3 items-start">
                <i class="fa-solid fa-tags text-base text-green-500 flex-shrink-0 mt-1 w-5 text-center"></i>
                <div>
                    <h4 class="font-semibold text-gray-500 text-sm mb-0.5">Sinonim</h4>
                    <p class="text-gray-800 text-base">${item.sinonim}</p>
                </div>
            </div>` : '';

        // --- [PERUBAHAN UTAMA KARTU] ---
// Layout diubah agar lebih seimbang dan modern
const resultCard = `
    <div class="bg-white/95 backdrop-blur-sm rounded-xl p-6 text-gray-900 animate-fade-in shadow-xl transition duration-300 hover:shadow-2xl hover:shadow-blue-500/20">

        {{-- Word Pair (Layout 5 kolom agar seimbang) --}}
        <div class="grid grid-cols-5 gap-2 items-center mb-5 border-b border-gray-200/70 pb-5">
            {{-- INI DIPINDAH KE KIRI --}}
            <div class="col-span-2 text-center">
                <span class="text-xs font-semibold uppercase tracking-wider text-red-600">Pariwisata</span>
                <p class="text-3xl font-bold text-gray-900 mt-1">${item.kata_bangka}</p>
            </div>
            {{-- PANAH TETAP DI TENGAH --}}
            <div class="col-span-1 text-center">
                <i class="fa-solid fa-arrow-right-arrow-left text-2xl text-blue-400/80"></i>
            </div>
            {{-- INI DIPINDAH KE KANAN --}}
            <div class="col-span-2 text-center">
                <span class="text-xs font-semibold uppercase tracking-wider text-blue-600">Bangka</span>
                <p class="text-3xl font-bold text-gray-900 mt-1">${item.arti_indonesia}</p>
            </div>
        </div>

                {{-- Details (Definisi, Contoh, Sinonim) --}}
                <div class="space-y-4">
                    ${definisiHtml}
                    ${contohHtml}
                    ${sinonimHtml}
                </div>
            </div>
    `;
        // --- [PERUBAHAN BERAKHIR DI SINI] ---

        resultsContainer.innerHTML += resultCard;
    });
})
                .catch(error => {
                    console.error('Error fetching search results:', error);
                    resultCountContainer.innerHTML = `<p class="text-center text-red-400">Terjadi kesalahan saat memuat hasil. Silakan coba lagi.</p>`;
                    resultsContainer.innerHTML = '';
                });
        }

        // Event Listeners
        searchButton.addEventListener('click', performSearch);

        searchInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                performSearch();
            }
        });

        searchInput.addEventListener('input', function() {
            if (searchInput.value.trim().length === 0) {
                resultsContainer.innerHTML = '';
                resultCountContainer.innerHTML = '';
            }
        });

        // Initial Search from URL Parameters
        const urlParams = new URLSearchParams(window.location.search);
        const searchQuery = urlParams.get('search');

        if (searchQuery) {
            searchInput.value = searchQuery;
            // Run the search immediately on load if parameters exist
            performSearch();
        }
    });
</script>
<style>
    /* Custom CSS for fade-in animation */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeIn 0.4s ease-out forwards;
    }
    .text-shadow-lg {
        text-shadow: 0px 1px 6px rgba(0, 0, 0, 0.8);
    }
    /* Scrollbar styling for better look on dark background */
    #search-results-container::-webkit-scrollbar {
        width: 8px;
    }
    #search-results-container::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
    }
    #search-results-container::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.4);
        border-radius: 10px;
    }
    #search-results-container::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.6);
    }
    .swiperBerita .swiper-pagination {
        position: relative;  /* Mengubah dari 'absolute' (menimpa) menjadi 'relative' (normal) */
        bottom: auto;        /* Menghapus posisi 'bottom: 10px' bawaan Swiper */
        margin-top: 1.5rem;  /* Memberi jarak 1.5rem (24px) dari kartu berita di atasnya */
    }
    .swiper-pagination-bullet-active {
        /* Menggunakan warna biru-600 dari Tailwind */
        background-color: #2563eb !important;
    }
    /* Memastikan card slide memiliki tinggi yang konsisten */
    .swiper-slide {
        height: auto;
    }
    /* --- [AKHIR KODE BARU] --- */

</style>
@endpush