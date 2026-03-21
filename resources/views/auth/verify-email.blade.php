<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Verify Email | Dynasti Education Center</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-100 font-sans text-gray-900 antialiased">
        <div class="relative min-h-screen overflow-hidden">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_rgba(37,99,235,0.14),_transparent_30%),radial-gradient(circle_at_bottom_left,_rgba(59,130,246,0.12),_transparent_35%)]"></div>

            <div class="relative mx-auto flex min-h-screen max-w-7xl items-center px-6 py-10">
                <div class="grid w-full overflow-hidden rounded-[2rem] bg-white shadow-2xl lg:grid-cols-[1fr_1fr]">
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
                                <p class="text-sm font-semibold uppercase tracking-[0.3em] text-blue-100">Email Verification</p>
                                <h2 class="mt-4 text-3xl font-bold leading-tight md:text-5xl">
                                    Verifikasi email untuk mengaktifkan akun.
                                </h2>
                                <p class="mt-6 text-base leading-7 text-blue-100 md:text-lg">
                                    Proses verifikasi memastikan akun Anda siap digunakan untuk mengakses seluruh layanan Dynasti Education Center.
                                </p>
                            </div>
                        </div>

                        <div class="mt-12 rounded-2xl bg-white/10 p-5 backdrop-blur-sm">
                            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-blue-100">Langkah Berikutnya</p>
                            <p class="mt-3 text-sm text-blue-100">
                                Buka email Anda, klik tautan verifikasi, lalu kembali untuk mulai menggunakan akun.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center px-6 py-10 md:px-10 md:py-14">
                        <div class="mx-auto w-full max-w-md">
                            <div class="mb-8">
                                <p class="text-sm font-semibold uppercase tracking-[0.25em] text-blue-600">Verify Account</p>
                                <h3 class="mt-3 text-3xl font-bold text-gray-900">Verifikasi email Anda</h3>
                                <p class="mt-3 text-sm leading-6 text-gray-500">
                                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                                </p>
                            </div>

                            @if (session('status') == 'verification-link-sent')
                                <div class="mb-4 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-700">
                                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                </div>
                            @endif

                            <div class="space-y-4">
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf

                                    <button type="submit" class="inline-flex w-full items-center justify-center rounded-xl bg-blue-600 px-4 py-3 text-sm font-semibold text-white shadow transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                        {{ __('Resend Verification Email') }}
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <button type="submit" class="inline-flex w-full items-center justify-center rounded-xl border border-gray-200 px-4 py-3 text-sm font-semibold text-gray-700 transition hover:border-blue-200 hover:bg-blue-50 hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                        {{ __('Log Out') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
