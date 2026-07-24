<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pengaturan — BK/BP Application</title>
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
            <h2 class="font-display font-bold text-xl">Pengaturan Sistem</h2>

            <div class="grid lg:grid-cols-2 gap-6">
                {{-- Profile Admin --}}
                <div class="bg-white p-5 rounded-2xl border border-forest-100 shadow-sm space-y-3">
                    <h3 class="font-bold text-sm text-forest-900 border-b pb-2">Profil Guru / Admin</h3>
                    <div class="text-xs space-y-2">
                        <div>
                            <label class="text-forest-500 block mb-1">Nama Lengkap</label>
                            <input type="text" value="Bu Ratna, S.Pd"
                                class="w-full border rounded-xl p-2 border-forest-200">
                        </div>
                        <div>
                            <label class="text-forest-500 block mb-1">Email</label>
                            <input type="email" value="ratna@sekolah.sch.id"
                                class="w-full border rounded-xl p-2 border-forest-200">
                        </div>
                    </div>
                </div>

                {{-- Config Sekolah --}}
                <div class="bg-white p-5 rounded-2xl border border-forest-100 shadow-sm space-y-3">
                    <h3 class="font-bold text-sm text-forest-900 border-b pb-2">Identitas Sekolah (Adiwiyata)</h3>
                    <div class="text-xs space-y-2">
                        <div>
                            <label class="text-forest-500 block mb-1">Nama Sekolah</label>
                            <input type="text" value="SMK Negeri 1 Adiwiyata"
                                class="w-full border rounded-xl p-2 border-forest-200">
                        </div>
                        <div>
                            <label class="text-forest-500 block mb-1">Alamat</label>
                            <input type="text" value="Jl. Pelestarian Lingkungan No. 12"
                                class="w-full border rounded-xl p-2 border-forest-200">
                        </div>
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