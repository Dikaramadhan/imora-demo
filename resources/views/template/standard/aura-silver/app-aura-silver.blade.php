<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description"
        content="Dengan memohon rahmat dan ridho Allah SWT, kami mengundang Anda untuk menghadiri acara pernikahan kami. Sabtu, 15 Agustus 2026">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Aura Silver - Wedding of Rizky & Nabila</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Inter:wght@300;400;600&family=Sacramento&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Favicon -->
    <link rel="icon" href="https://rizky-nabila.imora.id/img/logo.png" type="image/png">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="The Wedding of Rizky & Nabila">
    <meta property="og:description"
        content="Dengan memohon rahmat dan ridho Allah SWT, kami mengundang Anda untuk menghadiri acara pernikahan kami. Sabtu, 15 Agustus 2026">
    <meta property="og:image" content="https://rizky-nabila.imora.id/img/thumbnail.jpeg">
    <meta property="og:image:alt" content="Wedding Photo - Rizky & Nabila">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:url" content="https://rizky-nabila.imora.id/">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Wedding Invitation - Rizky & Nabila">
    <meta property="og:locale" content="id_ID">
    <meta property="og:image:type" content="image/jpeg">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="The Wedding of Rizky & Nabila">
    <meta name="twitter:description" content="Sabtu, 15 Agustus 2026, Jawa Barat">
    <meta name="twitter:image" content="https://rizky-nabila.imora.id/img/thumbnail.jpeg">
    <meta name="twitter:site" content="@imoraid">

    <link rel="stylesheet" href="{{ asset('css/standard/aura-silver-style.css') }}">

    <style>
        /* ✅ FIX: Pastikan wrapper ikut constraint body */
        body>div {
            max-width: inherit;
            overflow-x: hidden;
        }
    </style>
</head>

