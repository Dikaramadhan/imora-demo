@extends('layouts.app')

@section('title', $template['nama'] . ' | Imora')

@section('content')
    <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-10">

        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm text-gray-400 mb-6">
            <a href="{{ url('/') }}" class="hover:text-primary-600 transition-colors">Katalog</a>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
            <span class="text-gray-700 font-medium truncate">{{ $template['nama'] }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-10 items-start">

            {{-- Preview --}}
            <div class="lg:sticky lg:top-24">
                <div
                    class="bg-gray-100 rounded-2xl overflow-hidden aspect-[3/4] max-w-[280px] sm:max-w-sm mx-auto shadow-xl">
                    <img src="{{ asset('img/template/' . $template['seed'] . '.png') }}" alt="{{ $template['nama'] }}"
                        class="w-full h-full object-cover"
                        onerror="this.src='https://picsum.photos/seed/{{ $template['seed'] }}/400/530.jpg'">
                </div>
                <div class="mt-3 text-center">
                    <a href="{{ $template['preview_url'] ?? '#' }}" target="_blank"
                        class="inline-flex items-center gap-1.5 text-sm text-primary-600 font-medium hover:underline">
                        <i data-lucide="eye" class="w-4 h-4"></i> Lihat Preview Langsung
                    </a>
                </div>
            </div>

            {{-- Info --}}
            <div class="flex flex-col gap-4 sm:gap-5">

                {{-- Badge --}}
                <div class="flex items-center gap-2 flex-wrap">
                    <span
                        class="px-2.5 py-1 bg-primary-50 text-primary-600 text-xs font-semibold rounded-lg uppercase tracking-wide">
                        {{ ucfirst(str_replace('_', ' ', $template['kategori'])) }}
                    </span>
                    @if ($template['populer'])
                        <span
                            class="inline-flex items-center gap-1 px-2.5 py-1 bg-amber-100 text-amber-700 text-xs font-semibold rounded-lg">
                            <i data-lucide="star" class="w-3 h-3 fill-current"></i> Populer
                        </span>
                    @endif
                </div>

                {{-- Title --}}
                <div>
                    <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900 leading-snug mb-2">
                        {{ $template['nama'] }}
                    </h1>
                    <p class="text-gray-500 text-sm leading-relaxed">{{ $template['deskripsi'] }}</p>
                </div>

                {{-- Harga --}}
                <div class="flex items-center gap-3">
                    <span class="text-2xl sm:text-3xl font-bold text-primary-600">{{ $template['hargaStr'] }}</span>
                    <span class="text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded-lg">Sudah termasuk revisi</span>
                </div>

                {{-- Fitur List --}}
                <div class="bg-gray-50 rounded-2xl p-4 sm:p-5">
                    <h3 class="font-bold text-gray-900 text-sm mb-3">Yang kamu dapatkan:</h3>
                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm text-gray-600">
                        @foreach ($template['fitur_list'] as $f)
                            <li class="flex items-center gap-2">
                                <i data-lucide="check-circle-2" class="w-4 h-4 text-green-500 flex-shrink-0"></i>
                                {{ $f }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- CTA --}}
                <div class="flex flex-col gap-3">
                    <a href="https://wa.me/628998375434?text=Halo%20Imora%2C%20saya%20tertarik%20dengan%20template%20*{{ urlencode($template['nama']) }}*"
                        target="_blank"
                        class="flex items-center justify-center gap-2.5 w-full py-4 bg-green-500 hover:bg-green-600 active:bg-green-700 text-white font-bold rounded-xl transition-colors shadow-md text-sm sm:text-base min-h-[52px]">
                        <svg class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
                            <path
                                d="M12 0C5.373 0 0 5.373 0 12c0 2.625.846 5.059 2.284 7.034L.789 23.492a.5.5 0 00.611.611l4.458-1.495A11.938 11.938 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-2.379 0-4.575-.832-6.298-2.218l-.44-.355-3.27 1.096 1.096-3.27-.355-.44A9.935 9.935 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z" />
                        </svg>
                        Pesan Template Ini
                    </a>

                    <a href="{{ url('/') }}"
                        class="flex items-center justify-center gap-2 w-full py-3.5 border border-gray-200 text-gray-600 font-medium rounded-xl hover:bg-gray-50 active:bg-gray-100 transition-colors text-sm min-h-[48px]">
                        <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali ke Katalog
                    </a>
                </div>

            </div>
        </div>
    </main>
@endsection
