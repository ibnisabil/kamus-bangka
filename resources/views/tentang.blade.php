@extends('layouts.public_layout')

@section('content')

{{-- SECTION 1: Hero dengan Background Gambar Laut --}}
{{-- (Sudah Responsif) --}}
<section class="relative bg-gray-800 text-white -mt-[96px] min-h-screen flex items-center">
    <div class="absolute inset-0">
        <img src="{{ asset('images/tentang-bg-1.jpg') }}" alt="Deburan ombak di pantai Bangka" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black opacity-60"></div>
    </div>

    <div class="relative z-10 container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center w-full">
            <div class="md:pr-8 mt-32">
                <h1 class="font-serif text-4xl md:text-5xl font-bold leading-tight">
                    Kamus Digital<br>Bahasa Bangka
                </h1>

                <div class="mt-6">
                    <p class="mb-4">
                        Kamus Digital Bahasa Bangka dibuat untuk melestarikan dan mempelajari bahasa Bangka. Ditujukan bagi masyarakat umum, pelajar, maupun peneliti agar warisan budaya daerah tetap hidup dan dikenal generasi mendatang.
                    </p>
                    <p>
                        Kamus Digital Bahasa Bangka adalah sebuah sarana pembelajaran modern yang menghadirkan kosakata khas Bangka dalam format mudah diakses. Dengan adanya kamus ini, pengguna dapat memahami arti, padanan, dan penggunaan kata dalam kehidupan sehari-hari sekaligus memperkaya pengetahuan tentang budaya lokal.
                    </p>
                    <a href="{{ route('beranda') }}" class="mt-8 inline-block border-2 border-white rounded-lg px-8 py-3 hover:bg-white hover:text-black transition duration-300 font-semibold">
                        Mulai Jelajahi &rarr;
                    </a>
                </div>
            </div>
            <div></div>
        </div>
    </div>
</section>

{{-- ========================================================= --}}
{{-- SECTION 2: Tujuan Kami dengan Kartu (Carousel) --}}
{{-- (Sudah Responsif) --}}
{{-- ========================================================= --}}
<section class="relative text-white min-h-screen flex items-center py-20 md:py-0">
     <div class="absolute inset-0">
        <img src="{{ asset('images/tentang-bg-2.jpg') }}" alt="Pola geometris gelap" class="w-full h-full object-cover">
        {{-- [DITAMBAHKAN] Lapisan overlay hitam 50% transparan --}}
        <div class="absolute inset-0 bg-black opacity-70"></div>
    </div>
    <div class="relative z-10 container mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            {{-- KOLOM KIRI: Teks "Tujuan Kami" --}}
            <div class="lg:pr-12">
                <h2 class="font-serif text-5xl md:text-6xl font-bold mb-6">Tujuan Kami</h2>
                <p class="text-gray-300">
                    Kami berkomitmen untuk melestarikan Bahasa Bangka dengan pendekatan modern yang mudah diakses siapa saja. Kamus digital ini hadir sebagai sarana pendidikan, pelestarian budaya, dan pengenalan identitas daerah. Melalui platform ini, generasi muda dapat lebih mengenal bahasa ibu mereka, sementara masyarakat luas bisa memahami kekayaan bahasa Bangka yang penuh nilai sejarah dan kearifan lokal.
                </p>
            </div>

            {{-- KOLOM KANAN: Carousel & Navigasi Kustom --}}
            <div>
                {{-- Carousel --}}
                <div class="swiper-container overflow-hidden">
                    <div class="swiper-wrapper flex items-stretch">

                        {{-- KARTU 1: Pelestarian --}}
                        <div class="swiper-slide h-full">
                            <div class="bg-black/30 backdrop-blur-md rounded-xl overflow-hidden shadow-lg border border-white/10 h-full flex flex-col">
                                <img src="https://images.unsplash.com/photo-1542856338-e2b26c710688?q=80&w=1964&auto=format&fit=crop&ixlib-rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Kain cual khas Bangka" class="w-full h-64 object-cover flex-shrink-0">
                                <div class="p-6 flex-grow">
                                    <h3 class="font-bold text-xl mb-2">Pelestarian</h3>
                                    <p class="text-gray-400 text-sm">Menjaga bahasa Bangka agar tetap hidup di tengah modernisasi.</p>
                                </div>
                            </div>
                        </div>

                        {{-- KARTU 2: Warisan Budaya --}}
                        <div class="swiper-slide h-full">
                            <div class="bg-black/30 backdrop-blur-md rounded-xl overflow-hidden shadow-lg border border-white/10 h-full flex flex-col">
                                <img src="https://images.unsplash.com/photo-1552233816-234005b76c5f?q=80&w=1974&auto=format&fit=crop&ixlib-rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Warisan budaya Bangka" class="w-full h-64 object-cover flex-shrink-0">
                                <div class="p-6 flex-grow">
                                    <h3 class="font-bold text-xl mb-2">Warisan Budaya</h3>
                                    <p class="text-gray-400 text-sm">Mendokumentasikan kearifan lokal, cerita rakyat, dan tradisi Bangka.</p>
                                </div>
                            </div>
                        </div>

                        {{-- KARTU 3: Riset & Data --}}
                        <div class="swiper-slide h-full">
                            <div class="bg-black/30 backdrop-blur-md rounded-xl overflow-hidden shadow-lg border border-white/10 h-full flex flex-col">
                                <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?q=80&w=2128&auto=format&fit=crop&ixlib-rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Penelitian dan data" class="w-full h-64 object-cover flex-shrink-0">
                                <div class="p-6 flex-grow">
                                    <h3 class="font-bold text-xl mb-2">Riset & Data</h3>
                                    <p class="text-gray-400 text-sm">Menjadi sumber data akurat bagi peneliti bahasa dan budaya lokal.</p>
                                </div>
                            </div>
                        </div>

                        {{-- KARTU 4: Komunitas --}}
                        <div class="swiper-slide h-full">
                            <div class="bg-black/30 backdrop-blur-md rounded-xl overflow-hidden shadow-lg border border-white/10 h-full flex flex-col">
                                <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?q=80&w=2070&auto=format&fit=crop&ixlib-rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Orang-orang berkumpul" class="w-full h-64 object-cover flex-shrink-0">
                                <div class="p-6 flex-grow">
                                    <h3 class="font-bold text-xl mb-2">Komunitas</h3>
                                    <p class="text-gray-400 text-sm">Wadah bagi pengguna untuk berkontribusi & berbagi pengetahuan.</p>
                                </div>
                            </div>
                        </div>

                        {{-- KARTU 5: Aksesibilitas --}}
                        <div class="swiper-slide h-full">
                            <div class="bg-black/30 backdrop-blur-md rounded-xl overflow-hidden shadow-lg border border-white/10 h-full flex flex-col">
                                <img src="https://images.unsplash.com/photo-1585224328409-5006197b173b?q=80&w=1974&auto=format&fit=crop&ixlib-rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Ponsel dan laptop" class="w-full h-64 object-cover flex-shrink-0">
                                <div class="p-6 flex-grow">
                                    <h3 class="font-bold text-xl mb-2">Aksesibilitas</h3>
                                    <p class="text-gray-400 text-sm">Mudah diakses di berbagai perangkat, kapan saja & di mana saja.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="flex justify-between items-center mt-8 gap-6">
                    <div id="custom-pagination" class="text-xl font-bold text-white flex-shrink-0"></div>

                    <div class="swiper-pagination swiper-pagination-progressbar swiper-pagination-horizontal !relative !w-full h-0.5 bg-white/20"></div>

                    <div class="flex items-center gap-4 flex-shrink-0">
                        <div class="swiper-button-prev-custom text-white text-2xl cursor-pointer hover:text-blue-400 transition-colors">&lt;</div>
                        <div class="swiper-button-next-custom text-white text-2xl cursor-pointer hover:text-blue-400 transition-colors">&gt;</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<hr>

