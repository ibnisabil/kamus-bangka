<x-app-layout>
    {{-- Header Halaman --}}
    <x-slot name="header">
        Edit Berita: {{ $berita->judul }}
    </x-slot>

    <div class="w-full bg-white rounded-xl shadow-lg p-6">
        
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Oops!</strong>
                <span class="block sm:inline">Ada beberapa masalah dengan input Anda.</span>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- [DIUBAH] Ganti action dan tambahkan method PUT --}}
        <form action="{{ route('admin.beritas.update', $berita) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- <-- [PENTING] Tambahkan ini --}}
            <div class="space-y-6">
                
                <div>
                    <label for="judul" class="block text-sm font-medium text-gray-700">Judul Berita</label>
                    <input type="text" name="judul" id="judul" 
                           {{-- [DIUBAH] Isi value dengan data lama --}}
                           value="{{ old('judul', $berita->judul) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                           required>
                </div>

                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <input type="text" name="kategori" id="kategori" 
                           {{-- [DIUBAH] Isi value dengan data lama --}}
                           value="{{ old('kategori', $berita->kategori) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                           placeholder="Contoh: DESTINASI, KULINER, BUDAYA" required>
                </div>

                <div>
                    <label for="gambar" class="block text-sm font-medium text-gray-700">Ganti Gambar (Opsional)</label>
                    
                    {{-- [BARU] Tampilkan gambar saat ini --}}
                    <img src="{{ $berita->gambar == 'https://via.placeholder.com/800x500/3B82F6/ffffff?text=Pantai+Parai' ? $berita->gambar : Storage::url($berita->gambar) }}" alt="{{ $berita->judul }}" class="w-48 h-auto rounded-lg my-2">
                    
                    <input type="file" name="gambar" id="gambar"
                           class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                    <p class="mt-1 text-xs text-gray-500">Biarkan kosong jika tidak ingin mengganti gambar. (PNG, JPG, GIF, WEBP max 2MB).</p>
                </div>

                <div>
                    <label for="excerpt" class="block text-sm font-medium text-gray-700">Excerpt (Deskripsi Singkat)</label>
                    <textarea name="excerpt" id="excerpt" rows="3"
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                              required>{{ old('excerpt', $berita->excerpt) }}</textarea> {{-- <-- [DIUBAH] Isi textarea --}}
                    <p class="mt-1 text-xs text-gray-500">Muncul di kartu berita di halaman beranda.</p>
                </div>

                <div>
                    <label for="isi_lengkap" class="block text-sm font-medium text-gray-700">Isi Lengkap Berita</label>
                    <textarea name="isi_lengkap" id="isi_lengkap" rows="10"
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                              placeholder="Tulis artikel lengkap di sini. Anda bisa menggunakan HTML."
                              required>{{ old('isi_lengkap', $berita->isi_lengkap) }}</textarea> {{-- <-- [DIUBAH] Isi textarea --}}
                     <p class="mt-1 text-xs text-gray-500">Tips: Anda bisa install Rich Text Editor seperti Trix di sini nanti.</p>
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('admin.beritas.index') }}"
                       class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-300 transition duration-300">
                        Batal
                    </a>
                    <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
                        Update Berita
                    </button>
                </div>

            </div>
        </form>
    </div>
</x-app-layout>