/* ============================================
   GLOBAL VARIABLE (AMBIL SLUG DARI URL)
============================================ */
var pathParts = window.location.pathname.split("/");
var templateSlug = pathParts[pathParts.length - 1] || "unknown";

/* ============================================
   OPEN INVITATION
============================================ */
function openInvitation() {
    var cover = document.getElementById("cover");
    var main = document.getElementById("main-content");
    var body = document.body;

    if (cover) cover.classList.add("hidden");

    if (main) {
        main.style.display = "block";
        void main.offsetWidth;
        main.classList.add("active");
    }

    body.classList.remove("no-scroll");
    window.scrollTo({ top: 0, behavior: "auto" });

    startMusic();
    startCountdown();

    setTimeout(function () {
        loadWishes(1);
    }, 300);
}

/* ============================================
   COUNTDOWN TIMER
============================================ */
var countdownInterval = null;

function startCountdown() {
    var targetDate = new Date("2026-06-28T08:00:00+07:00").getTime();

    function pad(n) {
        return n < 10 ? "0" + n : String(n);
    }

    function setCD(id, val) {
        var el = document.getElementById(id);
        if (el) el.textContent = val;
    }

    function updateCountdown() {
        var now = new Date().getTime();
        var diff = targetDate - now;

        if (diff <= 0) {
            setCD("days", "00");
            setCD("hours", "00");
            setCD("minutes", "00");
            setCD("seconds", "00");
            if (countdownInterval) {
                clearInterval(countdownInterval);
                countdownInterval = null;
            }
            return;
        }

        setCD("days", pad(Math.floor(diff / (1000 * 60 * 60 * 24))));
        setCD(
            "hours",
            pad(Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))),
        );
        setCD(
            "minutes",
            pad(Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60))),
        );
        setCD("seconds", pad(Math.floor((diff % (1000 * 60)) / 1000)));
    }

    updateCountdown();
    if (countdownInterval) clearInterval(countdownInterval);
    countdownInterval = setInterval(updateCountdown, 1000);
}

/* ============================================
   TOAST NOTIFICATION
============================================ */
function showToast(message, type) {
    var existing = document.querySelector(".toast-notification");
    if (existing) existing.remove();

    if (!document.getElementById("toast-css")) {
        var s = document.createElement("style");
        s.id = "toast-css";
        s.textContent = [
            ".toast-notification{position:fixed;top:20px;left:50%;transform:translateX(-50%) translateY(-30px);",
            "background:#1a1a1a;color:#fff;padding:12px 20px;border-radius:12px;font-size:0.85rem;",
            "font-family:inherit;display:flex;align-items:center;gap:8px;",
            "box-shadow:0 10px 40px rgba(0,0,0,0.25);z-index:99999;opacity:0;",
            "transition:all 0.4s cubic-bezier(0.34,1.56,0.64,1);max-width:90vw;text-align:center;pointer-events:none;}",
            ".toast-visible{opacity:1;transform:translateX(-50%) translateY(0);pointer-events:auto;}",
            ".toast-exit{opacity:0;transform:translateX(-50%) translateY(-20px);}",
            ".toast-success{border-left:4px solid #28a745;}",
            ".toast-error{border-left:4px solid #dc3545;}",
            ".toast-warning{border-left:4px solid #ffc107;}",
            ".toast-info{border-left:4px solid #17a2b8;}",
        ].join("");
        document.head.appendChild(s);
    }

    var icons = { success: "✓", error: "✗", warning: "⚠", info: "ℹ" };
    var toast = document.createElement("div");
    toast.className = "toast-notification toast-" + (type || "info");
    toast.innerHTML =
        "<span>" +
        (icons[type] || "ℹ") +
        "</span> <span>" +
        message +
        "</span>";
    document.body.appendChild(toast);

    requestAnimationFrame(function () {
        toast.classList.add("toast-visible");
    });
    setTimeout(function () {
        toast.classList.remove("toast-visible");
        toast.classList.add("toast-exit");
        setTimeout(function () {
            toast.remove();
        }, 400);
    }, 3500);
}