<body class="no-scroll">

    <!-- ✅ FIX: Hapus wrapper div kosong, langsung yield -->
    @yield('content')

    <!-- ========== SCRIPTS ========== -->
    <script>
        // ========================================
        // 1. GLOBAL VARIABLES & CONFIGURATION
        // ========================================
        const CONFIG = {
            WISHES_PER_PAGE: 5,
            STORAGE_KEY: 'weddingWishes_rizky_nabila',
            WEDDING_DATE: '2026-08-15T08:00:00',
            MAX_WISHES: 100,
            API_ENDPOINT: '/api/rsvps'
        };

        let currentPage = 1;
        let allWishes = [];
        let isSubmitting = false;

        // ========================================
        // 2. UTILITY FUNCTIONS
        // ========================================

        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }

        function formatDate(timestamp) {
            const date = timestamp ? new Date(timestamp) : new Date();
            return date.toLocaleString('id-ID', {
                day: '2-digit',
                month: 'short',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        }

        function getGuestName() {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get('to') || "Bapak/Ibu/Saudara/i";
        }

        function getInitials(nama) {
            return (nama || '')
                .split(' ')
                .slice(0, 2)
                .map(w => w[0] ? w[0].toUpperCase() : '')
                .join('');
        }

        // ========================================
        // 3. API FUNCTIONS
        // ========================================

        function saveWishToServer(nama, status, ucapan) {
            return fetch(CONFIG.API_ENDPOINT, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ?? ''
                    },
                    body: JSON.stringify({
                        name: nama,
                        status: status,
                        message: ucapan
                    })
                })
                .then(res => res.ok ? res.json() : res.json().then(err => {
                    throw err;
                }))
                .then(data => {
                    if (data.success) return true;
                    throw new Error(data.message || 'Gagal menyimpan RSVP');
                });
        }

        function loadWishesFromServer() {
            return fetch(CONFIG.API_ENDPOINT, {
                    headers: {
                        'Accept': 'application/json'
                    }
                })
                .then(res => res.ok ? res.json() : res.json().then(err => {
                    throw err;
                }))
                .then(data => {
                    if (data.success) return data.data;
                    throw new Error(data.message || 'Gagal mengambil data RSVP');
                })
                .catch(error => {
                    console.error('Server error, falling back to localStorage:', error);
                    return loadWishesFromStorage();
                });
        }

        // ========================================
        // 4. STORAGE FUNCTIONS
        // ========================================

        function saveWishToStorage(nama, status, ucapan) {
            try {
                let wishes = JSON.parse(localStorage.getItem(CONFIG.STORAGE_KEY)) || [];
                wishes.unshift({
                    id: Date.now(),
                    nama,
                    status,
                    ucapan,
                    timestamp: new Date().toISOString()
                });
                if (wishes.length > CONFIG.MAX_WISHES) wishes = wishes.slice(0, CONFIG.MAX_WISHES);
                localStorage.setItem(CONFIG.STORAGE_KEY, JSON.stringify(wishes));
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

        // ========================================
        // 5. WISHES DISPLAY
        // ========================================

        function addWishToDOM(nama, status, ucapan, timestamp) {
            const wishesList = document.getElementById('wishesList');
            if (!wishesList) return;

            const emptyMsg = wishesList.querySelector('.wishes-empty');
            if (emptyMsg) emptyMsg.remove();

            const formattedDate = formatDate(timestamp);
            const statusRaw = (status || '').toLowerCase().replace(/\s+/g, '-');
            const statusLabel = {
                'hadir': 'Hadir',
                'tidak-hadir': 'Tidak Hadir',
                'masih-ragu': 'Masih Ragu'
            } [statusRaw] || escapeHtml(status);

            const wishCard = document.createElement('div');
            wishCard.classList.add('wish-card');
            wishCard.innerHTML = `
                <div class="wish-header">
                    <div class="wish-avatar">${getInitials(nama)}</div>
                    <div class="wish-info">
                        <h4>${escapeHtml(nama)}</h4>
                        <span class="wish-time">${formattedDate}</span>
                    </div>
                    <span class="wish-status ${statusRaw}">${statusLabel}</span>
                </div>
                ${ucapan
                    ? `<p class="wish-message">"${escapeHtml(ucapan)}"</p>`
                    : `<p class="wish-message" style="color:rgba(0,0,0,0.35);font-style:normal;">(Tidak ada ucapan)</p>`
                }
            `;
            wishesList.appendChild(wishCard);
        }

        // ========================================
        // 6. PAGINATION
        // ========================================

        function getTotalPages() {
            return Math.max(1, Math.ceil(allWishes.length / CONFIG.WISHES_PER_PAGE));
        }

        function getPageNumbers(current, total) {
            if (total <= 5) return Array.from({
                length: total
            }, (_, i) => i + 1);
            if (current <= 3) return [1, 2, 3, 4, '...', total];
            if (current >= total - 2) return [1, '...', total - 3, total - 2, total - 1, total];
            return [1, '...', current - 1, current, current + 1, '...', total];
        }

        function renderPagination() {
            const pagination = document.getElementById('wsPagination');
            const pageNumbers = document.getElementById('wsPageNumbers');
            const prevBtn = document.getElementById('wsPrev');
            const nextBtn = document.getElementById('wsNext');
            if (!pagination || !pageNumbers) return;

            const total = getTotalPages();
            if (total <= 1) {
                pagination.style.display = 'none';
                return;
            }

            pagination.style.display = 'flex';
            prevBtn.disabled = currentPage === 1;
            nextBtn.disabled = currentPage === total;

            pageNumbers.innerHTML = '';
            getPageNumbers(currentPage, total).forEach(p => {
                if (p === '...') {
                    const el = document.createElement('span');
                    el.className = 'ws-page-ellipsis';
                    el.textContent = '···';
                    pageNumbers.appendChild(el);
                } else {
                    const btn = document.createElement('button');
                    btn.className = 'ws-page-num' + (p === currentPage ? ' active' : '');
                    btn.textContent = p;
                    btn.onclick = () => goToPage(p);
                    pageNumbers.appendChild(btn);
                }
            });
        }

        function displayWishesWithLimit(page = 1) {
            const wishesList = document.getElementById('wishesList');
            if (!wishesList) return;
            wishesList.innerHTML = '';

            if (allWishes.length === 0) {
                wishesList.innerHTML = '<div class="wishes-empty">Belum ada ucapan. Jadilah yang pertama! 💕</div>';
                renderPagination();
                return;
            }

            const start = (page - 1) * CONFIG.WISHES_PER_PAGE;
            allWishes.slice(start, start + CONFIG.WISHES_PER_PAGE).forEach(w => {
                addWishToDOM(w.name || w.nama, w.status, w.message || w.ucapan, w.created_at || w.timestamp);
            });
            renderPagination();
        }

        function goToPage(page) {
            const total = getTotalPages();
            if (page < 1 || page > total) return;
            currentPage = page;
            displayWishesWithLimit(currentPage);
            document.getElementById('wishesList')?.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }

        function changePage(direction) {
            goToPage(currentPage + direction);
        }

        function displayAllWishes() {
            const wishesList = document.getElementById('wishesList');
            if (!wishesList) return;
            wishesList.innerHTML = '<div class="wishes-loading">Memuat ucapan...</div>';

            loadWishesFromServer()
                .then(wishes => {
                    allWishes = wishes;
                    currentPage = 1;
                    displayWishesWithLimit(1);
                })
                .catch(() => {
                    allWishes = loadWishesFromStorage();
                    currentPage = 1;
                    displayWishesWithLimit(1);
                });
        }

        function addWish(nama, status, ucapan) {
            if (isSubmitting) return Promise.resolve(false);
            isSubmitting = true;

            const submitBtn = document.querySelector('.btn-submit');
            const originalHTML = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';
            submitBtn.disabled = true;

            return saveWishToServer(nama, status, ucapan)
                .then(success => {
                    if (success) {
                        allWishes.unshift({
                            name: nama,
                            status,
                            message: ucapan,
                            created_at: new Date().toISOString()
                        });
                        currentPage = 1;
                        displayWishesWithLimit(1);
                        return true;
                    }
                    return false;
                })
                .catch(error => {
                    alert('❌ ' + (error?.message || 'Gagal mengirim. Silakan coba lagi.'));
                    return false;
                })
                .finally(() => {
                    submitBtn.innerHTML = originalHTML;
                    submitBtn.disabled = false;
                    isSubmitting = false;
                });
        }

        // ========================================
        // 7. OPEN INVITATION
        // ========================================

        function openInvitation() {
            const cover = document.getElementById('cover');
            if (cover) {
                cover.classList.add('hide');
                setTimeout(() => {
                    cover.style.display = 'none';
                }, 1200);
            }
            document.body.classList.remove('no-scroll');
            document.documentElement.classList.remove('no-scroll');

            setTimeout(() => {
                const mainContent = document.getElementById('main-content');
                const musicToggle = document.getElementById('musicToggle');
                if (mainContent) mainContent.classList.add('active');
                if (musicToggle) musicToggle.classList.add('active');
                initializeAnimations();
                startCountdown();
                startBackgroundMusic();
                spawnPetals();
                setTimeout(() => {
                    if (window.playMusicDragHint) window.playMusicDragHint();
                }, 2000);
            }, 800);
        }

        function initializeAnimations() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animated', 'visible');
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -100px 0px'
            });

            document.querySelectorAll(
                    '.section-title, .quote-text, .couple-card, .countdown-item, .event-card, .gallery-item, .rsvp-form, .video-wrapper, .gift-card, .map-card, .wish-card, .reveal'
                )
                .forEach(el => observer.observe(el));

            const heroContent = document.querySelector('.hero-content');
            if (heroContent) setTimeout(() => heroContent.classList.add('show'), 500);
        }

        // ========================================
        // 8. COUNTDOWN
        // ========================================

        function startCountdown() {
            function tick() {
                const target = new Date(CONFIG.WEDDING_DATE).getTime();
                const distance = target - Date.now();
                if (distance <= 0) {
                    ['cd-d', 'cd-h', 'cd-m', 'cd-s', 'days', 'hours', 'minutes', 'seconds'].forEach(id => {
                        const el = document.getElementById(id);
                        if (el) el.textContent = '00';
                    });
                    return;
                }
                const values = {
                    days: Math.floor(distance / 86400000),
                    hours: Math.floor((distance % 86400000) / 3600000),
                    minutes: Math.floor((distance % 3600000) / 60000),
                    seconds: Math.floor((distance % 60000) / 1000)
                };
                const idMap = {
                    days: ['days', 'cd-d'],
                    hours: ['hours', 'cd-h'],
                    minutes: ['minutes', 'cd-m'],
                    seconds: ['seconds', 'cd-s']
                };
                for (const [key, val] of Object.entries(values)) {
                    idMap[key].forEach(id => {
                        const el = document.getElementById(id);
                        if (el) el.textContent = String(val).padStart(2, '0');
                    });
                }
            }
            tick();
            setInterval(tick, 1000);
        }

        // ========================================
        // 9. MUSIC
        // ========================================

        function toggleMusic() {
            const audio = document.getElementById('bgMusic');
            const icon = document.getElementById('musicIcon');
            if (!audio) return;
            if (audio.paused) {
                audio.play().then(() => {
                    if (icon) icon.className = 'bi bi-pause-fill';
                }).catch(() => {});
            } else {
                audio.pause();
                if (icon) icon.className = 'bi bi-music-note-beamed';
            }
        }

        function startBackgroundMusic() {
            const audio = document.getElementById('bgMusic');
            const icon = document.getElementById('musicIcon');
            if (!audio) return;
            audio.play().then(() => {
                if (icon) icon.className = 'bi bi-pause-fill';
            }).catch(() => {
                if (icon) icon.className = 'bi bi-music-note-beamed';
            });
        }

        // ========================================
        // 10. CLIPBOARD
        // ========================================

        function copyToClipboard(text, btn) {
            const copyText = btn.querySelector('.copy-text');
            const origText = copyText ? copyText.textContent : '';

            function onSuccess() {
                btn.classList.add('copied');
                if (copyText) copyText.textContent = 'Tersalin ✓';
                setTimeout(() => {
                    btn.classList.remove('copied');
                    if (copyText) copyText.textContent = origText;
                }, 2000);
            }

            function onFail() {
                alert('Salin manual:\n' + text);
            }

            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(text).then(onSuccess).catch(() => fallbackCopy(text, onSuccess, onFail));
            } else {
                fallbackCopy(text, onSuccess, onFail);
            }
        }

        function fallbackCopy(text, onSuccess, onFail) {
            const ta = document.createElement('textarea');
            ta.value = text;
            ta.setAttribute('readonly', '');
            ta.style.cssText = 'position:fixed;top:-9999px;left:-9999px;opacity:0;';
            document.body.appendChild(ta);
            if (navigator.userAgent.match(/ipad|iphone/i)) {
                const range = document.createRange();
                range.selectNodeContents(ta);
                const sel = window.getSelection();
                sel.removeAllRanges();
                sel.addRange(range);
                ta.setSelectionRange(0, 999999);
            } else {
                ta.select();
            }
            let ok = false;
            try {
                ok = document.execCommand('copy');
            } catch (e) {}
            document.body.removeChild(ta);
            ok ? onSuccess() : onFail();
        }

        function copyAddress(btn) {
            copyToClipboard("Jl. Mawar Indah No. 12, Kelurahan Sukamaju, Kecamatan Bogor Selatan, Kota Bogor, Jawa Barat",
                btn);
        }

        // ========================================
        // 11. VIDEO AUTOPLAY
        // ========================================

        function setupVideoAutoplay() {
            const videoWrapper = document.querySelector('.video-wrapper');
            const iframe = videoWrapper?.querySelector('iframe');
            if (!videoWrapper || !iframe) return;

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    const src = iframe.getAttribute('src');
                    if (entry.isIntersecting) {
                        if (src && !src.includes('autoplay=1')) {
                            iframe.setAttribute('src', src + (src.includes('?') ? '&' : '?') +
                                'autoplay=1&mute=1');
                        }
                    } else if (src && src.includes('autoplay=1')) {
                        iframe.setAttribute('src', src.replace(/[?&]autoplay=1&mute=1/, ''));
                    }
                });
            }, {
                threshold: 0.5
            });
            observer.observe(videoWrapper);
        }

        // ========================================
        // 12. FORM HANDLER
        // ========================================

        function handleRSVPForm() {
            const rsvpForm = document.getElementById('rsvpForm');
            if (!rsvpForm) return;

            rsvpForm.addEventListener('submit', function(e) {
                e.preventDefault();
                if (isSubmitting) return;

                const nama = document.getElementById('nama')?.value.trim();
                const status = document.getElementById('status')?.value;
                const ucapan = document.getElementById('ucapan')?.value.trim();

                if (!nama || !status) {
                    alert('⚠️ Mohon isi nama dan pilih status kehadiran!');
                    return;
                }

                const sessionKey = 'rsvp_submitted_' + nama.toLowerCase().replace(/\s+/g, '_');
                if (sessionStorage.getItem(sessionKey)) {
                    alert('⚠️ Kamu sudah mengirimkan RSVP sebelumnya!');
                    return;
                }

                addWish(nama, status, ucapan).then(success => {
                    if (success) {
                        sessionStorage.setItem(sessionKey, '1');
                        alert(
                            `✅ Terima kasih ${nama}!\n\nStatus: ${status}\n\nUcapan Anda sudah tersimpan ❤️`
                        );
                        this.reset();
                        setTimeout(() => {
                            document.getElementById('wishesList')?.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }, 300);
                    }
                });
            });
        }

        // ========================================
        // 13. TIMELINE
        // ========================================

        function initTimelineAnimations() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.2,
                rootMargin: '0px 0px -50px 0px'
            });

            document.querySelectorAll('.timeline-item').forEach(item => observer.observe(item));
        }

        function addTimelineItem(date, title, text) {
            const timeline = document.querySelector('.timeline');
            if (!timeline) return;
            const item = document.createElement('div');
            item.className = 'timeline-item';
            item.innerHTML =
                `<div class="timeline-dot"></div><div class="timeline-content"><div class="timeline-date">${date}</div><h3 class="timeline-title">${title}</h3><p class="timeline-text">${text}</p></div>`;
            timeline.appendChild(item);
        }

        function updateActiveTimeline() {
            const scrollPosition = window.scrollY + window.innerHeight / 2;
            document.querySelectorAll('.timeline-item').forEach(item => {
                const dot = item.querySelector('.timeline-dot');
                const inView = scrollPosition >= item.offsetTop && scrollPosition <= item.offsetTop + item
                    .offsetHeight;
                item.classList.toggle('active', inView);
                if (dot) dot.style.transform = `translateX(-50%) scale(${inView ? 1.3 : 1})`;
            });
        }

        // ========================================
        // 14. PETALS
        // ========================================

        function spawnPetals() {
            const symbols = ['✿', '✾', '❀', '✽'];
            let count = 0;
            const interval = setInterval(() => {
                if (count++ > 16) {
                    clearInterval(interval);
                    return;
                }
                const p = document.createElement('span');
                p.className = 'petal';
                p.textContent = symbols[Math.floor(Math.random() * symbols.length)];
                p.style.cssText =
                    `left:${Math.random()*100}vw;top:-20px;animation-duration:${4+Math.random()*4}s;animation-delay:${Math.random()*2}s;font-size:${10+Math.random()*8}px;color:rgba(201,169,110,0.6)`;
                document.body.appendChild(p);
                setTimeout(() => p.remove(), 8000);
            }, 220);
        }

        // ========================================
        // 15. PARTICLES
        // ========================================

        function spawnParticles() {
            const field = document.getElementById('particleField');
            if (!field) return;
            for (let i = 0; i < 14; i++) {
                const p = document.createElement('div');
                p.classList.add('particle');
                const size = 2 + Math.random() * 3.5;
                p.style.cssText =
                    `width:${size}px;height:${size}px;left:${Math.random()*100}%;bottom:-10px;animation-duration:${13+Math.random()*16}s;animation-delay:-${Math.random()*14}s;opacity:${0.28+Math.random()*0.55};`;
                field.appendChild(p);
            }
        }

        // ========================================
        // 16. DRAGGABLE MUSIC BUTTON
        // ========================================

        function initDraggableMusicBtn() {
            const btn = document.getElementById('musicToggle');
            if (!btn) return;

            let isDragging = false,
                hasMoved = false;
            let startX, startY, startLeft, startTop;

            btn.style.position = 'fixed';
            btn.style.cursor = 'grab';
            btn.style.userSelect = 'none';
            btn.style.touchAction = 'none';

            btn.addEventListener('mousedown', (e) => {
                isDragging = true;
                hasMoved = false;
                btn.style.cursor = 'grabbing';
                startX = e.clientX;
                startY = e.clientY;
                startLeft = btn.getBoundingClientRect().left;
                startTop = btn.getBoundingClientRect().top;
                e.preventDefault();
            });

            document.addEventListener('mousemove', (e) => {
                if (!isDragging) return;
                const dx = e.clientX - startX,
                    dy = e.clientY - startY;
                if (Math.abs(dx) > 5 || Math.abs(dy) > 5) hasMoved = true;
                btn.style.left = Math.max(0, Math.min(window.innerWidth - btn.offsetWidth, startLeft + dx)) + 'px';
                btn.style.top = Math.max(0, Math.min(window.innerHeight - btn.offsetHeight, startTop + dy)) + 'px';
                btn.style.right = 'auto';
                btn.style.bottom = 'auto';
            });

            document.addEventListener('mouseup', () => {
                if (!isDragging) return;
                isDragging = false;
                btn.style.cursor = 'grab';
                if (!hasMoved) toggleMusic();
            });

            btn.addEventListener('touchstart', (e) => {
                isDragging = true;
                hasMoved = false;
                const t = e.touches[0];
                startX = t.clientX;
                startY = t.clientY;
                startLeft = btn.getBoundingClientRect().left;
                startTop = btn.getBoundingClientRect().top;
                e.preventDefault();
            }, {
                passive: false
            });

            btn.addEventListener('touchmove', (e) => {
                if (!isDragging) return;
                const t = e.touches[0];
                const dx = t.clientX - startX,
                    dy = t.clientY - startY;
                if (Math.abs(dx) > 5 || Math.abs(dy) > 5) hasMoved = true;
                btn.style.left = Math.max(0, Math.min(window.innerWidth - btn.offsetWidth, startLeft + dx)) + 'px';
                btn.style.top = Math.max(0, Math.min(window.innerHeight - btn.offsetHeight, startTop + dy)) + 'px';
                btn.style.right = 'auto';
                btn.style.bottom = 'auto';
                e.preventDefault();
            }, {
                passive: false
            });

            btn.addEventListener('touchend', () => {
                if (!isDragging) return;
                isDragging = false;
                if (!hasMoved) toggleMusic();
            });

            function playDragHint() {
                btn.classList.add('show-hint');
                setTimeout(() => btn.classList.add('is-wiggling'), 300);
                setTimeout(() => btn.classList.remove('show-hint', 'is-wiggling'), 2800);
            }
            window.playMusicDragHint = playDragHint;
        }

        // ========================================
        // 17. BOTTOM NAV
        // ========================================

        function initBottomNav() {
            document.querySelectorAll('.bottom-nav .nav-item').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const href = this.getAttribute('href');
                    const target = href === '#top' ? document.getElementById('main-content') : document
                        .querySelector(href);
                    if (!target) return;
                    const navbarHeight = document.getElementById('main-nav')?.offsetHeight || 80;
                    window.scrollTo({
                        top: target.getBoundingClientRect().top + window.scrollY - navbarHeight -
                            16,
                        behavior: 'smooth'
                    });
                    document.querySelectorAll('.bottom-nav .nav-item').forEach(n => n.classList.remove(
                        'active'));
                    this.classList.add('active');
                });
            });
        }

        // ========================================
        // 18. GALLERY MODAL
        // ========================================

        function openModal(src, name) {
            const modal = document.getElementById('photoModal');
            const img = document.getElementById('photoModalImg');
            const label = document.getElementById('photoModalName');
            if (!modal || !img) return;
            img.src = src;
            img.alt = name || '';
            if (label) label.textContent = name || '';
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(event, force) {
            const modal = document.getElementById('photoModal');
            if (!modal) return;
            if (force || (event && event.target === modal)) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
                setTimeout(() => {
                    const img = document.getElementById('photoModalImg');
                    if (img) img.src = '';
                }, 300);
            }
        }

        // ========================================
        // 19. INITIALIZATION
        // ========================================

        function initGuestName() {
            const name = new URLSearchParams(window.location.search).get('to');
            const el = document.getElementById('guestNameDisplay');
            if (el) el.textContent = name ? decodeURIComponent(name) : getGuestName();
        }

        document.addEventListener('DOMContentLoaded', function() {
            initGuestName();
            displayAllWishes();
            handleRSVPForm();
            initTimelineAnimations();
            initDraggableMusicBtn();
            initBottomNav();
            spawnParticles();
            setTimeout(setupVideoAutoplay, 1000);
        });

        window.addEventListener('scroll', updateActiveTimeline, {
            passive: true
        });

        // ========================================
        // 20. EXPORT FUNCTIONS
        // ========================================
        window.openInvitation = openInvitation;
        window.toggleMusic = toggleMusic;
        window.copyToClipboard = copyToClipboard;
        window.copyAddress = copyAddress;
        window.addTimelineItem = addTimelineItem;
        window.changePage = changePage;
        window.goToPage = goToPage;
        window.openModal = openModal;
        window.closeModal = closeModal;
    </script>

    {{-- Gallery preview script --}}
    @if (isset($galleryPhotos))
        <script>
            const photosRaw = @json($galleryPhotos);
            const photosArray = Object.values(photosRaw);

            let currentPhotoIndex = 0;
            const galleryModal = document.getElementById('galleryModal');
            const mainImg = document.getElementById('mainPreviewImg');
            const counter = document.getElementById('photoCounter');
            const thumbsTrack = document.getElementById('thumbnailsTrack');

            function initThumbnails() {
                if (!thumbsTrack) return;
                photosArray.forEach((url, i) => {
                    const img = document.createElement('img');
                    img.src = url;
                    img.classList.add('thumb-item');
                    img.onclick = () => showPhoto(i);
                    thumbsTrack.appendChild(img);
                });
            }

            function showPhoto(index) {
                if (index < 0) index = photosArray.length - 1;
                if (index >= photosArray.length) index = 0;
                currentPhotoIndex = index;
                if (mainImg) mainImg.src = photosArray[currentPhotoIndex];
                if (counter) counter.innerText = `${currentPhotoIndex + 1} / ${photosArray.length}`;
                const allThumbs = thumbsTrack?.getElementsByClassName('thumb-item') || [];
                for (let i = 0; i < allThumbs.length; i++) allThumbs[i].classList.remove('active');
                if (allThumbs[currentPhotoIndex]) {
                    allThumbs[currentPhotoIndex].classList.add('active');
                    allThumbs[currentPhotoIndex].scrollIntoView({
                        behavior: 'smooth',
                        block: 'nearest',
                        inline: 'center'
                    });
                }
            }

            function openPreview(photoUrl) {
                const clickedIndex = photosArray.indexOf(photoUrl);
                if (galleryModal) {
                    galleryModal.style.display = 'flex';
                    document.body.style.overflow = 'hidden';
                }
                if (thumbsTrack && thumbsTrack.children.length === 0) initThumbnails();
                showPhoto(clickedIndex);
            }

            function closeGallery() {
                if (galleryModal) galleryModal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }

            function changePhoto(direction) {
                showPhoto(currentPhotoIndex + direction);
            }

            document.addEventListener('keydown', function(e) {
                if (galleryModal?.style.display === 'flex') {
                    if (e.key === 'ArrowLeft') changePhoto(-1);
                    if (e.key === 'ArrowRight') changePhoto(1);
                    if (e.key === 'Escape') closeGallery();
                }
                if (document.getElementById('photoModal')?.classList.contains('active')) {
                    if (e.key === 'Escape') closeModal(null, true);
                }
            });

            window.openPreview = openPreview;
            window.closeGallery = closeGallery;
            window.changePhoto = changePhoto;
            window.showPhoto = showPhoto;
        </script>
    @endif

</body>

</html>
