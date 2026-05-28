@php
    $routes = [
        'platinum-lite' => [
            'preview' => route('template.standard.platinum.lite'),
            'detail' => route('template.detail', 'platinum-lite'),
        ],
        'serene-glow' => [
            'preview' => route('template.standard.serene.glow'),
            'detail' => route('template.detail', 'serene-glow'),
        ],
        'aura-silver' => [
            'preview' => route('template.standard.aura.silver'),
            'detail' => route('template.detail', 'aura-silver'),
        ],
        'serenity-luxe' => [
            'preview' => route('template.standard.serenity.luxe'),
            'detail' => route('template.detail', 'serenity-luxe'),
        ],
        'platinum-minimal' => [
            'preview' => route('template.basic.platinum.minimal'),
            'detail' => route('template.detail', 'platinum-minimal'),
        ],
        'stellar-grace' => [
            'preview' => route('template.basic.stellar.grace'),
            'detail' => route('template.detail', 'stellar-grace'),
        ],
        'core-series' => [
            'preview' => route('template.basic.core.series'),
            'detail' => route('template.detail', 'core-series'),
        ],
        'moderna-lite' => [
            'preview' => route('template.basic.moderna.lite'),
            'detail' => route('template.detail', 'moderna-lite'),
        ],
    ];
@endphp