/* ============================================
   RSVP FORM SUBMISSION
============================================ */
(function () {
    var form = document.getElementById("rsvpForm");
    if (!form) return;

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        var btn = document.getElementById("rsvpSubmitBtn");
        var nama = document.getElementById("rsvpNama").value.trim();
        var status = document.getElementById("rsvpStatus").value;
        var message = document.getElementById("rsvpMessage").value.trim();

        if (!nama) {
            showToast("Mohon isi nama Anda", "warning");
            return;
        }
        if (!status) {
            showToast("Mohon pilih konfirmasi kehadiran", "warning");
            return;
        }

        if (btn) {
            btn.disabled = true;
            btn.innerHTML = '<i class="bi bi-hourglass-split"></i> Mengirim...';
        }

        var formData = new FormData();
        var csrfMeta = document.querySelector('meta[name="csrf-token"]');
        formData.append("_token", csrfMeta ? csrfMeta.content : "");
        formData.append("template_slug", templateSlug); // ✅ FIX: Kirim slug template
        formData.append("name", nama);
        formData.append("status", status);
        formData.append("message", message);

        fetch("/api/rsvp", {
            method: "POST",
            body: formData,
            credentials: "same-origin",
        })
            .then(function (res) {
                if (!res.ok) throw new Error("HTTP " + res.status);
                return res.json();
            })
            .then(function (data) {
                var msg =
                    data.message ||
                    data.msg ||
                    (data.success ? "Terima kasih!" : "Berhasil dikirim.");
                showToast(msg, "success");
                form.reset();
                setTimeout(function () {
                    loadWishes(1); // Reload list ucapan
                }, 1000);
            })
            .catch(function (err) {
                console.warn("RSVP Error:", err);
                showToast("Gagal mengirim, coba lagi ya", "error");
            })
            .finally(function () {
                if (btn) {
                    btn.disabled = false;
                    btn.innerHTML = '<i class="bi bi-send"></i> Kirim';
                }
            });
    });
})();

/* ============================================
   WISHES — LOAD, RENDER & PAGINATION
============================================ */
var currentPage = 1;
var totalPages = 1;
var wishesPerPage = 5;

function loadWishes(page) {
    var container = document.getElementById("wishesList");
    var pagination = document.getElementById("wsPagination");
    if (!container) return;

    currentPage = page || 1;
    container.innerHTML =
        '<div class="wishes-loading" style="color:rgba(100,100,100,0.6);text-align:center;padding:2rem;">Memuat ucapan...</div>';

    // ✅ FIX: Gunakan /api/rsvp dan kirim slug-nya
    var apiUrl =
        "/api/rsvp?slug=" +
        templateSlug +
        "&page=" +
        currentPage +
        "&per_page=" +
        wishesPerPage;

    fetch(apiUrl, {
        credentials: "same-origin",
        headers: {
            Accept: "application/json",
            "X-Requested-With": "XMLHttpRequest",
        },
    })
        .then(function (res) {
            if (!res.ok) throw new Error("HTTP " + res.status);
            return res.json();
        })
        .then(function (data) {
            var wishes = [],
                total = 0,
                lastPage = 1;

            if (Array.isArray(data)) {
                wishes = data;
                total = data.length;
            } else if (data.data && Array.isArray(data.data)) {
                wishes = data.data;
                total = data.total || data.data.length;
                lastPage =
                    data.last_page || Math.ceil(total / wishesPerPage) || 1;
            } else if (data.wishes && Array.isArray(data.wishes)) {
                wishes = data.wishes;
                total = data.total || data.wishes.length;
                lastPage =
                    data.last_page || Math.ceil(total / wishesPerPage) || 1;
            } else if (typeof data === "object") {
                var keys = Object.keys(data);
                for (var i = 0; i < keys.length; i++) {
                    if (Array.isArray(data[keys[i]])) {
                        wishes = data[keys[i]];
                        total = data.total || wishes.length;
                        lastPage =
                            data.last_page ||
                            Math.ceil(total / wishesPerPage) ||
                            1;
                        break;
                    }
                }
            }

            totalPages = lastPage;

            if (!wishes.length) {
                container.innerHTML = [
                    '<div class="wishes-empty" style="padding:2.5rem 1rem;text-align:center;">',
                    '<div style="font-size:2.5rem;margin-bottom:0.5rem;">💌</div>',
                    '<p style="margin-bottom:0.3rem;font-size:0.95rem;">Belum ada ucapan.</p>',
                    '<span style="font-size:0.82rem;opacity:0.55;">Jadilah yang pertama memberikan doa restu!</span>',
                    "</div>",
                ].join("");
                if (pagination) pagination.style.display = "none";
                return;
            }

            renderWishes(wishes, container);
            renderPagination(pagination, currentPage, totalPages);
        })
        .catch(function (err) {
            console.error("Wishes Load Error:", err);
            container.innerHTML = [
                '<div style="text-align:center;padding:2rem 1rem;">',
                '<div style="font-size:2rem;margin-bottom:0.5rem;opacity:0.3;">📭</div>',
                '<p style="color:#888;margin-bottom:0.5rem;font-size:0.9rem;">Gagal memuat ucapan</p>',
                '<button onclick="loadWishes(' + currentPage + ')" ',
                'style="padding:8px 20px;background:#f0f0f0;border:1px solid #ddd;border-radius:8px;',
                'cursor:pointer;font-size:0.85rem;color:#555;font-family:inherit;">Coba Lagi</button>',
                "</div>",
            ].join("");
            if (pagination) pagination.style.display = "none";
        });
}

