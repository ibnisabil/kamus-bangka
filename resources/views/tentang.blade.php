@extends('layouts.public_layout')

@section('content')

{{-- SECTION 1: Hero dengan Background Gambar Laut --}}
<section class="relative bg-gray-800 text-white -mt-[80px] min-h-screen flex items-center">
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
{{-- ========================================================= --}}
<section class="relative text-white min-h-screen flex items-center py-20 md:py-0">
     <div class="absolute inset-0">
        <img src="{{ asset('images/tentang-bg-2.jpg') }}" alt="Pola geometris gelap" class="w-full h-full object-cover">
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
                            <button class="open-modal-btn w-full text-left p-0 bg-transparent border-0 h-full"
                                data-title="Pelestarian Bahasa"
                                data-image="{{ asset('images/pelestarian.png') }}"
                                data-description="Bahasa Bangka adalah jiwa dari identitas masyarakat. Tujuan kami adalah mendigitalisasi dan mendokumentasikan setiap kata dan nuansa dialek agar tidak hilang ditelan waktu, memastikan warisan linguistik ini terus diwariskan kepada generasi-generasi muda Bangka Belitung.">
                                
                                <div class="bg-black/30 backdrop-blur-md rounded-xl overflow-hidden shadow-lg border border-white/10 h-full flex flex-col hover:border-blue-400 transition duration-300">
                                    <img src="{{ asset('images/pelestarian.png') }}" alt="Kain cual khas Bangka" class="w-full h-64 object-cover flex-shrink-0">
                                    <div class="p-6 flex-grow">
                                        <h3 class="font-bold text-xl mb-2">Pelestarian</h3>
                                        <p class="text-gray-400 text-sm">Menjaga bahasa Bangka agar tetap hidup di tengah modernisasi.</p>
                                    </div>
                                </div>
                            </button>
                        </div>

                        {{-- KARTU 2: Warisan Budaya --}}
                        <div class="swiper-slide h-full">
                            <button class="open-modal-btn w-full text-left p-0 bg-transparent border-0 h-full"
                                data-title="Warisan Budaya & Kearifan Lokal"
                                data-image="{{ asset('images/warisan-budaya.png') }}"
                                data-description="Kamus ini bukan hanya tentang kata, tetapi juga tentang konteks budaya. Kami menyajikan kearifan lokal, cerita rakyat, ungkapan khas, dan tradisi yang melekat pada setiap kosakata, menjadikannya sumber daya yang kaya untuk pengenalan identitas daerah.">
                                <div class="bg-black/30 backdrop-blur-md rounded-xl overflow-hidden shadow-lg border border-white/10 h-full flex flex-col hover:border-blue-400 transition duration-300">
                                    <img src="{{ asset('images/warisan-budaya.png') }}" alt="Warisan budaya Bangka" class="w-full h-64 object-cover flex-shrink-0">
                                    <div class="p-6 flex-grow">
                                        <h3 class="font-bold text-xl mb-2">Warisan Budaya</h3>
                                        <p class="text-gray-400 text-sm">Mendokumentasikan kearifan lokal, cerita rakyat, dan tradisi Bangka.</p>
                                    </div>
                                </div>
                            </button>
                        </div>

                        {{-- KARTU 3: Riset & Data --}}
                        <div class="swiper-slide h-full">
                            <button class="open-modal-btn w-full text-left p-0 bg-transparent border-0 h-full"
                                data-title="Sumber Data untuk Riset"
                                data-image="{{ asset('images/riset-data.png') }}"
                                data-description="Ketersediaan data bahasa yang terstruktur dan tervalidasi sangat penting bagi dunia akademik. Kamus ini dirancang untuk menjadi referensi utama bagi pelajar, mahasiswa, dan peneliti yang sedang mengkaji linguistik, sejarah, dan sosiologi masyarakat Bangka.">
                                <div class="bg-black/30 backdrop-blur-md rounded-xl overflow-hidden shadow-lg border border-white/10 h-full flex flex-col hover:border-blue-400 transition duration-300">
                                    <img src="{{ asset('images/riset-data.png') }}" alt="Penelitian dan data" class="w-full h-64 object-cover flex-shrink-0">
                                    <div class="p-6 flex-grow">
                                        <h3 class="font-bold text-xl mb-2">Riset & Data</h3>
                                        <p class="text-gray-400 text-sm">Menjadi sumber data akurat bagi peneliti bahasa dan budaya lokal.</p>
                                    </div>
                                </div>
                            </button>
                        </div>

                        {{-- KARTU 4: Komunitas --}}
                        <div class="swiper-slide h-full">
                            <button class="open-modal-btn w-full text-left p-0 bg-transparent border-0 h-full"
                                data-title="Pemberdayaan Komunitas"
                                data-image="{{ asset('images/komunitas.png') }}"
                                data-description="Platform ini adalah milik bersama. Kami menyediakan ruang kolaborasi di mana penutur asli, budayawan, dan ahli bahasa dapat berkontribusi, memberikan masukan, dan berbagi pengetahuan, memastikan kamus ini terus berkembang dan akurat seiring waktu.">
                                <div class="bg-black/30 backdrop-blur-md rounded-xl overflow-hidden shadow-lg border border-white/10 h-full flex flex-col hover:border-blue-400 transition duration-300">
                                    <img src="{{ asset('images/komunitas.png') }}" alt="Orang-orang berkumpul" class="w-full h-64 object-cover flex-shrink-0">
                                    <div class="p-6 flex-grow">
                                        <h3 class="font-bold text-xl mb-2">Komunitas</h3>
                                        <p class="text-gray-400 text-sm">Wadah bagi pengguna untuk berkontribusi & berbagi pengetahuan.</p>
                                    </div>
                                </div>
                            </button>
                        </div>

                        {{-- KARTU 5: Aksesibilitas --}}
                        <div class="swiper-slide h-full">
                            <button class="open-modal-btn w-full text-left p-0 bg-transparent border-0 h-full"
                                data-title="Aksesibilitas Universal"
                                data-image="{{ asset('images/aksesibilitas.png') }}"
                                data-description="Kamus ini didesain agar dapat diakses oleh siapa saja, kapan saja, dan di mana saja. Dengan tampilan yang responsif, ia dapat dinikmati di ponsel, tablet, maupun laptop, menghilangkan batasan geografis dalam mempelajari Bahasa Bangka.">
                                <div class="bg-black/30 backdrop-blur-md rounded-xl overflow-hidden shadow-lg border border-white/10 h-full flex flex-col hover:border-blue-400 transition duration-300">
                                    <img src="{{ asset('images/aksesibilitas.png') }}" alt="Ponsel dan laptop" class="w-full h-64 object-cover flex-shrink-0">
                                    <div class="p-6 flex-grow">
                                        <h3 class="font-bold text-xl mb-2">Aksesibilitas</h3>
                                        <p class="text-gray-400 text-sm">Mudah diakses di berbagai perangkat, kapan saja & di mana saja.</p>
                                    </div>
                                </div>
                            </button>
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

