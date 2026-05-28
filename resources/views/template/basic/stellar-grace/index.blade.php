@extends('template.basic.stellar-grace.app-stellar-grace')
@section('content')
    <div id="cover">
        <p style="letter-spacing: 5px; text-transform: uppercase; font-size: 0.7rem; color: var(--gold);">Walimatul
            'Ursy</p>
        <h1 style="font-size: 2.5rem; margin: 15px 0;">Romeo & Juliet</h1>
        <p style="font-size: 0.9rem; margin-bottom: 5px; opacity: 0.8;">Kepada Yth:</p>
        <h3 style="margin-bottom: 25px; font-weight: 400;">Nama Tamu Undangan</h3>
        <button class="btn-open" onclick="openInvitation()">Buka Undangan</button>
    </div>

    <section
        style="height: 100vh; display: flex; align-items: center; justify-content: center; background: radial-gradient(circle, #1e293b 0%, #0f172a 100%);">
        <div class="reveal reveal-bottom">
            <p style="letter-spacing: 5px; font-size: 0.8rem; margin-bottom: 15px;">THE WEDDING OF</p>
            <h1 style="font-size: 3rem; margin-bottom: 10px;">Romeo & Juliet</h1>
            <p class="cursive" style="font-size: 1.8rem;">01 . 01 . 2026</p>

            <div class="timer-grid">
                <div class="timer-item"><span id="days">00</span><small>Hari</small></div>
                <div class="timer-item"><span id="hours">00</span><small>Jam</small></div>
                <div class="timer-item"><span id="mins">00</span><small>Menit</small></div>
                <div class="timer-item"><span id="secs">00</span><small>Detik</small></div>
            </div>
        </div>
    </section>

    <section style="background: rgba(0,0,0,0.3);">
        <div class="reveal reveal-bottom">
            <div class="arabic">وَمِنْ اٰيٰتِهٖٓ اَنْ خَلَقَ لَكُمْ مِّنْ اَنْفُسِكُمْ اَزْوَاجًا</div>
            <p style="font-size: 0.9rem; font-style: italic; color: var(--silver); margin-top: 15px;">
                "Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu isteri-isteri dari jenismu
                sendiri..."
            </p>
            <p style="font-size: 0.7rem; margin-top: 10px; color: var(--gold); letter-spacing: 2px;">QS. AR-RUM : 21</p>
        </div>
    </section>

    <section id="mempelai">
        <h2 class="reveal reveal-bottom" style="margin-bottom: 40px;">Mempelai</h2>
        <div class="reveal reveal-left">
            <div class="photo-stellar">
                <img src="{{ asset('img/template/basic/pria.jpg') }}">
            </div>
            <h3>Romeo Andrean</h3>
            <p style="font-size: 0.8rem; margin-top: 5px; opacity: 0.7;">Putra dari Bapak Ahmad Fulan & Ibu Siti Aminah
            </p>
        </div>
        <div class="reveal reveal-bottom" style="margin: 30px 0;"><span class="cursive"
                style="font-size: 3rem; opacity: 0.5;">&</span></div>
        <div class="reveal reveal-right">
            <div class="photo-stellar">
                <img src="{{ asset('img/template/basic/wanita.jpg') }}">
            </div>
            <h3>Juliet Putri</h3>
            <p style="font-size: 0.8rem; margin-top: 5px; opacity: 0.7;">Putri dari Bapak Harry Sutrisno & Ibu Diana
                Rose</p>
        </div>
    </section>

    <section style="background: rgba(0,0,0,0.3);">
        <h2 class="reveal reveal-bottom" style="margin-bottom: 40px;">Acara</h2>
        <div class="reveal reveal-left"
            style="border: 1px solid rgba(197,160,89,0.3); padding: 30px; margin-bottom: 20px; background: rgba(255,255,255,0.02);">
            <h3>Akad Nikah</h3>
            <p style="margin: 10px 0; color: var(--gold);">09.00 - 10.00 WIB</p>
            <p style="font-size: 0.85rem;">Gedung Putih Jakarta Selatan</p>
            <a href="#"
                style="display:inline-block; margin-top:15px; color:var(--gold); text-decoration:none; font-size:0.8rem; border: 1px solid var(--gold); padding: 5px 15px;"><i
                    class="fas fa-map-marker-alt"></i> Maps</a>
        </div>
        <div class="reveal reveal-right"
            style="border: 1px solid rgba(197,160,89,0.3); padding: 30px; background: rgba(255,255,255,0.02);">
            <h3>Resepsi</h3>
            <p style="margin: 10px 0; color: var(--gold);">11.00 - Selesai</p>
            <p style="font-size: 0.85rem;">Gedung Putih Jakarta Selatan</p>
            <a href="#"
                style="display:inline-block; margin-top:15px; color:var(--gold); text-decoration:none; font-size:0.8rem; border: 1px solid var(--gold); padding: 5px 15px;"><i
                    class="fas fa-map-marker-alt"></i> Maps</a>
        </div>
    </section>

    <section>
        <h2 class="reveal reveal-bottom" style="margin-bottom: 30px;">Moment Kami</h2>
        <div class="masonry-grid">
            <div class="masonry-item item-large reveal reveal-left"><img
                    src="{{ asset('img/template/basic/bg-hero.jpg') }}"></div>
            <div class="masonry-item reveal reveal-bottom"><img
                    src="https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=500"></div>
            <div class="masonry-item reveal reveal-right"><img
                    src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=500"></div>
        </div>
    </section>

    <section style="background: rgba(0,0,0,0.3);">
        <h2 class="reveal reveal-bottom">RSVP</h2>
        <form class="rsvp-form reveal reveal-bottom">
            <input type="text" placeholder="Nama Lengkap">
            <select>
                <option>Apakah akan hadir?</option>
                <option>Hadir</option>
                <option>Tidak Hadir</option>
            </select>
            <textarea placeholder="Pesan untuk mempelai" rows="4"></textarea>
            <button class="btn-submit">Kirim Konfirmasi</button>
        </form>
    </section>

    <footer style="max-width: none;">
        <div class="reveal reveal-bottom">
            <a href="#" class="back-to-top">
                <i class="fas fa-chevron-up"></i>
                <span>KEMBALI KE ATAS</span>
            </a>
        </div>

        <div class="reveal reveal-bottom">
            <p class="thank-you-text">
                Merupakan suatu kehormatan bagi kami apabila Bapak/Ibu berkenan hadir untuk memberikan doa restu kepada
                kedua mempelai.
            </p>

            <div style="width: 40px; height: 1px; background: var(--gold); margin: 0 auto 30px; opacity: 0.5;"></div>

            <p class="footer-tagline">TERIMA KASIH</p>

            <h2>Romeo & Juliet</h2>

            <p class="cursive" style="font-size: 1.8rem; opacity: 0.4; margin-top: 10px;">
                #RJStellarWedding
            </p>

            <div style="margin-top: 60px; font-size: 0.6rem; opacity: 0.3; letter-spacing: 2px; text-transform: uppercase;">
                Created with Love by Imora ID
            </div>
        </div>
    </footer>

    <div class="music-control">
        <button class="music-btn" id="music-btn" onclick="toggleMusic()">
            <i id="music-icon" class="fas fa-play"></i>
        </button>
    </div>
@endsection
