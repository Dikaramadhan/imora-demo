@extends('template.basic.core-series.app-core-series')
@section('content')
    <div id="cover">
        <p style="letter-spacing: 4px; text-transform: uppercase; font-size: 0.7rem; margin-bottom: 10px;">The Marriage of
        </p>
        <h1 style="font-size: 3rem; color: white; margin-bottom: 15px;">Omar & Hana</h1>
        <p style="font-size: 0.9rem; opacity: 0.9;">Kepada Yth: Nama Tamu</p>
        <button class="btn-open" onclick="openInvitation()">
            <i class="fas fa-envelope-open-text"></i> Buka Undangan
        </button>
    </div>

    <section style="background: var(--bg-light); border-bottom-left-radius: 50px; border-bottom-right-radius: 50px;">
        <div class="reveal reveal-bottom">
            <h1 style="font-size: 3rem; margin-bottom: 10px;">Omar & Hana</h1>
            <p style="letter-spacing: 5px; font-size: 0.9rem; color: var(--secondary-core);">20 . 05 . 2026</p>

            <div class="timer-container">
                <div class="timer-box"><span id="days">00</span><small>Hari</small></div>
                <div class="timer-box"><span id="hours">00</span><small>Jam</small></div>
                <div class="timer-box"><span id="mins">00</span><small>Menit</small></div>
                <div class="timer-box"><span id="secs">00</span><small>Detik</small></div>
            </div>
        </div>
    </section>

    <section>
        <div class="reveal reveal-bottom">
            <div class="arabic">وَخَلَقْنٰكُمْ اَزْوَاجًا</div>
            <p style="font-size: 0.9rem; line-height: 1.8; color: var(--secondary-core);">
                "Dan Kami menciptakan kamu berpasang-pasangan."
            </p>
            <p style="font-weight: 600; margin-top: 10px; color: var(--accent-core);">(QS. AN-NABA: 8)</p>
        </div>
    </section>

    <section id="mempelai" style="background: #F8F9F5;">
        <h2 class="reveal reveal-bottom" style="margin-bottom: 40px;">Mempelai</h2>
        <div class="reveal reveal-left">
            <div class="photo-circle">
                <img src="{{ asset('img/template/basic/pria.jpg') }}">
            </div>
            <h3>Omar Al-Khattab</h3>
            <p style="font-size: 0.85rem; margin-top: 10px;">Putra dari Bapak Fulan & Ibu Fulanah</p>
        </div>
        <div class="reveal reveal-bottom" style="margin: 40px 0;"><span class="cursive">&</span></div>
        <div class="reveal reveal-right">
            <div class="photo-circle">
                <img src="{{ asset('img/template/basic/wanita.jpg') }}">
            </div>
            <h3>Hana Azzahra</h3>
            <p style="font-size: 0.85rem; margin-top: 10px;">Putri dari Bapak Fulan & Ibu Fulanah</p>
        </div>
    </section>

    <section>
        <div class="card-event reveal reveal-left">
            <h3>Akad Nikah</h3>
            <p style="margin: 15px 0; font-weight: 600; color: var(--accent-core);">09.00 - 10.30 WIB</p>
            <p style="font-size: 0.9rem; opacity: 0.8;">Masjid Raya Istiqomah<br>Jakarta Selatan</p>
            <a href="#" class="btn-core"><i class="fas fa-map-marker-alt"></i> Lihat Lokasi</a>
        </div>
        <div class="card-event reveal reveal-right">
            <h3>Resepsi</h3>
            <p style="margin: 15px 0; font-weight: 600; color: var(--accent-core);">11.00 - 13.00 WIB</p>
            <p style="font-size: 0.9rem; opacity: 0.8;">Gedung Puri Core<br>Jakarta Selatan</p>
            <a href="#" class="btn-core"><i class="fas fa-map-marker-alt"></i> Lihat Lokasi</a>
        </div>
    </section>

    <section style="background: #F8F9F5;">
        <h2 class="reveal reveal-bottom" style="margin-bottom: 30px;">Moment Kami</h2>
        <div class="masonry-grid">
            <div class="masonry-item item-large reveal reveal-bottom">
                <img src="{{ asset('img/template/basic/bg-hero.jpg') }}">
            </div>
            <div class="masonry-item reveal reveal-left"><img
                    src="https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=500"></div>
            <div class="masonry-item reveal reveal-right"><img
                    src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=500"></div>
        </div>
    </section>

    <section>
        <h2 class="reveal reveal-bottom" style="margin-bottom: 30px;">Konfirmasi Kehadiran</h2>
        <form class="rsvp-form reveal reveal-bottom">
            <input type="text" placeholder="Nama Lengkap">
            <select>
                <option>Apakah akan hadir?</option>
                <option>Hadir</option>
                <option>Tidak Hadir</option>
            </select>
            <textarea placeholder="Ucapan & Doa" rows="4"></textarea>
            <button class="btn-submit">Kirim Konfirmasi</button>
        </form>
    </section>

    <footer
        style="padding: 100px 25px; text-align: center; background: var(--bg-light); border-top-left-radius: 50px; border-top-right-radius: 50px;">
        <div class="reveal reveal-bottom">
            <a href="#" class="back-to-top">
                <i class="fas fa-chevron-up"></i>
                <span>KE ATAS</span>
            </a>
            <p style="font-size: 0.9rem; margin-bottom: 20px; opacity: 0.7;">Merupakan suatu kehormatan bagi kami apabila
                Anda berkenan hadir.</p>
            <h2>Omar & Hana</h2>
            <p class="cursive" style="font-size: 1.8rem; margin-top: 10px;">#OmarHanaCore</p>
            <div style="margin-top: 40px; font-size: 0.6rem; opacity: 0.3; letter-spacing: 2px;">CREATED BY IMORA ID</div>
        </div>
    </footer>

    <div class="music-control">
        <button class="music-btn" id="music-btn" onclick="toggleMusic()">
            <i id="music-icon" class="fas fa-compact-disc"></i>
        </button>
    </div>
@endsection
