<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-black text-white overflow-x-hidden">
        <div class="bg-black text-white">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="pt-28">
                {{ $slot }}
            </main>
        </div>

        <div 
            x-data="{ show:false, message:'', timeout:null }"
            @toast.window="
                message = $event.detail.message;
                show = true;
                clearTimeout(timeout);
                timeout = setTimeout(() => show = false, 2000);
            "
            class="fixed inset-0 flex items-center justify-center z-[9999] pointer-events-none"
        >
            <div 
                x-show="show"
                x-transition.duration.300ms
                class="bg-neutral-900 border border-neutral-700 py-6 px-10 rounded-3xl shadow-2xl flex flex-col items-center gap-4 pointer-events-auto"
            >
                <span class="text-green-400 text-6xl font-bold animate-bounce">✔️</span>
                <p class="text-white text-lg font-semibold" x-text="message"></p>
            </div>
        </div>

        <script src="//unpkg.com/alpinejs" defer></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                function updateCartCounter() {
                    fetch("{{ route('cart.count') }}")
                        .then(response => response.json())
                        .then(data => {
                            const cartCountElement = document.querySelector('span[data-cart-count]');
                            if (cartCountElement) {
                                cartCountElement.textContent = data.count || 0;
                            }
                        })
                        .catch(error => console.error('Error fetching cart count:', error));
                }

                updateCartCounter();
                setInterval(updateCartCounter, 5000);
            });
        </script>

    </body>
</html>
