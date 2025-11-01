@extends('layouts.public_layout')

@section('content')

{{-- SECTION 1: Hero dengan Background Gambar Laut --}}
<section class="relative bg-gray-800 text-white -mt-[96px] min-h-screen flex flex-col justify-center">
    <div class="absolute inset-0">
        <img src="{{ asset('images/tentang-bg-1.jpg') }}" alt="Deburan ombak di pantai Bangka" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black opacity-60"></div>
    </div>
    <div class="relative z-10 container mx-auto px-6 py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center w-full">
            <div class="md:pr-8 pt-24 pb-12">
                <h1 class="font-serif text-4xl md:text-5xl font-bold leading-tight" data-aos="fade-up">
                    Kamus Digital<br>Bahasa Bangka
                </h1>
                <div class="mt-6">
                    <p class="mb-4" data-aos="fade-up" data-aos-delay="200">
                        Kamus Digital Bahasa Bangka dibuat untuk melestarikan dan mempelajari bahasa Bangka. Ditujukan bagi masyarakat umum, pelajar, maupun peneliti agar warisan budaya daerah tetap hidup dan dikenal generasi mendatang.
                    </p>
                    <p data-aos="fade-up" data-aos-delay="400">
                        Kamus Digital Bahasa Bangka adalah sebuah sarana pembelajaran modern yang menghadirkan kosakata khas Bangka dalam format mudah diakses. Dengan adanya kamus ini, pengguna dapat memahami arti, padanan, dan penggunaan kata dalam kehidupan sehari-hari sekaligus memperkaya pengetahuan tentang budaya lokal.
                    </p>
                    <a href="{{ route('beranda') }}" class="mt-8 inline-block border-2 border-white rounded-lg px-8 py-3 hover:bg-white hover:text-black transition duration-300 font-semibold" data-aos="fade-up" data-aos-delay="600">
                        Mulai Jelajahi →
                    </a>
                </div>
            </div>
            <div></div>
        </div>
    </div>
</section>

{{-- SECTION 2: Tujuan Kami dengan Kartu (Carousel) --}}
<section class="relative text-white min-h-screen flex items-center py-20 md:py-0">
    <div class="absolute inset-0">
        <img src="{{ asset('images/tentang-bg-2.jpg') }}" alt="Pola geometris gelap" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black opacity-70"></div>
    </div>
    <div class="relative z-10 container mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            {{-- KOLOM KIRI: Teks "Tujuan Kami" --}}
            <div class="lg:pr-12">
                <h2 class="font-serif text-5xl md:text-6xl font-bold mb-6" data-aos="fade-right">Tujuan Kami</h2>
                <p class="text-gray-300" data-aos="fade-right" data-aos-delay="200">
                    Kami membangun Kamus Digital Bahasa Bangka sebagai <strong>portal linguistik abad ke-21</strong>, menjembatani tradisi dan teknologi.
                    Komitmen utama kami adalah melestarikan warisan bahasa melalui inovasi dengan sistem database modern.
                    Platform ini dirancang untuk menjadi sumber belajar yang <strong>responsif, akurat, dan mudah diakses</strong> di berbagai perangkat.
                    Lebih dari itu, kami menciptakan <strong>wadah kolaborasi</strong> di mana penutur asli, akademisi, dan generasi muda dapat berkontribusi, memastikan setiap kata dan nuansa dialek didokumentasikan dengan <strong>akurasi linguistik</strong> dan terus diwariskan dalam format digital yang kekal.
                </p>
            </div>

            {{-- KOLOM KANAN: Carousel & Navigasi Kustom --}}
            <div data-aos="fade-left" data-aos-delay="400">
                {{-- Carousel --}}
                <div class="swiper-container overflow-hidden">
                    <div class="swiper-wrapper flex items-stretch">

                        {{-- =============================================== --}}
                        {{-- === [PERUBAHAN DIMULAI DI SINI] === --}}
                        {{-- Kita hapus 5 kartu statis dan ganti dengan loop --}}
                        {{-- =============================================== --}}

                        @forelse($tujuans as $tujuan)
                        <div class="swiper-slide h-full">
                            <button class="open-modal-btn w-full text-left p-0 bg-transparent border-0 h-full"
                                    data-title="{{ $tujuan->judul }}"
                                    
                                    {{-- Logika untuk menampilkan gambar (placeholder atau dari storage) --}}
                                    data-image="{{ \Illuminate\Support\Str::startsWith($tujuan->gambar, 'http') ? $tujuan->gambar : Storage::url($tujuan->gambar) }}"
                                    
                                    {{-- Menggunakan deskripsi dari DB untuk modal --}}
                                    data-description="{{ $tujuan->deskripsi }}">

                                <div class="bg-black/30 backdrop-blur-md rounded-xl overflow-hidden shadow-lg border border-white/10 h-full flex flex-col hover:border-blue-400 transition duration-300 hover:shadow-2xl hover:shadow-blue-400/50 hover:-translate-y-2">
                                    
                                    {{-- Logika untuk menampilkan gambar (placeholder atau dari storage) --}}
                                    <img src="{{ \Illuminate\Support\Str::startsWith($tujuan->gambar, 'http') ? $tujuan->gambar : Storage::url($tujuan->gambar) }}" alt="{{ $tujuan->judul }}" class="w-full h-64 object-cover flex-shrink-0">
                                    
                                    <div class="p-6 flex-grow">
                                        <h3 class="font-bold text-xl mb-2">{{ $tujuan->judul }}</h3>
                                        <p class="text-gray-400 text-sm">{{ $tujuan->deskripsi }}</p>
                                    </div>
                                </div>
                            </button>
                        </div>
                        @empty
                        {{-- Tampilan jika tabel 'tujuans' di database kosong --}}
                        <div class="swiper-slide h-full">
                             <div class="bg-black/30 backdrop-blur-md rounded-xl overflow-hidden shadow-lg border border-white/10 h-full flex flex-col p-6">
                                <p class="text-white text-center m-auto">
                                    Belum ada data tujuan untuk ditampilkan.
                                </p>
                             </div>
                        </div>
                        @endforelse
                        {{-- =============================================== --}}
                        {{-- === [PERUBAHAN BERAKHIR DI SINI] === --}}
                        {{-- =============================================== --}}

                    </div>
                </div>

                <div class="flex justify-between items-center mt-8 gap-6">
                    <div id="custom-pagination" class="text-xl font-bold text-white flex-shrink-0"></div>
                    <div class="swiper-pagination swiper-pagination-progressbar swiper-pagination-horizontal !relative !w-full h-0.5 bg-white/20"></div>
                    <div class="flex items-center gap-4 flex-shrink-0">
                        <div class="swiper-button-prev-custom text-white text-2xl cursor-pointer hover:text-blue-400 transition-colors"><</div>
                        <div class="swiper-button-next-custom text-white text-2xl cursor-pointer hover:text-blue-400 transition-colors">></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<hr>

