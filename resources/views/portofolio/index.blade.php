@extends('layouts.app')

@section('title', 'Portofolio Undangan Digital | Imora')

@php
    $jsonLd = json_encode(
        [
            '@context' => 'https://schema.org',
            '@type' => 'CollectionPage',
            'name' => 'Portofolio Imora ID',
            'description' => 'Kumpulan hasil undangan digital yang telah dibuat oleh Imora ID.',
            'url' => route('portofolio.index'),
        ],
        JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT,
    );
@endphp

@push('head')
    <script type="application/ld+json">{!! $jsonLd !!}</script>
@endpush

@section('content')
    <main>

        {{-- HERO --}}
        <section
            class="relative overflow-hidden bg-gradient-to-br from-primary-900 via-primary-700 to-primary-800 text-white py-12 md:py-16">
            <div class="absolute inset-0 pointer-events-none overflow-hidden">
                <div class="absolute -top-24 -right-24 w-64 h-64 bg-primary-500/20 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-primary-400/15 rounded-full blur-3xl"></div>
            </div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <div
                    class="inline-flex items-center gap-2 px-3 py-1.5 bg-white/10 rounded-full text-xs sm:text-sm font-medium mb-4">
                    <i data-lucide="image" class="w-3.5 h-3.5"></i>
                    Hasil Nyata dari Client Kami
                </div>
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-3">
                    Portofolio <span class="text-primary-200">Imora ID</span>
                </h1>
                <p class="text-primary-100/70 max-w-lg mx-auto text-sm sm:text-base mb-6">
                    Setiap undangan dibuat dengan penuh perhatian dan disesuaikan dengan keinginan pasangan.
                </p>
                <div class="flex items-center justify-center gap-6 text-sm flex-wrap">
                    <div class="flex items-center gap-2">
                        <span class="text-2xl font-bold">{{ count($portofolio) }}+</span>
                        <span class="text-primary-200/60 text-xs">Undangan Jadi</span>
                    </div>
                    <div class="w-px h-8 bg-white/20"></div>
                    <div class="flex items-center gap-2">
                        <span class="text-2xl font-bold">100%</span>
                        <span class="text-primary-200/60 text-xs">Client Puas</span>
                    </div>
                    <div class="w-px h-8 bg-white/20"></div>
                    <div class="flex items-center gap-1">
                        @for ($i = 0; $i < 5; $i++)
                            <i data-lucide="star" class="w-4 h-4 text-amber-400 fill-current"></i>
                        @endfor
                        <span class="text-primary-200/60 text-xs ml-1">Rating</span>
                    </div>
                </div>
            </div>
        </section>

        {{-- GRID PORTOFOLIO --}}
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-3 sm:gap-4">
                @foreach ($portofolio as $i => $item)
                    <div class="group reveal reveal-delay-{{ ($i % 4) + 1 }} cursor-pointer"
                        onclick="openLightbox({{ $i }})">
                        <div class="bg-white rounded-2xl shadow-card overflow-hidden card-lift">
                            <div class="relative aspect-[9/16] overflow-hidden bg-gray-100">
                                <img src="{{ asset('img/portofolio/' . $item['foto']) }}"
                                    alt="Undangan digital {{ $item['pasangan'] }} — template {{ $item['template'] }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                    loading="{{ $i < 4 ? 'eager' : 'lazy' }}"
                                    onerror="this.src='https://picsum.photos/seed/porto{{ $i }}/400/711.jpg'">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                </div>
                                <div
                                    class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300">
                                    <div
                                        class="w-10 h-10 bg-white/90 rounded-full flex items-center justify-center shadow-lg transform scale-75 group-hover:scale-100 transition-transform duration-300">
                                        <i data-lucide="zoom-in" class="w-5 h-5 text-primary-600"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3">
                                <div class="flex items-center gap-1 mb-1.5">
                                    @for ($s = 0; $s < $item['rating']; $s++)
                                        <i data-lucide="star" class="w-3 h-3 text-amber-400 fill-current"></i>
                                    @endfor
                                </div>
                                <h3 class="font-bold text-berry-dark text-xs sm:text-sm leading-tight">
                                    {{ $item['pasangan'] }}</h3>
                                <p class="text-berry-muted text-[11px] mt-0.5">{{ $item['tanggal'] }}</p>
                                <div class="mt-2 pt-2 border-t border-berry-border flex items-center gap-1.5">
                                    <i data-lucide="layout-template" class="w-3 h-3 text-primary-400 flex-shrink-0"></i>
                                    <span
                                        class="text-[11px] text-primary-600 font-medium truncate">{{ $item['template'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- CTA --}}
            <div class="mt-12 sm:mt-16 text-center reveal">
                <p class="text-gray-500 text-sm mb-4">Tertarik punya undangan digital seperti ini?</p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                    <a href="{{ route('katalog.index') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 border-2 border-primary-600 text-primary-600 font-semibold rounded-xl hover:bg-primary-50 transition-colors text-sm">
                        <i data-lucide="layout-grid" class="w-4 h-4"></i>
                        Lihat Template
                    </a>
                    <a href="https://wa.me/628998375434?text=Halo%20Imora%2C%20saya%20mau%20pesan%20undangan%20digital"
                        target="_blank"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-xl transition-colors text-sm shadow-md">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
                            <path
                                d="M12 0C5.373 0 0 5.373 0 12c0 2.625.846 5.059 2.284 7.034L.789 23.492a.5.5 0 00.611.611l4.458-1.495A11.938 11.938 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-2.379 0-4.575-.832-6.298-2.218l-.44-.355-3.27 1.096 1.096-3.27-.355-.44A9.935 9.935 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z" />
                        </svg>
                        Pesan Sekarang
                    </a>
                </div>
            </div>
        </section>

    </main>

    {{-- LIGHTBOX --}}
    <div id="lightbox" class="fixed inset-0 z-[9999] bg-black/90 flex items-center justify-center p-4 hidden"
        onclick="closeLightbox(event)">
        <button onclick="closeLightbox()"
            class="absolute top-4 right-4 w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center text-white transition-colors">
            <i data-lucide="x" class="w-5 h-5"></i>
        </button>
        <button onclick="prevLightbox()"
            class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center text-white transition-colors">
            <i data-lucide="chevron-left" class="w-5 h-5"></i>
        </button>
        <button onclick="nextLightbox()"
            class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center text-white transition-colors">
            <i data-lucide="chevron-right" class="w-5 h-5"></i>
        </button>
        <div class="flex flex-col items-center max-h-[90vh] w-full max-w-sm">
            <img id="lightboxImg" src="" alt=""
                class="w-full max-h-[75vh] object-contain rounded-2xl shadow-2xl">
            <div class="mt-4 text-center">
                <p id="lightboxName" class="text-white font-bold text-lg"></p>
                <p id="lightboxInfo" class="text-white/60 text-sm mt-1"></p>
                <div id="lightboxStars" class="flex items-center justify-center gap-1 mt-2"></div>
            </div>
        </div>
    </div>

@endsection

@php $portofolioJson = json_encode($portofolio); @endphp

@push('scripts')
    <script src="{{ asset('js/portofolio.js') }}"></script>
    <script>
        initPortofolio({!! $portofolioJson !!});
    </script>
@endpush