function renderWishes(wishes, container) {
    if (!container) return;
    var html = "";

    wishes.forEach(function (w, i) {
        var nama = w.nama || w.name || "Anonim";
        var ucapan = w.message || w.ucapan || w.pesan || w.doa || "";
        var status = w.status || w.kehadiran || "Hadir";
        var timestamp = w.created_at || w.updated_at || null;
        var timeAgo = formatTimeAgo(timestamp);

        var statusLower = status.toLowerCase();
        var statusClass = "tidak-hadir";
        if (
            statusLower.includes("hadir") &&
            !statusLower.includes("tidak") &&
            !statusLower.includes("ragu")
        ) {
            statusClass = "hadir";
        } else if (
            statusLower.includes("ragu") ||
            statusLower.includes("masih")
        ) {
            statusClass = "masih-ragu";
        }

        var initial = nama.charAt(0).toUpperCase();
        var safeName = escapeHtml(nama);
        var safeUcapan = ucapan ? escapeHtml(ucapan) : "";
        var safeStatus = escapeHtml(status);

        html +=
            '<div class="wish-card anim-target anim-fade-up anim-dur-normal" style="transition-delay:' +
            i * 0.06 +
            's">';
        html += '  <div class="wish-header">';
        html += '    <div class="wish-avatar">' + initial + "</div>";
        html +=
            '    <div class="wish-info"><h4>' +
            safeName +
            '</h4><div class="wish-time">' +
            timeAgo +
            "</div></div>";
        html +=
            '    <span class="wish-status ' +
            statusClass +
            '">' +
            safeStatus +
            "</span>";
        html += "  </div>";
        if (safeUcapan)
            html += '  <p class="wish-message">' + safeUcapan + "</p>";
        html += "</div>";
    });

    container.innerHTML = html;
    if (window.reObserveAnimations) setTimeout(window.reObserveAnimations, 50);
}

