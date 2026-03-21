<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Login | Dynasti Education Center</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-100 font-sans text-gray-900 antialiased">
        <div class="relative min-h-screen overflow-hidden">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_rgba(37,99,235,0.16),_transparent_30%),radial-gradient(circle_at_bottom_left,_rgba(59,130,246,0.12),_transparent_35%)]"></div>

            <div class="relative mx-auto flex min-h-screen max-w-7xl items-center px-6 py-10">
                <div class="grid w-full overflow-hidden rounded-[2rem] bg-white shadow-2xl lg:grid-cols-[1.05fr_0.95fr]">
                    <div class="flex flex-col justify-between bg-blue-600 px-8 py-10 text-white md:px-12 md:py-14">
                        <div>
                            <a href="/" class="inline-flex items-center gap-3">
                                <img src="{{ asset('images/logo/dynasti_logo.png') }}" alt="Dynasti Education Center" class="h-12 w-12 rounded-xl bg-white p-2 shadow-md">
                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-[0.3em] text-blue-100">Dynasti</p>
                                    <h1 class="text-lg font-bold md:text-2xl">Education Center</h1>
                                </div>
                            </a>

                            <div class="mt-14 max-w-lg">
                                <p class="text-sm font-semibold uppercase tracking-[0.3em] text-blue-100">Portal Login</p>
                                <h2 class="mt-4 text-3xl font-bold leading-tight md:text-5xl">
                                    Masuk dan lanjutkan proses belajar Anda.
                                </h2>
                                <p class="mt-6 text-base leading-7 text-blue-100 md:text-lg">
                                    Akses kelas, mentoring, dan layanan akademik dalam satu akun dengan tampilan yang selaras dengan halaman utama Dynasti.
                                </p>
                            </div>
                        </div>

                        <div class="mt-12 grid gap-4 sm:grid-cols-2">
                            <div class="rounded-2xl bg-white/10 p-5 backdrop-blur-sm">
                                <p class="text-2xl font-bold">100+</p>
                                <p class="mt-2 text-sm text-blue-100">Klien terbantu dalam publikasi dan bimbingan akademik.</p>
                            </div>
                            <div class="rounded-2xl bg-white/10 p-5 backdrop-blur-sm">
                                <p class="text-2xl font-bold">Fast Response</p>
                                <p class="mt-2 text-sm text-blue-100">Tim siap merespons konsultasi awal secara cepat dan jelas.</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center px-6 py-10 md:px-10 md:py-14">
                        <div class="mx-auto w-full max-w-md">
                            <div class="mb-8">
                                <p class="text-sm font-semibold uppercase tracking-[0.25em] text-blue-600">Welcome Back</p>
                                <h3 class="mt-3 text-3xl font-bold text-gray-900">Login ke akun Anda</h3>
                                <p class="mt-3 text-sm leading-6 text-gray-500">
                                    Gunakan email dan password yang telah terdaftar untuk mengakses dashboard Anda.
                                </p>
                            </div>

                            <x-auth-session-status class="mb-4 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-700" :status="session('status')" />

                            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                                @csrf

                                <div>
                                    <x-input-label for="email" :value="__('Email')" class="mb-2 text-sm font-semibold text-gray-700" />
                                    <x-text-input
                                        id="email"
                                        class="block w-full rounded-xl border-gray-200 px-4 py-3 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        type="email"
                                        name="email"
                                        :value="old('email')"
                                        required
                                        autofocus
                                        autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm" />
                                </div>

                                <div>
                                    <div class="mb-2 flex items-center justify-between gap-4">
                                        <x-input-label for="password" :value="__('Password')" class="text-sm font-semibold text-gray-700" />
                                        @if (Route::has('password.request'))
                                            <a class="text-sm font-medium text-blue-600 transition hover:text-blue-700" href="{{ route('password.request') }}">
                                                {{ __('Lupa password?') }}
                                            </a>
                                        @endif
                                    </div>

                                    <x-text-input
                                        id="password"
                                        class="block w-full rounded-xl border-gray-200 px-4 py-3 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        type="password"
                                        name="password"
                                        required
                                        autocomplete="current-password" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm" />
                                </div>

                                <label for="remember_me" class="flex items-center gap-3 rounded-xl border border-gray-200 px-4 py-3 text-sm text-gray-600">
                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                                    <span>{{ __('Remember me') }}</span>
                                </label>

                                <button type="submit" class="inline-flex w-full items-center justify-center rounded-xl bg-blue-600 px-4 py-3 text-sm font-semibold text-white shadow transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    {{ __('Log in') }}
                                </button>
                            </form>

                            <div class="mt-6 text-center text-sm text-gray-500">
                                Belum punya akun?
                                <a href="{{ route('register') }}" class="font-semibold text-blue-600 transition hover:text-blue-700">
                                    Daftar sekarang
                                </a>
                            </div>

                            <div class="mt-8 text-center">
                                <a href="/" class="text-sm text-gray-500 transition hover:text-blue-600">
                                    Kembali ke landing page
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
