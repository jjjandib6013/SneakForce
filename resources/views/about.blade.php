<x-app-layout>

    <!-- HERO SECTION -->
    <section class="h-64 flex items-center px-10 bg-gradient-to-b from-neutral-900 to-black">
        <div data-aos="fade-right">
            <h1 class="text-5xl font-bold text-white">
                About <span class="text-sky-400">SneakForce</span>
            </h1>
            <p class="text-gray-400 mt-2 text-lg">
                Step into the world of premium sneakers, where style meets comfort.
            </p>
        </div>
    </section>

    <!-- OUR STORY -->
    <section class="py-20 px-10 bg-black">
        <div class="max-w-5xl mx-auto grid md:grid-cols-2 gap-12 items-center">

            <div data-aos="fade-right">
                <img src="{{ asset('images/auth-logo.png') }}" 
                     alt="App Logo" 
                     class="rounded-2xl w-full shadow-lg hover:scale-105 transition">
            </div>

            <div data-aos="fade-left" class="space-y-6">
                <h2 class="text-3xl font-bold text-sky-400">Our Story</h2>
                <p class="text-gray-300 text-lg">
                    SneakForce was founded with one mission: to provide sneaker enthusiasts
                    with the best designs that combine performance, comfort, and street style.
                </p>
                <p class="text-gray-400 text-lg">
                    From classic icons to limited edition drops, our collections
                    are carefully curated to match every personality and lifestyle.
                </p>
            </div>

        </div>
    </section>

    <!-- OUR MISSION -->
    <section class="py-20 px-10 bg-neutral-900">
        <div class="max-w-5xl mx-auto text-center space-y-6" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-sky-400">Our Mission</h2>
            <p class="text-gray-400 text-lg">
                To deliver premium sneakers that elevate your performance and style,
                while providing an unmatched shopping experience.
            </p>
        </div>
    </section>

    <!-- TEAM MEMBERS -->
    <section class="py-20 px-10 bg-black">
        <h2 class="text-3xl font-bold text-sky-400 text-center mb-12" data-aos="fade-down">
            Meet Our Team
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-10">

            <div class="bg-neutral-900 rounded-2xl p-5 border border-neutral-800 text-center"
                 data-aos="zoom-in">
                <img src="{{ asset('images/SneakForce Team/Ahmad-Amlani-Salsalani.jpg') }}"
                     class="rounded-full w-32 h-32 mx-auto mb-4">
                <h3 class="text-white font-semibold">Ahmad Jamil Amlani</h3>
                <p class="text-gray-400 text-sm">Lead Desginer<br>Hipster</p>
            </div>

            <div class="bg-neutral-900 rounded-2xl p-5 border border-neutral-800 text-center"
                 data-aos="zoom-in" data-aos-delay="100">
                <img src="{{ asset('images/SneakForce Team/JanDaeveLouis-Nunez.jpg') }}"
                     class="rounded-full w-32 h-32 mx-auto mb-4">
                <h3 class="text-white font-semibold">Jan Daeve Louis P. Nunez</h3>
                <p class="text-gray-400 text-sm">Project Manager<br>Hacker</p>
            </div>

            <div class="bg-neutral-900 rounded-2xl p-5 border border-neutral-800 text-center"
                 data-aos="zoom-in" data-aos-delay="200">
                <img src="{{ asset('images/SneakForce Team/Sam-Cabrillos.jpg') }}"
                     class="rounded-full w-32 h-32 mx-auto mb-4">
                <h3 class="text-white font-semibold">Samantha Marie Nicole Cabrillos-Gerunda</h3>
                <p class="text-gray-400 text-sm">Miniaturized<br>Microscopic Person<br>4'5" in spirit</p>
            </div>

            <div class="bg-neutral-900 rounded-2xl p-5 border border-neutral-800 text-center"
                 data-aos="zoom-in" data-aos-delay="300">
                <img src="{{ asset('images/SneakForce Team/Eric-Lapingcao.png') }}" 
                     class="rounded-full w-32 h-32 mx-auto mb-4">
                <h3 class="text-white font-semibold">Jose Lapingcao</h3>
                <p class="text-gray-400 text-sm">The Ancient One<br>Previously one of the Egyptian Gods<br>Juan Ponce Enrile's Other Half</p>
            </div>

            <div class="bg-neutral-900 rounded-2xl p-5 border border-neutral-800 text-center"
                 data-aos="zoom-in" data-aos-delay="300">
                <img src="{{ asset('images/SneakForce Team/Daryll-Mendez.png') }}" 
                     class="rounded-full w-32 h-32 mx-auto mb-4">
                <h3 class="text-white font-semibold">Daryll Mendez</h3>
                <p class="text-gray-400 text-sm">Pancit Canton Cocker</p>
            </div>

        </div>
    </section>

    <!-- OUR VALUES -->
    <section class="py-20 px-10 bg-neutral-900">
        <h2 class="text-3xl font-bold text-sky-400 text-center mb-12" data-aos="fade-down">
            Our Values
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 max-w-6xl mx-auto">

            <div class="bg-neutral-900 rounded-xl p-6 border border-neutral-800 text-center"
                 data-aos="fade-up">
                <h3 class="text-xl font-semibold text-white mb-2">Quality</h3>
                <p class="text-gray-400">We ensure every sneaker meets high standards of design and comfort.</p>
            </div>

            <div class="bg-neutral-900 rounded-xl p-6 border border-neutral-800 text-center"
                 data-aos="fade-up" data-aos-delay="100">
                <h3 class="text-xl font-semibold text-white mb-2">Innovation</h3>
                <p class="text-gray-400">We constantly create new designs that push boundaries.</p>
            </div>

            <div class="bg-neutral-900 rounded-xl p-6 border border-neutral-800 text-center"
                 data-aos="fade-up" data-aos-delay="200">
                <h3 class="text-xl font-semibold text-white mb-2">Community</h3>
                <p class="text-gray-400">We connect with sneaker lovers and give back to our fans.</p>
            </div>

        </div>
    </section>

    <!-- CALL TO ACTION -->
    <section class="py-20 px-10 bg-black text-center" data-aos="fade-up">
        <h2 class="text-3xl font-bold text-white mb-4">Ready to Elevate Your Sneaker Game?</h2>
        <p class="text-gray-400 mb-8">Browse our collections and find your perfect pair today.</p>
        <a href="{{ route('collection') }}" 
           class="px-6 py-3 bg-sky-500 hover:bg-sky-400 text-black font-bold rounded-xl transition">
            Explore Collections
        </a>
    </section>

    <!-- FOOTER -->
    <footer class="py-10 text-center text-gray-500 border-t border-neutral-800 bg-black"
            data-aos="fade-up">
        <p>&copy; {{ date('Y') }} SneakForce. All rights reserved.</p>
    </footer>

</x-app-layout>
