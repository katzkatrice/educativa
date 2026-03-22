<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dynasti Education Center')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo/dynasti_logo.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.14.3/dist/cdn.min.js"></script>

    @stack('head')
    @stack('styles')
</head>

<body class="@yield('body_class', 'font-sans antialiased bg-gradient-to-br from-blue-50 via-white to-blue-100 text-gray-900')">
    @hasSection('content')
    @yield('content')
    @else
    <div class="relative min-h-screen overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_rgba(37,99,235,0.12),_transparent_30%),radial-gradient(circle_at_bottom_left,_rgba(59,130,246,0.1),_transparent_35%)]"></div>

        <div class="relative min-h-screen">
        @include('layouts.navigation')

        @if (isset($header))
        <header class="border-b border-blue-100/80 bg-white/70 backdrop-blur">
            <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <main class="pb-12">
            {{ $slot }}
        </main>
        </div>
    </div>
    @endif

    <!-- Floating Button -->



    @stack('scripts')
</body>

</html>
