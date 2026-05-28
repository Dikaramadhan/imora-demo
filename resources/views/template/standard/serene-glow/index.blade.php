@extends('template.standard.serene-glow.app-serene-glow')

@section('title', 'Wedding of Nayla & Rafi')

@section('content')

    <!-- ══════════════════════════════════════
                                                                                                                                         COVER SECTION
                                                                                                                                    ══════════════════════════════════════ -->
    <section id="cover">
        <div class="corner corner-tl"></div>
        <div class="corner corner-tr"></div>
        <div class="corner corner-bl"></div>
        <div class="corner corner-br"></div>

        <svg class="cover-ornament cover-ornament-top" width="110" height="18" viewBox="0 0 110 18" fill="none">
            <line x1="0" y1="9" x2="44" y2="9" stroke="#ffffff" stroke-width="0.5" />
            <circle cx="55" cy="9" r="3" stroke="#ffffff" stroke-width="0.5" fill="none" />
            <circle cx="55" cy="9" r="1" fill="#ffffff" />
            <circle cx="47" cy="9" r="1" fill="#ffffff" opacity="0.5" />
            <circle cx="63" cy="9" r="1" fill="#ffffff" opacity="0.5" />
            <line x1="66" y1="9" x2="110" y2="9" stroke="#ffffff" stroke-width="0.5" />
        </svg>

        <div class="particle-field" id="particleField"></div>

        <div class="cover-content">
            <div class="label-top">The Wedding of</div>
            <div class="divider"></div>
            <div class="couple-name">
                Nayla
                <span class="ampersand">&amp;</span>
                Rafi
            </div>
            <div class="divider"></div>
            <div class="cover-tagline">Two Souls, One Heart</div>
            <div class="guest-block">
                <div class="guest-label">Kepada Yth.</div>
                <div class="guest-name-text" id="guestNameDisplay">Nama Tamu Undangan</div>
            </div>
            <button class="btn-open" onclick="openInvitation()" aria-label="Buka Undangan">
                Buka Undangan
                <span class="btn-arrow">&#8594;</span>
            </button>
        </div>

        <svg class="cover-ornament cover-ornament-bottom" width="110" height="18" viewBox="0 0 110 18" fill="none">
            <line x1="0" y1="9" x2="44" y2="9" stroke="#ffffff" stroke-width="0.5" />
            <circle cx="55" cy="9" r="3" stroke="#ffffff" stroke-width="0.5" fill="none" />
            <circle cx="55" cy="9" r="1" fill="#ffffff" />
            <circle cx="47" cy="9" r="1" fill="#ffffff" opacity="0.8" />
            <circle cx="63" cy="9" r="1" fill="#ffffff" opacity="0.8" />
            <line x1="66" y1="9" x2="110" y2="9" stroke="#ffffff" stroke-width="0.8" />
        </svg>
    </section>

    <!-- ══════════════════════════════════════
                                                                                                                                         MAIN CONTENT
                                                                                                                                    ══════════════════════════════════════ -->
    <div id="main-content">

        <!-- HERO -->
        <section class="hero-section">
            <div class="shine-overlay"></div>
            <div class="hero-content" id="heroContent">
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <div class="hero-subtitle anim-target anim-fade-left anim-dur-slow">The Wedding of</div>
                <div class="hero-names anim-target anim-fade-left anim-dur-slow anim-delay-2">Nayla Azzahra Putri & Rafi
                    Aditya Pratama</div>
                <div class="hero-date anim-target anim-fade-left anim-dur-slow anim-delay-4">Sabtu, 20 September 2025</div>
            </div>
        </section>

        <!-- QUOTE -->
        <section class="quote-section">
            <div class="qs-corner-tl"></div>
            <div class="qs-corner-tr"></div>
            <div class="qs-corner-bl"></div>
            <div class="qs-corner-br"></div>

            <div class="qs-divider-top anim-target anim-line-draw-center anim-dur-slow">
                <div class="qs-div-line"></div>
                <div class="qs-div-diamond"></div>
                <div class="qs-div-line"></div>
            </div>

            <span class="qs-openquote anim-target anim-scale-in anim-dur-slow"></span>

            <div class="quote-text anim-target anim-blur-left anim-dur-slow anim-delay-2">
                Dan di antara tanda-tanda-Nya ialah Dia menciptakan untukmu istri-istri dari jenismu sendiri,
                supaya kamu cenderung dan merasa tenteram kepadanya, dan dijadikan-Nya di antaramu rasa kasih dan sayang.
            </div>

            <span class="qs-source anim-target anim-fade-up anim-dur-slow anim-delay-4">QS. Ar-Rūm : 21</span>

            <div class="qs-divider-bot anim-target anim-line-draw-center anim-dur-slow anim-delay-5">
                <div class="qs-div-line"></div>
                <div class="qs-div-diamond"></div>
                <div class="qs-div-line"></div>
            </div>
        </section>

        <!-- MEMPELAI -->
        <section id="mempelai" class="couple-section">
            <div class="container">
                <h2 class="section-title section-title-couple anim-target anim-fade-down anim-dur-slow">Mempelai</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="couple-card anim-target anim-fade-left anim-dur-slow anim-delay-1">
                            <h3 class="couple-name-c anim-target anim-fade-left anim-dur-normal anim-delay-2">
                                Assalamu'alaikum Wr. Wb.</h3>
                            <p class="anim-target anim-fade-left anim-dur-normal anim-delay-3">Tanpa mengurangi rasa
                                hormat, kami mengundang Bapak/Ibu/Saudara/i serta kerabat sekalian untuk menghadiri acara
                                pernikahan kami:</p>
                            <br>
                            <div class="couple-photo-wrap anim-target anim-photo-reveal anim-dur-slower anim-delay-3"
                                onclick="openModal('/img/template/standard/serene-glow/couple/wanita.jpeg','Nayla Azzahra Putri')"
                                title="Lihat foto">
                                <img src="/img/template/standard/serene-glow/couple/wanita.jpeg" alt="Mempelai Wanita"
                                    class="couple-photo"
                                    onerror="this.src='https://placehold.co/320x320/2a1f0e/c9a96e?text=Nayla'">
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
                            <h3 class="couple-name anim-target anim-fade-left anim-dur-normal anim-delay-5">Nayla Azzahra
                                Putri, S.Pd</h3>
                            <p class="couple-parent anim-target anim-fade-left anim-dur-normal anim-delay-6">Putri Pertama
                                dari Bapak Ahmad Fauzi, S.T &amp; Ibu Dewi Sartika</p>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="couple-card anim-target anim-fade-right anim-dur-slow anim-delay-2">
                            <div class="couple-photo-wrap anim-target anim-photo-reveal anim-dur-slower anim-delay-3"
                                onclick="openModal('/img/template/standard/serene-glow/couple/pria.jpeg','Rafi Aditya Pratama')"
                                title="Lihat foto">
                                <img src="/img/template/standard/serene-glow/couple/pria.jpeg" alt="Mempelai Pria"
                                    class="couple-photo"
                                    onerror="this.src='https://placehold.co/320x320/2a1f0e/c9a96e?text=Rafi'">
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
                            <h3 class="couple-name anim-target anim-fade-right anim-dur-normal anim-delay-5">Rafi Aditya
                                Pratama, S.T</h3>
                            <p class="couple-parent anim-target anim-fade-right anim-dur-normal anim-delay-6">Putra Kedua
                                dari Alm. Bapak Hendra Wijaya &amp; Ibu Ratna Dewi</p>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- COUNTDOWN -->
        <section class="countdown-section">
            <div class="qs-corner-tl"></div>
            <div class="qs-corner-tr"></div>
            <div class="qs-corner-bl"></div>
            <div class="qs-corner-br"></div>
            <div class="container">
                <h2 class="section-title section-title-countdown anim-target anim-fade-up anim-dur-slow">
                    <i class="bi bi-calendar-heart"></i> Save The Date
                </h2>
                <br>
                <p class="anim-target anim-fade-up anim-dur-normal anim-delay-1"
                    style="color:rgba(15,15,15,0.9);text-align:center;margin-bottom:2rem;font-size:1.0rem;">
                    Menuju Hari Bahagia Kami
                </p>
                <div class="countdown-grid anim-stagger">
                    <div class="countdown-item anim-target anim-scale-in">
                        <div class="cd-card">
                            <span class="countdown-number" id="days">00</span>
                            <div class="cd-card-line"></div>
                            <span class="countdown-label">Hari</span>
                        </div>
                        <span class="cd-sep">:</span>
                    </div>
                    <div class="countdown-item anim-target anim-scale-in">
                        <div class="cd-card">
                            <span class="countdown-number" id="hours">00</span>
                            <div class="cd-card-line"></div>
                            <span class="countdown-label">Jam</span>
                        </div>
                        <span class="cd-sep">:</span>
                    </div>
                    <div class="countdown-item anim-target anim-scale-in">
                        <div class="cd-card">
                            <span class="countdown-number" id="minutes">00</span>
                            <div class="cd-card-line"></div>
                            <span class="countdown-label">Menit</span>
                        </div>
                        <span class="cd-sep">:</span>
                    </div>
                    <div class="countdown-item anim-target anim-scale-in">
                        <div class="cd-card">
                            <span class="countdown-number" id="seconds">00</span>
                            <div class="cd-card-line"></div>
                            <span class="countdown-label">Detik</span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="cd-date-badge anim-target anim-fade-up anim-dur-slow anim-delay-6">
                    <div class="cd-date-dot"></div>
                    20 · 09 · 2025
                    <div class="cd-date-dot"></div>
                </div>
            </div>
        </section>

        <!-- EVENT -->
        <section id="event" class="event-section">
            <div class="container">
                <h2 class="section-title section-title-events anim-target anim-fade-down anim-dur-slow">
                    <i class="bi bi-calendar-check"></i> Wedding Events
                </h2>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="event-card anim-target anim-fade-up anim-dur-slow anim-hover-lift anim-delay-1">
                            <div class="event-icon-top"><i class="bi bi-heart-fill"></i></div>
                            <h3>Akad Nikah</h3>
                            <div class="event-detail">
                                <p><i class="bi bi-calendar3"></i> Sabtu, 20 September 2025</p>
                                <p><i class="bi bi-clock"></i> 09.00 – 10.00 WIB</p>
                                <hr class="event-divider">
                                <p><strong><i class="bi bi-geo-alt-fill"></i> Gedung Serba Guna Permata</strong></p>
                                <p class="address-text">Jl. Melati No. 17, RT. 005/RW. 002, Kel. Cempaka, Kec. Batuceper,
                                    Kota Tangerang, Banten</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="event-card anim-target anim-fade-up anim-dur-slow anim-hover-lift anim-delay-3">
                            <div class="event-icon-top"><i class="bi bi-people-fill"></i></div>
                            <h3>Resepsi Nikah</h3>
                            <div class="event-detail">
                                <p><i class="bi bi-calendar3"></i> Sabtu, 20 September 2025</p>
                                <p><i class="bi bi-clock"></i> 11.00 WIB – Selesai</p>
                                <hr class="event-divider">
                                <p><strong><i class="bi bi-geo-alt-fill"></i> Gedung Serba Guna Permata</strong></p>
                                <p class="address-text">Jl. Melati No. 17, RT. 005/RW. 002, Kel. Cempaka, Kec. Batuceper,
                                    Kota Tangerang, Banten</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- MAPS -->
        <section class="maps-section">
            <div class="mp-corner mp-corner-tl"></div>
            <div class="mp-corner mp-corner-tr"></div>
            <div class="mp-corner mp-corner-bl"></div>
            <div class="mp-corner mp-corner-br"></div>
            <div class="mp-header">
                <svg width="160" height="32" viewBox="0 0 160 32" fill="none"
                    style="display:block;margin:0 auto 10px">
                    <path d="M4 16 Q20 4 40 11 Q52 15 68 16 Q52 17 40 21 Q20 28 4 16Z" fill="#a07830" opacity=".1" />
                    <path d="M4 16 Q20 5 40 12 Q52 15 68 16" stroke="#a07830" stroke-width=".8" fill="none"
                        opacity=".5" />
                    <path d="M4 16 Q20 27 40 20 Q52 17 68 16" stroke="#a07830" stroke-width=".5" fill="none"
                        opacity=".3" />
                    <circle cx="80" cy="16" r="10" fill="#faf8f4" stroke="#a07830" stroke-width=".8" />
                    <circle cx="80" cy="16" r="6.5" fill="none" stroke="#a07830" stroke-width=".4"
                        stroke-dasharray="1.5 1.8" />
                    <circle cx="80" cy="16" r="2" fill="#a07830" opacity=".6" />
                    <path d="M156 16 Q140 4 120 11 Q108 15 92 16 Q108 17 120 21 Q140 28 156 16Z" fill="#a07830"
                        opacity=".1" />
                    <path d="M156 16 Q140 5 120 12 Q108 15 92 16" stroke="#a07830" stroke-width=".8" fill="none"
                        opacity=".5" />
                    <path d="M156 16 Q140 27 120 20 Q108 17 92 16" stroke="#a07830" stroke-width=".5" fill="none"
                        opacity=".3" />
                </svg>
                <div class="mp-label anim-target anim-fade-up anim-dur-fast">Lokasi Pernikahan</div>
                <div class="mp-title anim-target anim-fade-up anim-dur-normal anim-delay-1">Akad & Resepsi</div>
            </div>
            <div class="mp-divider anim-target anim-line-draw-center anim-dur-slow">
                <div class="mp-div-line"></div>
                <div class="mp-div-dot"></div>
                <div class="mp-div-diamond"></div>
                <div class="mp-div-dot"></div>
                <div class="mp-div-line"></div>
            </div>
            <div class="container">
                <div class="maps-grid">
                    <div class="map-card anim-target anim-fade-left anim-dur-slow anim-hover-lift">
                        <div class="map-card-inner">
                            <div class="map-icon-badge">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                                    <path
                                        d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                </svg>
                            </div>
                            <div class="map-title">Akad Nikah</div>
                            <div class="map-type-pill">09.00 WIB &middot; Sabtu, 20 September 2025</div>
                            <div class="map-details">
                                <div class="map-detail-row">
                                    <svg class="map-detail-icon" width="14" height="14" viewBox="0 0 16 16"
                                        fill="currentColor">
                                        <path
                                            d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                                        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
                                    </svg>
                                    <span><strong>Gedung Serba Guna Permata</strong></span>
                                </div>
                                <div class="map-detail-row">
                                    <svg class="map-detail-icon" width="14" height="14" viewBox="0 0 16 16"
                                        fill="currentColor">
                                        <path
                                            d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                    </svg>
                                    <span>Jl. Melati No. 17, RT. 005/RW. 002, Kel. Cempaka, Kec. Batuceper, Kota
                                        Tangerang</span>
                                </div>
                            </div>
                        </div>
                        <div class="map-container">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.6297!3d-6.1784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d2e764b12d%3A0x3d2ad6e1e5a7b9c1!2sBatuceper%2C+Tangerang!5e0!3m2!1sid!2sid"
                                width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <a href="https://maps.google.com/?q=Jl.+Melati+No.17+Cempaka+Batuceper+Tangerang" target="_blank"
                            class="map-btn">
                            <svg width="14" height="14" viewBox="0 0 16 16" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.5.5 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103M10 1.91l-4-.8v12.98l4 .8zm1 12.98 4-.8V1.11l-4 .8zm-6-.8V1.11l-4 .8v12.98z" />
                            </svg>
                            Buka di Google Maps
                        </a>
                    </div>
                    <div class="map-card anim-target anim-fade-right anim-dur-slow anim-hover-lift">
                        <div class="map-card-inner">
                            <div class="map-icon-badge">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                                    <path
                                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                </svg>
                            </div>
                            <div class="map-title">Resepsi Nikah</div>
                            <div class="map-type-pill">11.00 WIB &middot; Sabtu, 20 September 2025</div>
                            <div class="map-details">
                                <div class="map-detail-row">
                                    <svg class="map-detail-icon" width="14" height="14" viewBox="0 0 16 16"
                                        fill="currentColor">
                                        <path
                                            d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                                        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
                                    </svg>
                                    <span><strong>Gedung Serba Guna Permata</strong></span>
                                </div>
                                <div class="map-detail-row">
                                    <svg class="map-detail-icon" width="14" height="14" viewBox="0 0 16 16"
                                        fill="currentColor">
                                        <path
                                            d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                    </svg>
                                    <span>Jl. Melati No. 17, RT. 005/RW. 002, Kel. Cempaka, Kec. Batuceper, Kota
                                        Tangerang</span>
                                </div>
                            </div>
                        </div>
                        <div class="map-container">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.6297!3d-6.1784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d2e764b12d%3A0x3d2ad6e1e5a7b9c1!2sBatuceper%2C+Tangerang!5e0!3m2!1sid!2sid"
                                width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <a href="https://maps.google.com/?q=Jl.+Melati+No.17+Cempaka+Batuceper+Tangerang" target="_blank"
                            class="map-btn">
                            <svg width="14" height="14" viewBox="0 0 16 16" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.5.5 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103M10 1.91l-4-.8v12.98l4 .8zm1 12.98 4-.8V1.11l-4 .8zm-6-.8V1.11l-4 .8v12.98z" />
                            </svg>
                            Buka di Google Maps
                        </a>
                    </div>
                </div>
            </div>
            <div class="mp-bottom">
                <div class="mp-divider anim-target anim-line-draw-center anim-dur-slow">
                    <div class="mp-div-line"></div>
                    <div class="mp-div-dot"></div>
                    <div class="mp-div-diamond"></div>
                    <div class="mp-div-dot"></div>
                    <div class="mp-div-line"></div>
                </div>
            </div>
        </section>

        <!-- GALLERY -->
        <section class="gallery-section">
            <div class="gallery-header">
                <h2 class="section-title section-title-countdown anim-target anim-blur-in anim-dur-slow">Our Precious
                    Moments</h2>
            </div>
            <div class="slider-container anim-target anim-fade-up anim-dur-slow anim-delay-2">
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
            </div>
        </section>

        <!-- GALLERY MODAL -->
        <div id="galleryModal" class="gallery-preview-modal">
            <div class="modal-overlay" onclick="closeGallery()"></div>
            <div class="gallery-header">
                <span class="photo-counter" id="photoCounter">1 / 1</span>
                <button class="close-gallery" onclick="closeGallery()">&times;</button>
            </div>
            <div class="main-photo-container">
                <button class="nav-btn prev-btn" onclick="changePhoto(-1)"><i class="bi bi-chevron-left"></i></button>
                <img id="mainPreviewImg" class="main-preview-img" src="" alt="Preview">
                <button class="nav-btn next-btn" onclick="changePhoto(1)"><i class="bi bi-chevron-right"></i></button>
            </div>
            <div class="thumbnails-container-wrapper">
                <div class="thumbnails-track" id="thumbnailsTrack"></div>
                <div class="grid-icon"><i class="bi bi-grid-3x3-gap-fill"></i></div>
            </div>
        </div>

        <!-- RSVP -->
        <section id="rsvp" class="rsvp-section">
            <div class="container">
                <h2 class="section-title section-title-rsvp anim-target anim-fade-down anim-dur-slow">RSVP - Konfirmasi
                    Kehadiran</h2>
                <br>
                <p class="section-subtitle anim-target anim-fade-up anim-dur-normal anim-delay-1">Mohon konfirmasi
                    kehadiran Anda</p>
                <form class="rsvp-form anim-target anim-rotate-in anim-dur-slow anim-delay-2" id="rsvpForm">
                    @csrf
                    <div class="form-group">
                        <label><i class="bi bi-person-fill"></i> Nama Lengkap *</label>
                        <input type="text" class="form-control" id="rsvpNama" placeholder="Nama Anda" required>
                    </div>
                    <div class="form-group">
                        <label><i class="bi bi-check-circle-fill"></i> Konfirmasi Kehadiran *</label>
                        <select class="form-control" id="rsvpStatus" required>
                            <option value="">Pilih...</option>
                            <option value="Hadir">✓ Hadir</option>
                            <option value="Tidak Hadir">✗ Tidak Hadir</option>
                            <option value="Masih Ragu">? Masih Ragu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><i class="bi bi-chat-heart-fill"></i> Ucapan & Doa</label>
                        <textarea class="form-control" id="rsvpMessage" rows="4" placeholder="Tuliskan ucapan dan doa untuk kami..."></textarea>
                    </div>
                    <button type="submit" class="btn-submit" id="rsvpSubmitBtn">
                        <i class="bi bi-send"></i> Kirim
                    </button>
                </form>
            </div>
        </section>

        <!-- WISHES -->
        <section class="wishes-section">
            <div class="container">
                <h2 class="section-title section-title-wishes anim-target anim-fade-up anim-dur-slow">Ucapan & Doa</h2>
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

        <!-- GIFT -->
        <section class="gift-section">
            <div class="gf-container">
                <div class="gf-label anim-target anim-fade-up anim-dur-fast">Love Gift</div>
                <div class="gf-title anim-target anim-fade-up anim-dur-normal anim-delay-1">Beri dengan Kasih</div>
                <p class="gf-subtitle anim-target anim-fade-up anim-dur-normal anim-delay-2">
                    Doa restu Anda merupakan karunia yang sangat berarti bagi kami.
                    Namun jika memberi adalah ungkapan kasih, Anda dapat memberi kado secara cashless.
                </p>
                <div class="gift-cards">
                    <div class="gift-card bank-card-wrap anim-target anim-flip-y anim-dur-slow anim-delay-3">
                        <div class="bank-card">
                            <div class="bank-card-top">
                                <div class="bank-card-logo">
                                    <img src="/img/bank/BCA.png" alt="Bank BCA"
                                        onerror="this.style.display='none';this.nextElementSibling.style.display='block'">
                                    <span class="bank-card-logo-fallback" style="display:none;">BCA</span>
                                </div>
                            </div>
                            <div class="bank-card-chip"></div>
                            <div class="bank-card-number-wrap">
                                <span class="bank-card-number">••••&nbsp;&nbsp;••••&nbsp;&nbsp;••••&nbsp;&nbsp;3547</span>
                            </div>
                            <div class="bank-card-footer">
                                <span class="bank-card-name">Nayla Azzahra Putri</span>
                                <button class="bank-copy-btn" onclick="copyToClipboard('873025613547', this)">
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
                    <div class="gift-card bank-card-wrap anim-target anim-flip-y anim-dur-slow anim-delay-5">
                        <div class="bank-card">
                            <div class="bank-card-top">
                                <div class="bank-card-logo">
                                    <img src="/img/bank/BCA.png" alt="Bank BCA"
                                        onerror="this.style.display='none';this.nextElementSibling.style.display='block'">
                                    <span class="bank-card-logo-fallback" style="display:none;">Bank BCA</span>
                                </div>
                            </div>
                            <div class="bank-card-chip"></div>
                            <div class="bank-card-number-wrap">
                                <span class="bank-card-number">••••&nbsp;&nbsp;••••&nbsp;&nbsp;••••&nbsp;&nbsp;8201</span>
                            </div>
                            <div class="bank-card-footer">
                                <span class="bank-card-name">Rafi Aditya Pratama</span>
                                <button class="bank-copy-btn" onclick="copyToClipboard('873041928201', this)">
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
                    <div
                        class="gift-card address-card anim-target anim-fade-up anim-dur-slow anim-delay-7 anim-hover-lift">
                        <div class="gift-bank-name">Kirim Hadiah</div>
                        <div class="gf-card-divider"></div>
                        <div class="gift-address">
                            <p><strong>Penerima:</strong> Nayla Azzahra Putri</p>
                            <p>Jl. Melati No. 17, RT. 005/RW. 002, Kel. Cempaka, Kecamatan Batuceper, Kota Tangerang, Banten
                            </p>
                        </div>
                        <button class="copy-btn full-width" onclick="copyAddress(this)">
                            <svg width="12" height="12" viewBox="0 0 16 16" fill="currentColor">
                                <path
                                    d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z" />
                                <path
                                    d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z" />
                            </svg>
                            <span class="copy-text">Salin Alamat</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- TURUT MENGUNDANG -->
        <section class="turut-section">
            <div class="tm-corner tm-corner-tl"></div>
            <div class="tm-corner tm-corner-tr"></div>
            <div class="tm-corner tm-corner-bl"></div>
            <div class="tm-corner tm-corner-br"></div>
            <div class="tm-label anim-target anim-fade-up anim-dur-fast">Turut Mengundang</div>
            <div class="tm-title anim-target anim-fade-up anim-dur-normal anim-delay-1">Bersama Kami</div>
            <div class="tm-divider anim-target anim-line-draw-center anim-dur-slow">
                <div class="tm-div-line"></div>
                <div class="tm-div-dot"></div>
                <div class="tm-div-diamond"></div>
                <div class="tm-div-dot"></div>
                <div class="tm-div-line"></div>
            </div>
            <div class="tm-list anim-stagger">
                <div class="tm-group-label">Pihak Perempuan</div>
                <div class="tm-card anim-target anim-fade-up anim-dur-normal">
                    <div class="tm-mono">RF</div>
                    <div class="tm-info">
                        <p class="tm-name">Bpk. Rizal Firmansyah</p>
                        <p class="tm-role">Kakek</p>
                    </div>
                </div>
                <div class="tm-card anim-target anim-fade-up anim-dur-normal">
                    <div class="tm-mono">HS</div>
                    <div class="tm-info">
                        <p class="tm-name">Bpk. Hadi Sucipto</p>
                        <p class="tm-role">&nbsp;</p>
                    </div>
                </div>
                <div class="tm-card anim-target anim-fade-up anim-dur-normal">
                    <div class="tm-mono">MA</div>
                    <div class="tm-info">
                        <p class="tm-name">Bpk. Mulyono Adi</p>
                        <p class="tm-role">&nbsp;</p>
                    </div>
                </div>
                <div class="tm-card anim-target anim-fade-up anim-dur-normal">
                    <div class="tm-mono">BW</div>
                    <div class="tm-info">
                        <p class="tm-name">Bpk. Bambang Wulandari</p>
                        <p class="tm-role">&nbsp;</p>
                    </div>
                </div>
                <div class="tm-card anim-target anim-fade-up anim-dur-normal">
                    <div class="tm-mono">SP</div>
                    <div class="tm-info">
                        <p class="tm-name">Bpk. Drs. Surya Pratama</p>
                        <p class="tm-role">&nbsp;</p>
                    </div>
                </div>
                <div class="tm-card anim-target anim-fade-up anim-dur-normal">
                    <div class="tm-mono">IR</div>
                    <div class="tm-info">
                        <p class="tm-name">Bpk. Indra Rahardjo</p>
                        <p class="tm-role">&nbsp;</p>
                    </div>
                </div>
                <div class="tm-card anim-target anim-fade-up anim-dur-normal">
                    <div class="tm-mono">NK</div>
                    <div class="tm-info">
                        <p class="tm-name">Bpk. Nugroho Kusuma</p>
                        <p class="tm-role">&nbsp;</p>
                    </div>
                </div>
                <div class="tm-card anim-target anim-fade-up anim-dur-normal">
                    <div class="tm-mono">KB</div>
                    <div class="tm-info">
                        <p class="tm-name">Keluarga Besar Bpk. Salim (Alm)</p>
                        <p class="tm-role">&nbsp;</p>
                    </div>
                </div>
                <div class="tm-group-label" style="margin-top:.8rem;">Pihak Laki-laki</div>
                <div class="tm-card anim-target anim-fade-up anim-dur-normal">
                    <div class="tm-mono">KB</div>
                    <div class="tm-info">
                        <p class="tm-name">Keluarga Besar Bpk. Witjaksono (Alm)</p>
                        <p class="tm-role">Kakek</p>
                    </div>
                </div>
                <div class="tm-card anim-target anim-fade-up anim-dur-normal">
                    <div class="tm-mono">KB</div>
                    <div class="tm-info">
                        <p class="tm-name">Keluarga Besar Bpk. Sudrajat</p>
                        <p class="tm-role">Kakek</p>
                    </div>
                </div>
                <div class="tm-card anim-target anim-fade-up anim-dur-normal">
                    <div class="tm-mono">UH</div>
                    <div class="tm-info">
                        <p class="tm-name">Ustad Hafidz</p>
                        <p class="tm-role">Tokoh Agama</p>
                    </div>
                </div>
                <div class="tm-card anim-target anim-fade-up anim-dur-normal">
                    <div class="tm-mono">US</div>
                    <div class="tm-info">
                        <p class="tm-name">Ustad Solihin</p>
                        <p class="tm-role">Sesepuh</p>
                    </div>
                </div>
                <div class="tm-card anim-target anim-fade-up anim-dur-normal">
                    <div class="tm-mono">KN</div>
                    <div class="tm-info">
                        <p class="tm-name">Keluarga Nyai Nurlita</p>
                        <p class="tm-role">Nenek</p>
                    </div>
                </div>
            </div>
            <div class="tm-bottom">
                <svg width="120" height="24" viewBox="0 0 120 24" fill="none">
                    <line x1="0" y1="12" x2="44" y2="12" stroke="#444" stroke-width=".7"
                        opacity=".3" />
                    <line x1="76" y1="12" x2="120" y2="12" stroke="#444" stroke-width=".7"
                        opacity=".3" />
                    <ellipse cx="60" cy="12" rx="2.5" ry="2.5" fill="#444"
                        opacity=".4" />
                </svg>
            </div>
        </section>

        <!-- CLOSING -->
        <section class="closing-section">
            <div class="falling-elements">
                <div class="fall-item flower"></div>
                <div class="fall-item heart"></div>
                <div class="fall-item leaf"></div>
                <div class="fall-item flower"></div>
                <div class="fall-item heart"></div>
                <div class="fall-item leaf"></div>
                <div class="fall-item flower"></div>
                <div class="fall-item heart"></div>
                <div class="fall-item leaf"></div>
                <div class="fall-item flower"></div>
            </div>
            <div class="closing-content">
                <h2 class="closing-title anim-target anim-blur-in anim-dur-slower">Terima Kasih</h2>
                <p class="closing-message anim-target anim-fade-up anim-dur-slow anim-delay-3">
                    Merupakan suatu kehormatan bagi kami atas kehadiran Bapak/Ibu/Saudara/i untuk memberikan doa restu.
                </p>
                <div class="closing-names anim-target anim-scale-in anim-dur-slow anim-delay-5">
                    <h3>Nayla Azzahra Putri &amp; Rafi Aditya Pratama</h3>
                </div>
                <div class="closing-date anim-target anim-fade-up anim-dur-normal anim-delay-7">Sabtu, 20 September 2025
                </div>
                <p class="closing-credit anim-target anim-fade-out-right anim-dur-slow anim-delay-9">Made with 💕 by Imora
                    Invitation</p>
            </div>
        </section>

    </div><!-- end #main-content -->

@endsection

@push('scripts')
    <script>
        var photosArray = @json($galleryPhotos);
        if (!Array.isArray(photosArray)) {
            photosArray = Object.values(photosArray || []);
        }
    </script>
    <script src="{{ asset('js/scripts-fixed.js') }}"></script>
@endpush
