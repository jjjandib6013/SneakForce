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
                <a href="#collections"
                   class="px-6 py-3 bg-sky-500 rounded-xl font-bold hover:bg-sky-400 transition transform hover:scale-110 active:scale-95">
                    Shop Now
                </a>

                <a href="#collections"
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

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-10">

    <!-- Collection Card 1 -->
    <div class="bg-neutral-900 rounded-2xl p-5 transition transform hover:-translate-y-2 hover:shadow-[0_0_40px_rgba(0,200,255,0.3)] flex flex-col"
         style="height: 512px;" data-aos="zoom-in">
        <div class="flex-1 w-full overflow-hidden rounded-xl mb-4">
            <img src=""
                 class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
        </div>
        <h3 class="text-lg font-semibold text-white">Air Jordan Collection</h3>
        <p class="text-gray-400 text-sm mb-2">Classic icons, street-ready style.</p>
        <span class="text-sky-400 font-bold">₱15,999+</span>
    </div>

    <!-- Collection Card 2 -->
    <div class="bg-neutral-900 rounded-2xl p-5 transition transform hover:-translate-y-2 hover:shadow-[0_0_40px_rgba(0,200,255,0.3)] flex flex-col"
         style="height: 512px;" data-aos="zoom-in" data-aos-delay="100">
        <div class="flex-1 w-full overflow-hidden rounded-xl mb-4">
            <img src="{{ asset('images/shoes/AirMaxSeries.png') }}"
                 class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
        </div>
        <h3 class="text-lg font-semibold text-white">AirMax Series</h3>
        <p class="text-gray-400 text-sm mb-2">Next-level comfort for runners.</p>
        <span class="text-sky-400 font-bold">₱12,500+</span>
    </div>

    <!-- Collection Card 3 -->
    <div class="bg-neutral-900 rounded-2xl p-5 transition transform hover:-translate-y-2 hover:shadow-[0_0_40px_rgba(0,200,255,0.3)] flex flex-col"
         style="height: 512px;" data-aos="zoom-in" data-aos-delay="200">
        <div class="flex-1 w-full overflow-hidden rounded-xl mb-4">
            <img src=""
                 class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
        </div>
        <h3 class="text-lg font-semibold text-white">Runner Z-Boost</h3>
        <p class="text-gray-400 text-sm mb-2">Engineered for speed & comfort.</p>
        <span class="text-sky-400 font-bold">₱14,200+</span>
    </div>

    <!-- Collection Card 4 -->
    <div class="bg-neutral-900 rounded-2xl p-5 transition transform hover:-translate-y-2 hover:shadow-[0_0_40px_rgba(0,200,255,0.3)] flex flex-col"
         style="height: 512px;" data-aos="zoom-in" data-aos-delay="300">
        <div class="flex-1 w-full overflow-hidden rounded-xl mb-4">
            <img src=""
                 class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
        </div>
        <h3 class="text-lg font-semibold text-white">Street Hype Kicks</h3>
        <p class="text-gray-400 text-sm mb-2">Bold style for urban streets.</p>
        <span class="text-sky-400 font-bold">₱13,800+</span>
    </div>

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