<x-guest-layout>

    <!-- Title -->
    <h2 class="text-2xl font-bold text-center mb-4" data-aos="fade-down">
        Confirm Your Password
    </h2>

    <p class="text-sm text-gray-400 text-center mb-6 max-w-md mx-auto" data-aos="fade-up">
        This step keeps your account safe. Enter your password to continue.
    </p>

    <form method="POST" action="{{ route('password.confirm') }}" data-aos="fade-up">
        @csrf

        <!-- Password -->
        <div>
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

        <!-- Submit -->
        <div class="flex justify-end mt-6">
            <x-primary-button class="px-6 py-2 rounded-xl bg-sky-500 hover:bg-sky-400 text-black">
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>

</x-guest-layout>
