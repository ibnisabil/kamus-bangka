@extends('layouts.public_layout')

@section('content')

<div class="relative -mt-[96px]">
    {{-- Background Video and Overlay --}}
    <video src="{{ asset('videos/background-video.mp4') }}" autoplay loop muted playsinline class="absolute z-0 w-full h-full object-cover"></video>
    <div class="absolute z-10 w-full h-full bg-black opacity-60"></div> {{-- Opacity sedikit dinaikkan untuk kontras lebih baik --}}

    {{-- Main Content Container (Dipertahankan justify-start) --}}
    <div class="relative z-20 container mx-auto px-6 pt-[120px] pb-[120px] min-h-screen flex flex-col items-center justify-center">

        {{-- Hero Section (Title and Description) --}}
        <section class="max-w-4xl mx-auto text-center pt-8 md:pt-12">

            <div class="space-y-1 mb-12">
                {{-- Headings --}}
                <h1 class="text-3xl md:text-6xl font-extrabold text-white leading-tight font-serif text-shadow-lg">
                    Selamat Datang
                </h1>
                <h2 class="text-4xl md:text-6xl font-extrabold text-white font-serif text-shadow-lg">
                    di <span class="text-blue-400">KABAKA</span>
                </h2>
                <h2 class="text-3xl md:text-6xl font-extrabold text-white font-serif text-shadow-lg">
                    Kamus Bahasa Bangka
                </h2>

                {{-- Description --}}
                <p class="text-white/90 text-md md:text-lg max-w-2xl mx-auto mt-6 mb-8 font-light">
                    Cari dan temukan <span class="font-semibold text-white">Bahasa Indonesia</span> <i class="fa-solid fa-arrow-right-arrow-left mx-1 text-blue-300"></i> <span class="font-semibold text-white">Bahasa Bangka</span> dengan mudah, sehingga anda dapat mempelajari dan melestarikannya.
                </p>
            </div>

            {{-- Search Card DIBUAT MINIMALIS --}}
            <div class="w-full">
                {{-- Search Card Header DIHAPUS, fokus ke input --}}
                <div class="space-y-4 max-w-3xl mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-[2fr,2fr,1fr] gap-4">
                        {{-- Search Input --}}
                        <input
                            type="text"
                            id="search-input"
                            class="w-full px-5 py-3 bg-white text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-blue-300 focus:border-blue-400 rounded-xl border-2 border-transparent transition duration-300 shadow-xl"
                            placeholder="Ketik kata yang dicari..."
                            autocomplete="off">

                        {{-- Dialect Select --}}
                        <select id="dialek-select" class="w-full px-5 py-3 bg-white text-gray-800 appearance-none focus:outline-none focus:ring-4 focus:ring-blue-300 focus:border-blue-400 rounded-xl border-2 border-transparent transition duration-300 shadow-xl cursor-pointer">
                            <option class="bg-white text-gray-800" value="semua">Semua Dialek</option>
                            <option class="bg-white text-gray-800" value="Bangka Barat">Bangka Barat</option>
                            <option class="bg-white text-gray-800" value="Bangka Induk">Bangka Induk</option>
                            <option class="bg-white text-gray-800" value="Bangka Selatan">Bangka Selatan</option>
                            <option class="bg-white text-gray-800" value="Bangka Tengah">Bangka Tengah</option>
                            <option class="bg-white text-gray-800" value="Pangkalpinang">Pangkalpinang</option>
                        </select>

                        {{-- Search Button --}}
                        <button type="button" id="search-button" class="w-full bg-blue-600 text-white rounded-xl px-4 py-3 hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-300 font-semibold flex items-center justify-center gap-2 shadow-xl hover:shadow-2xl hover:-translate-y-0.5 active:scale-98">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <span class="hidden md:inline">Cari</span>
                        </button>
                    </div>
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
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search-input');
        const dialekSelect = document.getElementById('dialek-select');
        const searchButton = document.getElementById('search-button');
        const resultsContainer = document.getElementById('search-results-container');
        const resultCountContainer = document.getElementById('result-count-container');

        /**
         * Melakukan pencarian kata ke API dan menampilkan hasilnya.
         */
        function performSearch() {
            const query = searchInput.value.trim();
            const dialek = dialekSelect.value;

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

            fetch(`{{ route('search.live') }}?search=${encodeURIComponent(query)}&dialek=${encodeURIComponent(dialek)}`)
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
                            Menampilkan <span class="font-semibold text-white">${data.length}</span> hasil pencarian untuk "${query}"
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
                                    Coba periksa kembali ejaan atau pilih dialek lain.
                                </p>
                            </div>
                        `;
                        return;
                    }

                    data.forEach(item => {
                        // Ikon dan warna diperbarui untuk kesan modern dan clean
                        const definisiHtml = item.definisi ? `
                            <div class="flex gap-4 items-start">
                                <i class="fa-solid fa-book-open text-lg text-blue-500 flex-shrink-0 mt-1"></i>
                                <div>
                                    <h4 class="font-bold text-gray-800 text-sm md:text-base mb-0.5">Definisi:</h4>
                                    <p class="text-gray-600 text-sm md:text-base">${item.definisi}</p>
                                </div>
                            </div>` : '';

                        const contohHtml = item.contoh ? `
                            <div class="flex gap-4 items-start">
                                <i class="fa-solid fa-lightbulb text-lg text-yellow-500 flex-shrink-0 mt-1"></i>
                                <div>
                                    <h4 class="font-bold text-gray-800 text-sm md:text-base mb-0.5">Contoh:</h4>
                                    <p class="italic text-gray-600 text-sm md:text-base">"${item.contoh}"</p>
                                </div>
                            </div>` : '';

                        const sinonimHtml = item.sinonim ? `
                            <div class="flex gap-4 items-start">
                                <i class="fa-solid fa-tags text-lg text-green-500 flex-shrink-0 mt-1"></i>
                                <div>
                                    <h4 class="font-bold text-gray-800 text-sm md:text-base mb-0.5">Sinonim:</h4>
                                    <p class="text-gray-600 text-sm md:text-base">${item.sinonim}</p>
                                </div>
                            </div>` : '';

                        // Word Pair Card diperbarui
                        const resultCard = `
                            <div class="bg-white/95 backdrop-blur-sm rounded-xl p-6 text-gray-800 animate-fade-in shadow-2xl transition duration-300 hover:shadow-blue-500/30">
                                {{-- Word Pair --}}
                                <div class="grid grid-cols-1 sm:grid-cols-[2fr_1fr_2fr] gap-4 items-center mb-6 border-b border-gray-100 pb-6">
                                    <div class="text-center">
                                        <span class="text-sm text-blue-600 font-semibold uppercase tracking-wider">Indonesia</span>
                                        <p class="text-3xl font-extrabold mt-1">${item.arti_indonesia}</p>
                                    </div>
                                    <div class="text-center hidden sm:block">
                                        <i class="fa-solid fa-arrow-right-arrow-left text-2xl text-blue-400"></i>
                                    </div>
                                    <div class="text-center">
                                        <span class="text-sm text-red-600 font-semibold uppercase tracking-wider">Bangka</span>
                                        <p class="text-3xl font-extrabold mt-1">${item.kata_bangka}</p>
                                        <span class="text-xs text-gray-500 font-medium uppercase tracking-wider mt-1 block">(${item.dialek})</span>
                                    </div>
                                </div>
                                {{-- Details (Definisi, Contoh, Sinonim) --}}
                                <div class="space-y-4 text-gray-600">
                                    ${definisiHtml}
                                    ${contohHtml}
                                    ${sinonimHtml}
                                </div>
                            </div>
                        `;
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
        dialekSelect.addEventListener('change', performSearch); // Tambahkan event change untuk dialek

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
        const dialekQuery = urlParams.get('dialek');

        if (searchQuery) {
            searchInput.value = searchQuery;
            if (dialekQuery) { dialekSelect.value = dialekQuery; }
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
</style>
@endpush
