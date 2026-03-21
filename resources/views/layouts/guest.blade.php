@props([
    'title' => config('app.name', 'Dynasti Education Center'),
    'eyebrow' => 'Dynasti Access',
    'heading' => 'Masuk ke area autentikasi Dynasti.',
    'description' => 'Akses aman untuk login, verifikasi, dan pengelolaan akun di Dynasti Education Center.',
    'cardEyebrow' => 'Auth Portal',
    'cardTitle' => 'Lanjutkan proses autentikasi',
    'cardDescription' => 'Lengkapi langkah berikut untuk melanjutkan akses akun Anda.',
    'infoTitle' => 'Akses Aman',
    'infoText' => 'Seluruh proses autentikasi dirancang tetap sederhana, aman, dan konsisten dengan identitas Dynasti.',
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title }}</title>

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
                                <p class="text-sm font-semibold uppercase tracking-[0.3em] text-blue-100">{{ $eyebrow }}</p>
                                <h2 class="mt-4 text-3xl font-bold leading-tight md:text-5xl">
                                    {{ $heading }}
                                </h2>
                                <p class="mt-6 text-base leading-7 text-blue-100 md:text-lg">
                                    {{ $description }}
                                </p>
                            </div>
                        </div>

                        <div class="mt-12 rounded-2xl bg-white/10 p-5 backdrop-blur-sm">
                            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-blue-100">{{ $infoTitle }}</p>
                            <p class="mt-3 text-sm text-blue-100">
                                {{ $infoText }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center px-6 py-10 md:px-10 md:py-14">
                        <div class="mx-auto w-full max-w-md">
                            <div class="mb-8">
                                <p class="text-sm font-semibold uppercase tracking-[0.25em] text-blue-600">{{ $cardEyebrow }}</p>
                                <h3 class="mt-3 text-3xl font-bold text-gray-900">{{ $cardTitle }}</h3>
                                <p class="mt-3 text-sm leading-6 text-gray-500">
                                    {{ $cardDescription }}
                                </p>
                            </div>

                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
