<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Rekap Absensi - BK/BP Application</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    @media print {
        body {
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .no-print {
            display: none;
        }
    }
    </style>
</head>

<body class="bg-white p-8 text-black font-sans" onload="window.print()">

    {{-- Kop Laporan / Header Cetak --}}
    <div class="mb-6 border-b-2 border-gray-800 pb-4 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold uppercase tracking-wide">Laporan Rekap Absensi Siswa</h1>
            <p class="text-sm text-gray-600 mt-1">Bimbingan Konseling (BK / BP) Application</p>
        </div>
        <div class="text-right">
            <p class="text-sm font-semibold">Tanggal Cetak:</p>
            <p class="text-sm text-gray-600">{{ now()->format('d/m/Y') }}</p>
        </div>
    </div>

    <div class="space-y-6">

        {{-- 1. TABEL ALPHA --}}
        <div>
            <h3 class="text-base font-bold text-red-600 mb-2">Daftar Siswa Alpha</h3>
            <table class="w-full border-collapse border border-gray-300 text-xs">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="border border-gray-300 p-2 w-10 text-center">No</th>
                        <th class="border border-gray-300 p-2 text-left">Nama Siswa</th>
                        <th class="border border-gray-300 p-2 text-left">Kelas</th>
                        <th class="border border-gray-300 p-2 text-center">Ketidakhadiran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ([
                    ['nama' => 'Rangga Aji Nugroho', 'kelas' => 'X MM 1', 'total' => 8],
                    ['nama' => 'Bagas Firmansyah', 'kelas' => 'XI TKJ 1', 'total' => 5],
                    ['nama' => 'Kevin Pratama', 'kelas' => 'XII RPL 2', 'total' => 3],
                    ['nama' => 'Luthfi Ardiansyah', 'kelas' => 'X RPL 1', 'total' => 11],
                    ['nama' => 'Muhammad Rizky', 'kelas' => 'XI MM 2', 'total' => 2],
                    ] as $index => $s)
                    <tr>
                        <td class="border border-gray-300 p-2 text-center">{{ $index + 1 }}</td>
                        <td class="border border-gray-300 p-2 font-medium">{{ $s['nama'] }}</td>
                        <td class="border border-gray-300 p-2">{{ $s['kelas'] }}</td>
                        <td class="border border-gray-300 p-2 text-center text-red-600 font-semibold">{{ $s['total'] }}x
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- 2. TABEL IZIN --}}
        <div>
            <h3 class="text-base font-bold text-amber-600 mb-2">Daftar Siswa Izin</h3>
            <table class="w-full border-collapse border border-gray-300 text-xs">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="border border-gray-300 p-2 w-10 text-center">No</th>
                        <th class="border border-gray-300 p-2 text-left">Nama Siswa</th>
                        <th class="border border-gray-300 p-2 text-left">Kelas</th>
                        <th class="border border-gray-300 p-2 text-left">Keterangan</th>
                        <th class="border border-gray-300 p-2 text-center">Surat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ([
                    ['nama' => 'Nadia Putri Ayu', 'kelas' => 'XI TKJ 2', 'ket' => 'Acara keluarga', 'surat' => true],
                    ['nama' => 'Salsabila Rahma', 'kelas' => 'XII RPL 1', 'ket' => 'Keperluan pribadi', 'surat' =>
                    false],
                    ['nama' => 'Wahyu Setiawan', 'kelas' => 'X TKJ 1', 'ket' => 'Lomba OSN Kabupaten', 'surat' => true],
                    ['nama' => 'Tiara Agustina', 'kelas' => 'XI MM 1', 'ket' => 'Wisuda kakak', 'surat' => true],
                    ] as $index => $s)
                    <tr>
                        <td class="border border-gray-300 p-2 text-center">{{ $index + 1 }}</td>
                        <td class="border border-gray-300 p-2 font-medium">{{ $s['nama'] }}</td>
                        <td class="border border-gray-300 p-2">{{ $s['kelas'] }}</td>
                        <td class="border border-gray-300 p-2">{{ $s['ket'] }}</td>
                        <td class="border border-gray-300 p-2 text-center">
                            {{ $s['surat'] ? 'Ada' : 'Tidak ada' }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- 3. TABEL SAKIT --}}
        <div>
            <h3 class="text-base font-bold text-sky-600 mb-2">Daftar Siswa Sakit</h3>
            <table class="w-full border-collapse border border-gray-300 text-xs">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="border border-gray-300 p-2 w-10 text-center">No</th>
                        <th class="border border-gray-300 p-2 text-left">Nama Siswa</th>
                        <th class="border border-gray-300 p-2 text-left">Kelas</th>
                        <th class="border border-gray-300 p-2 text-center">Hari ke-</th>
                        <th class="border border-gray-300 p-2 text-center">Surat Dokter</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ([
                    ['nama' => 'Andini Permatasari', 'kelas' => 'XII MM 2', 'hari' => 1, 'dokter' => false],
                    ['nama' => 'Bima Arya Wicaksono', 'kelas' => 'X RPL 2', 'hari' => 3, 'dokter' => true],
                    ['nama' => 'Chelsy Amelia', 'kelas' => 'XI TKJ 1', 'hari' => 1, 'dokter' => false],
                    ['nama' => 'Dita Puspitasari', 'kelas' => 'XII TKJ 2', 'hari' => 2, 'dokter' => true],
                    ['nama' => 'Evan Mahendra', 'kelas' => 'X MM 2', 'hari' => 1, 'dokter' => false],
                    ] as $index => $s)
                    <tr>
                        <td class="border border-gray-300 p-2 text-center">{{ $index + 1 }}</td>
                        <td class="border border-gray-300 p-2 font-medium">{{ $s['nama'] }}</td>
                        <td class="border border-gray-300 p-2">{{ $s['kelas'] }}</td>
                        <td class="border border-gray-300 p-2 text-center">Hari ke-{{ $s['hari'] }}</td>
                        <td class="border border-gray-300 p-2 text-center">
                            {{ $s['dokter'] ? 'Ada' : 'Belum ada' }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    {{-- Tanda Tangan / Footer Dokumen --}}
    <div class="mt-12 flex justify-end">
        <div class="text-center">
            <p class="text-xs text-gray-600">Mengetahui,</p>
            <p class="text-xs font-semibold mb-12">Guru Bimbingan Konseling (BK)</p>
            <p class="text-xs font-bold underline">( ........................................ )</p>
        </div>
    </div>

    <script>
    // Tutup tab otomatis setelah dialog print selesai / dibatalkan
    window.onafterprint = function() {
        window.close();
    }
    </script>
</body>

</html>