{{-- SECTION 3: Buku Kamus PDF dengan Video YouTube --}}
{{-- (Sudah Responsif) --}}
<section class="bg-white py-20 md:py-24">
    <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div class="rounded-xl overflow-hidden shadow-2xl">
            <iframe class="w-full aspect-video" src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="text-gray-700">
            <h2 class="font-serif text-4xl md:text-5xl font-bold mb-4">Buku Kamus Bangka.Pdf</h2>
            <p class="mb-4">
                Temukan kosakata khas Bahasa Melayu Bangka Belitung yang telah disusun secara digital. Portal ini menyediakan akses cepat untuk memahami arti, padanan, dan penggunaan kata dalam keseharian masyarakat Bangka.
            </p>
            <p class="mb-6">
                Selain versi digital, tersedia juga buku dalam bentuk file PDF yang bisa dibaca langsung atau diunduh, sehingga dapat dipelajari kapan saja bahkan tanpa koneksi internet.
            </p>
            <a href="#" class="inline-block border-2 border-gray-800 text-gray-800 rounded-lg px-8 py-3 hover:bg-gray-800 hover:text-white transition duration-300 font-semibold">
                Selengkapnya &rarr;
            </a>
        </div>
    </div>
</section>

@endsection

{{-- ========================================================= --}}
{{-- KODE DI BAWAH INI AKAN DI-PUSH KE LAYOUT (via @push) --}}
{{-- ========================================================= --}}

@push('styles')
    {{-- CDN CSS Swiper.js --}}
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        /* Styling untuk Progress Bar Fill (bagian putih yang bergerak) */
        .swiper-pagination-progressbar .swiper-pagination-progressbar-fill {
            background-color: white !important;
        }
    </style>
@endpush

@push('scripts')
    {{-- CDN JS Swiper.js --}}
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    {{-- Inisialisasi Swiper dengan Navigasi Kustom --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const paginationEl = document.getElementById('custom-pagination');
            const slideCount = document.querySelectorAll('.swiper-container .swiper-slide').length;

            const swiper = new Swiper('.swiper-container', {
                loop: true,
                spaceBetween: 24,
                slidesPerView: 2, // Default (akan ditimpa oleh breakpoints)

                pagination: {
                    el: '.swiper-pagination',
                    type: 'progressbar',
                },

                navigation: {
                    nextEl: '.swiper-button-next-custom',
                    prevEl: '.swiper-button-prev-custom',
                },

                on: {
                    init: function () {
                        const current = ('0' + (this.realIndex + 1)).slice(-2);
                        const total = ('0' + slideCount).slice(-2);
                        paginationEl.innerHTML = `<span>${current}</span> / <span>${total}</span>`;
                    },
                    slideChange: function () {
                        const current = ('0' + (this.realIndex + 1)).slice(-2);
                        const total = ('0' + slideCount).slice(-2);
                        paginationEl.innerHTML = `<span>${current}</span> / <span>${total}</span>`;
                    }
                },

                // (Sudah Responsif)
                breakpoints: {
                    320: { slidesPerView: 1, spaceBetween: 20 },
                    640: { slidesPerView: 2, spaceBetween: 24 }
                }
            });
        });
    </script>
@endpush
