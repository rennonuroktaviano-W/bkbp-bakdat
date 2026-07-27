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
            </div>

            {{-- Form Input CRUD (Client-Side / Tanpa Database) --}}
            <div class="bg-white rounded-2xl border border-forest-100 shadow-sm p-6">
                <h3 id="formTitle" class="font-display font-bold text-sm text-forest-950 mb-4 flex items-center gap-2">
                    <i data-lucide="edit-3" class="h-4 w-4 text-emerald-600"></i> Form Catat Pelanggaran Baru
                </h3>

                <form id="pelanggaranForm" onsubmit="saveData(event)"
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                    {{-- Hidden Index for Edit Mode --}}
                    <input type="hidden" id="editIndex" value="-1">

                    {{-- Nama Siswa --}}
                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold text-forest-700">Nama Siswa</label>
                        <input type="text" id="inputNama" required placeholder="Masukkan nama siswa..."
                            class="w-full text-xs border border-forest-200 bg-forest-50/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all">
                    </div>

                    {{-- Jenis Pelanggaran --}}
                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold text-forest-700">Jenis Pelanggaran</label>
                        <input type="text" id="inputPelanggaran" required
                            placeholder="Contoh: Membolos jam pelajaran..."
                            class="w-full text-xs border border-forest-200 bg-forest-50/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all">
                    </div>

                    {{-- Poin --}}
                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold text-forest-700">Poin Diberikan</label>
                        <input type="number" id="inputPoin" required placeholder="Contoh: 10" min="1" max="100"
                            class="w-full text-xs border border-forest-200 bg-forest-50/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all">
                    </div>

                    {{-- Guru Pelapor --}}
                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold text-forest-700">Guru Pelapor</label>
                        <input type="text" id="inputGuru" required placeholder="Nama guru pelapor..."
                            class="w-full text-xs border border-forest-200 bg-forest-50/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all">
                    </div>

                    {{-- Tanggal --}}
                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold text-forest-700">Tanggal Kejadian</label>
                        <input type="date" id="inputTanggal" required
                            class="w-full text-xs border border-forest-200 bg-forest-50/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all">
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex items-end gap-2">
                        <button type="submit" id="btnSubmit"
                            class="w-full bg-forest-800 hover:bg-forest-900 text-white text-xs font-medium px-4 py-2.5 rounded-xl flex items-center justify-center gap-2 transition-colors">
                            <i data-lucide="plus" class="h-4 w-4"></i> Simpan Pelanggaran
                        </button>
                        <button type="button" id="btnCancel" onclick="resetForm()"
                            class="hidden bg-gray-200 hover:bg-gray-300 text-forest-800 text-xs font-medium px-4 py-2.5 rounded-xl transition-colors">
                            Batal
                        </button>
                    </div>
                </form>
            </div>

            {{-- Table Catatan Pelanggaran --}}
            <div class="rounded-2xl bg-white border border-forest-100 shadow-sm overflow-hidden">
                {{-- Scroll container jika melebihi 7 baris --}}
                <div class="max-h-[380px] overflow-y-auto">
                    <table class="w-full text-xs text-left relative">
                        <thead
                            class="bg-forest-50/90 text-forest-500 border-b border-forest-100 sticky top-0 z-10 backdrop-blur-sm">
                            <tr>
                                <th class="px-5 py-3">Siswa</th>
                                <th class="px-4 py-3">Pelanggaran</th>
                                <th class="px-4 py-3">Poin Added</th>
                                <th class="px-4 py-3">Accumulation Progress</th>
                                <th class="px-4 py-3">Guru Pelapor</th>
                                <th class="px-4 py-3">Tanggal</th>
                                <th class="px-4 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody" class="divide-y divide-forest-50">
                            {{-- Content generated dynamically via JavaScript --}}
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>

    {{-- MODAL KONFIRMASI HAPUS --}}
    <div id="deleteModal"
        class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-50 flex items-center justify-center hidden p-4 transition-all duration-200">
        <div class="bg-white rounded-2xl border border-forest-100 p-6 shadow-xl max-w-sm w-full text-center space-y-4">
            <div class="w-12 h-12 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto">
                <i data-lucide="alert-triangle" class="h-6 w-6"></i>
            </div>
            <div>
                <h4 class="font-display font-bold text-base text-forest-950">Hapus Data Pelanggaran?</h4>
                <p class="text-xs text-forest-500 mt-1">
                    Apakah kamu yakin ingin menghapus data pelanggaran <span id="deleteTargetNama"
                        class="font-semibold text-forest-900"></span>?
                </p>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="button" onclick="closeDeleteModal()"
                    class="flex-1 bg-forest-50 hover:bg-forest-100 text-forest-700 text-xs font-semibold py-2.5 rounded-xl transition-colors">
                    Batal
                </button>
                <button type="button" onclick="confirmDelete()"
                    class="flex-1 bg-red-600 hover:bg-red-700 text-white text-xs font-semibold py-2.5 rounded-xl transition-colors shadow-sm">
                    Ya, Hapus
                </button>
            </div>
        </div>
    </div>

    <script>
    // Array penampung data sementara di halaman
    let pelanggaranList = [];
    let deleteTargetIndex = null;

    function renderTable() {
        const tbody = document.getElementById('tableBody');
        tbody.innerHTML = '';

        if (pelanggaranList.length === 0) {
            tbody.innerHTML = `
                    <tr>
                        <td colspan="7" class="px-5 py-12 text-center">
                            <div class="flex flex-col items-center justify-center text-forest-400">
                                <div class="bg-forest-50 p-3 rounded-full mb-3">
                                    <i data-lucide="inbox" class="h-6 w-6"></i>
                                </div>
                                <p class="font-medium text-forest-600">Belum ada data pelanggaran</p>
                                <p class="text-[10px] mt-1">Silakan gunakan form di atas untuk menambah data baru.</p>
                            </div>
                        </td>
                    </tr>
                `;
        } else {
            pelanggaranList.forEach((item, index) => {
                const totalPoin = Math.min(item.poin, 100);
                const progressColor = totalPoin >= 50 ? 'bg-red-500' : (totalPoin >= 30 ? 'bg-amber-400' :
                    'bg-emerald-500');

                const row = document.createElement('tr');
                row.className = 'hover:bg-forest-50/50 transition-colors';
                row.innerHTML = `
                        <td class="px-5 py-3 font-semibold text-forest-900">${item.nama}</td>
                        <td class="px-4 py-3">${item.pelanggaran}</td>
                        <td class="px-4 py-3 font-bold text-red-500">+${item.poin}</td>
                        <td class="px-4 py-3">
                            <div class="w-32">
                                <div class="flex justify-between text-[10px] mb-1 font-semibold">
                                    <span>${totalPoin} / 100</span>
                                </div>
                                <div class="h-2 w-full bg-forest-100 rounded-full overflow-hidden">
                                    <div class="h-full ${progressColor}" style="width: ${totalPoin}%"></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-forest-600">${item.guru}</td>
                        <td class="px-4 py-3 text-forest-400">${item.tanggal}</td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <button onclick="editData(${index})" class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Edit Data">
                                    <i data-lucide="pencil" class="h-4 w-4"></i>
                                </button>
                                <button onclick="openDeleteModal(${index})" class="p-1.5 text-red-500 hover:bg-red-50 rounded-lg transition-colors" title="Hapus Data">
                                    <i data-lucide="trash-2" class="h-4 w-4"></i>
                                </button>
                            </div>
                        </td>
                    `;
                tbody.appendChild(row);
            });
        }
        lucide.createIcons();
    }

    function saveData(e) {
        e.preventDefault();
        const editIndex = parseInt(document.getElementById('editIndex').value);
        const data = {
            nama: document.getElementById('inputNama').value,
            pelanggaran: document.getElementById('inputPelanggaran').value,
            poin: parseInt(document.getElementById('inputPoin').value),
            guru: document.getElementById('inputGuru').value,
            tanggal: document.getElementById('inputTanggal').value,
        };

        if (editIndex === -1) {
            // Tambah Data Baru
            pelanggaranList.push(data);
        } else {
            // Update Data
            pelanggaranList[editIndex] = data;
        }

        resetForm();
        renderTable();
    }

    function editData(index) {
        const item = pelanggaranList[index];
        document.getElementById('editIndex').value = index;
        document.getElementById('inputNama').value = item.nama;
        document.getElementById('inputPelanggaran').value = item.pelanggaran;
        document.getElementById('inputPoin').value = item.poin;
        document.getElementById('inputGuru').value = item.guru;
        document.getElementById('inputTanggal').value = item.tanggal;

        document.getElementById('formTitle').innerHTML =
            `<i data-lucide="edit-3" class="h-4 w-4 text-blue-600"></i> Edit Data Pelanggaran`;
        document.getElementById('btnSubmit').innerHTML = `<i data-lucide="check" class="h-4 w-4"></i> Update Data`;
        document.getElementById('btnSubmit').className =
            "w-full bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium px-4 py-2.5 rounded-xl flex items-center justify-center gap-2 transition-colors";
        document.getElementById('btnCancel').classList.remove('hidden');
        lucide.createIcons();
    }

    // Modal Delete Logic
    function openDeleteModal(index) {
        deleteTargetIndex = index;
        document.getElementById('deleteTargetNama').textContent = `"${pelanggaranList[index].nama}"`;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        deleteTargetIndex = null;
        document.getElementById('deleteModal').classList.add('hidden');
    }

    function confirmDelete() {
        if (deleteTargetIndex !== null) {
            pelanggaranList.splice(deleteTargetIndex, 1);
            closeDeleteModal();
            renderTable();
        }
    }

    function resetForm() {
        document.getElementById('pelanggaranForm').reset();
        document.getElementById('editIndex').value = -1;
        document.getElementById('formTitle').innerHTML =
            `<i data-lucide="edit-3" class="h-4 w-4 text-emerald-600"></i> Form Catat Pelanggaran Baru`;
        document.getElementById('btnSubmit').innerHTML =
            `<i data-lucide="plus" class="h-4 w-4"></i> Simpan Pelanggaran`;
        document.getElementById('btnSubmit').className =
            "w-full bg-forest-800 hover:bg-forest-900 text-white text-xs font-medium px-4 py-2.5 rounded-xl flex items-center justify-center gap-2 transition-colors";
        document.getElementById('btnCancel').classList.add('hidden');
        lucide.createIcons();
    }

    // Inisialisasi awal
    renderTable();
    </script>
</body>

</html>