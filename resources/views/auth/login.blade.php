<x-guest-layout>
    <h2 class="text-3xl font-bold text-center mb-6" data-aos="fade-down">
        Welcome
    </h2>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    @if ($errors->any())
        <div class="mb-4 rounded-xl bg-red-500/10 border border-red-500/30 p-4">
            <ul class="text-sm text-red-400 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" data-aos="fade-up">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input 
                id="email" 
                class="block mt-1 w-full rounded-xl text-black"
                type="email" 
                name="email" 
                :value="old('email')" 
                required 
                autofocus 
                autocomplete="username" 
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input 
                id="password" 
                class="block mt-1 w-full rounded-xl text-black"
                type="password"
                name="password"
                required 
                autocomplete="current-password" 
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center mt-4">
            <input 
                id="remember_me" 
                type="checkbox" 
                class="rounded border-gray-300 text-sky-400 shadow-sm focus:ring-sky-500" 
                name="remember">
            <label for="remember_me" class="ml-2 text-sm text-gray-300">
                {{ __('Remember me') }}
            </label>
        </div>

        <!-- Footer -->
        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="text-sm text-sky-400 hover:text-sky-300" 
                    href="{{ route('password.request') }}">
                    Forgot password?
                </a>
            @endif

            <x-primary-button class="px-6 py-2 rounded-xl bg-sky-500 hover:bg-sky-400 text-black">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Divider -->
    <div class="relative my-8" data-aos="fade-up">
        <div class="border-t border-neutral-700"></div>
        <span class="absolute left-1/2 -top-3 -translate-x-1/2 bg-neutral-900 px-3 text-gray-400 text-sm">
            or continue with
        </span>
    </div>

    <!-- Social Login Buttons -->
    <div class="space-y-3" data-aos="fade-up">

        <!-- Google -->
        <a href="#"
            class="w-full flex items-center justify-center gap-3 py-2 rounded-xl bg-white text-black font-semibold hover:bg-gray-200 transition">
            <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5">
            Google
        </a>

        <!-- Facebook -->
        <a href="#"
            class="w-full flex items-center justify-center gap-3 py-2 rounded-xl bg-[#1877F2] text-white font-semibold hover:bg-[#0f5bdc] transition">
            <img src="https://www.svgrepo.com/show/506656/facebook.svg" class="w-5 h-5 invert">
            Facebook
        </a>

        <!-- GitHub -->
        <a href="#"
            class="w-full flex items-center justify-center gap-3 py-2 rounded-xl bg-neutral-800 text-white font-semibold hover:bg-neutral-700 transition">
            <img src="https://www.svgrepo.com/show/512317/github-142.svg" class="w-5 h-5">
            GitHub
        </a>

    </div>

</x-guest-layout>
