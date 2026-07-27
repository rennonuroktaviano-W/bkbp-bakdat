{{-- ==========================================================
     COMPONENT: Topbar Dashboard — Enhanced
     ========================================================== --}}

<style>
/* Rotating ring di avatar topbar */
@keyframes topbarRingSpin {
    100% {
        transform: rotate(360deg);
    }
}

.topbar-avatar-ring {
    animation: topbarRingSpin 6s linear infinite;
    border-top-color: #10b981;
}

/* Pulse dot notifikasi */
@keyframes topbarPulseDot {

    0%,
    100% {
        box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.4);
    }

    50% {
        box-shadow: 0 0 0 4px rgba(239, 68, 68, 0);
    }
}

.topbar-notif-dot {
    animation: topbarPulseDot 2s ease-in-out infinite;
}

/* Wave tangan */
@keyframes topbarWave {

    0%,
    60%,
    100% {
        transform: rotate(0deg);
    }

    10%,
    30% {
        transform: rotate(20deg);
    }

    20% {
        transform: rotate(-5deg);
    }
}

.topbar-wave {
    display: inline-block;
    transform-origin: 70% 70%;
    animation: topbarWave 2.5s ease-in-out infinite;
}
</style>

<header class="sticky top-0 z-20 bg-white/90 backdrop-blur-xl border-b border-forest-100"
    style="box-shadow: 0 1px 20px rgba(0,0,0,0.05);">
    <div class="flex items-center justify-between h-16 px-6 lg:px-8">

        {{-- Kiri: tombol sidebar mobile + greeting --}}
        <div class="flex items-center gap-3">
            <button id="btn-open-sidebar"
                class="lg:hidden h-9 w-9 rounded-xl border border-forest-200 flex items-center justify-center text-forest-700 shrink-0 hover:bg-forest-50 transition-colors">
                <i data-lucide="menu" class="h-4 w-4"></i>
            </button>
            <div>
                <h1 class="font-display font-bold text-forest-950 text-base flex items-center gap-1.5">
                    Halo, <span id="topbar-greeting-name">{{ auth()->user()->name ?? 'Bu Ratna' }}</span>
                    <span class="topbar-wave">👋</span>
                </h1>
                <p class="text-forest-500 text-xs font-body">Berikut ringkasan aktivitas hari ini</p>
            </div>
        </div>

        {{-- Kanan: tanggal + notif + avatar --}}
        <div class="flex items-center gap-2.5">

            {{-- Tanggal --}}
            <div
                class="hidden sm:flex items-center gap-1.5 text-xs font-medium text-forest-600 bg-forest-50 border border-forest-100 px-3 py-1.5 rounded-full">
                <i data-lucide="calendar" class="h-3.5 w-3.5 text-forest-400"></i>
                <span id="topbar-date-label"></span>
            </div>

            {{-- Notifikasi --}}
            <button class="relative h-9 w-9 rounded-full flex items-center justify-center text-forest-600
                           bg-forest-50 border border-forest-100 hover:bg-forest-100 hover:shadow-sm transition-all">
                <i data-lucide="bell" class="h-4 w-4"></i>
                <span
                    class="topbar-notif-dot absolute top-1.5 right-1.5 h-2 w-2 rounded-full bg-red-500 border-2 border-white"></span>
            </button>

            {{-- Avatar --}}
            <a href="{{ route('pengaturan.index') }}"
                class="relative h-9 w-9 shrink-0 cursor-pointer hover:scale-105 transition-transform"
                title="Pengaturan Profil">
                {{-- Rotating ring --}}
                <span class="topbar-avatar-ring absolute inset-[-3px] rounded-full border-2 border-transparent"
                    style="border-top-color: #10b981; border-right-color: rgba(16,185,129,0.25);"></span>
                {{-- Avatar image --}}
                <img id="topbar-avatar-img"
                    src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name=Bu+Ratna&background=065f46&color=fff&size=80' }}"
                    alt="Avatar" class="h-9 w-9 rounded-full object-cover border-2 border-emerald-600"
                    style="box-shadow: 0 0 10px rgba(16,185,129,0.2);">
            </a>

        </div>
    </div>
</header>

<script>
(function() {
    // --- Tanggal otomatis ---
    const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
    const d = new Date();
    const dateEl = document.getElementById('topbar-date-label');
    if (dateEl) dateEl.textContent = days[d.getDay()] + ', ' + d.getDate() + ' ' + months[d.getMonth()] + ' ' + d
        .getFullYear();

    // --- Baca localStorage & apply ke topbar + sidebar ---
    // Dijalankan di SETIAP halaman karena topbar di-include semua halaman
    const savedName = localStorage.getItem('bkbp_profile_name');
    const savedAvatar = localStorage.getItem('bkbp_profile_avatar');

    if (savedName) {
        const nameEl = document.getElementById('topbar-greeting-name');
        if (nameEl) nameEl.textContent = savedName;

        const sidebarNameEl = document.getElementById('sidebar-user-name');
        if (sidebarNameEl) sidebarNameEl.textContent = savedName;
    }

    if (savedAvatar) {
        const topbarImg = document.getElementById('topbar-avatar-img');
        const sidebarImg = document.getElementById('sidebar-avatar-img');
        if (topbarImg) topbarImg.src = savedAvatar;
        if (sidebarImg) sidebarImg.src = savedAvatar;
    }
})();
</script>