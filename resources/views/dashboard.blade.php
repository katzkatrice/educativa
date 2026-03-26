<x-app-layout>
    @php
        $user = Auth::user();
        $profileRoute = route('profile.edit');
        $homeRoute = url('/');
        $memberSince = $user->created_at?->format('d M Y');
        $emailVerified = $user->hasVerifiedEmail();
        $verificationLabel = $emailVerified ? 'Email terverifikasi' : 'Perlu verifikasi email';
        $verificationColor = $emailVerified ? 'green' : 'yellow';
        $verificationIcon = $emailVerified ? 'check-badge' : 'exclamation-circle';
        $initials = collect(preg_split('/\s+/', trim($user->name) ?: 'U'))
            ->filter()
            ->take(2)
            ->map(fn (string $segment) => strtoupper(substr($segment, 0, 1)))
            ->implode('');
    @endphp

    <x-slot name="header">
        <div class="flex flex-col gap-4 xl:flex-row xl:items-end xl:justify-between">
            <div>
                <x-badge text="Dynasti Dashboard" color="primary" light icon="sparkles" class="mb-3" />
                <h2 class="text-2xl font-bold leading-tight text-gray-900">
                    {{ __('Dashboard') }}
                </h2>
                <p class="mt-2 max-w-2xl text-sm text-gray-500">
                    Selamat datang kembali, {{ $user->name }}. Area ini dirancang untuk membantu Anda mengelola akun dan tetap terhubung dengan ekosistem Dynasti.
                </p>
            </div>

            <div class="flex flex-wrap gap-3">
                <x-button :href="$homeRoute" text="Lihat Beranda" icon="arrow-right" position="right" light />
                <x-button :href="$profileRoute" text="Edit Profil" icon="user-circle" />
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
            <section class="overflow-hidden rounded-[2rem] border border-blue-100 bg-white shadow-sm">
                <div class="grid lg:grid-cols-[1.3fr_0.7fr]">
                    <div class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-blue-500 to-sky-500 px-6 py-8 text-white sm:px-8 sm:py-10">
                        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(255,255,255,0.24),_transparent_28%),radial-gradient(circle_at_bottom_right,_rgba(191,219,254,0.22),_transparent_34%)]"></div>

                        <div class="relative">
                            <x-badge text="Workspace Aktif" light icon="bolt" class="!border-white/20 !bg-white/10 !text-white" />

                            <h3 class="mt-5 text-3xl font-bold leading-tight sm:text-4xl">
                                Akun Anda sudah aktif dan siap dipakai untuk aktivitas di Dynasti.
                            </h3>

                            <p class="mt-4 max-w-2xl text-sm leading-7 text-blue-100 sm:text-base">
                                Gunakan dashboard ini untuk meninjau identitas akun, membuka pengaturan profil, dan menjaga pengalaman belajar Anda tetap rapi, aman, dan mudah diakses.
                            </p>

                            <div class="mt-8 flex flex-wrap gap-3">
                                <x-button
                                    :href="$profileRoute"
                                    text="Kelola Profil"
                                    icon="user-circle"
                                    class="!border-white !bg-white !text-blue-600 hover:!bg-blue-50 focus:!ring-white/40"
                                />
                                <x-button
                                    :href="$homeRoute"
                                    text="Jelajahi Dynasti"
                                    icon="arrow-right"
                                    position="right"
                                    class="!border-white/20 !bg-white/10 !text-white hover:!bg-white/15 focus:!ring-white/30"
                                />
                            </div>

                            <div class="mt-8 grid gap-3 sm:grid-cols-2">
                                <div class="rounded-2xl border border-white/15 bg-white/10 p-4 backdrop-blur-sm">
                                    <div class="flex items-center gap-2 text-sm font-semibold">
                                        <x-icon icon="shield-check" class="h-5 w-5" />
                                        <span>Akses Terproteksi</span>
                                    </div>
                                    <p class="mt-2 text-sm leading-6 text-blue-100">
                                        Dashboard hanya dapat diakses setelah login dan verifikasi akun berhasil.
                                    </p>
                                </div>

                                <div class="rounded-2xl border border-white/15 bg-white/10 p-4 backdrop-blur-sm">
                                    <div class="flex items-center gap-2 text-sm font-semibold">
                                        <x-icon icon="academic-cap" class="h-5 w-5" />
                                        <span>Identitas Dynasti</span>
                                    </div>
                                    <p class="mt-2 text-sm leading-6 text-blue-100">
                                        Tampilan tetap membawa nuansa profesional Dynasti: bersih, fokus, dan mudah dinavigasi.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex h-full flex-col justify-between bg-slate-950 px-6 py-8 text-white sm:px-8 sm:py-10">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-blue-200">Identitas Akun</p>

                            <div class="mt-5 flex items-center gap-4">
                                <x-avatar :text="$initials" lg color="primary" class="shrink-0 border-white/10" />

                                <div class="min-w-0">
                                    <h3 class="truncate text-2xl font-bold">{{ $user->name }}</h3>
                                    <p class="truncate text-sm text-slate-300">{{ $user->email }}</p>
                                </div>
                            </div>

                            <div class="mt-5">
                                <x-badge :text="$verificationLabel" :color="$verificationColor" light :icon="$verificationIcon" />
                            </div>
                        </div>

                        <div class="mt-8 space-y-4">
                            <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                                <p class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-400">Ringkasan</p>
                                <dl class="mt-3 space-y-3 text-sm">
                                    <div class="flex items-center justify-between gap-4">
                                        <dt class="text-slate-400">Status akun</dt>
                                        <dd class="font-semibold text-white">Aktif</dd>
                                    </div>
                                    <div class="flex items-center justify-between gap-4">
                                        <dt class="text-slate-400">Member sejak</dt>
                                        <dd class="font-semibold text-white">{{ $memberSince ?? '-' }}</dd>
                                    </div>
                                    <div class="flex items-center justify-between gap-4">
                                        <dt class="text-slate-400">Akses profil</dt>
                                        <dd class="font-semibold text-blue-200">Tersedia</dd>
                                    </div>
                                </dl>
                            </div>

                            <x-link :href="$profileRoute" icon="arrow-right" position="right" class="text-sm font-semibold text-blue-200 hover:text-white">
                                Buka pusat pengaturan akun
                            </x-link>
                        </div>
                    </div>
                </div>
            </section>

            <x-alert title="Status Login" color="green" light icon="check-circle">
                {{ __("You're logged in!") }} Semua kontrol utama akun Anda siap digunakan dari dashboard ini.
            </x-alert>

            <div class="grid gap-6 xl:grid-cols-[1.05fr_0.95fr]">
                <div class="rounded-[1.75rem] border border-blue-100 bg-white p-6 shadow-sm sm:p-8">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                        <div>
                            <x-badge text="Prioritas Berikutnya" color="primary" light icon="rocket-launch" class="mb-3" />
                            <h3 class="text-2xl font-bold text-gray-900">Langkah yang sebaiknya Anda lanjutkan</h3>
                            <p class="mt-2 text-sm leading-6 text-gray-500">
                                Fokus utama setelah login adalah menjaga data akun tetap lengkap dan keamanan akun tetap terjaga.
                            </p>
                        </div>

                        <div class="rounded-2xl bg-blue-50 px-4 py-3 text-sm font-semibold text-blue-700">
                            Siap ditindaklanjuti
                        </div>
                    </div>

                    <div class="mt-8 space-y-4">
                        <div class="flex gap-4 rounded-2xl border border-blue-100 p-4">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-blue-50 text-blue-600">
                                <x-icon icon="identification" class="h-5 w-5" />
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Lengkapi data profil</h4>
                                <p class="mt-1 text-sm leading-6 text-gray-500">
                                    Pastikan nama dan email yang Anda gunakan sudah sesuai agar komunikasi dan pengelolaan akun tetap lancar.
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4 rounded-2xl border border-blue-100 p-4">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-blue-50 text-blue-600">
                                <x-icon icon="lock-closed" class="h-5 w-5" />
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Perbarui keamanan secara berkala</h4>
                                <p class="mt-1 text-sm leading-6 text-gray-500">
                                    Gunakan halaman profil untuk mengganti password ketika diperlukan dan menjaga akses akun tetap aman.
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4 rounded-2xl border border-blue-100 p-4">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-blue-50 text-blue-600">
                                <x-icon icon="home-modern" class="h-5 w-5" />
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Lanjutkan eksplorasi layanan Dynasti</h4>
                                <p class="mt-1 text-sm leading-6 text-gray-500">
                                    Setelah akun siap, kembali ke beranda untuk meninjau layanan bimbingan, mentor, dan informasi penting lainnya.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex flex-wrap gap-3">
                        <x-button :href="$profileRoute" text="Buka Profil" icon="user-circle" />
                        <x-button :href="$homeRoute" text="Kembali ke Beranda" icon="arrow-right" position="right" light />
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="rounded-[1.75rem] border border-blue-100 bg-white p-6 shadow-sm sm:p-8">
                        <x-badge text="Akses Cepat" color="primary" light icon="squares-2x2" class="mb-3" />
                        <h3 class="text-2xl font-bold text-gray-900">Navigasi penting</h3>
                        <p class="mt-2 text-sm leading-6 text-gray-500">
                            Gunakan pintasan berikut untuk berpindah lebih cepat antar area penting.
                        </p>

                        <div class="mt-6 space-y-3">
                            <a href="{{ $profileRoute }}" class="group flex items-center justify-between rounded-2xl border border-blue-100 px-4 py-4 transition hover:border-blue-200 hover:bg-blue-50">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-blue-50 text-blue-600 transition group-hover:bg-white">
                                        <x-icon icon="user-circle" class="h-5 w-5" />
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Pengaturan Profil</p>
                                        <p class="text-sm text-gray-500">Edit informasi akun dan keamanan.</p>
                                    </div>
                                </div>
                                <x-icon icon="arrow-right" class="h-5 w-5 text-blue-500" />
                            </a>

                            <a href="{{ $homeRoute }}" class="group flex items-center justify-between rounded-2xl border border-blue-100 px-4 py-4 transition hover:border-blue-200 hover:bg-blue-50">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-blue-50 text-blue-600 transition group-hover:bg-white">
                                        <x-icon icon="globe-alt" class="h-5 w-5" />
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Beranda Dynasti</p>
                                        <p class="text-sm text-gray-500">Lihat layanan dan informasi utama.</p>
                                    </div>
                                </div>
                                <x-icon icon="arrow-right" class="h-5 w-5 text-blue-500" />
                            </a>
                        </div>
                    </div>

                    <div class="rounded-[1.75rem] border border-blue-100 bg-gradient-to-br from-blue-50 via-white to-blue-100 p-6 shadow-sm sm:p-8">
                        <x-badge text="Catatan Dynasti" color="primary" light icon="bookmark-square" class="mb-3" />
                        <h3 class="text-2xl font-bold text-gray-900">Rapi, aman, dan siap digunakan</h3>
                        <p class="mt-2 text-sm leading-6 text-gray-600">
                            Dashboard ini dioptimalkan untuk tetap ringan sekaligus memberi akses cepat ke fungsi akun yang paling sering digunakan.
                        </p>

                        <div class="mt-6 grid gap-3 sm:grid-cols-2">
                            <div class="rounded-2xl bg-white/80 px-4 py-4 ring-1 ring-blue-100">
                                <p class="text-sm font-semibold text-gray-900">Identitas visual</p>
                                <p class="mt-1 text-sm text-gray-500">Tetap konsisten dengan karakter Dynasti yang bersih dan profesional.</p>
                            </div>

                            <div class="rounded-2xl bg-white/80 px-4 py-4 ring-1 ring-blue-100">
                                <p class="text-sm font-semibold text-gray-900">Logic aman</p>
                                <p class="mt-1 text-sm text-gray-500">Semua alur utama akun tetap memakai data dan navigasi yang sama seperti sebelumnya.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
