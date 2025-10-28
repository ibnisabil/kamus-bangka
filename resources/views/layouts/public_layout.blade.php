<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamus Bangka</title>

    <link rel="icon" href="{{ asset('images/LOGO-DISPAR.png') }}" type="image/png">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- START: INTEGRASI AOS (Animate On Scroll) CSS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    {{-- END: INTEGRASI AOS --}}

    @stack('styles')

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'serif': ['"Playfair Display"', 'serif'],
                        'sans': ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        html, body {
            width: 100%;
        }
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }
        #mobile-menu-panel { transition: transform 0.3s ease-in-out; }

        /* == PENGATURAN HEADER == */
        #main-header {
            transition: background-color 0.2s ease-out, box-shadow 0.2s ease-out;
        }

        #main-header.header-scrolled {
            background-color: white;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        }

        /* == PENGATURAN WARNA TEKS == */
        .title-kamus, .title-bangka, .menu-link {
            transition: color 0.2s ease-out;
        }

        #main-header.header-scrolled .title-kamus { color: #3b82f6; }
        #main-header.header-scrolled .title-bangka { color: #ef4444; }
        #main-header.header-scrolled .menu-link { color: #1f2937; }

        #main-header.header-scrolled .menu-link:hover {
            color: #3b82f6;
        }

        /* == Logika untuk Menukar Logo == */
        .logo-wrapper {
            position: relative;
            display: inline-block;
        }

        .logo-wrapper img {
            position: relative;
            transition: opacity 0.2s ease-out;
        }

        .logo-wrapper .logo-color {
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
        }
        .logo-wrapper .logo-white {
            opacity: 1;
        }

        #main-header.header-scrolled .logo-color {
            opacity: 1;
        }
        #main-header.header-scrolled .logo-white {
            opacity: 0;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="relative z-20 flex flex-col min-h-screen">

        <header id="main-header" class="sticky top-0 z-30">
            <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
                <a href="{{ route('beranda') }}" class="flex items-center gap-3">

                    {{-- Logo Kota (h-12) --}}
                    <div class="logo-wrapper flex items-center h-12">
                        <img src="{{ asset('images/logo_kota.png') }}" alt="Logo Kota Pangkalpinang Berwarna" class="logo-color h-12 w-12 object-contain">
                        <img src="{{ asset('images/logo_kota-white.png') }}" alt="Logo Kota Pangkalpinang Putih" class="logo-white h-12 w-12 object-contain">
                    </div>

                    {{-- Logo Dispar (h-10) --}}
                    <div class="logo-wrapper flex items-center h-12">
                        <img src="{{ asset('images/LOGO-DISPAR.png') }}" alt="Logo Dispar Berwarna" class="logo-color h-10 object-contain">
                        <img src="{{ asset('images/logo-dispar-white.png') }}" alt="Logo Dispar Putih" class="logo-white h-10 object-contain">
                    </div>

                    <span class="text-2xl font-bold">
                        <span class="title-kamus text-white">Kamus</span>
                        <span class="title-bangka text-white">Bangka</span>
                    </span>
                </a>
                <div class="hidden md:flex items-center gap-2">
                    <a href="{{ route('beranda') }}" class="menu-link text-white hover:text-blue-300 px-3 py-2 font-medium">Beranda</a>
                    <a href="{{ route('tentang') }}" class="menu-link text-white hover:text-blue-300 px-3 py-2 font-medium">Tentang</a>
                    {{-- HAPUS: Link Kontak Kami (header desktop) --}}
                </div>
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-white focus:outline-none p-2 rounded-md hover:bg-white/10 transition-colors [.header-scrolled_&]:text-gray-900">
                        <i class="fa-solid fa-bars fa-lg"></i>
                    </button>
                </div>
            </nav>
        </header>

        <main class="flex-grow">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="bg-gray-900 text-gray-300 {{ Request::is('/') ? 'mt-0' : 'mt-6' }}">
            <div class="container mx-auto px-6 py-10">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                    <div>
                        <h3 class="font-bold text-lg text-white mb-4">Kontak</h3>
                        <ul class="space-y-3">
                            {{-- HAPUS: Item "Informasi Lengkap Kontak" --}}
                            <div class="flex items-center gap-3 group">
                                <a id="email-link"
                                    href="mailto:tic.pangkalpinang@gmail.com"
                                    target="_blank">

                                    <div class="w-10 h-10 bg-white/10 rounded-full flex-shrink-0 flex items-center justify-center group-hover:bg-blue-500 transition-colors">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                </a>
                                <span class="group-hover:text-blue-400 transition-colors">tic.pangkalpinang@gmail.com</span>
                            </div>
                            <li>
                                <div class="flex items-center gap-3 group">
                                    <a href="http://wonderful.pangkalpinangkota.go.id" target="_blank">
                                        <div class="w-10 h-10 bg-white/10 rounded-full flex-shrink-0 flex items-center justify-center group-hover:bg-blue-500 transition-colors">
                                            <i class="fa-solid fa-globe"></i>
                                        </div>
                                    </a>
                                    <span class="group-hover:text-blue-400 transition-colors">wonderful.pangkalpinangkota.go.id</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-white mb-4">Navigasi Cepat</h3>
                        <ul class="space-y-3">
                            <li>
                                <a href="{{ route('buku.digital') }}" class="hover:text-blue-400">
                                    Buku Digital Bahasa Melayu Bangka Belitung
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="md:text-right">
                        <h3 class="font-bold text-lg text-white mb-4">Ikuti Kami</h3>
                        <div class="flex gap-4 md:justify-end">
                            {{-- Instagram --}}
                            <a href="https://www.instagram.com/dispar_pgk" target="_blank" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            {{-- TikTok --}}
                            <a href="https://www.tiktok.com/@dispar_pgk" target="_blank" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors">
                                <i class="fa-brands fa-tiktok"></i>
                            </a>
                            {{-- Facebook --}}
                            <a href="https://www.facebook.com/share/1Ci47KvCpn/" target="_blank" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            {{-- YouTube --}}
                            <a href="https://youtube.com/@wonderfulpangkalpinang244" target="_blank" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700">
                <div class="container mx-auto px-6 py-4 flex flex-col md:flex-row justify-center md:justify-between items-center text-sm gap-4 md:gap-2">
                    <div class="flex flex-col sm:flex-row items-center gap-3 text-center sm:text-left">
                        <img src="{{ asset('images/logo-dispar-white.png') }}" alt="Logo Dispar White" class="h-8 opacity-80">
                        <span>© 2025 Dinas Pariwisata Kota Pangkalpinang. Semua Hak Dilindungi.</span>
                    </div>
                    <span>MRJ</span>
                </div>
            </div>
        </footer>
    </div>

    <div id="mobile-menu-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>

    <div id="mobile-menu-panel" class="fixed top-0 right-0 h-full w-64 bg-gray-900 text-white shadow-lg z-50 transform translate-x-full md:hidden">
        <div class="p-4 flex justify-between items-center border-b border-gray-700">
            <h2 class="font-bold text-lg">Menu</h2>
            <button id="close-menu-button" class="text-white p-2 rounded-md hover:bg-white/20"><i class="fa-solid fa-times fa-lg"></i></button>
        </div>
        <div class="flex flex-col mt-4">
            <a href="{{ route('beranda') }}" class="block py-3 px-4 hover:bg-gray-800">Beranda</a>
            <a href="{{ route('tentang') }}" class="block py-3 px-4 hover:bg-gray-800">Tentang</a>
            {{-- HAPUS: Link Kontak Kami (Mobile Menu) --}}
        </div>
    </div>

    {{-- START: INTEGRASI AOS (Animate On Scroll) JS --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    {{-- END: INTEGRASI AOS --}}

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // --- Script untuk Menu Slide-in ---
            const menuButton = document.getElementById('mobile-menu-button');
            const closeButton = document.getElementById('close-menu-button');
            const menuPanel = document.getElementById('mobile-menu-panel');
            const overlay = document.getElementById('mobile-menu-overlay');

            if (menuButton) {
                const openMenu = () => { menuPanel.classList.remove('translate-x-full'); overlay.classList.remove('hidden'); };
                const closeMenu = () => { menuPanel.classList.add('translate-x-full'); overlay.classList.add('hidden'); };

                menuButton.addEventListener('click', openMenu);
                closeButton.addEventListener('click', closeMenu);
                overlay.addEventListener('click', closeMenu);
            }

            // --- Script Efisien untuk Efek Scroll & Hover Header ---
            const header = document.getElementById('main-header');
            if (header) {
                let isHovering = false;

                const updateHeaderState = () => {
                    const isScrolled = window.scrollY > 10;
                    if (isScrolled || isHovering) {
                        header.classList.add('header-scrolled');
                    } else {
                        header.classList.remove('header-scrolled');
                    }
                };

                header.addEventListener('mouseover', () => { isHovering = true; updateHeaderState(); });
                header.addEventListener('mouseout', () => { isHovering = false; updateHeaderState(); });
                window.addEventListener('scroll', updateHeaderState, { passive: true });
                updateHeaderState();
            }

            // --- Script untuk Email Link ---
            const emailLink = document.getElementById('email-link');
            if (emailLink) {
                const isMobile = /Mobi/i.test(navigator.userAgent);
                const gmailWebLink = 'https://mail.google.com/mail/?view=cm&fs=1&to=tic.pangkalpinang@gmail.com';

                if (!isMobile) {
                    emailLink.href = gmailWebLink;
                }
            }

            // --- TAMBAHAN: Inisialisasi AOS ---
            // Dijalankan setelah semua elemen DOM siap
            AOS.init({
                duration: 800, // Waktu default animasi (800ms)
                easing: 'ease-out', // Jenis easing
                once: true, // Animasi hanya berjalan sekali
                offset: 50 // Jarak dalam px dari bagian bawah jendela sebelum memulai animasi
            });
            // ---------------------------------
        });
    </script>

    @stack('scripts')
</body>
</html>
