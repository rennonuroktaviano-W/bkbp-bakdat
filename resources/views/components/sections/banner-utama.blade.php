{{-- ==========================================================
     COMPONENT: Hero Section
     ========================================================== --}}
    <section
        class="relative min-h-screen flex items-center pt-24 pb-16 overflow-hidden bg-gradient-to-b from-forest-50 via-white to-mist">

        {{-- Background decorative blobs --}}
        <div class="absolute inset-0 -z-10 leaf-vein-pattern"></div>
        <div
            class="absolute top-[-8rem] left-[-6rem] h-96 w-96 rounded-full bg-forest-300/40 blur-3xl animate-blob-slow -z-10">
        </div>
        <div
            class="absolute top-40 right-[-8rem] h-[28rem] w-[28rem] rounded-full bg-forest-200/50 blur-3xl animate-blob -z-10">
        </div>
        <div
            class="absolute bottom-[-6rem] left-1/3 h-80 w-80 rounded-full bg-sun-400/20 blur-3xl animate-blob-slow -z-10">
        </div>

        <div class="max-w-7xl mx-auto px-6 lg:px-10 w-full">
            <div class="grid lg:grid-cols-2 gap-16 items-center">

                {{-- KOLOM KIRI — Konten teks --}}
                <div class="reveal">
                    <h1
                        class="font-display font-extrabold text-4xl sm:text-5xl lg:text-6xl leading-[1.08] text-forest-950">
                        Sistem Informasi
                        <span class="block gradient-text-animated">BK/BP</span>
                        <span class="block text-forest-800">SMK Bakti Idhata</span>
                    </h1>

                    <p class="mt-6 text-lg text-forest-700/90 max-w-xl leading-relaxed font-body">
                        Mengelola data pelanggaran, absensi, konseling, hingga monitoring perilaku siswa secara digital
                        dalam satu sistem yang modern, cepat, aman, dan efisien.
                    </p>

                    {{-- CTA Buttons --}}
                    <div class="mt-10 flex flex-col sm:flex-row gap-4">
                        <a href="#dashboard"
                            class="btn-ripple group relative inline-flex items-center justify-center gap-2 rounded-2xl bg-forest-800 px-7 py-3.5 font-semibold text-white shadow-lg shadow-forest-800/30 hover:bg-forest-700 hover:shadow-xl hover:shadow-forest-700/40 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-300 font-body">
                            <i data-lucide="school" class="h-5 w-5"></i>
                            Model Dashboard
                        </a>
                        <a href="#tentang"
                            class="btn-ripple group inline-flex items-center justify-center gap-2 rounded-2xl bg-white border-2 border-forest-200 px-7 py-3.5 font-semibold text-forest-800 hover:border-forest-400 hover:bg-forest-50 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-300 font-body">
                            Pelajari Sistem
                            <i data-lucide="arrow-right"
                                class="h-5 w-5 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>

                <x-form-login-register />
            </div>
        </div>

        {{-- Scroll indicator --}}
        <div class="absolute bottom-6 left-1/2 -translate-x-1/2 animate-bounce">
            <i data-lucide="chevron-down" class="h-6 w-6 text-forest-400"></i>
        </div>
    </section>
