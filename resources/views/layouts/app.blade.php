<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SISFARM - Surya Farm')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* ========== CSS Variables ========== */
        :root {
            --hijau-tua:   #1a3c2b;
            --hijau:       #2d6a4f;
            --hijau-muda:  #52b788;
            --hijau-pale:  #d8f3dc;
            --kuning:      #e9c46a;
            --coklat:      #a98b5f;
            --krem:        #faf7f2;
            --putih:       #ffffff;
            --teks-gelap:  #1c2b1e;
            --teks-abu:    #5a7060;
            --border:      #d4e6d9;
            --shadow:      rgba(45, 106, 79, 0.12);

            --font-judul:  'Playfair Display', serif;
            --font-body:   'Plus Jakarta Sans', sans-serif;

            --radius-kecil: 8px;
            --radius:       14px;
            --radius-besar: 22px;
        }

        /* ========== Reset ========== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: var(--font-body);
            background-color: var(--krem);
            color: var(--teks-gelap);
            font-size: 15px;
            line-height: 1.6;
        }

        h1, h2, h3 {
            font-family: var(--font-judul);
            line-height: 1.2;
        }

        a { text-decoration: none; color: inherit; }

        img { max-width: 100%; }

        /* ========== Layout ========== */
        .container {
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ========== Tombol ========== */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 24px;
            border-radius: var(--radius-kecil);
            font-family: var(--font-body);
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            transition: all 0.25s ease;
            text-decoration: none;
        }

        .btn-hijau {
            background-color: var(--hijau);
            color: var(--putih);
        }
        .btn-hijau:hover {
            background-color: var(--hijau-tua);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px var(--shadow);
        }

        .btn-outline {
            background: transparent;
            color: var(--hijau);
            border: 2px solid var(--hijau);
        }
        .btn-outline:hover {
            background-color: var(--hijau);
            color: var(--putih);
        }

        .btn-kuning {
            background-color: var(--kuning);
            color: var(--teks-gelap);
        }
        .btn-kuning:hover {
            background-color: #d4a843;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(233, 196, 106, 0.4);
        }

        /* ========== Card ========== */
        .card {
            background: var(--putih);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 24px;
        }

        /* ========== Animasi ========== */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(24px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-up {
            animation: fadeUp 0.6s ease forwards;
        }
        .delay-1 { animation-delay: 0.1s; opacity: 0; }
        .delay-2 { animation-delay: 0.2s; opacity: 0; }
        .delay-3 { animation-delay: 0.3s; opacity: 0; }
        .delay-4 { animation-delay: 0.4s; opacity: 0; }

        /* ========== Scrollbar ========== */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--krem); }
        ::-webkit-scrollbar-thumb { background: var(--hijau-muda); border-radius: 3px; }

        /* ========== Responsive ========== */
        @media (max-width: 768px) {
            .container { padding: 0 16px; }
        }
    </style>

    @yield('styles')
</head>
<body>

    {{-- Navbar --}}
    @include('layouts.navbar')

    {{-- Konten Utama --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

    @yield('scripts')

</body>
</html>
