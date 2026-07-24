{{-- ==========================================================
     COMPONENT: Sidebar Dashboard
     ========================================================== --}}
<aside id="dashboard-sidebar"
    class="fixed inset-y-0 left-0 z-40 w-64 bg-forest-950 border-r border-forest-800 flex flex-col transform -translate-x-full transition-transform duration-300 lg:translate-x-0">

    <div class="flex items-center gap-2.5 h-20 px-6 border-b border-forest-800 shrink-0">
        <span class="h-9 w-9 rounded-xl bg-forest-700 flex items-center justify-center">
            <i data-lucide="leaf" class="h-4 w-4 text-forest-100"></i>
        </span>
        <span class="font-display font-bold text-white text-base">BK/BP Application</span>
    </div>

    <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
        @php
        $navs = [
        ['icon' => 'layout-dashboard', 'label' => 'Dashboard', 'route' => 'dashboard'],
        ['icon' => 'users', 'label' => 'Data Siswa', 'route' => 'siswa.index'],
        ['icon' => 'calendar-check', 'label' => 'Absensi', 'route' => 'absensi.index'],
        ['icon' => 'alert-triangle', 'label' => 'Point Pelanggaran', 'route' => 'pelanggaran.index'],
        ['icon' => 'message-circle-heart', 'label' => 'Konseling', 'route' => 'konseling.index'],
        ['icon' => 'file-text', 'label' => 'Laporan', 'route' => 'laporan.index'],
        ['icon' => 'settings', 'label' => 'Pengaturan', 'route' => 'pengaturan.index'],
        ];
        @endphp

        @foreach ($navs as $nav)
        <a href="{{ route($nav['route']) }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-body transition-colors
        {{ request()->routeIs($nav['route']) ? 'bg-forest-700 text-white' : 'text-forest-300 hover:bg-forest-800/60' }}">
            <i data-lucide="{{ $nav['icon'] }}" class="h-4 w-4"></i>
            {{ $nav['label'] }}
        </a>
        @endforeach
    </nav>

    <div class="px-4 py-5 border-t border-forest-800 shrink-0">
        <a href="{{ url('/') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-body text-forest-300 hover:bg-forest-800/60 hover:text-white transition-colors">
            <i data-lucide="log-out" class="h-4 w-4"></i>
            Keluar
        </a>
    </div>
</aside>

<div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-30 hidden lg:hidden"></div>