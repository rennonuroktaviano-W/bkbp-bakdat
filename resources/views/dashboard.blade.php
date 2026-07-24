<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — BK/BP Application</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <x-config-warna-font />
    <x-style-tambahan />
</head>

<body class="antialiased text-forest-950 bg-mist">
    <x-dashboard.sidebar />
    <div class="lg:pl-64 min-h-screen flex flex-col">
        <x-dashboard.topbar />

        <main class="flex-1 p-6 lg:p-8 space-y-6">
            {{-- Breadcrumb --}}
            <nav class="flex text-xs font-body text-forest-500 gap-2 items-center">
                <span>Home</span>
                <i data-lucide="chevron-right" class="h-3 w-3"></i>
                <span class="font-semibold text-forest-800">Dashboard</span>
            </nav>

            {{-- Stat Cards --}}
            <div class="grid grid-cols-2 lg:grid-cols-6 gap-4">
                @php
                $stats = [
                ['icon' => 'users', 'label' => 'Total Siswa', 'val' => '1,240', 'bg' => 'bg-emerald-50
                text-emerald-600'],
                ['icon' => 'user-check', 'label' => 'Guru BK', 'val' => '6', 'bg' => 'bg-forest-50 text-forest-600'],
                ['icon' => 'alert-circle', 'label' => 'Pelanggaran Hari Ini', 'val' => '8', 'bg' => 'bg-red-50
                text-red-500'],
                ['icon' => 'message-square', 'label' => 'Konseling Hari Ini', 'val' => '4', 'bg' => 'bg-amber-50
                text-amber-600'],
                ['icon' => 'calendar-x', 'label' => 'Absensi Hari Ini', 'val' => '23', 'bg' => 'bg-orange-50
                text-orange-500'],
                ['icon' => 'file-text', 'label' => 'Laporan Bulan Ini', 'val' => '142', 'bg' => 'bg-sky-50
                text-sky-600'],
                ];
                @endphp
                @foreach ($stats as $s)
                <div class="rounded-2xl bg-white border border-forest-100 shadow-sm p-4 hover:shadow-md transition">
                    <span class="inline-flex h-8 w-8 rounded-lg {{ $s['bg'] }} items-center justify-center mb-2">
                        <i data-lucide="{{ $s['icon'] }}" class="h-4 w-4"></i>
                    </span>
                    <p class="font-display font-bold text-lg text-forest-950">{{ $s['val'] }}</p>
                    <p class="text-[11px] text-forest-500 font-body">{{ $s['label'] }}</p>
                </div>
                @endforeach
            </div>

            {{-- Grafik & Chart --}}
            <div class="grid lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 bg-white rounded-2xl border border-forest-100 shadow-sm p-5">
                    <h3 class="font-display font-bold text-sm text-forest-950 mb-4">Grafik Pelanggaran per Bulan</h3>
                    <div class="h-64">
                        <canvas id="lineChartPelanggaran"></canvas>
                    </div>
                </div>
                <div class="bg-white rounded-2xl border border-forest-100 shadow-sm p-5">
                    <h3 class="font-display font-bold text-sm text-forest-950 mb-4">Kehadiran Hari Ini</h3>
                    <div class="h-64 flex justify-center items-center">
                        <canvas id="pieChartKehadiran"></canvas>
                    </div>
                </div>
            </div>

            {{-- Activity & Alerts --}}
            <div class="grid lg:grid-cols-2 gap-6">
                {{-- Activity Feed --}}
                <div class="bg-white rounded-2xl border border-forest-100 shadow-sm p-5">
                    <h3 class="font-display font-bold text-sm text-forest-950 mb-4">Aktivitas Terbaru</h3>
                    <div class="space-y-3 font-body text-xs">
                        @php
                        $acts = [
                        ['time' => '09:50', 'text' => 'Input Konseling (Budi Santoso - XII RPL 1)', 'icon' =>
                        'message-square', 'color' => 'text-amber-500'],
                        ['time' => '09:35', 'text' => 'Input Pelanggaran (Rangga Aji - Terlambat)', 'icon' =>
                        'alert-triangle', 'color' => 'text-red-500'],
                        ['time' => '09:20', 'text' => 'Tambah Data Siswa Baru (Nadia Putri)', 'icon' => 'user-plus',
                        'color' => 'text-forest-600'],
                        ['time' => '09:00', 'text' => 'Admin Login ke Sistem', 'icon' => 'key', 'color' =>
                        'text-sky-500']
                        ];
                        @endphp
                        @foreach ($acts as $act)
                        <div class="flex items-center gap-3">
                            <span class="text-forest-400 font-mono">{{ $act['time'] }}</span>
                            <i data-lucide="{{ $act['icon'] }}" class="h-4 w-4 {{ $act['color'] }}"></i>
                            <span class="text-forest-800">{{ $act['text'] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Notifikasi Ambang Poin --}}
                <div class="bg-white rounded-2xl border border-forest-100 shadow-sm p-5">
                    <h3 class="font-display font-bold text-sm text-forest-950 mb-4">Peringatan Poin Siswa</h3>
                    <div class="space-y-3">
                        <div class="p-3 bg-red-50 border border-red-100 rounded-xl flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <i data-lucide="alert-octagon" class="h-4 w-4 text-red-600"></i>
                                <span class="text-xs font-semibold text-red-700">1 Siswa Mencapai 100 Poin</span>
                            </div>
                            <button class="text-[11px] bg-red-600 text-white px-2.5 py-1 rounded-lg">Panggil
                                SP3</button>
                        </div>
                        <div
                            class="p-3 bg-amber-50 border border-amber-100 rounded-xl flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <i data-lucide="alert-triangle" class="h-4 w-4 text-amber-600"></i>
                                <span class="text-xs font-semibold text-amber-700">2 Siswa Mencapai 50 Poin</span>
                            </div>
                            <button
                                class="text-[11px] bg-amber-600 text-white px-2.5 py-1 rounded-lg">Konseling</button>
                        </div>
                        <div
                            class="p-3 bg-forest-50 border border-forest-100 rounded-xl flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <i data-lucide="info" class="h-4 w-4 text-forest-600"></i>
                                <span class="text-xs font-semibold text-forest-700">5 Siswa Mencapai 30 Poin</span>
                            </div>
                            <button
                                class="text-[11px] bg-forest-700 text-white px-2.5 py-1 rounded-lg">Peringatan</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        lucide.createIcons();

        // Line Chart
        new Chart(document.getElementById('lineChartPelanggaran'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [{
                    label: 'Pelanggaran',
                    data: [12, 19, 8, 15, 22, 8],
                    borderColor: '#059669',
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        // Pie Chart
        new Chart(document.getElementById('pieChartKehadiran'), {
            type: 'doughnut',
            data: {
                labels: ['Hadir', 'Izin', 'Sakit', 'Alpha'],
                datasets: [{
                    data: [842, 12, 65, 5],
                    backgroundColor: ['#059669', '#f59e0b', '#0284c7', '#ef4444']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    });
    </script>
</body>

</html>