function addWishCardDirect(nama, status, ucapan) {
    var container = document.getElementById("wishesList");
    if (!container) return;

    var emptyMsg = container.querySelector(".wishes-empty");
    if (emptyMsg) emptyMsg.remove();

    var statusLower = status.toLowerCase();
    var statusClass = "tidak-hadir";
    if (
        statusLower.includes("hadir") &&
        !statusLower.includes("tidak") &&
        !statusLower.includes("ragu")
    ) {
        statusClass = "hadir";
    } else if (statusLower.includes("ragu")) {
        statusClass = "masih-ragu";
    }

    var card = document.createElement("div");
    card.className = "wish-card anim-target anim-fade-up anim-dur-normal";
    card.innerHTML = [
        '<div class="wish-header">',
        '  <div class="wish-avatar">' + nama.charAt(0).toUpperCase() + "</div>",
        '  <div class="wish-info"><h4>' +
            escapeHtml(nama) +
            '</h4><div class="wish-time">Baru saja</div></div>',
        '  <span class="wish-status ' +
            statusClass +
            '">' +
            escapeHtml(status) +
            "</span>",
        "</div>",
        ucapan ? '<p class="wish-message">' + escapeHtml(ucapan) + "</p>" : "",
    ].join("");

    container.insertBefore(card, container.firstChild);
    if (window.reObserveAnimations) setTimeout(window.reObserveAnimations, 50);
}

function changePage(direction) {
    var newPage = currentPage + direction;
    if (newPage < 1) newPage = 1;
    if (newPage > totalPages) newPage = totalPages;
    if (newPage !== currentPage) {
        loadWishes(newPage);
        var wishesSection = document.querySelector(".wishes-section");
        if (wishesSection)
            wishesSection.scrollIntoView({
                behavior: "smooth",
                block: "start",
            });
    }
}

function goToPage(page) {
    if (page >= 1 && page <= totalPages && page !== currentPage)
        loadWishes(page);
}

function renderPagination(container, current, total) {
    if (!container) return;
    if (total <= 1) {
        container.style.display = "none";
        return;
    }

    container.style.display = "flex";
    var prevBtn = document.getElementById("wsPrev");
    var nextBtn = document.getElementById("wsNext");
    if (prevBtn) prevBtn.disabled = current <= 1;
    if (nextBtn) nextBtn.disabled = current >= total;

    var numbersContainer = document.getElementById("wsPageNumbers");
    if (!numbersContainer) return;

    var html = "";
    var startPage = Math.max(1, current - 2);
    var endPage = Math.min(total, current + 2);

    if (startPage > 1) {
        html += '<button class="ws-page-num" onclick="goToPage(1)">1</button>';
        if (startPage > 2) html += '<span class="ws-page-ellipsis">...</span>';
    }
    for (var i = startPage; i <= endPage; i++) {
        html +=
            '<button class="ws-page-num' +
            (i === current ? " active" : "") +
            '" onclick="goToPage(' +
            i +
            ')">' +
            i +
            "</button>";
    }
    if (endPage < total) {
        if (endPage < total - 1)
            html += '<span class="ws-page-ellipsis">...</span>';
        html +=
            '<button class="ws-page-num" onclick="goToPage(' +
            total +
            ')">' +
            total +
            "</button>";
    }

    numbersContainer.innerHTML = html;
}

function formatTimeAgo(dateStr) {
    if (!dateStr) return "";
    var date = new Date(dateStr);
    if (isNaN(date.getTime())) return "";
    var diff = Math.floor((new Date() - date) / 1000);
    if (diff < 0) return "Baru saja";
    if (diff < 60) return "Baru saja";
    if (diff < 3600) return Math.floor(diff / 60) + " menit lalu";
    if (diff < 86400) return Math.floor(diff / 3600) + " jam lalu";
    if (diff < 604800) return Math.floor(diff / 86400) + " hari lalu";
    return date.toLocaleDateString("id-ID", {
        day: "numeric",
        month: "short",
        year: "numeric",
    });
}

function escapeHtml(text) {
    if (!text) return "";
    var div = document.createElement("div");
    div.appendChild(document.createTextNode(text));
    return div.innerHTML;
}

/* ============================================
   GALLERY LIGHTBOX
============================================ */
var currentPhotoIndex = 0;
var galleryModal = null;
var mainPreviewImg = null;
var photoCounter = null;
var thumbsTrack = null;
var thumbsInitialized = false;

(function initGalleryRefs() {
    galleryModal = document.getElementById("galleryModal");
    mainPreviewImg = document.getElementById("mainPreviewImg");
    photoCounter = document.getElementById("photoCounter");
    thumbsTrack = document.getElementById("thumbnailsTrack");
})();

