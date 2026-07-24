<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa — BK/BP Application</title>

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts: Sora + Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    <x-config-warna-font />
    <x-style-tambahan />
</head>

<body class="antialiased text-forest-950 bg-mist">

    <x-dashboard.sidebar />

    <div class="lg:pl-64 min-h-screen flex flex-col">

        <x-dashboard.topbar />

        <main class="flex-1 p-6 lg:p-8 space-y-6">

            {{-- Header Halaman --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h2 class="font-display font-bold text-xl text-forest-950">Daftar Siswa</h2>
                    <p class="text-xs text-forest-500 font-body mt-0.5">Kelola data seluruh siswa dan rekam
                        medis/konseling</p>
                </div>
                <button
                    class="inline-flex items-center gap-2 bg-forest-800 hover:bg-forest-700 text-white text-sm font-body font-medium px-4 py-2.5 rounded-xl transition-colors shrink-0">
                    <i data-lucide="user-plus" class="h-4 w-4"></i>
                    Tambah Siswa Baru
                </button>
            </div>

            {{-- Filter & Pencarian --}}
            <div
                class="rounded-2xl bg-white border border-forest-100 shadow-sm p-4 flex flex-col sm:flex-row gap-3 justify-between items-center">
                <div class="relative w-full sm:w-80">
                    <i data-lucide="search"
                        class="h-4 w-4 text-forest-400 absolute left-3.5 top-1/2 -translate-y-1/2"></i>
                    <input type="text" placeholder="Cari nama atau NISN..."
                        class="w-full pl-10 pr-4 py-2 rounded-xl border border-forest-200 text-xs font-body text-forest-800 focus:outline-none focus:ring-2 focus:ring-forest-400/40">
                </div>
                <div class="flex gap-2 w-full sm:w-auto">
                    <select
                        class="px-3 py-2 rounded-xl border border-forest-200 text-xs font-body text-forest-700 bg-white focus:outline-none">
                        <option value="">Semua Kelas</option>
                        <option value="X">Kelas X</option>
                        <option value="XI">Kelas XI</option>
                        <option value="XII">Kelas XII</option>
                    </select>
                    <select
                        class="px-3 py-2 rounded-xl border border-forest-200 text-xs font-body text-forest-700 bg-white focus:outline-none">
                        <option value="">Semua Jurusan</option>
                        <option value="RPL">RPL</option>
                        <option value="TKJ">TKJ</option>
                        <option value="MM">Multimedia</option>
                    </select>
                </div>
            </div>

            {{-- Tabel Daftar Siswa --}}
            <div class="rounded-2xl bg-white border border-forest-100 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-xs text-left font-body">
                        <thead>
                            <tr class="bg-forest-50/50 text-forest-500 border-b border-forest-100">
                                <th class="px-5 py-3 font-medium">NISN</th>
                                <th class="px-5 py-3 font-medium">Nama Siswa</th>
                                <th class="px-4 py-3 font-medium">Kelas</th>
                                <th class="px-4 py-3 font-medium">Jenis Kelamin</th>
                                <th class="px-4 py-3 font-medium">Poin Pelanggaran</th>
                                <th class="px-4 py-3 text-center font-medium">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-forest-50">
                            @foreach ([
                            ['nisn' => '0051234567', 'nama' => 'Budi Santoso', 'kelas' => 'XII RPL 1', 'jk' =>
                            'Laki-laki', 'poin' => 0],
                            ['nisn' => '0051234568', 'nama' => 'Nadia Putri Ayu', 'kelas' => 'XI TKJ 2', 'jk' =>
                            'Perempuan', 'poin' => 5],
                            ['nisn' => '0051234569', 'nama' => 'Rangga Aji Nugroho', 'kelas' => 'X MM 1', 'jk' =>
                            'Laki-laki', 'poin' => 25],
                            ['nisn' => '0051234570', 'nama' => 'Salsabila Rahma', 'kelas' => 'XII RPL 1', 'jk' =>
                            'Perempuan', 'poin' => 0],
                            ['nisn' => '0051234571', 'nama' => 'Luthfi Ardiansyah', 'kelas' => 'X RPL 1', 'jk' =>
                            'Laki-laki', 'poin' => 45],
                            ] as $siswa)
                            <tr class="hover:bg-forest-50/30 transition-colors">
                                <td class="px-5 py-3.5 text-forest-500">{{ $siswa['nisn'] }}</td>
                                <td class="px-5 py-3.5 text-forest-900 font-semibold">{{ $siswa['nama'] }}</td>
                                <td class="px-4 py-3.5 text-forest-600">{{ $siswa['kelas'] }}</td>
                                <td class="px-4 py-3.5 text-forest-600">{{ $siswa['jk'] }}</td>
                                <td class="px-4 py-3.5">
                                    <span
                                        class="px-2.5 py-1 rounded-full text-[11px] font-semibold {{ $siswa['poin'] > 20 ? 'bg-red-50 text-red-600' : 'bg-forest-50 text-forest-700' }}">
                                        {{ $siswa['poin'] }} Poin
                                    </span>
                                </td>
                                <td class="px-4 py-3.5 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button title="Detail Siswa"
                                            class="p-1.5 hover:bg-forest-100 text-forest-600 rounded-lg transition-colors">
                                            <i data-lucide="eye" class="h-4 w-4"></i>
                                        </button>
                                        <button title="Edit Data"
                                            class="p-1.5 hover:bg-sun-100 text-sun-600 rounded-lg transition-colors">
                                            <i data-lucide="edit-3" class="h-4 w-4"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        lucide.createIcons();
    });
    </script>
</body>

</html>