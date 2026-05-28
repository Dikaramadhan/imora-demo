<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta name="theme-color" content="#1a0f14">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="format-detection" content="telephone=no">
    <meta name="description" content="Undangan Pernikahan Nayla & Rafi - Sabtu, 20 September 2025">

    <title>@yield('title', 'Wedding Invitation')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Amsterdam+Signature&family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=Didone+Moderne:wght@400;500;600;700&family=Jost:wght@200;300;400;500;600&family=Montserrat:wght@400;700;900&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/standard/serene-glow-style.css') }}">

    @stack('styles')
</head>

<body class="no-scroll">

    @yield('content')

    <!-- ══════════════════════════════════════
         PHOTO MODAL (Mempelai)
    ══════════════════════════════════════ -->
    <div class="photo-modal-overlay" id="photoModal" onclick="closeModal(event)">
        <div class="photo-modal-inner">
            <button class="photo-modal-close" onclick="closeModal(null, true)" aria-label="Tutup">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round">
                    <line x1="1" y1="1" x2="13" y2="13" />
                    <line x1="13" y1="1" x2="1" y2="13" />
                </svg>
            </button>
            <img id="photoModalImg" class="photo-modal-img" src="" alt="Foto Mempelai">
            <div class="photo-modal-name" id="photoModalName"></div>
        </div>
    </div>

    <!-- ══════════════════════════════════════
         MUSIC TOGGLE
    ══════════════════════════════════════ -->
    <button class="music-toggle" id="musicToggle" onclick="toggleMusic()" aria-label="Toggle Musik">
        <i class="bi bi-music-note-beamed" id="musicIcon"></i>
    </button>

    <!-- Audio Element -->
    <audio id="bgMusic" loop preload="auto">
        <source src="{{ asset('musik/Janji-Suci.mp3') }}" type="audio/mpeg">
    </audio>

    <!-- ══════════════════════════════════════
         BOTTOM NAVIGATION
    ══════════════════════════════════════ -->
    <nav class="bottom-nav" id="main-nav">
        <a href="#top" class="nav-item">
            <i class="fas fa-home"></i>
            <span>Beranda</span>
        </a>
        <a href="#mempelai" class="nav-item">
            <i class="fas fa-heart"></i>
            <span>Mempelai</span>
        </a>
        <a href="#event" class="nav-item">
            <i class="fas fa-calendar-alt"></i>
            <span>Acara</span>
        </a>
        <a href="#rsvp" class="nav-item">
            <i class="fas fa-comment-dots"></i>
            <span>Ucapan</span>
        </a>
    </nav>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} Imora Invitation ID. All rights reserved.</p>
    </footer>

    <!-- ══════════════════════════════════════
         SHARED JAVASCRIPT
    ══════════════════════════════════════ -->
    <script>
        /* ============================================
                                                                                                                                               PHOTO MODAL — Mempelai
                                                                                                                                            ============================================ */
        function openModal(src, name) {
            const modal = document.getElementById('photoModal');
            const img = document.getElementById('photoModalImg');
            const label = document.getElementById('photoModalName');
            if (!modal || !img) return;
            img.src = src;
            img.alt = name || '';
            label.textContent = name || '';
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
            document.body.classList.add('modal-open');
        }

        function closeModal(event, force) {
            const modal = document.getElementById('photoModal');
            if (!modal) return;
            if (force || (event && event.target === modal)) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
                document.body.classList.remove('modal-open');
                setTimeout(() => {
                    const img = document.getElementById('photoModalImg');
                    if (img) img.src = '';
                }, 350);
            }
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeModal(null, true);
        });

        /* ============================================
           MUSIC TOGGLE
        ============================================ */
        let isMusicPlaying = false;
        let musicToggleShown = false;

        function toggleMusic() {
            const audio = document.getElementById('bgMusic');
            const icon = document.getElementById('musicIcon');
            if (!audio) return;

            if (isMusicPlaying) {
                audio.pause();
                icon.className = 'bi bi-music-note-beamed';
                isMusicPlaying = false;
            } else {
                audio.play().then(function() {
                    icon.className = 'bi bi-pause-fill';
                    isMusicPlaying = true;
                }).catch(function(err) {
                    console.warn('Audio play blocked:', err);
                });
            }
        }

        function startMusic() {
            const audio = document.getElementById('bgMusic');
            const toggle = document.getElementById('musicToggle');
            const icon = document.getElementById('musicIcon');
            if (!audio) return;

            audio.play().then(function() {
                isMusicPlaying = true;
                icon.className = 'bi bi-pause-fill';
            }).catch(function() {
                // Browser memblokir autoplay → tampilkan tombol
                isMusicPlaying = false;
            });

            // Tampilkan tombol musik
            if (toggle && !musicToggleShown) {
                toggle.classList.add('active');
                musicToggleShown = true;

                // Hint "drag me" selama 4 detik
                setTimeout(function() {
                    toggle.classList.add('show-hint');
                }, 1500);
                setTimeout(function() {
                    toggle.classList.remove('show-hint');
                }, 5500);

                // Wiggle hint kalau belum pernah diklik
                if (!sessionStorage.getItem('musicClicked')) {
                    setTimeout(function() {
                        toggle.classList.add('is-wiggling');
                    }, 3000);
                }
            }
        }

        // Hapus wiggle setelah pertama kali diklik
        document.addEventListener('click', function(e) {
            if (e.target.closest('#musicToggle')) {
                sessionStorage.setItem('musicClicked', '1');
                var toggle = document.getElementById('musicToggle');
                if (toggle) toggle.classList.remove('is-wiggling', 'show-hint');
            }
        });

        /* ============================================
           COPY TO CLIPBOARD — Rekening & Alamat
        ============================================ */
        function copyToClipboard(text, btn) {
            if (!text) return;

            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(text).then(function() {
                    showCopySuccess(btn);
                }).catch(function() {
                    fallbackCopy(text, btn);
                });
            } else {
                fallbackCopy(text, btn);
            }
        }

        function fallbackCopy(text, btn) {
            var textarea = document.createElement('textarea');
            textarea.value = text;
            textarea.style.position = 'fixed';
            textarea.style.left = '-9999px';
            textarea.style.top = '-9999px';
            document.body.appendChild(textarea);
            textarea.focus();
            textarea.select();
            try {
                document.execCommand('copy');
                showCopySuccess(btn);
            } catch (err) {
                console.warn('Copy failed:', err);
            }
            document.body.removeChild(textarea);
        }

        function showCopySuccess(btn) {
            if (!btn) return;
            var span = btn.querySelector('.copy-text');
            if (span) span.textContent = 'Tersalin!';
            btn.classList.add('copied');

            setTimeout(function() {
                if (span) span.textContent = 'Salin';
                btn.classList.remove('copied');
            }, 2000);
        }

        function copyAddress(btn) {
            var address =
                'Penerima: Nayla Azzahra Putri\nJl. Melati No. 17, RT. 005/RW. 002, Kel. Cempaka, Kecamatan Batuceper, Kota Tangerang, Banten';
            copyToClipboard(address, btn);
        }
    </script>

    @stack('scripts')

</body>

</html>
