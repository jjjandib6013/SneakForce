<x-app-layout>
    <!-- HERO -->
    <section class="h-60 flex items-center px-10 bg-gradient-to-b from-neutral-900 to-black">
        <div>
            <h1 class="text-5xl font-bold text-white">
                Order <span class="text-sky-400">#{{ $order->id }}</span>
            </h1>
            <p class="text-gray-400 mt-2 text-lg">
                Full breakdown of your order.
            </p>
        </div>
    </section>

    <!-- BODY -->
    <section class="py-20 px-10 bg-black text-white space-y-12">

                        @if($order->status !== 'cancelled')
                <div class="mt-4 p-4 rounded-lg bg-yellow-500/20 border border-yellow-500/20">
                    <p class="text-yellow-400 font-semibold">Order Pending</p>
                </div>
            @endif

                @if($order->status === 'cancelled')
                <div class="mt-4 p-4 rounded-lg bg-red-500/10 border border-red-500/30">
                    <p class="text-red-400 font-semibold">Order Cancelled</p>
                    <p class="text-gray-300 text-sm mt-1">
                        Reason: {{ $order->cancel_reason }}
                    </p>
                </div>
            @endif

        <!-- ORDER META -->
        <div class="grid sm:grid-cols-3 gap-6">
            <div class="bg-neutral-900 border border-neutral-800 p-6 rounded-2xl">
                <p class="text-gray-400 text-sm">Status</p>
                <p class="text-xl font-bold text-sky-400">
                    {{ ucfirst($order->status) }}
                </p>
            </div>

            <div class="bg-neutral-900 border border-neutral-800 p-6 rounded-2xl">
                <p class="text-gray-400 text-sm">Order Date</p>
                <p class="text-lg font-semibold">
                    {{ $order->created_at->format('F d, Y') }}
                </p>
            </div>

            <div class="bg-neutral-900 border border-neutral-800 p-6 rounded-2xl">
                <p class="text-gray-400 text-sm">Payment</p>
                <p class="text-lg font-semibold">
                    {{ strtoupper($order->payment_method) }}
                </p>
            </div>
        </div>

        <!-- SHIPPING -->
        <div class="bg-neutral-900 border border-neutral-800 p-6 rounded-2xl">
            <h2 class="text-2xl font-semibold mb-4">Shipping Information</h2>
            <p class="text-gray-300">{{ $order->phone }}</p>
            <p class="text-gray-300">
                {{ $order->address }}, {{ $order->city }},
                {{ $order->province }} {{ $order->postal_code }}
            </p>
        </div>

        <!-- ITEMS -->
        <div>
            <h2 class="text-2xl font-semibold mb-6">Items</h2>

            <div class="space-y-4">
                @foreach($order->items as $item)
                    <div class="flex justify-between items-center bg-neutral-900 border border-neutral-800 p-6 rounded-2xl">
                        <div>
                            <h3 class="font-semibold text-lg">{{ $item->product->name }}</h3>
                            <p class="text-gray-400 text-sm">
                                Qty: {{ $item->quantity }}
                            </p>
                        </div>

                        <p class="text-sky-400 font-bold text-lg">
                            ₱{{ number_format($item->price * $item->quantity, 2) }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- TOTAL + ACTION -->
        <div class="flex justify-between items-center border-t border-neutral-800 pt-6">
            <p class="text-2xl font-bold text-sky-400">
                Total: ₱{{ number_format($order->total, 2) }}
            </p>

            @if($order->status === 'pending')
                <button
                    @click="$dispatch('open-cancel-modal', { id: {{ $order->id }} })"
                    class="px-6 py-3 rounded-xl bg-red-500 hover:bg-red-400 text-black font-bold">
                    Cancel Order
                </button>
            @endif
        </div>
    </section>
</x-app-layout>