{{-- SECTION 3: Buku Kamus PDF dengan Video YouTube dan Maps --}}
<section class="relative py-20 md:py-24">
    <div class="absolute inset-0">
        <img src="{{ asset('images/tentang-bg-3.jpg') }}" alt="Background abstrak gelap" class="w-full h-full object-cover">
    </div>
    <div class="relative z-10 container mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
        <div class="space-y-12">
            <div class="rounded-xl overflow-hidden shadow-2xl bg-white p-4" data-aos="fade-right" data-aos-delay="100" style="z-index: 20;">
                <iframe class="w-full aspect-video"
                        src="{{ $settings['youtube_link'] ?? 'https://www.youtube.com/embed/AeQ7QibRF_8' }}"
                        title="Kata Sifat dalam Bahasa Bangka"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                </iframe>
            </div>
            <div class="rounded-xl overflow-hidden shadow-2xl bg-white p-4" data-aos="fade-right" data-aos-delay="300" style="z-index: 20;">
                <h3 class="font-serif text-xl md:text-2xl font-bold text-gray-800 mb-4">Lokasi Kantor Kami</h3>
                <div class="relative w-full overflow-hidden rounded-lg" style="padding-bottom: 75%;">
                    <iframe
                        src="{{ $settings['gmaps_link'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.0273302512965!2d106.1163734!3d-2.143214!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e22c72928310947%3A0x726866b128aafd50!2sDinas%20Pariwisata%20Kota%20Pangkalpinang!5e0!3m2!1sid!2sid!4v1761619357075!5m2!1sid!2sid' }}"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        class="absolute top-0 left-0 w-full h-full"
                    ></iframe>
                </div>
                <p class="text-sm text-gray-600 mt-3 text-center">Dinas Pariwisata Kota Pangkalpinang</p>
            </div>
        </div>
        <div class="text-gray-800">
            <h2 class="font-serif text-4xl md:text-5xl font-bold mb-4" data-aos="fade-left" data-aos-delay="200">
                Buku Kamus<br>
                Bangka Belitung
            </h2>
            <p class="mb-4 text-gray-700" data-aos="fade-left" data-aos-delay="400">
                Temukan kosakata khas Bahasa Melayu Bangka Belitung yang telah disusun secara digital. Portal ini menyediakan akses cepat untuk memahami arti, padanan, dan penggunaan kata dalam keseharian masyarakat Bangka.
            </p>
            <p class="mb-6 text-gray-700" data-aos="fade-left" data-aos-delay="600">
                Selain versi digital, tersedia juga buku dalam bentuk <strong class="text-black">file PDF</strong> yang bisa dibaca langsung atau diunduh, sehingga dapat dipelajari kapan saja bahkan tanpa koneksi internet.
            </p>
            <a href="{{ route('buku.digital') }}" target="_blank" class="inline-block border-2 border-gray-800 text-gray-800 rounded-lg px-8 py-3 hover:bg-gray-800 hover:text-white transition duration-300 font-semibold" data-aos="fade-left" data-aos-delay="800">
                Selengkapnya →
            </a>
        </div>
    </div>
