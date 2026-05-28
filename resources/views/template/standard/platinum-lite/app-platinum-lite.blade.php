{{-- layouts/platinumminimal.blade.php --}}
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Platinum Minimal - Ultra Clean Wedding</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,600;1,300&family=Inter:wght@200;400;600&family=Sacramento&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/standard/platinum-lite-style.css') }}">

</head>

<body class="no-scroll">
    <div>
        @yield('content')
    </div>

    <audio id="background-music" loop>
        <source src="{{ asset('music/janjisuci.mp3') }}" type="audio/mpeg">
    </audio>
    <script src="script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const music = document.getElementById('background-music');
            const musicBtn = document.getElementById('music-btn');
            const musicIcon = document.getElementById('music-icon');
            const cover = document.getElementById('cover');

            function openInvitation() {
                cover.classList.add('hide');
                document.body.classList.remove('no-scroll');
                playMusic();
            }

            function playMusic() {
                music.play().catch(() => {}); // ✅ tambah catch agar tidak error di browser yang blokir autoplay
                musicBtn.classList.add('playing');
            }

            function toggleMusic() {
                if (music.paused) {
                    playMusic();
                } else {
                    music.pause();
                    musicBtn.classList.remove('playing');
                }
            }

            // ✅ Expose ke global agar onclick="..." di HTML bisa memanggil
            window.openInvitation = openInvitation;
            window.toggleMusic = toggleMusic;

            // Countdown — perbaiki tanggal ke Juni 2026
            const targetDate = new Date("2026-06-14T09:00:00").getTime();
            setInterval(() => {
                const now = Date.now();
                const diff = targetDate - now;
                if (diff < 0) return;
                document.getElementById("days").innerText = Math.floor(diff / 86400000);
                document.getElementById("hours").innerText = Math.floor((diff % 86400000) / 3600000);
                document.getElementById("mins").innerText = Math.floor((diff % 3600000) / 60000);
                document.getElementById("secs").innerText = Math.floor((diff % 60000) / 1000);
            }, 1000);

            // Reveal on scroll
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) entry.target.classList.add('active');
                });
            }, {
                threshold: 0.1
            });

            document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

        });
    </script>
</body>

</html>
