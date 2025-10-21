<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Digital - Kamus Bangka</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @stack('styles')

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { 'serif': ['"Playfair Display"', 'serif'], 'sans': ['Poppins', 'sans-serif'], }
                }
            }
        }
    </script>

    <style>
        html, body {
            width: 100%;
            height: 100%; /* Agar iframe mengisi layar */
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            background-color: #f3f4f6; /* Warna background abu-abu muda */
        }
    </style>
</head>
<body class="bg-gray-100">

    {{-- Langsung tampilkan konten utama tanpa pembungkus tambahan --}}
    <main>
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
