@extends('layouts.public_layout')

@section('content')

{{-- WRAPPER UTAMA: BG BLACK (Mengontrol overflow dan penyesuaian header) --}}

<div class="bg-black min-h-screen pt-[96px] -mt-[96px] overflow-x-hidden">

{{-- 1. Hero Header (BG HITAM) --}}

<div class="bg-black py-20 shadow-lg mb-8 border-b border-gray-800">
<div class="container mx-auto px-6">

{{-- GRID UNTUK LOGO DAN TEKS --}}
<div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
    
    {{-- KOLOM KIRI: LOGO BESAR (Hanya muncul di desktop/tablet) --}}
    <div class="hidden md:block md:col-span-3">
        <img src="{{ asset('images/logo-dispar-white.png') }}" 
             alt="Logo Dispar Pangkalpinang Besar" 
             class="w-full h-auto max-h-40 object-contain" 
             data-aos="fade-right">
    </div>
    
    {{-- KOLOM KANAN: TEKS KONTAK KAMI (Mengambil sisa ruang) --}}
    <div class="md:col-span-9">
        {{-- Animasi Judul: Fade in dari atas --}}
        <h1 class="text-3xl md:text-5xl font-bold text-white font-serif mb-2" data-aos="fade-down">Kontak Kami</h1>
        {{-- Animasi Paragraf: Fade in dari atas, sedikit delay --}}
        <p class="text-xl text-gray-400" data-aos="fade-down" data-aos-delay="200">Hubungi tim kami untuk pertanyaan, dukungan, atau kemitraan.</p>
    </div>

</div>


</div>

</div>

{{-- AREA KONTEN STAF PENGHUBUNG & MAPS (BG PUTIH DAN SUDUT TUMPUL) --}}

<div class="bg-white pb-20 rounded-t-3xl">
<div class="container mx-auto px-6 py-4">

{{-- 2. Judul Staf Penghubung --}}
<h2 class="text-3xl md:text-5xl font-bold text-gray-900 mb-8 pt-12 border-b-2 border-indigo-500 inline-block pb-2 font-serif" data-aos="fade-right">
    Staf Penghubung
</h2>

