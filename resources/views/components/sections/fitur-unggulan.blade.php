{{-- ==========================================================
     COMPONENT: Section Fitur Unggulan
     ========================================================== --}}
    <section id="fitur" class="relative py-24 sm:py-32 bg-gradient-to-b from-mist to-forest-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            <div class="text-center max-w-2xl mx-auto mb-16 reveal">
                <span class="text-xs font-bold tracking-widest text-forest-600 uppercase font-body">Fitur
                    Unggulan</span>
                <h2 class="font-display font-bold text-3xl sm:text-4xl text-forest-950 mt-3">
                    Semua yang Guru BK Butuhkan
                </h2>
                <p class="text-forest-700/80 mt-4 font-body">
                    Enam pilar utama yang menopang seluruh proses pembinaan siswa secara digital.
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ([
                ['icon' => 'calendar-check-2', 'title' => 'Absensi Digital', 'desc' => 'Catat kehadiran, izin, sakit,
                terlambat, dan alpha siswa secara real-time tanpa kertas.'],
                ['icon' => 'message-circle-heart', 'title' => 'Data Konseling', 'desc' => 'Simpan riwayat sesi konseling
                tiap siswa secara rapi, aman, dan mudah ditelusuri kembali.'],
                ['icon' => 'bar-chart-3', 'title' => 'Statistik Pelanggaran', 'desc' => 'Pantau tren pelanggaran per
                kelas maupun per siswa melalui visualisasi data yang jelas.'],
                ['icon' => 'layout-dashboard', 'title' => 'Dashboard Guru BK', 'desc' => 'Satu layar untuk melihat
                seluruh aktivitas pembinaan yang sedang berjalan hari ini.'],
                ['icon' => 'folder-clock', 'title' => 'Riwayat Pelanggaran', 'desc' => 'Rekam jejak pelanggaran siswa
                tersimpan lengkap dengan poin dan tindak lanjutnya.'],
                ['icon' => 'file-text', 'title' => 'Surat Orang Tua', 'desc' => 'Terbitkan surat pemanggilan orang tua
                secara otomatis dan langsung siap cetak.'],
                ] as $feature)
                <div
                    class="group reveal relative rounded-3xl bg-white border border-forest-100 p-7 hover:border-forest-300 hover:shadow-2xl hover:shadow-forest-900/10 hover:-translate-y-1.5 transition-all duration-500">
                    <div
                        class="absolute inset-0 rounded-3xl bg-gradient-to-br from-forest-400/0 to-forest-400/0 group-hover:from-forest-400/10 group-hover:to-sun-400/10 transition-all duration-500 -z-10">
                    </div>
                    <div
                        class="h-14 w-14 rounded-2xl bg-forest-100 group-hover:bg-forest-800 flex items-center justify-center mb-5 transition-all duration-500 group-hover:scale-110 group-hover:rotate-3">
                        <i data-lucide="{{ $feature['icon'] }}"
                            class="h-6 w-6 text-forest-700 group-hover:text-forest-100 transition-colors duration-500"></i>
                    </div>
                    <h3 class="font-display font-bold text-lg text-forest-950 mb-2">{{ $feature['title'] }}</h3>
                    <p class="text-sm text-forest-700/80 leading-relaxed font-body">{{ $feature['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
