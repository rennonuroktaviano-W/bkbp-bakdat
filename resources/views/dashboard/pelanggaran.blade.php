<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Poin Pelanggaran — BK/BP Application</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <x-config-warna-font />
    <x-style-tambahan />
</head>

<body class="antialiased text-forest-950 bg-mist">
    <x-dashboard.sidebar />
    <div class="lg:pl-64 min-h-screen flex flex-col">
        <x-dashboard.topbar />
        <main class="flex-1 p-6 lg:p-8 space-y-6">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="font-display font-bold text-xl">Point Pelanggaran</h2>
                    <p class="text-xs text-forest-500">Pencatatan pelanggaran siswa dan bobot poin</p>
                </div>
                <button
                    class="bg-forest-800 text-white text-xs font-medium px-4 py-2.5 rounded-xl flex items-center gap-2">
                    <i data-lucide="plus" class="h-4 w-4"></i> Catat Pelanggaran
                </button>
            </div>

            {{-- Table Catatan Pelanggaran --}}
            <div class="rounded-2xl bg-white border border-forest-100 shadow-sm overflow-hidden">
                <table class="w-full text-xs text-left">
                    <thead class="bg-forest-50/50 text-forest-500 border-b border-forest-100">
                        <tr>
                            <th class="px-5 py-3">Siswa</th>
                            <th class="px-4 py-3">Pelanggaran</th>
                            <th class="px-4 py-3">Poin Added</th>
                            <th class="px-4 py-3">Accumulation Progress</th>
                            <th class="px-4 py-3">Guru Pelapor</th>
                            <th class="px-4 py-3">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-forest-50">
                        @php
                        $dataPelanggaran = [
                        ['nama' => 'Luthfi Ardiansyah', 'kelas' => 'X RPL 1', 'kasus' => 'Membolos Jam Pelajaran',
                        'poin' => 25, 'total' => 65, 'guru' => 'Bu Ratna', 'tgl' => '23 Jul 2026'],
                        ['nama' => 'Rangga Aji', 'kelas' => 'X MM 1', 'kasus' => 'Tidak Memakai Atribut', 'poin' => 5,
                        'total' => 25, 'guru' => 'Pak Ahmad', 'tgl' => '22 Jul 2026'],
                        ];
                        @endphp
                        @foreach ($dataPelanggaran as $p)
                        <tr>
                            <td class="px-5 py-3 font-semibold text-forest-900">{{ $p['nama'] }} <span
                                    class="block text-[10px] text-forest-400 font-normal">{{ $p['kelas'] }}</span></td>
                            <td class="px-4 py-3">{{ $p['kasus'] }}</td>
                            <td class="px-4 py-3 font-bold text-red-500">+{{ $p['poin'] }}</td>
                            <td class="px-4 py-3">
                                <div class="w-32">
                                    <div class="flex justify-between text-[10px] mb-1 font-semibold">
                                        <span>{{ $p['total'] }} / 100</span>
                                    </div>
                                    <div class="h-2 w-full bg-forest-100 rounded-full overflow-hidden">
                                        <div class="h-full {{ $p['total'] >= 50 ? 'bg-red-500' : ($p['total'] >= 30 ? 'bg-amber-400' : 'bg-emerald-500') }}"
                                            style="width: {{ $p['total'] }}%"></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-forest-600">{{ $p['guru'] }}</td>
                            <td class="px-4 py-3 text-forest-400">{{ $p['tgl'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Master Aturan Pelanggaran --}}
            <div class="bg-white rounded-2xl border border-forest-100 p-5 shadow-sm">
                <h3 class="font-display font-bold text-sm text-forest-950 mb-3">Master Poin Pelanggaran</h3>
                <div class="grid grid-cols-2 md:grid-cols-5 gap-3 text-xs">
                    <div class="p-3 bg-mist rounded-xl border border-forest-100">
                        <p class="text-forest-500">Atribut</p>
                        <p class="font-bold text-forest-900">5 Poin</p>
                    </div>
                    <div class="p-3 bg-mist rounded-xl border border-forest-100">
                        <p class="text-forest-500">Terlambat</p>
                        <p class="font-bold text-forest-900">10 Poin</p>
                    </div>
                    <div class="p-3 bg-mist rounded-xl border border-forest-100">
                        <p class="text-forest-500">Membolos</p>
                        <p class="font-bold text-forest-900">25 Poin</p>
                    </div>
                    <div class="p-3 bg-mist rounded-xl border border-forest-100">
                        <p class="text-forest-500">Merokok</p>
                        <p class="font-bold text-red-500">50 Poin</p>
                    </div>
                    <div class="p-3 bg-mist rounded-xl border border-forest-100">
                        <p class="text-forest-500">Berkelahi</p>
                        <p class="font-bold text-red-600">100 Poin</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
    lucide.createIcons();
    </script>
</body>

</html>