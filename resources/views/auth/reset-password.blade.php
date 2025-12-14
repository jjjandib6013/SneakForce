<x-guest-layout>

    <!-- Title -->
    <h2 class="text-2xl font-bold text-center mb-4" data-aos="fade-down">
        Reset Your Password 
    </h2>

    <p class="text-sm text-gray-400 text-center mb-6" data-aos="fade-up">
        Set a new password to get back into your account.
    </p>

    <form method="POST" action="{{ route('password.store') }}" data-aos="fade-up">
        @csrf

        <!-- Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />

            <x-text-input 
                id="email" 
                class="block mt-1 w-full rounded-xl text-black"
                type="email" 
                name="email" 
                :value="old('email', $request->email)" 
                required 
                autofocus 
                autocomplete="username" 
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- New Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('New Password')" />

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

        <!-- Submit -->
        <div class="flex items-center justify-end mt-6">
            <x-primary-button class="px-6 py-2 rounded-xl bg-sky-500 hover:bg-sky-400 text-black">
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>

</x-guest-layout>
