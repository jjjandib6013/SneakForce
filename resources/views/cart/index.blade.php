<x-app-layout>

    {{-- HERO --}}
    <section class="h-40 sm:h-60 flex items-center px-10 bg-gradient-to-b from-neutral-900 to-black">
        <div data-aos="fade-right">
            <h1 class="text-4xl sm:text-5xl font-bold text-white">Your Cart</h1>
            <p class="text-gray-400 mt-2">Everything you picked out. Looking good so far.</p>
        </div>
    </section>

    {{-- CART CONTENT --}}
    <section class="py-20 px-10 bg-black min-h-screen">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-10">

            {{-- Cart Items --}}
            <div class="lg:col-span-2 space-y-6">

                @if($cart->count() > 0)
                    @foreach($cart as $item)
                        <div class="flex items-center justify-between bg-neutral-900 rounded-2xl p-4 border border-neutral-800 transition hover:shadow-[0_0_20px_rgba(0,200,255,0.2)]">

                            {{-- Product Info --}}
                            <div class="flex items-center gap-4">
                                <img src="{{ asset('storage/' . $item->product->image) ?? 'https://via.placeholder.com/80' }}"
                                     alt="{{ $item->product->name }}"
                                     class="w-20 h-20 object-cover rounded-lg">
                                <div>
                                    <h3 class="text-white font-semibold">{{ $item->product->name }}</h3>
                                    <p class="text-gray-400">₱{{ number_format($item->product->price, 2) }}</p>
                                </div>
                            </div>

                            {{-- Actions --}}
                            <div class="flex items-center gap-2">

                                {{-- Update Quantity --}}
                                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center gap-2">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1"
                                           class="w-16 px-2 py-1 text-black rounded">
                                    <button class="px-2 py-1 bg-gray-300 rounded hover:bg-gray-400 transition text-black">
                                        Update
                                    </button>
                                </form>

                                {{-- Remove --}}
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    <button class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">
                                        Remove
                                    </button>
                                </form>

                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-gray-400 text-center text-lg">Your cart is empty.</p>
                @endif

            </div>

            {{-- Order Summary --}}
            <div class="bg-neutral-900 rounded-2xl p-6 border border-neutral-800 h-fit">
                <h2 class="text-2xl font-bold text-white mb-6">Order Summary</h2>

                @php
                    // Total price
                    $total = $cart->sum(function($item) {
                        return $item->quantity * $item->product->price;
                    });
                @endphp

                {{-- Subtotal lines --}}
                <div class="space-y-3">
                    @foreach($cart as $item)
                        <div class="flex justify-between text-gray-300">
                            <span>{{ $item->product->name }} x {{ $item->quantity }}</span>
                            <span>₱{{ number_format($item->quantity * $item->product->price, 2) }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="border-t border-neutral-800 mt-4 pt-4 flex justify-between text-white font-bold text-lg">
                    <span>Total</span>
                    <span>₱{{ number_format($total, 2) }}</span>
                </div>

                <a href="{{ route('checkout') }}" name="checkout"
                   class="block mt-6 w-full text-center px-6 py-3 bg-sky-500 hover:bg-sky-400 text-black font-bold rounded-xl transition">
                    Proceed to Checkout
                </a>
            </div>

        </div>
    </section>

</x-app-layout>
