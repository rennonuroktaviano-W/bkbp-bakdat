{{-- ==========================================================
     COMPONENT: Topbar Dashboard
     ========================================================== --}}
<header class="sticky top-0 z-20 bg-white/80 backdrop-blur-xl border-b border-forest-100">
    <div class="flex items-center justify-between h-20 px-6 lg:px-8">
        <div class="flex items-center gap-3">
            <button id="btn-open-sidebar"
                class="lg:hidden h-10 w-10 rounded-xl border border-forest-200 flex items-center justify-center text-forest-700 shrink-0">
                <i data-lucide="menu" class="h-5 w-5"></i>
            </button>
            <div>
                <h1 class="font-display font-bold text-forest-950 text-lg">Halo, Bu Ratna 👋</h1>
                <p class="text-forest-500 text-xs font-body">Berikut ringkasan aktivitas hari ini</p>
            </div>
        </div>

        <div class="flex items-center gap-3">
            <button class="relative h-10 w-10 rounded-full bg-forest-100 flex items-center justify-center text-forest-700">
                <i data-lucide="bell" class="h-4 w-4"></i>
                <span class="absolute top-2 right-2 h-2 w-2 rounded-full bg-sun-400"></span>
            </button>
            <div
                class="h-10 w-10 rounded-full bg-forest-800 flex items-center justify-center text-white font-display font-bold text-sm">
                BR
            </div>
        </div>
    </div>
</header>
