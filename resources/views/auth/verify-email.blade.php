<x-guest-layout>

    <!-- Title -->
    <h2 class="text-2xl font-bold text-center mb-4" data-aos="fade-down">
        Verify Your Email
    </h2>

    <p class="text-sm text-gray-400 text-center mb-6" data-aos="fade-up">
        We sent a verification link to your inbox. Tap it to activate your account.
    </p>

    <!-- Info Text -->
    <div class="mb-4 text-sm text-gray-500 text-center" data-aos="fade-up">
        {{ __('If you didn\'t receive anything, no worries — you can request a new one below.') }}
    </div>

    <!-- Status -->
    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 text-center text-green-500 font-medium" data-aos="fade-up">
            {{ __('A fresh verification link has been sent to your email!') }}
        </div>
    @endif

    <div class="mt-6 flex flex-col gap-3" data-aos="fade-up">

        <!-- Resend Email -->
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <x-primary-button class="w-full justify-center bg-sky-500 hover:bg-sky-400 text-black py-2 rounded-xl">
                {{ __('Resend Verification Email') }}
            </x-primary-button>
        </form>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button 
                type="submit"
                class="w-full text-center text-sm text-gray-400 hover:text-gray-200 transition underline">
                {{ __('Log Out') }}
            </button>
        </form>

    </div>

</x-guest-layout>
