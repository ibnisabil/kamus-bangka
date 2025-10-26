@extends('layouts.public_layout')

@section('content')

{{-- WRAPPER UTAMA: BG BLACK (Mengontrol overflow dan penyesuaian header) --}}
<div class="bg-black min-h-screen pt-[96px] -mt-[96px] overflow-x-hidden">

    {{-- 1. Hero Header --}}
    <div class="bg-black py-20 shadow-lg mb-8 border-b border-gray-800">
        <div class="container mx-auto px-6">
            <h1 class="text-3xl md:text-5xl font-bold text-white font-serif mb-2">Kontak Kami</h1>
            <p class="text-xl text-gray-400">Hubungi tim kami untuk pertanyaan, dukungan, atau kemitraan.</p>
        </div>
    </div>

    {{-- Konten Utama --}}
    <div class="container mx-auto px-6 py-4 pb-20">

        {{-- 2. Judul Staf Penghubung --}}
        <h2 class="text-3xl sm:text-4xl font-bold text-white mb-8 border-b-2 border-indigo-500 inline-block pb-2 font-serif">
            Staf Penghubung
        </h2>

        {{-- Grid Kartu Staf (Responsif & Animasi Hover) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 pb-16 mt-8">

            {{-- Kartu Staf 1 --}}
            <div class="bg-gray-800 p-6 rounded-xl shadow-xl hover:shadow-2xl hover:shadow-indigo-500/50 hover:-translate-y-1 transition duration-300 border-t-4 border-indigo-500 text-center text-white">
                <i class="fa-solid fa-user-circle text-6xl text-indigo-400 mb-4"></i>
                <h3 class="text-xl font-bold text-white">Nama Staf Pertama</h3>
                <p class="text-sm text-indigo-400 font-semibold mb-4 uppercase tracking-wider">Kepala Bagian</p>

                <div class="border-t border-gray-700 pt-4 mt-4 space-y-3 text-left">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-phone text-indigo-400 w-5"></i>
                        <span class="text-gray-300">0812-3456-7890</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-envelope text-indigo-400 w-5"></i>
                        <span class="text-gray-300 truncate">staf1@dispar.go.id</span>
                    </div>
                </div>
            </div>

            {{-- Kartu Staf 2 --}}
            <div class="bg-gray-800 p-6 rounded-xl shadow-xl hover:shadow-2xl hover:shadow-indigo-500/50 hover:-translate-y-1 transition duration-300 border-t-4 border-indigo-500 text-center text-white">
                <i class="fa-solid fa-user-circle text-6xl text-indigo-400 mb-4"></i>
                <h3 class="text-xl font-bold text-white">Nama Staf Kedua</h3>
                <p class="text-sm text-indigo-400 font-semibold mb-4 uppercase tracking-wider">Staf TIC</p>

                <div class="border-t border-gray-700 pt-4 mt-4 space-y-3 text-left">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-phone text-indigo-400 w-5"></i>
                        <span class="text-gray-300">0823-4567-8901</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-envelope text-indigo-400 w-5"></i>
                        <span class="text-gray-300 truncate">staf2@dispar.go.id</span>
                    </div>
                </div>
            </div>

            {{-- Kartu Staf 3 --}}
            <div class="bg-gray-800 p-6 rounded-xl shadow-xl hover:shadow-2xl hover:shadow-indigo-500/50 hover:-translate-y-1 transition duration-300 border-t-4 border-indigo-500 text-center text-white">
                <i class="fa-solid fa-user-circle text-6xl text-indigo-400 mb-4"></i>
                <h3 class="text-xl font-bold text-white">Nama Staf Ketiga</h3>
                <p class="text-sm text-indigo-400 font-semibold mb-4 uppercase tracking-wider">Administrasi</p>

                <div class="border-t border-gray-700 pt-4 mt-4 space-y-3 text-left">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-phone text-indigo-400 w-5"></i>
                        <span class="text-gray-300">0831-7917-4543</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-envelope text-indigo-400 w-5"></i>
                        <span class="text-gray-300 truncate">staf3@dispar.go.id</span>
                    </div>
                </div>
            </div>

        </div>

        {{-- 3. Judul Kontak Institusi --}}
        <h2 class="text-3xl sm:text-4xl font-bold text-white mb-8 pt-12 border-b-2 border-red-500 inline-block pb-2 font-serif">
            Kontak Institusi
        </h2>

        {{-- Kontak Institusi Detail (Rapi, Responsif, dan Animasi Hover) --}}
        <div class="bg-gray-800 p-8 rounded-xl shadow-xl border-l-4 border-indigo-500 text-white
            hover:shadow-2xl hover:shadow-indigo-500/50 transition duration-300 hover:-translate-y-1">

            <h3 class="text-2xl font-semibold text-white mb-6">Dinas Pariwisata Kota Pangkalpinang</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">

                {{-- Kontak Item: Telepon/WhatsApp --}}
                <div class="flex items-start gap-3 text-lg">
                    <i class="fa-solid fa-whatsapp text-indigo-400 w-5 mt-1 flex-shrink-0"></i>
                    <div class="flex flex-col min-w-0">
                        <span class="font-semibold text-white text-base">Telepon/WhatsApp:</span>
                        <span class="break-all text-gray-300 text-base">0831-7917-4543</span>
                    </div>
                </div>

                {{-- Kontak Item: Email --}}
                <div class="flex items-start gap-3 text-lg">
                    <i class="fa-solid fa-envelope text-indigo-400 w-5 mt-1 flex-shrink-0"></i>
                    <div class="flex flex-col min-w-0">
                        <span class="font-semibold text-white text-base">Email:</span>
                        <span class="break-all text-gray-300 text-base">tic.pangkalpinang@gmail.com</span>
                    </div>
                </div>

                {{-- Kontak Item: Alamat --}}
                <div class="flex items-start gap-3 text-lg">
                    <i class="fa-solid fa-location-dot text-indigo-400 w-5 mt-1 flex-shrink-0"></i>
                    <div class="flex flex-col min-w-0">
                        <span class="font-semibold text-white text-base">Alamat:</span>
                        <span class="text-gray-300 text-base">
                            Jl. Jend. Sudirman No. 1, Pangkalpinang
                        </span>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
