<nav 
    x-data="{ last: 0, show: true }"
    x-init="
        window.addEventListener('scroll', () => {
            let y = window.scrollY;
            show = y < last || y < 50;
            last = y;
        });
    "
    :class="show ? 'translate-y-0' : '-translate-y-full'"
    class="flex justify-between items-center px-10 py-6 bg-black/80 backdrop-blur-md fixed top-0 left-0 w-full z-50 border-b border-neutral-800 transition-all duration-300"
>
    <!-- Logo -->
    <div class="shrink-0">
        <a href="{{ route('dashboard') }}" class="flex items-center">
            <x-application-logo 
                class="h-20 w-auto text-sky-400 hover:text-cyan-400 transition-colors duration-300"
            />
        </a>
    </div>

    <!-- Main nav links -->
    <ul class="flex gap-20 text-lg">
        <li><a href="{{ route('dashboard') }}" name ="dashboard" class="hover:text-gray-300 transition">Home</a></li>
        <li><a href="{{ route('collection') }}" name="collections"class="hover:text-gray-300 transition">Collections</a></li>
        <li><a href="{{ route('about') }}" name="about"class="hover:text-gray-300 transition">About</a></li>
        <li><a href="{{ route('contact') }}" name="contact"class="hover:text-gray-300 transition">Contact</a></li>
    </ul>

    @auth
         <!-- Right section: Cart, Orders, Auth --> 
    <div class="flex items-center space-x-4">
        @if(Auth::user()->is_admin)
            <a href="{{ route('admin.products.index') }}"
            class="px-3 py-2 text-sm font-semibold border border-sky-400 text-sky-400 rounded-lg hover:bg-sky-400 hover:text-black transition">
                Manage Products
            </a>
        @endif
        <!-- Cart icon with dynamic counter -->
        <a href="{{ route('cart.index') }}" name="cart" class="relative hover:text-gray-300 transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9h14l-2-9M5 21h14" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span data-cart-count class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full text-xs px-1">
                {{ session('cart') ? array_sum(array_column(session('cart'), 'quantity')) : 0 }}
            </span>
        </a>

        <!-- Orders link -->    
        <a href="{{ route('orders.index') }}" class="hover:text-gray-300 transition">My Orders</a>
    @endauth

        <!-- Auth Dropdown / Login/Register -->
        @auth
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-200 bg-neutral-900 hover:text-sky-400 focus:outline-none focus:ring-2 focus:ring-sky-400 transition-colors duration-300">
                            <div>
                                {{ Auth::user()->name }}
                                @if(Auth::user()->is_admin)
                                    <span class="ml-1 text-xs text-sky-400 font-semibold">@admin</span>
                                @endif
                            </div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="hover:text-sky-400">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="hover:text-red-400">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        @endauth

        @guest
            <div class="flex space-x-4">
                <a href="{{ route('login') }}"
                class="px-5 py-2 bg-white text-black rounded-xl font-semibold hover:bg-gray-200 transition transform hover:scale-105">
                    Login
                </a>

                <a href="{{ route('register') }}"
                class="px-5 py-2 bg-black text-white rounded-xl font-semibold border border-white hover:bg-gray-800 transition transform hover:scale-105">
                    Register
                </a>
            </div>
        @endguest
    </div>

    <!-- Hamburger -->
    <div class="-mr-2 flex items-center sm:hidden">
        <button @click="open = ! open"
            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-sky-400 hover:bg-gray-800 focus:outline-none focus:bg-gray-800 transition duration-150 ease-in-out">
            <svg class="h-6 w-6" name="cartIcon" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</nav>
