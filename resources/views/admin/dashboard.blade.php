<x-app-layout>
    {{-- Ini akan menempatkan "Dashboard" di Header --}}
    <x-slot name="header">
        Dashboard
    </x-slot>

    {{-- Kita ubah grid menjadi 4 kolom di layar besar agar rapi --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <div class="bg-white rounded-xl shadow-lg p-6 flex items-center space-x-4">
            <div class="bg-blue-500 p-4 rounded-full text-white">
                <i class="fa-solid fa-book fa-2x"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Kata di Kamus</p>
                <p class="text-3xl font-bold text-gray-900">{{ $jumlahKamus }}</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 flex items-center space-x-4">
            <div class="bg-green-500 p-4 rounded-full text-white">
                <i class="fa-solid fa-newspaper fa-2x"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Berita</p>
                <p class="text-3xl font-bold text-gray-900">{{ $jumlahBerita }}</p>
            </div>
        </div>

        {{-- [BARU] Kotak 3: Manajemen Tujuan --}}
        <div class="bg-white rounded-xl shadow-lg p-6 flex items-center space-x-4">
            <div class="bg-yellow-500 p-4 rounded-full text-white">
                <i class="fa-solid fa-bullseye fa-2x"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Item Tujuan</p>
                <p class="text-3xl font-bold text-gray-900">{{ $jumlahTujuan }}</p>
            </div>
        </div>

        {{-- [BARU] Kotak 4: Pengaturan --}}
        <div class="bg-white rounded-xl shadow-lg p-6 flex items-center space-x-4">
            <div class="bg-purple-500 p-4 rounded-full text-white">
                <i class="fa-solid fa-gears fa-2x"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Pengaturan</p>
                <p class="text-3xl font-bold text-gray-900">{{ $jumlahSetting }}</p>
            </div>
        </div>

    </div>
</x-app-layout>