function initThumbnails() {
    if (!thumbsTrack || thumbsInitialized) return;
    thumbsInitialized = true;
    photosArray.forEach(function (url, i) {
        var img = document.createElement("img");
        img.src = url;
        img.classList.add("thumb-item");
        img.onclick = function () {
            showPhoto(i);
        };
        thumbsTrack.appendChild(img);
    });
}

function showPhoto(index) {
    if (!photosArray.length) return;
    if (index < 0) index = photosArray.length - 1;
    if (index >= photosArray.length) index = 0;
    currentPhotoIndex = index;

    if (mainPreviewImg) mainPreviewImg.src = photosArray[currentPhotoIndex];
    if (photoCounter)
        photoCounter.innerText =
            currentPhotoIndex + 1 + " / " + photosArray.length;

    if (thumbsTrack) {
        var allThumbs = thumbsTrack.getElementsByClassName("thumb-item");
        for (var i = 0; i < allThumbs.length; i++)
            allThumbs[i].classList.remove("active");
        if (allThumbs[currentPhotoIndex]) {
            allThumbs[currentPhotoIndex].classList.add("active");
            allThumbs[currentPhotoIndex].scrollIntoView({
                behavior: "smooth",
                block: "nearest",
                inline: "center",
            });
        }
    }
}

function openPreview(photoUrl) {
    if (!galleryModal) return;
    var clickedIndex = photosArray.indexOf(photoUrl);
    if (clickedIndex === -1) clickedIndex = 0;
    galleryModal.style.display = "flex";
    document.body.style.overflow = "hidden";
    document.body.classList.add("modal-open");
    if (!thumbsInitialized) initThumbnails();
    showPhoto(clickedIndex);
}

function closeGallery() {
    if (!galleryModal) return;
    galleryModal.style.display = "none";
    document.body.style.overflow = "";
    document.body.classList.remove("modal-open");
}

function changePhoto(direction) {
    showPhoto(currentPhotoIndex + direction);
}

document.addEventListener("keydown", function (e) {
    if (galleryModal && galleryModal.style.display === "flex") {
        if (e.key === "ArrowLeft") changePhoto(-1);
        if (e.key === "ArrowRight") changePhoto(1);
        if (e.key === "Escape") closeGallery();
    }
});

(function () {
    if (!galleryModal) return;
    var startX = 0,
        threshold = 50;
    galleryModal.addEventListener(
        "touchstart",
        function (e) {
            startX = e.changedTouches[0].screenX;
        },
        { passive: true },
    );
    galleryModal.addEventListener(
        "touchend",
        function (e) {
            var diffX = e.changedTouches[0].screenX - startX;
            if (Math.abs(diffX) > threshold) {
                if (diffX > 0) changePhoto(-1);
                else changePhoto(1);
            }
        },
        { passive: true },
    );
})();

/* ============================================
   GALLERY AUTO SLIDER DOTS
============================================ */
(function initSliderDots() {
    var slider = document.getElementById("autoSlider");
    if (!slider) return;
    var groups = slider.querySelectorAll(".slider-group");
    if (!groups.length) return;

    var dotsContainer = slider.parentElement.querySelector(".slider-dots");
    if (!dotsContainer) {
        dotsContainer = document.createElement("div");
        dotsContainer.className = "slider-dots";
        slider.parentElement.appendChild(dotsContainer);
    }

    var dotsHtml = "";
    for (var i = 0; i < groups.length; i++) {
        dotsHtml +=
            '<span class="dot' +
            (i === 0 ? " active" : "") +
            '" data-slide="' +
            i +
            '"></span>';
    }
    dotsContainer.innerHTML = dotsHtml;

    dotsContainer.addEventListener("click", function (e) {
        var dot = e.target.closest(".dot");
        if (!dot) return;
        var slideIndex = parseInt(dot.dataset.slide, 10);
        if (!isNaN(slideIndex) && groups[slideIndex]) {
            groups[slideIndex].scrollIntoView({
                behavior: "smooth",
                block: "nearest",
                inline: "center",
            });
        }
    });

    var scrollObserver = new IntersectionObserver(
        function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    var idx = Array.prototype.indexOf.call(
                        groups,
                        entry.target,
                    );
                    if (idx !== -1) {
                        var dots = dotsContainer.querySelectorAll(".dot");
                        dots.forEach(function (d) {
                            d.classList.remove("active");
                        });
                        if (dots[idx]) dots[idx].classList.add("active");
                    }
                }
            });
        },
        { root: slider, threshold: 0.6 },
    );

    groups.forEach(function (group) {
        scrollObserver.observe(group);
    });
})();

