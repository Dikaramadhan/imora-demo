<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="description" content="Undangan Pernikahan Digital">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="preload" href="{{ asset('css/standard/serenity-luxe-style.css') }}" as="style">

    <!-- Hanya 2 font yang dipakai -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Amsterdam+Signature&display=swap"
        rel="stylesheet">

    <!-- Hanya Bootstrap Icons (Font Awesome dihapus) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">

    <title>@yield('title', 'Wedding Invitation')</title>

    <link rel="stylesheet" href="{{ asset('css/standard/serenity-luxe-style.css') }}">
</head>

<body>
    <div>
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>

    <!-- Lightbox -->
    <div id="lightbox" class="lightbox">
        <span class="close-lightbox">&times;</span>
        <img class="lightbox-content" id="lightbox-img" alt="Preview">
    </div>

    <!-- Cover Preloader (disederhanakan) -->
    <script>
        (function() {
            var coverShimmer = document.getElementById('cover-shimmer');
            var coverBg = document.getElementById('cover-bg');

            var img = new Image();
            img.onload = function() {
                if (coverBg) coverBg.classList.add('loaded');
                if (coverShimmer) setTimeout(function() {
                    coverShimmer.classList.add('hidden');
                }, 300);
            };
            img.onerror = function() {
                if (coverShimmer) coverShimmer.style.animation = 'none';
            };
            img.src = '/img/template/standard/serenity-luxe/cover/cover.jpg';

            // Font ready — tanpa polling
            if (document.fonts && document.fonts.ready) {
                document.fonts.ready.then(function() {
                    document.body.classList.add('fonts-loaded');
                });
            } else {
                document.body.classList.add('fonts-loaded');
            }
        })();
    </script>

    <!-- Main Logic -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // ── Swiper (tanpa polling) ──
            if (typeof Swiper !== 'undefined' && document.querySelector('.gallerySwiper')) {
                new Swiper('.gallerySwiper', {
                    loop: true,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    },
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false
                    }
                });
            }

            // ── Lightbox ──
            var lightbox = document.getElementById('lightbox');
            var lightboxImg = document.getElementById('lightbox-img');
            var closeBtn = document.querySelector('.close-lightbox');

            if (lightbox && lightboxImg && closeBtn) {
                document.querySelectorAll('.swiper-slide').forEach(function(slide) {
                    slide.addEventListener('click', function() {
                        var img = this.querySelector('img');
                        if (img) {
                            lightbox.style.display = 'flex';
                            lightbox.classList.add('active');
                            lightboxImg.src = img.src;
                        }
                    });
                });
                closeBtn.addEventListener('click', function() {
                    lightbox.style.display = 'none';
                    lightbox.classList.remove('active');
                });
                lightbox.addEventListener('click', function(e) {
                    if (e.target === lightbox) {
                        lightbox.style.display = 'none';
                        lightbox.classList.remove('active');
                    }
                });
            }

            // ── Wishes ──
            initGuestName();
            displayAllWishes();
            handleRSVPForm();
        });

        // ── Config ──
        var pathParts = window.location.pathname.split('/');
        var templateSlug = pathParts[pathParts.length - 1] || 'unknown';

        var CONFIG = {
            WISHES_PER_PAGE: 5,
            STORAGE_KEY: 'weddingWishes_serenity',
            WEDDING_DATE: '2026-04-05T09:00:00',
            MAX_WISHES: 100,
            API_ENDPOINT: '/api/rsvp'
        };

        var allWishes = [];

        function escapeHtml(text) {
            if (!text) return '';
            var div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }

        function formatDate(ts) {
            if (!ts) return '';
            var d = new Date(ts);
            return isNaN(d.getTime()) ? '' : d.toLocaleString('id-ID', {
                day: '2-digit',
                month: 'short',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        }

        function getGuestName() {
            return new URLSearchParams(window.location.search).get('to') || "Bapak/Ibu/Saudara/i";
        }

        function initGuestName() {
            var el = document.getElementById('guestNameDisplay');
            if (el) el.textContent = getGuestName();
        }

        // ── API / Storage ──
        function saveWishToServer(nama, status, ucapan) {
            var csrf = document.querySelector('meta[name="csrf-token"]');
            return fetch(CONFIG.API_ENDPOINT, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrf ? csrf.getAttribute('content') : ''
                    },
                    body: JSON.stringify({
                        template_slug: templateSlug,
                        name: nama,
                        status: status,
                        message: ucapan
                    })
                }).then(function(r) {
                    if (!r.ok) throw new Error('HTTP ' + r.status);
                    return r.json();
                }).then(function() {
                    return true;
                })
                .catch(function() {
                    return saveWishToStorage(nama, status, ucapan);
                });
        }

        function loadWishesFromServer() {
            return fetch(CONFIG.API_ENDPOINT + '?slug=' + templateSlug + '&per_page=100', {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(function(r) {
                    if (!r.ok) throw new Error();
                    return r.json();
                })
                .then(function(d) {
                    if (d.data && Array.isArray(d.data)) return d.data;
                    if (Array.isArray(d)) return d;
                    throw new Error();
                })
                .catch(function() {
                    return loadWishesFromStorage();
                });
        }

        function saveWishToStorage(nama, status, ucapan) {
            try {
                var w = JSON.parse(localStorage.getItem(CONFIG.STORAGE_KEY)) || [];
                w.unshift({
                    id: Date.now(),
                    name: nama,
                    status: status,
                    message: ucapan,
                    created_at: new Date().toISOString()
                });
                if (w.length > CONFIG.MAX_WISHES) w = w.slice(0, CONFIG.MAX_WISHES);
                localStorage.setItem(CONFIG.STORAGE_KEY, JSON.stringify(w));
                return true;
            } catch (e) {
                return false;
            }
        }

        function loadWishesFromStorage() {
            try {
                return JSON.parse(localStorage.getItem(CONFIG.STORAGE_KEY)) || [];
            } catch (e) {
                return [];
            }
        }

        // ── Wishes DOM ──
        function addWishToDOM(nama, status, ucapan, timestamp) {
            var list = document.getElementById('wishesList');
            if (!list) return;
            var empty = list.querySelector('.wishes-empty');
            if (empty) empty.remove();
            var sc = (status || '').toLowerCase().replace(/\s+/g, '-');
            var card = document.createElement('div');
            card.className = 'wish-card';
            card.innerHTML = '<div class="wish-header"><span class="wish-name">' + escapeHtml(nama) +
                '</span><span class="wish-status ' + sc + '">' + escapeHtml(status) + '</span></div>' + (ucapan ?
                    '<p class="wish-message">"' + escapeHtml(ucapan) + '"</p>' : '') + '<div class="wish-time">' +
                formatDate(timestamp) + '</div>';
            list.prepend(card);
        }

        function displayWishesWithLimit(page) {
            page = page || 1;
            var list = document.getElementById('wishesList');
            var pag = document.getElementById('paginationContainer');
            if (!list) return;
            var start = (page - 1) * CONFIG.WISHES_PER_PAGE,
                end = start + CONFIG.WISHES_PER_PAGE;
            list.innerHTML = '';
            if (!allWishes.length) {
                list.innerHTML = '<div class="wishes-empty">Belum ada ucapan. Jadilah yang pertama! 💕</div>';
                if (pag) pag.innerHTML = '';
                return;
            }
            allWishes.slice(start, end).forEach(function(w) {
                addWishToDOM(w.name || w.nama, w.status, w.message || w.ucapan, w.created_at || w.timestamp);
            });
            createPagination(page);
        }

        function createPagination(cur) {
            var pag = document.getElementById('paginationContainer');
            if (!pag) return;
            var total = Math.ceil(allWishes.length / CONFIG.WISHES_PER_PAGE);
            pag.innerHTML = '';
            if (total <= 1) return;
            var p = document.createElement('div');
            p.className = 'pagination';
            var prev = document.createElement('button');
            prev.className = 'pagination-btn';
            prev.innerHTML = '<i class="bi bi-chevron-left"></i>';
            prev.disabled = cur === 1;
            prev.addEventListener('click', function() {
                if (cur > 1) displayWishesWithLimit(cur - 1);
            });
            p.appendChild(prev);
            var s = Math.max(1, cur - 2),
                e = Math.min(total, s + 4);
            if (e - s + 1 < 5) s = Math.max(1, e - 4);
            if (s > 1) {
                p.appendChild(mkPageBtn(1, cur));
                if (s > 2) {
                    var d = document.createElement('span');
                    d.className = 'pagination-ellipsis';
                    d.textContent = '...';
                    p.appendChild(d);
                }
            }
            for (var i = s; i <= e; i++) p.appendChild(mkPageBtn(i, cur));
            if (e < total) {
                if (e < total - 1) {
                    var d2 = document.createElement('span');
                    d2.className = 'pagination-ellipsis';
                    d2.textContent = '...';
                    p.appendChild(d2);
                }
                p.appendChild(mkPageBtn(total, cur));
            }
            var next = document.createElement('button');
            next.className = 'pagination-btn';
            next.innerHTML = '<i class="bi bi-chevron-right"></i>';
            next.disabled = cur === total;
            next.addEventListener('click', function() {
                if (cur < total) displayWishesWithLimit(cur + 1);
            });
            p.appendChild(next);
            pag.appendChild(p);
        }

        function mkPageBtn(n, cur) {
            var b = document.createElement('button');
            b.className = 'pagination-btn' + (n === cur ? ' active' : '');
            b.textContent = n;
            b.addEventListener('click', function() {
                displayWishesWithLimit(n);
            });
            return b;
        }

        function displayAllWishes() {
            var list = document.getElementById('wishesList');
            if (!list) return;
            list.innerHTML = '<div class="wishes-loading">Memuat ucapan...</div>';
            loadWishesFromServer().then(function(w) {
                allWishes = w;
                displayWishesWithLimit(1);
            }).catch(function() {
                allWishes = loadWishesFromStorage();
                displayWishesWithLimit(1);
            });
        }

        function addWish(nama, status, ucapan) {
            var btn = document.querySelector('.btn-submit');
            if (!btn) return Promise.resolve(false);
            var orig = btn.innerHTML;
            btn.innerHTML = '<i class="bi bi-hourglass-split"></i> Mengirim...';
            btn.disabled = true;
            return saveWishToServer(nama, status, ucapan).then(function(ok) {
                if (ok) {
                    allWishes.unshift({
                        name: nama,
                        status: status,
                        message: ucapan,
                        created_at: new Date().toISOString()
                    });
                    displayWishesWithLimit(1);
                    return true;
                }
                return false;
            }).finally(function() {
                btn.innerHTML = orig;
                btn.disabled = false;
            });
        }

        // ── Open Invitation ──
        function openInvitation() {
            var cover = document.getElementById('cover');
            var main = document.getElementById('main-content');
            var mt = document.querySelector('.music-toggle');
            if (cover) cover.classList.add('hidden');
            if (main) {
                main.style.display = 'block';
                requestAnimationFrame(function() {
                    requestAnimationFrame(function() {
                        main.classList.add('active');
                    });
                });
            }
            setTimeout(function() {
                if (mt) mt.classList.add('active');
                var nav = document.getElementById('main-nav');
                if (nav) nav.style.display = 'flex';
                startCountdown();
                startBackgroundMusic();
            }, 900);
        }

        // ── Countdown ──
        var countdownTimer = null;

        function startCountdown() {
            if (countdownTimer) return;
            var target = new Date(CONFIG.WEDDING_DATE).getTime();

            function tick() {
                var now = new Date().getTime(),
                    dist = target - now;
                if (dist < 0) {
                    clearInterval(countdownTimer);
                    countdownTimer = null;
                    var g = document.querySelector('.countdown-grid');
                    if (g) g.innerHTML = '<h3 style="grid-column:1/-1;text-align:center;">Hari Bahagia Telah Tiba! 💕</h3>';
                    return;
                }
                var vals = {
                    days: Math.floor(dist / 864e5),
                    hours: Math.floor((dist % 864e5) / 36e5),
                    minutes: Math.floor((dist % 36e5) / 6e4),
                    seconds: Math.floor((dist % 6e4) / 1e3)
                };
                for (var k in vals) {
                    var el = document.getElementById(k);
                    if (el) el.textContent = vals[k].toString().padStart(2, '0');
                }
            }
            tick();
            countdownTimer = setInterval(tick, 1000);
        }

        // ── Music ──
        function toggleMusic() {
            var m = document.getElementById('bgMusic'),
                ic = document.getElementById('musicIcon');
            if (!m || !ic) return;
            if (m.paused) {
                m.play().then(function() {
                    ic.className = 'bi bi-music-note-beamed';
                }).catch(function() {});
            } else {
                m.pause();
                ic.className = 'bi bi-music-note';
            }
        }

        function startBackgroundMusic() {
            var m = document.getElementById('bgMusic'),
                ic = document.getElementById('musicIcon');
            if (m && ic) {
                m.play().then(function() {
                    ic.className = 'bi bi-music-note-beamed';
                }).catch(function() {
                    ic.className = 'bi bi-music-note';
                });
            }
        }

        // ── Clipboard ──
        function copyToClipboard(text, btn) {
            if (!btn) return;
            navigator.clipboard.writeText(text).then(function() {
                var ct = btn.querySelector('.copy-text');
                if (ct) {
                    var o = ct.textContent;
                    btn.classList.add('copied');
                    ct.textContent = 'Copied!';
                    setTimeout(function() {
                        btn.classList.remove('copied');
                        ct.textContent = o;
                    }, 2000);
                }
            }).catch(function() {
                var ta = document.createElement('textarea');
                ta.value = text;
                ta.style.cssText = 'position:fixed;opacity:0';
                document.body.appendChild(ta);
                ta.select();
                try {
                    document.execCommand('copy');
                } catch (e) {}
                document.body.removeChild(ta);
            });
        }

        function copyAddress(btn) {
            copyToClipboard("Alamat lokasi acara", btn);
        }

        // ── RSVP Form ──
        function handleRSVPForm() {
            var form = document.getElementById('rsvpForm');
            if (!form) return;
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                var self = this,
                    n = document.getElementById('nama'),
                    s = document.getElementById('status'),
                    u = document.getElementById('ucapan');
                var nama = n ? n.value.trim() : '',
                    status = s ? s.value : '',
                    ucapan = u ? u.value.trim() : '';
                if (!nama || !status) {
                    alert('⚠️ Mohon isi nama dan pilih status kehadiran!');
                    return;
                }
                addWish(nama, status, ucapan).then(function(ok) {
                    if (ok) {
                        alert('✅ Terima kasih ' + nama + '!\n\nUcapan Anda sudah tersimpan ❤️');
                        self.reset();
                        setTimeout(function() {
                            var wl = document.getElementById('wishesList');
                            if (wl) wl.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }, 300);
                    }
                });
            });
        }

        // ── Photo Modal ──
        function openModal(src, name) {
            var m = document.getElementById('photoModal'),
                img = document.getElementById('modalImg'),
                nm = document.getElementById('modalName');
            if (!m || !img || !nm) return;
            img.src = src;
            img.alt = name || '';
            nm.textContent = name || '';
            m.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(e) {
            var m = document.getElementById('photoModal');
            if (!m) return;
            if (e && e.target && e.target !== m) return;
            m.classList.remove('active');
            document.body.style.overflow = '';
        }

        // ── Escape key ──
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                var lb = document.getElementById('lightbox');
                if (lb) {
                    lb.style.display = 'none';
                    lb.classList.remove('active');
                }
                closeModal(null);
            }
        });

        // ── VH fix ──
        function setVH() {
            document.documentElement.style.setProperty('--vh', (window.innerHeight * 0.01) + 'px');
        }
        setVH();
        window.addEventListener('resize', setVH);
        window.addEventListener('orientationchange', setVH);

        // ── Expose globals ──
        window.openInvitation = openInvitation;
        window.toggleMusic = toggleMusic;
        window.copyToClipboard = copyToClipboard;
        window.copyAddress = copyAddress;
        window.openModal = openModal;
        window.closeModal = closeModal;
    </script>
</body>

</html>
