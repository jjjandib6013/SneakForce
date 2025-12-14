<x-app-layout>

    {{-- PAGE HERO --}}
    <section class="h-60 flex items-center px-10 bg-gradient-to-b from-neutral-900 to-black">
        <div data-aos="fade-right">
            <h1 class="text-5xl font-bold text-white">
                SneakForce <span class="text-sky-400">Collections</span>
            </h1>
            <p class="text-gray-400 mt-2 text-lg">
                Explore our premium sneakers curated for style, comfort, and performance.
            </p>
        </div>
    </section>

     <!-- Success or Error Messages -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

    {{-- COLLECTION GRID --}}
    <section class="py-20 px-10 bg-black">
        <h2 class="text-3xl font-semibold text-sky-400 mb-12 text-center" data-aos="fade-up">
            Featured Collections
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
    </section>

    {{-- PROMO SECTION --}}
    <section class="px-10 py-20 bg-neutral-900 border-t border-neutral-800" data-aos="fade-up">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-white mb-4">
                🔥 Limited Time Drop
            </h2>
            <p class="text-gray-400 text-lg mb-8">
                Get exclusive access to rare releases and early-bird deals.
            </p>
            <button class="px-6 py-3 bg-sky-500 hover:bg-sky-400 text-black font-bold rounded-xl transition">
                View Upcoming Drops
            </button>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="py-10 text-center text-gray-500 border-t border-neutral-800 bg-black" data-aos="fade-up">
        <p>&copy; {{ date('Y') }} SneakForce. All rights reserved.</p>
    </footer>

</x-app-layout>
