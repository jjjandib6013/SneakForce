<x-app-layout>
    <!-- HERO -->
    <section class="h-60 flex items-center px-10 bg-gradient-to-b from-neutral-900 to-black">
        <div>
            <h1 class="text-5xl font-bold text-white">Order <span class="text-sky-400">#{{ $order->id }}</span></h1>
            <p class="text-gray-400 mt-2 text-lg">Full breakdown of your order.</p>
        </div>
    </section>

    <!-- BODY -->
    <section class="py-20 px-10 bg-black text-white">

        <!-- Order Summary -->
        <div class="border border-neutral-800 p-6 rounded-xl bg-neutral-900 mb-10">
            <h2 class="text-2xl font-semibold mb-4">Order Summary</h2>

            <p><span class="text-gray-400">Payment Method:</span> {{ strtoupper($order->payment_method) }}</p>
            <p><span class="text-gray-400">Phone:</span> {{ $order->phone }}</p>
            <p><span class="text-gray-400">Address:</span> {{ $order->address }}, {{ $order->city }}, {{ $order->province }} {{ $order->postal_code }}</p>

            <p class="mt-4 font-bold text-sky-400 text-xl">
                Total: ₱{{ number_format($order->total, 2) }}
            </p>
        </div>

        <!-- Order Items -->
        <h2 class="text-2xl font-semibold mb-6">Items</h2>

        <div class="space-y-4">
            @foreach($order->items as $item)
                <div class="flex items-center border border-neutral-800 p-6 rounded-xl bg-neutral-900">

                    <div class="flex-1">
                        <h3 class="text-lg font-semibold">{{ $item->product->name }}</h3>
                        <p class="text-gray-400 text-sm">Qty: {{ $item->quantity }}</p>
                    </div>

                    <p class="text-sky-400 font-bold text-lg">
                        ₱{{ number_format($item->price * $item->quantity, 2) }}
                    </p>
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
