<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and address details.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        @php
            // Prefill from last order if exists, otherwise fallback to user info
            $prefill = $user->orders()->latest()->first();
        @endphp

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-1 block w-full"
                :value="old('name', $user->name)"
                required
                autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-1 block w-full"
                :value="old('email', $user->email)"
                required />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <!-- Phone -->
        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input
                id="phone"
                name="phone"
                type="text"
                class="mt-1 block w-full"
                :value="old('phone', $prefill->phone ?? $user->phone)"
            />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <!-- Address -->
        <div>
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input
                id="address"
                name="address"
                type="text"
                class="mt-1 block w-full"
                :value="old('address', $prefill->address ?? $user->address)"
            />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        <!-- City -->
        <div>
            <x-input-label for="city" :value="__('City')" />
            <x-text-input
                id="city"
                name="city"
                type="text"
                class="mt-1 block w-full"
                :value="old('city', $prefill->city ?? $user->city)"
            />
            <x-input-error class="mt-2" :messages="$errors->get('city')" />
        </div>

        <!-- Province -->
        <div>
            <x-input-label for="province" :value="__('Province')" />
            <x-text-input
                id="province"
                name="province"
                type="text"
                class="mt-1 block w-full"
                :value="old('province', $prefill->province ?? $user->province)"
            />
            <x-input-error class="mt-2" :messages="$errors->get('province')" />
        </div>

        <!-- Postal Code -->
        <div>
            <x-input-label for="postal_code" :value="__('Postal Code')" />
            <x-text-input
                id="postal_code"
                name="postal_code"
                type="text"
                class="mt-1 block w-full"
                :value="old('postal_code', $prefill->postal_code ?? $user->postal_code)"
            />
            <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
