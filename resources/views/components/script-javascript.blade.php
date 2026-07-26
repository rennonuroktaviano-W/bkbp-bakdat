{{-- ==========================================================
     COMPONENT: JS Interaksi & Animasi (Vanilla JS)
     ========================================================== --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Inisialisasi Lucide Icons
    lucide.createIcons();

    // 1. Navbar glassmorphism saat discroll
    const navbar = document.getElementById('navbar');
    const onScrollNavbar = () => {
        if (window.scrollY > 24) {
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }
    };
    window.addEventListener('scroll', onScrollNavbar, {
        passive: true
    });
    onScrollNavbar();

    // 2. Smooth scrolling untuk anchor link
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId.length > 1) {
                const target = document.querySelector(targetId);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // 3. Scroll reveal animation
    const revealEls = document.querySelectorAll('.reveal');
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('reveal-visible');
                revealObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.15
    });
    revealEls.forEach(el => revealObserver.observe(el));

    // 4. Animated counter
    const counters = document.querySelectorAll('.counter');
    const animateCounter = (el) => {
        const target = parseInt(el.dataset.target, 10);
        const duration = 1800;
        const startTime = performance.now();
        const step = (now) => {
            const progress = Math.min((now - startTime) / duration, 1);
            const eased = 1 - (1 - progress) * (1 - progress);
            el.textContent = Math.floor(eased * target).toLocaleString('id-ID');
            if (progress < 1) requestAnimationFrame(step);
            else el.textContent = target.toLocaleString('id-ID');
        };
        requestAnimationFrame(step);
    };
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                counterObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.5
    });
    counters.forEach(counter => counterObserver.observe(counter));

    // 5. Ripple effect
    document.querySelectorAll('.btn-ripple').forEach(btn => {
        btn.addEventListener('click', function(e) {
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const ripple = document.createElement('span');
            ripple.className = 'ripple-span';
            ripple.style.width = ripple.style.height = `${size}px`;
            ripple.style.left = `${e.clientX - rect.left - size / 2}px`;
            ripple.style.top = `${e.clientY - rect.top - size / 2}px`;
            this.appendChild(ripple);
            setTimeout(() => ripple.remove(), 650);
        });
    });

    // =======================================================
    // 6. SHOW / HIDE PASSWORD TOGGLE
    // =======================================================
    /**
     * Setiap tombol toggle punya attribute [data-toggle-pw="<id-input>"]
     * Icon .icon-eye dan .icon-eye-off ada di dalam tombol.
     */
    document.querySelectorAll('[data-toggle-pw]').forEach(btn => {
        btn.addEventListener('click', function() {
            const inputId = this.getAttribute('data-toggle-pw');
            const input = document.getElementById(inputId);
            if (!input) return;

            const isHidden = input.type === 'password';
            input.type = isHidden ? 'text' : 'password';

            const eyeIcon = this.querySelector('.icon-eye');
            const eyeOffIcon = this.querySelector('.icon-eye-off');

            if (isHidden) {
                // sedang tampilkan → ganti ke eye-off
                eyeIcon.classList.add('hidden');
                eyeOffIcon.classList.remove('hidden');
                this.setAttribute('aria-label', 'Sembunyikan password');
            } else {
                // sedang sembunyikan → ganti ke eye
                eyeIcon.classList.remove('hidden');
                eyeOffIcon.classList.add('hidden');
                this.setAttribute('aria-label', 'Tampilkan password');
            }
        });
    });

    // =======================================================
    // 7. LOGIC AUTH (LOGIN & REGISTER TOGGLE)
    // =======================================================
    const viewLogin = document.getElementById('view-login');
    const viewRegister = document.getElementById('view-register');
    const btnShowRegister = document.getElementById('btn-show-register');
    const btnShowLogin = document.getElementById('btn-show-login');

    const switchAuthView = (hideElement, showElement) => {
        hideElement.classList.remove('opacity-100');
        hideElement.classList.add('opacity-0', 'pointer-events-none');
        showElement.classList.remove('opacity-0', 'pointer-events-none');
        showElement.classList.add('opacity-100');
    };

    btnShowRegister.addEventListener('click', () => switchAuthView(viewLogin, viewRegister));
    btnShowLogin.addEventListener('click', () => switchAuthView(viewRegister, viewLogin));

    // =======================================================
    // 8. FORM REGISTER — ROLE / KELAS / JURUSAN LOGIC
    // =======================================================
    const roleInputs = document.querySelectorAll('input[name="role"]');
    const wrapperKelasJurusan = document.getElementById('wrapper-kelas-jurusan');
    const hiddenKelas = document.getElementById('reg_kelas');
    const hiddenJurusan = document.getElementById('reg_jurusan');

    // Sync hidden input kelas setiap kali radio kelas berubah
    document.querySelectorAll('input[name="kelas"]').forEach(input => {
        input.addEventListener('change', (e) => {
            if (hiddenKelas) hiddenKelas.value = e.target.value;
        });
    });

    // Sync hidden input jurusan setiap kali radio jurusan berubah
    document.querySelectorAll('input[name="jurusan"]').forEach(input => {
        input.addEventListener('change', (e) => {
            if (hiddenJurusan) hiddenJurusan.value = e.target.value;
        });
    });

    // Tampil/sembunyi wrapper kelas & jurusan berdasarkan role
    roleInputs.forEach(input => {
        input.addEventListener('change', (e) => {
            if (e.target.value === 'siswa') {
                wrapperKelasJurusan.classList.remove('hidden');
            } else {
                wrapperKelasJurusan.classList.add('hidden');
                // Reset semua radio kelas & jurusan
                document.querySelectorAll('input[name="kelas"]').forEach(r => r.checked =
                    false);
                document.querySelectorAll('input[name="jurusan"]').forEach(r => r.checked =
                    false);
                if (hiddenKelas) hiddenKelas.value = '';
                if (hiddenJurusan) hiddenJurusan.value = '';
            }
        });
    });

    // =======================================================
    // 9. FORM REGISTER — VALIDASI SUBMIT
    // =======================================================
    const formRegister = document.getElementById('form-register');
    const errBox = document.getElementById('reg-error-box');
    const errText = document.getElementById('reg-error-text');

    const showError = (msg) => {
        errText.textContent = msg;
        errBox.classList.remove('hidden');
        // Auto scroll ke pesan error
        errBox.scrollIntoView({
            behavior: 'smooth',
            block: 'nearest'
        });
    };

    const clearError = () => {
        errBox.classList.add('hidden');
        errText.textContent = '';
    };

    formRegister.addEventListener('submit', function(e) {
        e.preventDefault();
        clearError();

        const role = document.querySelector('input[name="role"]:checked')?.value;

        // Validasi kelas & jurusan jika siswa
        if (role === 'siswa') {
            const kelasVal = document.querySelector('input[name="kelas"]:checked')?.value;
            const jurusanVal = document.querySelector('input[name="jurusan"]:checked')?.value;

            if (!kelasVal) {
                showError('Pilih kelas terlebih dahulu!');
                return;
            }
            if (!jurusanVal) {
                showError('Pilih jurusan terlebih dahulu!');
                return;
            }
        }

        // -------------------------------------------------------
        // Validasi password — ambil value LANGSUNG dari elemen
        // supaya tidak ada masalah whitespace atau referensi stale
        // -------------------------------------------------------
        const pwInput = document.getElementById('reg_password');
        const pwConfInput = document.getElementById('reg_password_confirm');
        const pwVal = pwInput.value;
        const pwConfVal = pwConfInput.value;

        if (pwVal.length < 8) {
            showError('Password harus minimal 8 karakter!');
            pwInput.focus();
            return;
        }

        // Bandingkan karakter per karakter (menghindari masalah encoding)
        if (pwVal !== pwConfVal) {
            showError('Password dan Konfirmasi Password tidak sama!');
            pwConfInput.focus();
            // Highlight input konfirmasi
            pwConfInput.classList.add('border-red-400', 'ring-2', 'ring-red-200');
            pwConfInput.addEventListener('input', function handler() {
                pwConfInput.classList.remove('border-red-400', 'ring-2', 'ring-red-200');
                pwConfInput.removeEventListener('input', handler);
            });
            return;
        }

        // Semua validasi lolos
        clearError();
        alert('Validasi Frontend Sukses! Formulir siap dikirim ke backend.');
        // formRegister.submit(); // Buka komentar jika route sudah siap
    });

    // =======================================================
    // 10. LOGIN FORM — Redirect ke Dashboard
    // =======================================================
    const loginForm = document.querySelector('#view-login form');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            if (this.checkValidity()) {
                window.location.href = "{{ url('/dashboard') }}";
            }
        });
    }
});
</script>