<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Core Series - Essential Wedding</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;600&family=Volkhov:ital,wght@0,400;0,700;1,400&family=Sacramento&family=Amiri&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/basic/core-series-style.css') }}">

</head>

<body class="no-scroll">

    <div>
        @yield('content')
    </div>

    <audio id="background-music" loop>
        <source src="https://www.bensound.com/bensound-music/bensound-love.mp3" type="audio/mpeg">
    </audio>

    <script>
        const music = document.getElementById('background-music');
        const musicBtn = document.getElementById('music-btn');
        const musicIcon = document.getElementById('music-icon');
        const cover = document.getElementById('cover');

        function openInvitation() {
            cover.classList.add('hide');
            document.body.classList.remove('no-scroll');
            music.play();
            musicBtn.classList.add('playing');
        }

        function toggleMusic() {
            if (music.paused) {
                music.play();
                musicBtn.classList.add('playing');
            } else {
                music.pause();
                musicBtn.classList.remove('playing');
            }
        }

        // Countdown Logic
        const targetDate = new Date("May 20, 2026 09:00:00").getTime();
        setInterval(() => {
            const now = new Date().getTime();
            const diff = targetDate - now;
            if (diff < 0) return;
            document.getElementById("days").innerText = Math.floor(diff / (1000 * 60 * 60 * 24)).toString()
                .padStart(2, '0');
            document.getElementById("hours").innerText = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 *
                60)).toString().padStart(2, '0');
            document.getElementById("mins").innerText = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60))
                .toString().padStart(2, '0');
            document.getElementById("secs").innerText = Math.floor((diff % (1000 * 60)) / 1000).toString().padStart(
                2, '0');
        }, 1000);

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) entry.target.classList.add('active');
            });
        }, {
            threshold: 0.1
        });
        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
    </script>
</body>

</html>
