@extends('layouts.app')

@section('title', 'Katalog Undangan Digital')

@push('styles')
    <style>
        /* ── Phone Mockup ── */
        .phone-mockup {
            background: #111;
            border-radius: 32px;
            padding: 8px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, .35);
            position: relative;
        }

        .phone-mockup::before {
            content: '';
            position: absolute;
            top: 8px;
            left: 50%;
            transform: translateX(-50%);
            width: 70px;
            height: 18px;
            background: #111;
            border-radius: 0 0 12px 12px;
            z-index: 20;
        }

        .phone-screen {
            border-radius: 26px;
            overflow: hidden;
            aspect-ratio: 9/19;
        }

        .phone-screen img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        @keyframes floatPhone {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .float-anim {
            animation: floatPhone 4s ease-in-out infinite;
        }

        .float-anim-delay {
            animation: floatPhone 4s ease-in-out infinite;
            animation-delay: 1s;
        }

        /* ── Scrollbar hide ── */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* ── Reveal ── */
        .reveal {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity .6s ease, transform .6s ease;
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ── FAQ ── */
        .faq-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height .35s ease;
        }

        .faq-content.open {
            max-height: 200px;
        }

        /* ── Badge ── */
        .badge-new {
            background: #dcfce7;
            color: #166534;
        }

        .badge-promo {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-populer {
            background: #fde8d8;
            color: #9a3412;
        }
    </style>
@endpush

@section('content')
    <main>

        {{-- ═══════════════════════════════════════
         1. HERO
    ═══════════════════════════════════════ --}}
        <section
            class="relative overflow-hidden bg-gradient-to-br from-primary-900 via-primary-700 to-primary-800 text-white py-16 md:py-24">

            <div class="absolute inset-0 pointer-events-none overflow-hidden" aria-hidden="true">
                <div class="absolute -top-24 -right-24 w-80 h-80 bg-primary-500/20 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-24 -left-24 w-80 h-80 bg-primary-400/15 rounded-full blur-3xl"></div>
            </div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">

                    {{-- Text --}}
                    <div class="lg:col-span-7">

                        <div
                            class="inline-flex items-center gap-2 px-3 py-1 bg-white/10 backdrop-blur-sm rounded-full text-sm text-primary-100 mb-5 border border-white/10">
                            <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
                            {{ $totalUndangan }}+ Template Siap Pakai
                        </div>

                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight mb-4">
                            Katalog Undangan Digital
                            <span class="text-primary-200">Elegan & Modern</span>
                        </h1>

                        <p class="text-lg text-primary-100/70 max-w-lg mb-8">
                            Pilih template favoritmu, kami siapkan dalam 1x24 jam. Personal, interaktif, dan mudah
                            dibagikan.
                        </p>

                        {{-- Search --}}
                        <form action="{{ route('katalog.index') }}" method="GET" class="relative max-w-xl mb-8">
                            @if ($kategori !== 'semua')
                                <input type="hidden" name="kategori" value="{{ $kategori }}">
                            @endif
                            @if ($sort !== 'terbaru')
                                <input type="hidden" name="sort" value="{{ $sort }}">
                            @endif
                            <i data-lucide="search"
                                class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-primary-300 pointer-events-none"></i>
                            <input type="text" name="cari" value="{{ $cari }}"
                                placeholder="Cari template, contoh: 'floral putih'..." autocomplete="off"
                                class="w-full pl-12 pr-32 py-4 bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl text-white placeholder:text-primary-200/50 focus:outline-none focus:ring-2 focus:ring-white/30 focus:bg-white/15 transition-all text-base">
                            <button type="submit"
                                class="absolute right-2 top-1/2 -translate-y-1/2 inline-flex items-center gap-2 px-5 py-2.5 bg-white text-primary-700 font-semibold rounded-xl hover:bg-primary-50 transition-all">
                                Cari
                            </button>
                        </form>

                        {{-- Stats --}}
                        <div class="flex flex-wrap items-center gap-6 text-sm">
                            <div class="flex items-center gap-2">
                                <span class="text-2xl font-bold">5K+</span>
                                <span class="text-primary-200/60">Terkirim</span>
                            </div>
                            <div class="w-px h-8 bg-white/20 hidden sm:block"></div>
                            <div class="flex items-center gap-2">
                                <span class="text-2xl font-bold">{{ $totalUndangan }}+</span>
                                <span class="text-primary-200/60">Template</span>
                            </div>
                            <div class="w-px h-8 bg-white/20 hidden sm:block"></div>
                            <div class="flex items-center gap-2">
                                <span class="text-2xl font-bold">4.9</span>
                                <span class="text-primary-200/60">Rating ★</span>
                            </div>
                        </div>
                    </div>

                    {{-- Phone Mockup --}}
                    <div class="lg:col-span-5 hidden lg:flex items-center justify-center">
                        <div class="relative h-[420px] w-full flex items-center justify-center">
                            <div class="phone-mockup w-[190px] float-anim z-10 relative">
                                <div class="phone-screen">
                                    <img src="/img/mockup-3.png" alt="Preview Undangan" loading="lazy">
                                </div>
                            </div>
                            <div class="phone-mockup w-[165px] float-anim-delay absolute -bottom-4 -left-8 z-0">
                                <div class="phone-screen">
                                    <img src="/img/mockup-4.png" alt="Preview Undangan" loading="lazy">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        {{-- ═══════════════════════════════════════
         2. STICKY FILTER NAV
    ═══════════════════════════════════════ --}}
        <div class="sticky top-0 z-40 bg-white/80 backdrop-blur-xl border-b border-gray-100 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between py-3 gap-4">

                    {{-- Category Tabs --}}
                    <div class="flex items-center gap-2 overflow-x-auto scrollbar-hide flex-1">

                        {{-- Semua --}}
                        <a href="{{ route('katalog.index', array_merge(request()->except('kategori', 'page'), ['sort' => $sort, 'cari' => $cari])) }}"
                            class="flex-shrink-0 inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-sm font-medium transition-all
                              {{ $kategori === 'semua' ? 'bg-primary-600 text-white shadow-md shadow-primary-500/20' : 'bg-gray-100 text-gray-600 hover:bg-primary-50 hover:text-primary-600' }}">
                            Semua
                            <span class="text-xs opacity-70">{{ $totalUndangan }}</span>
                        </a>

                        @foreach ($daftarKategori as $kat)
                            <a href="{{ route('katalog.index', array_merge(request()->except('kategori', 'page'), ['kategori' => $kat, 'sort' => $sort, 'cari' => $cari])) }}"
                                class="flex-shrink-0 inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-sm font-medium transition-all
                                  {{ $kategori === $kat ? 'bg-primary-600 text-white shadow-md shadow-primary-500/20' : 'bg-gray-100 text-gray-600 hover:bg-primary-50 hover:text-primary-600' }}">
                                {{ Str::title(str_replace('_', ' ', $kat)) }}
                            </a>
                        @endforeach

                    </div>

                    {{-- Sort --}}
                    <form method="GET" action="{{ route('katalog.index') }}" id="sortForm" class="flex-shrink-0">
                        <input type="hidden" name="kategori" value="{{ $kategori }}">
                        <input type="hidden" name="cari" value="{{ $cari }}">
                        <div class="relative">
                            <select name="sort" onchange="document.getElementById('sortForm').submit()"
                                class="appearance-none pl-3 pr-8 py-2 bg-gray-100 border-0 rounded-xl text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-primary-500/30 cursor-pointer">
                                <option value="terbaru" {{ $sort === 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                                <option value="termurah" {{ $sort === 'termurah' ? 'selected' : '' }}>Termurah</option>
                                <option value="termahal" {{ $sort === 'termahal' ? 'selected' : '' }}>Termahal</option>
                                <option value="populer" {{ $sort === 'populer' ? 'selected' : '' }}>Populer</option>
                            </select>
                            <i data-lucide="chevron-down"
                                class="absolute right-2.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none"></i>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        {{-- ═══════════════════════════════════════
         3. TEMPLATE POPULER
         (hanya tampil jika tidak ada filter aktif)
    ═══════════════════════════════════════ --}}
        @if ($kategori === 'semua' && empty($cari))
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10 pb-4">

                <div class="flex items-center justify-between mb-6 reveal">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-amber-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i data-lucide="flame" class="w-5 h-5 text-amber-600"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Paling Banyak Dipesan</h2>
                            <p class="text-sm text-gray-500">Template favorit minggu ini</p>
                        </div>
                    </div>
                    <a href="#katalog"
                        class="hidden sm:inline-flex items-center gap-1 text-sm font-medium text-primary-600 hover:text-primary-700 transition-colors flex-shrink-0">
                        Lihat semua <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>

                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 reveal">
                    @forelse($populer as $item)
                        <a href="{{ route('katalog.show', $item->slug) }}" class="group block">
                            <div
                                class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                                <div class="relative aspect-[3/4] overflow-hidden bg-gray-100">
                                    <img src="{{ $item->thumbnail_url ?? '/img/placeholder.png' }}"
                                        alt="{{ $item->nama }}"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                        loading="lazy">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent">
                                    </div>

                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="inline-flex items-center gap-1 px-2.5 py-1 bg-amber-400 text-amber-900 text-[11px] font-bold rounded-lg">
                                            <i data-lucide="star" class="w-3 h-3 fill-current"></i> BEST SELLER
                                        </span>
                                    </div>

                                    <div class="absolute bottom-0 left-0 right-0 p-3">
                                        <h3 class="text-white font-bold text-sm leading-tight">{{ $item->nama }}</h3>
                                        <p class="text-white/80 text-sm mt-0.5">Rp
                                            {{ number_format($item->harga, 0, ',', '.') }}</p>
                                    </div>

                                    <div
                                        class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/20">
                                        <span
                                            class="inline-flex items-center gap-1.5 px-4 py-2 bg-white text-gray-900 text-xs font-semibold rounded-xl shadow-lg">
                                            <i data-lucide="eye" class="w-3.5 h-3.5"></i> Lihat Demo
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @empty
                        {{-- Tidak ada populer: skip section ini --}}
                    @endforelse
                </div>

                <div class="mt-5 text-center sm:hidden">
                    <a href="#katalog" class="inline-flex items-center gap-1 text-sm font-medium text-primary-600">
                        Lihat semua template <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>
            </section>
        @endif


        {{-- ═══════════════════════════════════════
         4. SEMUA TEMPLATE
    ═══════════════════════════════════════ --}}
        <section id="katalog" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

            {{-- Header --}}
            <div class="flex items-center justify-between mb-6 reveal">
                <div>
                    <h2 class="text-xl font-bold text-gray-900">
                        @if ($kategori !== 'semua')
                            {{ Str::title(str_replace('_', ' ', $kategori)) }}
                        @elseif(!empty($cari))
                            Hasil pencarian
                        @else
                            Semua Template
                        @endif
                    </h2>
                    <p class="text-sm text-gray-500 mt-0.5">
                        Menampilkan {{ $undangans->firstItem() }}–{{ $undangans->lastItem() }}
                        dari {{ $undangans->total() }} template
                    </p>
                </div>

                {{-- Active filters info --}}
                <div class="flex items-center gap-2 flex-wrap justify-end">
                    @if (!empty($cari))
                        <a href="{{ route('katalog.index', array_merge(request()->except('cari', 'page'))) }}"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-gray-100 text-gray-600 rounded-xl text-sm hover:bg-red-50 hover:text-red-600 transition-colors">
                            "{{ $cari }}"
                            <i data-lucide="x" class="w-3.5 h-3.5"></i>
                        </a>
                    @endif
                </div>
            </div>

            {{-- Grid --}}
            @if ($undangans->isNotEmpty())
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($undangans as $item)
                        <a href="{{ route('katalog.show', $item->slug) }}" class="group block reveal">
                            <div
                                class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 h-full">
                                <div class="relative aspect-[3/4] overflow-hidden bg-gray-100">
                                    <img src="{{ $item->thumbnail_url ?? '/img/placeholder.png' }}"
                                        alt="{{ $item->nama }}"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                        loading="lazy">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent">
                                    </div>

                                    {{-- Badge --}}
                                    @if ($item->is_populer)
                                        <div class="absolute top-3 left-3">
                                            <span
                                                class="inline-flex items-center gap-1 px-2 py-0.5 badge-populer text-[11px] font-bold rounded-lg">
                                                🔥 Populer
                                            </span>
                                        </div>
                                    @elseif($item->badge === 'new')
                                        <div class="absolute top-3 left-3">
                                            <span
                                                class="px-2 py-0.5 badge-new text-[11px] font-bold rounded-lg">Baru</span>
                                        </div>
                                    @elseif($item->badge === 'promo')
                                        <div class="absolute top-3 left-3">
                                            <span
                                                class="px-2 py-0.5 badge-promo text-[11px] font-bold rounded-lg">Promo</span>
                                        </div>
                                    @endif

                                    {{-- Kategori pill --}}
                                    <div class="absolute top-3 right-3">
                                        <span
                                            class="px-2 py-0.5 bg-black/30 backdrop-blur-sm text-white text-[10px] font-medium rounded-lg">
                                            {{ Str::title(str_replace('_', ' ', $item->kategori)) }}
                                        </span>
                                    </div>

                                    {{-- Info --}}
                                    <div class="absolute bottom-0 left-0 right-0 p-3">
                                        <h3 class="text-white font-bold text-sm leading-tight truncate">
                                            {{ $item->nama }}</h3>
                                        <p class="text-white/80 text-sm mt-0.5">Rp
                                            {{ number_format($item->harga, 0, ',', '.') }}</p>
                                    </div>

                                    {{-- Hover CTA --}}
                                    <div
                                        class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/20">
                                        <span
                                            class="inline-flex items-center gap-1.5 px-4 py-2 bg-white text-gray-900 text-xs font-semibold rounded-xl shadow-lg">
                                            <i data-lucide="eye" class="w-3.5 h-3.5"></i> Lihat Demo
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                {{-- Pagination Laravel --}}
                @if ($undangans->hasPages())
                    <div class="mt-10 flex justify-center">
                        {{-- {{ $undangans->links('vendor.pagination.custom') }} --}}
                    </div>
                @endif
            @else
                {{-- Empty state --}}
                <div class="text-center py-20">
                    <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="search-x" class="w-8 h-8 text-gray-400"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Template tidak ditemukan</h3>
                    <p class="text-gray-500 text-sm max-w-xs mx-auto mb-6">
                        @if (!empty($cari))
                            Tidak ada template yang cocok dengan <strong>"{{ $cari }}"</strong>. Coba kata kunci
                            lain.
                        @else
                            Belum ada template untuk kategori ini.
                        @endif
                    </p>
                    <a href="{{ route('katalog.index') }}"
                        class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-xl hover:bg-primary-700 transition-colors">
                        <i data-lucide="arrow-left" class="w-4 h-4"></i> Lihat Semua Template
                    </a>
                </div>
            @endif

        </section>


        {{-- ═══════════════════════════════════════
         5. TESTIMONI
    ═══════════════════════════════════════ --}}
        <section class="bg-gray-50 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="text-center mb-10 reveal">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-1.5 bg-primary-50 text-primary-600 rounded-full text-sm font-medium mb-4">
                        <i data-lucide="message-square-heart" class="w-4 h-4"></i> Testimoni
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Apa Kata Mereka?</h2>
                    <p class="text-gray-500 mt-2">Lebih dari 5.000 pasangan sudah mempercayai Imora</p>
                </div>

                @php
                    $testimoni = [
                        [
                            'inisial' => 'RA',
                            'nama' => 'Rina & Andi',
                            'sub' => 'Pernikahan • Des 2024',
                            'warna' => 'bg-primary-100 text-primary-600',
                            'isi' =>
                                '"Undangannya cantik banget, keluarga dan teman-teman pada kagum. Prosesnya cepat, cuma 1 hari langsung jadi!"',
                        ],
                        [
                            'inisial' => 'DS',
                            'nama' => 'Dian & Surya',
                            'sub' => 'Pernikahan • Jan 2025',
                            'warna' => 'bg-green-100 text-green-600',
                            'isi' =>
                                '"Fitur musik dan videonya keren, tamu bilang rasanya premium banget. Harganya juga terjangkau!"',
                        ],
                        [
                            'inisial' => 'BH',
                            'nama' => 'Bu Hana',
                            'sub' => 'Khitanan • Feb 2025',
                            'warna' => 'bg-amber-100 text-amber-600',
                            'isi' =>
                                '"Pakai Imora untuk khitanan anak, ternyata template-nya lengkap. Respon CS-nya cepat dan sabar."',
                        ],
                    ];
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 reveal">
                    @foreach ($testimoni as $t)
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex flex-col">
                            <div class="flex items-center gap-0.5 mb-3">
                                @for ($i = 0; $i < 5; $i++)
                                    <i data-lucide="star" class="w-4 h-4 text-amber-400 fill-current"></i>
                                @endfor
                            </div>
                            <p class="text-gray-600 text-sm leading-relaxed mb-5 flex-1">{{ $t['isi'] }}</p>
                            <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                                <div
                                    class="w-10 h-10 rounded-full {{ $t['warna'] }} flex items-center justify-center font-bold text-sm flex-shrink-0">
                                    {{ $t['inisial'] }}
                                </div>
                                <div>
                                    <p class="font-semibold text-sm text-gray-900">{{ $t['nama'] }}</p>
                                    <p class="text-xs text-gray-400">{{ $t['sub'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>


        {{-- ═══════════════════════════════════════
         6. KENAPA IMORA + FAQ
    ═══════════════════════════════════════ --}}
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

                {{-- Keunggulan --}}
                <div class="reveal">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Kenapa Memilih Imora?</h2>
                    @php
                        $keunggulan = [
                            [
                                'icon' => 'palette',
                                'bg' => 'bg-primary-100',
                                'ic' => 'text-primary-600',
                                'judul' => 'Desain Premium',
                                'sub' => 'Oleh desainer profesional',
                            ],
                            [
                                'icon' => 'smartphone',
                                'bg' => 'bg-green-100',
                                'ic' => 'text-green-600',
                                'judul' => 'Responsive',
                                'sub' => 'Sempurna di semua device',
                            ],
                            [
                                'icon' => 'zap',
                                'bg' => 'bg-amber-100',
                                'ic' => 'text-amber-600',
                                'judul' => 'Proses Cepat',
                                'sub' => 'Siap dalam 1x24 jam',
                            ],
                            [
                                'icon' => 'headphones',
                                'bg' => 'bg-rose-100',
                                'ic' => 'text-rose-600',
                                'judul' => 'Support 24/7',
                                'sub' => 'Selalu siap membantu',
                            ],
                            [
                                'icon' => 'shield-check',
                                'bg' => 'bg-teal-100',
                                'ic' => 'text-teal-600',
                                'judul' => 'Garansi Revisi',
                                'sub' => 'Gratis hingga 3x revisi',
                            ],
                            [
                                'icon' => 'link',
                                'bg' => 'bg-purple-100',
                                'ic' => 'text-purple-600',
                                'judul' => 'Link Selamanya',
                                'sub' => 'Aktif lifetime, no biaya bulanan',
                            ],
                        ];
                    @endphp
                    <div class="grid grid-cols-2 gap-4">
                        @foreach ($keunggulan as $k)
                            <div class="bg-gray-50 hover:bg-primary-50/40 rounded-xl p-4 transition-colors">
                                <div
                                    class="w-10 h-10 {{ $k['bg'] }} rounded-lg flex items-center justify-center mb-3">
                                    <i data-lucide="{{ $k['icon'] }}" class="w-5 h-5 {{ $k['ic'] }}"></i>
                                </div>
                                <h4 class="font-semibold text-sm text-gray-900">{{ $k['judul'] }}</h4>
                                <p class="text-xs text-gray-500 mt-1">{{ $k['sub'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- FAQ --}}
                <div class="reveal">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Pertanyaan Umum</h2>
                    @php
                        $faqs = [
                            [
                                'q' => 'Berapa lama proses pengerjaan?',
                                'a' =>
                                    'Setelah data lengkap diterima, undangan siap online dalam 1x24 jam. Revisi minor maksimal 2–3 jam.',
                            ],
                            [
                                'q' => 'Apakah bisa request warna atau font?',
                                'a' =>
                                    'Bisa! Tersedia beberapa pilihan warna & font tiap template. Custom warna khusus untuk paket Premium.',
                            ],
                            [
                                'q' => 'Link undangan bisa diakses berapa lama?',
                                'a' => 'Link aktif selamanya (lifetime). Tidak ada biaya bulanan atau perpanjangan.',
                            ],
                            [
                                'q' => 'Bagaimana cara pemesanan?',
                                'a' =>
                                    'Pilih template → Hubungi via WhatsApp → Kirim data → Pembayaran → Undangan jadi. Simpel!',
                            ],
                            [
                                'q' => 'Apakah ada garansi?',
                                'a' =>
                                    'Ya, garansi revisi gratis hingga 3x. Jika tidak sesuai, uang dikembalikan 100%.',
                            ],
                            [
                                'q' => 'Berapa jumlah tamu yang bisa diundang?',
                                'a' => 'Tidak ada batas tamu. Link undangan bisa dibagikan ke berapa pun kontak.',
                            ],
                        ];
                    @endphp
                    <div class="space-y-3">
                        @foreach ($faqs as $faq)
                            <div class="faq-item border border-gray-200 rounded-xl overflow-hidden">
                                <button
                                    class="faq-toggle w-full flex items-center justify-between px-5 py-4 text-left hover:bg-gray-50 transition-colors"
                                    onclick="toggleFaq(this)">
                                    <span class="font-medium text-sm text-gray-900 pr-4">{{ $faq['q'] }}</span>
                                    <i data-lucide="chevron-down"
                                        class="w-4 h-4 text-gray-400 transition-transform duration-300 faq-icon flex-shrink-0"></i>
                                </button>
                                <div class="faq-content px-5">
                                    <p class="text-sm text-gray-600 pb-4">{{ $faq['a'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>


        {{-- ═══════════════════════════════════════
         7. CTA FINAL
    ═══════════════════════════════════════ --}}
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16 reveal">
            <div
                class="relative overflow-hidden bg-gradient-to-br from-primary-700 via-primary-600 to-primary-800 rounded-2xl p-10 md:p-14 text-center">
                <div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
                    <div class="absolute -top-16 -right-16 w-60 h-60 bg-primary-500/30 rounded-full blur-3xl"></div>
                    <div class="absolute -bottom-16 -left-16 w-60 h-60 bg-primary-400/20 rounded-full blur-3xl"></div>
                </div>
                <div class="relative">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-1.5 bg-amber-400/20 rounded-full text-amber-200 text-sm font-medium mb-6">
                        <i data-lucide="clock" class="w-4 h-4"></i>
                        Diskon 10% untuk pemesanan hari ini
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Sudah Pilih Templatenya?</h2>
                    <p class="text-primary-100/70 max-w-lg mx-auto mb-8">Jangan tunda! Hubungi kami sekarang dan dapatkan
                        undangan impianmu.</p>
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                        <a href="https://wa.me/6281234567890?text=Halo%20Imora%2C%20saya%20tertarik%20dengan%20template%20undangan%20digital"
                            target="_blank" rel="noopener noreferrer"
                            class="inline-flex items-center gap-2.5 px-8 py-4 bg-white text-primary-700 font-bold rounded-xl shadow-lg hover:shadow-xl hover:bg-primary-50 transition-all duration-300 text-base w-full sm:w-auto justify-center">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
                                <path
                                    d="M12 0C5.373 0 0 5.373 0 12c0 2.625.846 5.059 2.284 7.034L.789 23.492a.5.5 0 00.611.611l4.458-1.495A11.938 11.938 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-2.379 0-4.575-.832-6.298-2.218l-.44-.355-3.27 1.096 1.096-3.27-.355-.44A9.935 9.935 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z" />
                            </svg>
                            Pesan via WhatsApp
                        </a>
                        <a href="#katalog"
                            class="inline-flex items-center gap-2 px-8 py-4 bg-white/10 border border-white/20 text-white font-semibold rounded-xl hover:bg-white/20 transition-all text-base w-full sm:w-auto justify-center">
                            <i data-lucide="layout-grid" class="w-5 h-5"></i>
                            Lihat Katalog
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection


@push('scripts')
    <script>
        /* ── FAQ Toggle ── */
        function toggleFaq(btn) {
            const item = btn.closest('.faq-item');
            const content = item.querySelector('.faq-content');
            const icon = item.querySelector('.faq-icon');
            const isOpen = content.classList.contains('open');

            document.querySelectorAll('.faq-item').forEach(faq => {
                faq.querySelector('.faq-content').classList.remove('open');
                faq.querySelector('.faq-icon').style.transform = 'rotate(0deg)';
                faq.querySelector('.faq-toggle').classList.remove('bg-gray-50');
            });

            if (!isOpen) {
                content.classList.add('open');
                icon.style.transform = 'rotate(180deg)';
                btn.classList.add('bg-gray-50');
            }
        }

        /* ── Reveal on scroll ── */
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.08
        });

        document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

        /* ── Init lucide icons ── */
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof lucide !== 'undefined') lucide.createIcons();
        });
    </script>
@endpush
