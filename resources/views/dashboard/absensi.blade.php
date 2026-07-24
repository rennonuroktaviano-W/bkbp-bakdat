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
                    <input type="date" value="{{ date('Y-m-d') }}"
                        class="px-3 py-2.5 rounded-xl border border-forest-200 text-sm font-body text-forest-700 focus:outline-none focus:ring-2 focus:ring-forest-400/40 focus:border-forest-400 transition bg-white">
                    <button
                        class="inline-flex items-center gap-2 bg-forest-800 hover:bg-forest-700 text-white text-sm font-body font-medium px-4 py-2.5 rounded-xl transition-colors shrink-0">
                        <i data-lucide="printer" class="h-4 w-4"></i>
                        Cetak
                    </button>
                </div>
            </div>

            {{-- Stat Cards hari ini --}}
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                @foreach ([
                ['icon' => 'user-check', 'label' => 'Hadir', 'value' => '842', 'accent' => 'text-forest-600', 'bg' =>
                'bg-forest-50', 'pct' => '91%'],
                ['icon' => 'user-x', 'label' => 'Alpha', 'value' => '5', 'accent' => 'text-red-500', 'bg' =>
                'bg-red-50', 'pct' => '0.5%'],
                ['icon' => 'file-clock', 'label' => 'Izin', 'value' => '12', 'accent' => 'text-sun-500', 'bg' =>
                'bg-sun-50', 'pct' => '1.3%'],
                ['icon' => 'thermometer', 'label' => 'Sakit', 'value' => '65', 'accent' => 'text-sky-500', 'bg' =>
                'bg-sky-50', 'pct' => '7%'],
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

            {{-- Tab navigasi hari --}}
            @php
            $hariIni = now();
            $hariList = [
            ['label' => 'Hari Ini', 'tanggal' => $hariIni->format('d M'), 'active' => true],
            ['label' => 'Kemarin', 'tanggal' => $hariIni->copy()->subDay()->format('d M'), 'active' => false],
            ['label' => now()->subDays(2)->format('l'), 'tanggal' => $hariIni->copy()->subDays(2)->format('d M'),
            'active' => false],
            ['label' => now()->subDays(3)->format('l'), 'tanggal' => $hariIni->copy()->subDays(3)->format('d M'),
            'active' => false],
            ['label' => now()->subDays(4)->format('l'), 'tanggal' => $hariIni->copy()->subDays(4)->format('d M'),
            'active' => false],
            ];
            @endphp

            <div class="flex gap-2 overflow-x-auto pb-1 -mb-1">
                @foreach ($hariList as $hari)
                <button class="flex flex-col items-center px-4 py-2.5 rounded-xl text-xs font-body shrink-0 transition-colors
                    {{ $hari['active']
                        ? 'bg-forest-800 text-white shadow-sm'
                        : 'bg-white border border-forest-200 text-forest-600 hover:bg-forest-50' }}">
                    <span class="font-semibold">{{ $hari['label'] }}</span>
                    <span
                        class="{{ $hari['active'] ? 'text-forest-300' : 'text-forest-400' }} mt-0.5">{{ $hari['tanggal'] }}</span>
                </button>
                @endforeach
            </div>

            {{-- Konten Absensi Hari Ini --}}
            <div class="grid lg:grid-cols-3 gap-5">

                {{-- Tabel Utama --}}
                <div class="lg:col-span-2 space-y-4">

                    {{-- Alpha --}}
                    <div class="rounded-2xl bg-white border border-forest-100 shadow-sm overflow-hidden">
                        <div class="flex items-center justify-between px-5 py-3.5 border-b border-forest-100">
                            <div class="flex items-center gap-2.5">
                                <span class="h-7 w-7 rounded-lg bg-red-50 flex items-center justify-center">
                                    <i data-lucide="user-x" class="h-3.5 w-3.5 text-red-500"></i>
                                </span>
                                <p class="text-sm font-semibold text-forest-900 font-body">Alpha</p>
                            </div>
                            <span
                                class="text-xs font-medium font-body px-2.5 py-0.5 rounded-full bg-red-50 text-red-600">5
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
                                    @foreach ([
                                    ['nama' => 'Rangga Aji Nugroho', 'kelas' => 'X MM 1', 'total' => 8],
                                    ['nama' => 'Bagas Firmansyah', 'kelas' => 'XI TKJ 1', 'total' => 5],
                                    ['nama' => 'Kevin Pratama', 'kelas' => 'XII RPL 2', 'total' => 3],
                                    ['nama' => 'Luthfi Ardiansyah', 'kelas' => 'X RPL 1', 'total' => 11],
                                    ['nama' => 'Muhammad Rizky', 'kelas' => 'XI MM 2', 'total' => 2],
                                    ] as $s)
                                    <tr class="hover:bg-red-50/30 transition-colors">
                                        <td class="px-5 py-3 text-forest-800 font-medium">{{ $s['nama'] }}</td>
                                        <td class="px-4 py-3 text-forest-600">{{ $s['kelas'] }}</td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center gap-2">
                                                <div class="h-1.5 w-20 bg-forest-100 rounded-full overflow-hidden">
                                                    <div class="h-full bg-red-400 rounded-full"
                                                        style="width: {{ min($s['total'] * 7, 100) }}%"></div>
                                                </div>
                                                <span class="text-red-500 font-semibold">{{ $s['total'] }}x</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <button
                                                class="inline-flex items-center gap-1 text-[11px] text-forest-600 hover:text-forest-900 font-medium bg-forest-50 hover:bg-forest-100 px-2.5 py-1 rounded-lg transition-colors">
                                                <i data-lucide="message-circle-heart" class="h-3 w-3"></i>
                                                Panggil
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Izin --}}
                    <div class="rounded-2xl bg-white border border-forest-100 shadow-sm overflow-hidden">
                        <div class="flex items-center justify-between px-5 py-3.5 border-b border-forest-100">
                            <div class="flex items-center gap-2.5">
                                <span class="h-7 w-7 rounded-lg bg-sun-50 flex items-center justify-center">
                                    <i data-lucide="file-clock" class="h-3.5 w-3.5 text-sun-500"></i>
                                </span>
                                <p class="text-sm font-semibold text-forest-900 font-body">Izin</p>
                            </div>
                            <span
                                class="text-xs font-medium font-body px-2.5 py-0.5 rounded-full bg-sun-50 text-sun-600">12
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
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-forest-50">
                                    @foreach ([
                                    ['nama' => 'Nadia Putri Ayu', 'kelas' => 'XI TKJ 2', 'ket' => 'Acara keluarga',
                                    'surat' => true],
                                    ['nama' => 'Salsabila Rahma', 'kelas' => 'XII RPL 1', 'ket' => 'Keperluan pribadi',
                                    'surat' => false],
                                    ['nama' => 'Wahyu Setiawan', 'kelas' => 'X TKJ 1', 'ket' => 'Lomba OSN Kabupaten',
                                    'surat' => true],
                                    ['nama' => 'Tiara Agustina', 'kelas' => 'XI MM 1', 'ket' => 'Wisuda kakak', 'surat'
                                    => true],
                                    ] as $s)
                                    <tr class="hover:bg-sun-50/20 transition-colors">
                                        <td class="px-5 py-3 text-forest-800 font-medium">{{ $s['nama'] }}</td>
                                        <td class="px-4 py-3 text-forest-600">{{ $s['kelas'] }}</td>
                                        <td class="px-4 py-3 text-forest-600">{{ $s['ket'] }}</td>
                                        <td class="px-4 py-3">
                                            @if ($s['surat'])
                                            <span
                                                class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-green-50 text-green-600 text-[11px] font-medium">
                                                <i data-lucide="check-circle" class="h-2.5 w-2.5"></i> Ada
                                            </span>
                                            @else
                                            <span
                                                class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-red-50 text-red-500 text-[11px] font-medium">
                                                <i data-lucide="x-circle" class="h-2.5 w-2.5"></i> Tidak ada
                                            </span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Sakit --}}
                    <div class="rounded-2xl bg-white border border-forest-100 shadow-sm overflow-hidden">
                        <div class="flex items-center justify-between px-5 py-3.5 border-b border-forest-100">
                            <div class="flex items-center gap-2.5">
                                <span class="h-7 w-7 rounded-lg bg-sky-50 flex items-center justify-center">
                                    <i data-lucide="thermometer" class="h-3.5 w-3.5 text-sky-500"></i>
                                </span>
                                <p class="text-sm font-semibold text-forest-900 font-body">Sakit</p>
                            </div>
                            <span
                                class="text-xs font-medium font-body px-2.5 py-0.5 rounded-full bg-sky-50 text-sky-600">65
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
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-forest-50">
                                    @foreach ([
                                    ['nama' => 'Andini Permatasari', 'kelas' => 'XII MM 2', 'hari' => 1, 'dokter' =>
                                    false],
                                    ['nama' => 'Bima Arya Wicaksono', 'kelas' => 'X RPL 2', 'hari' => 3, 'dokter' =>
                                    true],
                                    ['nama' => 'Chelsy Amelia', 'kelas' => 'XI TKJ 1', 'hari' => 1, 'dokter' => false],
                                    ['nama' => 'Dita Puspitasari', 'kelas' => 'XII TKJ 2', 'hari' => 2, 'dokter' =>
                                    true],
                                    ['nama' => 'Evan Mahendra', 'kelas' => 'X MM 2', 'hari' => 1, 'dokter' => false],
                                    ] as $s)
                                    <tr class="hover:bg-sky-50/20 transition-colors">
                                        <td class="px-5 py-3 text-forest-800 font-medium">{{ $s['nama'] }}</td>
                                        <td class="px-4 py-3 text-forest-600">{{ $s['kelas'] }}</td>
                                        <td class="px-4 py-3">
                                            <span
                                                class="font-semibold {{ $s['hari'] >= 3 ? 'text-red-500' : 'text-sky-500' }}">
                                                Hari ke-{{ $s['hari'] }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">
                                            @if ($s['dokter'])
                                            <span
                                                class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-green-50 text-green-600 text-[11px] font-medium">
                                                <i data-lucide="check-circle" class="h-2.5 w-2.5"></i> Ada
                                            </span>
                                            @else
                                            <span
                                                class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-red-50 text-red-500 text-[11px] font-medium">
                                                <i data-lucide="x-circle" class="h-2.5 w-2.5"></i> Belum ada
                                            </span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- Lihat semua --}}
                        <div class="px-5 py-3 border-t border-forest-50">
                            <button
                                class="text-xs text-forest-500 hover:text-forest-800 font-body font-medium flex items-center gap-1 transition-colors">
                                Lihat semua 65 siswa sakit
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
                        ['hari' => 'Sen', 'alpha' => 4, 'izin' => 9, 'sakit' => 55],
                        ['hari' => 'Sel', 'alpha' => 6, 'izin' => 14, 'sakit' => 70],
                        ['hari' => 'Rab', 'alpha' => 3, 'izin' => 10, 'sakit' => 61],
                        ['hari' => 'Kam', 'alpha' => 7, 'izin' => 11, 'sakit' => 68],
                        ['hari' => 'Jum', 'alpha' => 5, 'izin' => 12, 'sakit' => 65],
                        ];
                        @endphp
                        <div class="space-y-3">
                            @foreach ($trenData as $d)
                            <div class="flex items-center gap-2">
                                <span class="text-[11px] text-forest-400 font-body w-7 shrink-0">{{ $d['hari'] }}</span>
                                <div class="flex-1 flex gap-0.5 h-5 rounded-md overflow-hidden">
                                    <div class="bg-red-400/80 flex items-center justify-center"
                                        style="width: {{ ($d['alpha'] / ($d['alpha'] + $d['izin'] + $d['sakit'])) * 100 }}%">
                                        @if ($d['alpha'] > 4)<span
                                            class="text-[9px] text-white font-bold">{{ $d['alpha'] }}</span>@endif
                                    </div>
                                    <div class="bg-sun-400/80"
                                        style="width: {{ ($d['izin'] / ($d['alpha'] + $d['izin'] + $d['sakit'])) * 100 }}%">
                                    </div>
                                    <div class="bg-sky-400/60"
                                        style="width: {{ ($d['sakit'] / ($d['alpha'] + $d['izin'] + $d['sakit'])) * 100 }}%">
                                    </div>
                                </div>
                                <span
                                    class="text-[11px] text-forest-500 font-body w-8 text-right shrink-0">{{ $d['alpha'] + $d['izin'] + $d['sakit'] }}</span>
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
                            ['kelas' => 'X MM 1', 'total' => 18, 'max' => 36],
                            ['kelas' => 'XI TKJ 1', 'total' => 15, 'max' => 36],
                            ['kelas' => 'XII RPL 2', 'total' => 12, 'max' => 34],
                            ['kelas' => 'X TKJ 2', 'total' => 10, 'max' => 36],
                            ['kelas' => 'XI MM 2', 'total' => 8, 'max' => 34],
                            ] as $k)
                            <div>
                                <div class="flex justify-between text-[11px] font-body mb-1">
                                    <span class="text-forest-700 font-medium">{{ $k['kelas'] }}</span>
                                    <span class="text-forest-500">{{ $k['total'] }} / {{ $k['max'] }}</span>
                                </div>
                                <div class="h-1.5 bg-forest-100 rounded-full overflow-hidden">
                                    <div class="h-full rounded-full bg-gradient-to-r from-sun-400 to-red-400"
                                        style="width: {{ ($k['total'] / $k['max']) * 100 }}%"></div>
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
                            @foreach ([
                            ['nama' => 'Luthfi Ardiansyah', 'kelas' => 'X RPL 1', 'total' => 11],
                            ['nama' => 'Rangga Aji Nugroho', 'kelas' => 'X MM 1', 'total' => 8],
                            ['nama' => 'Bagas Firmansyah', 'kelas' => 'XI TKJ 1', 'total' => 5],
                            ] as $idx => $p)
                            <div class="flex items-center gap-3">
                                <span
                                    class="h-6 w-6 rounded-full bg-red-100 text-red-600 text-[10px] font-display font-bold flex items-center justify-center shrink-0">
                                    {{ $idx + 1 }}
                                </span>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs font-medium text-forest-800 font-body truncate">{{ $p['nama'] }}
                                    </p>
                                    <p class="text-[11px] text-forest-400 font-body">{{ $p['kelas'] }}</p>
                                </div>
                                <span
                                    class="text-xs font-bold text-red-500 font-body shrink-0">{{ $p['total'] }}x</span>
                            </div>
                            @endforeach
                        </div>
                        <button
                            class="mt-4 w-full text-center text-xs text-forest-600 hover:text-forest-900 font-body font-medium py-2 rounded-lg hover:bg-forest-50 transition-colors border border-forest-200 flex items-center justify-center gap-1.5">
                            <i data-lucide="message-circle-heart" class="h-3.5 w-3.5"></i>
                            Jadwalkan Konseling
                        </button>
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