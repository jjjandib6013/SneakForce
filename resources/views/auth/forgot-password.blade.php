<x-guest-layout>

    <!-- Title -->
    <h2 class="text-2xl font-bold text-center mb-4" data-aos="fade-down">
        Forgot Your Password?
    </h2>

    <p class="text-sm text-gray-400 text-center mb-6 max-w-md mx-auto" data-aos="fade-up">
        Don’t stress. Drop your email below and we’ll send you a reset link ASAP.
    </p>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" data-aos="fade-up" />

    <form method="POST" action="{{ route('password.email') }}" data-aos="fade-up">
        @csrf

        <!-- Email Address -->
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
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Submit -->
        <div class="flex items-center justify-end mt-6">
            <x-primary-button 
                class="px-6 py-2 rounded-xl bg-sky-500 hover:bg-sky-400 text-black">
                {{ __('Send Reset Link') }}
            </x-primary-button>
        </div>
    </form>

</x-guest-layout>
