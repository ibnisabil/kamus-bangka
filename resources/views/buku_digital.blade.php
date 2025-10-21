{{-- Ganti baris ini --}}
@extends('layouts.minimal_layout')

@section('content')
{{--
  PERBAIKAN: Hapus div background putih & container karena layout minimal sudah punya background
  dan iframe sebaiknya mengisi seluruh body
--}}

{{-- Judul Halaman (Opsional, mungkin tidak perlu jika hanya PDF) --}}
{{-- <h1 class="font-serif text-4xl md:text-5xl font-bold text-gray-800 mb-10 text-center pt-10">
    Buku Digital Bahasa Melayu Bangka Belitung
</h1> --}}

{{--
  EMBED PDF:
  - Kita buat iframe mengisi seluruh layar (h-screen).
  - Hapus margin atas/bawah jika judul dihapus.
  - Hapus shadow, border, max-w karena tidak perlu.
--}}
<div class="w-full h-screen"> {{-- Mengisi seluruh tinggi layar --}}
    <iframe
        src="{{ asset('pdfs/buku-kamus-bangka.pdf') }}"
        class="w-full h-full border-none" {{-- Mengisi div & hapus border iframe --}}
        frameborder="0">
    </iframe>
</div>

{{-- Tombol Download (Kita pindahkan ke posisi fixed agar selalu terlihat) --}}
<div class="fixed bottom-4 right-4 z-50">
    <a href="{{ asset('pdfs/buku-kamus-bangka.pdf') }}"
       download
       class="inline-block bg-blue-600 text-white rounded-full px-5 py-3 shadow-lg hover:bg-blue-700 transition duration-300 font-semibold no-underline">
        <i class="fa-solid fa-download mr-2"></i>
        Unduh PDF
    </a>
</div>

@endsection
