<x-app-layout>

    <!-- Remove Breeze White Header -->
    {{-- No header slot --}}

    <!-- HERO / TOP SECTION -->
    <section class="h-64 flex items-center px-10 bg-gradient-to-b from-neutral-900 to-black">
        <div class="space-y-3" data-aos="fade-right">
            <h1 class="text-4xl font-bold text-white">
                Welcome back, {{ Auth::user()->name }}
            </h1>
            <p class="text-gray-400 text-lg">
                Manage your activity, explore new drops, and stay updated with SneakForce.
            </p>
        </div>
    </section>

    <section class="py-10 px-10 bg-black">

        <!-- QUICK STATS -->
        <h2 class="text-2xl font-semibold text-sky-400 mb-6" data-aos="fade-down">
            Quick Overview
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-8">

            <div class="p-6 bg-neutral-900 border border-neutral-800 rounded-xl text-white 
                        hover:shadow-[0_0_30px_rgba(0,200,255,0.2)] hover:-translate-y-1 transition"
                 data-aos="zoom-in">
                <p class="text-gray-400 text-sm">Total Orders</p>
                <h3 class="text-3xl font-bold mt-2">0</h3>
            </div>

            <div class="p-6 bg-neutral-900 border border-neutral-800 rounded-xl text-white 
                        hover:shadow-[0_0_30px_rgba(0,200,255,0.2)] hover:-translate-y-1 transition"
                 data-aos="zoom-in" data-aos-delay="100">
                <p class="text-gray-400 text-sm">Wishlist Items</p>
                <h3 class="text-3xl font-bold mt-2">4</h3>
            </div>

            <div class="p-6 bg-neutral-900 border border-neutral-800 rounded-xl text-white 
                        hover:shadow-[0_0_30px_rgba(0,200,255,0.2)] hover:-translate-y-1 transition"
                 data-aos="zoom-in" data-aos-delay="200">
                <p class="text-gray-400 text-sm">Recently Viewed</p>
                <h3 class="text-3xl font-bold mt-2">12</h3>
            </div>

            <div class="p-6 bg-neutral-900 border border-neutral-800 rounded-xl text-white 
                        hover:shadow-[0_0_30px_rgba(0,200,255,0.2)] hover:-translate-y-1 transition"
                 data-aos="zoom-in" data-aos-delay="300">
                <p class="text-gray-400 text-sm">Upcoming Drops</p>
                <h3 class="text-3xl font-bold mt-2">3</h3>
            </div>

        </div>


        <!-- RECENT ACTIVITY -->
        <h2 class="text-2xl font-semibold text-sky-400 mt-16 mb-6" data-aos="fade-down">
            Recent Activity
        </h2>

        <div class="bg-neutral-900 rounded-xl p-6 border border-neutral-800" data-aos="fade-up">
            <ul class="divide-y divide-neutral-800">

                <li class="py-4 flex justify-between">
                    <span class="text-gray-300">Viewed “Air Jordan Retro 1”</span>
                    <span class="text-gray-500 text-sm">3 hours ago</span>
                </li>

                <li class="py-4 flex justify-between">
                    <span class="text-gray-300">Added “Runner Z-Boost” to wishlist</span>
                    <span class="text-gray-500 text-sm">1 day ago</span>
                </li>

                <li class="py-4 flex justify-between">
                    <span class="text-gray-300">Viewed “AirMax Velocity”</span>
                    <span class="text-gray-500 text-sm">5 days ago</span>
                </li>

            </ul>
        </div>


        <!-- RECOMMENDED FOR YOU -->
        <h2 class="text-2xl font-semibold text-sky-400 mt-16 mb-6" data-aos="fade-down">
            Recommended For You
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-12">
            @forelse ($products as $product)
                <!-- Pass a dynamic 'name' attribute to the component -->
                <x-product-card 
                    :product="$product" 
                    :name="'addToCart-' . $loop->iteration" 
                />
            @empty
                <p class="text-gray-400 text-center col-span-full">No products yet</p>
            @endforelse
        </div>


        <!-- UPCOMING DROPS -->
        <h2 class="text-2xl font-semibold text-sky-400 mt-16 mb-6" data-aos="fade-down">
            Upcoming Sneaker Drops
        </h2>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="bg-neutral-900 rounded-xl p-5 border border-neutral-800" data-aos="fade-up">
                <h3 class="font-semibold text-white mb-2">Air Jordan 1 “Phantom”</h3>
                <p class="text-gray-400 text-sm">Jan 28, 2025</p>
                <span class="text-sky-400 font-bold mt-2 block">₱14,999</span>
            </div>

            <div class="bg-neutral-900 rounded-xl p-5 border border-neutral-800" 
                 data-aos="fade-up" data-aos-delay="100">
                <h3 class="font-semibold text-white mb-2">Nike AirMax Pulse</h3>
                <p class="text-gray-400 text-sm">Feb 3, 2025</p>
                <span class="text-sky-400 font-bold mt-2 block">₱12,800</span>
            </div>

            <div class="bg-neutral-900 rounded-xl p-5 border border-neutral-800" 
                 data-aos="fade-up" data-aos-delay="200">
                <h3 class="font-semibold text-white mb-2">Adidas UltraBoost Neon</h3>
                <p class="text-gray-400 text-sm">Feb 10, 2025</p>
                <span class="text-sky-400 font-bold mt-2 block">₱11,900</span>
            </div>

        </div>


        <!-- WISHLIST PREVIEW -->
        <h2 class="text-2xl font-semibold text-sky-400 mt-16 mb-6" data-aos="fade-down">
            Your Wishlist
        </h2>

        <div class="flex gap-6 overflow-x-auto scrollbar-hidden pb-4">

            <div class="min-w-[250px] bg-neutral-900 rounded-xl p-5 border border-neutral-800"
                 data-aos="fade-up">
                <img src="https://images.unsplash.com/photo-1600180758890-6d2319e53a51"
                     class="rounded-xl mb-2">
                <h3 class="font-semibold text-white">Air Jordan Retro</h3>
                <span class="text-sky-400 font-bold">₱16,500</span>
            </div>

            <div class="min-w-[250px] bg-neutral-900 rounded-xl p-5 border border-neutral-800"
                 data-aos="fade-up" data-aos-delay="100">
                <img src="
                     class="rounded-xl mb-2">
                <h3 class="font-semibold text-white">Nike Vibe Runner</h3>
                <span class="text-sky-400 font-bold">₱10,200</span>
            </div>

        </div>


        <!-- ACCOUNT SECTION -->
        <div class="bg-neutral-900 border border-neutral-800 rounded-xl p-6 mt-20"
             data-aos="fade-up">
            <h2 class="text-2xl font-semibold text-sky-400 mb-4">Account Details</h2>

            <p class="text-gray-300 mb-1">Name: {{ Auth::user()->name }}</p>
            <p class="text-gray-300">Email: {{ Auth::user()->email }}</p>

            <a href="{{ route('profile.edit') }}"
               class="inline-block mt-4 px-4 py-2 bg-sky-600 hover:bg-sky-500 rounded-lg text-black font-semibold">
                Edit Profile
            </a>
        </div>

    </section>

</x-app-layout>
