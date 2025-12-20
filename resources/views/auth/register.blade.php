<x-guest-layout>
    <h2 class="text-3xl font-bold text-center mb-6" data-aos="fade-down">
        Create an Account
    </h2>

    <form method="POST" action="{{ route('register') }}" data-aos="fade-up">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input 
                id="name" 
                class="block mt-1 w-full rounded-xl text-black"
                type="text" 
                name="name" 
                :value="old('name')" 
                required 
                autofocus 
                autocomplete="name" 
            />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input 
                id="email" 
                class="block mt-1 w-full rounded-xl text-black"
                type="email" 
                name="email" 
                :value="old('email')" 
                required 
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
                autocomplete="new-password" 
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input 
                id="password_confirmation" 
                class="block mt-1 w-full rounded-xl text-black"
                type="password"
                name="password_confirmation" 
                required 
                autocomplete="new-password" 
            />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Footer -->
        <div class="flex items-center justify-between mt-6">
            <a class="text-sm text-sky-400 hover:text-sky-300" href="{{ route('login') }}">
                Already have an account?
            </a>

            <x-primary-button id="submit" class="px-6 py-2 rounded-xl bg-sky-500 hover:bg-sky-400 text-black">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Divider -->
    <div class="relative my-8" data-aos="fade-up">
        <div class="border-t border-neutral-700"></div>
        <span class="absolute left-1/2 -top-3 -translate-x-1/2 bg-neutral-900 px-3 text-gray-400 text-sm">
            or sign up with
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
            <img src="https://www.svgrepo.com/show/506477/facebook.svg" class="w-5 h-5 invert">
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
