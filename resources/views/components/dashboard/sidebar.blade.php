{{-- ==========================================================
     COMPONENT: Sidebar Dashboard — Enhanced
     ========================================================== --}}

{{-- Inline style untuk efek sidebar --}}
<style>
#dashboard-sidebar {
    background: linear-gradient(180deg, #0c2218 0%, #071510 55%, #051209 100%);
    border-right: 1px solid rgba(52, 211, 153, 0.08);
}

/* Ambient glow blob atas */
#dashboard-sidebar::before {
    content: '';
    position: absolute;
    top: -50px;
    left: -50px;
    width: 200px;
    height: 200px;
    background: radial-gradient(circle, rgba(16, 185, 129, 0.14) 0%, transparent 70%);
    border-radius: 50%;
    pointer-events: none;
    animation: sidebarBlob1 9s ease-in-out infinite;
}

/* Ambient glow blob bawah */
#dashboard-sidebar::after {
    content: '';
    position: absolute;
    bottom: 60px;
    right: -30px;
    width: 160px;
    height: 160px;
    background: radial-gradient(circle, rgba(5, 150, 105, 0.10) 0%, transparent 70%);
    border-radius: 50%;
    pointer-events: none;
    animation: sidebarBlob2 11s ease-in-out infinite;
}

@keyframes sidebarBlob1 {

    0%,
    100% {
        transform: translate(0, 0) scale(1);
    }

    50% {
        transform: translate(18px, 28px) scale(1.1);
    }
}

@keyframes sidebarBlob2 {

    0%,
    100% {
        transform: translate(0, 0) scale(1);
    }

    50% {
        transform: translate(-12px, -18px) scale(1.08);
    }
}

/* Aktif nav: glow bar kiri */
.sidebar-nav-active {
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.18), rgba(5, 150, 105, 0.10)) !important;
    border: 1px solid rgba(52, 211, 153, 0.22) !important;
    color: #ecfdf5 !important;
    box-shadow: 0 0 16px rgba(16, 185, 129, 0.10), inset 0 1px 0 rgba(255, 255, 255, 0.04);
    position: relative;
}

