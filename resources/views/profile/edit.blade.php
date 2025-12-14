<x-app-layout>
    <!-- Page Header -->
    <x-slot name="header">
        <h2 class="text-4xl font-bold text-sky-400 leading-tight" data-aos="fade-down">
            {{ __('Profile Settings') }}
        </h2>
    </x-slot>

    <!-- Profile Sections -->
    <section class="py-12 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            <!-- Profile Information -->
            <div class="bg-neutral-900 rounded-2xl p-8 transition transform hover:-translate-y-1 hover:shadow-[0_0_40px_rgba(0,200,255,0.3)]" data-aos="fade-up">
                <h3 class="text-2xl font-semibold text-white mb-4">Profile Information</h3>
                <p class="text-gray-400 mb-6">
                    {{ __("Update your account's profile information and address details.") }}
                </p>
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="bg-neutral-900 rounded-2xl p-8 transition transform hover:-translate-y-1 hover:shadow-[0_0_40px_rgba(0,200,255,0.3)]" data-aos="fade-up" data-aos-delay="100">
                <h3 class="text-2xl font-semibold text-white mb-4">Update Password</h3>
                <p class="text-gray-400 mb-6">
                    {{ __('Ensure your account is using a long, random password to stay secure.') }}
                </p>
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="bg-neutral-900 rounded-2xl p-8 transition transform hover:-translate-y-1 hover:shadow-[0_0_40px_rgba(255,50,50,0.3)]" data-aos="fade-up" data-aos-delay="200">
                <h3 class="text-2xl font-semibold text-red-500 mb-4">Delete Account</h3>
                <p class="text-gray-400 mb-6">
                    {{ __('Once your account is deleted, all resources and data will be permanently deleted. Please proceed with caution.') }}
                </p>
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </section>

    <!-- AOS Script for animations -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1200,
            once: true,
        });
    </script>
</x-app-layout>
