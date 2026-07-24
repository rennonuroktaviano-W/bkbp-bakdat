<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan — BK/BP Application</title>
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
            <h2 class="font-display font-bold text-xl">Pusat Laporan & Cetak Surat</h2>

            {{-- Auto-Generate Surat --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white p-4 rounded-2xl border border-forest-100 shadow-sm flex flex-col justify-between">
                    <div>
                        <i data-lucide="mail-warning" class="h-6 w-6 text-red-500 mb-2"></i>
                        <h4 class="font-bold text-sm">Surat Panggilan Orang Tua</h4>
                        <p class="text-[11px] text-forest-500">Cetak otomatis berdasarkan akumulasi poin akumulasi
                            siswa.</p>
                    </div>
                    <button
                        class="mt-4 bg-red-50 text-red-600 hover:bg-red-100 text-xs font-semibold py-2 rounded-xl border border-red-200">Generate
                        Surat</button>
                </div>
                <div class="bg-white p-4 rounded-2xl border border-forest-100 shadow-sm flex flex-col justify-between">
                    <div>
                        <i data-lucide="file-warning" class="h-6 w-6 text-amber-500 mb-2"></i>
                        <h4 class="font-bold text-sm">Surat Peringatan (SP)</h4>
                        <p class="text-[11px] text-forest-500">Draft SP1, SP2, hingga SP3 siap cetak.</p>
                    </div>
                    <button
                        class="mt-4 bg-amber-50 text-amber-600 hover:bg-amber-100 text-xs font-semibold py-2 rounded-xl border border-amber-200">Generate
                        SP</button>
                </div>
                <div class="bg-white p-4 rounded-2xl border border-forest-100 shadow-sm flex flex-col justify-between">
                    <div>
                        <i data-lucide="file-text" class="h-6 w-6 text-forest-600 mb-2"></i>
                        <h4 class="font-bold text-sm">Rekap PDF & Excel</h4>
                        <p class="text-[11px] text-forest-500">Laporan bulanan/semesteran untuk Kepala Sekolah.</p>
                    </div>
                    <button
                        class="mt-4 bg-forest-50 text-forest-700 hover:bg-forest-100 text-xs font-semibold py-2 rounded-xl border border-forest-200">Export
                        Laporan</button>
                </div>
            </div>
        </main>
    </div>
    <script>
    lucide.createIcons();
    </script>
</body>

</html>