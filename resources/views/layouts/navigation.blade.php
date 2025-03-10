<nav x-data="{ open: false }" class="bg-orange-200 border-b border-black">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center  ">
                    <a href="{{ route('dashboard') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="35" viewBox="0 0 301 231"
                            fill="none">
                            <rect x="46.9999" y="41.92" width="23" height="189" fill="#14303D" />
                            <path
                                d="M124.104 9.92002L140.311 26.2396L37.5001 128.42L3.27233e-05 128.42L124.104 9.92002Z"
                                fill="#14303D" />
                            <path
                                d="M124.104 9.92002L140.311 26.2396L37.5001 128.42L3.27233e-05 128.42L124.104 9.92002Z"
                                fill="#14303D" />
                            <path d="M126.246 9.31123L110.039 25.6308L212.85 127.811L250.35 127.811L126.246 9.31123Z"
                                fill="#14303D" />
                            <path d="M126.246 9.31123L110.039 25.6308L212.85 127.811L250.35 127.811L126.246 9.31123Z"
                                fill="#14303D" />
                            <path d="M187.5 16.42L154 17.92L263.497 128.311L300.997 128.311L187.5 16.42Z"
                                fill="#14303D" />
                            <path d="M187.5 16.42L154 17.92L263.497 128.311L300.997 128.311L187.5 16.42Z"
                                fill="#14303D" />
                            <rect x="60.9999" y="230.92" width="23" height="189"
                                transform="rotate(-90 60.9999 230.92)" fill="#14303D" />
                            <rect x="100" y="154.92" width="23" height="23" transform="rotate(-90 100 154.92)"
                                fill="#F49322" />
                            <rect x="132" y="154.92" width="23" height="23" transform="rotate(-90 132 154.92)"
                                fill="#F49322" />
                            <rect x="100" y="186.92" width="23" height="23" transform="rotate(-90 100 186.92)"
                                fill="#F49322" />
                            <rect x="132" y="186.92" width="23" height="23" transform="rotate(-90 132 186.92)"
                                fill="#F49322" />
                        </svg>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @if (auth()->user()->isAdmin())
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Beranda') }}
                        </x-nav-link>

                        <x-nav-link :href="route('admin.user.index')" :active="request()->routeIs('admin.user.index')">
                            {{ __('Users') }}
                        </x-nav-link>

                        <x-nav-link :href="route('admin.kost.index')" :active="request()->routeIs('admin.kost.index', 'admin.kost.create', 'admin.kost.edit')">
                            {{ __('Kos') }}
                        </x-nav-link>

                        <x-nav-link :href="route('admin.reservations.index')" :active="request()->routeIs('admin.reservations.index')">
                            {{ __('Reservasi') }}
                        </x-nav-link>
                    @endif
                    @if (auth()->user()->isCustomer())
                        <x-nav-link :href="route('customer.kost.index')" :active="request()->routeIs('customer.kost.index')">
                            {{ __('Beranda') }}
                        </x-nav-link>

                        <x-nav-link :href="route('customer.reservations.index')" :active="request()->routeIs('customer.reservations.index')">
                            {{ __('Reservasi') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        @if (auth()->user()->isCustomer())
                            <x-dropdown-link :href="route('customer.reservations.index')">
                                {{ __('Reservasi') }}
                            </x-dropdown-link>
                        @endif

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @if (auth()->user()->isAdmin())
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            @else
                <x-responsive-nav-link :href="route('customer.kost.index')" :active="request()->routeIs('customer.kost.index')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                @if (auth()->user()->isCustomer())
                    <x-responsive-nav-link :href="route('customer.reservations.index')">
                        {{ __('Reservasi') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
