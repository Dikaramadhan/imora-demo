@extends('layouts.app')

@section('title', $undangan->nama . ' - Imora Undangan Digital')

@section('content')

    <!-- Breadcrumb -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5">
        <nav class="flex items-center gap-2 text-sm text-berry-muted">
            <a href="{{ route('katalog.index') }}" class="hover:text-primary-600 transition-colors">Katalog</a>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
            <a href="{{ route('katalog.index', ['kategori' => $undangan->kategori]) }}"
                class="hover:text-primary-600 transition-colors capitalize">{{ str_replace('_', ' ', $undangan->kategori) }}</a>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
            <span class="text-berry-dark font-medium truncate">{{ $undangan->nama }}</span>
        </nav>
    </div>

    <!-- Main Detail -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">

            <!-- Left: Image -->
            <div class="lg:col-span-3 reveal">
                <div class="bg-white rounded-berry-lg shadow-card overflow-hidden">
                    <div class="aspect-[4/5] relative">
                        <img src="{{ $undangan->thumbnail }}" alt="{{ $undangan->nama }}" class="w-full h-full object-cover"
                            loading="lazy">
                        <!-- Badges -->
                        <div class="absolute top-4 left-4 flex flex-col gap-2">
                            @if ($undangan->is_populer)
                                <span
                                    class="inline-flex items-center gap-1 px-3 py-1 bg-amber-400 text-amber-900 text-xs font-bold rounded-full badge-pulse">
                                    <i data-lucide="star" class="w-3 h-3 fill-current"></i> POPULER
                                </span>
                            @endif
                            <span
                                class="inline-flex items-center px-3 py-1 bg-primary-600/90 backdrop-blur-sm text-white text-xs font-bold rounded-full uppercase tracking-wider">
                                {{ str_replace('_', ' ', $undangan->kategori) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Info -->
            <div class="lg:col-span-2 reveal reveal-delay-1">
                <div class="bg-white rounded-berry-lg shadow-card p-6 md:p-8 lg:sticky lg:top-24">
                    <!-- Nama & Harga -->
                    <div class="flex items-start justify-between gap-4">
                        <h1 class="text-2xl font-bold text-berry-dark leading-tight">{{ $undangan->nama }}</h1>
                        <button onclick="copyLink()"
                            class="flex-shrink-0 w-9 h-9 flex items-center justify-center rounded-berry bg-berry-bg hover:bg-primary-50 hover:text-primary-600 text-berry-muted transition-colors"
                            title="Bagikan">
                            <i data-lucide="share-2" class="w-4 h-4"></i>
                        </button>
                    </div>
                    <p class="text-2xl font-bold text-primary-600 mt-3">{{ $undangan->hargaFormatted }}</p>

                    <!-- Divider -->
                    <hr class="border-berry-border my-5">

                    <!-- Deskripsi -->
                    <div>
                        <h3 class="text-sm font-semibold text-berry-dark mb-2">Deskripsi</h3>
                        <p class="text-berry-muted text-sm leading-relaxed">{{ $undangan->deskripsi }}</p>
                    </div>

                    <!-- Divider -->
                    <hr class="border-berry-border my-5">

                    <!-- Fitur -->
                    <div>
                        <h3 class="text-sm font-semibold text-berry-dark mb-3">Fitur Termasuk</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            @foreach ($undangan->fitur ?? [] as $fitur)
                                <div class="flex items-center gap-2.5">
                                    <div
                                        class="w-5 h-5 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <i data-lucide="check" class="w-3 h-3 text-green-600"></i>
                                    </div>
                                    <span class="text-sm text-gray-600">{{ $fitur }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Divider -->
                    <hr class="border-berry-border my-5">

                    <!-- Info tambahan -->
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 text-sm">
                            <i data-lucide="clock" class="w-4 h-4 text-berry-muted"></i>
                            <span class="text-gray-600">Pengerjaan: <strong class="text-berry-dark">1x24 jam</strong></span>
                        </div>
                        <div class="flex items-center gap-3 text-sm">
                            <i data-lucide="infinity" class="w-4 h-4 text-berry-muted"></i>
                            <span class="text-gray-600">Aktif: <strong class="text-berry-dark">Selamanya</strong></span>
                        </div>
                        <div class="flex items-center gap-3 text-sm">
                            <i data-lucide="refresh-cw" class="w-4 h-4 text-berry-muted"></i>
                            <span class="text-gray-600">Revisi: <strong class="text-berry-dark">3x gratis</strong></span>
                        </div>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="mt-7 space-y-3">
                        <a href="https://wa.me/6281234567890?text=Halo%20Imora%2C%20saya%20ingin%20memesan%20template%20{{ urlencode($undangan->nama) }}"
                            target="_blank"
                            class="flex items-center justify-center gap-2.5 w-full px-6 py-3.5 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold rounded-berry shadow-md hover:shadow-lg hover:from-green-600 hover:to-green-700 transition-all duration-300">
                            <i data-lucide="message-circle" class="w-5 h-5"></i>
                            Pesan via WhatsApp
                        </a>
                        @if ($undangan->preview_url)
                            <a href="{{ $undangan->preview_url }}" target="_blank"
                                class="flex items-center justify-center gap-2.5 w-full px-6 py-3.5 bg-primary-600 text-white font-semibold rounded-berry shadow-berry hover:shadow-berry-md hover:bg-primary-700 transition-all duration-300">
                                <i data-lucide="external-link" class="w-5 h-5"></i>
                                Lihat Live Preview
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Undangan Terkait -->
        @if ($terkait->isNotEmpty())
            <div class="mt-16 reveal">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 bg-primary-100 rounded-berry flex items-center justify-center">
                        <i data-lucide="sparkles" class="w-4 h-4 text-primary-600"></i>
                    </div>
                    <h2 class="text-xl font-bold text-berry-dark">Template Serupa</h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                    @foreach ($terkait as $i => $item)
                        <a href="{{ route('katalog.show', $item->slug) }}"
                            class="group reveal reveal-delay-{{ $i + 1 }}">
                            <div class="bg-white rounded-berry-lg shadow-card card-lift overflow-hidden">
                                <div class="relative aspect-[3/4] overflow-hidden">
                                    <img src="{{ $item->thumbnail }}" alt="{{ $item->nama }}"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                        loading="lazy">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    </div>
                                    <div class="absolute bottom-3 left-3 right-3">
                                        <h3 class="text-white font-bold text-sm">{{ $item->nama }}</h3>
                                        <p class="text-white/70 text-xs mt-0.5">{{ $item->hargaFormatted }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </section>

@endsection

@push('scripts')
    <script>
        function copyLink() {
            navigator.clipboard.writeText(window.location.href).then(() => {
                showToast('Link berhasil disalin!');
            }).catch(() => {
                // Fallback
                const input = document.createElement('input');
                input.value = window.location.href;
                document.body.appendChild(input);
                input.select();
                document.execCommand('copy');
                document.body.removeChild(input);
                showToast('Link berhasil disalin!');
            });
        }

        function showToast(message) {
            // Hapus toast sebelumnya jika ada
            const existing = document.getElementById('toast-notification');
            if (existing) existing.remove();

            const toast = document.createElement('div');
            toast.id = 'toast-notification';
            toast.className =
                'toast-enter fixed top-20 right-4 z-[100] flex items-center gap-2.5 px-5 py-3 bg-gray-900 text-white text-sm font-medium rounded-berry shadow-lg';
            toast.innerHTML =
                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#4ade80" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>' +
                message;
            document.body.appendChild(toast);

            setTimeout(() => {
                toast.style.transition = 'opacity 0.3s, transform 0.3s';
                toast.style.opacity = '0';
                toast.style.transform = 'translateY(-10px)';
                setTimeout(() => toast.remove(), 300);
            }, 2500);
        }
    </script>
@endpush
