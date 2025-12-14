<x-app-layout>

    {{-- PAGE HERO --}}
    <section class="h-40 sm:h-56 flex items-center px-10 bg-gradient-to-b from-neutral-900 to-black">
        <div data-aos="fade-right">
            <h1 class="text-4xl sm:text-5xl font-bold text-white">Checkout</h1>
            <p class="text-gray-400 mt-2">Almost there! Complete your order!</p>
        </div>
    </section>

    <section class="py-20 px-10 bg-black min-h-screen">
        <div class="max-w-7xl mx-auto grid grid-cols-1 xl:grid-cols-3 gap-10">

            {{-- LEFT SIDE: FORMS --}}
            <div class="xl:col-span-2 space-y-10">

                <form action="{{ route('checkout.store') }}" method="POST">
                    @csrf

                    {{-- CONTACT INFO --}}
                    <div class="bg-neutral-900 p-8 rounded-2xl border border-neutral-800">
                        <h2 class="text-2xl font-bold text-white mb-6">Contact Information</h2>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <input type="text" placeholder="Full Name" name="full_name"
                                   value="{{ old('full_name', auth()->user()->name) }}"
                                   class="px-4 py-3 rounded-xl bg-neutral-800 text-white">

                            <input type="email" placeholder="Email Address" name="email"
                                   value="{{ old('email', auth()->user()->email) }}"
                                   class="px-4 py-3 rounded-xl bg-neutral-800 text-white">

                            <input type="text" placeholder="Phone Number" name="phone"
                                   value="{{ old('phone', auth()->user()->phone) }}"
                                   class="px-4 py-3 rounded-xl bg-neutral-800 text-white sm:col-span-2">
                        </div>
                    </div>

                    {{-- SHIPPING INFO --}}
                    <div class="bg-neutral-900 p-8 rounded-2xl border border-neutral-800">
                        <h2 class="text-2xl font-bold text-white mb-6">Shipping Address</h2

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <input type="text" placeholder="Address Line 1" name="address"
                                   value="{{ old('address', auth()->user()->address) }}"
                                   class="px-4 py-3 rounded-xl bg-neutral-800 text-white sm:col-span-2">

                            <input type="text" placeholder="City" name="city"
                                   value="{{ old('city', auth()->user()->city) }}"
                                   class="px-4 py-3 rounded-xl bg-neutral-800 text-white">

                            <input type="text" placeholder="Province" name="province"
                                   value="{{ old('province', auth()->user()->province) }}"
                                   class="px-4 py-3 rounded-xl bg-neutral-800 text-white">

                            <input type="text" placeholder="Postal Code" name="postal_code"
                                   value="{{ old('postal_code', auth()->user()->postal_code) }}"
                                   class="px-4 py-3 rounded-xl bg-neutral-800 text-white">

                            <select name="country" class="px-4 py-3 rounded-xl bg-neutral-800 text-white">
                                <option value="Philippines" selected>Philippines</option>
                            </select>
                        </div>
                    </div>

                    {{-- PAYMENT METHOD --}}
                    <div class="bg-neutral-900 p-8 rounded-2xl border border-neutral-800">
                        <h2 class="text-2xl font-bold text-white mb-6">Payment Method</h2>

                        <div class="space-y-6">

                            {{-- COD --}}
                            <label class="flex items-center justify-between bg-neutral-800 p-5 rounded-xl cursor-pointer hover:bg-neutral-700 transition" name="cod">
                                <div class="flex items-center gap-4">
                                    <input type="radio" name="payment_method" value="cod" class="accent-sky-500" {{ old('payment_method') === 'cod' ? 'checked' : '' }}>
                                    <span class="text-white font-semibold">Cash on Delivery</span>
                                </div>
                                <span class="text-gray-400 text-sm">Pay upon arrival</span>
                            </label>

                            {{-- GCASH --}}
                            <label class="flex items-center justify-between bg-neutral-800 p-5 rounded-xl cursor-pointer hover:bg-neutral-700 transition">
                                <div class="flex items-center gap-4">
                                    <input type="radio" name="payment_method" value="gcash" class="accent-sky-500" {{ old('payment_method') === 'gcash' ? 'checked' : '' }}>
                                    <span class="text-white font-semibold">GCash</span>
                                </div>
                                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6f/GCash_logo.svg" class="h-6">
                            </label>

                            {{-- CARD --}}
                            <label class="flex items-center justify-between bg-neutral-800 p-5 rounded-xl cursor-pointer hover:bg-neutral-700 transition">
                                <div class="flex items-center gap-4">
                                    <input type="radio" name="payment_method" value="card" class="accent-sky-500" {{ old('payment_method') === 'card' ? 'checked' : '' }}>
                                    <span class="text-white font-semibold">Credit / Debit Card</span>
                                </div>
                                <div class="flex gap-2">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Visa.svg" class="h-6">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/0/0c/Mastercard-logo.png" class="h-6">
                                </div>
                            </label>

                            {{-- CARD DETAILS --}}
                            <div id="card-details" class="hidden mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <input type="text" name="card_number" placeholder="Card Number" class="px-4 py-3 rounded-xl bg-neutral-800 text-white sm:col-span-2">
                                <input type="text" name="card_expiration" placeholder="Expiration (MM/YY)" class="px-4 py-3 rounded-xl bg-neutral-800 text-white">
                                <input type="text" name="card_cvv" placeholder="CVV" class="px-4 py-3 rounded-xl bg-neutral-800 text-white">
                            </div>

                        </div>
                    </div>

                    {{-- PLACE ORDER BUTTON --}}
                    <div class="text-right">
                        <button type="submit" name="submit" class="mt-6 w-full sm:w-auto px-6 py-3 bg-sky-500 hover:bg-sky-400 text-black font-bold rounded-xl transition">
                            Place Order
                        </button>
                    </div>

                </form>

            </div>

            {{-- RIGHT SIDE: ORDER SUMMARY --}}
            <div class="bg-neutral-900 p-8 rounded-2xl border border-neutral-800 h-fit">

                <h2 class="text-2xl font-bold text-white mb-6">Order Summary</h2>

                @php
                    $total = $cart->sum(fn($item) => $item->product->price * $item->quantity);
                @endphp

                <div class="space-y-4">
                    @foreach($cart as $item)
                        <div class="flex justify-between text-gray-300">
                            <span>{{ $item->product->name }} x {{ $item->quantity }}</span>
                            <span>₱{{ number_format($item->product->price * $item->quantity, 2) }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="border-t border-neutral-800 mt-4 pt-4 flex justify-between text-white font-bold text-lg">
                    <span>Total</span>
                    <span>₱{{ number_format($total, 2) }}</span>
                </div>

            </div>

        </div>
    </section>

    <!-- Admin Toast Notification -->
    <div 
        x-data="{ show:false, message:'', timeout:null }"
        x-init="
            @if(session('checkout_success'))
                message = '{{ session('checkout_success') }}';
                show = true;
                timeout = setTimeout(() => show = false, 2000);
            @endif
        "
        class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-[9999]"
    >
        <div 
            x-show="show"
            x-transition.duration.250ms
            class="bg-green-600 border border-green-400 py-5 px-8 rounded-2xl shadow-lg flex items-center gap-3 text-white text-lg font-bold"
        >
            <span class="text-3xl">✔️</span>
            <p x-text="message"></p>
        </div>
    </div>


    <script>
        // Show card details only if card is selected
        const paymentRadios = document.querySelectorAll('input[name="payment_method"]');
        const cardDetails = document.getElementById('card-details');

        paymentRadios.forEach(radio => {
            radio.addEventListener('change', () => {
                if (radio.value === 'card' && radio.checked) {
                    cardDetails.classList.remove('hidden');
                } else {
                    cardDetails.classList.add('hidden');
                }
            });
        });
    </script>

</x-app-layout>
