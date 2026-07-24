{{-- ==========================================================
     COMPONENT: Section Statistik
     ========================================================== --}}
    <section id="statistik" class="relative py-24 sm:py-32 bg-gradient-to-b from-forest-50 to-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            <div class="text-center max-w-2xl mx-auto mb-16 reveal">
                <span class="text-xs font-bold tracking-widest text-forest-600 uppercase font-body">Statistik</span>
                <h2 class="font-display font-bold text-3xl sm:text-4xl text-forest-950 mt-3">
                    Dipercaya untuk Data yang Nyata
                </h2>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 reveal">
                @foreach ([
                ['target' => 1500, 'suffix' => '+', 'label' => 'Data Siswa', 'icon' => 'users'],
                ['target' => 350, 'suffix' => '+', 'label' => 'Data Konseling', 'icon' => 'message-circle-heart'],
                ['target' => 5000, 'suffix' => '+', 'label' => 'Riwayat Pelanggaran', 'icon' => 'folder-clock'],
                ['target' => 35, 'suffix' => '', 'label' => 'Guru BK', 'icon' => 'graduation-cap'],
                ] as $stat)
                <div
                    class="text-center rounded-3xl bg-white border border-forest-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-500 p-6 sm:p-8">
                    <div class="h-12 w-12 rounded-2xl bg-forest-100 flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="{{ $stat['icon'] }}" class="h-5 w-5 text-forest-700"></i>
                    </div>
                    <p class="font-display font-extrabold text-3xl sm:text-4xl text-forest-900">
                        <span class="counter" data-target="{{ $stat['target'] }}">0</span>{{ $stat['suffix'] }}
                    </p>
                    <p class="text-xs sm:text-sm text-forest-600 mt-2 font-body">{{ $stat['label'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
