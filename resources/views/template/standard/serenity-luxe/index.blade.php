@extends('template.standard.serenity-luxe.app-serenity-luxe')

@section('title', 'Wedding of Sari & Bagas')
@section('page-title', 'Wedding')

@section('content')

    <!-- Cover Section -->
    <section id="cover">
        <div id="cover-shimmer"></div>
        <div id="cover-bg"></div>
        <div id="cover-overlay"></div>
        <div id="particleField" class="particle-field"></div>

        <div class="cover-content">
            <div class="cover-subtitle">The Wedding of</div>
            <div class="cover-names">Sari & Bagas</div>
            <div class="cover-subtitle">Kepada</div>
            <h4 id="guestNameDisplay"></h4>
            <button class="btn-open" onclick="openInvitation()">Open Invitation</button>
        </div>
    </section>

    <!-- Main Content -->
    <div id="main-content">

        <section id="top" class="hero-section">
            <div class="shine-overlay"></div>
            <div class="hero-content">
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <div class="hero-subtitle reveal reveal-up">The Wedding of</div>
                <div class="hero-names reveal reveal-up">Sari<br>&<br>Bagas</div>
                <div class="hero-date reveal reveal-up">Minggu, 22 September 2025</div>
            </div>
        </section>

        <!-- Quote Section -->
        <section class="quote-section">
            <div class="container">
                <h2 class="section-title section-title-quote reveal reveal-up">Quote</h2>
                <div class="quote-text reveal reveal-up" style="text-transform: none;">
                    "Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu
                    sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih
                    dan sayang. Sesungguhnya pada yang demikian itu benar-benar terdapat tanda-tanda (kebesaran Allah) bagi
                    kaum yang berpikir."
                    <br><br>
                    - (Qs. Ar-Rum : 21) -
                </div>
            </div>
        </section>

        <!-- Mempelai -->
        <section id="mempelai" class="couple-section">
            <div class="container">
                <h2 class="section-title section-title-couple reveal reveal-up">Mempelai</h2>
                <div class="row">

                    <div class="col-md-6 reveal reveal-left">
                        <div class="couple-card">
                            <h3 class="couple-name">Assalamu'alaikum Wr. Wb.</h3>
                            <p>Tanpa Mengurangi rasa hormat, kami mengundang Bapak/Ibu/Saudara/i serta kerabat sekalian
                                untuk menghadiri acara pernikahan kami:</p>
                            <br>

                            <div class="couple-photo-wrap"
                                onclick="openModal('/img/template/standard/serenity-luxe/couple/wanita.jpg','Sari Dewi Lestari')"
                                title="Lihat foto">
                                <img src="/img/template/standard/serenity-luxe/couple/wanita.jpg" alt="Mempelai Wanita"
                                    class="couple-photo"
                                    onerror="this.src='https://placehold.co/320x320/2a1f0e/c9a96e?text=Wanita'">
                                <span class="zoom-hint">
                                    <svg width="13" height="13" fill="none" stroke="currentColor"
                                        stroke-width="2.2" viewBox="0 0 24 24">
                                        <circle cx="11" cy="11" r="7" />
                                        <line x1="16.5" y1="16.5" x2="22" y2="22" />
                                        <line x1="8" y1="11" x2="14" y2="11" />
                                        <line x1="11" y1="8" x2="11" y2="14" />
                                    </svg>
                                </span>
                            </div>
                            <h3 class="couple-name">Sari Dewi Lestari, S.Kom.</h3>
                            <p>Putri Kedua dari Bapak Bambang Setiawan dan Ibu Nurhayati</p>
                            <br>
                            <p>
                                <a href="https://www.instagram.com/" class="link-putih" target="_blank"
                                    rel="noopener noreferrer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                                    </svg>
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 reveal reveal-right">
                        <div class="couple-card">
                            <div class="couple-photo-wrap"
                                onclick="openModal('/img/template/standard/serenity-luxe/couple/pria.jpg','Bagas Firmansyah')"
                                title="Lihat foto">
                                <img src="/img/template/standard/serenity-luxe/couple/pria.jpg" alt="Mempelai Pria"
                                    class="couple-photo"
                                    onerror="this.src='https://placehold.co/320x320/2a1f0e/c9a96e?text=Pria'">
                                <span class="zoom-hint">
                                    <svg width="13" height="13" fill="none" stroke="currentColor"
                                        stroke-width="2.2" viewBox="0 0 24 24">
                                        <circle cx="11" cy="11" r="7" />
                                        <line x1="16.5" y1="16.5" x2="22" y2="22" />
                                        <line x1="8" y1="11" x2="14" y2="11" />
                                        <line x1="11" y1="8" x2="11" y2="14" />
                                    </svg>
                                </span>
                            </div>
                            <h3 class="couple-name">Bagas Firmansyah, S.E.</h3>
                            <p>Putra Pertama dari Bapak Hendra Kurniawan dan Ibu Sulistyowati</p>
                            <br>
                            <p>
                                <a href="https://www.instagram.com/" class="link-putih" target="_blank"
                                    rel="noopener noreferrer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                                    </svg>
                                </a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Love Story -->
        <section class="love-story-section">
            <div class="container">
                <h2 class="section-title section-title-story reveal reveal-up">Our Love Story</h2>
                <p class="section-subtitle reveal reveal-up" style="text-align:center; margin-bottom: 2.5rem;">Perjalanan
                    cinta kami yang indah</p>

                <div class="love-story">
                    <div class="timeline-item reveal reveal-left">
                        <div class="timeline-icon"><i class="bi bi-heart-fill"></i></div>
                        <div class="timeline-content">
                            <div class="timeline-date">3 Februari 2022</div>
                            <h3 class="timeline-title">Pertemuan Tak Terduga</h3>
                            <p class="timeline-text">Kami pertama kali bertemu di perpustakaan kota saat sama-sama mencari
                                buku yang ternyata hanya tersisa satu eksemplar. Dari perdebatan kecil soal siapa yang
                                berhak meminjam, lahirlah perkenalan yang tak pernah kami duga akan sejauh ini.</p>
                        </div>
                    </div>
                    <div class="timeline-item reveal reveal-right">
                        <div class="timeline-icon"><i class="bi bi-camera-fill"></i></div>
                        <div class="timeline-content">
                            <div class="timeline-date">20 April 2022</div>
                            <h3 class="timeline-title">First Date</h3>
                            <p class="timeline-text">Bagas mengajak Sari ke sebuah taman kota untuk piknik sederhana.
                                Dengan bekal buatan sendiri dan cuaca yang sempurna, waktu berjalan begitu cepat hingga kami
                                sadar matahari sudah hampir terbenam.</p>
                        </div>
                    </div>
                    <div class="timeline-item reveal reveal-left">
                        <div class="timeline-icon"><i class="bi bi-stars"></i></div>
                        <div class="timeline-content">
                            <div class="timeline-date">14 Juli 2022</div>
                            <h3 class="timeline-title">Resmi Bersama</h3>
                            <p class="timeline-text">Di tepi danau favorit kami, Bagas meminta Sari untuk menjalani
                                hubungan yang lebih serius. Sejak hari itu, setiap langkah kami ditempuh berdua — saling
                                menguatkan dan mendukung.</p>
                        </div>
                    </div>
                    <div class="timeline-item reveal reveal-right">
                        <div class="timeline-icon"><i class="bi bi-gem"></i></div>
                        <div class="timeline-content">
                            <div class="timeline-date">25 Maret 2025</div>
                            <h3 class="timeline-title">Lamaran 💍</h3>
                            <p class="timeline-text">Setelah tiga tahun menjalani hubungan yang penuh warna, Bagas melamar
                                Sari di hadapan kedua keluarga dalam acara yang hangat dan penuh haru. Sebuah babak baru pun
                                dimulai.</p>
                        </div>
                    </div>
                    <div class="timeline-item reveal reveal-left">
                        <div class="timeline-icon"><i class="bi bi-heart-fill"></i></div>
                        <div class="timeline-content">
                            <div class="timeline-date">22 September 2025</div>
                            <h3 class="timeline-title">Wedding 🤍</h3>
                            <p class="timeline-text">Insyaallah di tanggal 22 September 2025 kami akan melangsungkan
                                pernikahan. Dengan segala hormat kami mengundang dan memohon doa restu.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal Foto Profil -->
        <div class="photo-modal-overlay" id="photoModal" onclick="closeModal(event)">
            <div class="photo-modal-inner">
                <button class="photo-modal-close" onclick="closeModal(null)" aria-label="Tutup">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
                <img src="" alt="" class="photo-modal-img" id="modalImg">
                <p class="photo-modal-name" id="modalName"></p>
            </div>
        </div>

        <!-- Countdown -->
        <section class="countdown-section">
            <div class="container">
                <h2 class="section-title section-title-countdown reveal reveal-up" style="color: #222222;">
                    <i class="bi bi-calendar-heart"></i> Save The Date
                </h2>
                <p class="reveal reveal-up"
                    style="color: #222222; text-align: center; margin-bottom: 2rem; font-size: 1.1rem;">Menuju Hari Bahagia
                    Kami</p>
                <div class="countdown-grid reveal reveal-up" style="color: #222222;">
                    <div class="countdown-item"><span class="countdown-number" id="days">00</span><span
                            class="countdown-label">Days</span></div>
                    <div class="countdown-item"><span class="countdown-number" id="hours">00</span><span
                            class="countdown-label">Hours</span></div>
                    <div class="countdown-item"><span class="countdown-number" id="minutes">00</span><span
                            class="countdown-label">Minutes</span></div>
                    <div class="countdown-item"><span class="countdown-number" id="seconds">00</span><span
                            class="countdown-label">Seconds</span></div>
                </div>
            </div>
        </section>

        <!-- Events -->
        <section id="event" class="event-section">
            <div class="container">
                <h2 class="section-title section-title-events reveal reveal-up" style="color: white;">
                    <i class="bi bi-calendar"></i> Wedding Events
                </h2>
                <div class="row">
                    <div class="col-md-6 reveal reveal-left">
                        <div class="event-card">
                            <h3 class="couple-name">Akad Nikah</h3><br>
                            <p><strong></strong> Minggu, 22 September 2025</p>
                            <p><strong></strong> Pukul : 09.00 WIB s/d Selesai</p>
                            <p><strong></strong> Ballroom Kenanga Grand Hotel Jl. Sudirman Raya No. 88 Kel. Karang Tengah
                                Kec. Gambir Kota Jakarta Pusat</p>
                        </div>
                    </div>
                    <div class="col-md-6 reveal reveal-right">
                        <div class="event-card">
                            <h3 class="couple-name">Resepsi Pernikahan</h3><br>
                            <p><strong></strong> Minggu, 22 September 2025</p>
                            <p><strong></strong> Pukul : 12.00 WIB s/d Selesai</p>
                            <p><strong></strong> Ballroom Kenanga Grand Hotel Jl. Sudirman Raya No. 88 Kel. Karang Tengah
                                Kec. Gambir Kota Jakarta Pusat</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Maps -->
        <section class="maps-section">
            <div class="container">
                <h2 class="section-title section-title-maps reveal reveal-up">Lokasi Acara</h2>
                <p class="section-subtitle reveal reveal-up">Lokasi akad nikah & resepsi kami</p>
                <div class="maps-grid reveal reveal-up">
                    <div class="map-card">
                        <div class="map-icon"><i class="bi bi-geo-alt"></i></div>
                        <h3 class="map-title section-title-maps">Akad Nikah & Resepsi</h3>
                        <div class="map-details">
                            <p><i class="bi bi-building"></i> Ballroom Kenanga Grand Hotel Jl. Sudirman Raya No. 88 Kel.
                                Karang Tengah Kec. Gambir Kota Jakarta Pusat</p>
                            <p><i class="bi bi-clock"></i> Minggu, 22 September 2025</p>
                            <p><i class="bi bi-calendar"></i> Akad: 09.00 WIB | Resepsi: 12.00 WIB s/d Selesai</p>
                        </div>
                        <div class="map-container">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613!3d-6.2087634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTInMzEuNiJTIDEwNsKwNDknMTAuNCJF!5e0!3m2!1sen!2sid!4v1234567890"
                                width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <a href="https://maps.google.com" target="_blank" class="map-btn"><i class="bi bi-map"></i> Buka
                            di Google Maps</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Gallery -->
        <section class="gallery-section">
            <div class="container">
                <h2 class="section-title section-title-gallery reveal reveal-up">Gallery Highlights</h2>

                @if (empty($galleryPhotos))
                    <p style="text-align:center;opacity:0.5;padding:2rem 0;">Belum ada foto di folder gallery.</p>
                @else
                    <div class="swiper gallerySwiper">
                        <div class="swiper-wrapper">
                            @foreach ($galleryPhotos as $index => $photo)
                                <div class="swiper-slide">
                                    <img src="{{ $photo }}?v={{ time() }}" alt="Gallery {{ $index + 1 }}"
                                        loading="lazy">
                                    <div class="preview-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path
                                                d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z" />
                                        </svg>
                                        <span>Preview</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                @endif
            </div>
        </section>

        <!-- Video -->
        <section class="video-section">
            <div class="video-container">
                <h2 class="video-title reveal reveal-up">Our Precious Moments</h2>
                <div class="video-wrapper reveal reveal-up">
                    <video class="video-player" controls playsinline preload="metadata">
                        <source src="/video/video.mp4" type="video/mp4">
                        Browser Anda tidak mendukung tag video.
                    </video>
                </div>
                <p class="video-caption reveal reveal-up">"Menautkan janji dalam bingkai kasih sayang yang abadi."</p>
            </div>
        </section>

        <!-- RSVP -->
        <section id="rsvp" class="rsvp-section">
            <div class="container">
                <h2 class="section-title section-title-rsvp reveal reveal-up">RSVP - Konfirmasi Kehadiran</h2>
                <br>
                <p class="section-subtitle-rsvp reveal reveal-up">Mohon konfirmasi kehadiran Anda</p>
                <form class="rsvp-form reveal reveal-up" id="rsvpForm">
                    <div class="form-group">
                        <label><i class="bi bi-person-fill"></i> Nama Lengkap *</label>
                        <input type="text" class="form-control" id="nama" placeholder="Nama Anda" required>
                    </div>
                    <div class="form-group">
                        <label><i class="bi bi-check-circle-fill"></i> Konfirmasi Kehadiran *</label>
                        <select class="form-control" id="status" required>
                            <option value="">Pilih...</option>
                            <option value="Hadir">✓ Hadir</option>
                            <option value="Tidak Hadir">✗ Tidak Hadir</option>
                            <option value="Masih Ragu">? Masih Ragu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><i class="bi bi-chat-heart-fill"></i> Ucapan & Doa</label>
                        <textarea class="form-control" id="ucapan" rows="4" placeholder="Tuliskan ucapan dan doa untuk kami..."></textarea>
                    </div>
                    <button type="submit" class="btn-submit"><i class="bi bi-send"></i> Kirim</button>
                </form>
            </div>
        </section>

        <!-- Wishes -->
        <section class="wishes-section">
            <div class="container">
                <h2 class="section-title section-title-wishes reveal reveal-up">Ucapan & Doa</h2>
                <div class="wishes-list" id="wishesList">
                    <div class="wishes-loading">Memuat ucapan...</div>
                </div>
                <div id="paginationContainer" class="pagination-container"></div>
            </div>
        </section>

        <!-- Gift -->
        <section class="gift-section">
            <div class="gf-container">
                <div class="gf-label reveal reveal-up">Love Gift</div>
                <div class="gf-title reveal reveal-up">Beri dengan Kasih</div>
                <p class="gf-subtitle reveal reveal-up">Doa restu Anda merupakan karunia yang sangat berarti bagi kami.
                    Namun jika memberi adalah ungkapan kasih, Anda dapat memberi kado secara cashless.</p>

                <div class="gift-cards reveal reveal-up">
                    <div class="gift-card bank-card-wrap">
                        <div class="bank-card">
                            <div class="bank-card-top">
                                <div class="bank-card-logo">
                                    <img src="/img/bank/bni-logo.png" alt="BNI"
                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='block'">
                                    <span class="bank-card-logo-fallback" style="display:none;">BNI</span>
                                </div>
                            </div>
                            <div class="bank-card-chip"></div>
                            <div class="bank-card-number-wrap"><span
                                    class="bank-card-number">••••&nbsp;&nbsp;••••&nbsp;&nbsp;••••&nbsp;&nbsp;7712</span>
                            </div>
                            <div class="bank-card-footer">
                                <span class="bank-card-name">Sari Dewi Lestari</span>
                                <button class="bank-copy-btn" onclick="copyToClipboard('0881234567712', this)">
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

                    <div class="gift-card bank-card-wrap">
                        <div class="bank-card">
                            <div class="bank-card-top">
                                <div class="bank-card-logo">
                                    <img src="/img/bank/bsi-logo.png" alt="BSI"
                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='block'">
                                    <span class="bank-card-logo-fallback" style="display:none;">BSI</span>
                                </div>
                            </div>
                            <div class="bank-card-chip"></div>
                            <div class="bank-card-number-wrap"><span
                                    class="bank-card-number">••••&nbsp;&nbsp;••••&nbsp;&nbsp;••••&nbsp;&nbsp;3305</span>
                            </div>
                            <div class="bank-card-footer">
                                <span class="bank-card-name">Bagas Firmansyah</span>
                                <button class="bank-copy-btn" onclick="copyToClipboard('7157890003305', this)">
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

        <!-- Turut Mengundang -->
        <section class="turut-mengundang-section">
            <div class="container">
                <h2 class="section-title-mengundang" style="text-align:center;">Turut Mengundang</h2>
                <div class="silver-rule reveal reveal-up"></div>
                <div class="reveal reveal-up turut-list">
                    <p>H. Mukhtar Hakim, S.E.</p>
                    <p>Drs. Gunawan Santoso, M.M.</p>
                    <p>Irfan Maulana, S.T.</p>
                    <p>Agus Priyanto, S.Pd.</p>
                    <p>Ust. Zainul Arifin, S.Pd.I.</p>
                    <p>H. Fathurrahman, S.Ag., M.Pd.</p>
                    <p>Siti Rohimah, S.Pd.</p>
                    <p>Wahyu Triyono</p>
                    <p>Ust. Hilman Al-Ghazali</p>
                    <p>Taufik Hidayat</p>
                    <p>Rino Wibisono (Rino Cell)</p>
                    <p>Keluarga Besar Perumahan Griya Asri (Jakarta Pusat)</p>
                    <p>Keluarga Besar SDN Karang Tengah 03</p>
                    <p>Keluarga Besar PAUD dan TPA Al-Amin</p>
                    <p>Risma Aulia Putri</p>
                </div>
            </div>
        </section>

        <!-- Closing -->
        <section class="closing-section">
            <div class="falling-elements">
                <div class="fall-item flower"></div>
                <div class="fall-item leaf"></div>
                <div class="fall-item heart"></div>
                <div class="fall-item flower"></div>
                <div class="fall-item leaf"></div>
                <div class="fall-item heart"></div>
            </div>

            <div class="closing-content reveal reveal-up">
                <div class="closing-icon">💍</div>
                <h2 class="closing-title">Thank You</h2>
                <p class="closing-message">Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i
                    berkenan hadir untuk memberikan doa restu kepada kami.</p>
                <div class="closing-divider">✦ ✦ ✦</div>
                <div class="closing-names">
                    <h3>Wedding of</h3>
                    <p style="font-family: 'Amsterdam Signature', cursive; font-size: 2rem; color: #fff;">Sari & Bagas</p>
                </div>
                <p class="closing-date">Minggu, 22 September 2025</p>
                <div class="closing-socials">
                    <a href="#" class="social-link"><i class="bi bi-instagram"></i></a>
                </div>
                <p class="closing-credit">Made with ❤️ by Imora Invitation</p>
            </div>
        </section>

        <!-- Bottom Nav — Font Awesome diganti Bootstrap Icons -->
        <nav class="bottom-nav" id="main-nav">
            <a href="#top" class="nav-item"><i class="bi bi-house-fill"></i><span>Beranda</span></a>
            <a href="#mempelai" class="nav-item"><i class="bi bi-heart-fill"></i><span>Mempelai</span></a>
            <a href="#event" class="nav-item"><i class="bi bi-calendar-event"></i><span>Acara</span></a>
            <a href="#rsvp" class="nav-item"><i class="bi bi-chat-dots"></i><span>Ucapan</span></a>
        </nav>
    </div>

    <!-- Music -->
    <button class="music-toggle" id="musicToggle" onclick="toggleMusic()">
        <i class="bi bi-music-note-beamed" id="musicIcon"></i>
    </button>

    <audio id="bgMusic" loop>
        <source src="{{ asset('musik/Mahalli-Bermuara.mp3') }}" type="audio/mpeg">
    </audio>

    {{-- ══ Script ringan: particles, petals, reveal observer ══ --}}
    <script>
        // ── Particle Cover ──
        (function() {
            var field = document.getElementById('particleField');
            if (!field) return;
            for (var i = 0; i < 14; i++) {
                var p = document.createElement('div');
                p.className = 'pf-dot';
                var size = 2 + Math.random() * 4;
                p.style.cssText = 'width:' + size + 'px;height:' + size + 'px;left:' + (Math.random() * 100) +
                    '%;bottom:-10px;animation-duration:' + (12 + Math.random() * 16) + 's;animation-delay:-' + (Math
                        .random() * 14) + 's;opacity:' + (0.25 + Math.random() * 0.5);
                field.appendChild(p);
            }
        })();

        // ── Petals (saat buka undangan) ──
        function spawnPetals() {
            var symbols = ['✿', '✾', '❀', '✽', '🌸'];
            var c = 0;
            var iv = setInterval(function() {
                if (c++ > 16) {
                    clearInterval(iv);
                    return;
                }
                var p = document.createElement('span');
                p.className = 'petal';
                p.textContent = symbols[Math.floor(Math.random() * symbols.length)];
                p.style.cssText = 'left:' + (Math.random() * 100) + 'vw;animation-duration:' + (4 + Math.random() *
                    5) + 's;animation-delay:' + (Math.random() * 2) + 's;font-size:' + (10 + Math.random() *
                    10) + 'px;color:rgba(201,169,110,0.7)';
                document.body.appendChild(p);
                setTimeout(function() {
                    p.remove();
                }, 9000);
            }, 250);
        }

        // ── Hook openInvitation ──
        var _origOpen = window.openInvitation;
        window.openInvitation = function() {
            if (typeof _origOpen === 'function') _origOpen();
            spawnPetals();
            // Hero content show
            setTimeout(function() {
                var hc = document.querySelector('.hero-content');
                if (hc) hc.classList.add('show');
            }, 500);
        };

        // ── Scroll Reveal (IntersectionObserver) ──
        var revealEls = document.querySelectorAll('.reveal');
        var revealObs = new IntersectionObserver(function(entries) {
            entries.forEach(function(e) {
                if (e.isIntersecting) {
                    e.target.classList.add('visible');
                    revealObs.unobserve(e.target);
                }
            });
        }, {
            threshold: 0.12
        });
        revealEls.forEach(function(el) {
            revealObs.observe(el);
        });
    </script>

@endsection
