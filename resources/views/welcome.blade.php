<x-app-layout>
        <!-- HERO SECTION -->
    <section class="h-screen flex items-center px-20 relative bg-gradient-to-b from-neutral-900 to-black">
        <div class="w-1/2 space-y-6" data-aos="fade-right">
            <h1 class="text-5xl font-bold leading-tight">
                Step Into <span class="text-sky-400">Next-Level</span> Comfort & Style
            </h1>

            <p class="text-lg text-gray-300">
                Discover premium sneakers designed for movement, performance, and drip.
            </p>

            <div class="flex gap-5 pt-5">
                <a href="{{ route('collection') }}"
                   class="px-6 py-3 bg-sky-500 rounded-xl font-bold hover:bg-sky-400 transition transform hover:scale-110 active:scale-95">
                    Shop Now
                </a>

                <a href="{{ route('collection') }}"
                   class="px-6 py-3 border border-gray-500 rounded-xl font-semibold hover:bg-gray-800 transition transform hover:scale-105">
                    Explore Collection
                </a>
            </div>
        </div>

        <!-- Hero Image -->
        <div class="w-1/2 flex justify-center" data-aos="fade-left">
            <img src="{{ asset('images/img-landing.png') }}"
                 alt="Sneaker"
                 class="drop-shadow-[0_20px_80px_rgba(0,200,255,0.5)] w-[500px] hover:scale-105 transition-all duration-500">
        </div>
    </section>

    <!-- FEATURED -->
    <!-- COLLECTIONS -->
<section id="collections" class="py-24 px-10 bg-black">
    <h2 class="text-4xl font-bold mb-12 text-center text-sky-400" data-aos="fade-down">
        SneakForce Collections
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


    <!-- FOOTER -->
    <footer class="py-10 text-center text-gray-500 border-t border-gray-800 mt-20" data-aos="fade-up">
        <p>&copy; {{ date('Y') }} SneakForce. All rights reserved.</p>
    </footer>

    <!-- AOS Script -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1200,
            once: true,
        });
    </script>
</x-app-layout>