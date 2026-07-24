<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Konseling — BK/BP Application</title>
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
                    <h2 class="font-display font-bold text-xl">Sesi Konseling</h2>
                    <p class="text-xs text-forest-500">Bimbingan & Penyuluhan Siswa</p>
                </div>
                <button class="bg-forest-800 text-white text-xs px-4 py-2.5 rounded-xl flex items-center gap-2">
                    <i data-lucide="plus" class="h-4 w-4"></i> Jadwalkan Sesi Baru
                </button>
            </div>

            <div class="rounded-2xl bg-white border border-forest-100 shadow-sm overflow-hidden">
                <table class="w-full text-xs text-left">
                    <thead class="bg-forest-50/50 text-forest-500 border-b border-forest-100">
                        <tr>
                            <th class="px-5 py-3">Nama Siswa</th>
                            <th class="px-4 py-3">Konselor (Guru BK)</th>
                            <th class="px-4 py-3">Permasalahan</th>
                            <th class="px-4 py-3">Tanggal</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-forest-50">
                        <tr>
                            <td class="px-5 py-3 font-semibold">Luthfi Ardiansyah</td>
                            <td class="px-4 py-3">Bu Ratna, S.Pd</td>
                            <td class="px-4 py-3">Penurunan motivasi belajar & Sering Alpha</td>
                            <td class="px-4 py-3">24 Jul 2026</td>
                            <td class="px-4 py-3">
                                <span
                                    class="bg-amber-50 text-amber-600 px-2 py-0.5 rounded-full text-[10px] font-bold">Proses</span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <button class="text-forest-600 bg-forest-50 px-2 py-1 rounded-lg">Detail</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <script>
    lucide.createIcons();
    </script>
</body>

</html>