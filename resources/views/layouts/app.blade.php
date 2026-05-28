<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>@yield('title', 'Katalog Undangan Digital | Imora')</title>

    {{-- SEO Meta --}}
    <meta name="description"
        content="Imora — Katalog undangan digital elegan & modern. Harga mulai Rp 59.000, tersedia paket selamanya. Pengerjaan cepat 1-2 hari.">
    <meta name="keywords"
        content="undangan digital, undangan pernikahan online, undangan nikah digital, template undangan, undangan khitanan, Imora">
    <meta name="author" content="Imora ID">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon-180.png') }}">
    <meta name="theme-color" content="#4f46e5">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'Katalog Undangan Digital | Imora')">
    <meta property="og:description"
        content="Undangan digital elegan & modern. Mulai Rp 59.000, siap dalam 1-2 hari kerja.">
    <meta property="og:image" content="{{ asset('img/og-image.jpg') }}">
    <meta property="og:locale" content="id_ID">
    <meta property="og:site_name" content="Imora ID">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Katalog Undangan Digital | Imora')">
    <meta name="twitter:description"
        content="Undangan digital elegan & modern. Mulai Rp 59.000, siap dalam 1-2 hari kerja.">
    <meta name="twitter:image" content="{{ asset('img/og-image.jpg') }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,700&display=swap"
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

    <script src="https://unpkg.com/lucide@0.383.0/dist/umd/lucide.js"></script>

    <style>
        input,
        select,
        textarea {
            font-size: 16px !important;
        }

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

        .card-lift {
            transition: transform .3s ease, box-shadow .3s ease
        }

        .card-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(94, 102, 241, .15)
        }

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

        .scrollbar-hide::-webkit-scrollbar {
            display: none
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none
        }

        .pb-safe {
            padding-bottom: env(safe-area-inset-bottom, 0px)
        }

        .pt-safe {
            padding-top: env(safe-area-inset-top, 0px)
        }

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

        #stickyNav {
            top: 64px;
        }

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

        /* Skeleton Loading */
        .skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
        }

        @keyframes shimmer {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: -200% 0;
            }
        }

        .img-wrapper {
            position: relative;
        }

        .img-skeleton {
            position: absolute;
            inset: 0;
            border-radius: 0;
            transition: opacity 0.3s ease;
        }

        .img-wrapper img.loaded+.img-skeleton,
        .img-wrapper img.error+.img-skeleton {
            opacity: 0;
            pointer-events: none;
        }

        #floatingWA {
            transform: translateY(0);
            opacity: 1;
            transition: transform .3s ease, opacity .3s ease, background .2s ease, box-shadow .2s ease;
        }

        #floatingWA.hide {
            transform: translateY(80px);
            opacity: 0;
            pointer-events: none;
        }

        #waToast {
            transition: transform .35s cubic-bezier(.34, 1.56, .64, 1), opacity .35s ease;
            transform: translateY(-16px);
            opacity: 0;
            pointer-events: none;
        }

        #waToast.show {
            transform: translateY(0);
            opacity: 1;
        }

        #scrollTop {
            opacity: 0;
            transform: translateY(12px);
            pointer-events: none;
            transition: opacity .3s ease, transform .3s ease;
        }

        #scrollTop.visible {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }
    </style>
</head>