@push('scripts')
    <script>
        const templateRoutes = @json($routes);

        const catalogData = [{
                nama: 'Platinum Lite (Standard)',
                kategori: 'pernikahan',
                paket: 'standard',
                harga: 120000,
                hargaStr: 'Rp 120.000',
                deskripsi: 'Desain bunga klasik dengan sentuhan modern yang elegan untuk pernikahan impianmu.',
                fitur: 18,
                populer: true,
                seed: 'inv-platinum-lite',
                url: templateRoutes['platinum-lite'].detail,
                previewUrl: templateRoutes['platinum-lite'].preview
            },
            {
                nama: 'Serene Glow (Standard)',
                kategori: 'pernikahan',
                paket: 'standard',
                harga: 120000,
                hargaStr: 'Rp 120.000',
                deskripsi: 'Nuansa mewah dengan warna warm yang memukau untuk hari bahagiamu.',
                fitur: 18,
                populer: true,
                seed: 'inv-serene-glow',
                url: templateRoutes['serene-glow'].detail,
                previewUrl: templateRoutes['serene-glow'].preview
            },
            {
                nama: 'Aura Silver (Standard)',
                kategori: 'pernikahan',
                paket: 'standard',
                harga: 120000,
                hargaStr: 'Rp 120.000',
                deskripsi: 'Clean dan minimalis, sempurna untuk pasangan yang menyukai kesederhanaan.',
                fitur: 18,
                populer: true,
                seed: 'inv-aura-silver',
                url: templateRoutes['aura-silver'].detail,
                previewUrl: templateRoutes['aura-silver'].preview
            },
            {
                nama: 'Serenity Luxe (Standard)',
                kategori: 'pernikahan',
                paket: 'standard',
                harga: 130000,
                hargaStr: 'Rp 130.000',
                deskripsi: 'Kemewahan ala kerajaan dengan aksen dan detail yang sangat premium.',
                fitur: 18,
                populer: true,
                seed: 'inv-serenity-luxe',
                url: templateRoutes['serenity-luxe'].detail,
                previewUrl: templateRoutes['serenity-luxe'].preview
            },
            {
                nama: 'Platinum Minimal (Basic)',
                kategori: 'pernikahan',
                paket: 'basic',
                harga: 59000,
                hargaStr: 'Rp 59.000',
                deskripsi: 'Tampilan minimalis bersih dengan tipografi elegan, cocok untuk pasangan yang suka kesederhanaan.',
                fitur: 11,
                populer: false,
                seed: 'inv-platinum-minimal',
                url: templateRoutes['platinum-minimal'].detail,
                previewUrl: templateRoutes['platinum-minimal'].preview
            },
            {
                nama: 'Stellar Grace (Basic)',
                kategori: 'pernikahan',
                paket: 'basic',
                harga: 59000,
                hargaStr: 'Rp 59.000',
                deskripsi: 'Sentuhan bintang dan warna lembut yang romantis, pas untuk undangan dengan kesan hangat.',
                fitur: 11,
                populer: false,
                seed: 'inv-stellar-grace',
                url: templateRoutes['stellar-grace'].detail,
                previewUrl: templateRoutes['stellar-grace'].preview
            },
            {
                nama: 'Core Series (Basic)',
                kategori: 'pernikahan',
                paket: 'basic',
                harga: 59000,
                hargaStr: 'Rp 59.000',
                deskripsi: 'Desain serbaguna dan modern, mudah dibaca di semua ukuran layar.',
                fitur: 11,
                populer: false,
                seed: 'inv-core-series',
                url: templateRoutes['core-series'].detail,
                previewUrl: templateRoutes['core-series'].preview
            },
            {
                nama: 'Moderna Lite (Basic)',
                kategori: 'pernikahan',
                paket: 'basic',
                harga: 59000,
                hargaStr: 'Rp 59.000',
                deskripsi: 'Gaya kontemporer dengan layout yang rapi dan elemen dekoratif yang tidak berlebihan.',
                fitur: 11,
                populer: false,
                seed: 'inv-moderna-lite',
                url: templateRoutes['moderna-lite'].detail,
                previewUrl: templateRoutes['moderna-lite'].preview
            },
        ];

        let activeCategory = 'semua';

        function getPaketBadge(paket) {
            if (paket === 'premium') {
                return '<span class="inline-flex items-center gap-0.5 px-2 py-0.5 bg-amber-400/90 backdrop-blur-sm text-amber-900 text-[10px] font-bold rounded-full uppercase tracking-wider">✦ Premium</span>';
            }
            if (paket === 'standard') {
                return '<span class="inline-flex items-center px-2 py-0.5 bg-primary-600/90 backdrop-blur-sm text-white text-[10px] font-bold rounded-full uppercase tracking-wider">Standard</span>';
            }
            return '<span class="inline-flex items-center px-2 py-0.5 bg-gray-500/90 backdrop-blur-sm text-white text-[10px] font-bold rounded-full uppercase tracking-wider">Basic</span>';
        }

        function createCardHTML(item) {
            const imgUrl = `/img/template/${item.seed}.png`;
            const kategoriLabel = item.kategori.replace('_', ' ');
            const altText = `Template undangan digital ${item.nama} — kategori ${kategoriLabel}, harga ${item.hargaStr}`;
            return `
            <div class="bg-white rounded-berry-lg shadow-card card-lift overflow-hidden h-full flex flex-col">
                <div class="relative aspect-[3/4] overflow-hidden">
                    <div class="img-wrapper w-full h-full">
                        <img src="${imgUrl}" alt="${altText}"
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                             loading="lazy"
                             onload="this.classList.add('loaded')"
                             onerror="this.classList.add('error'); this.src='https://picsum.photos/seed/${item.seed}/400/530.jpg'">
                        <div class="img-skeleton skeleton absolute inset-0"></div>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute top-3 left-3 flex flex-col gap-1.5">
                        ${item.populer ? '<span class="inline-flex items-center gap-1 px-2 py-0.5 bg-amber-400/90 backdrop-blur-sm text-amber-900 text-[10px] font-bold rounded-full uppercase tracking-wider"><i data-lucide="star" class="w-2.5 h-2.5 fill-current"></i> Populer</span>' : ''}
                        ${getPaketBadge(item.paket)}
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
            </div>`;
        }

        function renderPopular() {
            const grid = document.getElementById('popularGrid');
            if (!grid) return;
            const popular = catalogData.filter(i => i.populer).slice(0, 4);
            grid.innerHTML = '';
            popular.forEach(item => {
                const wrapper = document.createElement('a');
                wrapper.href = item.url || `/template/${item.seed.replace('inv-', '')}`;
                wrapper.className = 'group block';
                wrapper.setAttribute('aria-label', `Lihat detail ${item.nama}`);
                wrapper.innerHTML = `
                <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                    <div class="relative aspect-[3/4] overflow-hidden">
                        <img src="/img/template/${item.seed}.png" alt="${item.nama}"
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                             loading="lazy"
                             onerror="this.src='https://picsum.photos/seed/${item.seed}/400/530.jpg'">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                        <div class="absolute top-2.5 left-2.5 flex flex-col gap-1">
                            <span class="inline-flex items-center gap-1 px-2 py-1 bg-amber-400 text-amber-900 text-[10px] font-bold rounded-lg">
                                <i data-lucide="star" class="w-2.5 h-2.5 fill-current"></i> BEST
                            </span>
                            ${getPaketBadge(item.paket)}
                        </div>
                        <div class="absolute bottom-2.5 left-2.5 right-2.5">
                            <h3 class="text-white font-bold text-sm leading-tight truncate">${item.nama}</h3>
                            <p class="text-white/80 text-xs mt-0.5">${item.hargaStr}</p>
                        </div>
                    </div>
                </div>`;
                grid.appendChild(wrapper);
            });
            lucide.createIcons();
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
                const wrapper = document.createElement('a');
                wrapper.href = item.url || `/template/${item.seed.replace('inv-', '')}`;
                wrapper.className = `group reveal reveal-delay-${(i % 4) + 1}`;
                wrapper.setAttribute('aria-label', `Lihat detail ${item.nama}`);
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
                const countEl = btn.querySelector('.cat-count');
                if (countEl && counts[btn.dataset.cat] !== undefined) {
                    countEl.textContent = counts[btn.dataset.cat];
                }
            });
        }

        document.querySelectorAll('.cat-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                activeCategory = this.dataset.cat;
                document.querySelectorAll('.cat-btn').forEach(b => {
                    b.className =
                        'cat-btn inline-flex items-center gap-1.5 px-3 sm:px-4 py-2 rounded-xl text-sm font-medium transition-all bg-gray-100 text-gray-600 hover:bg-primary-50 hover:text-primary-600 whitespace-nowrap';
                    b.setAttribute('aria-pressed', 'false');
                });
                this.className =
                    'cat-btn inline-flex items-center gap-1.5 px-3 sm:px-4 py-2 rounded-xl text-sm font-medium transition-all bg-primary-600 text-white shadow-md shadow-primary-500/20 whitespace-nowrap';
                this.setAttribute('aria-pressed', 'true');
                renderCatalog(activeCategory);
            });
        });

        document.getElementById('sortSelect')?.addEventListener('change', function() {
            const val = this.value;
            const sorted = [...catalogData];
            if (val === 'terbaru') sorted.sort((a, b) => b.harga - a.harga);
            if (val === 'termurah') sorted.sort((a, b) => a.harga - b.harga);
            if (val === 'termahal') sorted.sort((a, b) => b.harga - a.harga);
            if (val === 'populer') sorted.sort((a, b) => (b.populer ? 1 : 0) - (a.populer ? 1 : 0));
            const backup = [...catalogData];
            catalogData.length = 0;
            catalogData.push(...sorted);
            renderCatalog(activeCategory);
            catalogData.length = 0;
            catalogData.push(...backup);
        });

        function triggerHeroSearch() {
            const q = document.getElementById('heroSearch')?.value.trim().toLowerCase();
            document.getElementById('katalog')?.scrollIntoView({
                behavior: 'smooth'
            });
            if (!q) return;
            const grid = document.getElementById('catalogGrid');
            const filtered = catalogData.filter(i =>
                i.nama.toLowerCase().includes(q) ||
                i.deskripsi.toLowerCase().includes(q) ||
                i.kategori.toLowerCase().includes(q) ||
                i.paket.toLowerCase().includes(q)
            );
            grid.innerHTML = '';
            if (filtered.length === 0) {
                grid.innerHTML = `
                <div class="col-span-full text-center py-16">
                    <div class="w-16 h-16 bg-berry-bg rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="search-x" class="w-7 h-7 text-berry-muted"></i>
                    </div>
                    <h3 class="text-base font-bold text-berry-dark mb-2">Tidak ada hasil untuk "${q}"</h3>
                    <p class="text-berry-muted text-sm">Coba kata kunci lain.</p>
                </div>`;
                lucide.createIcons();
                updateCatalogCount(0);
                return;
            }
            filtered.forEach(item => {
                const wrapper = document.createElement('a');
                wrapper.href = item.url || `/template/${item.seed.replace('inv-', '')}`;
                wrapper.className = 'group reveal animate-in';
                wrapper.setAttribute('aria-label', `Lihat detail ${item.nama}`);
                wrapper.innerHTML = createCardHTML(item);
                grid.appendChild(wrapper);
            });
            lucide.createIcons();
            updateCatalogCount(filtered.length);
            document.getElementById('heroSearch').blur();
        }

        document.getElementById('heroSearch')?.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                triggerHeroSearch();
            }
        });

        document.querySelector('a[href="#katalog"].absolute')?.addEventListener('click', function(e) {
            e.preventDefault();
            triggerHeroSearch();
        });

        function toggleFaq(btn) {
            const item = btn.closest('.faq-item');
            const content = item.querySelector('.faq-content');
            const icon = item.querySelector('.faq-icon');
            const isOpen = !content.classList.contains('hidden');
            document.querySelectorAll('.faq-item').forEach(faq => {
                faq.querySelector('.faq-content').classList.add('hidden');
                faq.querySelector('.faq-icon').style.transform = 'rotate(0deg)';
                faq.querySelector('.faq-toggle').classList.remove('bg-gray-50');
                faq.querySelector('.faq-toggle').setAttribute('aria-expanded', 'false');
            });
            if (!isOpen) {
                content.classList.remove('hidden');
                icon.style.transform = 'rotate(180deg)';
                btn.classList.add('bg-gray-50');
                btn.setAttribute('aria-expanded', 'true');
            }
        }

        // Init
        document.addEventListener('DOMContentLoaded', function() {
            updateFilterCounts();
            renderCatalog('semua');
            renderPopular();
        });
    </script>

    <script>
        // ===== Testimoni Slider =====
        (function() {
            const track = document.getElementById('testiTrack');
            const slider = document.getElementById('testiSlider');
            const dotsContainer = document.getElementById('testiDots');
            if (!track || !slider) return;

            const slides = track.querySelectorAll('.testi-slide');
            let current = 0;
            let autoplayTimer;

            function getSlidesPerView() {
                if (window.innerWidth >= 1024) return 3;
                if (window.innerWidth >= 640) return 2;
                return 1;
            }

            function getTotal() {
                return Math.ceil(slides.length / getSlidesPerView());
            }

            function updateSlideWidth() {
                const perView = getSlidesPerView();
                slides.forEach(s => {
                    s.style.width = (100 / perView) + '%';
                });
            }

            function buildDots() {
                dotsContainer.innerHTML = '';
                for (let i = 0; i < getTotal(); i++) {
                    const dot = document.createElement('button');
                    dot.className = 'w-2 h-2 rounded-full transition-all duration-300 ' + (i === current ?
                        'bg-primary-600 w-5' : 'bg-gray-300');
                    dot.addEventListener('click', (function(idx) {
                        return function() {
                            goTo(idx);
                        };
                    })(i));
                    dotsContainer.appendChild(dot);
                }
            }

            function updateDots() {
                dotsContainer.querySelectorAll('button').forEach(function(dot, i) {
                    dot.className = 'w-2 h-2 rounded-full transition-all duration-300 ' + (i === current ?
                        'bg-primary-600 w-5' : 'bg-gray-300');
                });
            }

            function goTo(index) {
                const total = getTotal();
                current = (index + total) % total;
                const perView = getSlidesPerView();
                track.style.transform = 'translateX(-' + (current * (100 / perView) * perView) + '%)';
                updateDots();
                resetAutoplay();
            }

            function resetAutoplay() {
                clearInterval(autoplayTimer);
                autoplayTimer = setInterval(function() {
                    goTo(current + 1);
                }, 4000);
            }

            document.getElementById('testiPrev')?.addEventListener('click', function() {
                goTo(current - 1);
            });
            document.getElementById('testiNext')?.addEventListener('click', function() {
                goTo(current + 1);
            });

            let touchStartX = 0;
            slider.addEventListener('touchstart', function(e) {
                touchStartX = e.touches[0].clientX;
            }, {
                passive: true
            });

            slider.addEventListener('touchend', function(e) {
                const diff = touchStartX - e.changedTouches[0].clientX;
                if (Math.abs(diff) > 50) {
                    if (diff > 0) {
                        goTo(current + 1);
                    } else {
                        goTo(current - 1);
                    }
                }
            });

            window.addEventListener('resize', function() {
                updateSlideWidth();
                buildDots();
                goTo(0);
            });

            updateSlideWidth();
            buildDots();
            resetAutoplay();
        })();
    </script>
@endpush
