<x-app-layout>
    {{-- Header Halaman --}}
    <x-slot name="header">
        Manajemen Tujuan
    </x-slot>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-4" role="alert">
            <strong class="font-bold">Sukses!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="w-full flex justify-end mb-4">
        <a href="{{ route('admin.tujuans.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
            <i class="fa-solid fa-plus mr-2"></i>
            Tambah Tujuan Baru
        </a>
    </div>

    <div class="w-full bg-white rounded-xl shadow-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Judul
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Deskripsi
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Urutan
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($tujuans as $tujuan)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $loop->iteration }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $tujuan->judul }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900">
                        {{-- Kita batasi deskripsinya agar tidak terlalu panjang --}}
                        {{ Str::limit($tujuan->deskripsi, 70) }}
                    </td>
                     <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $tujuan->urutan }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-3">
                        <a href="{{ route('admin.tujuans.edit', $tujuan) }}"
                           class="text-blue-600 hover:text-blue-900">Edit</a>
                        <form action="{{ route('admin.tujuans.destroy', $tujuan) }}"
                              method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus item ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                        Belum ada data tujuan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($tujuans->hasPages())
        <div class="mt-4">
            {{ $tujuans->links() }}
        </div>
    @endif

</x-app-layout>