@extends('layouts.app')

@section('title', 'Katalog Undangan Digital | Imora')

@section('content')

    <main>
        <!-- ===== 1. HERO COMPACT ===== -->
        <section
            class="relative overflow-hidden bg-gradient-to-br from-primary-900 via-primary-700 to-primary-800 text-white py-12 md:py-20">
            <div class="absolute inset-0 pointer-events-none overflow-hidden">
                <div class="absolute -top-24 -right-24 w-64 h-64 sm:w-80 sm:h-80 bg-primary-500/20 rounded-full blur-3xl">
                </div>
                <div class="absolute -bottom-24 -left-24 w-64 h-64 sm:w-80 sm:h-80 bg-primary-400/15 rounded-full blur-3xl">
                </div>
            </div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-center">
                    <div class="lg:col-span-7">
                        <h1 class="text-2xl sm:text-3xl lg:text-5xl font-bold leading-tight mb-3 sm:mb-4">
                            Katalog Undangan Digital
                            <span class="text-primary-200">Elegan & Modern</span>
                        </h1>
                        <p class="text-base sm:text-lg text-primary-100/70 max-w-lg mb-6 sm:mb-8">
                            Tersedia beberapa template yang siap pakai. Personal, interaktif, mudah dibagikan.
                        </p>

                        {{-- Search bar --}}
                        <div class="relative max-w-xl mb-6 sm:mb-8">
                            <i data-lucide="search"
                                class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 w-4 h-4 sm:w-5 sm:h-5 text-primary-300 pointer-events-none"></i>
                            <input type="text" id="heroSearch" placeholder="Cari template..." autocomplete="off"
                                class="w-full pl-10 sm:pl-12 pr-24 sm:pr-32 py-3.5 sm:py-4 bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl text-white placeholder:text-primary-200/50 focus:outline-none focus:ring-2 focus:ring-white/30 focus:bg-white/15 transition-all text-base">
                            <a href="#katalog"
                                class="absolute right-1.5 sm:right-2 top-1/2 -translate-y-1/2 inline-flex items-center gap-1 px-3 sm:px-5 py-2 sm:py-2.5 bg-white text-primary-700 font-semibold rounded-xl hover:bg-primary-50 transition-all text-sm">
                                Cari
                            </a>
                        </div>

                        {{-- Stats --}}
                        <div class="flex items-center gap-4 sm:gap-6 text-sm flex-wrap">
                            <div class="flex items-center gap-1.5 sm:gap-2">
                                <span class="text-xl sm:text-2xl font-bold">20+</span>
                                <span class="text-primary-200/60 text-xs sm:text-sm">Pasangan</span>
                            </div>
                            <div class="w-px h-6 sm:h-8 bg-white/20"></div>
                            <div class="flex items-center gap-1.5 sm:gap-2">
                                <span class="text-xl sm:text-2xl font-bold">8+</span>
                                <span class="text-primary-200/60 text-xs sm:text-sm">Template</span>
                            </div>
                            <div class="w-px h-6 sm:h-8 bg-white/20"></div>
                            <div class="flex items-center gap-1.5 sm:gap-2">
                                <span class="text-xl sm:text-2xl font-bold">3</span>
                                <span class="text-primary-200/60 text-xs sm:text-sm">Paket</span>
                            </div>
                        </div>
                    </div>

                    {{-- Phone mockup – desktop only --}}
                    <div class="lg:col-span-5 hidden lg:flex items-center justify-center">
                        <div class="relative">
                            <div class="phone-mockup w-[200px] float-anim">
                                <div class="phone-screen"><img src="/img/mockup-4.png" alt="Mockup"></div>
                            </div>
                            <div class="absolute -bottom-8 -left-16 phone-mockup w-[170px] float-anim-delay">
                                <div class="phone-screen"><img src="/img/mockup-3.png" alt="Mockup"></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CTA Custom --}}
                <div class="mt-6 sm:mt-8 flex flex-wrap items-center gap-3">
                    <a href="{{ route('custom.order') }}"
                        class="inline-flex items-center gap-2 px-5 py-3 bg-white text-primary-700 font-semibold rounded-xl hover:bg-primary-50 transition-all text-sm shadow-md">
                        <i data-lucide="sparkles" class="w-4 h-4"></i>
                        Buat Undangan Custom
                    </a>
                    <span class="text-primary-200/50 text-xs">Desain bebas sesuai keinginanmu</span>
                </div>

            </div>
        </section>

        <!-- ===== 2. STICKY FILTER NAV ===== -->
        <div class="sticky top-[calc(4rem+env(safe-area-inset-top,0px))] z-40 bg-white/85 backdrop-blur-xl border-b border-gray-100 shadow-sm"
            id="stickyNav">
            <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
                <div class="flex items-center gap-3 py-2.5 overflow-x-auto scrollbar-hide">
                    <div class="flex items-center gap-2 flex-shrink-0 flex-nowrap overflow-x-auto scrollbar-hide pb-0.5"
                        id="categoryFilters" style="-webkit-overflow-scrolling: touch;">
                        <button data-cat="semua"
                            class="cat-btn inline-flex items-center gap-1.5 px-3 sm:px-4 py-2 rounded-xl text-sm font-medium transition-all bg-primary-600 text-white shadow-md shadow-primary-500/20 whitespace-nowrap">
                            Semua <span class="cat-count ml-1 text-xs opacity-70">12</span>
                        </button>
                        <button data-cat="pernikahan"
                            class="cat-btn inline-flex items-center gap-1.5 px-3 sm:px-4 py-2 rounded-xl text-sm font-medium transition-all bg-gray-100 text-gray-600 hover:bg-primary-50 hover:text-primary-600 whitespace-nowrap">
                            Pernikahan <span class="cat-count ml-1 text-xs opacity-50">0</span>
                        </button>
                        <button data-cat="khitanan"
                            class="cat-btn inline-flex items-center gap-1.5 px-3 sm:px-4 py-2 rounded-xl text-sm font-medium transition-all bg-gray-100 text-gray-600 hover:bg-primary-50 hover:text-primary-600 whitespace-nowrap">
                            Khitanan <span class="cat-count ml-1 text-xs opacity-50">0</span>
                        </button>
                        <button data-cat="ulang_tahun"
                            class="cat-btn inline-flex items-center gap-1.5 px-3 sm:px-4 py-2 rounded-xl text-sm font-medium transition-all bg-gray-100 text-gray-600 hover:bg-primary-50 hover:text-primary-600 whitespace-nowrap">
                            Ulang Tahun <span class="cat-count ml-1 text-xs opacity-50">0</span>
                        </button>
                        <button data-cat="wisuda"
                            class="cat-btn inline-flex items-center gap-1.5 px-3 sm:px-4 py-2 rounded-xl text-sm font-medium transition-all bg-gray-100 text-gray-600 hover:bg-primary-50 hover:text-primary-600 whitespace-nowrap">
                            Wisuda <span class="cat-count ml-1 text-xs opacity-50">0</span>
                        </button>
                    </div>

                    {{-- Sort select --}}
                    <div class="relative flex-shrink-0 ml-auto">
                        <select id="sortSelect"
                            class="appearance-none pl-3 pr-8 py-2 bg-gray-100 border-0 rounded-xl text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-primary-500/30 cursor-pointer min-h-[36px]">
                            <option value="terbaru">Terbaru</option>
                            <option value="termurah">Termurah</option>
                            <option value="termahal">Termahal</option>
                            <option value="populer">Populer</option>
                        </select>
                        <i data-lucide="chevron-down"
                            class="absolute right-2.5 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-gray-400 pointer-events-none"></i>
                    </div>
                </div>
            </div>
        </div>


        <!-- ===== 3. POPULER ===== -->
        <section id="populer" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-4">
            <div class="flex items-center justify-between mb-5 sm:mb-6 reveal">
                <div class="flex items-center gap-2.5 sm:gap-3">
                    <div
                        class="w-9 h-9 sm:w-10 sm:h-10 bg-amber-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i data-lucide="flame" class="w-4 h-4 sm:w-5 sm:h-5 text-amber-600"></i>
                    </div>
                    <div>
                        <h2 class="text-lg sm:text-xl font-bold text-gray-900">Paling Banyak Dipesan</h2>
                        <p class="text-xs sm:text-sm text-gray-500">Template favorit minggu ini</p>
                    </div>
                </div>
                <a href="#katalog"
                    class="hidden sm:inline-flex items-center gap-1 text-sm font-medium text-primary-600 hover:text-primary-700 transition-colors flex-shrink-0">
                    Lihat semua <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 reveal" id="popularGrid"></div>

            <div class="mt-4 text-center sm:hidden">
                <a href="#katalog" class="inline-flex items-center gap-1 text-sm font-medium text-primary-600 py-2">
                    Lihat semua template <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>
        </section>


        <!-- ===== 4. SEMUA TEMPLATE ===== -->
        <section id="katalog" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">
            <div class="flex items-center justify-between mb-5 sm:mb-6 reveal">
                <div>
                    <h2 class="text-lg sm:text-xl font-bold text-gray-900">Semua Template</h2>
                    <p class="text-xs sm:text-sm text-gray-500 mt-0.5" id="catalogCount">Menampilkan 12 template</p>
                </div>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4" id="catalogGrid"></div>

            <div class="mt-8 sm:mt-10 flex items-center justify-center gap-2" id="catalogPagination"></div>
        </section>

        <!-- ===== PAKET & HARGA ===== -->
        <section id="harga" class="bg-gray-50 py-12 sm:py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8 sm:mb-10 reveal">
                    <div
                        class="inline-flex items-center gap-2 px-3 sm:px-4 py-1.5 bg-primary-50 text-primary-600 rounded-full text-xs sm:text-sm font-medium mb-3">
                        <i data-lucide="tag" class="w-3.5 h-3.5"></i> Paket & Harga
                    </div>
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Pilih Paket yang Sesuai</h2>
                    <p class="text-gray-500 mt-2 text-sm">Semua paket sudah termasuk link undangan siap kirim</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6 max-w-4xl mx-auto reveal">

                    {{-- Basic --}}
                    <div class="bg-white rounded-2xl border border-gray-200 p-6 flex flex-col">
                        <div class="mb-4">
                            <span
                                class="inline-flex items-center px-2.5 py-1 bg-gray-100 text-gray-600 text-xs font-semibold rounded-lg">BASIC</span>
                            <div class="mt-3 flex items-baseline gap-1">
                                <span class="text-3xl font-bold text-gray-900">Rp 59.000</span>
                            </div>
                            <p class="text-gray-500 text-sm mt-1">Untuk undangan simpel & berkelas</p>
                        </div>
                        <ul class="space-y-2.5 text-sm text-gray-600 flex-1 mb-6">
                            @foreach (['11 fitur undangan', '3x revisi gratis', 'Musik latar', 'RSVP online', 'Galeri foto', 'Support via WhatsApp', 'Aktif 3 bulan'] as $f)
                                <li class="flex items-center gap-2">
                                    <i data-lucide="check" class="w-4 h-4 text-green-500 flex-shrink-0"></i>
                                    {{ $f }}
                                </li>
                            @endforeach
                        </ul>
                        <a href="https://wa.me/628998375434?text=Halo%20Imora%2C%20saya%20tertarik%20Paket%20Basic"
                            target="_blank"
                            class="block text-center px-4 py-3 border-2 border-primary-600 text-primary-600 font-semibold rounded-xl hover:bg-primary-50 transition-colors text-sm">
                            Pilih Basic
                        </a>
                    </div>

                    {{-- Standard --}}
                    <div
                        class="bg-white rounded-2xl border-2 border-primary-500 p-6 flex flex-col relative shadow-lg shadow-primary-500/10">
                        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2">
                            <span
                                class="inline-flex items-center gap-1 px-3 py-1 bg-primary-600 text-white text-xs font-bold rounded-full">
                                <i data-lucide="star" class="w-3 h-3 fill-current"></i> PALING POPULER
                            </span>
                        </div>
                        <div class="mb-4">
                            <span
                                class="inline-flex items-center px-2.5 py-1 bg-primary-50 text-primary-600 text-xs font-semibold rounded-lg">STANDARD</span>
                            <div class="mt-3 flex items-baseline gap-1">
                                <span class="text-3xl font-bold text-gray-900">Rp 120.000</span>
                            </div>
                            <p class="text-gray-500 text-sm mt-1">Lengkap untuk momen tak terlupakan</p>
                        </div>
                        <ul class="space-y-2.5 text-sm text-gray-600 flex-1 mb-6">
                            @foreach (['18 fitur undangan', '5x revisi gratis', 'Musik latar pilihan', 'RSVP online', 'Galeri foto', 'Support via WhatsApp', 'Aktif 6 bulan'] as $f)
                                <li class="flex items-center gap-2">
                                    <i data-lucide="check" class="w-4 h-4 text-green-500 flex-shrink-0"></i>
                                    {{ $f }}
                                </li>
                            @endforeach
                        </ul>
                        <a href="https://wa.me/628998375434?text=Halo%20Imora%2C%20saya%20tertarik%20Paket%20Standard"
                            target="_blank"
                            class="block text-center px-4 py-3 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-colors text-sm shadow-md shadow-primary-500/30">
                            Pilih Standard
                        </a>
                    </div>

                    {{-- Premium --}}
                    <div class="bg-white rounded-2xl border border-gray-200 p-6 flex flex-col relative overflow-hidden">
                        {{-- Badge ribbon --}}
                        <div class="absolute top-3 right-3">
                            <span
                                class="inline-flex items-center gap-1 px-2.5 py-1 bg-amber-100 text-amber-700 text-xs font-bold rounded-lg">
                                <i data-lucide="infinity" class="w-3 h-3"></i> SELAMANYA
                            </span>
                        </div>
                        <div class="mb-4">
                            <span
                                class="inline-flex items-center px-2.5 py-1 bg-amber-50 text-amber-700 text-xs font-semibold rounded-lg">CUSTOM</span>
                            <div class="mt-3 flex items-baseline gap-1">
                                <span class="text-3xl font-bold text-gray-900">Rp 250.000</span>
                            </div>
                            <p class="text-gray-500 text-sm mt-1">Kenangan yang tak terbatas waktu</p>
                        </div>
                        <ul class="space-y-2.5 text-sm text-gray-600 flex-1 mb-6">
                            @foreach (['Custom font pilihan (10+ opsi)', 'Custom tata letak (3 variasi)', 'Unlimited revisi', 'Galeri foto & video', 'Countdown timer interaktif', 'Peta lokasi & Google Maps', 'Multi-acara (akad + resepsi)', 'QR Code tamu undangan', 'Manajemen RSVP lengkap', 'Guestbook digital', 'Musik latar pilihan sendiri', 'Priority support', 'Aktif selamanya*'] as $f)
                                <li class="flex items-center gap-2">
                                    <i data-lucide="check" class="w-4 h-4 text-green-500 flex-shrink-0"></i>
                                    {{ $f }}
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('custom.order') }}"
                            class="block text-center px-4 py-3 bg-amber-500 hover:bg-amber-600 text-white font-semibold rounded-xl transition-colors text-sm shadow-md shadow-amber-500/30">
                            Buat Undangan Custom
                        </a>
                        <p class="text-[10px] text-gray-400 text-center mt-2">*Selama domain imora.id aktif</p>
                    </div>

                </div>
            </div>
        </section>

        <!-- ===== 5. TESTIMONI ===== -->
        <section class="bg-gray-50 py-12 sm:py-16 overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8 sm:mb-10 reveal">
                    <div
                        class="inline-flex items-center gap-2 px-3 sm:px-4 py-1.5 bg-primary-50 text-primary-600 rounded-full text-xs sm:text-sm font-medium mb-3 sm:mb-4">
                        <i data-lucide="message-square-heart" class="w-3.5 h-3.5 sm:w-4 sm:h-4"></i>
                        Testimoni
                    </div>
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Apa Kata Mereka?</h2>
                    <p class="text-gray-500 mt-2 text-sm">Sudah dipercaya lebih dari 20 pasangan bahagia 💍</p>
                </div>

                {{-- Slider wrapper --}}
                <div class="relative reveal">
                    <div class="overflow-hidden" id="testiSlider">
                        <div class="flex transition-transform duration-500 ease-in-out" id="testiTrack">
                            @foreach ([
            [
                'initials' => 'ID',
                'color' => 'primary',
                'name' => 'ID11M26',
                'event' => 'Pernikahan • Maret 2026',
                'text' => '"Worthit, undangan bagus, puas sama hasilnya. Meskipun ga pake foto-foto tp tetep keliatan estetik. Intinya bagus, puas!"',
            ],
            [
                'initials' => 'ID',
                'color' => 'rose',
                'name' => 'ID16M26',
                'event' => 'Pernikahan • April 2026',
                'text' => '"Keren banget, aku sukaa dan banyak yang tanya buat nya dimana. KK nya fast respon banget, mau ganti ini itu pun bisa dan cepat perbaikannya. Pokonya suka parah!"',
            ],
            [
                'initials' => 'ID',
                'color' => 'green',
                'name' => 'ID20M26',
                'event' => 'Pernikahan • April 2026',
                'text' => '"Makasih ka Dika dari Imora.id, udah bantu bikin undangan digital yang bagus, elegan, dan sesuai banget sama yang aku mau. Banyak temen aku yang bilang undangannya bagus. Kakaknya ramah, prosesnya cepat dan hasilnya memuaskan!"',
            ],
            [
                'initials' => 'ID',
                'color' => 'amber',
                'name' => 'ID26M26',
                'event' => 'Pernikahan • April 2026',
                'text' => '"Undangan digitalnya sangat memuaskan dan bagus, terperinci dan detail buat desainnya. Kata per katanya baku dan mudah dipahami. Standar fotonya bagus ngga jadi burem. Best pokonya, hatur nuhun!"',
            ],
        ] as $t)
                                <div class="testi-slide w-full sm:w-1/2 lg:w-1/3 flex-shrink-0 px-2">
                                    <div
                                        class="bg-white rounded-2xl p-5 sm:p-6 shadow-sm border border-gray-100 h-full flex flex-col">
                                        <div class="flex items-center gap-1 mb-3">
                                            @for ($i = 0; $i < 5; $i++)
                                                <i data-lucide="star" class="w-3.5 h-3.5 text-amber-400 fill-current"></i>
                                            @endfor
                                        </div>
                                        <p class="text-gray-600 text-sm leading-relaxed flex-1 mb-4">{{ $t['text'] }}
                                        </p>
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-9 h-9 rounded-full bg-{{ $t['color'] }}-100 flex items-center justify-center text-{{ $t['color'] }}-600 font-bold text-xs flex-shrink-0">
                                                {{ $t['initials'] }}
                                            </div>
                                            <div>
                                                <p class="font-semibold text-sm text-gray-900">{{ $t['name'] }}</p>
                                                <p class="text-xs text-gray-400">{{ $t['event'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Prev / Next buttons --}}
                    <button id="testiPrev"
                        class="absolute -left-3 sm:-left-5 top-1/2 -translate-y-1/2 w-10 h-10 bg-white rounded-full shadow-md border border-gray-100 flex items-center justify-center text-gray-500 hover:text-primary-600 hover:border-primary-200 transition-all z-10">
                        <i data-lucide="chevron-left" class="w-5 h-5"></i>
                    </button>
                    <button id="testiNext"
                        class="absolute -right-3 sm:-right-5 top-1/2 -translate-y-1/2 w-10 h-10 bg-white rounded-full shadow-md border border-gray-100 flex items-center justify-center text-gray-500 hover:text-primary-600 hover:border-primary-200 transition-all z-10">
                        <i data-lucide="chevron-right" class="w-5 h-5"></i>
                    </button>
                </div>

                {{-- Dots --}}
                <div class="flex items-center justify-center gap-2 mt-6" id="testiDots"></div>
            </div>
        </section>

        <!-- ===== 6. KENAPA IMORA + FAQ ===== -->
        <section id="tentang" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 sm:gap-12">
                {{-- Kenapa Imora --}}
                <div class="reveal">
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-5 sm:mb-6">Kenapa Memilih Imora?</h2>
                    <div class="grid grid-cols-2 gap-3 sm:gap-4">
                        @foreach ([['icon' => 'palette', 'bg' => 'primary', 'label' => 'Desain Premium', 'sub' => 'Dirancang dengan tampilan elegan & modern'], ['icon' => 'smartphone', 'bg' => 'green', 'label' => 'Responsive', 'sub' => 'Nyaman dibuka di HP maupun laptop'], ['icon' => 'zap', 'bg' => 'amber', 'label' => 'Pengerjaan Cepat', 'sub' => 'Undangan siap dalam 1–2 hari kerja'], ['icon' => 'headphones', 'bg' => 'rose', 'label' => 'Support Aktif', 'sub' => 'Kami selalu siap membantu via WhatsApp']] as $f)
                            <div class="bg-gray-50 rounded-xl p-3 sm:p-4">
                                <div
                                    class="w-9 h-9 sm:w-10 sm:h-10 bg-{{ $f['bg'] }}-100 rounded-lg flex items-center justify-center mb-2 sm:mb-3">
                                    <i data-lucide="{{ $f['icon'] }}"
                                        class="w-4 h-4 sm:w-5 sm:h-5 text-{{ $f['bg'] }}-600"></i>
                                </div>
                                <h4 class="font-semibold text-xs sm:text-sm text-gray-900">{{ $f['label'] }}</h4>
                                <p class="text-xs text-gray-500 mt-0.5">{{ $f['sub'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- FAQ --}}
                <div class="reveal">
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-5 sm:mb-6">Pertanyaan Umum</h2>
                    <div class="space-y-2.5" id="faqContainer">
                        @foreach ([
            [
                'q' => 'Berapa lama proses pengerjaannya?',
                'a' => 'Setelah data lengkap diterima, undangan langsung kami kerjakan dan siap dalam 1–2 hari kerja. Revisi minor biasanya selesai dalam 2–3 jam.',
            ],
            [
                'q' => 'Sampai kapan link undangan bisa diakses?',
                'a' => 'Masa aktif link undangan tergantung paket yang dipilih — Paket Basic 3 Bulan, Standard 6 Bulan & Premium Selamanya. Perpanjangan masa aktif tersedia dengan biaya tambahan.',
            ],
            [
                'q' => 'Berapa kali boleh revisi?',
                'a' => 'Jumlah revisi gratis tergantung paket: Basic 3x, Standard 5x. Revisi tambahan di luar ketentuan dapat dikenakan biaya.',
            ],
            [
                'q' => 'Bagaimana cara pesannya?',
                'a' => 'Pilih template → Chat via WhatsApp → Kirim data → Bayar → Undangan jadi. Semudah itu!',
            ],
            [
                'q' => 'Paket apa saja yang tersedia?',
                'a' => 'Tersedia 3 paket: Basic (Rp 59.000) aktif 3 bulan, Standard (Rp 120.000) aktif 6 bulan, dan Premium (Rp 175.000) aktif selamanya. Perpanjangan masa aktif tersedia mulai Rp 25.000/bulan.',
            ],
        ] as $faq)
                            <div class="faq-item border border-gray-200 rounded-xl overflow-hidden">
                                <button
                                    class="faq-toggle w-full flex items-center justify-between px-4 sm:px-5 py-3.5 sm:py-4 text-left hover:bg-gray-50 transition-colors min-h-[52px]"
                                    onclick="toggleFaq(this)" aria-expanded="false">
                                    <span class="font-medium text-sm text-gray-900 pr-3">{{ $faq['q'] }}</span>
                                    <i data-lucide="chevron-down"
                                        class="w-4 h-4 text-gray-400 transition-transform duration-300 faq-icon flex-shrink-0"></i>
                                </button>
                                <div class="faq-content hidden px-4 sm:px-5 pb-4">
                                    <p class="text-sm text-gray-600">{{ $faq['a'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== 7. CTA FINAL ===== -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12 sm:pb-16 reveal">
            <div
                class="relative overflow-hidden bg-gradient-to-br from-primary-700 via-primary-600 to-primary-800 rounded-2xl p-8 sm:p-10 md:p-14 text-center">
                <div class="absolute inset-0 overflow-hidden pointer-events-none">
                    <div
                        class="absolute -top-16 -right-16 w-48 sm:w-60 h-48 sm:h-60 bg-primary-500/30 rounded-full blur-3xl">
                    </div>
                    <div
                        class="absolute -bottom-16 -left-16 w-48 sm:w-60 h-48 sm:h-60 bg-primary-400/20 rounded-full blur-3xl">
                    </div>
                </div>
                <div class="relative">
                    <div
                        class="inline-flex items-center gap-2 px-3 sm:px-4 py-1.5 bg-amber-400/20 rounded-full text-amber-200 text-xs sm:text-sm font-medium mb-4 sm:mb-6">
                        <i data-lucide="gift" class="w-3.5 h-3.5 sm:w-4 sm:h-4"></i>
                        Early Bird — Gratis 1x Revisi Tambahan untuk Pemesanan Pertamamu
                    </div>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white mb-3 sm:mb-4">
                        Sudah Pilih Templatenya?
                    </h2>
                    <p class="text-primary-100/70 max-w-lg mx-auto mb-6 sm:mb-8 text-sm sm:text-base">
                        Hubungi kami sekarang dan wujudkan undangan impianmu bersama Imora.
                    </p>
                    <a href="https://wa.me/628998375434?text=Halo%20Imora%2C%20saya%20tertarik%20dengan%20template%20undangan%20digital"
                        target="_blank"
                        class="inline-flex items-center gap-2 sm:gap-2.5 px-6 sm:px-8 py-3.5 sm:py-4 bg-white text-primary-700 font-bold rounded-xl shadow-lg hover:shadow-xl hover:bg-primary-50 transition-all duration-300 text-sm sm:text-base min-h-[48px]">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
                            <path
                                d="M12 0C5.373 0 0 5.373 0 12c0 2.625.846 5.059 2.284 7.034L.789 23.492a.5.5 0 00.611.611l4.458-1.495A11.938 11.938 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-2.379 0-4.575-.832-6.298-2.218l-.44-.355-3.27 1.096 1.096-3.27-.355-.44A9.935 9.935 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z" />
                        </svg>
                        Pesan via WhatsApp
                    </a>
                    <a href="{{ route('custom.order') }}"
                        class="inline-flex items-center gap-2 sm:gap-2.5 px-6 sm:px-8 py-3.5 sm:py-4 bg-white/10 border border-white/30 text-white font-semibold rounded-xl hover:bg-white/20 transition-all duration-300 text-sm sm:text-base min-h-[48px]">
                        <i data-lucide="sparkles" class="w-4 h-4 sm:w-5 sm:h-5 flex-shrink-0"></i>
                        Pesan Paket Custom
                    </a>
                </div>
            </div>
        </section>

    </main>

@endsection

@include('katalog.katalog')
