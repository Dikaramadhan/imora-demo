        const swiper = new Swiper('.gallerySwiper', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: { // Opsional: auto slide
                delay: 3000,
                disableOnInteraction: false,
            },
        });

        document.addEventListener('DOMContentLoaded', function() {
            // --- Inisialisasi Swiper Slider ---
            const swiper = new Swiper('.gallerySwiper', {
                loop: true, // Slider akan berputar terus-menerus
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true, // Pagination bisa diklik
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                autoplay: { // Opsional: auto slide setiap 5 detik
                    delay: 5000,
                    disableOnInteraction: false, // Autoplay tidak berhenti saat user interaksi
                },
            });

            // --- Logika Lightbox ---
            const lightbox = document.getElementById('lightbox');
            const lightboxImg = document.getElementById('lightbox-img');
            const closeBtn = document.querySelector('.close-lightbox');
            const gallerySlides = document.querySelectorAll('.swiper-slide');

            // Tambahkan event listener ke setiap slide
            gallerySlides.forEach(slide => {
                slide.addEventListener('click', function() {
                    // Cari elemen gambar di dalam slide yang diklik
                    const img = this.querySelector('img');
                    if (img) {
                        lightbox.style.display = 'block';
                        lightboxImg.src = img.src; // Tampilkan gambar yang diklik
                    }
                });
            });

            // Fungsi untuk menutup lightbox
            function closeLightbox() {
                lightbox.style.display = 'none';
            }

            // Event listener untuk tombol close
            closeBtn.addEventListener('click', closeLightbox);

            // Tutup lightbox saat klik di area luar gambar
            lightbox.addEventListener('click', function(e) {
                if (e.target === lightbox) {
                    closeLightbox();
                }
            });

            // Tutup lightbox dengan tombol ESC
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeLightbox();
                }
            });
        });

        /* ============================================
               WEDDING INVITATION - MAIN JAVASCRIPT
               ============================================ */

        // ========================================
        // 1. GLOBAL VARIABLES & CONFIGURATION
        // ========================================
        const CONFIG = {
            WISHES_PER_PAGE: 5,
            STORAGE_KEY: 'weddingWishes_angga_diya',
            WEDDING_DATE: '2025-12-07T09:00:00',
            MAX_WISHES: 100,
            API_ENDPOINT: '/api/rsvps' // API endpoint untuk menyimpan RSVP
        };

        let currentPage = 1;
        let allWishes = [];

        // ========================================
        // 2. UTILITY FUNCTIONS
        // ========================================

        /**
         * Escape HTML untuk mencegah XSS
         */
        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }

        /**
         * Format tanggal ke bahasa Indonesia
         */
        function formatDate(timestamp) {
            const date = timestamp ? new Date(timestamp) : new Date();
            return date.toLocaleString('id-ID', {
                day: '2-digit',
                month: 'short',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        }

        /**
         * Get guest name from URL
         */
        function getGuestName() {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get('to') || "Bapak/Ibu/Saudara/i";
        }

        // ========================================
        // 3. API FUNCTIONS (DATABASE)
        // ========================================

        /**
         * Save wish to server
         */
        function saveWishToServer(nama, status, ucapan) {
            console.log('Mengirim data ke server:', {
                nama,
                status,
                ucapan
            });

            return fetch(CONFIG.API_ENDPOINT, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        name: nama, // Mengubah 'nama' menjadi 'name'
                        status: status,
                        message: ucapan // Mengubah 'ucapan' menjadi 'message'
                    })
                })
                .then(response => {
                    console.log('Response dari server:', response);
                    // Jika bukan status sukses (2xx), lempar error untuk ditangkap di .catch
                    if (!response.ok) {
                        return response.json().then(err => {
                            throw err;
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Data dari server:', data);
                    if (data.success) {
                        return true;
                    } else {
                        throw new Error(data.message || 'Gagal menyimpan RSVP');
                    }
                })
                .catch(error => {
                    console.error('Error saving wish:', error);
                    // Fallback ke localStorage jika server error
                    console.log('Server error, falling back to localStorage');
                    return saveWishToStorage(nama, status, ucapan);
                });
        }

        /**
         * Load wishes from server
         */
        function loadWishesFromServer() {
            console.log('Mengambil data dari server...');
            return fetch(CONFIG.API_ENDPOINT)
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(err => {
                            throw err;
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Data dari server (load):', data);
                    if (data.success) {
                        return data.data;
                    } else {
                        throw new Error(data.message || 'Gagal mengambil data RSVP');
                    }
                })
                .catch(error => {
                    console.error('Error loading wishes:', error);
                    // Fallback ke localStorage jika server error
                    console.log('Server error, falling back to localStorage');
                    return loadWishesFromStorage();
                });
        }

        // ========================================
        // 4. STORAGE FUNCTIONS (localStorage)
        // ========================================

        /**
         * Save wish to localStorage
         */
        function saveWishToStorage(nama, status, ucapan) {
            try {
                let wishes = JSON.parse(localStorage.getItem(CONFIG.STORAGE_KEY)) || [];
                wishes.unshift({
                    id: Date.now(),
                    nama: nama,
                    status: status,
                    ucapan: ucapan,
                    timestamp: new Date().toISOString()
                });

                // Limit jumlah ucapan
                if (wishes.length > CONFIG.MAX_WISHES) {
                    wishes = wishes.slice(0, CONFIG.MAX_WISHES);
                }

                localStorage.setItem(CONFIG.STORAGE_KEY, JSON.stringify(wishes));
                return true;
            } catch (e) {
                console.error('Error saving wish:', e);
                return false;
            }
        }

        /**
         * Load wishes from localStorage
         */
        function loadWishesFromStorage() {
            try {
                return JSON.parse(localStorage.getItem(CONFIG.STORAGE_KEY)) || [];
            } catch (e) {
                console.error('Error loading wishes:', e);
                return [];
            }
        }

        // ========================================
        // 5. WISHES DISPLAY FUNCTIONS
        // ========================================

        /**
         * Add single wish to DOM
         */
        function addWishToDOM(nama, status, ucapan, timestamp) {
            const wishesList = document.getElementById('wishesList');
            if (!wishesList) return;

            // Remove empty message if exists
            const emptyMsg = wishesList.querySelector('.wishes-empty');
            if (emptyMsg) emptyMsg.remove();

            const formattedDate = formatDate(timestamp);

            // Determine status class
            const statusClass = status.toLowerCase().replace(/\s+/g, '-');

            const wishCard = document.createElement('div');
            wishCard.classList.add('wish-card');
            wishCard.innerHTML = `
        <div class="wish-header">
            <span class="wish-name">${escapeHtml(nama)}</span>
            <span class="wish-status ${statusClass}">${escapeHtml(status)}</span>
        </div>
        ${ucapan
            ? `<p class="wish-message">"${escapeHtml(ucapan)}"</p>`
            : '<p class="wish-message" style="color: rgba(0,0,0,0.4);">(Tidak ada ucapan)</p>'
        }
        <div class="wish-time">${formattedDate}</div>
        `;

            wishesList.prepend(wishCard);
        }

        /**
         * Display wishes with pagination
         */
        function displayWishesWithLimit(page = 1) {
            const wishesList = document.getElementById('wishesList');
            const loadMoreBtn = document.querySelector('.load-more-btn');
            const paginationContainer = document.getElementById('paginationContainer');

            if (!wishesList) return;

            const start = (page - 1) * CONFIG.WISHES_PER_PAGE;
            const end = start + CONFIG.WISHES_PER_PAGE;
            const visibleWishes = allWishes.slice(start, end);

            // Clear display
            wishesList.innerHTML = '';

            if (allWishes.length === 0) {
                wishesList.innerHTML = '<div class="wishes-empty">Belum ada ucapan. Jadilah yang pertama! 💕</div>';
                if (loadMoreBtn) loadMoreBtn.style.display = 'none';
                if (paginationContainer) paginationContainer.innerHTML = '';
                return;
            }

            // Display wishes
            visibleWishes.forEach(w => {
                // Handle both server and localStorage data formats
                const nama = w.nama || w.name;
                const ucapan = w.ucapan || w.message;
                const timestamp = w.timestamp || w.created_at;

                addWishToDOM(nama, w.status, ucapan, timestamp);
            });

            // Create pagination
            createPagination(page);

            // Hide load more button since we're using pagination
            if (loadMoreBtn) loadMoreBtn.style.display = 'none';
        }

        /**
         * Create pagination controls
         */
        function createPagination(currentPage) {
            const paginationContainer = document.getElementById('paginationContainer');
            if (!paginationContainer) return;

            const totalPages = Math.ceil(allWishes.length / CONFIG.WISHES_PER_PAGE);

            // Clear existing pagination
            paginationContainer.innerHTML = '';

            if (totalPages <= 1) return;

            const pagination = document.createElement('div');
            pagination.className = 'pagination';

            // Previous button
            const prevBtn = document.createElement('button');
            prevBtn.className = 'pagination-btn';
            prevBtn.innerHTML = '<i class="bi bi-chevron-left"></i>';
            prevBtn.disabled = currentPage === 1;
            prevBtn.addEventListener('click', () => {
                if (currentPage > 1) {
                    displayWishesWithLimit(currentPage - 1);
                }
            });
            pagination.appendChild(prevBtn);

            // Page numbers
            const maxVisiblePages = 5;
            let startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
            let endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);

            if (endPage - startPage + 1 < maxVisiblePages) {
                startPage = Math.max(1, endPage - maxVisiblePages + 1);
            }

            if (startPage > 1) {
                const firstPageBtn = createPageButton(1, currentPage);
                pagination.appendChild(firstPageBtn);

                if (startPage > 2) {
                    const ellipsis = document.createElement('span');
                    ellipsis.className = 'pagination-ellipsis';
                    ellipsis.textContent = '...';
                    pagination.appendChild(ellipsis);
                }
            }

            for (let i = startPage; i <= endPage; i++) {
                const pageBtn = createPageButton(i, currentPage);
                pagination.appendChild(pageBtn);
            }

            if (endPage < totalPages) {
                if (endPage < totalPages - 1) {
                    const ellipsis = document.createElement('span');
                    ellipsis.className = 'pagination-ellipsis';
                    ellipsis.textContent = '...';
                    pagination.appendChild(ellipsis);
                }

                const lastPageBtn = createPageButton(totalPages, currentPage);
                pagination.appendChild(lastPageBtn);
            }

            // Next button
            const nextBtn = document.createElement('button');
            nextBtn.className = 'pagination-btn';
            nextBtn.innerHTML = '<i class="bi bi-chevron-right"></i>';
            nextBtn.disabled = currentPage === totalPages;
            nextBtn.addEventListener('click', () => {
                if (currentPage < totalPages) {
                    displayWishesWithLimit(currentPage + 1);
                }
            });
            pagination.appendChild(nextBtn);

            paginationContainer.appendChild(pagination);
        }

        /**
         * Create a page button
         */
        function createPageButton(pageNum, currentPage) {
            const pageBtn = document.createElement('button');
            pageBtn.className = 'pagination-btn';
            if (pageNum === currentPage) {
                pageBtn.classList.add('active');
            }
            pageBtn.textContent = pageNum;
            pageBtn.addEventListener('click', () => {
                displayWishesWithLimit(pageNum);
            });
            return pageBtn;
        }

        /**
         * Display all wishes from server or localStorage
         */
        function displayAllWishes() {
            const wishesList = document.getElementById('wishesList');
            if (!wishesList) return;

            // Show loading state
            wishesList.innerHTML = '<div class="wishes-loading">Memuat ucapan...</div>';

            // Try to load from server first
            loadWishesFromServer()
                .then(wishes => {
                    allWishes = wishes;
                    // Display wishes with pagination (starting from page 1)
                    displayWishesWithLimit(1);
                })
                .catch(error => {
                    console.error('Error loading wishes:', error);
                    // Fallback to localStorage if server error
                    allWishes = loadWishesFromStorage();
                    // Display wishes with pagination (starting from page 1)
                    displayWishesWithLimit(1);
                });
        }

        function displayAllWishesWithoutLimit() {
            const wishesList = document.getElementById('wishesList');
            const loadMoreBtn = document.querySelector('.load-more-btn');

            if (!wishesList) return;

            // Clear display
            wishesList.innerHTML = '';

            if (allWishes.length === 0) {
                wishesList.innerHTML = '<div class="wishes-empty">Belum ada ucapan. Jadilah yang pertama! 💕</div>';
                if (loadMoreBtn) loadMoreBtn.style.display = 'none';
                return;
            }

            // Display all wishes
            allWishes.forEach(w => {
                // Handle both server and localStorage data formats
                const nama = w.nama || w.name;
                const ucapan = w.ucapan || w.message;
                const timestamp = w.timestamp || w.created_at;

                addWishToDOM(nama, w.status, ucapan, timestamp);
            });

            // Sembunyikan tombol "Load More" karena semua ucapan sudah ditampilkan
            if (loadMoreBtn) {
                loadMoreBtn.style.display = 'none';
            }
        }
        /**
         * Add new wish
         */
        function addWish(nama, status, ucapan) {
            const submitBtn = document.querySelector('.btn-submit');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> Mengirim...';
            submitBtn.disabled = true;

            return saveWishToServer(nama, status, ucapan)
                .then(success => {
                    if (success) {
                        // Add to array in memory
                        allWishes.unshift({
                            name: nama,
                            status: status,
                            message: ucapan,
                            created_at: new Date().toISOString()
                        });
                        // Display wishes with pagination (starting from page 1)
                        displayWishesWithLimit(1);
                        return true;
                    }
                    return false;
                })
                .catch(error => {
                    console.error('Error adding wish:', error);
                    return false;
                })
                .finally(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                });
        }


        // ========================================
        // 6. INVITATION FUNCTIONS
        // ========================================

        /**
         * Open invitation
         */
        function openInvitation() {
            const cover = document.getElementById('cover');
            const mainContent = document.getElementById('main-content');
            const musicToggle = document.querySelector('.music-toggle');

            if (cover) cover.classList.add('hidden');

            setTimeout(() => {
                if (mainContent) mainContent.classList.add('active');
                if (musicToggle) musicToggle.classList.add('active');

                // Initialize features
                initializeAnimations();
                startCountdown();
                startBackgroundMusic();
            }, 800);
        }

        /**
         * Initialize scroll animations
         */
        function initializeAnimations() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animated');
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -100px 0px'
            });

            // Observe all animated elements
            const animatedElements = document.querySelectorAll(
                '.section-title, .quote-text, .couple-card, .countdown-item, ' +
                '.event-card, .gallery-item, .rsvp-form, .video-wrapper, ' +
                '.gift-card, .map-card, .wish-card'
            );

            animatedElements.forEach(el => observer.observe(el));

            // Hero content animation
            const heroContent = document.querySelector('.hero-content');
            if (heroContent) {
                setTimeout(() => heroContent.classList.add('show'), 500);
            }
        }

        // ========================================
        // 6. INVITATION FUNCTIONS
        // ========================================

        /**
         * Open invitation
         */
        function openInvitation() {
            const cover = document.getElementById('cover');
            const mainContent = document.getElementById('main-content');
            const musicToggle = document.querySelector('.music-toggle');

            if (cover) cover.classList.add('hidden');

            setTimeout(() => {
                if (mainContent) mainContent.classList.add('active');
                if (musicToggle) musicToggle.classList.add('active');

                // Initialize features
                initializeAnimations();
                startCountdown();
                startBackgroundMusic();
            }, 800);
        }

        /**
         * Initialize scroll animations
         */
        function initializeAnimations() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animated');
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -100px 0px'
            });

            // Observe all animated elements
            const animatedElements = document.querySelectorAll(
                '.section-title, .quote-text, .couple-card, .countdown-item, ' +
                '.event-card, .gallery-item, .rsvp-form, .video-wrapper, ' +
                '.gift-card, .map-card, .wish-card'
            );

            animatedElements.forEach(el => observer.observe(el));

            // Hero content animation
            const heroContent = document.querySelector('.hero-content');
            if (heroContent) {
                setTimeout(() => heroContent.classList.add('show'), 500);
            }
        }

        // ========================================
        // 7. COUNTDOWN TIMER
        // ========================================

        /**
         * Start countdown timer
         */
        function startCountdown() {
            const weddingDate = new Date(CONFIG.WEDDING_DATE).getTime();

            const timer = setInterval(() => {
                const now = new Date().getTime();
                const distance = weddingDate - now;

                // Calculate time units
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Update display
                const elements = {
                    'days': days,
                    'hours': hours,
                    'minutes': minutes,
                    'seconds': seconds
                };

                for (const [id, value] of Object.entries(elements)) {
                    const element = document.getElementById(id);
                    if (element) {
                        element.textContent = value.toString().padStart(2, '0');
                    }
                }

                // Check if countdown finished
                if (distance < 0) {
                    clearInterval(timer);
                    const countdownGrid = document.querySelector('.countdown-grid');
                    if (countdownGrid) {
                        countdownGrid.innerHTML = '<h3 style="grid-column: 1/-1;">The Wedding Day is Here! 💕</h3>';
                    }
                }
            }, 1000);
        }

        // ========================================
        // 8. MUSIC CONTROLS
        // ========================================

        /**
         * Toggle background music
         */
        function toggleMusic() {
            const bgMusic = document.getElementById('bgMusic');
            const musicIcon = document.getElementById('musicIcon');

            if (!bgMusic || !musicIcon) return;

            if (bgMusic.paused) {
                bgMusic.play()
                    .then(() => {
                        musicIcon.className = 'bi bi-music-note-beamed';
                    })
                    .catch(e => console.log('Play prevented:', e));
            } else {
                bgMusic.pause();
                musicIcon.className = 'bi bi-music-note';
            }
        }

        /**
         * Start background music (autoplay)
         */
        function startBackgroundMusic() {
            const bgMusic = document.getElementById('bgMusic');
            const musicIcon = document.getElementById('musicIcon');

            if (bgMusic && musicIcon) {
                bgMusic.play()
                    .then(() => {
                        musicIcon.className = 'bi bi-music-note-beamed';
                    })
                    .catch(e => {
                        console.log('Autoplay prevented:', e);
                        musicIcon.className = 'bi bi-music-note';
                    });
            }
        }

        // ========================================
        // 9. CLIPBOARD FUNCTIONS
        // ========================================

        /**
         * Copy text to clipboard
         */
        function copyToClipboard(text, btn) {
            navigator.clipboard.writeText(text)
                .then(() => {
                    const copyText = btn.querySelector('.copy-text');
                    if (copyText) {
                        const originalText = copyText.textContent;
                        btn.classList.add('copied');
                        copyText.textContent = 'Copied!';

                        setTimeout(() => {
                            btn.classList.remove('copied');
                            copyText.textContent = originalText;
                        }, 2000);
                    }
                })
                .catch(() => {
                    // Fallback for older browsers
                    const textArea = document.createElement('textarea');
                    textArea.value = text;
                    document.body.appendChild(textArea);
                    textArea.select();
                    try {
                        document.execCommand('copy');
                        alert('Nomor rekening disalin: ' + text);
                    } catch (err) {
                        alert('Gagal menyalin. Nomor: ' + text);
                    }
                    document.body.removeChild(textArea);
                });
        }

        /**
         * Copy address
         */
        function copyAddress(btn) {
            const address =
                "Kontrakan bapak kuwat, belakang smk 11 Maret, kavling telaga indah RT 002 RW 014 Desa Telaga Murni, Kec. Cikarang Barat Kab.Bekasi ID 17841";
            copyToClipboard(address, btn);
        }

        // ========================================
        // 10. VIDEO AUTOPLAY HANDLER
        // ========================================

        /**
         * Setup video autoplay on scroll
         */
        function setupVideoAutoplay() {
            const videoWrapper = document.querySelector('.video-wrapper');
            const iframe = videoWrapper?.querySelector('iframe');

            if (!videoWrapper || !iframe) return;

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    const src = iframe.getAttribute('src');

                    if (entry.isIntersecting) {
                        // Add autoplay parameter when video is visible
                        if (src && !src.includes('autoplay=1')) {
                            const separator = src.includes('?') ? '&' : '?';
                            iframe.setAttribute('src', src + separator + 'autoplay=1&mute=1');
                        }
                    } else {
                        // Remove autoplay to stop video when scrolled away
                        if (src && src.includes('autoplay=1')) {
                            iframe.setAttribute('src', src.replace(/[?&]autoplay=1&mute=1/, ''));
                        }
                    }
                });
            }, {
                threshold: 0.5 // Video must be 50% visible
            });

            observer.observe(videoWrapper);
        }

        // ========================================
        // 11. FORM HANDLER
        // ========================================

        /**
         * Handle RSVP form submission
         */
        function handleRSVPForm() {
            const rsvpForm = document.getElementById('rsvpForm');
            if (!rsvpForm) return;

            rsvpForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const nama = document.getElementById('nama')?.value.trim();
                const status = document.getElementById('status')?.value;
                const ucapan = document.getElementById('ucapan')?.value.trim();

                // Validation
                if (!nama || !status) {
                    alert('⚠️ Mohon isi nama dan pilih status kehadiran!');
                    return;
                }

                // Save wish
                addWish(nama, status, ucapan)
                    .then(success => {
                        if (success) {
                            // Show success message
                            alert(
                                `✅ Terima kasih ${nama}!\n\nStatus: ${status}\n\nUcapan Anda sudah tersimpan ❤️`
                            );

                            // Reset form
                            this.reset();

                            // Scroll to wishes section
                            setTimeout(() => {
                                const wishesList = document.getElementById('wishesList');
                                if (wishesList) {
                                    wishesList.scrollIntoView({
                                        behavior: 'smooth',
                                        block: 'start'
                                    });
                                }
                            }, 300);
                        }
                    });
            });
        }

        // ========================================
        // 12. LOAD MORE HANDLER
        // ========================================

        /**
         * Handle load more button
         */
        // function handleLoadMore() {
        //     const loadMoreBtn = document.querySelector('.load-more-btn');
        //     if (!loadMoreBtn) return;

        //     loadMoreBtn.addEventListener('click', () => {
        //         currentPage++;
        //         displayWishesWithLimit(currentPage);

        //         // Smooth scroll to new wishes
        //         setTimeout(() => {
        //             const wishes = document.querySelectorAll('.wish-card');
        //             if (wishes.length > 0) {
        //                 const lastVisibleIndex = (currentPage - 1) * CONFIG.WISHES_PER_PAGE;
        //                 const targetWish = wishes[lastVisibleIndex];
        //                 if (targetWish) {
        //                     targetWish.scrollIntoView({
        //                         behavior: 'smooth',
        //                         block: 'center'
        //                     });
        //                 }
        //             }
        //         }, 100);
        //     });
        // }

        // ========================================
        // 13. TIMELINE ANIMATION
        // ========================================

        /**
         * Initialize timeline animations
         */
        function initTimelineAnimations() {
            const timelineItems = document.querySelectorAll('.timeline-item');

            // Intersection Observer untuk animasi scroll
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.2,
                rootMargin: '0px 0px -50px 0px'
            });

            timelineItems.forEach(item => {
                observer.observe(item);
            });

            // Optional: Add click effect on timeline items
            timelineItems.forEach(item => {
                item.addEventListener('click', function() {
                    const content = this.querySelector('.timeline-content');
                    content.style.transform = 'scale(1.02)';
                    setTimeout(() => {
                        content.style.transform = 'scale(1)';
                    }, 200);
                });
            });

            // Optional: Menambahkan efek parallax pada timeline
            window.addEventListener('scroll', function() {
                const scrolled = window.pageYOffset;
                const timeline = document.querySelector('.timeline');

                if (timeline) {
                    const timelineTop = timeline.offsetTop;
                    const timelineHeight = timeline.offsetHeight;

                    if (scrolled > timelineTop - window.innerHeight &&
                        scrolled < timelineTop + timelineHeight) {
                        const dots = document.querySelectorAll('.timeline-dot');
                        dots.forEach((dot, index) => {
                            const speed = 0.5 + (index * 0.1);
                            const yPos = -(scrolled - timelineTop) * speed * 0.05;
                            dot.style.transform = `translateX(-50%) translateY(${yPos}px)`;
                        });
                    }
                }
            });

            console.log('✨ History Love Section Initialized');
        }

        // Function untuk menambahkan item timeline secara dinamis (optional)
        function addTimelineItem(date, title, text) {
            const timeline = document.querySelector('.timeline');
            if (!timeline) return;

            const item = document.createElement('div');
            item.className = 'timeline-item';
            item.innerHTML = `
            <div class="timeline-dot"></div>
            <div class="timeline-content">
                <div class="timeline-date">${date}</div>
                <h3 class="timeline-title">${title}</h3>
                <p class="timeline-text">${text}</p>
            </div>
        `;

            timeline.appendChild(item);
        }

        // Function untuk highlight timeline item yang sedang terlihat
        function updateActiveTimeline() {
            const timelineItems = document.querySelectorAll('.timeline-item');
            const scrollPosition = window.scrollY + window.innerHeight / 2;

            timelineItems.forEach(item => {
                const itemTop = item.offsetTop;
                const itemBottom = itemTop + item.offsetHeight;

                if (scrollPosition >= itemTop && scrollPosition <= itemBottom) {
                    item.classList.add('active');
                    const dot = item.querySelector('.timeline-dot');
                    if (dot) {
                        dot.style.transform = 'translateX(-50%) scale(1.3)';
                    }
                } else {
                    item.classList.remove('active');
                    const dot = item.querySelector('.timeline-dot');
                    if (dot) {
                        dot.style.transform = 'translateX(-50%) scale(1)';
                    }
                }
            });
        }

        // ========================================
        // 14. INITIALIZATION
        // ========================================

        /**
         * Initialize guest name display
         */
        function initGuestName() {
            const guestNameDisplay = document.getElementById('guestNameDisplay');
            if (guestNameDisplay) {
                guestNameDisplay.textContent = getGuestName();
            }
        }

        /**
         * Main initialization when DOM is ready
         */
        document.addEventListener('DOMContentLoaded', function() {
            console.log('🎊 Wedding Invitation Initialized');

            // Initialize guest name
            initGuestName();

            // Display wishes with pagination
            displayAllWishes();

            // Setup handlers
            handleRSVPForm();
            // Hapus atau komentari handleLoadMore karena tidak lagi diperlukan
            // handleLoadMore();

            // Initialize timeline animations
            initTimelineAnimations();

            // Setup video autoplay (when invitation is opened)
            setTimeout(() => {
                setupVideoAutoplay();
            }, 1000);

            // Setup performance monitoring
            if ('performance' in window) {
                window.addEventListener('load', () => {
                    const perfData = performance.timing;
                    const pageLoadTime = perfData.loadEventEnd - perfData.navigationStart;
                    console.log(`📊 Page Load Time: ${pageLoadTime}ms`);
                });
            }
        });

        // Update active timeline on scroll
        window.addEventListener('scroll', updateActiveTimeline);

        // ========================================
        // 15. ERROR HANDLING
        // ========================================

        /**
         * Global error handler
         */
        window.addEventListener('error', function(e) {
            console.error('❌ Global Error:', e.error);
        });

        /**
         * Handle unhandled promise rejections
         */
        window.addEventListener('unhandledrejection', function(e) {
            console.error('❌ Unhandled Promise Rejection:', e.reason);
        });

        // ========================================
        // 16. EXPORT FUNCTIONS (if needed)
        // ========================================

        // Make functions available globally
        window.openInvitation = openInvitation;
        window.toggleMusic = toggleMusic;
        window.copyToClipboard = copyToClipboard;
        window.copyAddress = copyAddress;
        window.addTimelineItem = addTimelineItem;



