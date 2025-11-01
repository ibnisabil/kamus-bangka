<x-app-layout>
    {{-- Header Halaman --}}
    <x-slot name="header">
        Pengaturan Halaman Tentang
    </x-slot>

    <div class="w-full bg-white rounded-xl shadow-lg p-6">
        
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Sukses!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        
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

        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            <div class="space-y-6">
                
                <div>
                    <label for="youtube_link" class="block text-sm font-medium text-gray-700">Link Embed YouTube</label>
                    <input type="url" name="youtube_link" id="youtube_link" 
                           {{-- Mengambil data dari $settings, jika tidak ada, tampilkan string kosong --}}
                           value="{{ old('youtube_link', $settings['youtube_link'] ?? '') }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                           placeholder="https://www.youtube.com/embed/...">
                    <p class="mt-1 text-xs text-gray-500">Salin link dari "Embed" di YouTube, bukan link dari browser.</p>
                </div>

                <div>
                    <label for="gmaps_link" class="block text-sm font-medium text-gray-700">Link Embed Google Maps</label>
                    <input type="url" name="gmaps_link" id="gmaps_link" 
                           value="{{ old('gmaps_link', $settings['gmaps_link'] ?? '') }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                           placeholder="https://www.google.com/maps/embed?pb=...">
                    <p class="mt-1 text-xs text-gray-500">Salin link dari "Embed a map" di Google Maps.</p>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
                        Simpan Pengaturan
                    </button>
                </div>

            </div>
        </form>
    </div>
</x-app-layout>