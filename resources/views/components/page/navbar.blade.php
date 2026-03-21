<nav x-data="{ sidebarOpen: false }"
    class="fixed w-full bg-white/80 backdrop-blur shadow-sm z-50">

    <div class="max-w-7xl mx-auto flex justify-between items-center gap-4 p-5">

        <!-- Logo -->
        <div class="flex items-center gap-3 min-w-0">
            <a href="/">
                <img src="{{ asset('images/logo/dynasti_logo.png') }}"
                    alt="Dynasti Education Center"
                    class="h-10 w-10">
            </a>
            <h1 class="text-lg font-bold text-blue-600 leading-tight md:text-2xl whitespace-nowrap">
                Dynasti Education Center
            </h1>
        </div>

        <!-- Menu Desktop -->
        <div class="hidden md:flex items-center gap-6">
            <a href="#" class="hover:text-blue-600">Kelas</a>
            <a href="#" class="hover:text-blue-600">Mentor</a>
            <a href="#" class="hover:text-blue-600">Tentang</a>
        </div>

        <!-- Auth -->
        <div class="hidden md:flex items-center gap-3">
            <a href="/login" class="text-sm">Login</a>
            <a href="/register" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition">
                Daftar
            </a>
        </div>

        <!-- TOGGLE BUTTON -->
        <button
            type="button"
            class="inline-flex items-center justify-center rounded-lg border border-gray-200 p-2 text-gray-700 transition hover:bg-gray-100 md:hidden"
            @click="sidebarOpen = !sidebarOpen"
            aria-label="Toggle menu">
            <!-- ICON HAMBURGER -->
            <svg x-show="!sidebarOpen" xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>

            <!-- ICON X -->
            <svg x-show="sidebarOpen" xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

    </div>

    <!-- SIDEBAR / MOBILE MENU -->
    <div x-show="sidebarOpen"
        x-transition
        class="md:hidden bg-white shadow-lg border-t">

        <div class="flex flex-col p-5 gap-4">
            <a href="#" class="hover:text-blue-600">Kelas</a>
            <a href="#" class="hover:text-blue-600">Mentor</a>
            <a href="#" class="hover:text-blue-600">Tentang</a>

            <hr>

            <a href="/login" class="text-sm">Login</a>
            <a href="/register"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm text-center hover:bg-blue-700 transition">
                Daftar
            </a>
        </div>
    </div>

</nav>