<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi — BK/BP Application</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    <x-config-warna-font />
    <x-style-tambahan />
</head>

<body class="antialiased text-forest-950 bg-mist">

    <x-dashboard.sidebar />

    <div class="lg:pl-64 min-h-screen flex flex-col">

        <x-dashboard.topbar />

        <main class="flex-1 p-6 lg:p-8 space-y-6">

            {{-- Page Header --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h2 class="font-display font-bold text-xl text-forest-950">Rekap Absensi</h2>
                    <p class="text-xs text-forest-500 font-body mt-0.5">Siswa yang tidak masuk hari ini dan hari-hari
                        sebelumnya</p>
                </div>
                <div class="flex items-center gap-2">
                    {{-- Input Tanggal Interaktif (Full Area / Seluruh Shape Bisa di-klik) --}}
                    <div class="relative inline-flex items-center">
                        <div
                            class="relative flex items-center justify-between gap-2.5 px-4 py-2.5 rounded-xl border border-forest-200 text-sm font-body text-forest-700 bg-white shadow-sm hover:bg-forest-50 transition-colors cursor-pointer min-w-[200px]">

                            {{-- Konten Visual (pointer-events-none agar klik tembus ke input date transparan) --}}
                            <div class="flex items-center gap-2.5 pointer-events-none select-none">
                                <i data-lucide="calendar" class="h-4 w-4 text-forest-500 shrink-0"></i>
                                <span class="font-medium">
                                    {{ request('tanggal') ? \Carbon\Carbon::parse(request('tanggal'))->translatedFormat('d F Y') : now()->translatedFormat('d F Y') }}
                                </span>
                            </div>
                            <i data-lucide="chevron-down"
                                class="h-3.5 w-3.5 text-forest-400 shrink-0 pointer-events-none select-none"></i>

                            {{-- Input date transparan mutlak menutup seluruh area kotak shape --}}
                            <input type="date" value="{{ request('tanggal') ?? now()->format('Y-m-d') }}"
                                onchange="window.location.href='?tanggal=' + this.value"
                                class="absolute inset-0 opacity-0 cursor-pointer w-full h-full z-30 m-0 p-0" />
                        </div>
                    </div>

                    {{-- Tombol Cetak PDF dan Langsung Download --}}
                    <a href="{{ route('absensi.cetak-pdf') }}" target="_blank" download
                        class="inline-flex items-center gap-2 bg-forest-800 hover:bg-forest-700 text-white text-sm font-body font-medium px-4 py-2.5 rounded-xl transition-colors shrink-0 shadow-sm">
                        <i data-lucide="printer" class="h-4 w-4"></i>
                        Cetak
                    </a>
                </div>
            </div>

            {{-- Stat Cards hari ini --}}
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                @foreach ([
                ['icon' => 'user-check', 'label' => 'Hadir', 'value' => '0', 'accent' => 'text-forest-600', 'bg' =>
                'bg-forest-50', 'pct' => '0%'],
                ['icon' => 'user-x', 'label' => 'Alpha', 'value' => '0', 'accent' => 'text-red-500', 'bg' =>
                'bg-red-50', 'pct' => '0%'],
                ['icon' => 'file-clock', 'label' => 'Izin', 'value' => '0', 'accent' => 'text-sun-500', 'bg' =>
                'bg-sun-50', 'pct' => '0%'],
                ['icon' => 'thermometer', 'label' => 'Sakit', 'value' => '0', 'accent' => 'text-sky-500', 'bg' =>
                'bg-sky-50', 'pct' => '0%'],
                ] as $stat)
                <div class="rounded-2xl bg-white border border-forest-100 shadow-sm p-4">
                    <div class="flex items-start justify-between mb-3">
                        <span class="inline-flex h-8 w-8 rounded-lg {{ $stat['bg'] }} items-center justify-center">
                            <i data-lucide="{{ $stat['icon'] }}" class="h-4 w-4 {{ $stat['accent'] }}"></i>
                        </span>
                        <span class="text-[11px] text-forest-400 font-body">{{ $stat['pct'] }}</span>
                    </div>
                    <p class="font-display font-bold text-xl text-forest-950">{{ $stat['value'] }}</p>
                    <p class="text-[11px] text-forest-500 font-body mt-0.5">{{ $stat['label'] }}</p>
                </div>
                @endforeach
            </div>

            {{-- Konten Absensi --}}
            <div class="grid lg:grid-cols-3 gap-5">

                {{-- Tabel Utama --}}
                <div class="lg:col-span-2 space-y-4">

                    {{-- Alpha (Kosong, Struktur Fitur Dipertahankan) --}}
                    <div class="rounded-2xl bg-white border border-forest-100 shadow-sm overflow-hidden">
                        <div class="flex items-center justify-between px-5 py-3.5 border-b border-forest-100">
                            <div class="flex items-center gap-2.5">
                                <span class="h-7 w-7 rounded-lg bg-red-50 flex items-center justify-center">
                                    <i data-lucide="user-x" class="h-3.5 w-3.5 text-red-500"></i>
                                </span>
                                <p class="text-sm font-semibold text-forest-900 font-body">Alpha</p>
                            </div>
                            <span
                                class="text-xs font-medium font-body px-2.5 py-0.5 rounded-full bg-red-50 text-red-600">0
                                siswa</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-xs text-left font-body">
                                <thead>
                                    <tr class="bg-red-50/50 text-forest-400">
                                        <th class="px-5 py-2.5 font-medium">Nama</th>
                                        <th class="px-4 py-2.5 font-medium">Kelas</th>
                                        <th class="px-4 py-2.5 font-medium">Ketidakhadiran</th>
                                        <th class="px-4 py-2.5 font-medium">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-forest-50">
                                    @forelse ([] as $s)
                                    {{-- Data Kosong --}}
                                    @empty
                                    <tr>
                                        <td colspan="4" class="px-5 py-8 text-center text-forest-400 italic">Tidak ada
                                            data siswa alpha.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Izin (Kosong, Struktur Fitur Dipertahankan) --}}
                    <div class="rounded-2xl bg-white border border-forest-100 shadow-sm overflow-hidden">
                        <div class="flex items-center justify-between px-5 py-3.5 border-b border-forest-100">
                            <div class="flex items-center gap-2.5">
                                <span class="h-7 w-7 rounded-lg bg-sun-50 flex items-center justify-center">
                                    <i data-lucide="file-clock" class="h-3.5 w-3.5 text-sun-500"></i>
                                </span>
                                <p class="text-sm font-semibold text-forest-900 font-body">Izin</p>
                            </div>
                            <span
                                class="text-xs font-medium font-body px-2.5 py-0.5 rounded-full bg-sun-50 text-sun-600">0
                                siswa</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-xs text-left font-body">
                                <thead>
                                    <tr class="bg-sun-50/40 text-forest-400">
                                        <th class="px-5 py-2.5 font-medium">Nama</th>
                                        <th class="px-4 py-2.5 font-medium">Kelas</th>
                                        <th class="px-4 py-2.5 font-medium">Keterangan</th>
                                        <th class="px-4 py-2.5 font-medium">Surat</th>
                                        <th class="px-4 py-2.5 font-medium">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-forest-50">
                                    @forelse ([] as $s)
                                    {{-- Data Kosong --}}
                                    @empty
                                    <tr>
                                        <td colspan="5" class="px-5 py-8 text-center text-forest-400 italic">Tidak ada
                                            data siswa izin.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Sakit (Kosong, Struktur Fitur Dipertahankan) --}}
                    <div class="rounded-2xl bg-white border border-forest-100 shadow-sm overflow-hidden">
                        <div class="flex items-center justify-between px-5 py-3.5 border-b border-forest-100">
                            <div class="flex items-center gap-2.5">
                                <span class="h-7 w-7 rounded-lg bg-sky-50 flex items-center justify-center">
                                    <i data-lucide="thermometer" class="h-3.5 w-3.5 text-sky-500"></i>
                                </span>
                                <p class="text-sm font-semibold text-forest-900 font-body">Sakit</p>
                            </div>
                            <span
                                class="text-xs font-medium font-body px-2.5 py-0.5 rounded-full bg-sky-50 text-sky-600">0
                                siswa</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-xs text-left font-body">
                                <thead>
                                    <tr class="bg-sky-50/40 text-forest-400">
                                        <th class="px-5 py-2.5 font-medium">Nama</th>
                                        <th class="px-4 py-2.5 font-medium">Kelas</th>
                                        <th class="px-4 py-2.5 font-medium">Hari ke-</th>
                                        <th class="px-4 py-2.5 font-medium">Surat Dokter</th>
                                        <th class="px-4 py-2.5 font-medium">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-forest-50">
                                    @forelse ([] as $s)
                                    {{-- Data Kosong --}}
                                    @empty
                                    <tr>
                                        <td colspan="5" class="px-5 py-8 text-center text-forest-400 italic">Tidak ada
                                            data siswa sakit.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{-- Lihat semua --}}
                        <div class="px-5 py-3 border-t border-forest-50">
                            <button
                                class="text-xs text-forest-500 hover:text-forest-800 font-body font-medium flex items-center gap-1 transition-colors">
                                Lihat semua 0 siswa sakit
                                <i data-lucide="chevron-right" class="h-3 w-3"></i>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Sidebar kanan --}}
                <div class="space-y-4">

                    {{-- Grafik tren absensi mingguan --}}
                    <div class="rounded-2xl bg-white border border-forest-100 shadow-sm p-5">
                        <p class="text-sm font-semibold text-forest-900 mb-1 font-body">Tren Absensi 5 Hari</p>
                        <p class="text-[11px] text-forest-400 font-body mb-4">Siswa tidak masuk per hari</p>
                        @php
                        $trenData = [
                        ['hari' => 'Sen', 'alpha' => 0, 'izin' => 0, 'sakit' => 0],
                        ['hari' => 'Sel', 'alpha' => 0, 'izin' => 0, 'sakit' => 0],
                        ['hari' => 'Rab', 'alpha' => 0, 'izin' => 0, 'sakit' => 0],
                        ['hari' => 'Kam', 'alpha' => 0, 'izin' => 0, 'sakit' => 0],
                        ['hari' => 'Jum', 'alpha' => 0, 'izin' => 0, 'sakit' => 0],
                        ];
                        @endphp
                        <div class="space-y-3">
                            @foreach ($trenData as $d)
                            <div class="flex items-center gap-2">
                                <span class="text-[11px] text-forest-400 font-body w-7 shrink-0">{{ $d['hari'] }}</span>
                                <div class="flex-1 flex gap-0.5 h-5 rounded-md overflow-hidden">
                                    <div class="bg-red-400/80 flex items-center justify-center" style="width: 0%"></div>
                                    <div class="bg-sun-400/80" style="width: 0%"></div>
                                    <div class="bg-sky-400/60" style="width: 0%"></div>
                                </div>
                                <span class="text-[11px] text-forest-500 font-body w-8 text-right shrink-0">0</span>
                            </div>
                            @endforeach
                        </div>
                        {{-- Legend --}}
                        <div class="flex items-center gap-3 mt-4 pt-3 border-t border-forest-50">
                            <span class="flex items-center gap-1.5 text-[11px] text-forest-500 font-body">
                                <span class="h-2.5 w-2.5 rounded-sm bg-red-400/80"></span>Alpha
                            </span>
                            <span class="flex items-center gap-1.5 text-[11px] text-forest-500 font-body">
                                <span class="h-2.5 w-2.5 rounded-sm bg-sun-400/80"></span>Izin
                            </span>
                            <span class="flex items-center gap-1.5 text-[11px] text-forest-500 font-body">
                                <span class="h-2.5 w-2.5 rounded-sm bg-sky-400/60"></span>Sakit
                            </span>
                        </div>
                    </div>

                    {{-- Kelas dengan absensi tertinggi --}}
                    <div class="rounded-2xl bg-white border border-forest-100 shadow-sm p-5">
                        <p class="text-sm font-semibold text-forest-900 mb-4 font-body">Absensi per Kelas</p>
                        <div class="space-y-3">
                            @foreach ([
                            ['kelas' => 'X MM 1', 'total' => 0, 'max' => 36],
                            ['kelas' => 'XI TKJ 1', 'total' => 0, 'max' => 36],
                            ['kelas' => 'XII RPL 2', 'total' => 0, 'max' => 34],
                            ['kelas' => 'X TKJ 2', 'total' => 0, 'max' => 36],
                            ['kelas' => 'XI MM 2', 'total' => 0, 'max' => 34],
                            ] as $k)
                            <div>
                                <div class="flex justify-between text-[11px] font-body mb-1">
                                    <span class="text-forest-700 font-medium">{{ $k['kelas'] }}</span>
                                    <span class="text-forest-500">{{ $k['total'] }} / {{ $k['max'] }}</span>
                                </div>
                                <div class="h-1.5 bg-forest-100 rounded-full overflow-hidden">
                                    <div class="h-full rounded-full bg-gradient-to-r from-sun-400 to-red-400"
                                        style="width: 0%"></div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Siswa sering alpha --}}
                    <div class="rounded-2xl bg-white border border-forest-100 shadow-sm p-5">
                        <div class="flex items-center gap-2 mb-4">
                            <i data-lucide="alert-triangle" class="h-4 w-4 text-red-500"></i>
                            <p class="text-sm font-semibold text-forest-900 font-body">Perlu Perhatian</p>
                        </div>
                        <div class="space-y-3">
                            <p class="text-xs text-forest-400 italic">Belum ada data siswa yang memerlukan perhatian
                                khusus.</p>
                        </div>

                        {{-- Tombol Jadwalkan Konseling Keren --}}
                        <a href="{{ route('konseling.index') }}"
                            class="mt-4 w-full group relative inline-flex items-center justify-center gap-2 px-4 py-2.5 text-xs font-body font-semibold text-white bg-gradient-to-r from-forest-800 via-forest-700 to-emerald-700 rounded-xl shadow-md hover:shadow-lg hover:from-forest-900 hover:to-emerald-800 transition-all duration-300 transform active:scale-[0.98] overflow-hidden">
                            <span
                                class="absolute inset-0 w-full h-full bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                            <i data-lucide="calendar-plus"
                                class="h-4 w-4 text-emerald-300 group-hover:rotate-12 transition-transform duration-300"></i>
                            <span>Jadwalkan Konseling</span>
                            <i data-lucide="arrow-right"
                                class="h-3.5 w-3.5 text-white/70 group-hover:translate-x-1 transition-transform duration-300"></i>
                        </a>
                    </div>

                </div>
            </div>

        </main>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        lucide.createIcons();

        const sidebar = document.getElementById('dashboard-sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const btnOpen = document.getElementById('btn-open-sidebar');

        const openSidebar = () => {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        };
        const closeSidebar = () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        };

        btnOpen?.addEventListener('click', openSidebar);
        overlay?.addEventListener('click', closeSidebar);
    });
    </script>
</body>

</html>