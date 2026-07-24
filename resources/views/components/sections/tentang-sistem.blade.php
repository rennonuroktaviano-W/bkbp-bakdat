{{-- ==========================================================
     COMPONENT: Section Tentang Sistem
     ========================================================== --}}
    <section id="tentang" class="relative py-24 sm:py-32 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="reveal order-2 lg:order-1">
                    <div class="relative">
                        <div class="absolute -top-6 -left-6 h-40 w-40 rounded-3xl bg-forest-100 -z-10"></div>
                        <div
                            class="rounded-3xl border border-forest-100 bg-gradient-to-br from-forest-50 to-white shadow-xl shadow-forest-900/5 p-6">
                            <div class="flex items-center gap-2 mb-5">
                                <span class="h-3 w-3 rounded-full bg-forest-300"></span>
                                <span class="h-3 w-3 rounded-full bg-sun-400"></span>
                                <span class="h-3 w-3 rounded-full bg-forest-500"></span>
                            </div>
                            <div class="grid grid-cols-3 gap-4">
                                <div class="col-span-2 rounded-2xl bg-white border border-forest-100 p-4 shadow-sm">
                                    <p class="text-xs text-forest-500 mb-2 font-body">Aktivitas Bulan Ini</p>
                                    <div class="flex items-end gap-1.5 h-24">
                                        @foreach ([40, 65, 50, 80, 60, 95, 70] as $h)
                                        <div class="flex-1 rounded-t-md bg-gradient-to-t from-forest-600 to-forest-300"
                                            style="height: {{ $h }}%"></div>
                                        @endforeach
                                    </div>
                                </div>
                                <div
                                    class="rounded-2xl bg-forest-800 p-4 text-white shadow-sm flex flex-col justify-between">
                                    <i data-lucide="user-check" class="h-5 w-5 text-forest-200"></i>
                                    <div>
                                        <p class="text-2xl font-display font-bold">96%</p>
                                        <p class="text-[11px] text-forest-200 font-body">Kehadiran</p>
                                    </div>
                                </div>
                                <div
                                    class="col-span-3 rounded-2xl bg-white border border-forest-100 p-4 shadow-sm space-y-2.5">
                                    @foreach ([
                                    ['name' => 'Ahmad R.', 'note' => 'Izin - Sakit', 'color' => 'bg-sun-400'],
                                    ['name' => 'Siti M.', 'note' => 'Konseling Rutin', 'color' => 'bg-forest-500'],
                                    ] as $row)
                                    <div class="flex items-center gap-3">
                                        <span
                                            class="h-8 w-8 rounded-full {{ $row['color'] }}/20 flex items-center justify-center">
                                            <span class="h-2 w-2 rounded-full {{ $row['color'] }}"></span>
                                        </span>
                                        <div class="flex-1">
                                            <p class="text-xs font-semibold text-forest-800 font-body">
                                                {{ $row['name'] }}</p>
                                            <p class="text-[11px] text-forest-500 font-body">{{ $row['note'] }}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="reveal order-1 lg:order-2">
                    <span class="text-xs font-bold tracking-widest text-forest-600 uppercase font-body">Tentang
                        Sistem</span>
                    <h2 class="font-display font-bold text-3xl sm:text-4xl text-forest-950 mt-3 mb-6 leading-tight">
                        Tentang BK/BP Application
                    </h2>
                    <p class="text-forest-700/90 leading-relaxed mb-6 font-body">
                        BK/BP Application dirancang khusus untuk membantu Guru Bimbingan Konseling dan Bimbingan
                        Penyuluhan di SMK Bakti Idhata dalam mencatat, memantau, dan menindaklanjuti perkembangan
                        perilaku siswa secara terstruktur. Seluruh proses — mulai dari absensi harian, pencatatan
                        pelanggaran, hingga sesi konseling — terekam rapi dalam satu platform yang mudah diakses kapan
                        saja.
                    </p>
                    <p class="text-forest-700/90 leading-relaxed mb-8 font-body">
                        Dengan pendekatan berbasis data, sekolah dapat mengambil keputusan pembinaan yang lebih tepat,
                        cepat, dan berkelanjutan, sejalan dengan semangat sekolah Adiwiyata yang peduli lingkungan dan
                        pertumbuhan siswa secara utuh.
                    </p>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach ([
                        ['icon' => 'zap', 'text' => 'Proses cepat & real-time'],
                        ['icon' => 'lock-keyhole', 'text' => 'Data aman & terenkripsi'],
                        ['icon' => 'smartphone', 'text' => 'Akses multi perangkat'],
                        ['icon' => 'trending-up', 'text' => 'Laporan otomatis'],
                        ] as $point)
                        <div class="flex items-start gap-2.5">
                            <span class="h-8 w-8 shrink-0 rounded-lg bg-forest-100 flex items-center justify-center">
                                <i data-lucide="{{ $point['icon'] }}" class="h-4 w-4 text-forest-700"></i>
                            </span>
                            <p class="text-sm text-forest-800 font-medium pt-1.5 font-body">{{ $point['text'] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
