<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    {{-- viewport-fit=cover: supports notch/Dynamic Island on iOS --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>@yield('title', 'Katalog Undangan Digital | Imora')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eef0ff',
                            100: '#e0e3ff',
                            200: '#c7cbff',
                            300: '#a3a9ff',
                            400: '#7c83ff',
                            500: '#5e66f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                            800: '#3730a3',
                            900: '#312e81',
                        },
                        berry: {
                            bg: '#f6f8fb',
                            card: '#ffffff',
                            dark: '#181a20',
                            muted: '#8a8ea3',
                            border: '#e8eaf0'
                        }
                    },
                    fontFamily: {
                        sans: ['"DM Sans"', 'system-ui', 'sans-serif']
                    },
                    borderRadius: {
                        'berry': '12px',
                        'berry-lg': '16px'
                    },
                    boxShadow: {
                        'berry': '0 2px 8px rgba(94,102,241,0.08)',
                        'berry-md': '0 4px 16px rgba(94,102,241,0.12)',
                        'berry-lg': '0 8px 32px rgba(94,102,241,0.16)',
                        'card': '0 2px 6px rgba(0,0,0,0.06)',
                        'card-hover': '0 8px 24px rgba(94,102,241,0.15)',
                    }
                }
            }
        }
    </script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    <style>
        /* ===== Prevent iOS input zoom (font-size < 16px triggers zoom) ===== */
        input,
        select,
        textarea {
            font-size: 16px !important;
        }

        /* ===== Scroll Reveal ===== */
        .reveal {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity .6s ease-out, transform .6s ease-out;
        }

        .reveal.animate-in {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-delay-1 {
            transition-delay: .1s
        }

        .reveal-delay-2 {
            transition-delay: .2s
        }

        .reveal-delay-3 {
            transition-delay: .3s
        }

        .reveal-delay-4 {
            transition-delay: .4s
        }

        /* ===== Scrollbar ===== */
        ::-webkit-scrollbar {
            width: 6px
        }

        ::-webkit-scrollbar-track {
            background: #f6f8fb
        }

        ::-webkit-scrollbar-thumb {
            background: #c7cbff;
            border-radius: 3px
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #5e66f1
        }

        /* ===== Card Lift ===== */
        .card-lift {
            transition: transform .3s ease, box-shadow .3s ease
        }

        .card-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(94, 102, 241, .15)
        }

        /* ===== Badge Pulse ===== */
        .badge-pulse {
            animation: badgePulse 2s ease-in-out infinite
        }

        @keyframes badgePulse {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(94, 102, 241, .4)
            }

            50% {
                box-shadow: 0 0 0 6px rgba(94, 102, 241, 0)
            }
        }

        /* ===== Toast ===== */
        .toast-enter {
            animation: toastSlide .4s ease-out forwards
        }

        @keyframes toastSlide {
            from {
                transform: translateY(-20px);
                opacity: 0
            }

            to {
                transform: translateY(0);
                opacity: 1
            }
        }

        /* ===== Phone Mockup ===== */
        .phone-mockup {
            position: relative;
            background: #111;
            border-radius: 36px;
            padding: 10px;
            box-shadow: 0 30px 80px rgba(0, 0, 0, .35), inset 0 1px 0 rgba(255, 255, 255, .1);
        }

        .phone-mockup::before {
            content: '';
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            width: 90px;
            height: 22px;
            background: #111;
            border-radius: 0 0 14px 14px;
            z-index: 20;
        }

        .phone-mockup::after {
            content: '';
            position: absolute;
            top: 14px;
            left: 50%;
            transform: translateX(-50%);
            width: 8px;
            height: 8px;
            background: #222;
            border-radius: 50%;
            z-index: 21;
            box-shadow: 0 0 0 2px #1a1a1a;
        }

        .phone-screen {
            border-radius: 28px;
            overflow: hidden;
            background: #fff;
            aspect-ratio: 9/19;
        }

        .phone-screen img {
            width: 100%;
            height: 100%;
            object-fit: cover
        }

        /* ===== Float Animations ===== */
        @keyframes floatPhone {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-12px)
            }
        }

        .float-anim {
            animation: floatPhone 4s ease-in-out infinite
        }

        .float-anim-delay {
            animation: floatPhone 4s ease-in-out infinite;
            animation-delay: 1s
        }

        /* ===== Misc ===== */
        .scrollbar-hide::-webkit-scrollbar {
            display: none
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none
        }

        /* ===== Safe area helpers ===== */
        .pb-safe {
            padding-bottom: env(safe-area-inset-bottom, 0px)
        }

        .pt-safe {
            padding-top: env(safe-area-inset-top, 0px)
        }

        /* ===== Touch targets: all interactive elements ≥ 44px ===== */
        .cat-btn {
            min-height: 40px;
            touch-action: manipulation;
            -webkit-tap-highlight-color: transparent;
        }

        button,
        [role="button"],
        a {
            -webkit-tap-highlight-color: transparent;
        }

        /* ===== Sticky nav z-index & height ===== */
        #stickyNav {
            top: 64px;
        }

        /* 16 = 4rem (h-16 navbar) */

        /* ===== Category filter scroll on small screens ===== */
        #categoryFilters {
            display: flex;
            gap: 8px;
            overflow-x: auto;
            scrollbar-width: none;
            -webkit-overflow-scrolling: touch;
            padding-bottom: 2px;
            flex-wrap: nowrap;
        }

        #categoryFilters::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body class="bg-berry-bg text-gray-800 font-sans antialiased">

    <!-- ========== NAVBAR ========== -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-xl border-b border-berry-border transition-all duration-300"
        id="navbar" style="padding-top: env(safe-area-inset-top, 0px);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="#" class="flex items-center gap-2.5 group flex-shrink-0">
                    <div
                        class="w-9 h-9 bg-gradient-to-br from-primary-500 to-primary-700 rounded-berry flex items-center justify-center shadow-berry transition-transform duration-300 group-hover:scale-105">
                        <span class="text-white font-bold text-sm"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-envelope-heart-fill"
                                viewBox="0 0 16 16">
                                <path
                                    d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555l-4.2 2.568-.051-.105c-.666-1.3-2.363-1.917-3.699-1.25-1.336-.667-3.033-.05-3.699 1.25l-.05.105zM11.584 8.91l-.073.139L16 11.8V4.697l-4.003 2.447c.027.562-.107 1.163-.413 1.767Zm-4.135 3.05c-1.048-.693-1.84-1.39-2.398-2.082L.19 12.856A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144L10.95 9.878c-.559.692-1.35 1.389-2.398 2.081L8 12.324l-.551-.365ZM4.416 8.91c-.306-.603-.44-1.204-.413-1.766L0 4.697v7.104l4.49-2.752z" />
                                <path d="M8 5.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132" />
                            </svg></span>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-berry-dark">Imora ID</span>
                </a>
                <div class="hidden md:flex items-center gap-1">
                    <a href="#katalog"
                        class="px-4 py-2 rounded-berry text-sm font-medium text-primary-600 bg-primary-50 transition-colors">Katalog</a>
                    <a href="#populer"
                        class="px-4 py-2 rounded-berry text-sm font-medium text-gray-600 hover:text-primary-600 hover:bg-primary-50 transition-colors">Populer</a>
                    <a href="#tentang"
                        class="px-4 py-2 rounded-berry text-sm font-medium text-gray-600 hover:text-primary-600 hover:bg-primary-50 transition-colors">Tentang</a>
                </div>
                <div class="flex items-center gap-2 sm:gap-3">
                    <a href="https://wa.me/6281234567890" target="_blank"
                        class="hidden sm:inline-flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-primary-600 to-primary-500 text-white text-sm font-semibold rounded-berry shadow-berry hover:shadow-berry-md hover:from-primary-700 hover:to-primary-600 transition-all duration-300">
                        <i data-lucide="message-circle" class="w-4 h-4"></i>Hubungi Kami
                    </a>
                    {{-- Mobile: show WA icon only --}}
                    <a href="https://wa.me/6281234567890" target="_blank"
                        class="sm:hidden flex items-center justify-center w-9 h-9 bg-primary-50 text-primary-600 rounded-berry">
                        <i data-lucide="message-circle" class="w-4 h-4"></i>
                    </a>
                    <button id="mobileToggle"
                        class="md:hidden p-2.5 rounded-berry text-gray-600 hover:bg-berry-bg transition-colors min-w-[40px] min-h-[40px] flex items-center justify-center"
                        aria-label="Menu">
                        <i data-lucide="menu" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>
        </div>
        {{-- Mobile menu --}}
        <div id="mobileMenu" class="md:hidden hidden border-t border-berry-border bg-white"
            style="padding-bottom: env(safe-area-inset-bottom, 0px);">
            <div class="px-4 py-3 space-y-1">
                <a href="#katalog"
                    class="block px-4 py-3 rounded-berry text-sm font-medium text-primary-600 bg-primary-50 mobile-nav-link">Katalog</a>
                <a href="#populer"
                    class="block px-4 py-3 rounded-berry text-sm font-medium text-gray-600 hover:bg-berry-bg transition-colors mobile-nav-link">Populer</a>
                <a href="#tentang"
                    class="block px-4 py-3 rounded-berry text-sm font-medium text-gray-600 hover:bg-berry-bg transition-colors mobile-nav-link">Tentang</a>
                <a href="https://wa.me/6281234567890" target="_blank"
                    class="block px-4 py-3 rounded-berry text-sm font-semibold text-white bg-primary-600 text-center mt-2">Hubungi
                    Kami</a>
            </div>
        </div>
    </nav>

    <!-- ========== MAIN CONTENT ========== -->
    {{-- pt-16 = 64px to offset fixed navbar; extra pt-safe for notched phones --}}
    <main class="pt-16" style="padding-top: calc(4rem + env(safe-area-inset-top, 0px));">
        @yield('content')
    </main>

    <!-- ========== FOOTER ========== -->
    <footer class="bg-berry-dark text-gray-400 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12"
            style="padding-bottom: calc(3rem + env(safe-area-inset-bottom, 0px));">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="md:col-span-2">
                    <div class="flex items-center gap-2.5 mb-4">
                        <div
                            class="w-9 h-9 bg-gradient-to-br from-primary-500 to-primary-700 rounded-berry flex items-center justify-center">
                            <span class="text-white font-bold text-sm">I</span>
                        </div>
                        <span class="text-xl font-bold text-white tracking-tight">Imora</span>
                    </div>
                    <p class="text-sm leading-relaxed max-w-sm">Membuat momen spesialmu menjadi tak terlupakan melalui
                        undangan digital yang elegan, personal, dan mudah dibagikan.</p>
                    <div class="flex items-center gap-3 mt-5">
                        <a href="#"
                            class="w-10 h-10 rounded-berry bg-white/10 flex items-center justify-center hover:bg-primary-600 transition-colors"
                            aria-label="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-instagram" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-berry bg-white/10 flex items-center justify-center hover:bg-primary-600 transition-colors"
                            aria-label="Facebook">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-facebook" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-berry bg-white/10 flex items-center justify-center hover:bg-primary-600 transition-colors"
                            aria-label="Twitter">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-tiktok" viewBox="0 0 16 16">
                                <path
                                    d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="text-white font-semibold text-sm mb-4">Kategori</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="#"
                                class="hover:text-primary-400 transition-colors block py-1">Pernikahan</a>
                        </li>
                        <li><a href="#" class="hover:text-primary-400 transition-colors block py-1">Khitanan</a>
                        </li>
                        <li><a href="#" class="hover:text-primary-400 transition-colors block py-1">Ulang
                                Tahun</a></li>
                        <li><a href="#" class="hover:text-primary-400 transition-colors block py-1">Wisuda</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold text-sm mb-4">Kontak</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li class="flex items-center gap-2">
                            <i data-lucide="phone" class="w-4 h-4 text-primary-400 flex-shrink-0"></i>
                            <span class="break-all">+62 899-837-5434</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i data-lucide="mail" class="w-4 h-4 text-primary-400 flex-shrink-0"></i>
                            <span class="break-all">dhika.ramadhan.2025@gmail.com</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i data-lucide="map-pin" class="w-4 h-4 text-primary-400 mt-0.5 flex-shrink-0"></i>
                            <span>Sukabumi, Indonesia</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div
                class="border-t border-white/10 mt-10 pt-6 flex flex-col sm:flex-row items-center justify-between gap-3 text-center">
                <p class="text-xs">&copy; 2026 Dhika Ramadhan | Imora Invitation ID. All rights reserved.</p>
                <p class="text-xs">Made with <span class="text-primary-400">&hearts;</span> for your special moments
                </p>
            </div>
        </div>
    </footer>

    <!-- ========== GLOBAL SCRIPTS ========== -->
    <script>
        // ===== Lucide Icons =====
        lucide.createIcons();

        // ===== Mobile Menu =====
        const mobileToggle = document.getElementById('mobileToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileToggle && mobileMenu) {
            mobileToggle.addEventListener('click', () => {
                const isHidden = mobileMenu.classList.contains('hidden');
                mobileMenu.classList.toggle('hidden');
                // Update icon
                const icon = mobileToggle.querySelector('i');
                if (icon) {
                    icon.setAttribute('data-lucide', isHidden ? 'x' : 'menu');
                    lucide.createIcons();
                }
            });
            // Close on nav link click
            mobileMenu.querySelectorAll('.mobile-nav-link').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                    const icon = mobileToggle.querySelector('i');
                    if (icon) {
                        icon.setAttribute('data-lucide', 'menu');
                        lucide.createIcons();
                    }
                });
            });
            // Close on outside click
            document.addEventListener('click', (e) => {
                if (!mobileToggle.contains(e.target) && !mobileMenu.contains(e.target)) {
                    mobileMenu.classList.add('hidden');
                    const icon = mobileToggle.querySelector('i');
                    if (icon) {
                        icon.setAttribute('data-lucide', 'menu');
                        lucide.createIcons();
                    }
                }
            });
        }

        // ===== Navbar Shadow =====
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('shadow-card', window.scrollY > 50);
        }, {
            passive: true
        });

        // ===== Scroll Reveal =====
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.08,
            rootMargin: '0px 0px -30px 0px'
        });

        document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

        // ===== Katalog Data =====
        const catalogData = [{
                nama: 'Platinum Lite (Standard)',
                kategori: 'pernikahan',
                harga: 189000,
                hargaStr: 'Rp 120.000',
                deskripsi: 'Desain bunga klasik dengan sentuhan modern yang elegan untuk pernikahan impianmu.',
                fitur: 8,
                populer: true,
                seed: 'inv-platinum-lite'
            },
            {
                nama: 'Serene Glow (Standard)',
                kategori: 'pernikahan',
                harga: 120000,
                hargaStr: 'Rp 120.000',
                deskripsi: 'Nuansa mewah dengan warna warm yang memukau untuk hari bahagiamu.',
                fitur: 12,
                populer: true,
                seed: 'inv-serene-glow'
            },
            {
                nama: 'Aura Silver (Standard)',
                kategori: 'pernikahan',
                harga: 120000,
                hargaStr: 'Rp 120.000',
                deskripsi: 'Clean dan minimalis, sempurna untuk pasangan yang menyukai kesederhanaan.',
                fitur: 6,
                populer: true,
                seed: 'inv-aura-silver'
            },
            {
                nama: 'Serenity Luxe (Standard)',
                kategori: 'pernikahan',
                harga: 130000,
                hargaStr: 'Rp 130.000',
                deskripsi: 'Kemewahan ala kerajaan dengan aksen dan detail yang sangat premium.',
                fitur: 15,
                populer: true,
                seed: 'inv-serenity-luxe'
            },
            {
                nama: 'Platinum Minimal (Basic)',
                kategori: 'pernikahan',
                harga: 100000,
                hargaStr: 'Rp 100.000',
                deskripsi: 'Kemewahan ala kerajaan dengan aksen dan detail yang sangat premium.',
                fitur: 15,
                populer: true,
                seed: 'inv-platinum-minimal'
            },
            {
                nama: 'Stellar Grace (Basic)',
                kategori: 'pernikahan',
                harga: 100000,
                hargaStr: 'Rp 100.000',
                deskripsi: 'Kemewahan ala kerajaan dengan aksen dan detail yang sangat premium.',
                fitur: 15,
                populer: true,
                seed: 'inv-stellar-grace'
            },
            {
                nama: 'Core Series (Basic)',
                kategori: 'pernikahan',
                harga: 100000,
                hargaStr: 'Rp 100.000',
                deskripsi: 'Kemewahan ala kerajaan dengan aksen dan detail yang sangat premium.',
                fitur: 15,
                populer: true,
                seed: 'inv-core-series'
            },
            {
                nama: 'Moderna Lite (Basic)',
                kategori: 'pernikahan',
                harga: 100000,
                hargaStr: 'Rp 100.000',
                deskripsi: 'Kemewahan ala kerajaan dengan aksen dan detail yang sangat premium.',
                fitur: 15,
                populer: true,
                seed: 'inv-moderna-lite'
            },
            // {
            //     nama: 'Aqiqah Ceria',
            //     kategori: 'khitanan',
            //     harga: 59000,
            //     hargaStr: 'Rp 59.000',
            //     deskripsi: 'Desain ceria dan penuh warna untuk momen khitanan buah hati.',
            //     fitur: 5,
            //     populer: false,
            //     seed: 'inv-aqiqah-ceria'
            // },
            // {
            //     nama: 'Taqwa Kids',
            //     kategori: 'khitanan',
            //     harga: 59000,
            //     hargaStr: 'Rp 59.000',
            //     deskripsi: 'Tema islami modern dengan nuansa hijau dan emas yang anggun.',
            //     fitur: 7,
            //     populer: false,
            //     seed: 'inv-taqwa-kids'
            // },
            // {
            //     nama: 'Sweet Seventeen',
            //     kategori: 'ulang_tahun',
            //     harga: 59000,
            //     hargaStr: 'Rp 59.000',
            //     deskripsi: 'Desain glamor untuk merayakan ulang tahun ke-17 yang spesial.',
            //     fitur: 6,
            //     populer: false,
            //     seed: 'inv-sweet-seventeen'
            // },
            // {
            //     nama: 'Birthday Joy',
            //     kategori: 'ulang_tahun',
            //     harga: 59000,
            //     hargaStr: 'Rp 59.000',
            //     deskripsi: 'Undangan ulang tahun yang fun dan colorful untuk segala usia.',
            //     fitur: 5,
            //     populer: false,
            //     seed: 'inv-birthday-joy'
            // },
            // {
            //     nama: 'Graduation Day',
            //     kategori: 'wisuda',
            //     harga: 75000,
            //     hargaStr: 'Rp 75.000',
            //     deskripsi: 'Rayakan pencapaian akademikmu dengan undangan wisuda yang profesional.',
            //     fitur: 6,
            //     populer: false,
            //     seed: 'inv-graduation-day'
            // },
            // {
            //     nama: 'Sarjana Muda',
            //     kategori: 'wisuda',
            //     harga: 75000,
            //     hargaStr: 'Rp 75.000',
            //     deskripsi: 'Template elegan dengan detail toga dan tema akademik yang kental.',
            //     fitur: 8,
            //     populer: false,
            //     seed: 'inv-sarjana-muda'
            // },
            // {
            //     nama: 'Bloom Season',
            //     kategori: 'pernikahan',
            //     harga: 125000,
            //     hargaStr: 'Rp 120.000',
            //     deskripsi: 'Tema bunga musim semi dengan palet pastel yang lembut dan romantis.',
            //     fitur: 9,
            //     populer: false,
            //     seed: 'inv-bloom-season'
            // },
            // {
            //     nama: 'Dark Elegance',
            //     kategori: 'pernikahan',
            //     harga: 120000,
            //     hargaStr: 'Rp 120.000',
            //     deskripsi: 'Nuansa gelap misterius dengan aksen emas untuk pernikahan eksklusif.',
            //     fitur: 11,
            //     populer: false,
            //     seed: 'inv-dark-elegance'
            // },
        ];

        let activeCategory = 'semua';

        function createCardHTML(item) {
            const imgUrl = `/img/template/${item.seed}.png`;
            const kategoriLabel = item.kategori.replace('_', ' ');
            return `
                <div class="bg-white rounded-berry-lg shadow-card card-lift overflow-hidden h-full flex flex-col">
                    <div class="relative aspect-[3/4] overflow-hidden">
                        <img src="${imgUrl}" alt="${item.nama}"
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                             loading="lazy"
                             onerror="this.src='https://picsum.photos/seed/${item.seed}/400/530.jpg'">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="absolute top-3 left-3 flex flex-col gap-1.5">
                            ${item.populer ? `<span class="inline-flex items-center gap-1 px-2 py-0.5 bg-amber-400/90 backdrop-blur-sm text-amber-900 text-[10px] font-bold rounded-full uppercase tracking-wider"><i data-lucide="star" class="w-2.5 h-2.5 fill-current"></i> Populer</span>` : ''}
                            <span class="inline-flex items-center px-2 py-0.5 bg-primary-600/90 backdrop-blur-sm text-white text-[10px] font-bold rounded-full uppercase tracking-wider">${kategoriLabel}</span>
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <span class="inline-flex items-center gap-2 px-4 py-2.5 bg-white/95 backdrop-blur-sm text-primary-700 text-sm font-semibold rounded-berry shadow-berry-md transform translate-y-3 group-hover:translate-y-0 transition-transform duration-300">
                                <i data-lucide="eye" class="w-4 h-4"></i>Lihat Detail
                            </span>
                        </div>
                    </div>
                    <div class="p-3 sm:p-4 flex-1 flex flex-col">
                        <h3 class="font-bold text-berry-dark text-[14px] sm:text-[15px] leading-tight group-hover:text-primary-600 transition-colors">${item.nama}</h3>
                        <p class="text-berry-muted text-xs mt-1 line-clamp-2 leading-relaxed flex-1">${item.deskripsi}</p>
                        <div class="flex items-center gap-1.5 mt-2 sm:mt-3 text-xs text-berry-muted">
                            <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-green-500 flex-shrink-0"></i>
                            <span>${item.fitur} fitur</span>
                        </div>
                        <div class="flex items-center justify-between mt-2 sm:mt-3 pt-2 sm:pt-3 border-t border-berry-border">
                            <p class="text-primary-600 font-bold text-sm sm:text-base">${item.hargaStr}</p>
                            <i data-lucide="arrow-right" class="w-4 h-4 text-berry-muted group-hover:text-primary-600 group-hover:translate-x-1 transition-all flex-shrink-0"></i>
                        </div>
                    </div>
                </div>
            `;
        }

        function updateCatalogCount(count) {
            const el = document.getElementById('catalogCount');
            if (el) el.textContent = `Menampilkan ${count} template`;
        }

        function renderCatalog(cat) {
            const grid = document.getElementById('catalogGrid');
            if (!grid) return;

            const filtered = cat === 'semua' ? catalogData : catalogData.filter(i => i.kategori === cat);

            if (filtered.length === 0) {
                grid.innerHTML = `
                    <div class="col-span-full text-center py-16">
                        <div class="w-16 h-16 bg-berry-bg rounded-full flex items-center justify-center mx-auto mb-4">
                            <i data-lucide="search-x" class="w-7 h-7 text-berry-muted"></i>
                        </div>
                        <h3 class="text-base font-bold text-berry-dark mb-2">Template Tidak Ditemukan</h3>
                        <p class="text-berry-muted text-sm">Coba ubah filter kategori.</p>
                    </div>`;
                lucide.createIcons();
                updateCatalogCount(0);
                return;
            }

            grid.innerHTML = '';
            filtered.forEach((item, i) => {
                const delay = (i % 4) + 1;
                const wrapper = document.createElement('a');
                wrapper.href = '#';
                wrapper.className = `group reveal reveal-delay-${delay}`;
                wrapper.innerHTML = createCardHTML(item);
                grid.appendChild(wrapper);
            });

            lucide.createIcons();
            updateCatalogCount(filtered.length);
            grid.querySelectorAll('.reveal').forEach(el => el.classList.add('animate-in'));
        }

        function getCategoryCounts() {
            const counts = {
                semua: catalogData.length
            };
            catalogData.forEach(item => {
                counts[item.kategori] = (counts[item.kategori] || 0) + 1;
            });
            return counts;
        }

        function updateFilterCounts() {
            const counts = getCategoryCounts();
            document.querySelectorAll('.cat-btn').forEach(btn => {
                const cat = btn.dataset.cat;
                const countEl = btn.querySelector('.cat-count');
                if (countEl && counts[cat] !== undefined) countEl.textContent = counts[cat];
            });
        }

        // Category filter
        document.querySelectorAll('.cat-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                activeCategory = this.dataset.cat;
                document.querySelectorAll('.cat-btn').forEach(b => {
                    b.className =
                        'cat-btn inline-flex items-center gap-1.5 px-3 sm:px-4 py-2 rounded-xl text-sm font-medium transition-all bg-gray-100 text-gray-600 hover:bg-primary-50 hover:text-primary-600 whitespace-nowrap';
                });
                this.className =
                    'cat-btn inline-flex items-center gap-1.5 px-3 sm:px-4 py-2 rounded-xl text-sm font-medium transition-all bg-primary-600 text-white shadow-md shadow-primary-500/20 whitespace-nowrap';
                renderCatalog(activeCategory);
            });
        });

        // Sort
        document.getElementById('sortSelect')?.addEventListener('change', function() {
            const val = this.value;
            const sorted = [...catalogData];
            if (val === 'terbaru') sorted.sort((a, b) => b.harga - a.harga);
            else if (val === 'termurah') sorted.sort((a, b) => a.harga - b.harga);
            else if (val === 'termahal') sorted.sort((a, b) => b.harga - a.harga);
            else if (val === 'populer') sorted.sort((a, b) => (b.populer ? 1 : 0) - (a.populer ? 1 : 0));
            const backup = [...catalogData];
            catalogData.length = 0;
            catalogData.push(...sorted);
            renderCatalog(activeCategory);
            catalogData.length = 0;
            catalogData.push(...backup);
        });

        if (document.getElementById('catalogGrid')) {
            updateFilterCounts();
            renderCatalog('semua');
        }
    </script>

    @stack('scripts')
</body>

</html>