<body class="bg-berry-bg text-gray-800 font-sans antialiased">

    <!-- WA Toast -->
    <div id="waToast"
        class="fixed top-20 left-4 right-4 z-[999] flex items-center gap-2.5 px-4 py-3 bg-green-600 text-white text-sm font-medium rounded-2xl shadow-xl mx-auto w-fit max-w-[calc(100%-2rem)]"
        role="alert" aria-live="polite">
        <svg class="w-4 h-4 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor">
            <path
                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
            <path
                d="M12 0C5.373 0 0 5.373 0 12c0 2.625.846 5.059 2.284 7.034L.789 23.492a.5.5 0 00.611.611l4.458-1.495A11.938 11.938 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-2.379 0-4.575-.832-6.298-2.218l-.44-.355-3.27 1.096 1.096-3.27-.355-.44A9.935 9.935 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z" />
        </svg>
        <span>Membuka WhatsApp...</span>
    </div>

    <!-- ========== NAVBAR ========== -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-xl border-b border-berry-border transition-all duration-300"
        id="navbar" style="padding-top: env(safe-area-inset-top, 0px);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="{{ route('katalog.index') }}" class="flex items-center gap-2.5 group flex-shrink-0">
                    {{-- <div
                        class="w-9 h-9 bg-gradient-to-br from-primary-500 to-primary-700 rounded-berry flex items-center justify-center shadow-berry transition-transform duration-300 group-hover:scale-105">
                        <span class="text-white font-bold text-sm">

                    </div> --}}
                    <span class="text-xl font-bold tracking-tight text-berry-dark">Imora ID</span>
                </a>
                <div class="hidden md:flex items-center gap-1">
                    <a href="{{ route('katalog.index') }}#katalog"
                        class="px-4 py-2 rounded-berry text-sm font-medium text-gray-600 hover:text-primary-600 hover:bg-primary-50 transition-colors">Katalog</a>
                    <a href="{{ route('katalog.index') }}#populer"
                        class="px-4 py-2 rounded-berry text-sm font-medium text-gray-600 hover:text-primary-600 hover:bg-primary-50 transition-colors">Populer</a>
                    <a href="{{ route('katalog.index') }}#harga"
                        class="px-4 py-2 rounded-berry text-sm font-medium text-gray-600 hover:text-primary-600 hover:bg-primary-50 transition-colors">Harga</a>
                    <a href="{{ route('katalog.index') }}#tentang"
                        class="px-4 py-2 rounded-berry text-sm font-medium text-gray-600 hover:text-primary-600 hover:bg-primary-50 transition-colors">Tentang</a>
                    <a href="{{ route('portofolio.index') }}"
                        class="px-4 py-2 rounded-berry text-sm font-medium text-gray-600 hover:text-primary-600 hover:bg-primary-50 transition-colors">Portofolio</a>
                </div>
                <div class="flex items-center gap-2 sm:gap-3">
                    <a href="https://wa.me/628998375434" target="_blank"
                        class="hidden sm:inline-flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-primary-600 to-primary-500 text-white text-sm font-semibold rounded-berry shadow-berry hover:shadow-berry-md hover:from-primary-700 hover:to-primary-600 transition-all duration-300">
                        <i data-lucide="message-circle" class="w-4 h-4"></i>Hubungi Kami
                    </a>
                    <a href="https://wa.me/628998375434" target="_blank"
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
        <div id="mobileMenu" class="md:hidden hidden border-t border-berry-border bg-white"
            style="padding-bottom: env(safe-area-inset-bottom, 0px);">
            <div class="px-4 py-3 space-y-1">
                <a href="{{ route('katalog.index') }}#katalog"
                    class="block px-4 py-3 rounded-berry text-sm font-medium text-primary-600 bg-primary-50 mobile-nav-link">Katalog</a>
                <a href="{{ route('katalog.index') }}#populer"
                    class="block px-4 py-3 rounded-berry text-sm font-medium text-gray-600 hover:bg-berry-bg transition-colors mobile-nav-link">Populer</a>
                <a href="{{ route('katalog.index') }}#tentang"
                    class="block px-4 py-3 rounded-berry text-sm font-medium text-gray-600 hover:bg-berry-bg transition-colors mobile-nav-link">Tentang</a>
                <a href="https://wa.me/628998375434" target="_blank"
                    class="block px-4 py-3 rounded-berry text-sm font-semibold text-white bg-primary-600 text-center mt-2">Hubungi
                    Kami</a>
                <a href="{{ route('katalog.index') }}#harga"
                    class="block px-4 py-3 rounded-berry text-sm font-medium text-gray-600 hover:bg-berry-bg transition-colors mobile-nav-link">Harga
                </a>
                <a href="{{ route('portofolio.index') }}"
                    class="block px-4 py-3 rounded-berry text-sm font-medium text-gray-600 hover:bg-berry-bg transition-colors mobile-nav-link">Portofolio
                </a>
            </div>
        </div>
    </nav>

    <!-- ========== MAIN CONTENT ========== -->
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
                        {{-- <div
                            class="w-9 h-9 bg-gradient-to-br from-primary-500 to-primary-700 rounded-berry flex items-center justify-center">
                            <span class="text-white font-bold text-sm">I</span>
                        </div> --}}
                        <span class="text-xl font-bold text-white tracking-tight">Imora</span>
                    </div>
                    <p class="text-sm leading-relaxed max-w-sm">Membuat momen spesialmu menjadi tak terlupakan melalui
                        undangan digital yang elegan, personal, dan mudah dibagikan.</p>
                    <div class="flex items-center gap-3 mt-5">
                        <a href="https://www.instagram.com/imora_id"
                            class="w-10 h-10 rounded-berry bg-white/10 flex items-center justify-center hover:bg-primary-600 transition-colors"
                            aria-label="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                            </svg>
                        </a>
                        {{-- <a href="#"
                            class="w-10 h-10 rounded-berry bg-white/10 flex items-center justify-center hover:bg-primary-600 transition-colors"
                            aria-label="Facebook">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                            </svg>
                        </a> --}}
                        <a href="https://www.tiktok.com/@dhikara_invitation"
                            class="w-10 h-10 rounded-berry bg-white/10 flex items-center justify-center hover:bg-primary-600 transition-colors"
                            aria-label="Twitter">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16">
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
                                class="hover:text-primary-400 transition-colors block py-1">Pernikahan</a></li>
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
        lucide.createIcons();

        const mobileToggle = document.getElementById('mobileToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileToggle && mobileMenu) {
            mobileToggle.addEventListener('click', () => {
                const isHidden = mobileMenu.classList.contains('hidden');
                mobileMenu.classList.toggle('hidden');
                const icon = mobileToggle.querySelector('i');
                if (icon) {
                    icon.setAttribute('data-lucide', isHidden ? 'x' : 'menu');
                    lucide.createIcons();
                }
            });
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

        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('shadow-card', window.scrollY > 50);
        }, {
            passive: true
        });

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
    </script>

    <script>
        const floatingWA = document.getElementById('floatingWA');
        const footer = document.querySelector('footer');
        if (floatingWA && footer) {
            const waObserver = new IntersectionObserver(([entry]) => {
                floatingWA.classList.toggle('hide', entry.isIntersecting);
            }, {
                threshold: 0.1
            });
            waObserver.observe(footer);
        }
    </script>

    <script>
        function showWAToast() {
            const toast = document.getElementById('waToast');
            if (!toast) return;
            toast.classList.add('show');
            setTimeout(() => toast.classList.remove('show'), 2500);
        }
        document.querySelectorAll('a[href*="wa.me"]').forEach(link => {
            link.addEventListener('click', showWAToast);
        });

        const scrollTopBtn = document.getElementById('scrollTop');
        if (scrollTopBtn) {
            window.addEventListener('scroll', () => {
                scrollTopBtn.classList.toggle('visible', window.scrollY > 400);
            }, {
                passive: true
            });
        }
    </script>

    @stack('scripts') {{-- HARUS di luar @verbatim --}}

    <!-- Scroll to Top -->
    <button id="scrollTop" onclick="window.scrollTo({top:0,behavior:'smooth'})"
        class="fixed bottom-24 right-4 sm:right-6 z-40 w-11 h-11 bg-white border border-gray-200 text-gray-500 rounded-xl shadow-md hover:bg-primary-50 hover:text-primary-600 hover:border-primary-200 transition-all duration-300 flex items-center justify-center"
        aria-label="Scroll ke atas">
        <i data-lucide="chevron-up" class="w-5 h-5"></i>
    </button>

    <!-- Floating WhatsApp Button -->
    <a href="https://api.whatsapp.com/send?phone=628998375434&text=Halo%20Imora%2C%20saya%20tertarik%20dengan%20template%20undangan%20digital"
        target="_blank" id="floatingWA"
        class="fixed bottom-6 right-4 sm:right-6 z-50 flex items-center gap-2.5 px-4 py-3 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 group"
        style="padding-bottom: calc(0.75rem + env(safe-area-inset-bottom, 0px))">
        <svg class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor">
            <path
                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
            <path
                d="M12 0C5.373 0 0 5.373 0 12c0 2.625.846 5.059 2.284 7.034L.789 23.492a.5.5 0 00.611.611l4.458-1.495A11.938 11.938 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-2.379 0-4.575-.832-6.298-2.218l-.44-.355-3.27 1.096 1.096-3.27-.355-.44A9.935 9.935 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z" />
        </svg>
        <span class="text-sm hidden sm:inline">Pesan Sekarang</span>
        <span class="absolute -top-1.5 -right-1.5 w-3 h-3 bg-red-500 rounded-full animate-ping"></span>
        <span class="absolute -top-1.5 -right-1.5 w-3 h-3 bg-red-500 rounded-full"></span>
    </a>

</body>

</html>
