@extends('layouts.public_layout')

@section('content')

{{-- SECTION 1: Hero dengan Background Gambar Laut --}}

{{-- SECTION 1: Hero dengan Background Gambar Laut --}}

<section class="relative bg-gray-800 text-white -mt-[96px] min-h-screen flex flex-col justify-center">
    <div class="absolute inset-0">
        <img src="{{ asset('images/tentang-bg-1.jpg') }}" alt="Deburan ombak di pantai Bangka" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black opacity-60"></div>
    </div>

    <div class="relative z-10 container mx-auto px-6 py-20"> {{-- Tambahkan padding vertikal --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center w-full">
            <div class="md:pr-8 pt-24 pb-12"> {{-- Tambahkan padding atas untuk dorongan --}}
                {{-- AOS: Judul muncul dari bawah --}}
                <h1 class="font-serif text-4xl md:text-5xl font-bold leading-tight" data-aos="fade-up">
                    Kamus Digital<br>Bahasa Bangka
                </h1>

                <div class="mt-6">
                    {{-- AOS: Paragraf pertama muncul dari bawah, delay 200ms --}}
                    <p class="mb-4" data-aos="fade-up" data-aos-delay="200">
                        Kamus Digital Bahasa Bangka dibuat untuk melestarikan dan mempelajari bahasa Bangka. Ditujukan bagi masyarakat umum, pelajar, maupun peneliti agar warisan budaya daerah tetap hidup dan dikenal generasi mendatang.
                    </p>
                    {{-- AOS: Paragraf kedua muncul dari bawah, delay 400ms --}}
                    <p data-aos="fade-up" data-aos-delay="400">
                        Kamus Digital Bahasa Bangka adalah sebuah sarana pembelajaran modern yang menghadirkan kosakata khas Bangka dalam format mudah diakses. Dengan adanya kamus ini, pengguna dapat memahami arti, padanan, dan penggunaan kata dalam kehidupan sehari-hari sekaligus memperkaya pengetahuan tentang budaya lokal.
                    </p>
                    {{-- AOS: Tombol muncul dari bawah, delay 600ms --}}
                    <a href="{{ route('beranda') }}" class="mt-8 inline-block border-2 border-white rounded-lg px-8 py-3 hover:bg-white hover:text-black transition duration-300 font-semibold" data-aos="fade-up" data-aos-delay="600">
                        Mulai Jelajahi &rarr;
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
            {{-- AOS: Judul muncul dari kiri --}}
            <h2 class="font-serif text-5xl md:text-6xl font-bold mb-6" data-aos="fade-right">Tujuan Kami</h2>
            {{-- AOS: Paragraf muncul dari kiri, delay 200ms --}}
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

                     {{-- KARTU 1: Pelestarian --}}
                     <div class="swiper-slide h-full">
                         <button class="open-modal-btn w-full text-left p-0 bg-transparent border-0 h-full"
                             data-title="Pelestarian"
                             data-image="{{ asset('images/pelestarian.png') }}"
                             data-description="Bahasa Bangka adalah jiwa dari identitas masyarakat. Tujuan kami adalah mendigitalisasi dan mendokumentasikan setiap kata dan nuansa dialek agar tidak hilang ditelan waktu, memastikan warisan linguistik ini terus diwariskan kepada generasi-generasi muda Bangka Belitung.">

                             {{-- PERUBAHAN: Menambahkan efek hover:shadow-2xl, hover:shadow-blue-400/50, dan hover:-translate-y-2 --}}
                             <div class="bg-black/30 backdrop-blur-md rounded-xl overflow-hidden shadow-lg border border-white/10 h-full flex flex-col hover:border-blue-400 transition duration-300 hover:shadow-2xl hover:shadow-blue-400/50 hover:-translate-y-2">
                                 <img src="{{ asset('images/pelestarian.png') }}" alt="Kain cual khas Bangka" class="w-full h-64 object-cover flex-shrink-0">
                                 <div class="p-6 flex-grow">
                                     <h3 class="font-bold text-xl mb-2">Pelestarian</h3>
                                     <p class="text-gray-400 text-sm">Menjaga bahasa Bangka dari kepunahan di era modernisasi dan Digitalisasi.</p>
                                 </div>
                             </div>
                         </button>
                     </div>

                     {{-- KARTU 2: Kekayaan Dialek Lokal --}}
                     <div class="swiper-slide h-full">
                         <button class="open-modal-btn w-full text-left p-0 bg-transparent border-0 h-full"
                             data-title="Kekayaan Dialek Lokal"
                             data-image="{{ asset('images/dialek-lokal.png') }}"
                             data-description="Bahasa Bangka memiliki kekayaan dialek yang berbeda antar wilayah. Kami berkomitmen mendokumentasikan setiap variasi leksikal dan fonetik yang ada, memastikan kamus ini mewakili spektrum penuh kekayaan linguistik daerah, menjadikannya sumber rujukan yang komprehensif.">

                             {{-- PERUBAHAN: Menambahkan efek hover:shadow-2xl, hover:shadow-blue-400/50, dan hover:-translate-y-2 --}}
                             <div class="bg-black/30 backdrop-blur-md rounded-xl overflow-hidden shadow-lg border border-white/10 h-full flex flex-col hover:border-blue-400 transition duration-300 hover:shadow-2xl hover:shadow-blue-400/50 hover:-translate-y-2">
                                 <img src="{{ asset('images/dialek-lokal.png') }}" alt="Warisan budaya Bangka" class="w-full h-64 object-cover flex-shrink-0">
                                 <div class="p-6 flex-grow">
                                     <h3 class="font-bold text-xl mb-2">Kekayaan Dialek Lokal</h3>
                                     <p class="text-gray-400 text-sm">Mendokumentasikan dan menyajikan keragaman bahasa antar wilayah.</p>
                                 </div>
                             </div>
                         </button>
                     </div>

                     {{-- KARTU 3: Modul Pembelajaran --}}
                     <div class="swiper-slide h-full">
                         <button class="open-modal-btn w-full text-left p-0 bg-transparent border-0 h-full"
                             data-title="Modul Pembelajaran"
                             data-image="{{ asset('images/Pembelajaran.png') }}"
                             data-description="Kami menyajikan setiap entri kata dengan contoh kalimat kontekstual yang relevan. Modul ini dirancang untuk memfasilitasi penguasaan bahasa secara praktis, membantu pengguna memahami tidak hanya arti leksikal, tetapi juga cara penggunaan kata dalam percakapan sehari-hari. Kamus ini menjadi alat bantu efektif bagi pelajar dan siapa pun yang ingin menguasai Bahasa Bangka.">

                             {{-- PERUBAHAN: Menambahkan efek hover:shadow-2xl, hover:shadow-blue-400/50, dan hover:-translate-y-2 --}}
                             <div class="bg-black/30 backdrop-blur-md rounded-xl overflow-hidden shadow-lg border border-white/10 h-full flex flex-col hover:border-blue-400 transition duration-300 hover:shadow-2xl hover:shadow-blue-400/50 hover:-translate-y-2">
                                 <img src="{{ asset('images/Pembelajaran.png') }}" alt="Penelitian dan data" class="w-full h-64 object-cover flex-shrink-0">
                                 <div class="p-6 flex-grow">
                                     <h3 class="font-bold text-xl mb-2">Modul Pembelajaran</h3>
                                     <p class="text-gray-400 text-sm">Menyediakan fitur dan alat bantu untuk penguasaan bahasa secara praktis.</p>
                                 </div>
                             </div>
                         </button>
                     </div>

                     {{-- KARTU 4: Sumber Daya Riset --}}
                     <div class="swiper-slide h-full">
                         <button class="open-modal-btn w-full text-left p-0 bg-transparent border-0 h-full"
                             data-title="Sumber Daya Riset"
                             data-image="{{ asset('images/sumberdaya.png') }}"
                             data-description="Kami menyajikan data bahasa secara terstruktur dan teruji untuk mendukung studi akademis, linguistik, dan etnografi. Kamus digital ini berfungsi sebagai fondasi yang kuat bagi mahasiswa, dosen, dan peneliti yang memerlukan rujukan autentik tentang Bahasa Bangka.">

                             {{-- PERUBAHAN: Menambahkan efek hover:shadow-2xl, hover:shadow-blue-400/50, dan hover:-translate-y-2 --}}
                             <div class="bg-black/30 backdrop-blur-md rounded-xl overflow-hidden shadow-lg border border-white/10 h-full flex flex-col hover:border-blue-400 transition duration-300 hover:shadow-2xl hover:shadow-blue-400/50 hover:-translate-y-2">
                                 <img src="{{ asset('images/sumberdaya.png') }}" alt="Orang-orang berkumpul" class="w-full h-64 object-cover flex-shrink-0">
                                 <div class="p-6 flex-grow">
                                     <h3 class="font-bold text-xl mb-2">Sumber Daya Riset</h3>
                                     <p class="text-gray-400 text-sm">Menjadi rujukan data terstruktur untuk kebutuhan akademis dan penelitian.</p>
                                 </div>
                             </div>
                         </button>
                     </div>

                     {{-- KARTU 5: Platform Kolaborasi --}}
                     <div class="swiper-slide h-full">
                         <button class="open-modal-btn w-full text-left p-0 bg-transparent border-0 h-full"
                             data-title="Platform Kolaborasi"
                             data-image="{{ asset('images/kolaborasi.png') }}"
                             data-description="Kamus ini dibangun di atas semangat kolaboratif. Kami membuka saluran digital yang mudah bagi penutur asli, budayawan, dan masyarakat umum untuk berkontribusi, mengajukan entri baru, dan memberikan masukan kontekstual, memastikan kamus ini terus hidup dan relevan melalui partisipasi aktif.">

                             {{-- PERUBAHAN: Menambahkan efek hover:shadow-2xl, hover:shadow-blue-400/50, dan hover:-translate-y-2 --}}
                             <div class="bg-black/30 backdrop-blur-md rounded-xl overflow-hidden shadow-lg border border-white/10 h-full flex flex-col hover:border-blue-400 transition duration-300 hover:shadow-2xl hover:shadow-blue-400/50 hover:-translate-y-2">
                                 <img src="{{ asset('images/kolaborasi.png') }}" alt="Ponsel dan laptop" class="w-full h-64 object-cover flex-shrink-0">
                                 <div class="p-6 flex-grow">
                                     <h3 class="font-bold text-xl mb-2">Platform Kolaborasi</h3>
                                     <p class="text-gray-400 text-sm">Mendorong partisipasi aktif komunitas dalam pengembangan konten.</p>
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

<section class="relative py-20 md:py-24">
<div class="absolute inset-0">
{{-- Menambahkan gambar latar belakang --}}
<img src="{{ asset('images/tentang-bg-3.jpg') }}" alt="Background abstrak gelap" class="w-full h-full object-cover">
</div>

<div class="relative z-10 container mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
    {{-- YouTube Embed: Tambahkan Z-index dan latar belakang putih/gray jika background section mengganggu --}}
        <div class="rounded-xl overflow-hidden shadow-2xl bg-white p-4" data-aos="fade-right" data-aos-delay="100" style="z-index: 20;">
             {{-- Video YouTube Anda di sini --}}
            <iframe class="w-full aspect-video"
                    src="https://www.youtube.com/embed/AeQ7QibRF_8"
                    title="Kata Sifat dalam Bahasa Bangka"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
            </iframe>
        </div>

    {{-- Text Content --}}
    <div class="text-gray-800">
        {{-- AOS: Judul muncul dari kanan --}}
        <h2 class="font-serif text-4xl md:text-5xl font-bold mb-4" data-aos="fade-left" data-aos-delay="200">
            Buku Kamus<br>
            Bangka Belitung
        </h2>
        {{-- AOS: Paragraf muncul dari kanan --}}
        <p class="mb-4 text-gray-700" data-aos="fade-left" data-aos-delay="400">
            Temukan kosakata khas Bahasa Melayu Bangka Belitung yang telah disusun secara digital. Portal ini menyediakan akses cepat untuk memahami arti, padanan, dan penggunaan kata dalam keseharian masyarakat Bangka.
        </p>
        <p class="mb-6 text-gray-700" data-aos="fade-left" data-aos-delay="600">
            Selain versi digital, tersedia juga buku dalam bentuk <strong class="text-black">file PDF</strong> yang bisa dibaca langsung atau diunduh, sehingga dapat dipelajari kapan saja bahkan tanpa koneksi internet.
        </p>
        {{-- AOS: Tombol muncul dari kanan --}}
        <a href="{{ route('buku.digital') }}" class="inline-block border-2 border-gray-800 text-gray-800 rounded-lg px-8 py-3 hover:bg-gray-800 hover:text-white transition duration-300 font-semibold" data-aos="fade-left" data-aos-delay="800">
            Selengkapnya &rarr;
        </a>
    </div>
</div>


</section>

{{-- MODAL POP-UP (Perbaikan Responsivitas Mobile & Ukuran Modern) --}}

<div id="detail-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-80 p-4 overflow-y-auto">
<div class="bg-gray-800 rounded-lg shadow-2xl w-full max-w-sm sm:max-w-md md:max-w-4xl mx-auto transform transition-all my-auto max-h-[90vh] overflow-hidden">
<div class="relative grid grid-cols-1 md:grid-cols-2 h-full">

        {{-- Bagian Kiri: Gambar --}}
        <div class="h-48 md:h-full">
            <img id="modal-image" src="" alt="Gambar Detail" class="w-full h-full object-cover">
        </div>

        {{-- Bagian Kanan: Teks dan Tombol Tutup --}}
        <div class="p-6 sm:p-8 text-white flex flex-col flex-grow overflow-y-auto">
            <h3 id="modal-title" class="font-serif text-2xl sm:text-3xl font-bold mb-3 border-b border-white/20 pb-2"></h3>
            <p id="modal-description" class="text-gray-300 text-sm sm:text-base leading-relaxed"></p>

            <button id="close-modal-btn" class="mt-6 self-start px-5 py-2 border border-white rounded-lg hover:bg-white hover:text-gray-800 transition-colors duration-300 text-sm sm:text-base">
                Tutup
            </button>
        </div>

        {{-- Tombol Tutup --}}
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
        const slideCount = document.querySelectorAll('.swiper-container .swiper-slide').length;

        const swiper = new Swiper('.swiper-container', {
            loop: true,
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
                const title = this.getAttribute('data-title');
                const image = this.getAttribute('data-image');
                const description = this.getAttribute('data-description');

                modalTitle.textContent = title;
                modalImage.src = image;
                modalImage.alt = title;
                modalDescription.textContent = description;

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
