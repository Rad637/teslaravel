<footer class="footer">
    <div class="container">
        <div class="footer-atas">

            {{-- Kolom Brand --}}
            <div class="footer-brand">
                <a href="/" class="brand" style="margin-bottom: 12px; display: inline-flex;">
                    <div class="brand-logo">
                        <i class="bi bi-flower1"></i>
                    </div>
                    <div style="margin-left: 10px;">
                        <span class="brand-nama">SISFARM</span>
                        <span class="brand-sub">Surya Farm</span>
                    </div>
                </a>
                <p style="font-size: 13px; color: var(--teks-abu); line-height: 1.7; max-width: 280px; margin-top: 8px;">
                    Sistem Informasi Berbasis Website untuk digitalisasi pencatatan stok, hasil panen, distribusi, dan pemasaran produk Surya Farm.
                </p>
            </div>

        </div>

        {{-- Garis bawah --}}
        <div class="footer-bawah">
            <span>&copy; {{ date('Y') }} SISFARM - Surya Farm. Hak cipta dilindungi.</span>
            <span>Dibuat untuk memajukan pertanian Indonesia 🌾</span>
        </div>
    </div>
</footer>

<style>
    .footer {
        background: var(--hijau-tua);
        color: #c5d9c9;
        padding: 60px 0 0;
        margin-top: 80px;
    }

    .footer-atas {
        display: flex;
        justify-content: center;
        padding-bottom: 48px;
    }

    /* Kolom brand di footer - override warna */
    .footer .brand-nama { color: #e8f5e9; }
    .footer .brand-sub { color: #a5c8aa; }
    .footer .brand-logo { background: var(--hijau-muda); }

    .footer-judul {
        font-family: var(--font-body);
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--hijau-muda);
        margin-bottom: 16px;
    }

    .footer-list {
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: 10px;
        font-size: 13px;
        color: #9dbfa3;
    }

    .footer-list a {
        color: #9dbfa3;
        transition: color 0.2s;
    }

    .footer-list a:hover {
        color: var(--hijau-muda);
    }

    .footer-bawah {
        border-top: 1px solid rgba(255,255,255,0.08);
        padding: 20px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 13px;
        color: #6b9970;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .footer-atas {
            gap: 32px;
        }
    }

    @media (max-width: 640px) {
        .footer-atas { }
        .footer-bawah {
            flex-direction: column;
            gap: 8px;
            text-align: center;
        }
    }
</style>
