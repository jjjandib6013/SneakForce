<x-app-layout>
    <!-- HERO -->
    <section class="h-60 flex items-center px-10 bg-gradient-to-b from-neutral-900 to-black">
        <div>
            <h1 class="text-5xl font-bold text-white">
                My <span class="text-sky-400">Orders</span>
            </h1>
            <p class="text-gray-400 mt-2 text-lg">
                Track all your completed and pending orders.
            </p>
        </div>
    </section>

    <!-- BODY -->
    <section class="py-20 px-10 bg-black">
        @if($orders->count())
            <div class="space-y-6">
                @foreach($orders as $order)
                    <div class="border border-neutral-800 bg-neutral-900 rounded-2xl p-6 hover:border-sky-400 transition">
                        
                        <!-- TOP -->
                        <div class="flex justify-between items-start">
                            <div>
                                <h2 class="text-xl font-semibold text-white">
                                    Order #{{ $order->id }}
                                </h2>
                                <p class="text-gray-400 text-sm">
                                    {{ $order->created_at->format('F d, Y • h:i A') }}
                                </p>
                            </div>

                            <span class="px-4 py-1 text-sm rounded-full font-semibold
                                @if($order->status === 'pending') bg-yellow-500/20 text-yellow-400
                                @elseif($order->status === 'shipped') bg-blue-500/20 text-blue-400
                                @elseif($order->status === 'delivered') bg-green-500/20 text-green-400
                                @elseif($order->status === 'cancelled') bg-red-500/20 text-red-400
                                @endif">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>

                        <!-- INFO -->
                        <div class="grid sm:grid-cols-3 gap-4 mt-5 text-gray-300 text-sm">
                            <p>
                                <span class="text-gray-500">Items:</span>
                                {{ $order->items->sum('quantity') }}
                            </p>
                            <p>
                                <span class="text-gray-500">Payment:</span>
                                {{ strtoupper($order->payment_method) }}
                            </p>
                            <p class="text-sky-400 font-bold text-lg sm:text-right">
                                ₱{{ number_format($order->total, 2) }}
                            </p>
                        </div>

                        <!-- ACTIONS -->
                        <div class="flex justify-between items-center mt-6">
                            <a href="{{ route('orders.show', $order->id) }}"
                               class="text-sky-400 hover:underline font-semibold">
                                View Details →
                            </a>

                            @if($order->status === 'pending')
                                <button
                                    type="button"
                                    x-data
                                    @click="$dispatch('open-cancel-modal', { id: {{ $order->id }} })"
                                    class="text-red-400 hover:text-red-300 font-semibold">
                                    Cancel Order
                                </button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-400 text-center text-lg mt-20">
                You don’t have any orders yet.
            </p>
        @endif
    </section>

    <!-- CANCEL MODAL -->
    <x-cancel-order-modal />
</x-app-layout>
