<nav class="fixed w-full bg-white/80 backdrop-blur shadow-sm z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center p-5">

        <!-- KIRI: Logo + Nama -->
        <div class="flex items-center gap-3">
            <a href="/">
                <img src="{{ asset('images/logo/dynasti_logo.png') }}"
                    alt="Dynasti Education Center"
                    class="h-10 w-10">
            </a>
            <h1 class="text-2xl font-bold text-blue-600 whitespace-nowrap">
                Dynasti Education Center
            </h1>
        </div>

        <!-- MENU -->
        <div class="hidden md:flex items-center gap-6">
            <a href="#" class="hover:text-blue-600">Kelas</a>
            <a href="#" class="hover:text-blue-600">Mentor</a>
            <a href="#" class="hover:text-blue-600">Tentang</a>
        </div>

        <!-- AUTH -->
        <div class="flex items-center gap-3">
            <a href="/login" class="text-sm">Login</a>
            <a href="/register" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition">
                Daftar
            </a>
        </div>

    </div>
</nav>