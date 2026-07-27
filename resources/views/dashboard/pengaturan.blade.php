<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pengaturan Sistem — BK/BP Application</title>
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

            {{-- Header Title & Action --}}
            <div
                class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2 border-b border-forest-100">
                <div>
                    <h2 class="font-display font-bold text-2xl text-forest-950 flex items-center gap-2.5">
                        <span class="p-2 bg-forest-800 text-white rounded-2xl shadow-sm">
                            <i data-lucide="sliders" class="h-5 w-5"></i>
                        </span>
                        Pengaturan Sistem
                    </h2>
                    <p class="text-xs text-forest-500 mt-1">Kelola profil pengguna dan keamanan akun Anda.</p>
                </div>
                <div class="flex items-center gap-3">
                    <button type="button" onclick="resetForm()"
                        class="text-xs font-semibold px-4 py-2.5 text-forest-600 hover:text-forest-900 hover:bg-forest-100/50 rounded-xl transition-all">
                        Batal
                    </button>
                    <button type="button" onclick="saveAllSettings()"
                        class="bg-forest-800 hover:bg-forest-900 text-white text-xs font-semibold px-5 py-2.5 rounded-xl shadow-md hover:shadow-lg transition-all flex items-center gap-2">
                        <i data-lucide="check" class="h-4 w-4"></i> Simpan Perubahan
                    </button>
                </div>
            </div>

            {{-- Main Layout: Sidebar Tab + Content Pane --}}
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                {{-- Left Tab Navigation --}}
                <div
                    class="lg:col-span-3 bg-white rounded-3xl border border-forest-100 p-3 shadow-xs space-y-1 sticky top-6">
                    <button onclick="switchTab('profil')" id="tab-btn-profil"
                        class="tab-btn active w-full flex items-center gap-3 px-4 py-3 rounded-2xl text-xs font-semibold text-left transition-all">
                        <i data-lucide="user" class="h-4 w-4"></i>
                        <span>Profil Saya</span>
                    </button>
                    <button onclick="switchTab('keamanan')" id="tab-btn-keamanan"
                        class="tab-btn w-full flex items-center gap-3 px-4 py-3 rounded-2xl text-xs font-semibold text-left transition-all">
                        <i data-lucide="shield-check" class="h-4 w-4"></i>
                        <span>Keamanan & Password</span>
                    </button>
                </div>

                {{-- Right Content Panes --}}
                <div class="lg:col-span-9 space-y-6">

                    {{-- TAB 1: PROFIL SAYA --}}
                    <div id="pane-profil" class="tab-pane space-y-6">
                        <div class="bg-white rounded-3xl border border-forest-100 p-6 lg:p-8 shadow-xs space-y-6">
                            <div>
                                <h3 class="font-display font-bold text-base text-forest-950">Foto & Informasi Pribadi
                                </h3>
                                <p class="text-xs text-forest-500 mt-0.5">Perbarui foto profil dan data kontak akun
                                    utama Anda.</p>
                            </div>

                            {{-- Avatar Upload Section --}}
                            <div class="flex items-center gap-6 pb-6 border-b border-forest-100">
                                <div class="relative group">
                                    <img id="avatarPreview"
                                        src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=200"
                                        alt="Avatar"
                                        class="w-20 h-20 rounded-full object-cover border-2 border-forest-200 shadow-sm">
                                    <label for="avatarInput"
                                        class="absolute inset-0 bg-black/40 rounded-full flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer">
                                        <i data-lucide="camera" class="h-5 w-5"></i>
                                    </label>
                                    <input type="file" id="avatarInput" class="hidden" accept="image/*"
                                        onchange="previewImage(this, 'avatarPreview')">
                                </div>
                                <div class="space-y-1.5">
                                    <div class="flex gap-2">
                                        <label for="avatarInput"
                                            class="bg-forest-50 hover:bg-forest-100 text-forest-800 text-xs font-semibold px-4 py-2 rounded-xl transition-colors cursor-pointer">
                                            Unggah Foto Baru
                                        </label>
                                        <button type="button" onclick="removeAvatar()"
                                            class="text-xs text-red-600 hover:text-red-700 font-medium px-3 py-2">Hapus</button>
                                    </div>
                                    <p class="text-[11px] text-forest-400">Format yang didukung: JPG, PNG, atau WEBP
                                        (Maksimal 2MB).</p>
                                </div>
                            </div>

                            {{-- Form Inputs --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 text-xs">
                                <div class="space-y-1.5">
                                    <label class="font-semibold text-forest-700">Nama Lengkap & Gelar</label>
                                    <div class="relative">
                                        <i data-lucide="user"
                                            class="absolute left-3.5 top-3 h-4 w-4 text-forest-400"></i>
                                        <input type="text" id="inputNamaLengkap" value="Bu Ratna, S.Pd"
                                            oninput="syncProfileName(this.value)"
                                            class="w-full border border-forest-200 bg-forest-50/30 rounded-xl pl-10 pr-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-forest-800">
                                    </div>
                                </div>
                                <div class="space-y-1.5">
                                    <label class="font-semibold text-forest-700">NIP / NIK</label>
                                    <div class="relative">
                                        <i data-lucide="id-card"
                                            class="absolute left-3.5 top-3 h-4 w-4 text-forest-400"></i>
                                        <input type="text" value="19820415 200801 2 015"
                                            class="w-full border border-forest-200 bg-forest-50/30 rounded-xl pl-10 pr-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-forest-800">
                                    </div>
                                </div>
                                <div class="space-y-1.5">
                                    <label class="font-semibold text-forest-700">Alamat Email</label>
                                    <div class="relative">
                                        <i data-lucide="mail"
                                            class="absolute left-3.5 top-3 h-4 w-4 text-forest-400"></i>
                                        <input type="email" value="ratna@sekolah.sch.id"
                                            class="w-full border border-forest-200 bg-forest-50/30 rounded-xl pl-10 pr-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-forest-800">
                                    </div>
                                </div>
                                <div class="space-y-1.5">
                                    <label class="font-semibold text-forest-700">Nomor WhatsApp / Telepon</label>
                                    <div class="relative">
                                        <i data-lucide="phone"
                                            class="absolute left-3.5 top-3 h-4 w-4 text-forest-400"></i>
                                        <input type="text" value="+62 812-3456-7890"
                                            class="w-full border border-forest-200 bg-forest-50/30 rounded-xl pl-10 pr-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-forest-800">
                                    </div>
                                </div>
                                <div class="space-y-1.5 md:col-span-2">
                                    <label class="font-semibold text-forest-700">Peran / Jabatan Utama</label>
                                    <input type="text" value="Koordinator Bimbingan Konseling (BK)" readonly
                                        class="w-full border border-forest-100 bg-gray-50 text-gray-500 rounded-xl px-4 py-2.5 cursor-not-allowed font-medium">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- TAB 2: KEAMANAN & PASSWORD --}}
                    <div id="pane-keamanan" class="tab-pane hidden space-y-6">
                        <div class="bg-white rounded-3xl border border-forest-100 p-6 lg:p-8 shadow-xs space-y-6">
                            <div>
                                <h3 class="font-display font-bold text-base text-forest-950">Ganti Kata Sandi</h3>
                                <p class="text-xs text-forest-500 mt-0.5">Pastikan kata sandi Anda minimal 8 karakter
                                    dengan kombinasi angka & simbol.</p>
                            </div>

                            <div class="space-y-4 max-w-md text-xs">
                                <div class="space-y-1.5">
                                    <label class="font-semibold text-forest-700">Password Saat Ini</label>
                                    <input type="password" placeholder="••••••••"
                                        class="w-full border border-forest-200 bg-forest-50/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-forest-800">
                                </div>
                                <div class="space-y-1.5">
                                    <label class="font-semibold text-forest-700">Password Baru</label>
                                    <input type="password" placeholder="••••••••"
                                        class="w-full border border-forest-200 bg-forest-50/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-forest-800">
                                </div>
                                <div class="space-y-1.5">
                                    <label class="font-semibold text-forest-700">Konfirmasi Password Baru</label>
                                    <input type="password" placeholder="••••••••"
                                        class="w-full border border-forest-200 bg-forest-50/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-forest-800">
                                </div>
                                <button type="button" onclick="showToast('Password berhasil diperbarui!')"
                                    class="bg-forest-800 hover:bg-forest-900 text-white font-semibold px-5 py-2.5 rounded-xl transition-all shadow-sm">
                                    Update Password
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </main>
    </div>

    {{-- TOAST NOTIFICATION --}}
    <div id="toast"
        class="fixed bottom-6 right-6 bg-forest-900 text-white text-xs font-semibold px-5 py-3.5 rounded-2xl shadow-2xl flex items-center gap-3 translate-y-20 opacity-0 transition-all duration-300 z-50">
        <i data-lucide="check-circle-2" class="h-5 w-5 text-emerald-400"></i>
        <span id="toastMsg">Perubahan berhasil disimpan!</span>
    </div>

    <script>
    lucide.createIcons();

    // Dynamic Tab Switching
    function switchTab(tabId) {
        document.querySelectorAll('.tab-pane').forEach(pane => pane.classList.add('hidden'));
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('bg-forest-800', 'text-white', 'shadow-sm');
            btn.classList.add('text-forest-700', 'hover:bg-forest-50');
        });

        document.getElementById(`pane-${tabId}`).classList.remove('hidden');

        const activeBtn = document.getElementById(`tab-btn-${tabId}`);
        activeBtn.classList.add('bg-forest-800', 'text-white', 'shadow-sm');
        activeBtn.classList.remove('text-forest-700', 'hover:bg-forest-50');
    }

    // Initial Active Tab
    switchTab('profil');

    // Real-time Name Sync to Topbar Greeting
    function syncProfileName(nameVal) {
        const cleanName = nameVal.trim() || 'Pengguna';

        // Target sapaan "Halo, Bu ..." pada Topbar / Dashboard
        const allHeadings = document.querySelectorAll('h1, h2, h3, h4, span, div, p');
        allHeadings.forEach(el => {
            if (el.children.length <= 1 && el.textContent.includes('Halo,')) {
                el.innerHTML = `Halo, ${cleanName} 👋`;
            }
        });

        // Update inisial lingkaran profil jika berupa teks (contoh: BR)
        const initials = cleanName.split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase();
        document.querySelectorAll('.topbar-avatar-badge, [class*="rounded-full"]').forEach(el => {
            if (el.textContent.length === 2 && el.tagName !== 'INPUT') {
                el.textContent = initials;
            }
        });
    }

    // Real-time Photo Avatar Sync
    function previewImage(input, previewId) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imgDataUrl = e.target.result;

                // Update foto preview di halaman pengaturan
                document.getElementById(previewId).src = imgDataUrl;

                // Update foto profil di topbar (jika menggunakan elemen <img>)
                document.querySelectorAll('.topbar-avatar-img, header img, nav img').forEach(img => {
                    img.src = imgDataUrl;
                });
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function removeAvatar() {
        const defaultAvatar = "https://ui-avatars.com/api/?name=Bu+Ratna&background=065f46&color=fff";
        document.getElementById('avatarPreview').src = defaultAvatar;

        document.querySelectorAll('.topbar-avatar-img, header img, nav img').forEach(img => {
            img.src = defaultAvatar;
        });
    }

    function saveAllSettings() {
        showToast("Seluruh pengaturan profil berhasil diperbarui!");
    }

    function showToast(msg) {
        const toast = document.getElementById('toast');
        document.getElementById('toastMsg').textContent = msg;
        toast.classList.remove('translate-y-20', 'opacity-0');

        setTimeout(() => {
            toast.classList.add('translate-y-20', 'opacity-0');
        }, 3000);
    }

    function resetForm() {
        showToast("Perubahan dibatalkan.");
    }
    </script>
</body>

</html>