<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Kata') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{ route('katas.update', $kata->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="kata_bangka" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Kata Bangka:</label>
                                <input type="text" name="kata_bangka" id="kata_bangka" value="{{ $kata->kata_bangka }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>
                            <div>
                                <label for="arti_indonesia" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Arti Indonesia:</label>
                                <input type="text" name="arti_indonesia" id="arti_indonesia" value="{{ $kata->arti_indonesia }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="dialek" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Dialek:</label>
                            <select name="dialek" id="dialek" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="Bangka Barat" {{ $kata->dialek == 'Bangka Barat' ? 'selected' : '' }}>Bangka Barat</option>
                                <option value="Bangka Induk" {{ $kata->dialek == 'Bangka Induk' ? 'selected' : '' }}>Bangka Induk</option>
                                <option value="Bangka Selatan" {{ $kata->dialek == 'Bangka Selatan' ? 'selected' : '' }}>Bangka Selatan</option>
                                <option value="Bangka Tengah" {{ $kata->dialek == 'Bangka Tengah' ? 'selected' : '' }}>Bangka Tengah</option>
                                <option value="Pangkalpinang" {{ $kata->dialek == 'Pangkalpinang' ? 'selected' : '' }}>Pangkalpinang</option>
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label for="definisi" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Definisi:</label>
                            <textarea name="definisi" id="definisi" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $kata->definisi }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="contoh" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Contoh Penggunaan (dalam kalimat):</label>
                            <textarea name="contoh" id="contoh" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $kata->contoh }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="sinonim" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Sinonim (pisahkan dengan koma):</label>
                            <input type="text" name="sinonim" id="sinonim" value="{{ $kata->sinonim }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Update
                            </button>
                            <a href="{{ route('katas.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

