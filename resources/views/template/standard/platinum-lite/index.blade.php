@extends('template.standard.platinum-lite.app-platinum-lite')

@section('title', 'Wedding of Aisyah & Farhan')
@section('page-title', 'Wedding')

@section('content')

    {{-- Cover Section --}}
    <div id="cover">
        <div class="reveal active">
            <p style="letter-spacing: 6px; font-size: 0.65rem; opacity: 80; margin: 0 0 20px; color: #fff">UNDANGAN
                PERNIKAHAN</p>
            <h1 style="font-size: 2.2rem; margin: 0 0 16px; line-height: 1.2; color: #fff">Aisyah <br>& Farhan</h1>
            <p style="font-size: 0.8rem; opacity: 80; margin: 0 0 10px; color: #fff">22 . 11 . 2026</p>
            <button class="btn-open" onclick="openInvitation()">Buka Undangan</button>
        </div>
    </div>

    {{-- Hero Section --}}
    <section id="top" style="height: 80vh; display: flex; flex-direction: column; justify-content: center;">
        <div class="reveal reveal-bottom">
            <div class="ring-decoration reveal reveal-bottom">
                <img src="{{ asset('img/template/standard/platinum-lite/cincin.png') }}" alt="Wedding Rings">
            </div>
            <p style="letter-spacing: 8px; font-size: 0.7rem; margin-bottom: 20px;">PERNIKAHAN</p>
            <h1>Aisyah & Farhan</h1>
            <div class="timer-grid">
                <div class="timer-item"><span id="days">00</span><small>Hari</small></div>
                <div class="timer-item"><span id="hours">00</span><small>Jam</small></div>
                <div class="timer-item"><span id="mins">00</span><small>Menit</small></div>
                <div class="timer-item"><span id="secs">00</span><small>Detik</small></div>
            </div>
            <div style="width: 1px; height: 60px; background: var(--dark); margin: 40px auto 0;"></div>
        </div>
    </section>

    {{-- Quote Section --}}
    <section>
        <div class="reveal reveal-bottom">
            <p
                style="font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; font-style: italic; color: var(--text-gray);">
                "Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu pasangan hidup dari jenismu sendiri,
                supaya kamu cenderung dan merasa tenteram kepadanya."
            </p>
            <p style="margin-top: 20px; font-size: 0.6rem; letter-spacing: 4px; opacity: 0.6;">QS. AR-RUM : 21</p>
        </div>
    </section>

    {{-- Couple Section --}}
    <section id="mempelai">
        <div class="reveal reveal-bottom">
            <h2>Mempelai</h2>
            <div style="width: 40px; height: 1px; background: var(--dark); margin: 0 auto 50px; opacity: 0.5;"></div>
        </div>

        {{-- Pengantin Wanita --}}
        <div class="reveal reveal-left">
            <div class="photo-minimal">
                <img src="{{ asset('img/template/standard/platinum-lite/wanita.jpeg') }}">
            </div>
            <h3>Aisyah Nur Fadilah</h3>
            <p style="font-size: 0.7rem; margin-top: 10px; opacity: 0.6; letter-spacing: 1px;">PUTRI KE-1 DARI 3 BERSAUDARA
            </p>
            <p style="font-size: 0.7rem; margin-top: 6px; opacity: 0.6; letter-spacing: 1px;">PUTRI BAPAK HENDRA GUNAWAN &
                IBU DEWI RAHAYU</p>
        </div>

        <div class="reveal reveal-bottom" style="margin: 60px 0; font-size: 1.5rem; opacity: 0.3;">/</div>

        {{-- Pengantin Pria --}}
        <div class="reveal reveal-right">
            <div class="photo-minimal">
                <img src="{{ asset('img/template/standard/platinum-lite/pria.jpeg') }}">
            </div>
            <h3>Farhan Ramadhan</h3>
            <p style="font-size: 0.7rem; margin-top: 10px; opacity: 0.6; letter-spacing: 1px;">PUTRA KE-2 DARI 4 BERSAUDARA
            </p>
            <p style="font-size: 0.7rem; margin-top: 6px; opacity: 0.6; letter-spacing: 1px;">PUTRA BAPAK AGUS SETIAWAN &
                IBU SITI MARYAM</p>
        </div>
    </section>

    {{-- Event Section --}}
    <section id="event">
        <h2 class="reveal reveal-bottom" style="margin-bottom: 50px;">Jadwal Acara</h2>

        {{-- Akad Nikah --}}
        <div class="reveal reveal-left" style="margin-bottom: 50px;">
            <p style="font-size: 0.65rem; letter-spacing: 3px; margin-bottom: 10px; opacity: 0.5;">01 / UPACARA</p>
            <h3 style="font-size: 1.8rem; margin-bottom: 15px;">Akad Nikah</h3>
            <p style="font-size: 0.8rem; margin-bottom: 5px;">Sabtu, 22 November 2026</p>
            <p style="font-size: 0.8rem; margin-bottom: 20px;">08.00 – 10.00 WIB — Masjid Al-Ikhlas Bandung</p>
            <a href="https://maps.google.com" target="_blank"
                style="color: var(--dark); font-size: 0.7rem; letter-spacing: 2px; text-decoration: none; border-bottom: 1px solid var(--dark); padding-bottom: 3px;">GOOGLE
                MAPS</a>
        </div>

        {{-- Resepsi --}}
        <div class="reveal reveal-right" style="margin-bottom: 50px;">
            <p style="font-size: 0.65rem; letter-spacing: 3px; margin-bottom: 10px; opacity: 0.5;">02 / RESEPSI</p>
            <h3 style="font-size: 1.8rem; margin-bottom: 15px;">Resepsi Pernikahan</h3>
            <p style="font-size: 0.8rem; margin-bottom: 5px;">Sabtu, 22 November 2026</p>
            <p style="font-size: 0.8rem; margin-bottom: 20px;">11.00 – 14.00 WIB — Gedung Serbaguna Graha Indah</p>
            <a href="https://maps.google.com" target="_blank"
                style="color: var(--dark); font-size: 0.7rem; letter-spacing: 2px; text-decoration: none; border-bottom: 1px solid var(--dark); padding-bottom: 3px;">GOOGLE
                MAPS</a>
        </div>
    </section>

    {{-- Gallery Section --}}
    <section>
        <h2 class="reveal reveal-bottom" style="margin-bottom: 40px;">Gallery</h2>
        <div class="masonry-grid">
            @if (!empty($galleryPhotos))
                @foreach ($galleryPhotos as $index => $url)
                    <div class="masonry-item reveal {{ $index % 2 === 0 ? 'reveal-left' : 'reveal-right' }}">
                        <img src="{{ $url }}" alt="" onclick="openLightbox(this.src, this.alt)"
                            style="cursor:pointer;">
                    </div>
                @endforeach
            @else
                <p>Tidak ada gambar di folder gallery.</p>
            @endif
        </div>
    </section>

    <!-- Gift Section -->
    <section class="gift-section">
        <div class="gf-container">
            <div class="gf-label">Love Gift</div>
            <div class="gf-title">Beri dengan Kasih</div>
            <p class="gf-subtitle">
                Doa restu Anda merupakan karunia yang sangat berarti bagi kami.
                Namun jika memberi adalah ungkapan kasih, Anda dapat memberi kado secara cashless.
            </p>

            <div class="gift-cards">

                <!-- Kartu Bank - Mandiri -->
                <div class="gift-card bank-card-wrap">
                    <div class="bank-card">

                        <div class="bank-card-top">
                            <div class="bank-card-logo">
                                <img src="/img/bank/Mandiri.png" alt="Bank Mandiri"
                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='block'">
                                <span class="bank-card-logo-fallback" style="display:none;">Mandiri</span>
                            </div>
                        </div>

                        <div class="bank-card-chip"></div>

                        <div class="bank-card-number-wrap">
                            <span class="bank-card-number">••••&nbsp;&nbsp;••••&nbsp;&nbsp;••••&nbsp;&nbsp;4871</span>
                        </div>

                        <div class="bank-card-footer">
                            <span class="bank-card-name">Farhan Ramadhan</span>
                            <button class="bank-copy-btn" onclick="copyToClipboard('1380074871', this)">
                                <svg width="12" height="12" viewBox="0 0 16 16" fill="currentColor">
                                    <path
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z" />
                                    <path
                                        d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z" />
                                </svg>
                                <span class="copy-text">Salin</span>
                            </button>
                        </div>

                    </div>
                </div>

                <!-- Kartu Bank - BRI -->
                <div class="gift-card bank-card-wrap">
                    <div class="bank-card">

                        <div class="bank-card-top">
                            <div class="bank-card-logo">
                                <img src="/img/bank/BRI.png" alt="Bank BRI"
                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='block'">
                                <span class="bank-card-logo-fallback" style="display:none;">BRI</span>
                            </div>
                        </div>

                        <div class="bank-card-chip"></div>

                        <div class="bank-card-number-wrap">
                            <span class="bank-card-number">••••&nbsp;&nbsp;••••&nbsp;&nbsp;••••&nbsp;&nbsp;3215</span>
                        </div>

                        <div class="bank-card-footer">
                            <span class="bank-card-name">Aisyah Nur Fadilah</span>
                            <button class="bank-copy-btn" onclick="copyToClipboard('0097013213215', this)">
                                <svg width="12" height="12" viewBox="0 0 16 16" fill="currentColor">
                                    <path
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z" />
                                    <path
                                        d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z" />
                                </svg>
                                <span class="copy-text">Salin</span>
                            </button>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Rsvp Section --}}
    <section id="rsvp">
        <h2 class="reveal reveal-bottom" style="margin-bottom: 40px;">Ucapan & Do'a</h2>

        {{-- FORM RSVP --}}
        <form class="rsvp-form reveal reveal-bottom" id="rsvpForm">
            @csrf
            <input type="text" id="name" name="name" placeholder="NAMA LENGKAP" required>
            <select id="status" name="status" required>
                <option value="">APAKAH ANDA HADIR?</option>
                <option value="Hadir">YA, SAYA AKAN HADIR</option>
                <option value="Tidak Hadir">MAAF, SAYA TIDAK BISA HADIR</option>
                <option value="Masih Ragu">MASIH BELUM PASTI</option>
            </select>
            <textarea id="message" name="message" placeholder="UCAPAN & DO'A" rows="4"></textarea>
            <button type="button" class="btn-submit" id="submitBtn" onclick="submitRsvp()">Kirim Ucapan</button>
        </form>

        {{-- NOTIFIKASI --}}
        <div id="rsvpNotif"
            style="display:none; margin-top: 20px; text-align: center; font-size: 0.8rem; padding: 12px 20px; border-radius: 4px;">
        </div>

        {{-- DAFTAR KOMENTAR --}}
        <div class="reveal reveal-bottom" style="margin-top: 50px; text-align: left;">
            <div id="commentList">
                <div style="text-align:center; font-size: 0.75rem; opacity: 0.5; padding: 20px 0;" id="loadingComments">
                    Memuat ucapan...
                </div>
            </div>

            {{-- PAGINATION --}}
            <div id="paginationWrap"
                style="display: flex; gap: 10px; margin-top: 20px; justify-content: center; flex-wrap: wrap;">
            </div>
        </div>
    </section>

    {{-- Footer Section --}}
    <footer style="padding: 100px 30px 120px; text-align: center;">
        <div class="reveal reveal-bottom">
            <a href="#" class="back-to-top"
                style="text-decoration: none; color: inherit; display: inline-flex; flex-direction: column; align-items: center; gap: 8px;">
                <i class="fas fa-chevron-up"></i>
                <span style="font-size: 0.65rem; letter-spacing: 5px; text-transform: uppercase;">Kembali Ke Atas</span>
            </a>
        </div>

        <div class="reveal reveal-bottom" style="margin-top: 60px;">
            <p
                style="font-size: 0.75rem; letter-spacing: 5px; opacity: 0.4; margin-bottom: 20px; text-transform: uppercase;">
                Dengan Hormat</p>
            <h2 style="font-size: 2.5rem; margin-bottom: 10px;">Aisyah & Farhan</h2>
            <p class="cursive" style="font-size: 1.5rem; opacity: 0.3;">#AisyahFarhan2026</p>
        </div>

        <div
            style="margin-top: 80px; padding-top: 20px; border-top: 1px solid rgba(0,0,0,0.05); font-size: 0.6rem; opacity: 0.3; letter-spacing: 2px; text-transform: uppercase;">
            &copy; 2026 Imora ID - Digital Invitation Platform.<br>All rights reserved.
        </div>
    </footer>

    {{-- Music Section --}}
    <div class="music-control">
        <button class="music-btn" id="music-btn" onclick="toggleMusic()">
            <i id="music-icon" class="fas fa-compact-disc"></i>
        </button>
    </div>

    {{-- Navbar Section --}}
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

    {{-- Lightbox Modal --}}
    <div id="lightbox"
        style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.88); 
           z-index:99999; align-items:center; justify-content:center; 
           flex-direction:column; gap:16px;">
        <span id="lightbox-close"
            style="position:absolute; top:20px; right:28px; font-size:36px; 
               color:#fff; cursor:pointer; line-height:1; z-index:100000;">✕</span>
        <img id="lightbox-img"
            style="max-width:90%; max-height:80vh; border-radius:12px; object-fit:contain; display:block;">
        <span id="lightbox-caption" style="color:#fff; font-size:14px; opacity:0.7;"></span>
    </div>

    <script>
        // ===== GLOBAL VARS =====
        const pathParts = window.location.pathname.split('/');
        const templateSlug = pathParts[pathParts.length - 1] || 'unknown';
        const API_RSVPS = '/api/rsvp';

        // ===== COUNTDOWN TIMER =====
        const weddingDate = new Date('2026-11-22T08:00:00+07:00');

        function updateTimer() {
            const now = new Date();
            const diff = weddingDate - now;
            if (diff <= 0) {
                document.getElementById('days').textContent = '00';
                document.getElementById('hours').textContent = '00';
                document.getElementById('mins').textContent = '00';
                document.getElementById('secs').textContent = '00';
                return;
            }
            document.getElementById('days').textContent = String(Math.floor(diff / 86400000)).padStart(2, '0');
            document.getElementById('hours').textContent = String(Math.floor((diff % 86400000) / 3600000)).padStart(2, '0');
            document.getElementById('mins').textContent = String(Math.floor((diff % 3600000) / 60000)).padStart(2, '0');
            document.getElementById('secs').textContent = String(Math.floor((diff % 60000) / 1000)).padStart(2, '0');
        }
        setInterval(updateTimer, 1000);
        updateTimer();

        // ===== COPY TO CLIPBOARD =====
        function copyToClipboard(text, btn) {
            const span = btn.querySelector('.copy-text');
            const original = span.textContent;

            const done = () => {
                span.textContent = 'Tersalin!';
                btn.disabled = true;
                setTimeout(() => {
                    span.textContent = original;
                    btn.disabled = false;
                }, 2000);
            };

            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(text).then(done).catch(() => fallbackCopy(text, done));
            } else {
                fallbackCopy(text, done);
            }
        }

        function fallbackCopy(text, callback) {
            const el = document.createElement('textarea');
            el.value = text;
            el.style.cssText = 'position:fixed;opacity:0;pointer-events:none;';
            document.body.appendChild(el);
            el.focus();
            el.select();
            try {
                document.execCommand('copy');
                callback();
            } catch (e) {
                console.error('Salin gagal:', e);
            }
            document.body.removeChild(el);
        }
    </script>

    <script>
        // ===== LIGHTBOX =====
        function openLightbox(src, alt) {
            document.getElementById('lightbox-img').src = src;
            document.getElementById('lightbox-caption').textContent = alt;
            var lb = document.getElementById('lightbox');
            lb.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            document.getElementById('lightbox').style.display = 'none';
            document.getElementById('lightbox-img').src = '';
            document.body.style.overflow = '';
        }

        document.getElementById('lightbox-close').addEventListener('click', closeLightbox);
        document.getElementById('lightbox').addEventListener('click', function(e) {
            if (e.target === this) closeLightbox();
        });

        // ===== REVEAL ON LOAD =====
        document.addEventListener("DOMContentLoaded", function() {
            const reveals = document.querySelectorAll(".reveal");
            reveals.forEach(el => el.classList.add("active"));
        });

        // ===== SCROLL ANIMATION =====
        const scrollItems = document.querySelectorAll(
            'section, section h1, section h2, section h3, section p, .gift-card, .masonry-item'
        );

        scrollItems.forEach(el => el.classList.add('reveal-scroll'));

        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        entry.target.classList.remove('hidden-right');
                    } else {
                        const rect = entry.target.getBoundingClientRect();
                        if (rect.top < 0) {
                            entry.target.classList.add('hidden-right');
                            entry.target.classList.remove('visible');
                        } else {
                            entry.target.classList.remove('visible');
                            entry.target.classList.remove('hidden-right');
                        }
                    }
                });
            }, {
                threshold: 0.15,
                rootMargin: '0px 0px -40px 0px'
            }
        );

        scrollItems.forEach(el => observer.observe(el));
    </script>

    <script>
        // ===== SUBMIT RSVP =====
        function submitRsvp() {
            const name = document.getElementById('name').value.trim();
            const status = document.getElementById('status').value;
            const message = document.getElementById('message').value.trim();

            if (!name || !status) {
                alert('Nama dan kehadiran wajib diisi!');
                return;
            }

            const btn = document.getElementById('submitBtn');
            btn.disabled = true;
            btn.textContent = 'Mengirim...';

            fetch(API_RSVPS, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ||
                            '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        template_slug: templateSlug,
                        name: name,
                        status: status,
                        message: message
                    })
                })
                .then(res => {
                    if (!res.ok) throw new Error('HTTP ' + res.status);
                    return res.json();
                })
                .then(data => {
                    const notif = document.getElementById('rsvpNotif');
                    notif.style.display = 'block';
                    notif.style.background = '#f0fdf4';
                    notif.style.color = '#166534';
                    notif.textContent = 'Ucapan berhasil dikirim! Terima kasih 🎉';
                    document.getElementById('rsvpForm').reset();

                    // Reload komentar
                    if (typeof loadComments === 'function') loadComments(1);
                })
                .catch(err => {
                    console.error('RSVP Error:', err);
                    const notif = document.getElementById('rsvpNotif');
                    notif.style.display = 'block';
                    notif.style.background = '#fef2f2';
                    notif.style.color = '#991b1b';
                    notif.textContent = 'Gagal mengirim, coba lagi.';
                })
                .finally(() => {
                    btn.disabled = false;
                    btn.textContent = 'Kirim Ucapan';
                });
        }
    </script>

    <script>
        // ===== LOAD COMMENTS =====
        document.addEventListener('DOMContentLoaded', function() {

            let currentPage = 1;
            const perPage = 5;

            function loadComments(page = 1) {
                currentPage = page;

                const list = document.getElementById('commentList');
                list.innerHTML =
                    '<div style="text-align:center; font-size:0.75rem; opacity:0.5; padding:20px 0;">Memuat ucapan...</div>';

                fetch(`${API_RSVPS}?slug=${templateSlug}&page=${page}&per_page=${perPage}`, {
                        headers: {
                            'Accept': 'application/json'
                        }
                    })
                    .then(res => {
                        if (!res.ok) throw new Error('HTTP ' + res.status);
                        return res.json();
                    })
                    .then(data => {
                        renderComments(data.data);
                        renderPagination(data);
                    })
                    .catch(err => {
                        console.error('Load Error:', err);
                        list.innerHTML =
                            '<p style="text-align:center; opacity:0.4; font-size:0.75rem;">Gagal memuat ucapan.</p>';
                    });
            }

            function renderComments(comments) {
                const list = document.getElementById('commentList');

                if (!comments || comments.length === 0) {
                    list.innerHTML =
                        '<p style="text-align:center; opacity:0.4; font-size:0.75rem; padding:20px 0;">Belum ada ucapan.</p>';
                    return;
                }

                list.innerHTML = comments.map(c => `
                    <div class="comment-item">
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:6px;">
                            <strong style="font-size:0.8rem; letter-spacing:1px;">${escapeHtml(c.name)}</strong>
                            <span style="font-size:0.65rem; opacity:0.4; letter-spacing:1px;">
                                ${badgeStatus(c.status)}
                            </span>
                        </div>
                        <p style="font-size:0.78rem; opacity:0.65; line-height:1.7;">${escapeHtml(c.message ?? '')}</p>
                    </div>
                `).join('');
            }

            function renderPagination(data) {
                const wrap = document.getElementById('paginationWrap');
                wrap.innerHTML = '';

                if (!data.last_page || data.last_page <= 1) return;

                for (let i = 1; i <= data.last_page; i++) {
                    const btn = document.createElement('button');
                    btn.textContent = i;
                    btn.style.cssText = `
                        padding: 6px 12px;
                        border: 1px solid ${i === currentPage ? '#111' : '#ddd'};
                        background: ${i === currentPage ? '#111' : 'transparent'};
                        color: ${i === currentPage ? '#fff' : '#111'};
                        font-size: 0.7rem;
                        letter-spacing: 1px;
                        cursor: pointer;
                        border-radius: 2px;
                    `;
                    btn.onclick = () => loadComments(i);
                    wrap.appendChild(btn);
                }
            }

            function badgeStatus(status) {
                const map = {
                    'Hadir': '✓ HADIR',
                    'Tidak Hadir': '✗ TIDAK HADIR',
                    'Masih Ragu': '? BELUM PASTI',
                };
                return map[status] ?? status;
            }

            function escapeHtml(str) {
                if (!str) return '';
                const div = document.createElement('div');
                div.appendChild(document.createTextNode(str));
                return div.innerHTML;
            }

            // Load pertama kali
            loadComments(1);

            // Expose ke global untuk dipanggil setelah submit
            window.loadComments = loadComments;
        });
    </script>
@endsection
