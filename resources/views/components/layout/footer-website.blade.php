{{-- ==========================================================
     COMPONENT: Footer
     ========================================================== --}}
    <footer class="relative bg-forest-950 text-forest-200 pt-20 pb-8 overflow-hidden">
        <div class="absolute inset-0 leaf-vein-pattern opacity-10"></div>
        <div class="max-w-7xl mx-auto px-6 lg:px-10 relative">
            <div class="flex flex-col items-center text-center">
                <div class="flex items-center gap-3 mb-5">
                    <span class="h-11 w-11 rounded-2xl bg-forest-700 flex items-center justify-center">
                        <i data-lucide="leaf" class="h-5 w-5 text-forest-100"></i>
                    </span>
                    <span class="font-display font-bold text-xl text-white">BK/BP Application</span>
                </div>
                <p class="max-w-md text-sm text-forest-300/90 leading-relaxed font-body">
                    Sistem Informasi Bimbingan Konseling & Bimbingan Penyuluhan — membantu sekolah membina siswa secara
                    digital, modern, dan berkelanjutan.
                </p>

                <div class="w-full h-px bg-forest-800 my-8"></div>

                <p class="text-xs text-forest-400 font-body">
                    &copy; {{ date('Y') }} BK/BP Application. Seluruh hak cipta dilindungi.
                </p>

                <div class="flex items-center gap-2 mt-4 text-forest-300">
                    <i data-lucide="globe" class="h-4 w-4"></i>
                    <span class="text-xs font-semibold tracking-wide font-body">Official Website SMK Bakti Idhata</span>
                </div>
            </div>
        </div>
    </footer>
