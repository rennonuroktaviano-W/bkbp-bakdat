<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BK/BP Application — Sistem Informasi Bimbingan Konseling SMK Bakti Idhata</title>
    <meta name="description"
        content="Sistem Informasi BK/BP SMK Bakti Idhata — kelola absensi, konseling, dan pembinaan siswa secara digital.">

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts: Sora (display) + Inter (body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    <x-config-warna-font />
    <x-style-tambahan />
</head>

<body class="antialiased text-forest-950 bg-mist selection:bg-forest-200 selection:text-forest-900">

    <x-layout.navbar-menu-atas />

    <x-sections.banner-utama />

    <x-sections.tentang-sistem />

    <x-sections.fitur-unggulan />

    <x-sections.cara-kerja />

    <x-sections.preview-dashboard />

    <x-sections.statistik />

    <x-layout.footer-website />

    <x-script-javascript />
</body>

</html>