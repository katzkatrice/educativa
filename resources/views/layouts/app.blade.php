<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo/dynasti_logo.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

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
</head>

<body class="@yield('body_class', 'font-sans antialiased')">
    @hasSection('content')
    @yield('content')
    @else
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <main>
            {{ $slot }}
        </main>
    </div>
    @endif

    <!-- Floating Button -->



    @stack('scripts')
</body>

</html>