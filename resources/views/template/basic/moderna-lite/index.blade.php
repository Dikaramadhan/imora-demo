@extends('template.basic.moderna-lite.app-moderna-lite')
@section('content')
    <div id="cover">
        <div class="reveal active">
            <h3 style="font-size: 0.6rem; letter-spacing: 6px; color: var(--clay); margin-bottom: 15px;">M O D E R N A</h3>
            <h1 style="font-size: 2.8rem; line-height: 1.1; margin-bottom: 20px; color: var(--sage);">Arkan<br>& Nayla</h1>
            <p style="font-size: 0.7rem; letter-spacing: 2px; opacity: 0.6;">KEPADA YTH: NAMA TAMU</p>
            <button class="btn-open" onclick="openInvitation()">Enter Site</button>
        </div>
    </div>

    <section>
        <div class="reveal reveal-bottom">
            <div class="hero-img">
                <img src="{{ asset('img/template/basic/bg-hero.jpg') }}">
            </div>
            <h1 style="font-size: 2.5rem; letter-spacing: -1px;">Arkan & Nayla</h1>
            <p style="letter-spacing: 5px; font-size: 0.8rem; margin: 10px 0; opacity: 0.6;">08 . 08 . 2026</p>

            <div class="timer-container">
                <div class="timer-box"> <span id="days">00</span> <small>DYS</small> </div>
                <div class="timer-box"> <span id="hours">00</span> <small>HRS</small> </div>
                <div class="timer-box"> <span id="mins">00</span> <small>MIN</small> </div>
                <div class="timer-box"> <span id="secs">00</span> <small>SEC</small> </div>
            </div>
        </div>
    </section>

    <section>
        <div class="reveal reveal-bottom"
            style="background: var(--mint); padding: 40px 20px; border-radius: 40px 0 40px 0;">
            <div class="arabic">وَخَلَقْنٰكُمْ اَزْوَاجًا</div>
            <p style="font-size: 0.8rem; line-height: 1.8; font-weight: 500;">"And We created you in pairs."</p>
            <p style="font-size: 0.6rem; margin-top: 10px; letter-spacing: 3px; font-weight: 700;">QS. AN-NABA : 8</p>
        </div>
    </section>

    <section>
        <div class="reveal reveal-left" style="margin-bottom: 60px;">
            <div
                style="width: 100%; height: 450px; overflow: hidden; border-radius: 0 80px 0 80px; margin-bottom: 20px; border: 1px solid var(--mint);">
                <img src="{{ asset('img/template/basic/pria.jpg') }}" style="width:100%; height:70vh%; object-fit:cover;">
            </div>
            <h3>Arkan Pratama</h3>
            <p style="font-size: 0.75rem; margin-top: 10px; opacity: 0.6;">PUTRA DARI BAPAK FULAN & IBU FULANAH</p>
        </div>

        <div class="reveal reveal-bottom" style="margin-bottom: 60px;">
            <span class="cursive" style="font-size: 4rem; opacity: 0.3;">&</span>
        </div>

        <div class="reveal reveal-right">
            <div
                style="width: 100%; height: 450px; overflow: hidden; border-radius: 80px 0 80px 0; margin-bottom: 20px; border: 1px solid var(--mint);">
                <img src="{{ asset('img/template/basic/wanita.jpg') }}" style="width:100%; height:70vh; object-fit:cover;">
            </div>
            <h3>Nayla Azzahra</h3>
            <p style="font-size: 0.75rem; margin-top: 10px; opacity: 0.6;">PUTRI DARI BAPAK FULAN & IBU FULANAH</p>
        </div>
    </section>

    <section style="background: var(--white);">
        <h2 class="reveal reveal-bottom" style="margin-bottom: 40px;">Rangkaian Acara</h2>
        <div class="card-moderna reveal reveal-left">
            <p style="font-size: 0.6rem; letter-spacing: 3px; color: var(--clay); font-weight: 700; margin-bottom: 10px;">
                01. THE VOWS</p>
            <h3 style="color: var(--dark);">Akad Nikah</h3>
            <p style="margin: 15px 0; font-size: 0.9rem;">SABTU, 08 AGUSTUS 2026 <br> 09:00 — 10:30 WIB</p>
            <p style="font-size: 0.75rem; opacity: 0.6;">MASJID ISTIQLAL, JAKARTA</p>
            <a href="#" class="btn-open"
                style="display: inline-block; padding: 10px 20px; font-size: 0.6rem; margin-top: 20px;">Open Maps</a>
        </div>

        <div class="card-moderna reveal reveal-right" style="margin-top: 40px;">
            <p style="font-size: 0.6rem; letter-spacing: 3px; color: var(--clay); font-weight: 700; margin-bottom: 10px;">
                02. THE PARTY</p>
            <h3 style="color: var(--dark);">Resepsi</h3>
            <p style="margin: 15px 0; font-size: 0.9rem;">SABTU, 08 AGUSTUS 2026 <br> 11:00 — SELESAI</p>
            <p style="font-size: 0.75rem; opacity: 0.6;">BALLROOM HOTEL MODERNA</p>
            <a href="#" class="btn-open"
                style="display: inline-block; padding: 10px 20px; font-size: 0.6rem; margin-top: 20px;">Open Maps</a>
        </div>
    </section>

    <section>
        <h2 class="reveal reveal-bottom" style="margin-bottom: 30px;">Moment Kami</h2>
        <div class="masonry-grid">
            <div class="masonry-item item-large reveal reveal-bottom">
                <img src="{{ asset('img/basic-img/essensial/bg-hero.jpg') }}">
            </div>
            <div class="masonry-item reveal reveal-left">
                <img src="https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=500">
            </div>
            <div class="masonry-item reveal reveal-right">
                <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=500">
            </div>
        </div>
    </section>

    <section style="background: #FBFBF9;">
        <h2 class="reveal reveal-bottom">Konfirmasi Kehadiran</h2>
        <form class="rsvp-form reveal reveal-bottom">
            <input type="text" placeholder="Nama Lengkap" required>
            <select required>
                <option value="">Apakah akan hadir?</option>
                <option value="Hadir">Hadir</option>
                <option value="Tidak Hadir">Tidak Hadir</option>
            </select>
            <textarea placeholder="Ucapan & Doa" rows="4"></textarea>
            <button type="submit" class="btn-submit">Kirim Konfirmasi</button>
        </form>
    </section>

    <footer style="padding: 100px 25px 50px; text-align: center; border-top: 1px solid var(--mint);">
        <div class="reveal reveal-bottom">
            <a href="#" class="back-to-top">
                <i class="fas fa-chevron-up"></i>
                <span style="display: block; margin-top: 5px;">SCROLL TO TOP</span>
            </a>

            <div style="margin-top: 60px; margin-bottom: 80px;">
                <p
                    style="font-size: 0.7rem; letter-spacing: 5px; opacity: 0.5; margin-bottom: 10px; text-transform: uppercase;">
                    Sincerely</p>
                <h2 style="font-size: 2.8rem; color: var(--sage); line-height: 1.2;">Arkan & Nayla</h2>
                <p class="cursive" style="font-size: 1.8rem; opacity: 0.4; margin-top: 10px;">#ArkanNaylaWedding</p>
            </div>

            <div
                style="font-size: 0.65rem; opacity: 0.3; letter-spacing: 1px; border-top: 1px solid rgba(0,0,0,0.05); padding-top: 30px;">
                &copy; 2026 Imora ID - Digital Invitation Platform.<br>All rights reserved.
            </div>
        </div>
    </footer>

    <div class="music-control">
        <button class="music-btn" id="music-btn" onclick="toggleMusic()">
            <i id="music-icon" class="fas fa-compact-disc"></i>
        </button>
    </div>
@endsection
