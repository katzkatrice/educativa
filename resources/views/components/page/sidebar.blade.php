<div
    x-cloak
    x-show="sidebarOpen"
    class="fixed inset-0 z-[60] md:hidden"
    aria-hidden="true"
>
    <div
        class="absolute inset-0 bg-gray-900/50"
        @click="sidebarOpen = false"
    ></div>

    <aside
        x-show="sidebarOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="absolute left-0 top-0 flex h-full w-72 max-w-[85vw] flex-col bg-white shadow-2xl"
    >
        <div class="flex items-center justify-between border-b border-gray-100 px-5 py-4">
            <div class="flex items-center gap-3">
                <img
                    src="{{ asset('images/logo/dynasti_logo.png') }}"
                    alt="Dynasti Education Center"
                    class="h-10 w-10"
                >
                <div>
                    <p class="font-bold text-blue-600">Dynasti Education Center</p>
                    <p class="text-sm text-gray-500">Menu Navigasi</p>
                </div>
            </div>

            <button
                type="button"
                class="rounded-lg p-2 text-gray-600 transition hover:bg-gray-100"
                @click="sidebarOpen = false"
                aria-label="Tutup menu navigasi"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="flex flex-1 flex-col gap-8 px-5 py-6">
            <nav class="flex flex-col gap-3 text-base font-medium text-gray-700">
                <a href="#" class="rounded-lg px-4 py-3 transition hover:bg-blue-50 hover:text-blue-600" @click="sidebarOpen = false">Kelas</a>
                <a href="#" class="rounded-lg px-4 py-3 transition hover:bg-blue-50 hover:text-blue-600" @click="sidebarOpen = false">Mentor</a>
                <a href="#" class="rounded-lg px-4 py-3 transition hover:bg-blue-50 hover:text-blue-600" @click="sidebarOpen = false">Tentang</a>
            </nav>

            <div class="flex flex-col gap-3 border-t border-gray-100 pt-6">
                <a href="/login" class="rounded-lg border border-gray-200 px-4 py-3 text-center text-sm font-medium text-gray-700 transition hover:bg-gray-50">
                    Login
                </a>
                <a href="/register" class="rounded-lg bg-blue-600 px-4 py-3 text-center text-sm font-semibold text-white transition hover:bg-blue-700">
                    Daftar
                </a>
            </div>
        </div>
    </aside>
</div>
