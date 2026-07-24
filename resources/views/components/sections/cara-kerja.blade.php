{{-- ==========================================================
     COMPONENT: Section Cara Kerja
     ========================================================== --}}
    <section id="cara-kerja" class="relative py-24 sm:py-32 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            <div class="text-center max-w-2xl mx-auto mb-20 reveal">
                <span class="text-xs font-bold tracking-widest text-forest-600 uppercase font-body">Cara Kerja</span>
                <h2 class="font-display font-bold text-3xl sm:text-4xl text-forest-950 mt-3">
                    Alur Sederhana, Hasil Maksimal
                </h2>
            </div>

            <div class="relative reveal">
                <div class="hidden lg:block absolute top-8 left-0 right-0 h-0.5 timeline-line rounded-full"></div>

                <div class="grid lg:grid-cols-5 gap-10 lg:gap-6">
                    @foreach ([
                    ['icon' => 'log-in', 'title' => 'Guru Login', 'desc' => 'Masuk ke sistem menggunakan akun resmi guru
                    BK.'],
                    ['icon' => 'users', 'title' => 'Pilih Data Siswa', 'desc' => 'Cari dan pilih siswa yang akan
                    ditindaklanjuti.'],
                    ['icon' => 'clipboard-edit', 'title' => 'Input Pelanggaran', 'desc' => 'Catat kejadian, poin, atau
                    alasan ketidakhadiran.'],
                    ['icon' => 'database', 'title' => 'Data Tersimpan', 'desc' => 'Seluruh data otomatis tersimpan aman
                    di sistem.'],
                    ['icon' => 'file-check-2', 'title' => 'Laporan Otomatis', 'desc' => 'Rekap dan laporan tersedia siap
                    unduh kapan saja.'],
                    ] as $i => $step)
                    <div class="relative flex flex-col items-center text-center group">
                        <div
                            class="relative z-10 h-16 w-16 rounded-2xl bg-white border-2 border-forest-200 group-hover:border-forest-600 flex items-center justify-center shadow-md shadow-forest-900/5 group-hover:shadow-lg transition-all duration-400 group-hover:-translate-y-1">
                            <i data-lucide="{{ $step['icon'] }}" class="h-6 w-6 text-forest-700"></i>
                        </div>
                        <span class="mt-4 text-xs font-bold text-forest-400 font-body">LANGKAH {{ $i + 1 }}</span>
                        <h3 class="font-display font-semibold text-base text-forest-950 mt-1">{{ $step['title'] }}</h3>
                        <p class="text-xs text-forest-600/80 mt-2 max-w-[11rem] font-body">{{ $step['desc'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
