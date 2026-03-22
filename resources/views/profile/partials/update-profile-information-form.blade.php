<section>
    <header>
        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-blue-600">Informasi Profil</p>
        <h2 class="mt-2 text-2xl font-bold text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-2 text-sm leading-6 text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-8 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" class="mb-2 text-sm font-semibold text-gray-700" />
            <x-text-input id="name" name="name" type="text" class="block w-full rounded-xl border-gray-200 px-4 py-3 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-sm" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" class="mb-2 text-sm font-semibold text-gray-700" />
            <x-text-input id="email" name="email" type="email" class="block w-full rounded-xl border-gray-200 px-4 py-3 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2 text-sm" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 rounded-2xl border border-amber-200 bg-amber-50 px-4 py-4">
                    <p class="text-sm text-amber-900">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="ml-1 font-semibold text-amber-700 underline decoration-amber-400 underline-offset-4 transition hover:text-amber-800 focus:outline-none">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-green-700">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-medium text-green-700"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
