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
        const duration = 1800; // ms
        const startTime = performance.now();

        const step = (now) => {
            const progress = Math.min((now - startTime) / duration, 1);
            const eased = 1 - (1 - progress) * (1 - progress);
            el.textContent = Math.floor(eased * target).toLocaleString('id-ID');
            if (progress < 1) {
                requestAnimationFrame(step);
            } else {
                el.textContent = target.toLocaleString('id-ID');
            }
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
    // 6. LOGIC AUTH (LOGIN & REGISTER TOGGLE)
    // =======================================================
    const viewLogin = document.getElementById('view-login');
    const viewRegister = document.getElementById('view-register');
    const btnShowRegister = document.getElementById('btn-show-register');
    const btnShowLogin = document.getElementById('btn-show-login');

    // Fungsi Switch Animasi Fade Smooth (versi grid, tanpa hidden/display:none)
    const switchAuthView = (hideElement, showElement) => {
        hideElement.classList.remove('opacity-100');
        hideElement.classList.add('opacity-0', 'pointer-events-none');

        showElement.classList.remove('opacity-0', 'pointer-events-none');
        showElement.classList.add('opacity-100');
    };

    btnShowRegister.addEventListener('click', () => switchAuthView(viewLogin, viewRegister));
    btnShowLogin.addEventListener('click', () => switchAuthView(viewRegister, viewLogin));

    // =======================================================
    // 7. FORM REGISTER LOGIC & VALIDATION
    // =======================================================
    const roleInputs = document.querySelectorAll('input[name="role"]');
    const wrapperKelas = document.getElementById('wrapper-kelas');
    const inputKelas = document.getElementById('reg_kelas');

    // Handle Tampil/Sembunyi Form Kelas Berdasarkan Role
    roleInputs.forEach(input => {
        input.addEventListener('change', (e) => {
            if (e.target.value === 'siswa') {
                wrapperKelas.classList.remove('hidden');
                inputKelas.setAttribute('required', 'required');
            } else {
                wrapperKelas.classList.add('hidden');
                inputKelas.removeAttribute('required');
                inputKelas.value = ''; // Reset form saat disembunyikan
            }
        });
    });

    // Validation Custom Submit
    const formRegister = document.getElementById('form-register');
    const errBox = document.getElementById('reg-error-box');
    const errText = document.getElementById('reg-error-text');

    formRegister.addEventListener('submit', function(e) {
        e.preventDefault(); // Mencegah reload halaman

        // Reset error
        errBox.classList.add('hidden');
        errText.textContent = '';

        const pwd = document.getElementById('reg_password').value;
        const pwdConfirm = document.getElementById('reg_password_confirm').value;

        // Cek minimum karakter password
        if (pwd.length < 8) {
            errText.textContent = 'Password harus minimal 8 karakter!';
            errBox.classList.remove('hidden');
            return;
        }

        // Cek kesamaan password
        if (pwd !== pwdConfirm) {
            errText.textContent = 'Password dan Konfirmasi Password tidak sama!';
            errBox.classList.remove('hidden');
            return;
        }

        // Jika semua lolos validasi, eksekusi pendaftaran (simulasi)
        alert('Validasi Frontend Sukses! Formulir siap dikirim ke backend.');
        // formRegister.submit(); // Buka komentar baris ini untuk submit beneran jika route sudah siap
    });
    btnShowRegister.addEventListener('click', () => switchAuthView(viewLogin, viewRegister));
    btnShowLogin.addEventListener('click', () => switchAuthView(viewRegister, viewLogin));

    // Redirect ke Dashboard setelah Login / Register berhasil
    document.querySelector('#view-login form').addEventListener('submit', function(e) {
        e.preventDefault();
        if (this.checkValidity()) {
            window.location.href = "{{ url('/dashboard') }}";
        }
    });
});
</script>