/* ============================================
   PARTICLE SPAWNER (Cover)
============================================ */
(function spawnParticles() {
    var field = document.getElementById("particleField");
    if (!field) return;
    for (var i = 0; i < 14; i++) {
        var p = document.createElement("div");
        var size = 2 + Math.random() * 3.5;
        var duration = 13 + Math.random() * 16;
        var delay = Math.random() * 14;
        var left = Math.random() * 100;
        var opacity = 0.28 + Math.random() * 0.55;
        p.classList.add("particle");
        p.style.cssText =
            "width:" +
            size +
            "px;height:" +
            size +
            "px;left:" +
            left +
            "%;bottom:-10px;animation-duration:" +
            duration +
            "s;animation-delay:-" +
            delay +
            "s;opacity:" +
            opacity +
            ";";
        field.appendChild(p);
    }
})();

/* ============================================
   GUEST NAME FROM URL
============================================ */
(function fillGuestName() {
    var params = new URLSearchParams(window.location.search);
    var name = params.get("to") || params.get("nama") || params.get("guest");
    var el = document.getElementById("guestNameDisplay");
    if (name && el)
        el.textContent = decodeURIComponent(name.replace(/\+/g, " "));
})();

/* ============================================
   BOTTOM NAVIGATION
============================================ */
(function initBottomNav() {
    var navLinks = document.querySelectorAll(".bottom-nav .nav-item");
    if (!navLinks.length) return;

    navLinks.forEach(function (link) {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            var href = this.getAttribute("href");
            var target =
                href === "#top"
                    ? document.getElementById("main-content")
                    : document.querySelector(href);
            if (!target) return;
            var navH =
                (document.getElementById("main-nav") || {}).offsetHeight || 80;
            window.scrollTo({
                top:
                    target.getBoundingClientRect().top +
                    window.scrollY -
                    navH -
                    16,
                behavior: "smooth",
            });
            navLinks.forEach(function (n) {
                n.classList.remove("active");
            });
            this.classList.add("active");
        });
    });

    var navSections = [
        { id: "main-content", href: "#top" },
        { id: "mempelai", href: "#mempelai" },
        { id: "event", href: "#event" },
        { id: "rsvp", href: "#rsvp" },
    ];
    var scrollTicking = false;

    window.addEventListener(
        "scroll",
        function () {
            if (scrollTicking) return;
            scrollTicking = true;
            requestAnimationFrame(function () {
                var scrollY = window.scrollY;
                var navH =
                    (document.getElementById("main-nav") || {}).offsetHeight ||
                    80;
                var activeHref = "#top";

                navSections.forEach(function (section) {
                    var el = document.getElementById(section.id);
                    if (!el) return;
                    if (
                        el.getBoundingClientRect().top + scrollY - navH - 32 <=
                        scrollY
                    )
                        activeHref = section.href;
                });

                navLinks.forEach(function (link) {
                    link.classList.toggle(
                        "active",
                        link.getAttribute("href") === activeHref,
                    );
                });
                scrollTicking = false;
            });
        },
        { passive: true },
    );
})();