{{-- Grid Kartu Staf (Responsif & Animasi Hover) --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 pb-16 mt-8">

    {{-- Kartu Staf 1 --}}
    <div class="bg-gray-100 p-6 rounded-xl shadow-xl hover:shadow-2xl hover:shadow-indigo-500/70 hover:-translate-y-2 transition duration-300 border-t-4 border-indigo-500 text-center text-gray-800" data-aos="fade-up">
        <i class="fa-solid fa-user-circle text-6xl text-indigo-600 mb-4"></i>
        <h3 class="text-xl font-bold text-gray-900">Nama Staf Pertama</h3>
        <p class="text-sm text-indigo-600 font-semibold mb-4 uppercase tracking-wider">Staf TIC</p>

        <div class="border-t border-gray-300 pt-4 mt-4 space-y-3 text-left">
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-phone text-indigo-600 w-5"></i>
                <span class="text-gray-700">0812-3456-7890</span>
            </div>
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-envelope text-indigo-600 w-5"></i>
                <span class="text-gray-700 truncate">staf1@dispar.go.id</span>
            </div>
        </div>
    </div>

    {{-- Kartu Staf 2 --}}
    <div class="bg-gray-100 p-6 rounded-xl shadow-xl hover:shadow-2xl hover:shadow-indigo-500/70 hover:-translate-y-2 transition duration-300 border-t-4 border-indigo-500 text-center text-gray-800" data-aos="fade-up" data-aos-delay="200">
        <i class="fa-solid fa-user-circle text-6xl text-indigo-600 mb-4"></i>
        <h3 class="text-xl font-bold text-gray-900">Nama Staf Kedua</h3>
        <p class="text-sm text-indigo-600 font-semibold mb-4 uppercase tracking-wider">Staf TIC</p>

        <div class="border-t border-gray-300 pt-4 mt-4 space-y-3 text-left">
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-phone text-indigo-600 w-5"></i>
                <span class="text-gray-700">0823-4567-8901</span>
            </div>
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-envelope text-indigo-600 w-5"></i>
                <span class="text-gray-700 truncate">staf2@dispar.go.id</span>
            </div>
        </div>
    </div>

    {{-- Kartu Staf 3 --}}
    <div class="bg-gray-100 p-6 rounded-xl shadow-xl hover:shadow-2xl hover:shadow-indigo-500/70 hover:-translate-y-2 transition duration-300 border-t-4 border-indigo-500 text-center text-gray-800" data-aos="fade-up" data-aos-delay="400">
        <i class="fa-solid fa-user-circle text-6xl text-indigo-600 mb-4"></i>
        <h3 class="text-xl font-bold text-gray-900">Nama Staf Ketiga</h3>
        <p class="text-sm text-indigo-600 font-semibold mb-4 uppercase tracking-wider">Staf TIC</p>

        <div class="border-t border-gray-300 pt-4 mt-4 space-y-3 text-left">
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-phone text-indigo-600 w-5"></i>
                <span class="text-gray-700">0831-7917-4543</span>
            </div>
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-envelope text-indigo-600 w-5"></i>
                <span class="text-gray-700 truncate">staf3@dispar.go.id</span>
            </div>
        </div>
    </div>

</div> {{-- End Grid Kartu Staf --}}

{{-- 3. Google Maps Embed (Tata Letak: Peta Kecil di Kiri, Seukuran Kartu) --}}
<div class="mt-16 pt-12 border-t border-gray-200">
    <h2 class="text-3xl md:text-5xl font-bold text-gray-900 mb-8 border-b-2 border-red-500 inline-block pb-2 font-serif" data-aos="fade-right">
        Lokasi Kantor Kami
    </h2>

    {{-- GRID UNTUK PETA DAN ALAMAT --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-stretch">
        
        {{-- KOLOM KIRI: Peta Persegi Seukuran Kartu --}}
        <div class="flex flex-col items-center" data-aos="fade-up" data-aos-delay="200">
            <div class="overflow-hidden rounded-xl shadow-xl w-full">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.027344217112!2d106.11379847405162!3d-2.1432086371611883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e22c72928310947%3A0x726866b128aafd50!2sDinas%20Pariwisata%20Kota%20Pangkalpinang!5e0!3m2!1sid!2sid!4v1761493950156!5m2!1sid!2sid" 
                    width="100%" 
                    height="250" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade"
                    class="w-full h-80 md:h-96 aspect-square" 
                ></iframe>
            </div>
        </div>

        {{-- KOLOM KANAN: Detail Kontak Alamat --}}
        <div class="flex flex-col justify-start space-y-4 pt-4 md:pt-0" data-aos="fade-left" data-aos-delay="400">
            <h3 class="text-xl font-semibold text-gray-900 border-b border-gray-200 pb-2">Detail Lokasi</h3>
            
            <div class="flex items-start gap-3 text-lg">
                <i class="fa-solid fa-location-dot text-indigo-600 w-5 mt-1 flex-shrink-0"></i>
                <div class="flex flex-col min-w-0">
                    <span class="font-semibold text-gray-800 text-base">Alamat Kantor:</span>
                    <span class="text-gray-700 text-base">V448+PG9, Jl. Rasakunda, Sriwijaya, Kec. Girimaya, Kota Pangkal Pinang, Kepulauan Bangka Belitung 33684</span>
                </div>
            </div>

            <div class="flex items-start gap-3 text-lg">
                <i class="fa-solid fa-clock text-indigo-600 w-5 mt-1 flex-shrink-0"></i>
                <div class="flex flex-col min-w-0">
                    <span class="font-semibold text-gray-800 text-base">Jam Operasional:</span>
                    <span class="text-gray-700 text-base">Senin - Jumat, 08:00 - 16:00 WIB</span>
                </div>
            </div>
        </div>

    </div>
</div>


</div> {{-- End container mx-auto px-6 py-4 --}}

</div> {{-- End AREA KONTEN STAF PENGHUBUNG & MAPS --}}

</div> {{-- End WRAPPER UTAMA --}}
@endsection