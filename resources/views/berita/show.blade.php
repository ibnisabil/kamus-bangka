@extends('layouts.public_layout') {{-- Pakai layout Anda --}}

@section('content')
<div class="bg-white py-16 md:py-24">
    <div class="container mx-auto px-6 max-w-4xl">
        
        <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 mb-4 font-serif">
            {{ $berita->judul }}
        </h1>
        
        <div class="mb-6 text-gray-500">
            <span class="font-semibold uppercase text-blue-600">{{ $berita->kategori }}</span>
            <span class="mx-2">|</span>
            <span>Dipublikasikan pada: {{ $berita->created_at->format('d F Y') }}</span>
        </div>
        
        <img src="{{ Storage::url($berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-auto md:h-[450px] object-cover rounded-xl shadow-lg mb-8">
        
        <div class="prose prose-lg max-w-none text-gray-800">
            {!! $berita->isi_lengkap !!} {{-- Gunakan {!! !!} jika isinya HTML (dari editor) --}}
        </div>

        <a href="{{ route('beranda') }}" class="inline-block mt-12 text-blue-600 font-semibold hover:text-blue-800 transition duration-300">
            <i class="fa-solid fa-arrow-left text-xs mr-2"></i>
            Kembali ke Beranda
        </a>

    </div>
</div>
@endsection