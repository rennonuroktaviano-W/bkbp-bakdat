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
            </div>

            {{-- Form Input CRUD Konseling (Redesigned) --}}
            <div class="bg-white rounded-2xl border border-forest-100 shadow-sm p-6 lg:p-8 relative overflow-hidden">
                {{-- Aksen Header Card --}}
                <div
                    class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-emerald-500 via-teal-500 to-forest-700">
                </div>

                <div class="flex items-center justify-between mb-6">
                    <h3 id="formTitle" class="font-display font-bold text-sm text-forest-950 flex items-center gap-2">
                        <span class="p-2 bg-emerald-50 text-emerald-600 rounded-xl">
                            <i data-lucide="calendar-plus" class="h-4 w-4"></i>
                        </span>
                        Form Jadwalkan Sesi Konseling Baru
                    </h3>
                    <span class="text-[11px] text-forest-400 hidden sm:inline-block">* Wajib diisi seluruh
                        kolomnya</span>
                </div>

                <form id="konselingForm" onsubmit="saveData(event)" class="space-y-5">
                    {{-- Hidden Index for Edit Mode --}}
                    <input type="hidden" id="editIndex" value="-1">

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                        {{-- Nama Siswa --}}
                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold text-forest-700 flex items-center gap-1.5">
                                <i data-lucide="user" class="h-3.5 w-3.5 text-forest-400"></i> Nama Siswa
                            </label>
                            <div class="relative">
                                <input type="text" id="inputNama" required placeholder="Masukkan nama siswa..."
                                    class="w-full text-xs border border-forest-200 bg-forest-50/40 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-2xs">
                            </div>
                        </div>

                        {{-- Konselor (Guru BK) --}}
                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold text-forest-700 flex items-center gap-1.5">
                                <i data-lucide="user-check" class="h-3.5 w-3.5 text-forest-400"></i> Konselor (Guru BK)
                            </label>
                            <div class="relative">
                                <input type="text" id="inputKonselor" required placeholder="Nama Guru BK..."
                                    class="w-full text-xs border border-forest-200 bg-forest-50/40 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-2xs">
                            </div>
                        </div>

                        {{-- Status Konseling --}}
                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold text-forest-700 flex items-center gap-1.5">
                                <i data-lucide="activity" class="h-3.5 w-3.5 text-forest-400"></i> Status Sesi
                            </label>
                            <div class="relative">
                                <select id="inputStatus" required
                                    class="w-full text-xs border border-forest-200 bg-forest-50/40 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-2xs">
                                    <option value="Proses">Proses</option>
                                    <option value="Dijadwalkan">Dijadwalkan</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                            </div>
                        </div>

                        {{-- Tanggal --}}
                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold text-forest-700 flex items-center gap-1.5">
                                <i data-lucide="calendar" class="h-3.5 w-3.5 text-forest-400"></i> Tanggal Sesi
                            </label>
                            <div class="relative">
                                <input type="date" id="inputTanggal" required
                                    class="w-full text-xs border border-forest-200 bg-forest-50/40 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-2xs">
                            </div>
                        </div>

                        {{-- Permasalahan (Span 2 kolom di layar besar) --}}
                        <div class="space-y-1.5 md:col-span-2 lg:col-span-2">
                            <label class="text-xs font-semibold text-forest-700 flex items-center gap-1.5">
                                <i data-lucide="file-text" class="h-3.5 w-3.5 text-forest-400"></i> Permasalahan / Topik
                                Bimbingan
                            </label>
                            <div class="relative">
                                <input type="text" id="inputPermasalahan" required
                                    placeholder="Contoh: Penurunan motivasi belajar & Sering Alpha..."
                                    class="w-full text-xs border border-forest-200 bg-forest-50/40 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-2xs">
                            </div>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex items-center justify-end gap-3 pt-4 border-t border-forest-100">
                        <button type="button" id="btnCancel" onclick="resetForm()"
                            class="hidden bg-gray-100 hover:bg-gray-200 text-forest-700 text-xs font-medium px-5 py-3 rounded-xl transition-colors flex items-center gap-1.5">
                            <i data-lucide="x" class="h-4 w-4"></i> Batal
                        </button>
                        <button type="submit" id="btnSubmit"
                            class="bg-forest-800 hover:bg-forest-900 text-white text-xs font-semibold px-6 py-3 rounded-xl flex items-center justify-center gap-2 transition-all shadow-sm hover:shadow">
                            <i data-lucide="plus" class="h-4 w-4"></i> Simpan Sesi Konseling
                        </button>
                    </div>
                </form>
            </div>

            {{-- Table Data Sesi Konseling --}}
            <div class="rounded-2xl bg-white border border-forest-100 shadow-sm overflow-hidden">
                <div class="max-h-[380px] overflow-y-auto">
                    <table class="w-full text-xs text-left relative">
                        <thead
                            class="bg-forest-50/90 text-forest-500 border-b border-forest-100 sticky top-0 z-10 backdrop-blur-sm">
                            <tr>
                                <th class="px-5 py-3">Nama Siswa</th>
                                <th class="px-4 py-3">Konselor (Guru BK)</th>
                                <th class="px-4 py-3">Permasalahan</th>
                                <th class="px-4 py-3">Tanggal</th>
                                <th class="px-4 py-3">Status</th>
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
                <h4 class="font-display font-bold text-base text-forest-950">Hapus Sesi Konseling?</h4>
                <p class="text-xs text-forest-500 mt-1">
                    Apakah kamu yakin ingin menghapus data konseling siswa <span id="deleteTargetNama"
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
    let konselingList = [];
    let deleteTargetIndex = null;

    function renderTable() {
        const tbody = document.getElementById('tableBody');
        tbody.innerHTML = '';

        if (konselingList.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="6" class="px-5 py-12 text-center">
                        <div class="flex flex-col items-center justify-center text-forest-400">
                            <div class="bg-forest-50 p-3 rounded-full mb-3">
                                <i data-lucide="inbox" class="h-6 w-6"></i>
                            </div>
                            <p class="font-medium text-forest-600">Belum ada jadwal konseling</p>
                            <p class="text-[10px] mt-1">Silakan gunakan form di atas untuk menambah sesi konseling baru.</p>
                        </div>
                    </td>
                </tr>
            `;
        } else {
            konselingList.forEach((item, index) => {
                let statusBadge = '';
                if (item.status === 'Proses') {
                    statusBadge =
                        `<span class="bg-amber-50 text-amber-600 border border-amber-200 px-2.5 py-0.5 rounded-full text-[10px] font-bold">Proses</span>`;
                } else if (item.status === 'Selesai') {
                    statusBadge =
                        `<span class="bg-emerald-50 text-emerald-600 border border-emerald-200 px-2.5 py-0.5 rounded-full text-[10px] font-bold">Selesai</span>`;
                } else {
                    statusBadge =
                        `<span class="bg-blue-50 text-blue-600 border border-blue-200 px-2.5 py-0.5 rounded-full text-[10px] font-bold">Dijadwalkan</span>`;
                }

                const row = document.createElement('tr');
                row.className = 'hover:bg-forest-50/50 transition-colors';
                row.innerHTML = `
                    <td class="px-5 py-3 font-semibold text-forest-900">${item.nama}</td>
                    <td class="px-4 py-3 text-forest-700">${item.konselor}</td>
                    <td class="px-4 py-3 text-forest-600">${item.permasalahan}</td>
                    <td class="px-4 py-3 text-forest-400">${item.tanggal}</td>
                    <td class="px-4 py-3">${statusBadge}</td>
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
            konselor: document.getElementById('inputKonselor').value,
            status: document.getElementById('inputStatus').value,
            tanggal: document.getElementById('inputTanggal').value,
            permasalahan: document.getElementById('inputPermasalahan').value,
        };

        if (editIndex === -1) {
            konselingList.push(data);
        } else {
            konselingList[editIndex] = data;
        }

        resetForm();
        renderTable();
    }

    function editData(index) {
        const item = konselingList[index];
        document.getElementById('editIndex').value = index;
        document.getElementById('inputNama').value = item.nama;
        document.getElementById('inputKonselor').value = item.konselor;
        document.getElementById('inputStatus').value = item.status;
        document.getElementById('inputTanggal').value = item.tanggal;
        document.getElementById('inputPermasalahan').value = item.permasalahan;

        document.getElementById('formTitle').innerHTML =
            `<span class="p-2 bg-blue-50 text-blue-600 rounded-xl"><i data-lucide="edit-3" class="h-4 w-4"></i></span> Edit Sesi Konseling`;
        document.getElementById('btnSubmit').innerHTML = `<i data-lucide="check" class="h-4 w-4"></i> Update Data`;
        document.getElementById('btnSubmit').className =
            "bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold px-6 py-3 rounded-xl flex items-center justify-center gap-2 transition-all shadow-sm hover:shadow";
        document.getElementById('btnCancel').classList.remove('hidden');
        lucide.createIcons();
    }

    function openDeleteModal(index) {
        deleteTargetIndex = index;
        document.getElementById('deleteTargetNama').textContent = `"${konselingList[index].nama}"`;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        deleteTargetIndex = null;
        document.getElementById('deleteModal').classList.add('hidden');
    }

    function confirmDelete() {
        if (deleteTargetIndex !== null) {
            konselingList.splice(deleteTargetIndex, 1);
            closeDeleteModal();
            renderTable();
        }
    }

    function resetForm() {
        document.getElementById('konselingForm').reset();
        document.getElementById('editIndex').value = -1;
        document.getElementById('formTitle').innerHTML =
            `<span class="p-2 bg-emerald-50 text-emerald-600 rounded-xl"><i data-lucide="calendar-plus" class="h-4 w-4"></i></span> Form Jadwalkan Sesi Konseling Baru`;
        document.getElementById('btnSubmit').innerHTML =
            `<i data-lucide="plus" class="h-4 w-4"></i> Simpan Sesi Konseling`;
        document.getElementById('btnSubmit').className =
            "bg-forest-800 hover:bg-forest-900 text-white text-xs font-semibold px-6 py-3 rounded-xl flex items-center justify-center gap-2 transition-all shadow-sm hover:shadow";
        document.getElementById('btnCancel').classList.add('hidden');
        lucide.createIcons();
    }

    renderTable();
    </script>
</body>

</html>