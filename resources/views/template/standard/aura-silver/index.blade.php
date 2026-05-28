@extends('template.standard.aura-silver.app-aura-silver')

@section('title', 'Wedding of Rizky & Nabila')
@section('page-title', 'Wedding')

@section('content')

    <!-- ══ COVER ══ -->
    <div id="cover">
        <div>
            <p class="cover-eyebrow">The Wedding of</p>
            <div
                style="width:70px;height:1px;background:linear-gradient(to right,transparent,var(--gold),transparent);margin:14px auto">
            </div>

            <span class="cover-name">Rizky</span>
            <span class="cover-amp">&</span>
            <span class="cover-name">Nabila</span>

            <div
                style="width:110px;height:1px;background:linear-gradient(to right,transparent,var(--gold),transparent);margin:14px auto">
            </div>

            <p class="cover-guest-label">Kepada Bapak/Ibu/Saudara/i</p>
            <div class="guest-name-text" id="guestNameDisplay">Nama Tamu Undangan</div>

            <button class="btn-open" onclick="openInvitation()">
                <i class="fas fa-envelope-open"></i> Buka Undangan
            </button>

            <p class="cover-date-line">15 &middot; 08 &middot; 2026</p>
        </div>
    </div>

    <!-- ══ HERO ══ -->
    <!-- ✅ FIX: hapus style="max-width:none" -->
    <section class="hero-aura">
        <div class="hero-inner reveal reveal-up">
            <p class="eyebrow">The Wedding of</p>
            <h1>Rizky & Nabila</h1>
            <div class="hero-rule"></div>
            <p class="hero-date">15 &middot; 08 &middot; 2026</p>
        </div>
    </section>

    <!-- ══ AYAT ══ -->
    <div class="quote-bg">
        <section>
            <div class="quote-container reveal reveal-up">
                <p>"Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu isteri-isteri dari jenismu
                    sendiri, supaya kamu cenderung dan merasa tenteram kepadanya..."</p>
                <span class="cursive">QS. Ar-Rum: 21</span>
            </div>
        </section>
    </div>

    <!-- ══ MEMPELAI ══ -->
    <section id="mempelai">
        <span class="section-tag reveal reveal-up">Dengan Penuh Syukur</span>
        <h2 class="section-title reveal reveal-up">Mempelai</h2>
        <div class="silver-rule reveal reveal-up"></div>
        <p class="sub-text reveal reveal-up">Assalamu'alaikum Warahmatullahi Wabarakatuh</p>

        <div class="mempelai-grid">
            <div class="mempelai-item reveal reveal-left">
                <div class="photo-frame">
                    <img src="{{ asset('/img/template/standard/aura-silver/couple/pria.jpeg') }}" alt="Rizky">
                </div>
                <h3>Muhammad Rizky Pratama</h3>
                <p>Putra ke-1 dari Bapak Hendra &amp; Ibu Sari</p>
            </div>

            <div class="divider-cursive reveal reveal-up">&amp;</div>

            <div class="mempelai-item reveal reveal-right">
                <div class="photo-frame">
                    <img src="{{ asset('/img/template/standard/aura-silver/couple/wanita.jpeg') }}" alt="Nabila">
                </div>
                <h3>Nabila Azzahra Putri</h3>
                <p>Putri ke-2 dari Bapak Darmawan &amp; Ibu Ratna Dewi</p>
            </div>
        </div>
    </section>

    <!-- ══ COUNTDOWN ══ -->
    <section class="countdown-section">
        <span class="section-tag reveal reveal-up">Menuju Hari Istimewa</span>
        <h2 class="section-title reveal reveal-up">Save The Date</h2>
        <div class="silver-rule reveal reveal-up" style="opacity:0.35"></div>
        <div class="countdown-grid reveal reveal-up">
            <div class="countdown-item">
                <span class="countdown-num" id="cd-d">--</span>
                <span class="countdown-label">Hari</span>
            </div>
            <div class="countdown-item">
                <span class="countdown-num" id="cd-h">--</span>
                <span class="countdown-label">Jam</span>
            </div>
            <div class="countdown-item">
                <span class="countdown-num" id="cd-m">--</span>
                <span class="countdown-label">Menit</span>
            </div>
            <div class="countdown-item">
                <span class="countdown-num" id="cd-s">--</span>
                <span class="countdown-label">Detik</span>
            </div>
        </div>
    </section>

    <!-- ══ EVENTS ══ -->
    <div class="events-bg">
        <section id="events">
            <span class="section-tag reveal reveal-up">Jadwal Acara</span>
            <h2 class="section-title reveal reveal-up">Rangkaian Acara</h2>
            <div class="silver-rule reveal reveal-up"></div>

            <div class="event-box reveal reveal-left">
                <h3>Akad Nikah</h3>
                <p>Sabtu, 15 Agustus 2026</p>
                <p>08.00 WIB</p>
                <p><strong>Jl. Mawar Indah No. 12, Kelurahan Sukamaju, Kec. Bogor Selatan, Kota Bogor</strong></p>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.0!2d106.8!3d-6.6!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMzYnMDAuMCJTIDEwNsKwNDgnMDAuMCJF!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                    width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>

                <a href="https://maps.google.com" target="_blank" class="btn-maps">
                    <i class="fas fa-map-marker-alt"></i> Google Maps
                </a>
            </div>

            <div class="event-box reveal reveal-right">
                <h3>Resepsi</h3>
                <p>15 - 16 Agustus 2026</p>
                <p>10.00 WIB s.d. Selesai</p>
                <p><strong>Gedung Serba Guna Bahagia, Jl. Merdeka Raya No. 45, Kota Bogor</strong></p>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.0!2d106.8!3d-6.6!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMzYnMDAuMCJTIDEwNsKwNDgnMDAuMCJF!5e0!3m2!1sid!2sid!4v1700000000001!5m2!1sid!2sid"
                    width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <a href="https://maps.google.com" target="_blank" class="btn-maps">
                    <i class="fas fa-map-marker-alt"></i> Google Maps
                </a>
            </div>
        </section>
    </div>

    <!-- ══ LOVE STORY ══ -->
    <div class="quote-bg">
        <!-- ✅ FIX: hapus style="background:transparent" biar ikut wrapper -->
        <section class="story-section" id="love-story">
            <span class="section-tag reveal reveal-up">Perjalanan Cinta</span>
            <h2 class="section-title reveal reveal-up">Love Story</h2>
            <div class="silver-rule reveal reveal-up"></div>

            <div class="story-card reveal reveal-left">
                <h4>Awal Kisah Kita</h4>
                <p>Tidak ada yang menyangka bahwa sebuah pertemuan sederhana di bulan Maret akan menjadi titik awal dari
                    segalanya. Di antara keramaian sebuah acara kampus, semesta memilih untuk mempertemukan kami—dua jiwa
                    yang ternyata telah Tuhan siapkan untuk saling melengkapi.</p>
            </div>

            <div class="story-card reveal reveal-right">
                <h4>Awal Selamanya</h4>
                <p>Hari ini, dua doa menyatu menjadi satu tujuan. Di hadapan Sang Pencipta, kami mengukir janji suci untuk
                    memulai kehidupan baru bersama. Pernikahan ini bukanlah akhir, melainkan gerbang menuju petualangan
                    abadi yang kami tempuh berdua.</p>
            </div>
        </section>
    </div>

    <section class="gallery-section">
        <div class="gallery-header">
            <h2 class="section-title section-title-countdown">Our Precious Moments</h2>
        </div>
        <div class="slider-container">
            <div class="album-slider" id="autoSlider">
                @forelse(array_chunk($galleryPhotos, 3) as $chunk)
                    <div class="slider-group">
                        @foreach ($chunk as $index => $photo)
                            @php $gridClass = ($index == 0) ? 'item-tall' : 'item-normal'; @endphp
                            <div class="grid-item {{ $gridClass }}" onclick="openPreview('{{ $photo }}')">
                                <img src="{{ $photo }}?v={{ time() }}" loading="lazy">
                            </div>
                        @endforeach
                    </div>
                @empty
                    <p style="text-align:center;width:100%;">Belum ada foto di folder /img/gallery</p>
                @endforelse
            </div>
            @if (count($galleryPhotos) > 0)
                <div class="slider-dots">
                    @foreach (array_chunk($galleryPhotos, 3) as $index => $chunk)
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- ══ GALLERY MODAL ══ -->
    <div id="galleryModal" class="gallery-preview-modal">
        <div class="modal-overlay" onclick="closeGallery()"></div>
        <div class="gallery-header">
            <span class="photo-counter" id="photoCounter">1 / 1</span>
            <button class="close-gallery" onclick="closeGallery()">&times;</button>
        </div>
        <div class="main-photo-container">
            <button class="nav-btn prev-btn" onclick="changePhoto(-1)">&#8249;</button>
            <img id="mainPreviewImg" class="main-preview-img" src="" alt="Wedding Photo">
            <button class="nav-btn next-btn" onclick="changePhoto(1)">&#8250;</button>
        </div>
        <div class="thumbnails-container-wrapper">
            <div class="thumbnails-track" id="thumbnailsTrack"></div>
        </div>
    </div>

    <!-- ══ RSVP ══ -->
    <section class="rsvp-section">
        <span class="section-tag reveal reveal-up">Konfirmasi</span>
        <h2 class="section-title reveal reveal-up">Kehadiran Anda</h2>
        <div class="silver-rule reveal reveal-up"></div>

        <form class="rsvp-form reveal reveal-up" id="rsvpForm" onsubmit="submitRSVP(event)">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" class="form-input" id="nama" placeholder="Nama lengkap Anda" required>

            <label class="form-label">Konfirmasi Kehadiran</label>
            <select class="form-input" id="status" required>
                <option value="">Apakah Anda Akan Datang?</option>
                <option value="Hadir">Saya Akan Hadir</option>
                <option value="Tidak Hadir">Maaf, Tidak Bisa Hadir</option>
            </select>

            <label class="form-label">Ucapan &amp; Doa</label>
            <textarea class="form-input" id="ucapan" placeholder="Tuliskan ucapan dan doa Anda..." rows="4"></textarea>

            <button type="submit" class="btn-submit">Kirim Konfirmasi</button>
        </form>
    </section>

    <!-- Wishes Section -->
    <section class="wishes-section">
        <div class="container">
            <h2 class="section-title section-title-wishes">Ucapan & Doa</h2>
            <br>

            <div class="wishes-container" id="wishesList">
                <div class="wishes-loading">Memuat ucapan...</div>
            </div>
            <div class="ws-pagination" id="wsPagination" style="display:none;">
                <button class="ws-page-btn ws-prev" id="wsPrev" onclick="changePage(-1)">&#8592;</button>
                <div class="ws-page-numbers" id="wsPageNumbers"></div>
                <button class="ws-page-btn ws-next" id="wsNext" onclick="changePage(1)">&#8594;</button>
            </div>
        </div>
    </section>

    <!-- ══ GIFT ══ -->
    <section class="gift-section">
        <div class="gf-container">
            <div class="gf-label">Love Gift</div>
            <div class="gf-title">Beri dengan Kasih</div>
            <p class="gf-subtitle">
                Doa restu Anda merupakan karunia yang sangat berarti bagi kami.
                Namun jika memberi adalah ungkapan kasih, Anda dapat memberi kado secara cashless.
            </p>

            <div class="gift-cards">
                <!-- Kartu Bank - BCA -->
                <div class="gift-card bank-card-wrap">
                    <div class="bank-card">
                        <div class="bank-card-top">
                            <span class="bank-card-type">Debit / Transfer</span>
                            <div class="bank-card-logo">
                                <img src="/img/bank/BCA.png" alt="Bank BCA"
                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='block'">
                                <span class="bank-card-logo-fallback" style="display:none;">BCA</span>
                            </div>
                        </div>

                        <div class="bank-card-chip"></div>

                        <div class="bank-card-number-wrap">
                            <span class="bank-card-number">••••&nbsp;&nbsp;••••&nbsp;&nbsp;••••&nbsp;&nbsp;789</span>
                        </div>

                        <div class="bank-card-footer">
                            <span class="bank-card-name">Nabila Azzahra Putri</span>
                            <button class="bank-copy-btn" onclick="copyToClipboard('1234567890789', this)">
                                <svg width="11" height="11" viewBox="0 0 16 16" fill="currentColor">
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

    <!-- ══ TURUT MENGUNDANG ══ -->
    <section id="turut-mengundang">
        <span class="section-tag reveal reveal-up">Bersama Kami</span>
        <h2 class="section-title reveal reveal-up">Turut Mengundang</h2>
        <div class="silver-rule reveal reveal-up"></div>
        <div class="reveal reveal-up" style="text-align:center;line-height:2.4;opacity:0.9">
            <p>H. Ahmad Fauzi, S.E.</p>
            <p>Bambang Sutrisno</p>
            <p>Irwan Setiawan, S.T.</p>
            <p>Agus Budiman, S.Pd.</p>
            <p>Drs. Wahyu Nugroho, M.M.</p>
            <p>Ust. Farid Abdurrahman, S.Pd.I.</p>
            <p>H. Syaiful Bahri, S.Ag., M.Pd.</p>
            <p>Dewi Kusuma, S.Pd.</p>
            <p>Santoso Wibowo</p>
            <p>Ust. Hamdan Al-Farisi</p>
            <p>Budi Santoso</p>
            <p>Rudi Hartono (Rudi Cell)</p>
            <p>Keluarga Besar Cempaka Permai (Bogor Selatan)</p>
            <p>Keluarga Besar SDN Sukamaju 01</p>
            <p>Keluarga Besar PAUD dan TPA Al-Ikhlas</p>
            <p>Anisa Rahmawati</p>
        </div>
    </section>

    <!-- ══ FOOTER ══ -->
    <!-- ✅ FIX: hapus style="max-width:none" -->
    <footer>
        <div class="reveal reveal-up">
            <a href="#" class="back-to-top">
                <i class="fas fa-chevron-up"></i>
                <span style="font-weight:600">KEMBALI KE ATAS</span>
            </a>
        </div>
        <div class="reveal reveal-up">
            <p>Merupakan suatu kehormatan bagi kami apabila Bapak/Ibu berkenan hadir untuk memberikan doa restu kepada kedua
                mempelai.</p>
            <div class="footer-rule"></div>
            <h2>Rizky &amp; Nabila</h2>
            <span class="footer-cursive">Rizky &amp; Nabila</span>
            <p class="footer-credit">&copy; 2026 Imora ID – Digital Invitation Platform. All rights reserved.</p>
        </div>
    </footer>

    <!-- Music Toggle -->
    <button class="music-toggle" id="musicToggle" onclick="toggleMusic()">
        <i class="bi bi-music-note-beamed" id="musicIcon"></i>
    </button>

    <audio id="bgMusic" loop>
        <source src="{{ asset('musik/bergema-selamanya.mp3') }}" type="audio/mpeg">
    </audio>

    <script>
        // ── OPEN INVITATION ──
        function openInvitation() {
            document.getElementById('cover').classList.add('hide');
            document.documentElement.classList.remove('no-scroll');
            setTimeout(() => {
                document.getElementById('cover').style.display = 'none';
                spawnPetals();
                startMusic();
            }, 1200);
        }

        // ── SCROLL REVEAL ──
        const revealEls = document.querySelectorAll('.reveal');
        const obs = new IntersectionObserver(entries => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.classList.add('visible');
                    obs.unobserve(e.target);
                }
            });
        }, {
            threshold: 0.12
        });
        revealEls.forEach(el => obs.observe(el));

        // ── COUNTDOWN ──
        function tick() {
            const target = new Date('2026-08-15T08:00:00+07:00');
            const diff = target - new Date();
            if (diff <= 0) {
                ['cd-d', 'cd-h', 'cd-m', 'cd-s'].forEach(id => document.getElementById(id).textContent = '00');
                return;
            }
            const d = Math.floor(diff / 86400000);
            const h = Math.floor((diff % 86400000) / 3600000);
            const m = Math.floor((diff % 3600000) / 60000);
            const s = Math.floor((diff % 60000) / 1000);
            document.getElementById('cd-d').textContent = String(d).padStart(2, '0');
            document.getElementById('cd-h').textContent = String(h).padStart(2, '0');
            document.getElementById('cd-m').textContent = String(m).padStart(2, '0');
            document.getElementById('cd-s').textContent = String(s).padStart(2, '0');
        }
        tick();
        setInterval(tick, 1000);

        // ── MUSIC ──
        let isPlaying = false;

        function startMusic() {
            const audio = document.getElementById('bgMusic');
            audio.play().then(() => {
                isPlaying = true;
                document.getElementById('musicToggle').classList.add('active');
            }).catch(() => {});
        }

        function toggleMusic() {
            const audio = document.getElementById('bgMusic');
            const icon = document.getElementById('musicIcon');
            if (audio.paused) {
                audio.play();
                icon.className = 'bi bi-pause-fill';
            } else {
                audio.pause();
                icon.className = 'bi bi-music-note-beamed';
            }
        }

        // ── PETALS ──
        function spawnPetals() {
            const symbols = ['✿', '✾', '❀', '✽'];
            let c = 0;
            const interval = setInterval(() => {
                if (c++ > 16) {
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

        // ── RSVP ──
        function submitRSVP(e) {
            e.preventDefault();
            const btn = e.target.querySelector('.btn-submit');
            btn.textContent = '✦  Terima Kasih — Konfirmasi Terkirim  ✦';
            btn.style.background = '#2d3748';
            btn.disabled = true;
        }

        // ── COPY CLIPBOARD ──
        function copyToClipboard(text, btn) {
            navigator.clipboard.writeText(text).then(() => {
                const span = btn.querySelector('.copy-text');
                span.textContent = 'Copied!';
                btn.classList.add('copied');
                setTimeout(() => {
                    span.textContent = 'Salin';
                    btn.classList.remove('copied');
                }, 2000);
            });
        }
    </script>

    <script>
        const photosRaw = @json($galleryPhotos);
        const photosArray = Object.values(photosRaw);
    </script>

    <script>
        let currentPhotoIndex = 0;
        const modal = document.getElementById("galleryModal");
        const mainImg = document.getElementById("mainPreviewImg");
        const counter = document.getElementById("photoCounter");
        const thumbsTrack = document.getElementById("thumbnailsTrack");

        function initThumbnails() {
            photosArray.forEach((url, i) => {
                const img = document.createElement("img");
                img.src = url;
                img.classList.add("thumb-item");
                img.onclick = () => showPhoto(i);
                thumbsTrack.appendChild(img);
            });
        }

        function showPhoto(index) {
            if (index < 0) index = photosArray.length - 1;
            if (index >= photosArray.length) index = 0;
            currentPhotoIndex = index;
            mainImg.src = photosArray[currentPhotoIndex];
            counter.innerText = `${currentPhotoIndex + 1} / ${photosArray.length}`;
            const allThumbs = thumbsTrack.getElementsByClassName("thumb-item");
            for (let i = 0; i < allThumbs.length; i++) allThumbs[i].classList.remove("active");
            allThumbs[currentPhotoIndex].classList.add("active");
            allThumbs[currentPhotoIndex].scrollIntoView({
                behavior: 'smooth',
                block: 'nearest',
                inline: 'center'
            });
        }

        function openPreview(photoUrl) {
            const clickedIndex = photosArray.indexOf(photoUrl);
            modal.style.display = "flex";
            document.body.style.overflow = "hidden";
            if (thumbsTrack.children.length === 0) initThumbnails();
            showPhoto(clickedIndex);
        }

        function closeGallery() {
            modal.style.display = "none";
            document.body.style.overflow = "auto";
        }

        function changePhoto(direction) {
            showPhoto(currentPhotoIndex + direction);
        }

        document.addEventListener('keydown', function(e) {
            if (modal.style.display === "flex") {
                if (e.key === "ArrowLeft") changePhoto(-1);
                if (e.key === "ArrowRight") changePhoto(1);
                if (e.key === "Escape") closeGallery();
            }
        });
    </script>

    <script>
        (function fillGuestName() {
            const name = new URLSearchParams(window.location.search).get("to");
            const el = document.getElementById("guestNameDisplay");
            if (name && el) el.textContent = decodeURIComponent(name);
        })();
    </script>

@endsection
