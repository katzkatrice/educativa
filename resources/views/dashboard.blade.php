<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 md:flex-row md:items-end md:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.25em] text-blue-600">Dynasti Dashboard</p>
                <h2 class="text-2xl font-bold leading-tight text-gray-900">
                    {{ __('Dashboard') }}
                </h2>
            </div>
            <p class="text-sm text-gray-500">
                Selamat datang kembali, {{ Auth::user()->name }}.
            </p>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-6 lg:grid-cols-[1.2fr_0.8fr]">
                <div class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-blue-100">
                    <div class="border-b border-blue-100 bg-gradient-to-r from-blue-600 to-blue-500 px-6 py-8 text-white">
                        <p class="text-sm font-semibold uppercase tracking-[0.25em] text-blue-100">Workspace</p>
                        <h3 class="mt-3 text-3xl font-bold">Akun Anda sudah aktif.</h3>
                        <p class="mt-3 max-w-2xl text-sm leading-6 text-blue-100">
                            Gunakan dashboard ini untuk mengelola akun, memperbarui profil, dan melanjutkan aktivitas Anda di Dynasti Education Center.
                        </p>
                    </div>
                    <div class="p-6">
                        <div class="rounded-2xl bg-blue-50 px-5 py-4 text-sm text-blue-900">
                            {{ __("You're logged in!") }}
                        </div>
                    </div>
                </div>

                <div class="grid gap-6">
                    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-blue-100">
                        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-blue-600">Akun</p>
                        <h3 class="mt-3 text-xl font-bold text-gray-900">{{ Auth::user()->name }}</h3>
                        <p class="mt-2 text-sm text-gray-500">{{ Auth::user()->email }}</p>
                    </div>

                    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-blue-100">
                        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-blue-600">Langkah Berikutnya</p>
                        <div class="mt-4 space-y-3 text-sm text-gray-600">
                            <p>Lengkapi data profil untuk pengalaman yang lebih personal.</p>
                            <p>Perbarui password secara berkala untuk menjaga keamanan akun.</p>
                            <a href="{{ route('profile.edit') }}" class="inline-flex items-center rounded-xl bg-blue-600 px-4 py-3 font-semibold text-white transition hover:bg-blue-700">
                                Buka Profil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
