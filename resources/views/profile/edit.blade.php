<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 md:flex-row md:items-end md:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.25em] text-blue-600">Dynasti Profile</p>
                <h2 class="text-2xl font-bold leading-tight text-gray-900">
                    {{ __('Profile') }}
                </h2>
            </div>
            <p class="text-sm text-gray-500">
                Kelola informasi akun, keamanan, dan pengaturan akses Anda.
            </p>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-6 sm:px-6 lg:px-8">
            <div class="grid gap-6 xl:grid-cols-[0.9fr_1.1fr]">
                <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-blue-100 sm:p-8">
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-blue-600">Ringkasan Akun</p>
                    <h3 class="mt-3 text-2xl font-bold text-gray-900">{{ $user->name }}</h3>
                    <p class="mt-2 text-sm text-gray-500">{{ $user->email }}</p>

                    <div class="mt-8 space-y-4 text-sm text-gray-600">
                        <div class="rounded-2xl bg-blue-50 px-4 py-4">
                            <p class="font-semibold text-blue-900">Status Profil</p>
                            <p class="mt-1 text-blue-800">Pastikan nama, email, dan password Anda selalu terbaru agar akun tetap aman dan mudah dikelola.</p>
                        </div>
                        <div class="rounded-2xl border border-blue-100 px-4 py-4">
                            <p class="font-semibold text-gray-900">Akses Cepat</p>
                            <p class="mt-1">Gunakan form di sebelah kanan untuk memperbarui data profil dan keamanan akun Anda.</p>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-white p-4 shadow-sm ring-1 ring-blue-100 sm:rounded-2xl sm:p-8">
                        <div class="max-w-2xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <div class="bg-white p-4 shadow-sm ring-1 ring-blue-100 sm:rounded-2xl sm:p-8">
                        <div class="max-w-2xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <div class="bg-white p-4 shadow-sm ring-1 ring-red-100 sm:rounded-2xl sm:p-8">
                        <div class="max-w-2xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
