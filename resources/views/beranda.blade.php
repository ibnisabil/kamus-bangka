@extends('layouts.public_layout')

@section('content')

<div class="relative -mt-[96px]">
    {{-- Background Video and Overlay --}}
    <video src="{{ asset('videos/background-video.mp4') }}" autoplay loop muted playsinline class="absolute z-0 w-full h-full object-cover"></video>
    <div class="absolute z-10 w-full h-full bg-black opacity-40"></div>

    {{-- Main Content Container (Dipertahankan justify-start) --}}
    <div class="relative z-20 container mx-auto px-6 pt-[96px] pb-16 min-h-screen flex flex-col items-center justify-start">

        {{-- Hero Section (Title and Description) --}}
        <section class="max-w-3xl mx-auto text-center pt-8 md:pt-12">

            <div class="space-y-1 mb-20">
                {{-- Headings --}}
                <h1 class="text-5xl md:text-6xl font-bold text-white leading-tight font-serif text-shadow-lg">
    Selamat Datang
</h1>
<h2 class="text-5xl md:text-6xl font-bold text-white font-serif text-shadow-lg">
    di <span class="text-blue-400">KABAKA</span>
</h2>
<h2 class="text-5xl md:text-6xl font-bold text-white font-serif text-shadow-lg">
    Kamus Bahasa Bangka
</h2>

                {{-- Description --}}
                <p class="text-white/100 text-md md:text-lg max-w-2xl mx-auto mt-6 mb-8">
                    Cari dan temukan <span class="text-white">Bahasa Indonesia</span> <i class="fa-solid fa-arrow-right-arrow-left mx-1"></i> <span class="text-white">Bahasa Bangka</span> dengan mudah, sehingga anda dapat mempelajari dan melestarikannya.
                </p>
            </div>

            {{-- Search Card DIBUAT MINIMALIS --}}
            <div class="w-full">
                {{-- Search Card Header --}}
                <div class="text-center mb-6">
                    {{-- IKON DAN TEKS "Cari Kata" DIHAPUS DARI SINI --}}
                </div>

                {{-- Search Inputs & Button --}}
                <div class="space-y-4 max-w-2xl mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-[2fr,2fr,1fr] gap-4">
                        {{-- Search Input --}}
                        <input
                            type="text"
                            id="search-input"
                            class="w-full px-4 py-3 bg-white text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent rounded-lg border border-gray-300 transition duration-300 shadow-md"
                            placeholder="Ketik kata yang dicari..."
                            autocomplete="off">

                        {{-- Dialect Select --}}
                        <select id="dialek-select" class="w-full px-4 py-3 bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent rounded-lg border border-gray-300 transition duration-300 shadow-md">
                            <option class="bg-white text-gray-800" value="semua">Semua Dialek</option>
                            <option class="bg-white text-gray-800" value="Bangka Barat">Bangka Barat</option>
                            <option class="bg-white text-gray-800" value="Bangka Induk">Bangka Induk</option>
                            <option class="bg-white text-gray-800" value="Bangka Selatan">Bangka Selatan</option>
                            <option class="bg-white text-gray-800" value="Bangka Tengah">Bangka Tengah</option>
                            <option class="bg-white text-gray-800" value="Pangkalpinang">Pangkalpinang</option>
                        </select>

                        {{-- Search Button --}}
                        <button type="button" id="search-button" class="w-full bg-blue-600 text-white rounded-lg px-4 py-3 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 focus:ring-offset-black/50 transition duration-300 font-semibold flex items-center justify-center gap-2 shadow-xl hover:shadow-2xl hover:-translate-y-1 relative active:scale-98">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <span class="hidden md:inline">Cari</span>
                        </button>
                    </div>
                </div>

                {{-- Search Results Area --}}
                <div class="w-full pt-8 text-left max-w-3xl mx-auto">
                    <div id="result-count-container" class="mb-4 text-center"></div>
                    <div id="search-results-container" class="max-h-[50vh] overflow-y-auto pr-2 space-y-4">
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

            // Skeleton Card untuk Loading State
            const skeletonCard = `
                <div class="bg-white rounded-lg p-6 animate-pulse">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 items-center mb-4 border-b border-gray-200 pb-4">
                        <div class="text-center space-y-2">
                            <div class="h-4 bg-gray-200 rounded-md w-1/2 mx-auto"></div>
                            <div class="h-6 bg-gray-300 rounded-md w-3/4 mx-auto"></div>
                        </div>
                        <div class="text-center space-y-2">
                            <div class="h-4 bg-gray-200 rounded-md w-1/2 mx-auto"></div>
                            <div class="h-6 bg-gray-300 rounded-md w-3/4 mx-auto"></div>
                            <div class="h-3 bg-gray-200 rounded-md w-1/3 mx-auto mt-1"></div>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex gap-3">
                            <div class="h-5 w-5 bg-gray-200 rounded"></div>
                            <div class="flex-1 space-y-2">
                                <div class="h-4 bg-gray-200 rounded-md w-1/4"></div>
                                <div class="h-3 bg-gray-300 rounded-md w-full"></div>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <div class="h-5 w-5 bg-gray-200 rounded"></div>
                            <div class="flex-1 space-y-2">
                                <div class="h-4 bg-gray-200 rounded-md w-1/4"></div>
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
                    resultCountContainer.innerHTML = `<p class="text-center text-gray-400 mb-6">Menampilkan ${data.length} hasil pencarian</p>`;
                    resultsContainer.innerHTML = '';

                    if (data.length === 0) {
                        resultsContainer.innerHTML = `<div class="bg-black/20 rounded-lg text-center text-white py-8"><p>Maaf, kata yang Anda cari tidak ditemukan.</p></div>`;
                        return;
                    }

                    data.forEach(item => {
                        const definisiHtml = item.definisi ? `
                            <div class="flex gap-3">
                                <i class="fa-solid fa-book-open text-green-500 mt-1"></i>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Definisi:</h4>
                                    <p class="text-sm">${item.definisi}</p>
                                </div>
                            </div>` : '';

                        const contohHtml = item.contoh ? `
                            <div class="flex gap-3">
                                <i class="fa-solid fa-quote-left text-yellow-500 mt-1"></i>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Contoh:</h4>
                                    <p class="italic text-sm">"${item.contoh}"</p>
                                </div>
                            </div>` : '';

                        const sinonimHtml = item.sinonim ? `
                            <div class="flex gap-3">
                                <i class="fa-solid fa-tags text-orange-500 mt-1"></i>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Sinonim:</h4>
                                    <p class="text-sm">${item.sinonim}</p>
                                </div>
                            </div>` : '';

                        const resultCard = `
                            <div class="bg-white rounded-lg p-6 text-gray-800 animate-fade-in shadow-xl">
                                {{-- Word Pair --}}
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 items-center mb-4 border-b border-gray-200 pb-4">
                                    <div class="text-center">
                                        <span class="text-sm text-blue-600 font-semibold">Indonesia</span>
                                        <p class="text-xl font-bold">${item.arti_indonesia}</p>
                                    </div>
                                    <div class="text-center">
                                        <span class="text-sm text-red-600 font-semibold">Bangka</span>
                                        <p class="text-xl font-bold">${item.kata_bangka}</p>
                                        <span class="text-xs text-gray-500 font-medium uppercase tracking-wider">(${item.dialek})</span>
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
        background: rgba(0, 0, 0, 0.2);
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
