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
                eyeIcon.classList.add('hidden');
                eyeOffIcon.classList.remove('hidden');
                this.setAttribute('aria-label', 'Sembunyikan password');
            } else {
                eyeIcon.classList.remove('hidden');
                eyeOffIcon.classList.add('hidden');
                this.setAttribute('aria-label', 'Tampilkan password');
            }
        });
    });

    // =======================================================
    // 7. VIEW SWITCHER — helper utama navigasi antar panel
    // =======================================================
    const viewLogin = document.getElementById('view-login');
    const viewRegister = document.getElementById('view-register');
    const viewRegisterSuccess = document.getElementById('view-register-success');
    const btnShowRegister = document.getElementById('btn-show-register');
    const btnShowLogin = document.getElementById('btn-show-login');
    const btnGotoLogin = document.getElementById('btn-goto-login');
    const btnRegisterAgain = document.getElementById('btn-register-again');

    const allViews = [viewLogin, viewRegister, viewRegisterSuccess];

    /**
     * Sembunyikan semua panel, tampilkan satu panel target.
     * Pakai opacity + pointer-events supaya grid overlap tetap smooth.
     */
    const showView = (target) => {
        allViews.forEach(view => {
            if (view === target) {
                view.classList.remove('opacity-0', 'pointer-events-none');
                view.classList.add('opacity-100');
            } else {
                view.classList.remove('opacity-100');
                view.classList.add('opacity-0', 'pointer-events-none');
            }
        });
    };

    btnShowRegister.addEventListener('click', () => showView(viewRegister));
    btnShowLogin.addEventListener('click', () => showView(viewLogin));

    // Dari success → login
    btnGotoLogin.addEventListener('click', () => showView(viewLogin));

    // Dari success → register lagi (reset form dulu)
    btnRegisterAgain.addEventListener('click', () => {
        resetRegisterForm();
        showView(viewRegister);
    });

    // =======================================================
    // 8. FORM REGISTER — ROLE / KELAS / JURUSAN LOGIC
    // =======================================================
    const roleInputs = document.querySelectorAll('input[name="role"]');
    const wrapperKelasJurusan = document.getElementById('wrapper-kelas-jurusan');
    const hiddenKelas = document.getElementById('reg_kelas');
    const hiddenJurusan = document.getElementById('reg_jurusan');

    document.querySelectorAll('input[name="kelas"]').forEach(input => {
        input.addEventListener('change', (e) => {
            if (hiddenKelas) hiddenKelas.value = e.target.value;
        });
    });

    document.querySelectorAll('input[name="jurusan"]').forEach(input => {
        input.addEventListener('change', (e) => {
            if (hiddenJurusan) hiddenJurusan.value = e.target.value;
        });
    });

    roleInputs.forEach(input => {
        input.addEventListener('change', (e) => {
            if (e.target.value === 'siswa') {
                wrapperKelasJurusan.classList.remove('hidden');
            } else {
                wrapperKelasJurusan.classList.add('hidden');
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
    // 9. RESET FORM REGISTER — bersihkan semua field & state
    // =======================================================
    const resetRegisterForm = () => {
        const formRegister = document.getElementById('form-register');

        // Reset semua input text, email, password ke kosong
        formRegister.querySelectorAll('input[type="text"], input[type="email"], input[type="password"]')
            .forEach(input => {
                input.value = '';
            });

        // Reset radio role ke default (Guru)
        const guruRadio = formRegister.querySelector('input[name="role"][value="guru"]');
        if (guruRadio) guruRadio.checked = true;

        // Reset radio kelas & jurusan
        formRegister.querySelectorAll('input[name="kelas"]').forEach(r => r.checked = false);
        formRegister.querySelectorAll('input[name="jurusan"]').forEach(r => r.checked = false);

        // Reset hidden input kelas & jurusan
        if (hiddenKelas) hiddenKelas.value = '';
        if (hiddenJurusan) hiddenJurusan.value = '';

        // Sembunyikan wrapper kelas & jurusan (karena default Guru)
        wrapperKelasJurusan.classList.add('hidden');

        // Kembalikan semua password input ke type="password" & reset ikon toggle
        formRegister.querySelectorAll('input[type="text"]').forEach(input => {
            // Kalau ini adalah input password yang sedang di-show, kembalikan
            if (['reg_password', 'reg_password_confirm'].includes(input.id)) {
                input.type = 'password';
                const btn = document.querySelector(`[data-toggle-pw="${input.id}"]`);
                if (btn) {
                    btn.querySelector('.icon-eye')?.classList.remove('hidden');
                    btn.querySelector('.icon-eye-off')?.classList.add('hidden');
                }
            }
        });

        // Sembunyikan error box
        const errBox = document.getElementById('reg-error-box');
        const errText = document.getElementById('reg-error-text');
        if (errBox) errBox.classList.add('hidden');
        if (errText) errText.textContent = '';

        // Hapus border merah dari konfirmasi password jika ada
        const pwConfInput = document.getElementById('reg_password_confirm');
        if (pwConfInput) {
            pwConfInput.classList.remove('border-red-400', 'ring-2', 'ring-red-200');
        }
    };

    // =======================================================
    // 10. FORM REGISTER — VALIDASI & SUBMIT
    // =======================================================
    const formRegister = document.getElementById('form-register');
    const errBox = document.getElementById('reg-error-box');
    const errText = document.getElementById('reg-error-text');

    const showError = (msg) => {
        errText.textContent = msg;
        errBox.classList.remove('hidden');
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
        const nama = document.getElementById('reg_name').value.trim();

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

        // Ambil value password langsung dari elemen (fresh, anti-stale)
        const pwInput = document.getElementById('reg_password');
        const pwConfInput = document.getElementById('reg_password_confirm');
        const pwVal = pwInput.value;
        const pwConfVal = pwConfInput.value;

        if (pwVal.length < 8) {
            showError('Password harus minimal 8 karakter!');
            pwInput.focus();
            return;
        }

        if (pwVal !== pwConfVal) {
            showError('Password dan Konfirmasi Password tidak sama!');
            pwConfInput.focus();
            pwConfInput.classList.add('border-red-400', 'ring-2', 'ring-red-200');
            pwConfInput.addEventListener('input', function handler() {
                pwConfInput.classList.remove('border-red-400', 'ring-2', 'ring-red-200');
                pwConfInput.removeEventListener('input', handler);
            });
            return;
        }

        // ── Semua validasi lolos ──────────────────────────────────
        // Isi konten success view dengan data yang diinput
        const successNama = document.getElementById('success-nama');
        const successRoleText = document.getElementById('success-role-text');

        if (successNama) successNama.textContent = nama || '—';

        if (successRoleText) {
            const kelasChecked = document.querySelector('input[name="kelas"]:checked')?.value ?? '';
            const jurusanChecked = document.querySelector('input[name="jurusan"]:checked')?.value ?? '';

            if (role === 'siswa' && kelasChecked && jurusanChecked) {
                successRoleText.textContent = `Siswa · Kelas ${kelasChecked} ${jurusanChecked}`;
            } else if (role === 'siswa') {
                successRoleText.textContent = 'Siswa';
            } else {
                successRoleText.textContent = 'Guru BK';
            }
        }

        // Reset form SEBELUM tampil success (data sudah dicapture di atas)
        resetRegisterForm();

        // Tampilkan panel sukses
        showView(viewRegisterSuccess);

        // Re-init Lucide supaya icon di success view ke-render
        lucide.createIcons();

        // formRegister.submit(); // Buka komentar jika route sudah siap
    });

    // =======================================================
    // 11. LOGIN FORM — Redirect ke Dashboard
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