</section>

{{-- MODAL POP-UP (Tidak Berubah) --}}
<div id="detail-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-80 p-4 overflow-y-auto">
    <div class="bg-gray-800 rounded-lg shadow-2xl w-full max-w-sm sm:max-w-md md:max-w-4xl mx-auto transform transition-all my-auto max-h-[90vh] overflow-hidden">
        <div class="relative grid grid-cols-1 md:grid-cols-2 h-full">
            <div class="h-48 md:h-full">
                <img id="modal-image" src="" alt="Gambar Detail" class="w-full h-full object-cover">
            </div>
            <div class="p-6 sm:p-8 text-white flex flex-col flex-grow overflow-y-auto">
                <h3 id="modal-title" class="font-serif text-2xl sm:text-3xl font-bold mb-3 border-b border-white/20 pb-2"></h3>
                <p id="modal-description" class="text-gray-300 text-sm sm:text-base leading-relaxed"></p>
                <button id="close-modal-btn" class="mt-6 self-start px-5 py-2 border border-white rounded-lg hover:bg-white hover:text-gray-800 transition-colors duration-300 text-sm sm:text-base">
                    Tutup
                </button>
            </div>
            <button class="absolute top-3 right-3 text-white text-3xl leading-none opacity-70 hover:opacity-100 transition-opacity z-10" onclick="document.getElementById('detail-modal').classList.add('hidden');">
                ×
            </button>
        </div>
    </div>
</div>
@endsection

@push('styles')
{{-- CDN CSS Swiper.js --}}
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<style>
.swiper-pagination-progressbar .swiper-pagination-progressbar-fill {
    background-color: white !important;
}
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
        
        // [PERUBAHAN] Kita hitung jumlah slide dari variabel Blade
        const slideCount = {{ $tujuans->count() > 0 ? $tujuans->count() : 5 }}; // Default ke 5 jika kosong

        const swiper = new Swiper('.swiper-container', {
            loop: {{ $tujuans->count() > 1 ? 'true' : 'false' }}, // Nonaktifkan loop jika slide cuma 1
            spaceBetween: 24,
            slidesPerView: 2,
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
                    if(paginationEl) {
                        const current = ('0' + (this.realIndex + 1)).slice(-2);
                        const total = ('0' + slideCount).slice(-2);
                        paginationEl.innerHTML = `<span>${current}</span> / <span>${total}</span>`;
                    }
                },
                slideChange: function () {
                    if(paginationEl) {
                        const current = ('0' + (this.realIndex + 1)).slice(-2);
                        const total = ('0' + slideCount).slice(-2);
                        paginationEl.innerHTML = `<span>${current}</span> / <span>${total}</span>`;
                    }
                }
            },
            breakpoints: {
                320: { slidesPerView: 1, spaceBetween: 20 },
                640: { slidesPerView: 2, spaceBetween: 24 }
            }
        });

        // ===================================================
        // LOGIKA MODAL POP-UP (Tidak Berubah, akan berfungsi otomatis)
        // ===================================================
        const modal = document.getElementById('detail-modal');
        const modalTitle = document.getElementById('modal-title');
        const modalImage = document.getElementById('modal-image');
        const modalDescription = document.getElementById('modal-description');
        const closeBtn = document.getElementById('close-modal-btn');
        const openBtns = document.querySelectorAll('.open-modal-btn');

        openBtns.forEach(button => {
            button.addEventListener('click', function() {
                const title = this.getAttribute('data-title');
                const image = this.getAttribute('data-image');
                const description = this.getAttribute('data-description');

                modalTitle.textContent = title;
                modalImage.src = image;
                modalImage.alt = title;
                modalDescription.textContent = description;

                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            });
        });

        function closeModal() {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }

        closeBtn.addEventListener('click', closeModal);
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModal();
            }
        });
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });
    });
</script>
@endpush