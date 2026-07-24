{{-- ==========================================================
     COMPONENT: Section Dashboard Preview
     ========================================================== --}}
    <section id="dashboard" class="relative py-24 sm:py-32 bg-forest-950 overflow-hidden">
        <div class="absolute inset-0 leaf-vein-pattern opacity-20"></div>
        <div class="absolute top-0 right-0 h-96 w-96 rounded-full bg-forest-700/30 blur-3xl animate-blob-slow"></div>

        <div class="max-w-7xl mx-auto px-6 lg:px-10 relative">
            <div class="text-center max-w-2xl mx-auto mb-16 reveal">
                <span class="text-xs font-bold tracking-widest text-forest-300 uppercase font-body">Dashboard
                    Preview</span>
                <h2 class="font-display font-bold text-3xl sm:text-4xl text-white mt-3">
                    Satu Dashboard, Semua Terlihat
                </h2>
                <p class="text-forest-200/80 mt-4 font-body">
                    Pratinjau antarmuka dashboard Guru BK — dirancang bersih, informatif, dan mudah dipahami.
                </p>
            </div>

            <div
                class="reveal rounded-3xl border border-forest-800 bg-forest-900/60 backdrop-blur-xl shadow-2xl overflow-hidden">
                <div class="grid lg:grid-cols-[240px_1fr]">

                    {{-- Sidebar --}}
                    <aside class="bg-forest-950/80 border-r border-forest-800 p-5 hidden lg:block">
                        <div class="flex items-center gap-2.5 mb-8 px-1">
                            <span class="h-8 w-8 rounded-xl bg-forest-700 flex items-center justify-center">
                                <i data-lucide="leaf" class="h-4 w-4 text-forest-100"></i>
                            </span>
                            <span class="font-display font-bold text-white text-sm">BK/BP</span>
                        </div>
                        <nav class="space-y-1.5">
                            @foreach ([
                            ['icon' => 'layout-dashboard', 'label' => 'Dashboard', 'active' => true],
                            ['icon' => 'users', 'label' => 'Data Siswa'],
                            ['icon' => 'calendar-check', 'label' => 'Absensi'],
                            ['icon' => 'alert-triangle', 'label' => 'Point Pelanggaran'],
                            ['icon' => 'message-circle-heart', 'label' => 'Konseling'],
                            ['icon' => 'file-text', 'label' => 'Laporan'],
                            ['icon' => 'settings', 'label' => 'Pengaturan'],
                            ] as $nav)
                            <div
                                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-body {{ $nav['active'] ?? false ? 'bg-forest-700 text-white' : 'text-forest-300 hover:bg-forest-800/60' }} transition-colors cursor-pointer">
                                <i data-lucide="{{ $nav['icon'] }}" class="h-4 w-4"></i>
                                {{ $nav['label'] }}
                            </div>
                            @endforeach
                        </nav>
                    </aside>

                    {{-- Konten dashboard --}}
                    <div class="p-6 lg:p-8">
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h3 class="font-display font-bold text-white text-lg">Halo, Bu Ratna 👋</h3>
                                <p class="text-forest-300 text-xs font-body">Berikut ringkasan aktivitas hari ini</p>
                            </div>
                            <div class="h-10 w-10 rounded-full bg-forest-700 flex items-center justify-center">
                                <i data-lucide="bell" class="h-4 w-4 text-forest-100"></i>
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-3 gap-4 mb-6">
                            @foreach ([
                            ['icon' => 'user-check', 'label' => 'Hadir Hari Ini', 'value' => '842'],
                            ['icon' => 'message-circle-heart', 'label' => 'Sesi Konseling', 'value' => '12'],
                            ['icon' => 'alert-triangle', 'label' => 'Pelanggaran Baru', 'value' => '5'],
                            ] as $stat)
                            <div class="rounded-2xl bg-forest-800/60 border border-forest-700 p-4">
                                <i data-lucide="{{ $stat['icon'] }}" class="h-5 w-5 text-forest-300 mb-3"></i>
                                <p class="font-display font-bold text-2xl text-white">{{ $stat['value'] }}</p>
                                <p class="text-xs text-forest-300 font-body">{{ $stat['label'] }}</p>
                            </div>
                            @endforeach
                        </div>

                        <div class="grid lg:grid-cols-3 gap-4">
                            <div class="lg:col-span-2 rounded-2xl bg-forest-800/60 border border-forest-700 p-5">
                                <p class="text-sm font-semibold text-white mb-4 font-body">Tren Pelanggaran Mingguan</p>
                                <div class="flex items-end gap-2 h-32">
                                    @foreach ([55, 30, 70, 45, 90, 60, 40] as $bar)
                                    <div class="flex-1 rounded-t-lg bg-gradient-to-t from-forest-500 to-sun-400/80"
                                        style="height: {{ $bar }}%"></div>
                                    @endforeach
                                </div>
                                <div class="flex justify-between mt-2 text-[10px] text-forest-400 font-body">
                                    <span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span><span>Min</span>
                                </div>
                            </div>

                            <div class="rounded-2xl bg-forest-800/60 border border-forest-700 p-5">
                                <p class="text-sm font-semibold text-white mb-3 font-body">Kalender</p>
                                <div
                                    class="grid grid-cols-7 gap-1 text-[10px] text-center text-forest-400 mb-1 font-body">
                                    <span>S</span><span>S</span><span>R</span><span>K</span><span>J</span><span>S</span><span>M</span>
                                </div>
                                <div class="grid grid-cols-7 gap-1">
                                    @for ($d = 1; $d <= 21; $d++) <span
                                        class="h-5 w-5 flex items-center justify-center rounded-md text-[10px] font-body {{ $d == 14 ? 'bg-sun-400 text-forest-900 font-bold' : 'text-forest-300' }}">
                                        {{ $d }}</span>
                                        @endfor
                                </div>
                            </div>
                        </div>

                        <div class="grid lg:grid-cols-3 gap-4 mt-4">
                            <div
                                class="lg:col-span-2 rounded-2xl bg-forest-800/60 border border-forest-700 p-5 overflow-x-auto">
                                <p class="text-sm font-semibold text-white mb-4 font-body">Data Siswa Terbaru</p>
                                <table class="w-full text-xs text-left font-body">
                                    <thead>
                                        <tr class="text-forest-400 border-b border-forest-700">
                                            <th class="pb-2 pr-4 font-medium">Nama</th>
                                            <th class="pb-2 pr-4 font-medium">Kelas</th>
                                            <th class="pb-2 font-medium">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-forest-200">
                                        @foreach ([
                                        ['name' => 'Budi Santoso', 'kelas' => 'XII RPL 1', 'status' => 'Hadir', 'color'
                                        => 'text-forest-400'],
                                        ['name' => 'Nadia Putri', 'kelas' => 'XI TKJ 2', 'status' => 'Izin', 'color' =>
                                        'text-sun-400'],
                                        ['name' => 'Rangga Aji', 'kelas' => 'X MM 1', 'status' => 'Alpha', 'color' =>
                                        'text-red-400'],
                                        ] as $row)
                                        <tr class="border-b border-forest-800/60">
                                            <td class="py-2 pr-4">{{ $row['name'] }}</td>
                                            <td class="py-2 pr-4">{{ $row['kelas'] }}</td>
                                            <td class="py-2 {{ $row['color'] }} font-semibold">{{ $row['status'] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="rounded-2xl bg-forest-800/60 border border-forest-700 p-5">
                                <p class="text-sm font-semibold text-white mb-4 font-body">Aktivitas Terbaru</p>
                                <div class="space-y-3.5">
                                    @foreach ([
                                    ['icon' => 'message-circle-heart', 'text' => 'Sesi konseling selesai'],
                                    ['icon' => 'file-text', 'text' => 'Surat panggilan dibuat'],
                                    ['icon' => 'calendar-check', 'text' => 'Absensi diperbarui'],
                                    ] as $act)
                                    <div class="flex items-start gap-2.5">
                                        <span
                                            class="h-7 w-7 rounded-lg bg-forest-700 flex items-center justify-center shrink-0">
                                            <i data-lucide="{{ $act['icon'] }}" class="h-3.5 w-3.5 text-forest-200"></i>
                                        </span>
                                        <p class="text-xs text-forest-200 pt-1 font-body">{{ $act['text'] }}</p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
