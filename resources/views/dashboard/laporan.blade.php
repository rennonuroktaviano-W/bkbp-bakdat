<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pusat Laporan & Surat — BK/BP Application</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <!-- Library html2pdf untuk Generate PDF Otomatis -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <x-config-warna-font />
    <x-style-tambahan />
</head>

<body class="antialiased text-forest-950 bg-mist">
    <x-dashboard.sidebar />
    <div class="lg:pl-64 min-h-screen flex flex-col">
        <x-dashboard.topbar />
        <main class="flex-1 p-6 lg:p-8 space-y-8">

            {{-- Title Header --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h2 class="font-display font-bold text-2xl text-forest-950 flex items-center gap-2.5">
                        <span class="p-2.5 bg-forest-800 text-white rounded-2xl shadow-sm">
                            <i data-lucide="printer" class="h-5 w-5"></i>
                        </span>
                        Pusat Dokumen & Laporan Digital
                    </h2>
                    <p class="text-xs text-forest-500 mt-1">Generate surat resmi sekolah dan rekapitulasi data BK dalam
                        format PDF presisi tinggi.</p>
                </div>
                <div class="flex items-center gap-2 bg-emerald-50/80 border border-emerald-200 px-3.5 py-2 rounded-2xl">
                    <span class="relative flex h-2.5 w-2.5">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                    </span>
                    <span class="text-[11px] font-semibold text-emerald-700">Generator PDF Siap Digunakan</span>
                </div>
            </div>

            {{-- Grid Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                {{-- Card 1: Surat Pemanggilan --}}
                <div
                    class="group bg-white rounded-3xl border border-forest-100 p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between relative overflow-hidden">
                    <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-red-500 to-rose-400"></div>
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <div
                                class="w-12 h-12 bg-red-50 text-red-500 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i data-lucide="mail-warning" class="h-6 w-6"></i>
                            </div>
                            <span
                                class="text-[10px] font-bold px-2.5 py-1 bg-red-50 text-red-600 rounded-full border border-red-100">Resmi</span>
                        </div>
                        <h4 class="font-display font-bold text-base text-forest-950">Surat Panggilan Orang Tua</h4>
                        <p class="text-xs text-forest-500 mt-1.5 leading-relaxed">
                            Cetak surat resmi pemanggilan orang tua/wali murid untuk bimbingan khusus atau pelanggaran.
                        </p>
                    </div>
                    <button onclick="openPanggilanModal()"
                        class="mt-6 w-full bg-red-50 hover:bg-red-500 text-red-600 hover:text-white text-xs font-semibold py-3 rounded-2xl border border-red-200 hover:border-red-500 flex items-center justify-center gap-2 transition-all shadow-2xs">
                        <i data-lucide="file-plus" class="h-4 w-4"></i> Generate Surat Pemanggilan
                    </button>
                </div>

                {{-- Card 2: Surat Peringatan (SP) --}}
                <div
                    class="group bg-white rounded-3xl border border-forest-100 p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between relative overflow-hidden">
                    <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-amber-500 to-yellow-400">
                    </div>
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <div
                                class="w-12 h-12 bg-amber-50 text-amber-500 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i data-lucide="alert-octagon" class="h-6 w-6"></i>
                            </div>
                            <span
                                class="text-[10px] font-bold px-2.5 py-1 bg-amber-50 text-amber-600 rounded-full border border-amber-100">Kedisiplinan</span>
                        </div>
                        <h4 class="font-display font-bold text-base text-forest-950">Surat Peringatan (SP)</h4>
                        <p class="text-xs text-forest-500 mt-1.5 leading-relaxed">
                            Generate otomatis draft Surat Peringatan 1 (SP1), SP2, hingga SP3 sesuai bobot poin siswa.
                        </p>
                    </div>
                    <button onclick="openSpModal()"
                        class="mt-6 w-full bg-amber-50 hover:bg-amber-500 text-amber-600 hover:text-white text-xs font-semibold py-3 rounded-2xl border border-amber-200 hover:border-amber-500 flex items-center justify-center gap-2 transition-all shadow-2xs">
                        <i data-lucide="shield-alert" class="h-4 w-4"></i> Generate Surat Peringatan
                    </button>
                </div>

                {{-- Card 3: Rekap PDF & Excel --}}
                <div
                    class="group bg-white rounded-3xl border border-forest-100 p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between relative overflow-hidden">
                    <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-emerald-500 to-teal-400">
                    </div>
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <div
                                class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i data-lucide="file-spreadsheets" class="h-6 w-6"></i>
                            </div>
                            <span
                                class="text-[10px] font-bold px-2.5 py-1 bg-emerald-50 text-emerald-600 rounded-full border border-emerald-100">Eksekutif</span>
                        </div>
                        <h4 class="font-display font-bold text-base text-forest-950">Rekapitulasi Laporan BK</h4>
                        <p class="text-xs text-forest-500 mt-1.5 leading-relaxed">
                            Laporan rekapitulasi data pelanggaran & konseling bulanan/semesteran untuk Kepala Sekolah.
                        </p>
                    </div>
                    <button onclick="openRekapModal()"
                        class="mt-6 w-full bg-forest-50 hover:bg-forest-800 text-forest-700 hover:text-white text-xs font-semibold py-3 rounded-2xl border border-forest-200 hover:border-forest-800 flex items-center justify-center gap-2 transition-all shadow-2xs">
                        <i data-lucide="download" class="h-4 w-4"></i> Export Rekap Laporan
                    </button>
                </div>

            </div>

            {{-- Stat & Info Banner --}}
            <div
                class="bg-gradient-to-br from-forest-900 via-forest-850 to-forest-950 rounded-3xl p-6 lg:p-8 text-white flex flex-col md:flex-row items-center justify-between gap-6 shadow-lg relative overflow-hidden">
                <div class="space-y-2 max-w-xl z-10">
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1 bg-white/10 rounded-full text-[11px] font-medium backdrop-blur-md">
                        <i data-lucide="sparkles" class="h-3.5 w-3.5 text-amber-300"></i> Standar Format Sekolah
                    </div>
                    <h3 class="font-display font-bold text-lg md:text-xl">Format Surat Lengkap dengan Kop Resmi</h3>
                    <p class="text-xs text-forest-200 leading-relaxed">
                        Seluruh file PDF yang di-generate menggunakan template standar dinas pendidikan lengkap dengan
                        Kop Surat, tanggal penerbitan otomatis, serta area tanda tangan guru BK dan Kepala Sekolah.
                    </p>
                </div>
                <div class="flex gap-4 w-full md:w-auto z-10">
                    <div
                        class="bg-white/10 backdrop-blur-md p-4 rounded-2xl border border-white/10 text-center flex-1 md:w-32">
                        <span class="block font-bold text-xl text-emerald-300">A4</span>
                        <span class="text-[10px] text-forest-200">Ukuran Kertas</span>
                    </div>
                    <div
                        class="bg-white/10 backdrop-blur-md p-4 rounded-2xl border border-white/10 text-center flex-1 md:w-32">
                        <span class="block font-bold text-xl text-amber-300">HD</span>
                        <span class="text-[10px] text-forest-200">Kualitas PDF</span>
                    </div>
                </div>
            </div>

        </main>
    </div>

    {{-- MODAL 1: SURAT PEMANGGILAN ORANG TUA --}}
    <div id="modalPanggilan"
        class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 flex items-center justify-center hidden p-4">
        <div
            class="bg-white rounded-3xl border border-forest-100 p-6 lg:p-8 shadow-2xl max-w-md w-full space-y-5 relative">
            <div class="flex justify-between items-center pb-3 border-b border-forest-100">
                <h3 class="font-display font-bold text-base text-forest-950 flex items-center gap-2">
                    <i data-lucide="mail-warning" class="h-5 w-5 text-red-500"></i> Surat Panggilan Orang Tua
                </h3>
                <button onclick="closePanggilanModal()" class="text-forest-400 hover:text-forest-700 p-1"><i
                        data-lucide="x" class="h-5 w-5"></i></button>
            </div>
            <form onsubmit="processPanggilan(event)" class="space-y-4">
                <div class="space-y-1">
                    <label class="text-xs font-semibold text-forest-700">Nama Siswa</label>
                    <input type="text" id="panggilanNama" required placeholder="Contoh: Luthfi Ardiansyah"
                        class="w-full text-xs border border-forest-200 bg-forest-50/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="space-y-1">
                        <label class="text-xs font-semibold text-forest-700">Kelas</label>
                        <input type="text" id="panggilanKelas" required placeholder="Contoh: XII RPL 1"
                            class="w-full text-xs border border-forest-200 bg-forest-50/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-red-500">
                    </div>
                    <div class="space-y-1">
                        <label class="text-xs font-semibold text-forest-700">Tanggal Pertemuan</label>
                        <input type="date" id="panggilanTanggal" required
                            class="w-full text-xs border border-forest-200 bg-forest-50/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-red-500">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="space-y-1">
                        <label class="text-xs font-semibold text-forest-700">Waktu (Jam)</label>
                        <input type="text" id="panggilanWaktu" required placeholder="Contoh: 09:00 WIB"
                            class="w-full text-xs border border-forest-200 bg-forest-50/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-red-500">
                    </div>
                    <div class="space-y-1">
                        <label class="text-xs font-semibold text-forest-700">Ruangan</label>
                        <input type="text" id="panggilanTempat" required placeholder="Ruang BK"
                            value="Ruang Bimbingan Konseling"
                            class="w-full text-xs border border-forest-200 bg-forest-50/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-red-500">
                    </div>
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-semibold text-forest-700">Alasan Pemanggilan / Perihal</label>
                    <textarea id="panggilanAlasan" rows="2" required
                        placeholder="Contoh: Pembahasan kedisiplinan & akumulasi poin pelanggaran..."
                        class="w-full text-xs border border-forest-200 bg-forest-50/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-red-500"></textarea>
                </div>
                <div class="flex gap-3 pt-2">
                    <button type="button" onclick="closePanggilanModal()"
                        class="flex-1 bg-gray-100 hover:bg-gray-200 text-forest-700 text-xs font-semibold py-2.5 rounded-xl">Batal</button>
                    <button type="submit" id="btnPanggilanSubmit"
                        class="flex-1 bg-red-600 hover:bg-red-700 text-white text-xs font-semibold py-2.5 rounded-xl flex items-center justify-center gap-1.5 shadow-md">
                        <i data-lucide="printer" class="h-4 w-4"></i> Cetak PDF
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- MODAL 2: SURAT PERINGATAN (SP) --}}
    <div id="modalSp"
        class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 flex items-center justify-center hidden p-4">
        <div
            class="bg-white rounded-3xl border border-forest-100 p-6 lg:p-8 shadow-2xl max-w-md w-full space-y-5 relative">
            <div class="flex justify-between items-center pb-3 border-b border-forest-100">
                <h3 class="font-display font-bold text-base text-forest-950 flex items-center gap-2">
                    <i data-lucide="alert-octagon" class="h-5 w-5 text-amber-500"></i> Generate Surat Peringatan (SP)
                </h3>
                <button onclick="closeSpModal()" class="text-forest-400 hover:text-forest-700 p-1"><i data-lucide="x"
                        class="h-5 w-5"></i></button>
            </div>
            <form onsubmit="processSp(event)" class="space-y-4">
                <div class="space-y-1">
                    <label class="text-xs font-semibold text-forest-700">Nama Siswa</label>
                    <input type="text" id="spNama" required placeholder="Contoh: Luthfi Ardiansyah"
                        class="w-full text-xs border border-forest-200 bg-forest-50/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-amber-500">
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="space-y-1">
                        <label class="text-xs font-semibold text-forest-700">Kelas</label>
                        <input type="text" id="spKelas" required placeholder="Contoh: XII RPL 1"
                            class="w-full text-xs border border-forest-200 bg-forest-50/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-amber-500">
                    </div>
                    <div class="space-y-1">
                        <label class="text-xs font-semibold text-forest-700">Tingkat Surat Peringatan</label>
                        <select id="spTingkat"
                            class="w-full text-xs border border-forest-200 bg-forest-50/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-amber-500">
                            <option value="1">SP 1 (Peringatan Pertama)</option>
                            <option value="2">SP 2 (Peringatan Kedua)</option>
                            <option value="3">SP 3 (Peringatan Terakhir)</option>
                        </select>
                    </div>
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-semibold text-forest-700">Pelanggaran Utamanya / Akumulasi Poin</label>
                    <textarea id="spPelanggaran" rows="2" required
                        placeholder="Contoh: Akumulasi poin mencapai 55 poin karena ketidakhadiran berturut-turut..."
                        class="w-full text-xs border border-forest-200 bg-forest-50/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-amber-500"></textarea>
                </div>
                <div class="flex gap-3 pt-2">
                    <button type="button" onclick="closeSpModal()"
                        class="flex-1 bg-gray-100 hover:bg-gray-200 text-forest-700 text-xs font-semibold py-2.5 rounded-xl">Batal</button>
                    <button type="submit" id="btnSpSubmit"
                        class="flex-1 bg-amber-500 hover:bg-amber-600 text-white text-xs font-semibold py-2.5 rounded-xl flex items-center justify-center gap-1.5 shadow-md">
                        <i data-lucide="printer" class="h-4 w-4"></i> Cetak SP PDF
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- MODAL 3: REKAP LAPORAN --}}
    <div id="modalRekap"
        class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 flex items-center justify-center hidden p-4">
        <div
            class="bg-white rounded-3xl border border-forest-100 p-6 lg:p-8 shadow-2xl max-w-md w-full space-y-5 relative">
            <div class="flex justify-between items-center pb-3 border-b border-forest-100">
                <h3 class="font-display font-bold text-base text-forest-950 flex items-center gap-2">
                    <i data-lucide="file-spreadsheets" class="h-5 w-5 text-emerald-600"></i> Rekapitulasi Laporan BK
                </h3>
                <button onclick="closeRekapModal()" class="text-forest-400 hover:text-forest-700 p-1"><i data-lucide="x"
                        class="h-5 w-5"></i></button>
            </div>
            <form onsubmit="processRekap(event)" class="space-y-4">
                <div class="space-y-1">
                    <label class="text-xs font-semibold text-forest-700">Periode Laporan</label>
                    <select id="rekapPeriode"
                        class="w-full text-xs border border-forest-200 bg-forest-50/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="Bulan Juli 2026">Bulan Juli 2026</option>
                        <option value="Semester Ganjil 2026/2027">Semester Ganjil 2026/2027</option>
                        <option value="Tahun Ajaran 2026/2027">Tahun Ajaran 2026/2027</option>
                    </select>
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-semibold text-forest-700">Filter Kelas</label>
                    <select id="rekapKelas"
                        class="w-full text-xs border border-forest-200 bg-forest-50/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="Semua Kelas">Semua Kelas</option>
                        <option value="Kelas X">Kelas X</option>
                        <option value="Kelas XI">Kelas XI</option>
                        <option value="Kelas XII">Kelas XII</option>
                    </select>
                </div>
                <div class="flex gap-3 pt-2">
                    <button type="button" onclick="closeRekapModal()"
                        class="flex-1 bg-gray-100 hover:bg-gray-200 text-forest-700 text-xs font-semibold py-2.5 rounded-xl">Batal</button>
                    <button type="submit" id="btnRekapSubmit"
                        class="flex-1 bg-forest-800 hover:bg-forest-900 text-white text-xs font-semibold py-2.5 rounded-xl flex items-center justify-center gap-1.5 shadow-md">
                        <i data-lucide="download" class="h-4 w-4"></i> Export PDF Laporan
                    </button>
                </div>
            </form>
        </div>
    </div>


    {{-- HIDDEN CONTAINER UNTUK HTML-TO-PDF TEMPLATES --}}
    <div class="hidden">
        {{-- Template 1: Printable Surat Pemanggilan --}}
        <div id="pdfPanggilanTemplate" class="p-10 font-serif text-black leading-relaxed bg-white"
            style="width: 210mm; min-h: 297mm; font-size: 12pt;">
            <!-- Kop Surat Sekolah -->
            <div class="text-center border-b-4 border-double border-black pb-4 mb-6">
                <h3 class="font-bold text-lg uppercase tracking-wide">PEMERINTAH PROVINSI / YAYASAN PENDIDIKAN</h3>
                <h2 class="font-bold text-xl uppercase tracking-wider">SMA / SMK NEGERI UTAMA BK</h2>
                <p class="text-xs font-sans mt-0.5">Jl. Pendidikan No. 100, Kota Edukasi | Telp: (021) 555-0199 |
                    Website: www.sekolah.sch.id</p>
            </div>

            <div class="flex justify-between items-start text-xs font-sans mb-6">
                <div>
                    <p>Nomor : 005 / BK / SP-OT / VII / 2026</p>
                    <p>Lamp. : -</p>
                    <p>Hal : <span class="font-bold underline">Pemanggilan Orang Tua / Wali Murid</span></p>
                </div>
                <div>
                    <p>24 Juli 2026</p>
                </div>
            </div>

            <div class="text-xs font-sans mb-6">
                <p>Kepada Yth.</p>
                <p class="font-bold">Bapak / Ibu Orang Tua / Wali dari <span id="pdfPangNamaTarget"></span></p>
                <p>di Tempat</p>
            </div>

            <p class="text-xs font-sans mb-4">Dengan hormat,</p>
            <p class="text-xs font-sans mb-4 text-justify">
                Sehubungan dengan dibutuhkannya koordinasi serta pembinaan bersama terkait perkembangan kedisiplinan
                belajar putra/putri Bapak/Ibu di sekolah, maka melalui surat ini kami mengharapkan kehadiran Bapak/Ibu
                Orang Tua/Wali dari:
            </p>

            <table class="w-full text-xs font-sans mb-6 border-collapse">
                <tr>
                    <td class="w-36 py-1 font-semibold">Nama Siswa</td>
                    <td class="w-4 py-1">:</td>
                    <td id="pdfPangNama" class="py-1 font-bold"></td>
                </tr>
                <tr>
                    <td class="py-1 font-semibold">Kelas</td>
                    <td class="py-1">:</td>
                    <td id="pdfPangKelas" class="py-1"></td>
                </tr>
                <tr>
                    <td class="py-1 font-semibold">Perihal / Alasan</td>
                    <td class="py-1">:</td>
                    <td id="pdfPangAlasan" class="py-1 text-red-700 italic"></td>
                </tr>
            </table>

            <p class="text-xs font-sans mb-4">Untuk dapat hadir di sekolah pada:</p>

            <table class="w-full text-xs font-sans mb-6 border-collapse">
                <tr>
                    <td class="w-36 py-1 font-semibold">Hari / Tanggal</td>
                    <td class="w-4 py-1">:</td>
                    <td id="pdfPangTanggal" class="py-1 font-semibold"></td>
                </tr>
                <tr>
                    <td class="py-1 font-semibold">Waktu</td>
                    <td class="py-1">:</td>
                    <td id="pdfPangWaktu" class="py-1"></td>
                </tr>
                <tr>
                    <td class="py-1 font-semibold">Tempat</td>
                    <td class="py-1">:</td>
                    <td id="pdfPangTempat" class="py-1"></td>
                </tr>
            </table>

            <p class="text-xs font-sans mb-8 text-justify">
                Mengingat pentingnya hal tersebut, kami sangat mengharapkan kehadiran Bapak/Ibu tepat pada waktunya.
                Demikian surat pemanggilan ini kami sampaikan, atas perhatian dan kerja samanya kami ucapkan terima
                kasih.
            </p>

            <div class="flex justify-between items-end text-xs font-sans mt-12">
                <div class="text-center w-48">
                    <p>Mengetahui,</p>
                    <p class="font-bold mb-16">Kepala Sekolah</p>
                    <p class="font-bold underline">Drs. H. Ahmad Fauzi, M.Pd</p>
                    <p>NIP. 19750812 200003 1 002</p>
                </div>
                <div class="text-center w-48">
                    <p>Guru Bimbingan Konseling,</p>
                    <p class="font-bold mb-16">Koordinator BK</p>
                    <p class="font-bold underline">Ratna Sari, S.Pd</p>
                    <p>NIP. 19820415 200801 2 015</p>
                </div>
            </div>
        </div>

        {{-- Template 2: Printable Surat Peringatan (SP) --}}
        <div id="pdfSpTemplate" class="p-10 font-serif text-black leading-relaxed bg-white"
            style="width: 210mm; min-h: 297mm; font-size: 12pt;">
            <!-- Kop Surat Sekolah -->
            <div class="text-center border-b-4 border-double border-black pb-4 mb-6">
                <h3 class="font-bold text-lg uppercase tracking-wide">PEMERINTAH PROVINSI / YAYASAN PENDIDIKAN</h3>
                <h2 class="font-bold text-xl uppercase tracking-wider">SMA / SMK NEGERI UTAMA BK</h2>
                <p class="text-xs font-sans mt-0.5">Jl. Pendidikan No. 100, Kota Edukasi | Telp: (021) 555-0199 |
                    Website: www.sekolah.sch.id</p>
            </div>

            <div class="text-center my-6">
                <h2 id="pdfSpJudul" class="font-bold text-base underline uppercase tracking-wider">SURAT PERINGATAN</h2>
                <p class="text-xs font-sans mt-1">Nomor : 042 / BK / SP / VII / 2026</p>
            </div>

            <p class="text-xs font-sans mb-4 text-justify">
                Surat Peringatan ini diterbitkan oleh pihak Bimbingan Konseling (BK) Sekolah kepada siswa yang
                bersangkutan karena telah melakukan pelanggaran terhadap peraturan dan tata tertib sekolah:
            </p>

            <table class="w-full text-xs font-sans mb-6 border-collapse">
                <tr>
                    <td class="w-36 py-1 font-semibold">Nama Siswa</td>
                    <td class="w-4 py-1">:</td>
                    <td id="pdfSpNama" class="py-1 font-bold"></td>
                </tr>
                <tr>
                    <td class="py-1 font-semibold">Kelas</td>
                    <td class="py-1">:</td>
                    <td id="pdfSpKelas" class="py-1"></td>
                </tr>
                <tr>
                    <td class="py-1 font-semibold">Bentuk Pelanggaran</td>
                    <td class="py-1">:</td>
                    <td id="pdfSpPelanggaran" class="py-1 text-red-700 italic font-semibold"></td>
                </tr>
            </table>

            <p class="text-xs font-sans mb-4 text-justify">
                Dengan diterbitkannya Surat Peringatan ini, siswa diharapkan segera melakukan evaluasi diri dan
                memperbaiki sikap kedisiplinan. Apabila di kemudian hari siswa kembali melakukan tindakan pelanggaran
                serupa atau menambah akumulasi poin pelanggaran, maka pihak sekolah akan memberikan sanksi yang lebih
                tegas sesuai dengan aturan yang berlaku.
            </p>

            <p class="text-xs font-sans mb-8">
                Demikian Surat Peringatan ini dibuat untuk dapat diperhatikan dan diindahkan sebagaimana mestinya.
            </p>

            <div class="flex justify-between items-end text-xs font-sans mt-16">
                <div class="text-center w-48">
                    <p>Orang Tua / Wali Murid</p>
                    <p class="font-bold mb-16"></p>
                    <p class="border-b border-black w-36 mx-auto"></p>
                </div>
                <div class="text-center w-48">
                    <p>24 Juli 2026</p>
                    <p class="font-bold mb-16">Guru Bimbingan Konseling</p>
                    <p class="font-bold underline">Ratna Sari, S.Pd</p>
                    <p>NIP. 19820415 200801 2 015</p>
                </div>
            </div>
        </div>

        {{-- Template 3: Printable Rekap Laporan --}}
        <div id="pdfRekapTemplate" class="p-10 font-sans text-black leading-relaxed bg-white"
            style="width: 210mm; min-h: 297mm; font-size: 10pt;">
            <div class="text-center border-b-2 border-black pb-3 mb-6">
                <h2 class="font-bold text-lg uppercase tracking-wide">REKAPITULASI LAPORAN BIMBINGAN KONSELING</h2>
                <p id="pdfRekapSub" class="text-xs font-semibold text-gray-700 mt-1"></p>
            </div>

            <table class="w-full text-xs border-collapse border border-gray-400 mb-6">
                <thead>
                    <tr class="bg-gray-100 text-left font-bold border-b border-gray-400">
                        <th class="p-2 border-r border-gray-400 w-8 text-center">No</th>
                        <th class="p-2 border-r border-gray-400">Nama Siswa</th>
                        <th class="p-2 border-r border-gray-400">Kelas</th>
                        <th class="p-2 border-r border-gray-400">Jenis Catatan</th>
                        <th class="p-2 border-r border-gray-400">Poin / Status</th>
                        <th class="p-2">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    <tr>
                        <td class="p-2 border-r border-gray-400 text-center">1</td>
                        <td class="p-2 border-r border-gray-400 font-semibold">Luthfi Ardiansyah</td>
                        <td class="p-2 border-r border-gray-400">XII RPL 1</td>
                        <td class="p-2 border-r border-gray-400">Penurunan Motivasi & Alpha</td>
                        <td class="p-2 border-r border-gray-400 font-bold text-amber-600">Proses (45 Poin)</td>
                        <td class="p-2">24 Jul 2026</td>
                    </tr>
                    <tr>
                        <td class="p-2 border-r border-gray-400 text-center">2</td>
                        <td class="p-2 border-r border-gray-400 font-semibold">Ahmad Rizky</td>
                        <td class="p-2 border-r border-gray-400">X TKJ 2</td>
                        <td class="p-2 border-r border-gray-400">Terlambat Masuk Sekolah</td>
                        <td class="p-2 border-r border-gray-400 font-bold text-red-600">+10 Poin</td>
                        <td class="p-2">22 Jul 2026</td>
                    </tr>
                    <tr>
                        <td class="p-2 border-r border-gray-400 text-center">3</td>
                        <td class="p-2 border-r border-gray-400 font-semibold">Siti Nurhaliza</td>
                        <td class="p-2 border-r border-gray-400">XI AKL 3</td>
                        <td class="p-2 border-r border-gray-400">Konseling Minat Bakat</td>
                        <td class="p-2 border-r border-gray-400 font-bold text-emerald-600">Selesai</td>
                        <td class="p-2">20 Jul 2026</td>
                    </tr>
                </tbody>
            </table>

            <div class="flex justify-end text-xs mt-12">
                <div class="text-center w-52">
                    <p>Kota Edukasi, 24 Juli 2026</p>
                    <p class="font-bold mb-16">Koordinator BK,</p>
                    <p class="font-bold underline">Ratna Sari, S.Pd</p>
                    <p>NIP. 19820415 200801 2 015</p>
                </div>
            </div>
        </div>
    </div>


    <script>
    lucide.createIcons();

    // Modal Handlers
    function openPanggilanModal() {
        document.getElementById('modalPanggilan').classList.remove('hidden');
    }

    function closePanggilanModal() {
        document.getElementById('modalPanggilan').classList.add('hidden');
    }

    function openSpModal() {
        document.getElementById('modalSp').classList.remove('hidden');
    }

    function closeSpModal() {
        document.getElementById('modalSp').classList.add('hidden');
    }

    function openRekapModal() {
        document.getElementById('modalRekap').classList.remove('hidden');
    }

    function closeRekapModal() {
        document.getElementById('modalRekap').classList.add('hidden');
    }

    // PDF Generator Function
    function downloadPdf(elementId, filename) {
        const element = document.getElementById(elementId);
        const opt = {
            margin: 0,
            filename: filename,
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 2
            },
            jsPDF: {
                unit: 'mm',
                format: 'a4',
                orientation: 'portrait'
            }
        };
        html2pdf().set(opt).from(element).save();
    }

    // Process Surat Panggilan
    function processPanggilan(e) {
        e.preventDefault();
        const nama = document.getElementById('panggilanNama').value;
        const kelas = document.getElementById('panggilanKelas').value;
        const tanggalRaw = document.getElementById('panggilanTanggal').value;
        const waktu = document.getElementById('panggilanWaktu').value;
        const tempat = document.getElementById('panggilanTempat').value;
        const alasan = document.getElementById('panggilanAlasan').value;

        // Set content to template
        document.getElementById('pdfPangNamaTarget').textContent = nama;
        document.getElementById('pdfPangNama').textContent = nama;
        document.getElementById('pdfPangKelas').textContent = kelas;
        document.getElementById('pdfPangTanggal').textContent = tanggalRaw;
        document.getElementById('pdfPangWaktu').textContent = waktu;
        document.getElementById('pdfPangTempat').textContent = tempat;
        document.getElementById('pdfPangAlasan').textContent = alasan;

        closePanggilanModal();
        downloadPdf('pdfPanggilanTemplate', `Surat_Panggilan_${nama.replace(/\s+/g, '_')}.pdf`);
    }

    // Process Surat Peringatan (SP)
    function processSp(e) {
        e.preventDefault();
        const nama = document.getElementById('spNama').value;
        const kelas = document.getElementById('spKelas').value;
        const tingkat = document.getElementById('spTingkat').value;
        const pelanggaran = document.getElementById('spPelanggaran').value;

        document.getElementById('pdfSpJudul').textContent = `SURAT PERINGATAN ${tingkat} (SP ${tingkat})`;
        document.getElementById('pdfSpNama').textContent = nama;
        document.getElementById('pdfSpKelas').textContent = kelas;
        document.getElementById('pdfSpPelanggaran').textContent = pelanggaran;

        closeSpModal();
        downloadPdf('pdfSpTemplate', `Surat_Peringatan_SP${tingkat}_${nama.replace(/\s+/g, '_')}.pdf`);
    }

    // Process Rekap Laporan
    function processRekap(e) {
        e.preventDefault();
        const periode = document.getElementById('rekapPeriode').value;
        const kelas = document.getElementById('rekapKelas').value;

        document.getElementById('pdfRekapSub').textContent = `Periode: ${periode} | ${kelas}`;

        closeRekapModal();
        downloadPdf('pdfRekapTemplate', `Rekap_Laporan_BK_${periode.replace(/\s+/g, '_')}.pdf`);
    }
    </script>
</body>

</html>