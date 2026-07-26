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
                <button onclick="openModal()"
                    class="inline-flex items-center gap-2 bg-forest-800 hover:bg-forest-700 text-white text-sm font-body font-medium px-4 py-2.5 rounded-xl transition-colors shrink-0 shadow-sm cursor-pointer">
                    <i data-lucide="user-plus" class="h-4 w-4"></i>
                    Tambah Siswa Baru
                </button>
            </div>

            {{-- Filter Modern & Pencarian --}}
            <div class="rounded-2xl bg-white border border-forest-100 shadow-sm p-4 space-y-4">
                <div class="w-full">
                    <div class="relative w-full">
                        <i data-lucide="search"
                            class="h-4 w-4 text-forest-400 absolute left-3.5 top-1/2 -translate-y-1/2"></i>
                        <input type="text" id="inputSearch" onkeyup="filterSiswa()" placeholder="Cari nama atau NISN..."
                            class="w-full pl-10 pr-4 py-2 rounded-xl border border-forest-200 text-xs font-body text-forest-800 focus:outline-none focus:ring-2 focus:ring-forest-400/40">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 pt-2 border-t border-forest-100 items-center">
                    <div class="flex items-center gap-1.5 overflow-x-auto w-full">
                        <span class="text-[11px] font-medium text-forest-500 px-1 shrink-0">Kelas:</span>
                        <button type="button" onclick="setFilterKelas('', this)" data-value=""
                            class="kelas-btn px-3 py-1.5 rounded-lg text-xs font-medium transition-all cursor-pointer bg-forest-900 text-white shadow-sm">Semua</button>
                        <button type="button" onclick="setFilterKelas('X', this)" data-value="X"
                            class="kelas-btn px-3 py-1.5 rounded-lg text-xs font-medium transition-all cursor-pointer bg-forest-50 text-forest-600 hover:bg-forest-100">X</button>
                        <button type="button" onclick="setFilterKelas('XI', this)" data-value="XI"
                            class="kelas-btn px-3 py-1.5 rounded-lg text-xs font-medium transition-all cursor-pointer bg-forest-50 text-forest-600 hover:bg-forest-100">XI</button>
                        <button type="button" onclick="setFilterKelas('XII', this)" data-value="XII"
                            class="kelas-btn px-3 py-1.5 rounded-lg text-xs font-medium transition-all cursor-pointer bg-forest-50 text-forest-600 hover:bg-forest-100">XII</button>
                    </div>

                    <div class="flex items-center justify-start md:justify-end gap-1.5 overflow-x-auto w-full">
                        <span class="text-[11px] font-medium text-forest-500 px-1 shrink-0">Jurusan:</span>
                        <button type="button" onclick="setFilterJurusan('', this)" data-value=""
                            class="jurusan-btn px-3 py-1.5 rounded-lg text-xs font-medium transition-all cursor-pointer bg-forest-800 text-white shadow-sm">Semua
                            Jurusan</button>
                        <button type="button" onclick="setFilterJurusan('RPL', this)" data-value="RPL"
                            class="jurusan-btn px-3 py-1.5 rounded-lg text-xs font-medium transition-all cursor-pointer bg-forest-50 text-forest-600 hover:bg-forest-100">RPL</button>
                        <button type="button" onclick="setFilterJurusan('TKJ', this)" data-value="TKJ"
                            class="jurusan-btn px-3 py-1.5 rounded-lg text-xs font-medium transition-all cursor-pointer bg-forest-50 text-forest-600 hover:bg-forest-100">TKJ</button>
                        <button type="button" onclick="setFilterJurusan('DKV', this)" data-value="DKV"
                            class="jurusan-btn px-3 py-1.5 rounded-lg text-xs font-medium transition-all cursor-pointer bg-forest-50 text-forest-600 hover:bg-forest-100">DKV</button>
                    </div>
                </div>
            </div>

            {{-- Tabel Daftar Siswa --}}
            <div class="rounded-2xl bg-white border border-forest-100 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-xs text-left font-body" id="tabelSiswa">
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
                        <tbody class="divide-y divide-forest-50" id="listSiswaBody">
                            <tr class="hover:bg-forest-50/30 transition-colors" data-nama="Budi Santoso"
                                data-kelas="XII" data-jurusan="RPL" data-hp="081234567890" data-hportu="089876543210"
                                data-jk="Laki-laki" data-poin="0">
                                <td class="px-5 py-3.5 text-forest-500 nisn-val">0051234567</td>
                                <td class="px-5 py-3.5 text-forest-900 font-semibold nama-val">Budi Santoso</td>
                                <td class="px-4 py-3.5 text-forest-600 kelas-val">XII RPL</td>
                                <td class="px-4 py-3.5 text-forest-600 jk-val">Laki-laki</td>
                                <td class="px-4 py-3.5">
                                    <span
                                        class="px-2.5 py-1 rounded-full text-[11px] font-semibold bg-forest-50 text-forest-700 poin-val">0
                                        Poin</span>
                                </td>
                                <td class="px-4 py-3.5 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button title="Edit Data" onclick="openEditModal(this)"
                                            class="p-1.5 hover:bg-amber-100 text-amber-600 rounded-lg transition-colors cursor-pointer"><i
                                                data-lucide="edit-3" class="h-4 w-4"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>

    {{-- MODAL TAMBAH SISWA BARU --}}
    <div id="tambahSiswaModal"
        class="fixed inset-0 z-50 hidden bg-forest-950/50 backdrop-blur-sm flex items-center justify-center p-4 overflow-y-auto">
        <div
            class="bg-white rounded-2xl max-w-lg w-full shadow-xl border border-forest-100 overflow-hidden transform transition-all">
            <div class="px-6 py-4 border-b border-forest-100 flex items-center justify-between bg-forest-50/50">
                <div class="flex items-center gap-2">
                    <i data-lucide="user-plus" class="h-5 w-5 text-forest-800"></i>
                    <h3 class="font-display font-bold text-base text-forest-950">Tambah Siswa Baru</h3>
                </div>
                <button onclick="closeModal()"
                    class="p-1.5 text-forest-400 hover:text-forest-700 hover:bg-forest-100 rounded-lg transition-colors cursor-pointer">
                    <i data-lucide="x" class="h-5 w-5"></i>
                </button>
            </div>
            <div class="p-6 font-body text-xs">
                <form id="formTambahSiswa" onsubmit="simpanTambahSiswa(event)" class="space-y-4">
                    <div>
                        <label class="block font-medium text-forest-700 mb-1">NISN (Angka)</label>
                        <input type="number" id="tambahNisn" required placeholder="Contoh: 0051234567"
                            class="w-full px-3 py-2 rounded-xl border border-forest-200 focus:outline-none focus:ring-2 focus:ring-forest-400/40 text-forest-800">
                    </div>
                    <div>
                        <label class="block font-medium text-forest-700 mb-1">Nama Lengkap Siswa (Hanya Huruf)</label>
                        <input type="text" id="tambahNama" required placeholder="Nama lengkap siswa"
                            class="w-full px-3 py-2 rounded-xl border border-forest-200 focus:outline-none focus:ring-2 focus:ring-forest-400/40 text-forest-800">
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block font-medium text-forest-700 mb-1">No. HP Siswa (Angka)</label>
                            <input type="number" id="tambahHp" required placeholder="08xxxxxxxxxx"
                                class="w-full px-3 py-2 rounded-xl border border-forest-200 focus:outline-none focus:ring-2 focus:ring-forest-400/40 text-forest-800">
                        </div>
                        <div>
                            <label class="block font-medium text-forest-700 mb-1">No. HP Orang Tua (Angka)</label>
                            <input type="number" id="tambahHpOrtu" required placeholder="08xxxxxxxxxx"
                                class="w-full px-3 py-2 rounded-xl border border-forest-200 focus:outline-none focus:ring-2 focus:ring-forest-400/40 text-forest-800">
                        </div>
                    </div>

                    {{-- Pilihan Kelas / Rombel Tambah Siswa --}}
                    <div>
                        <label class="block font-medium text-forest-700 mb-1.5">Kelas / Rombel</label>
                        <input type="hidden" id="tambahKelas" required>
                        <div id="containerPilihanKelasTambah" class="grid grid-cols-3 gap-2">
                            <!-- Diisi via Javascript -->
                        </div>
                    </div>

                    {{-- Pilihan Jenis Kelamin Tambah Siswa --}}
                    <div>
                        <label class="block font-medium text-forest-700 mb-1.5">Jenis Kelamin</label>
                        <input type="hidden" id="tambahJk" required>
                        <div class="flex gap-2">
                            <button type="button" onclick="pilihJkTambah('Laki-laki', this)"
                                class="jk-pill-tambah flex-1 py-2 px-3 rounded-xl border border-forest-200 text-center font-medium transition-all cursor-pointer text-forest-600 hover:bg-forest-50">Laki-laki</button>
                            <button type="button" onclick="pilihJkTambah('Perempuan', this)"
                                class="jk-pill-tambah flex-1 py-2 px-3 rounded-xl border border-forest-200 text-center font-medium transition-all cursor-pointer text-forest-600 hover:bg-forest-50">Perempuan</button>
                        </div>
                    </div>

                    <div class="pt-3 flex justify-end gap-2">
                        <button type="button" onclick="closeModal()"
                            class="px-4 py-2 rounded-xl border border-forest-200 text-forest-600 hover:bg-forest-50 transition-colors cursor-pointer">Batal</button>
                        <button type="submit"
                            class="px-4 py-2 rounded-xl bg-forest-800 text-white hover:bg-forest-700 transition-colors cursor-pointer shadow-sm">Simpan
                            Siswa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- MODAL EDIT DATA SISWA --}}
    <div id="editSiswaModal"
        class="fixed inset-0 z-50 hidden bg-forest-950/50 backdrop-blur-sm flex items-center justify-center p-4 overflow-y-auto">
        <div
            class="bg-white rounded-2xl max-w-lg w-full shadow-xl border border-forest-100 overflow-hidden transform transition-all">
            <div class="px-6 py-4 border-b border-forest-100 flex items-center justify-between bg-forest-50/50">
                <div class="flex items-center gap-2">
                    <i data-lucide="edit-3" class="h-5 w-5 text-forest-800"></i>
                    <h3 class="font-display font-bold text-base text-forest-950">Edit Data Siswa</h3>
                </div>
                <button onclick="closeEditModal()"
                    class="p-1.5 text-forest-400 hover:text-forest-700 hover:bg-forest-100 rounded-lg transition-colors cursor-pointer">
                    <i data-lucide="x" class="h-5 w-5"></i>
                </button>
            </div>
            <div class="p-6 font-body text-xs">
                <form id="formEditSiswa" onsubmit="simpanEditSiswa(event)" class="space-y-4">
                    <input type="hidden" id="editIndex">
                    <div>
                        <label class="block font-medium text-forest-700 mb-1">NISN (Angka)</label>
                        <input type="number" id="editNisn" required placeholder="Contoh: 0051234567"
                            class="w-full px-3 py-2 rounded-xl border border-forest-200 focus:outline-none focus:ring-2 focus:ring-forest-400/40 text-forest-800">
                    </div>
                    <div>
                        <label class="block font-medium text-forest-700 mb-1">Nama Lengkap Siswa</label>
                        <input type="text" id="editNama" required
                            class="w-full px-3 py-2 rounded-xl border border-forest-200 focus:outline-none focus:ring-2 focus:ring-forest-400/40 text-forest-800">
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block font-medium text-forest-700 mb-1">No. HP Siswa</label>
                            <input type="number" id="editHp" required
                                class="w-full px-3 py-2 rounded-xl border border-forest-200 focus:outline-none focus:ring-2 focus:ring-forest-400/40 text-forest-800">
                        </div>
                        <div>
                            <label class="block font-medium text-forest-700 mb-1">No. HP Orang Tua</label>
                            <input type="number" id="editHpOrtu" required
                                class="w-full px-3 py-2 rounded-xl border border-forest-200 focus:outline-none focus:ring-2 focus:ring-forest-400/40 text-forest-800">
                        </div>
                    </div>

                    <div>
                        <label class="block font-medium text-forest-700 mb-1.5">Kelas / Rombel</label>
                        <input type="hidden" id="editKelas" required>
                        <div id="containerPilihanKelas" class="grid grid-cols-3 gap-2">
                            <!-- Diisi via Javascript -->
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block font-medium text-forest-700 mb-1.5">Jenis Kelamin</label>
                            <input type="hidden" id="editJk" required>
                            <div class="flex gap-2">
                                <button type="button" onclick="pilihJk('Laki-laki', this)"
                                    class="jk-pill flex-1 py-2 px-3 rounded-xl border border-forest-200 text-center font-medium transition-all cursor-pointer text-forest-600 hover:bg-forest-50">Laki-laki</button>
                                <button type="button" onclick="pilihJk('Perempuan', this)"
                                    class="jk-pill flex-1 py-2 px-3 rounded-xl border border-forest-200 text-center font-medium transition-all cursor-pointer text-forest-600 hover:bg-forest-50">Perempuan</button>
                            </div>
                        </div>
                        <div>
                            <label class="block font-medium text-forest-700 mb-1.5">Poin Pelanggaran</label>
                            <input type="number" id="editPoin" required
                                class="w-full px-2.5 py-2 rounded-xl border border-forest-200 focus:outline-none focus:ring-2 focus:ring-forest-400/40 text-forest-800">
                        </div>
                    </div>

                    <div class="pt-3 flex justify-end gap-2">
                        <button type="button" onclick="closeEditModal()"
                            class="px-4 py-2 rounded-xl border border-forest-200 text-forest-600 hover:bg-forest-50 transition-colors cursor-pointer">Batal</button>
                        <button type="submit"
                            class="px-4 py-2 rounded-xl bg-forest-800 text-white hover:bg-forest-700 transition-colors cursor-pointer shadow-sm">Perbarui
                            Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Script Logic --}}
    <script>
    let activeRowToEdit = null;
    let selectedKelasFilter = "";
    let selectedJurusanFilter = "";

    const daftarKelasOpsi = [
        "X RPL", "XI RPL", "XII RPL",
        "X TKJ", "XI TKJ", "XII TKJ",
        "X DKV 1", "X DKV 2", "XI DKV 1", "XI DKV 2", "XII DKV 1", "XII DKV 2"
    ];

    document.addEventListener('DOMContentLoaded', () => {
        lucide.createIcons();
        urutkanTabelOtomatis();
        renderPilihanKelasEdit();
        renderPilihanKelasTambah();
    });

    // Fungsi Modal Tambah Siswa
    function openModal() {
        document.getElementById('tambahSiswaModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('tambahSiswaModal').classList.add('hidden');
        document.getElementById('formTambahSiswa').reset();
        renderPilihanKelasTambah(); // Reset pilihan kelas
        document.querySelectorAll('.jk-pill-tambah').forEach(b => {
            b.className =
                "jk-pill-tambah flex-1 py-2 px-3 rounded-xl border border-forest-200 text-center font-medium transition-all cursor-pointer text-forest-600 hover:bg-forest-50";
        });
    }

    function renderPilihanKelasTambah(kelasAktif = "") {
        const container = document.getElementById('containerPilihanKelasTambah');
        container.innerHTML = '';
        daftarKelasOpsi.forEach(kls => {
            const isSelected = kls === kelasAktif;
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.textContent = kls;
            btn.className = `kelas-pill-tambah py-2 px-2 rounded-xl border text-center font-medium transition-all cursor-pointer text-[11px] ${
                isSelected 
                ? 'bg-forest-800 border-forest-800 text-white shadow-sm' 
                : 'border-forest-200 text-forest-700 hover:bg-forest-50'
            }`;
            btn.onclick = () => pilihKelasTambah(kls, btn);
            container.appendChild(btn);
        });
        document.getElementById('tambahKelas').value = kelasAktif;
    }

    function pilihKelasTambah(kls, btn) {
        document.querySelectorAll('.kelas-pill-tambah').forEach(b => {
            b.className =
                "kelas-pill-tambah py-2 px-2 rounded-xl border border-forest-200 text-center font-medium transition-all cursor-pointer text-[11px] text-forest-700 hover:bg-forest-50";
        });
        btn.className =
            "kelas-pill-tambah py-2 px-2 rounded-xl border border-forest-800 bg-forest-800 text-white text-center font-medium transition-all cursor-pointer text-[11px] shadow-sm";
        document.getElementById('tambahKelas').value = kls;
    }

    function pilihJkTambah(jkVal, btn) {
        document.querySelectorAll('.jk-pill-tambah').forEach(b => {
            b.className =
                "jk-pill-tambah flex-1 py-2 px-3 rounded-xl border border-forest-200 text-center font-medium transition-all cursor-pointer text-forest-600 hover:bg-forest-50";
        });
        btn.className =
            "jk-pill-tambah flex-1 py-2 px-3 rounded-xl border border-forest-800 bg-forest-800 text-white text-center font-medium transition-all cursor-pointer shadow-sm";
        document.getElementById('tambahJk').value = jkVal;
    }

    function simpanTambahSiswa(event) {
        event.preventDefault();

        const nisn = document.getElementById('tambahNisn').value;
        const nama = document.getElementById('tambahNama').value.trim();
        const hp = document.getElementById('tambahHp').value.trim();
        const hpOrtu = document.getElementById('tambahHpOrtu').value.trim();
        const kelas = document.getElementById('tambahKelas').value;
        const jk = document.getElementById('tambahJk').value;

        // Validasi 1: Nama hanya boleh berisi huruf dan spasi
        const regexNama = /^[A-Za-z\s]+$/;
        if (!regexNama.test(nama)) {
            alert('Nama lengkap siswa hanya boleh berisi huruf!');
            return;
        }

        // Validasi 2: No. HP Siswa harus integer (angka saja)
        const regexInteger = /^\d+$/;
        if (!regexInteger.test(hp)) {
            alert('Nomor HP Siswa harus berupa angka (integer)!');
            return;
        }

        // Validasi 3: No. HP Orang Tua harus integer (angka saja)
        if (!regexInteger.test(hpOrtu)) {
            alert('Nomor HP Orang Tua harus berupa angka (integer)!');
            return;
        }

        if (!kelas) {
            alert('Silakan pilih kelas terlebih dahulu!');
            return;
        }
        if (!jk) {
            alert('Silakan pilih jenis kelamin terlebih dahulu!');
            return;
        }

        // Tentukan tingkat & jurusan otomatis berdasarkan string kelas
        const tingkat = kelas.toUpperCase().includes('XII') ? 'XII' : (kelas.toUpperCase().includes('XI') ? 'XI' : 'X');
        const jurusan = kelas.toUpperCase().includes('RPL') ? 'RPL' : (kelas.toUpperCase().includes('TKJ') ? 'TKJ' :
            'DKV');

        // Buat elemen baris <tr> baru
        const tbody = document.getElementById('listSiswaBody');
        const newRow = document.createElement('tr');
        newRow.className = "hover:bg-forest-50/30 transition-colors";
        newRow.setAttribute('data-nama', nama);
        newRow.setAttribute('data-kelas', tingkat);
        newRow.setAttribute('data-jurusan', jurusan);
        newRow.setAttribute('data-hp', hp);
        newRow.setAttribute('data-hportu', hpOrtu);
        newRow.setAttribute('data-jk', jk);
        newRow.setAttribute('data-poin', '0');

        newRow.innerHTML = `
            <td class="px-5 py-3.5 text-forest-500 nisn-val">${nisn}</td>
            <td class="px-5 py-3.5 text-forest-900 font-semibold nama-val">${nama}</td>
            <td class="px-4 py-3.5 text-forest-600 kelas-val">${kelas}</td>
            <td class="px-4 py-3.5 text-forest-600 jk-val">${jk}</td>
            <td class="px-4 py-3.5">
                <span class="px-2.5 py-1 rounded-full text-[11px] font-semibold bg-forest-50 text-forest-700 poin-val">0 Poin</span>
            </td>
            <td class="px-4 py-3.5 text-center">
                <div class="flex items-center justify-center gap-2">
                    <button title="Edit Data" onclick="openEditModal(this)"
                        class="p-1.5 hover:bg-amber-100 text-amber-600 rounded-lg transition-colors cursor-pointer"><i
                            data-lucide="edit-3" class="h-4 w-4"></i></button>
                </div>
            </td>
        `;

        // Masukkan ke tabel dan urutkan kembali
        tbody.appendChild(newRow);
        urutkanTabelOtomatis();

        // Render ulang ikon Lucide untuk tombol edit di baris baru
        lucide.createIcons();

        alert('Siswa baru berhasil ditambahkan!');
        closeModal();
    }

    // Fungsi Pilihan Kelas & Edit Siswa
    function renderPilihanKelasEdit(kelasAktif = "") {
        const container = document.getElementById('containerPilihanKelas');
        container.innerHTML = '';
        daftarKelasOpsi.forEach(kls => {
            const isSelected = kls === kelasAktif;
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.textContent = kls;
            btn.className = `kelas-pill py-2 px-2 rounded-xl border text-center font-medium transition-all cursor-pointer text-[11px] ${
                isSelected 
                ? 'bg-forest-800 border-forest-800 text-white shadow-sm' 
                : 'border-forest-200 text-forest-700 hover:bg-forest-50'
            }`;
            btn.onclick = () => pilihKelasEdit(kls, btn);
            container.appendChild(btn);
        });
        document.getElementById('editKelas').value = kelasAktif;
    }

    function pilihKelasEdit(kls, btn) {
        document.querySelectorAll('.kelas-pill').forEach(b => {
            b.className =
                "kelas-pill py-2 px-2 rounded-xl border border-forest-200 text-center font-medium transition-all cursor-pointer text-[11px] text-forest-700 hover:bg-forest-50";
        });
        btn.className =
            "kelas-pill py-2 px-2 rounded-xl border border-forest-800 bg-forest-800 text-white text-center font-medium transition-all cursor-pointer text-[11px] shadow-sm";
        document.getElementById('editKelas').value = kls;
    }

    function pilihJk(jkVal, btn) {
        document.querySelectorAll('.jk-pill').forEach(b => {
            b.className =
                "jk-pill flex-1 py-2 px-3 rounded-xl border border-forest-200 text-center font-medium transition-all cursor-pointer text-forest-600 hover:bg-forest-50";
        });
        btn.className =
            "jk-pill flex-1 py-2 px-3 rounded-xl border border-forest-800 bg-forest-800 text-white text-center font-medium transition-all cursor-pointer shadow-sm";
        document.getElementById('editJk').value = jkVal;
    }

    function openEditModal(button) {
        activeRowToEdit = button.closest('tr');

        const nisn = activeRowToEdit.querySelector('.nisn-val').textContent;
        const nama = activeRowToEdit.getAttribute('data-nama');
        const kelas = activeRowToEdit.querySelector('.kelas-val').textContent;
        const jk = activeRowToEdit.getAttribute('data-jk');
        const hp = activeRowToEdit.getAttribute('data-hp') || '';
        const hpOrtu = activeRowToEdit.getAttribute('data-hportu') || '';
        const poin = activeRowToEdit.getAttribute('data-poin');

        document.getElementById('editNisn').value = nisn;
        document.getElementById('editNama').value = nama;
        document.getElementById('editHp').value = hp;
        document.getElementById('editHpOrtu').value = hpOrtu;
        document.getElementById('editPoin').value = poin;

        renderPilihanKelasEdit(kelas);
        document.getElementById('editJk').value = jk;

        document.querySelectorAll('.jk-pill').forEach(b => {
            if (b.textContent.trim() === jk) {
                b.className =
                    "jk-pill flex-1 py-2 px-3 rounded-xl border border-forest-800 bg-forest-800 text-white text-center font-medium transition-all cursor-pointer shadow-sm";
            } else {
                b.className =
                    "jk-pill flex-1 py-2 px-3 rounded-xl border border-forest-200 text-center font-medium transition-all cursor-pointer text-forest-600 hover:bg-forest-50";
            }
        });

        document.getElementById('editSiswaModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editSiswaModal').classList.add('hidden');
        activeRowToEdit = null;
    }

    function simpanEditSiswa(event) {
        event.preventDefault();
        if (!activeRowToEdit) return;

        const nisnBaru = parseInt(document.getElementById('editNisn').value, 10);
        const namaBaru = document.getElementById('editNama').value;
        const kelasBaru = document.getElementById('editKelas').value;
        const jkBaru = document.getElementById('editJk').value;
        const hpBaru = document.getElementById('editHp').value;
        const hpOrtuBaru = document.getElementById('editHpOrtu').value;
        const poinBaru = document.getElementById('editPoin').value;

        if (!kelasBaru) {
            alert('Silakan pilih kelas terlebih dahulu!');
            return;
        }

        const tingkatBaru = kelasBaru.toUpperCase().includes('XII') ? 'XII' : (kelasBaru.toUpperCase().includes('XI') ?
            'XI' : 'X');
        const jurusanBaru = kelasBaru.toUpperCase().includes('RPL') ? 'RPL' : (kelasBaru.toUpperCase().includes('TKJ') ?
            'TKJ' : 'DKV');

        activeRowToEdit.setAttribute('data-nama', namaBaru);
        activeRowToEdit.setAttribute('data-kelas', tingkatBaru);
        activeRowToEdit.setAttribute('data-jurusan', jurusanBaru);
        activeRowToEdit.setAttribute('data-jk', jkBaru);
        activeRowToEdit.setAttribute('data-hp', hpBaru);
        activeRowToEdit.setAttribute('data-hportu', hpOrtuBaru);
        activeRowToEdit.setAttribute('data-poin', poinBaru);

        activeRowToEdit.querySelector('.nisn-val').textContent = nisnBaru;
        activeRowToEdit.querySelector('.nama-val').textContent = namaBaru;
        activeRowToEdit.querySelector('.kelas-val').textContent = kelasBaru;
        activeRowToEdit.querySelector('.jk-val').textContent = jkBaru;

        const badgePoin = activeRowToEdit.querySelector('.poin-val');
        badgePoin.textContent = `${poinBaru} Poin`;
        if (parseInt(poinBaru) > 20) {
            badgePoin.className = "px-2.5 py-1 rounded-full text-[11px] font-semibold bg-red-50 text-red-600 poin-val";
        } else {
            badgePoin.className =
                "px-2.5 py-1 rounded-full text-[11px] font-semibold bg-forest-50 text-forest-700 poin-val";
        }

        urutkanTabelOtomatis();
        alert('Data siswa berhasil diperbarui!');
        closeEditModal();
    }

    function setFilterKelas(val, btn) {
        selectedKelasFilter = val;
        document.querySelectorAll('.kelas-btn').forEach(b => {
            b.className =
                "kelas-btn px-3 py-1.5 rounded-lg text-xs font-medium transition-all cursor-pointer bg-forest-50 text-forest-600 hover:bg-forest-100";
        });
        btn.className =
            "kelas-btn px-3 py-1.5 rounded-lg text-xs font-medium transition-all cursor-pointer bg-forest-900 text-white shadow-sm";
        filterSiswa();
    }

    function setFilterJurusan(val, btn) {
        selectedJurusanFilter = val;
        document.querySelectorAll('.jurusan-btn').forEach(b => {
            b.className =
                "jurusan-btn px-3 py-1.5 rounded-lg text-xs font-medium transition-all cursor-pointer bg-forest-50 text-forest-600 hover:bg-forest-100";
        });
        btn.className =
            "jurusan-btn px-3 py-1.5 rounded-lg text-xs font-medium transition-all cursor-pointer bg-forest-800 text-white shadow-sm";
        filterSiswa();
    }

    function filterSiswa() {
        const keyword = document.getElementById('inputSearch').value.toLowerCase();
        const rows = document.querySelectorAll('#listSiswaBody tr');

        rows.forEach(row => {
            const nama = row.getAttribute('data-nama').toLowerCase();
            const nisn = row.querySelector('.nisn-val').textContent.toLowerCase();
            const kelas = row.getAttribute('data-kelas');
            const jurusan = row.getAttribute('data-jurusan');

            const matchSearch = nama.includes(keyword) || nisn.includes(keyword);
            const matchKelas = selectedKelasFilter === "" || kelas === selectedKelasFilter;
            const matchJurusan = selectedJurusanFilter === "" || jurusan === selectedJurusanFilter;

            if (matchSearch && matchKelas && matchJurusan) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }

    function urutkanTabelOtomatis() {
        const tbody = document.getElementById('listSiswaBody');
        const rows = Array.from(tbody.querySelectorAll('tr'));

        rows.sort((a, b) => {
            const namaA = a.getAttribute('data-nama').toLowerCase();
            const namaB = b.getAttribute('data-nama').toLowerCase();
            return namaA.localeCompare(namaB);
        });

        rows.forEach(row => tbody.appendChild(row));
    }
    </script>
</body>

</html>