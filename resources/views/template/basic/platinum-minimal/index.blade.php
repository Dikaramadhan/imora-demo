@extends('template.basic.platinum-minimal.app-platinum-minimal')
@section('content')
    {{-- Cover Section --}}
    <div id="cover">
        <div class="reveal active">
            <p style="letter-spacing: 6px; font-size: 0.7rem; opacity: 0.6;">PRIVATE INVITATION</p>
            <h1 style="font-size: 2.8rem; margin: 30px 0;">Adam <br>& Sarah</h1>
            <p style="font-size: 0.8rem; opacity: 0.5;">02 . 02 . 2026</p>
            <button class="btn-open" onclick="openInvitation()">Enter Experience</button>
        </div>
    </div>

    {{-- Countdown Section --}}
    <section id="top" style="height: 100vh; display: flex; flex-direction: column; justify-content: center;">
        <div class="reveal reveal-bottom">
            <p style="letter-spacing: 8px; font-size: 0.7rem; margin-bottom: 20px;">THE WEDDING</p>
            <h1>Adam & Sarah</h1>
            <div class="timer-grid">
                <div class="timer-item"><span id="days">00</span><small>Days</small></div>
                <div class="timer-item"><span id="hours">00</span><small>Hrs</small></div>
                <div class="timer-item"><span id="mins">00</span><small>Min</small></div>
                <div class="timer-item"><span id="secs">00</span><small>Sec</small></div>
            </div>
            <div style="width: 1px; height: 60px; background: var(--dark); margin: 40px auto 0;"></div>
        </div>
    </section>

    {{-- Quote Section --}}
    <section>
        <div class="reveal reveal-bottom">
            <p
                style="font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; font-style: italic; color: var(--text-gray);">
                "Two souls, alas, but one single thought; two hearts that beat as one."
            </p>
            <p style="margin-top: 20px; font-size: 0.6rem; letter-spacing: 4px; opacity: 0.6;">BY FRIEDRICH HALM</p>
        </div>
    </section>

    {{-- Couple Section --}}
    <section>
        <div class="reveal reveal-left">
            <div class="photo-minimal">
                <img src="{{ asset('img/template/basic/pria.jpg') }}">
            </div>
            <h3>Adam Al-Ghifari</h3>
            <p style="font-size: 0.7rem; margin-top: 10px; opacity: 0.6; letter-spacing: 1px;">SON OF MR. ANDRE & MRS. MARIA
            </p>
        </div>
        <div class="reveal reveal-bottom" style="margin: 60px 0; font-size: 1.5rem; opacity: 0.3;">/</div>
        <div class="reveal reveal-right">
            <div class="photo-minimal">
                <img src="{{ asset('img/template/basic/wanita.jpg') }}">
            </div>
            <h3>Sarah Jasmine</h3>
            <p style="font-size: 0.7rem; margin-top: 10px; opacity: 0.6; letter-spacing: 1px;">DAUGHTER OF MR. HARRY & MRS.
                DIANA</p>
        </div>
    </section>

    {{-- Maps Section --}}
    <section>
        <h2 class="reveal reveal-bottom" style="margin-bottom: 50px;">The Schedule</h2>
        <div class="reveal reveal-left" style="margin-bottom: 50px;">
            <p style="font-size: 0.65rem; letter-spacing: 3px; margin-bottom: 10px; opacity: 0.5;">01 / CEREMONY</p>
            <h3 style="font-size: 1.8rem; margin-bottom: 15px;">Akad Nikah</h3>
            <p style="font-size: 0.8rem; margin-bottom: 20px;">09:00 AM — THE WHITE PAVILION</p>
            <a href="#"
                style="color: var(--dark); font-size: 0.7rem; letter-spacing: 2px; text-decoration: none; border-bottom: 1px solid var(--dark); padding-bottom: 3px;">GOOGLE
                MAPS</a>
        </div>
        <div class="reveal reveal-right">
            <p style="font-size: 0.65rem; letter-spacing: 3px; margin-bottom: 10px; opacity: 0.5;">02 / CELEBRATION</p>
            <h3 style="font-size: 1.8rem; margin-bottom: 15px;">Reception</h3>
            <p style="font-size: 0.8rem; margin-bottom: 20px;">12:00 PM — THE WHITE PAVILION</p>
            <a href="#"
                style="color: var(--dark); font-size: 0.7rem; letter-spacing: 2px; text-decoration: none; border-bottom: 1px solid var(--dark); padding-bottom: 3px;">GOOGLE
                MAPS</a>
        </div>
    </section>

    {{-- Gallery Section --}}
    <section>
        <h2 class="reveal reveal-bottom" style="margin-bottom: 40px;">Gallery</h2>
        <div class="masonry-grid">
            <div class="masonry-item item-large reveal reveal-bottom"><img
                    src="{{ asset('img/template/basic/bg-hero.jpg') }}"></div>
            <div class="masonry-item reveal reveal-left"><img
                    src="https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=500"></div>
            <div class="masonry-item reveal reveal-right"><img
                    src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=500"></div>
        </div>
    </section>

    {{-- Rsvp Section --}}
    <section>
        <h2 class="reveal reveal-bottom" style="margin-bottom: 40px;">RSVP</h2>
        <form class="rsvp-form reveal reveal-bottom">
            <input type="text" placeholder="FULL NAME">
            <select>
                <option>WILL YOU ATTEND?</option>
                <option>YES, I WILL BE THERE</option>
                <option>SORRY, I CAN'T</option>
            </select>
            <textarea placeholder="WISHES & PRAYERS" rows="4"></textarea>
            <button class="btn-submit">Confirm Attendance</button>
        </form>
    </section>

    {{-- Footer Section --}}
    <footer style="padding: 100px 30px 50px; text-align: center;">
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
                Sincerely</p>
            <h2 style="font-size: 2.5rem; margin-bottom: 10px;">Adam & Sarah</h2>
            <p class="cursive" style="font-size: 1.5rem; opacity: 0.3;">#AdamSarahMinimal</p>
        </div>

        <div
            style="margin-top: 80px; padding-top: 20px; border-top: 1px solid rgba(0,0,0,0.05); font-size: 0.6rem; opacity: 0.3; letter-spacing: 2px; text-transform: uppercase;">
            &copy; 2026 Imora ID - Digital Invitation Platform.<br>All rights reserved.
        </div>
    </footer>

    {{-- Music Section --}}
    <div class="music-control">
        <button class="music-btn" id="music-btn" onclick="toggleMusic()">
            <i id="music-icon" class="fas fa-compact-disc"></i> </button>
    </div>
@endsection