{{-- ========================================================= --}}
{{-- MODAL POP-UP (Perbaikan Responsivitas Mobile & Ukuran Modern) --}}
{{-- ========================================================= --}}
{{-- Menambahkan `max-w-screen-md` untuk ukuran sedang di desktop/tablet --}}
{{-- Menggunakan `max-h-[90vh]` dan `overflow-y-auto` di parent modal untuk memastikan scroll keseluruhan modal --}}
<div id="detail-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-80 p-4 overflow-y-auto">
    <div class="bg-gray-800 rounded-lg shadow-2xl w-full max-w-sm sm:max-w-md md:max-w-4xl mx-auto transform transition-all my-auto max-h-[90vh] overflow-hidden">
        <div class="relative grid grid-cols-1 md:grid-cols-2 h-full">
            
            {{-- Bagian Kiri: Gambar --}}
            {{-- Menggunakan `h-48` di mobile dan `md:h-full` di desktop untuk keseimbangan --}}
            <div class="h-48 md:h-full">
                <img id="modal-image" src="" alt="Gambar Detail" class="w-full h-full object-cover">
            </div>

            {{-- Bagian Kanan: Teks dan Tombol Tutup --}}
            {{-- Menambahkan flex-grow dan overflow-y-auto agar konten teks bisa discroll jika sangat panjang --}}
            <div class="p-6 sm:p-8 text-white flex flex-col **flex-grow overflow-y-auto**">
                <h3 id="modal-title" class="font-serif text-2xl sm:text-3xl font-bold mb-3 border-b border-white/20 pb-2"></h3>
                <p id="modal-description" class="text-gray-300 text-sm sm:text-base leading-relaxed"></p>
                
                <button id="close-modal-btn" class="mt-6 self-start px-5 py-2 border border-white rounded-lg hover:bg-white hover:text-gray-800 transition-colors duration-300 text-sm sm:text-base">
                    Tutup
                </button>
            </div>

            {{-- Tombol Tutup (di pojok kanan atas untuk layar kecil dan besar) --}}
            {{-- Sekarang tombol silang akan selalu ada, di pojok atas modal container, bukan hanya di mobile --}}
            <button class="absolute top-3 right-3 text-white text-3xl leading-none opacity-70 hover:opacity-100 transition-opacity z-10" onclick="document.getElementById('detail-modal').classList.add('hidden');">
                &times;
            </button>
        </div>
    </div>
</div>

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

        /* Pastikan tombol kartu memiliki kursor pointer */
        .open-modal-btn {
            cursor: pointer;
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
            // Menghitung jumlah slide sebenarnya (tanpa duplikasi loop)
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

            // ===================================================
            // LOGIKA MODAL POP-UP
            // ===================================================
            const modal = document.getElementById('detail-modal');
            const modalTitle = document.getElementById('modal-title');
            const modalImage = document.getElementById('modal-image');
            const modalDescription = document.getElementById('modal-description');
            const closeBtn = document.getElementById('close-modal-btn');
            const openBtns = document.querySelectorAll('.open-modal-btn');

            // Fungsi untuk menampilkan modal dan mengisi konten
            openBtns.forEach(button => {
                button.addEventListener('click', function() {
                    // Ambil data dari atribut data-
                    const title = this.getAttribute('data-title');
                    const image = this.getAttribute('data-image');
                    const description = this.getAttribute('data-description');

                    // Isi konten modal
                    modalTitle.textContent = title;
                    modalImage.src = image;
                    modalImage.alt = title; // Aksesibilitas
                    modalDescription.textContent = description;

                    // Tampilkan modal
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                    document.body.style.overflow = 'hidden'; // Nonaktifkan scroll body
                });
            });

            // Fungsi untuk menutup modal
            function closeModal() {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = ''; // Aktifkan kembali scroll body
            }

            // Event listener untuk tombol 'Tutup' di dalam modal
            closeBtn.addEventListener('click', closeModal);

            // Event listener untuk menutup modal saat klik di luar area konten (overlay)
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeModal();
                }
            });

            // Event listener untuk menutup modal saat tombol ESC ditekan
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                    closeModal();
                }
            });
        });
    </script>
@endpush