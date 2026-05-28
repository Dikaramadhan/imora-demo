<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tidak Ditemukan | Imora</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eef0ff',
                            100: '#e0e3ff',
                            500: '#5e66f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                            900: '#312e81',
                        }
                    },
                    fontFamily: {
                        sans: ['"DM Sans"', 'system-ui', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
</head>

<body class="bg-gray-50 font-sans antialiased min-h-screen flex items-center justify-center px-4">
    <div class="text-center max-w-md mx-auto">

        {{-- Ilustrasi --}}
        <div class="relative inline-flex items-center justify-center w-32 h-32 mb-8">
            <div class="absolute inset-0 bg-primary-100 rounded-full animate-pulse"></div>
            <div
                class="relative w-20 h-20 bg-gradient-to-br from-primary-500 to-primary-700 rounded-2xl flex items-center justify-center shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>

        {{-- Teks --}}
        <h1 class="text-6xl font-bold text-primary-600 mb-2">404</h1>
        <h2 class="text-xl font-bold text-gray-900 mb-3">Halaman Tidak Ditemukan</h2>
        <p class="text-gray-500 text-sm leading-relaxed mb-8">
            Sepertinya undangan yang kamu cari sudah dipindah atau tidak tersedia.<br>
            Yuk kembali ke katalog dan temukan template impianmu!
        </p>

        {{-- Actions --}}
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="{{ url('/') }}"
                class="inline-flex items-center gap-2 px-6 py-3 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-colors shadow-md text-sm">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Kembali ke Katalog
            </a>
            <a href="https://wa.me/628998375434" target="_blank"
                class="inline-flex items-center gap-2 px-6 py-3 border-2 border-primary-200 text-primary-600 font-semibold rounded-xl hover:bg-primary-50 transition-colors text-sm">
                Hubungi Kami
            </a>
        </div>

        <p class="text-xs text-gray-400 mt-8">&copy; {{ date('Y') }} Imora ID</p>
    </div>
</body>

</html>
