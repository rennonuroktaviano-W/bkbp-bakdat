{{-- ==========================================================
     COMPONENT: Custom CSS Styles
     ========================================================== --}}
    <style>
    /* ==========================================================
           GLOBAL STYLES
           ========================================================== */
    html {
        font-family: 'Inter', sans-serif;
    }

    .font-display {
        font-family: 'Sora', sans-serif;
    }

    body {
        background-color: #F8FAFC;
        overflow-x: hidden;
    }

    /* Scrollbar kustom */
    ::-webkit-scrollbar {
        width: 10px;
    }

    ::-webkit-scrollbar-track {
        background: #F0FBF4;
    }

    ::-webkit-scrollbar-thumb {
        background: #86EFAC;
        border-radius: 999px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #4ADE80;
    }

    /* Scroll reveal */
    .reveal {
        opacity: 0;
        transform: translateY(28px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }

    .reveal-visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* Navbar transisi glassmorphism saat discroll */
    #navbar {
        transition: background-color 0.4s ease, backdrop-filter 0.4s ease, box-shadow 0.4s ease, border-color 0.4s ease;
    }

    #navbar.navbar-scrolled {
        background-color: rgba(255, 255, 255, 0.72);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        box-shadow: 0 8px 30px -12px rgba(20, 83, 45, 0.18);
        border-bottom: 1px solid rgba(134, 239, 172, 0.4);
    }

    /* Gradient animasi lembut untuk aksen teks/badge */
    .gradient-text-animated {
        background: linear-gradient(90deg, #166534, #22C55E, #FACC15, #22C55E, #166534);
        background-size: 300% auto;
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        animation: gradient-shift 8s ease infinite;
    }

    /* Pattern daun transparan */
    .leaf-vein-pattern {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='240' height='240' viewBox='0 0 240 240'%3E%3Cg fill='none' stroke='%23166534' stroke-width='1' opacity='0.06'%3E%3Cpath d='M20 220 C 60 160, 60 80, 20 20'/%3E%3Cpath d='M20 220 C 40 190, 45 170, 60 150'/%3E%3Cpath d='M20 180 C 40 160, 48 150, 62 138'/%3E%3Cpath d='M20 140 C 38 128, 46 122, 58 112'/%3E%3Cpath d='M20 100 C 36 92, 44 86, 55 78'/%3E%3Cpath d='M20 60  C 34 56, 40 50, 48 42'/%3E%3Ccircle cx='120' cy='120' r='95'/%3E%3C/g%3E%3C/svg%3E");
        background-repeat: repeat;
    }

    /* Ripple button effect container */
    .btn-ripple {
        position: relative;
        overflow: hidden;
    }

    .ripple-span {
        position: absolute;
        border-radius: 9999px;
        background: rgba(255, 255, 255, 0.55);
        pointer-events: none;
        animation: ripple 0.6s linear;
    }

    /* Glass card generik */
    .glass {
        background: rgba(255, 255, 255, 0.55);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.6);
    }

    /* Garis waktu (Cara Kerja) — konektor */
    .timeline-line {
        background: linear-gradient(90deg, #166534, #4ADE80, #FACC15, #4ADE80, #166534);
    }

    /* Focus visible — aksesibilitas */
    a:focus-visible,
    button:focus-visible,
    input:focus-visible {
        outline: 2px solid #16A34A;
        outline-offset: 3px;
    }

    @media (prefers-reduced-motion: reduce) {

        *,
        *::before,
        *::after {
            animation-duration: 0.001ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.001ms !important;
        }
    }
    </style>