/* ============================================
   SCROLL ANIMATION ENGINE
============================================ */
(function () {
    "use strict";

    var isMobile = window.matchMedia("(max-width: 768px)").matches;
    var MARGIN = "0px 0px -60px 0px";

    var observer = new IntersectionObserver(
        function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add("is-visible");
                    entry.target
                        .querySelectorAll(".anim-target")
                        .forEach(function (c) {
                            c.classList.add("is-visible");
                        });
                    observer.unobserve(entry.target);
                }
            });
        },
        { rootMargin: MARGIN, threshold: isMobile ? 0.08 : 0.15 },
    );

    var exitObserver = new IntersectionObserver(
        function (entries) {
            entries.forEach(function (entry) {
                if (
                    !entry.isIntersecting &&
                    entry.target.classList.contains("is-visible")
                ) {
                    entry.target.classList.add("is-exit");
                } else if (entry.isIntersecting) {
                    entry.target.classList.remove("is-exit");
                }
            });
        },
        { rootMargin: "0px", threshold: 0 },
    );

    var textObserver = new IntersectionObserver(
        function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target
                        .querySelectorAll(".text-reveal-char")
                        .forEach(function (char, i) {
                            setTimeout(function () {
                                char.classList.add("is-visible");
                            }, i * 35);
                        });
                    textObserver.unobserve(entry.target);
                }
            });
        },
        { rootMargin: MARGIN, threshold: 0.3 },
    );

    var counterObserver = new IntersectionObserver(
        function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting && !entry.target.dataset.counted) {
                    entry.target.dataset.counted = "true";
                    var target =
                        parseInt(entry.target.dataset.counterTarget, 10) || 0;
                    var duration =
                        parseInt(entry.target.dataset.counterDuration, 10) ||
                        2000;
                    var start = performance.now();
                    function step(now) {
                        var p = Math.min((now - start) / duration, 1);
                        entry.target.textContent = Math.round(
                            (1 - Math.pow(1 - p, 3)) * target,
                        );
                        if (p < 1) requestAnimationFrame(step);
                    }
                    requestAnimationFrame(step);
                    counterObserver.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.5 },
    );

    function initTextReveal() {
        document.querySelectorAll(".text-reveal").forEach(function (el) {
            var text = el.textContent;
            el.textContent = "";
            text.split("").forEach(function (char) {
                var span = document.createElement("span");
                span.classList.add("text-reveal-char");
                span.innerHTML = char === " " ? "&nbsp;" : char;
                el.appendChild(span);
            });
            textObserver.observe(el);
        });
    }

    var parallaxEls = [],
        parallaxTicking = false;

    function initParallax() {
        document.querySelectorAll(".anim-parallax").forEach(function (el) {
            parallaxEls.push({
                el: el,
                speed: parseFloat(el.dataset.parallaxSpeed) || 0.15,
            });
        });
        if (parallaxEls.length) {
            window.addEventListener(
                "scroll",
                function () {
                    if (!parallaxTicking) {
                        requestAnimationFrame(function () {
                            parallaxEls.forEach(function (item) {
                                var rect = item.el.getBoundingClientRect();
                                var offset =
                                    (rect.top +
                                        rect.height / 2 -
                                        window.innerHeight / 2) *
                                    item.speed;
                                item.el.style.transform =
                                    "translateY(" + offset + "px)";
                            });
                            parallaxTicking = false;
                        });
                        parallaxTicking = true;
                    }
                },
                { passive: true },
            );
        }
    }

    function init() {
        document.querySelectorAll(".anim-target").forEach(function (el) {
            observer.observe(el);
        });
        document
            .querySelectorAll(".anim-fade-out-right, .anim-fade-out-left")
            .forEach(function (el) {
                exitObserver.observe(el);
            });
        document
            .querySelectorAll("[data-counter-target]")
            .forEach(function (el) {
                counterObserver.observe(el);
            });
        initTextReveal();
        initParallax();
    }

    if (document.readyState === "loading")
        document.addEventListener("DOMContentLoaded", init);
    else init();

    window.reObserveAnimations = function () {
        document
            .querySelectorAll(".anim-target:not(.is-visible)")
            .forEach(function (el) {
                observer.observe(el);
            });
    };
})();

/* ============================================
   HERO ANIMATION TRIGGER
============================================ */
(function initHeroAnimation() {
    var heroContent = document.getElementById("heroContent");
    if (!heroContent) return;
    new IntersectionObserver(
        function (entries, obs) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    heroContent.classList.add("show");
                    obs.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.2 },
    ).observe(heroContent);
})();
