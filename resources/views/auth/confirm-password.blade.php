<x-guest-layout
    title="Confirm Password | Dynasti Education Center"
    eyebrow="Secure Area"
    heading="Konfirmasi password sebelum melanjutkan."
    description="Halaman ini melindungi area sensitif akun Anda. Masukkan password untuk memverifikasi identitas Anda."
    card-eyebrow="Confirm Access"
    card-title="Verifikasi password Anda"
    card-description="Masukkan password akun saat ini untuk mengakses area yang dilindungi."
    info-title="Keamanan Akun"
    info-text="Langkah tambahan ini membantu memastikan hanya pemilik akun yang dapat mengakses tindakan penting.">
    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="password" :value="__('Password')" class="mb-2 text-sm font-semibold text-gray-700" />
            <x-text-input
                id="password"
                class="block w-full rounded-xl border-gray-200 px-4 py-3 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500"
                type="password"
                name="password"
                required
                autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm" />
        </div>

        <button type="submit" class="inline-flex w-full items-center justify-center rounded-xl bg-blue-600 px-4 py-3 text-sm font-semibold text-white shadow transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            {{ __('Confirm') }}
        </button>
    </form>

    <div class="mt-6 text-center">
        <a href="/" class="text-sm text-gray-500 transition hover:text-blue-600">
            Kembali ke landing page
        </a>
    </div>
</x-guest-layout>
