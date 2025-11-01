<x-app-layout>
    {{-- Header Halaman --}}
    <x-slot name="header">
        Tambah Item Tujuan Baru
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

        <form action="{{ route('admin.tujuans.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-6">
                
                <div>
                    <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                    <input type="text" name="judul" id="judul" value="{{ old('judul') }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                           placeholder="Contoh: Pelestarian" required>
                </div>
                
                <div>
                    <label for="urutan" class="block text-sm font-medium text-gray-700">Nomor Urut</label>
                    <input type="number" name="urutan" id="urutan" value="{{ old('urutan', 0) }}"
                           class="mt-1 block w-48 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                           required>
                    <p class="mt-1 text-xs text-gray-500">Menentukan urutan tampil di slider (0, 1, 2, ...).</p>
                </div>

                <div>
                    <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar Slider</label>
                    <input type="file" name="gambar" id="gambar"
                           class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                           required>
                    <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF, WEBP max 2MB.</p>
                </div>

                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4"
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                              required>{{ old('deskripsi') }}</textarea>
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('admin.tujuans.index') }}"
                       class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-300 transition duration-300">
                        Batal
                    </a>
                    <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
                        Simpan Item
                    </button>
                </div>

            </div>
        </form>
    </div>
</x-app-layout>