{{-- ==========================================================
     COMPONENT: Auth Box (Login & Register) - dipakai di dalam Hero Section
     ========================================================== --}}
                {{-- KOLOM KANAN — Auth Box (Login & Register) --}}
                <div class="reveal relative flex justify-center lg:justify-end" style="transition-delay: 150ms;">
                    <div class="absolute -top-10 -left-6 h-24 w-24 rounded-3xl bg-sun-400/30 blur-2xl animate-float">
                    </div>
                    <div
                        class="absolute -bottom-8 -right-4 h-32 w-32 rounded-full bg-forest-400/30 blur-2xl animate-float-slow">
                    </div>

                    <div
                        class="glass relative w-full max-w-sm rounded-3xl shadow-2xl shadow-forest-900/10 p-8 animate-float grid">

                        {{-- ==================== FORM LOGIN ==================== --}}
                        <div id="view-login" class="col-start-1 row-start-1 transition-opacity duration-300 opacity-100">
                            <div class="flex items-center gap-3 mb-7">
                                <div
                                    class="h-11 w-11 rounded-2xl bg-forest-800 flex items-center justify-center shadow-md">
                                    <i data-lucide="shield-check" class="h-5 w-5 text-forest-100"></i>
                                </div>
                                <div>
                                    <p class="font-display font-bold text-forest-900 leading-tight">Portal Guru BK</p>
                                    <p class="text-xs text-forest-600 font-body">Masuk untuk melanjutkan</p>
                                </div>
                            </div>

                            <form class="space-y-4">
                                <div>
                                    <label for="email"
                                        class="block text-xs font-semibold text-forest-700 mb-1.5 font-body">Email</label>
                                    <div class="relative">
                                        <i data-lucide="mail"
                                            class="h-4 w-4 text-forest-400 absolute left-3.5 top-1/2 -translate-y-1/2"></i>
                                        <input type="email" id="email" placeholder="nama@sekolah.sch.id" required
                                            autocomplete="email"
                                            class="w-full rounded-xl border border-forest-200 bg-white/70 pl-10 pr-4 py-2.5 text-sm text-forest-900 placeholder:text-forest-400 focus:border-forest-500 focus:ring-2 focus:ring-forest-200 outline-none transition-all font-body">
                                    </div>
                                </div>
                                <div>
                                    <label for="password"
                                        class="block text-xs font-semibold text-forest-700 mb-1.5 font-body">Password</label>
                                    <div class="relative">
                                        <i data-lucide="lock"
                                            class="h-4 w-4 text-forest-400 absolute left-3.5 top-1/2 -translate-y-1/2"></i>
                                        <input type="password" id="password" placeholder="••••••••" required
                                            minlength="8" autocomplete="current-password"
                                            class="w-full rounded-xl border border-forest-200 bg-white/70 pl-10 pr-4 py-2.5 text-sm text-forest-900 placeholder:text-forest-400 focus:border-forest-500 focus:ring-2 focus:ring-forest-200 outline-none transition-all font-body">
                                    </div>
                                </div>

                                <div class="flex items-center justify-between text-xs font-body">
                                    <label class="flex items-center gap-2 text-forest-700 cursor-pointer select-none">
                                        <input type="checkbox"
                                            class="h-3.5 w-3.5 rounded border-forest-300 text-forest-600 focus:ring-forest-400">
                                        Ingat Saya
                                    </label>
                                    <a href="#"
                                        class="text-forest-600 font-medium hover:text-forest-800 hover:underline">Lupa
                                        Password?</a>
                                </div>

                                <button type="submit"
                                    class="btn-ripple relative w-full rounded-xl bg-forest-800 py-3 text-sm font-semibold text-white shadow-md shadow-forest-800/30 hover:bg-forest-700 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-300 font-body">
                                    Login
                                </button>
                            </form>

                            <div class="flex items-center gap-3 my-5">
                                <span class="h-px flex-1 bg-forest-200"></span>
                                <span class="text-xs text-forest-400 font-body">atau</span>
                                <span class="h-px flex-1 bg-forest-200"></span>
                            </div>

                            <button type="button" id="btn-show-register"
                                class="btn-ripple relative w-full rounded-xl border-2 border-forest-200 py-3 text-sm font-semibold text-forest-800 hover:border-forest-400 hover:bg-forest-50 transition-all duration-300 font-body">
                                Register
                            </button>
                        </div>

                        {{-- ==================== FORM REGISTER ==================== --}}
                        <div id="view-register" class="col-start-1 row-start-1 transition-opacity duration-300 opacity-0 pointer-events-none">
                            <div class="flex items-center gap-3 mb-6">
                                <div
                                    class="h-11 w-11 rounded-2xl bg-forest-800 flex items-center justify-center shadow-md">
                                    <i data-lucide="user-plus" class="h-5 w-5 text-forest-100"></i>
                                </div>
                                <div>
                                    <p class="font-display font-bold text-forest-900 leading-tight">Buat Akun Baru</p>
                                    <p class="text-xs text-forest-600 font-body">Daftar untuk akses sistem</p>
                                </div>
                            </div>

                            <form id="form-register" class="space-y-4">
                                {{-- Role Toggle Button Group --}}
                                <div class="flex bg-forest-100/60 p-1 rounded-xl mb-2">
                                    <label class="flex-1 text-center cursor-pointer relative">
                                        <input type="radio" name="role" value="guru" class="peer sr-only" checked>
                                        <div
                                            class="py-2 text-xs font-semibold text-forest-600 peer-checked:text-forest-900 peer-checked:bg-white peer-checked:shadow-sm rounded-lg transition-all font-body">
                                            Guru</div>
                                    </label>
                                    <label class="flex-1 text-center cursor-pointer relative">
                                        <input type="radio" name="role" value="siswa" class="peer sr-only">
                                        <div
                                            class="py-2 text-xs font-semibold text-forest-600 peer-checked:text-forest-900 peer-checked:bg-white peer-checked:shadow-sm rounded-lg transition-all font-body">
                                            Siswa</div>
                                    </label>
                                </div>

                                {{-- Error Message --}}
                                <div id="reg-error-box"
                                    class="hidden rounded-lg bg-red-50 text-red-600 text-xs px-3 py-2 border border-red-200 font-body">
                                    <p id="reg-error-text"></p>
                                </div>

                                <div>
                                    <label for="reg_name"
                                        class="block text-xs font-semibold text-forest-700 mb-1.5 font-body">Nama
                                        Lengkap</label>
                                    <div class="relative">
                                        <i data-lucide="user"
                                            class="h-4 w-4 text-forest-400 absolute left-3.5 top-1/2 -translate-y-1/2"></i>
                                        <input type="text" id="reg_name" placeholder="Masukkan nama" required
                                            minlength="3" autocomplete="name"
                                            class="w-full rounded-xl border border-forest-200 bg-white/70 pl-10 pr-4 py-2.5 text-sm text-forest-900 placeholder:text-forest-400 focus:border-forest-500 focus:ring-2 focus:ring-forest-200 outline-none transition-all font-body">
                                    </div>
                                </div>

                                {{-- Kelas & Jurusan (Hidden by default for Guru) --}}
                                <div id="wrapper-kelas" class="hidden transition-all duration-300">
                                    <label for="reg_kelas"
                                        class="block text-xs font-semibold text-forest-700 mb-1.5 font-body">Kelas &
                                        Jurusan</label>
                                    <div class="relative">
                                        <i data-lucide="book-open"
                                            class="h-4 w-4 text-forest-400 absolute left-3.5 top-1/2 -translate-y-1/2"></i>
                                        <input type="text" id="reg_kelas" placeholder="Contoh: XII RPL 1"
                                            minlength="3" autocomplete="off"
                                            class="w-full rounded-xl border border-forest-200 bg-white/70 pl-10 pr-4 py-2.5 text-sm text-forest-900 placeholder:text-forest-400 focus:border-forest-500 focus:ring-2 focus:ring-forest-200 outline-none transition-all font-body">
                                    </div>
                                </div>

                                <div>
                                    <label for="reg_email"
                                        class="block text-xs font-semibold text-forest-700 mb-1.5 font-body">Email</label>
                                    <div class="relative">
                                        <i data-lucide="mail"
                                            class="h-4 w-4 text-forest-400 absolute left-3.5 top-1/2 -translate-y-1/2"></i>
                                        <input type="email" id="reg_email" placeholder="nama@sekolah.sch.id" required
                                            autocomplete="email"
                                            class="w-full rounded-xl border border-forest-200 bg-white/70 pl-10 pr-4 py-2.5 text-sm text-forest-900 placeholder:text-forest-400 focus:border-forest-500 focus:ring-2 focus:ring-forest-200 outline-none transition-all font-body">
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label for="reg_password"
                                            class="block text-xs font-semibold text-forest-700 mb-1.5 font-body">Password</label>
                                        <div class="relative">
                                            <i data-lucide="lock"
                                                class="h-4 w-4 text-forest-400 absolute left-3 top-1/2 -translate-y-1/2"></i>
                                            <input type="password" id="reg_password" placeholder="••••••••" required
                                                minlength="8" autocomplete="new-password"
                                                class="w-full rounded-xl border border-forest-200 bg-white/70 pl-9 pr-3 py-2.5 text-sm text-forest-900 placeholder:text-forest-400 focus:border-forest-500 focus:ring-2 focus:ring-forest-200 outline-none transition-all font-body">
                                        </div>
                                    </div>
                                    <div>
                                        <label for="reg_password_confirm"
                                            class="block text-xs font-semibold text-forest-700 mb-1.5 font-body">Konfirmasi</label>
                                        <div class="relative">
                                            <i data-lucide="shield-check"
                                                class="h-4 w-4 text-forest-400 absolute left-3 top-1/2 -translate-y-1/2"></i>
                                            <input type="password" id="reg_password_confirm" placeholder="••••••••"
                                                required minlength="8" autocomplete="new-password"
                                                class="w-full rounded-xl border border-forest-200 bg-white/70 pl-9 pr-3 py-2.5 text-sm text-forest-900 placeholder:text-forest-400 focus:border-forest-500 focus:ring-2 focus:ring-forest-200 outline-none transition-all font-body">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit"
                                    class="btn-ripple relative w-full rounded-xl bg-forest-800 py-3 mt-2 text-sm font-semibold text-white shadow-md shadow-forest-800/30 hover:bg-forest-700 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-300 font-body">
                                    Daftar Sekarang
                                </button>
                            </form>

                            <div class="flex items-center gap-3 my-5">
                                <span class="h-px flex-1 bg-forest-200"></span>
                                <span class="text-xs text-forest-400 font-body">sudah punya akun?</span>
                                <span class="h-px flex-1 bg-forest-200"></span>
                            </div>

                            <button type="button" id="btn-show-login"
                                class="btn-ripple relative w-full rounded-xl border-2 border-forest-200 py-3 text-sm font-semibold text-forest-800 hover:border-forest-400 hover:bg-forest-50 transition-all duration-300 font-body">
                                Kembali ke Login
                            </button>
                        </div>
                    </div>
                </div>
