<x-app-layout>

    <!-- HERO SECTION -->
    <section class="h-64 flex items-center px-10 bg-gradient-to-b from-neutral-900 to-black">
        <div data-aos="fade-right">
            <h1 class="text-5xl font-bold text-white">
                Contact <span class="text-sky-400">Us</span>
            </h1>
            <p class="text-gray-400 mt-2 text-lg">
                Have questions or feedback? We’re here to help.
            </p>
        </div>
    </section>

    <!-- CONTACT INFO -->
    <section class="py-20 px-10 bg-black">
        <div class="max-w-5xl mx-auto grid md:grid-cols-2 gap-12 items-center">

            <div data-aos="fade-right" class="space-y-6">
                <h2 class="text-3xl font-bold text-sky-400">Get in Touch</h2>
                <p class="text-gray-400 text-lg">
                    Whether you have a question about our collections, want to report a bug, or just want to say hello, we’re ready to answer all your inquiries.
                </p>

                <div class="space-y-4 text-gray-300">
                    <p><span class="font-semibold text-sky-400">Email:</span> support@sneakforce.com</p>
                    <p><span class="font-semibold text-sky-400">Phone:</span> +63 912 345 6789</p>
                    <p><span class="font-semibold text-sky-400">Address:</span> UCLM, Alaska City, Cebu, Canada, Philippines, Earth, Fudgee Bar, Spongebob 6015</p>
                </div>
            </div>

            <!-- CONTACT FORM -->
            <div data-aos="fade-left" class="bg-neutral-900 rounded-2xl p-8 border border-neutral-800">
                @if(session('success'))
                    <div class="bg-green-500 text-black p-3 rounded mb-4" data-aos="fade-down">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-gray-400 mb-2">Name</label>
                        <input type="text" id="name" name="name" required
                               class="w-full px-4 py-3 rounded-xl bg-neutral-800 border border-gray-700 text-white focus:outline-none focus:border-sky-400">
                    </div>
                    <div>
                        <label for="email" class="block text-gray-400 mb-2">Email</label>
                        <input type="email" id="email" name="email" required
                               class="w-full px-4 py-3 rounded-xl bg-neutral-800 border border-gray-700 text-white focus:outline-none focus:border-sky-400">
                    </div>
                    <div>
                        <label for="message" class="block text-gray-400 mb-2">Message</label>
                        <textarea id="message" name="message" rows="5" required
                                  class="w-full px-4 py-3 rounded-xl bg-neutral-800 border border-gray-700 text-white focus:outline-none focus:border-sky-400"></textarea>
                    </div>
                    <button type="submit"
                            class="px-6 py-3 bg-sky-500 hover:bg-sky-400 text-black font-bold rounded-xl transition transform hover:scale-105">
                        Send Message
                    </button>
                </form>
            </div>

        </div>
    </section>

    <!-- MAP SECTION -->
    <section class="py-20 px-10 bg-neutral-900">
        <div class="max-w-6xl mx-auto" data-aos="fade-up">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3925.189695922344!2d123.952539!3d10.3266989!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a9984556417115%3A0x8578d051dbbdf9e0!2sUniversity%20Of%20Cebu%20-%20Lapu-Lapu%20and%20Mandaue!5e0!3m2!1sen!2sph!4v1764373698075!5m2!1sen!2sph"
                class="w-full h-96 rounded-2xl border border-neutral-800"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <!-- CALL TO ACTION -->
    <section class="py-20 px-10 bg-black text-center" data-aos="fade-up">
        <h2 class="text-3xl font-bold text-white mb-4">Want Updates on New Releases?</h2>
        <p class="text-gray-400 mb-8">Subscribe to our newsletter and never miss a drop.</p>
        <a href="{{ route('collection') }}"
           class="px-6 py-3 bg-sky-500 hover:bg-sky-400 text-black font-bold rounded-xl transition transform hover:scale-105">
            Browse Collections
        </a>
    </section>

    <!-- FOOTER -->
    <footer class="py-10 text-center text-gray-500 border-t border-neutral-800 bg-black"
            data-aos="fade-up">
        <p>&copy; {{ date('Y') }} SneakForce. All rights reserved.</p>
    </footer>

</x-app-layout>
    