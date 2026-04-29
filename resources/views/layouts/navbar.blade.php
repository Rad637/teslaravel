<nav class="navbar">
    <div class="container navbar-inner">

        {{-- Logo --}}
        <a href="/" class="brand">
            <div class="brand-logo">
                <i class="bi bi-flower1"></i>
            </div>
            <div>
                <span class="brand-nama">SISFARM</span>
                <span class="brand-sub">Surya Farm</span>
            </div>
        </a>

        {{-- Menu Desktop --}}
        <ul class="nav-menu">
            <li><a href="/#tentang" class="nav-link">Tentang</a></li>
        </ul>

        {{-- Tombol Kanan --}}
        <div class="nav-kanan">
            @if(auth()->check())
                {{-- Kalau sudah login --}}
                <span style="font-size: 13px; color: var(--teks-abu);">Halo, {{ auth()->user()->nama_lengkap }}</span>
                <form action="/logout" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-outline" style="padding: 7px 16px; font-size: 13px;">
                        <i class="bi bi-box-arrow-right"></i> Keluar
                    </button>
                </form>
            @else
                <a href="/login" class="btn btn-outline" style="padding: 7px 16px; font-size: 13px;">
                    Masuk
                </a>
                <a href="/register" class="btn btn-hijau" style="padding: 7px 16px; font-size: 13px;">
                    Daftar
                </a>
            @endif
        </div>

        {{-- Tombol hamburger mobile --}}
        <button class="hamburger" onclick="bukaMenu()" id="btnHamburger">
            <i class="bi bi-list"></i>
        </button>
    </div>

    {{-- Mobile Menu --}}
    <div class="mobile-menu" id="mobileMenu">
        <a href="/#tentang" class="mobile-link" onclick="tutupMenu()">Tentang</a>
        <hr style="border-color: var(--border); margin: 8px 0;">
        @if(auth()->check())
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="mobile-link" style="width: 100%; text-align: left; background: none; border: none; cursor: pointer;">
                    Keluar
                </button>
            </form>
        @else
            <a href="/login" class="mobile-link">Masuk</a>
            <a href="/register" class="mobile-link" style="color: var(--hijau); font-weight: 600;">Daftar Sekarang</a>
        @endif
    </div>
</nav>

<style>
    .navbar {
        position: sticky;
        top: 0;
        z-index: 999;
        background: rgba(250, 247, 242, 0.95);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid var(--border);
    }

    .navbar-inner {
        display: flex;
        align-items: center;
        height: 68px;
        gap: 24px;
    }

    /* Brand / Logo */
    .brand {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-shrink: 0;
    }

    .brand-logo {
        width: 40px;
        height: 40px;
        background: var(--hijau);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 18px;
    }

    .brand-nama {
        display: block;
        font-family: var(--font-judul);
        font-size: 18px;
        font-weight: 700;
        color: var(--hijau-tua);
        line-height: 1;
    }

    .brand-sub {
        display: block;
        font-size: 11px;
        color: var(--teks-abu);
        line-height: 1.2;
    }

    /* Nav menu */
    .nav-menu {
        list-style: none;
        display: flex;
        gap: 4px;
        flex: 1;
    }

    .nav-link {
        padding: 6px 14px;
        border-radius: var(--radius-kecil);
        font-size: 14px;
        font-weight: 500;
        color: var(--teks-abu);
        transition: all 0.2s;
    }

    .nav-link:hover {
        color: var(--hijau);
        background-color: var(--hijau-pale);
    }

    /* Kanan navbar */
    .nav-kanan {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-shrink: 0;
    }

    /* Hamburger mobile */
    .hamburger {
        display: none;
        background: none;
        border: none;
        font-size: 24px;
        cursor: pointer;
        color: var(--teks-gelap);
        margin-left: auto;
    }

    /* Mobile menu */
    .mobile-menu {
        display: none;
        flex-direction: column;
        background: var(--putih);
        border-top: 1px solid var(--border);
        padding: 8px 0;
    }

    .mobile-menu.aktif {
        display: flex;
    }

    .mobile-link {
        padding: 12px 24px;
        font-size: 14px;
        color: var(--teks-abu);
        border-bottom: 1px solid var(--border);
        transition: color 0.2s;
    }

    .mobile-link:hover {
        color: var(--hijau);
        background-color: var(--hijau-pale);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .nav-menu,
        .nav-kanan {
            display: none;
        }

        .hamburger {
            display: block;
        }
    }
</style>

<script>
    function bukaMenu() {
        var menu = document.getElementById('mobileMenu');
        menu.classList.toggle('aktif');
    }

    function tutupMenu() {
        var menu = document.getElementById('mobileMenu');
        menu.classList.remove('aktif');
    }
</script>