.sidebar-nav-active::before {
    content: '';
    position: absolute;
    left: -16px;
    top: 50%;
    transform: translateY(-50%);
    width: 3px;
    height: 18px;
    border-radius: 0 3px 3px 0;
    background: linear-gradient(180deg, #10b981, #059669);
    box-shadow: 0 0 8px rgba(16, 185, 129, 0.55);
}

/* Hover nav */
.sidebar-nav-item:hover {
    background: rgba(16, 185, 129, 0.07) !important;
    border-color: rgba(52, 211, 153, 0.10) !important;
    color: #d1fae5 !important;
    transform: translateX(2px);
}

.sidebar-nav-item {
    border: 1px solid transparent;
    transition: all 0.18s ease;
}

/* Logo icon glow */
.sidebar-logo-icon {
    background: linear-gradient(135deg, #059669, #10b981);
    box-shadow: 0 0 18px rgba(16, 185, 129, 0.38), 0 4px 10px rgba(0, 0, 0, 0.28);
}

/* Divider shimmer */
.sidebar-divider {
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(52, 211, 153, 0.18), transparent);
}

/* Avatar ring */
.sidebar-user-avatar-ring {
    outline: 2px solid rgba(16, 185, 129, 0.5);
    outline-offset: 2px;
}

/* Logout hover */
.sidebar-logout:hover {
    background: rgba(239, 68, 68, 0.08) !important;
    border-color: rgba(239, 68, 68, 0.15) !important;
    color: #fca5a5 !important;
}

.sidebar-logout {
    border: 1px solid transparent;
    transition: all 0.18s ease;
    color: rgba(252, 165, 165, 0.65);
}
</style>

<aside id="dashboard-sidebar"
    class="fixed inset-y-0 left-0 z-40 w-64 flex flex-col transform -translate-x-full transition-transform duration-300 lg:translate-x-0 overflow-hidden">

    {{-- Logo --}}
    <div class="flex items-center gap-3 h-20 px-5 shrink-0" style="border-bottom: 1px solid rgba(52,211,153,0.07);">
        <span class="sidebar-logo-icon h-9 w-9 rounded-xl flex items-center justify-center shrink-0">
            <i data-lucide="leaf" class="h-4 w-4 text-white"></i>
        </span>
        <div>
            <span class="font-display font-bold text-white text-sm leading-tight block">BK/BP Application</span>
            <span class="text-[9px] font-semibold tracking-widest" style="color: rgba(52,211,153,0.45);">BIMBINGAN
                KONSELING</span>
        </div>
    </div>

    {{-- Nav --}}
    <nav class="flex-1 px-3 py-5 space-y-1 overflow-y-auto relative z-10">
        @php
        $navs = [
        ['icon' => 'layout-dashboard', 'label' => 'Dashboard', 'route' => 'dashboard'],
        ['icon' => 'users', 'label' => 'Data Siswa', 'route' => 'siswa.index'],
        ['icon' => 'calendar-check', 'label' => 'Absensi', 'route' => 'absensi.index'],
        ['icon' => 'alert-triangle', 'label' => 'Point Pelanggaran', 'route' => 'pelanggaran.index'],
        ['icon' => 'message-circle-heart', 'label' => 'Konseling', 'route' => 'konseling.index'],
        ['icon' => 'file-text', 'label' => 'Laporan', 'route' => 'laporan.index'],
        ];
        @endphp

        <p class="text-[9px] font-bold tracking-widest px-3 pb-1" style="color: rgba(52,211,153,0.32);">MENU UTAMA</p>

        @foreach ($navs as $nav)
        <a href="{{ route($nav['route']) }}" class="sidebar-nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-body
            {{ request()->routeIs($nav['route']) ? 'sidebar-nav-active' : '' }}"
            style="{{ request()->routeIs($nav['route']) ? '' : 'color: rgba(167,243,208,0.6);' }}">
            <i data-lucide="{{ $nav['icon'] }}" class="h-4 w-4 shrink-0"></i>
            {{ $nav['label'] }}
        </a>
        @endforeach

        <div class="sidebar-divider my-3"></div>
        <p class="text-[9px] font-bold tracking-widest px-3 pb-1" style="color: rgba(52,211,153,0.32);">SISTEM</p>

        <a href="{{ route('pengaturan.index') }}" class="sidebar-nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-body
            {{ request()->routeIs('pengaturan.index') ? 'sidebar-nav-active' : '' }}"
            style="{{ request()->routeIs('pengaturan.index') ? '' : 'color: rgba(167,243,208,0.6);' }}">
            <i data-lucide="settings" class="h-4 w-4 shrink-0"></i>
            Pengaturan
        </a>
    </nav>

    {{-- Footer: user info + logout --}}
    <div class="px-3 py-4 relative z-10" style="border-top: 1px solid rgba(52,211,153,0.07);">
        {{-- Mini user card --}}
        <a href="{{ route('pengaturan.index') }}"
            class="sidebar-nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl mb-1"
            style="color: rgba(167,243,208,0.7);">
            <img id="sidebar-avatar-img"
                src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name=Bu+Ratna&background=065f46&color=fff&size=80' }}"
                alt="Avatar" class="sidebar-user-avatar-ring h-7 w-7 rounded-full object-cover shrink-0">
            <div class="min-w-0">
                <p id="sidebar-user-name" class="text-xs font-semibold text-emerald-100 truncate leading-tight">
                    {{ auth()->user()->name ?? 'Bu Ratna, S.Pd' }}
                </p>
                <p class="text-[10px]" style="color: rgba(52,211,153,0.45);">Guru BK</p>
            </div>
        </a>

        {{-- Logout --}}
        <a href="{{ url('/') }}"
            class="sidebar-logout flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-body">
            <i data-lucide="log-out" class="h-4 w-4 shrink-0"></i>
            Keluar
        </a>
    </div>
</aside>

<div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-30 hidden lg:hidden"></div>