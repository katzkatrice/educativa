<nav x-data="{ open: false }" class="sticky top-0 z-40 border-b border-blue-100/80 bg-white/85 backdrop-blur">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('images/logo/dynasti_logo.png') }}" alt="Dynasti Education Center" class="h-10 w-10 rounded-xl bg-blue-50 p-1.5 shadow-sm">
                            <div class="hidden sm:block">
                                <p class="text-xs font-semibold uppercase tracking-[0.25em] text-blue-600">Dynasti</p>
                                <p class="text-sm font-bold text-gray-900">Education Center</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="border-b-2 border-transparent !px-1 !pt-1">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')" class="border-b-2 border-transparent !px-1 !pt-1">
                        {{ __('Profile') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-3 rounded-xl border border-blue-100 bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-600 shadow-sm transition ease-in-out duration-150 hover:border-blue-200 hover:text-blue-700 focus:outline-none">
                            @php
                                $user = Auth::user();
                                $initials = collect(preg_split('/\s+/', trim($user->name) ?: 'U'))
                                    ->filter()
                                    ->take(2)
                                    ->map(fn (string $segment) => strtoupper(substr($segment, 0, 1)))
                                    ->implode('');
                                $roleLabel = $user->role === 'admin' ? 'Admin' : 'Member';
                                $roleColor = $user->role === 'admin' ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700';
                            @endphp
                            
                            <!-- Avatar dengan inisial -->
                            <div class="relative">
                                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-blue-600 to-blue-500 text-sm font-bold text-white shadow-md">
                                    {{ $initials }}
                                </div>
                                @if($user->role === 'admin')
                                    <div class="absolute -bottom-1 -right-1 flex h-4 w-4 items-center justify-center rounded-full bg-red-500 ring-2 ring-white" title="Admin">
                                        <svg class="h-2.5 w-2.5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="text-left">
                                <div class="flex items-center gap-2">
                                    <span class="font-semibold text-gray-900">{{ $user->name }}</span>
                                    <span class="inline-flex items-center rounded-md px-1.5 py-0.5 text-xs font-medium {{ $roleColor }}">
                                        {{ $roleLabel }}
                                    </span>
                                </div>
                                <div class="text-xs text-gray-500">{{ $user->email }}</div>
                            </div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- User Info -->
                        <div class="px-4 py-3 border-b border-gray-100">
                            <p class="text-sm font-semibold text-gray-900">{{ $user->name }}</p>
                            <p class="text-xs text-gray-500 truncate">{{ $user->email }}</p>
                            <div class="mt-2">
                                <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium {{ $roleColor }}">
                                    <svg class="mr-1 h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Role: {{ $roleLabel }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Menu Items -->
                        <x-dropdown-link :href="route('dashboard')" icon="home">
                            {{ __('Dashboard') }}
                        </x-dropdown-link>
                        
                        <x-dropdown-link :href="route('profile.edit')" icon="user-circle">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Divider -->
                        <div class="border-t border-gray-100 my-1"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    icon="arrow-right-on-rectangle">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center rounded-xl border border-blue-100 p-2 text-gray-500 transition duration-150 ease-in-out hover:bg-blue-50 hover:text-blue-600 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden border-t border-blue-100 bg-white/95 sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-blue-100">
            @php
                $user = Auth::user();
                $roleLabel = $user->role === 'admin' ? 'Admin' : 'Member';
                $roleColor = $user->role === 'admin' ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700';
            @endphp
            
            <div class="px-4">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-blue-600 to-blue-500 text-sm font-bold text-white shadow-md">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div>
                        <div class="font-medium text-base text-gray-800">{{ $user->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ $user->email }}</div>
                        <div class="mt-1">
                            <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium {{ $roleColor }}">
                                <svg class="mr-1 h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                Role: {{ $roleLabel }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" icon="home">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                
                <x-responsive-nav-link :href="route('profile.edit')" icon="user-circle">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                            icon="arrow-right-on-rectangle">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
