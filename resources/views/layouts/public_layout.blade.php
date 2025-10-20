<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamus Bangka</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

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
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    @if (Request::is('/'))
        <video src="{{ asset('videos/background-video.mp4') }}" autoplay loop muted playsinline class="fixed z-0 w-screen h-screen object-cover"></video>
        <div class="fixed z-10 w-screen h-screen bg-black opacity-30"></div>
    @endif

    <div class="relative z-20 flex flex-col min-h-screen">

        <header id="main-header" class="sticky top-0 z-50">
            <nav class="container mx-auto px-6 py-6 flex justify-between items-center">
                <a href="{{ route('beranda') }}" class="flex items-center gap-4">
                    <div class="logo-wrapper">
                        <img src="{{ asset('images/logo_kota.png') }}" alt="Logo Kota Pangkalpinang Berwarna" class="logo-color h-12">
                        <img src="{{ asset('images/logo_kota-white.png') }}" alt="Logo Kota Pangkalpinang Putih" class="logo-white h-12">
                    </div>
                    <div class="logo-wrapper">
                        <img src="{{ asset('images/LOGO-DISPAR.png') }}" alt="Logo Dispar Berwarna" class="logo-color h-10">
                        <img src="{{ asset('images/logo-dispar-white.png') }}" alt="Logo Dispar Putih" class="logo-white h-10">
                    </div>
                    <span class="text-2xl font-bold">
                        <span class="title-kamus text-white">Kamus</span>
                        <span class="title-bangka text-white">Bangka</span>
                    </span>
                </a>
                <div>
                    <a href="{{ route('beranda') }}" class="menu-link text-white hover:text-blue-300 px-3 py-2 font-medium">Beranda</a>
                    <a href="{{ route('tentang') }}" class="menu-link text-white hover:text-blue-300 px-3 py-2 font-medium">Tentang</a>
                </div>
            </nav>
        </header>

        <main class="flex-grow">
            @yield('content')
        </main>

        <footer class="bg-gray-900 text-gray-300 {{ Request::is('/') ? 'mt-0' : 'mt-12' }}">
           <div class="container mx-auto px-6 py-10">
               <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                   <div>
                       <h3 class="font-bold text-lg text-white mb-4">Kontak</h3>
                       <ul class="space-y-3">
                           <li>
                               <div class="flex items-center gap-3 group">
                                   <a href="https://wa.me/6283179174543" target="_blank">
                                       <div class="w-10 h-10 bg-white/10 rounded-full flex-shrink-0 flex items-center justify-center group-hover:bg-blue-500 transition-colors">
                                           <i class="fa-brands fa-whatsapp"></i>
                                       </div>
                                   </a>
                                   <span class="group-hover:text-blue-400 transition-colors">0831-7917-4543</span>
                               </div>
                           </li>
                           <li>
                               <div class="flex items-center gap-3 group">
                                   <a href="mailto:tic.pangkalpinang@gmail.com">
                                       <div class="w-10 h-10 bg-white/10 rounded-full flex-shrink-0 flex items-center justify-center group-hover:bg-blue-500 transition-colors">
                                           <i class="fa-solid fa-envelope"></i>
                                       </div>
                                   </a>
                                   <span class="group-hover:text-blue-400 transition-colors">tic.pangkalpinang@gmail.com</span>
                               </div>
                           </li>
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
                           <li><a href="#" class="hover:text-blue-400">Buku Digital Bahasa Melayu Bangka Belitung</a></li>
                       </ul>
                   </div>
                   <div class="md:text-right">
                       <h3 class="font-bold text-lg text-white mb-4">Ikuti Kami</h3>
                       <div class="flex gap-4 md:justify-end">
                           <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors"><i class="fa-brands fa-instagram"></i></a>
                           <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors"><i class="fa-brands fa-tiktok"></i></a>
                           <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors"><i class="fa-brands fa-facebook"></i></a>
                           <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors"><i class="fa-brands fa-youtube"></i></a>
                       </div>
                   </div>
               </div>
           </div>
           <div class="border-t border-gray-700">
               <div class="container mx-auto px-6 py-4 flex justify-between items-center text-sm">
                   <div class="flex items-center gap-3">
                       <img src="{{ asset('images/logo-dispar-white.png') }}" alt="Logo Dispar White" class="h-8 opacity-80">
                       <span>© 2025 Dinas Pariwisata Kota Pangkalpinang. Semua Hak Dilindungi.</span>
                   </div>
                   <span>MRJ</span>
               </div>
           </div>
        </footer>
    </div>

    <script>
        const header = document.getElementById('main-header');

        const handleScroll = () => {
            if (window.scrollY > 50) {
                header.classList.add('header-scrolled');
            } else {
                header.classList.remove('header-scrolled');
            }
        };

        header.addEventListener('mouseover', () => {
            header.classList.add('header-scrolled');
        });

        header.addEventListener('mouseout', () => {
            handleScroll();
        });

        window.addEventListener('scroll', handleScroll);
    </script>

    @stack('scripts')
</body>
</html>