<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Admin Panel</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        {{-- [DIUBAH] Ganti font ke Inter agar lebih modern untuk admin panel --}}
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- [DITAMBAHKAN] Alpine.js untuk dropdown menu --}}
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="font-sans antialiased bg-gray-100">
        {{-- [LAYOUT BARU] Menggunakan Flexbox untuk Sidebar + Content --}}
        <div class="flex h-screen bg-gray-100">
            
            <div class="hidden md:flex md:flex-shrink-0">
                <div class="flex flex-col w-64 bg-gray-800 text-gray-200">
                    <div class="flex items-center justify-center h-16 bg-gray-900">
                        <img src="{{ asset('images/LOGO-DISPAR.png') }}" alt="Logo Admin Kataka" class="h-10 w-auto">
                    </div>
                    
                    <nav class="flex-1 px-2 py-4 space-y-2">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="flex items-center px-4 py-2 rounded-md transition duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700' }}">
                        <i class="fa-solid fa-tachometer-alt w-5 text-center mr-3"></i>
                        Dashboard
                    </a>
                    <a href="{{ route('katas.index') }}" 
                       class="flex items-center px-4 py-2 rounded-md transition duration-200 {{ request()->routeIs('katas.*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700' }}">
                        <i class="fa-solid fa-book w-5 text-center mr-3"></i>
                        Manajemen Kamus
                    </a>
                    <a href="{{ route('admin.beritas.index') }}" 
                       class="flex items-center px-4 py-2 rounded-md transition duration-200 {{ request()->routeIs('admin.beritas.*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700' }}">
                        <i class="fa-solid fa-newspaper w-5 text-center mr-3"></i>
                        Manajemen Berita
                    </a>
                    <a href="{{ route('admin.tujuans.index') }}"
                       class="flex items-center px-4 py-2 rounded-md transition duration-200 {{ request()->routeIs('admin.tujuans.*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700' }}">
                        <i class="fa-solid fa-bullseye w-5 text-center mr-3"></i>
                        Manajemen Tujuan
                    </a>

                    {{-- [BARU] Tambahkan link ini --}}
                    <a href="{{ route('admin.settings.index') }}"
                       class="flex items-center px-4 py-2 rounded-md transition duration-200 {{ request()->routeIs('admin.settings.*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700' }}">
                        <i class="fa-solid fa-gears w-5 text-center mr-3"></i>
                        Pengaturan
                    </a>

                    <a href="{{ route('beranda') }}" target="_blank"
                       class="flex items-center px-4 py-2 rounded-md transition duration-200 hover:bg-gray-700">
                        <i class="fa-solid fa-globe w-5 text-center mr-3"></i>
                        Lihat Website
                    </a>
                </nav>
                </div>
            </div>

            <div class="flex-1 flex flex-col overflow-hidden">
                <header class="flex justify-between items-center py-4 px-6 bg-white border-b border-gray-200">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-800">{{ $header ?? 'Admin Panel' }}</h1>
                    </div>
                    
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center space-x-2 relative focus:outline-none">
                            <span class="font-semibold">{{ Auth::user()->name }}</span>
                            <i class="fa-solid fa-caret-down text-sm"></i>
                        </button>
                        <div x-show="open" @click.away="open = false" 
                             class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50"
                             x-transition>
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </header>

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                    <div class="container mx-auto">
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>