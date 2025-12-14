<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SneakForce') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- AOS Animations -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-white font-sans antialiased overflow-x-hidden">

    <div class="min-h-screen flex items-center justify-center px-6 py-8">
        <!-- Container with logo and card side by side -->
        <div class="flex flex-row items-center space-x-[30rem]">
            
            <!-- Logo -->
            <div>
                <a href="/">
                    <img src="{{ asset('images/auth-logo.png') }}" alt="App Logo">
                </a>
            </div>

            <!-- Card Wrapper -->
            <div data-aos="zoom-in" data-aos-duration="800"
                class="drop-shadow-[0_20px_80px_rgba(0,200,255,0.5)] w-full sm:max-w-md bg-neutral-900 p-8 rounded-2xl border border-neutral-700 shadow-xl">
                {{ $slot }}
            </div>

        </div>
    </div>

    <!-- AOS Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>
