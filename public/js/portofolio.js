var portoData = [];
var currentIndex = 0;

function initPortofolio(data) {
    portoData = data;
}

function openLightbox(index) {
    currentIndex = index;
    updateLightbox();
    document.getElementById("lightbox").classList.remove("hidden");
    document.body.style.overflow = "hidden";
    lucide.createIcons();
}

function closeLightbox(e) {
    if (e && e.target !== document.getElementById("lightbox")) return;
    document.getElementById("lightbox").classList.add("hidden");
    document.body.style.overflow = "";
}

function updateLightbox() {
    var item = portoData[currentIndex];
    document.getElementById("lightboxImg").src = "/img/portofolio/" + item.foto;
    document.getElementById("lightboxImg").alt = "Undangan " + item.pasangan;
    document.getElementById("lightboxName").textContent = item.pasangan;
    document.getElementById("lightboxInfo").textContent =
        item.template + " - " + item.tanggal;
    var stars = document.getElementById("lightboxStars");
    stars.innerHTML = "";
    for (var i = 0; i < item.rating; i++) {
        var svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
        svg.setAttribute("viewBox", "0 0 24 24");
        svg.style.fill = "#fbbf24";
        svg.style.width = "16px";
        svg.style.height = "16px";
        svg.style.display = "inline-block";
        var path = document.createElementNS(
            "http://www.w3.org/2000/svg",
            "path",
        );
        path.setAttribute(
            "d",
            "M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z",
        );
        svg.appendChild(path);
        stars.appendChild(svg);
    }
}

function prevLightbox() {
    currentIndex = (currentIndex - 1 + portoData.length) % portoData.length;
    updateLightbox();
}

function nextLightbox() {
    currentIndex = (currentIndex + 1) % portoData.length;
    updateLightbox();
}

document.addEventListener("keydown", function (e) {
    var lb = document.getElementById("lightbox");
    if (!lb || lb.classList.contains("hidden")) return;
    if (e.key === "Escape") {
        lb.classList.add("hidden");
        document.body.style.overflow = "";
    }
    if (e.key === "ArrowLeft") prevLightbox();
    if (e.key === "ArrowRight") nextLightbox();
});

document.addEventListener("DOMContentLoaded", function () {
    var lb = document.getElementById("lightbox");
    if (!lb) return;
    var touchStartX = 0;
    lb.addEventListener(
        "touchstart",
        function (e) {
            touchStartX = e.touches[0].clientX;
        },
        { passive: true },
    );
    lb.addEventListener("touchend", function (e) {
        var diff = touchStartX - e.changedTouches[0].clientX;
        if (diff > 50) {
            nextLightbox();
        } else if (diff < -50) {
            prevLightbox();
        }
    });
});
