<x-app-layout>
    <!-- HERO -->
    <section class="h-60 flex items-center px-10 bg-gradient-to-b from-neutral-900 to-black">
        <div>
            <h1 class="text-5xl font-bold text-white">My <span class="text-sky-400">Orders</span></h1>
            <p class="text-gray-400 mt-2 text-lg">Track all your completed and pending orders.</p>
        </div>
    </section>

    <!-- BODY -->
    <section class="py-20 px-10 bg-black">
        @if(count($orders) > 0)
            <div class="space-y-4">
                @foreach($orders as $order)
                    <a href="{{ route('orders.show', $order->id) }}"
                       class="block border border-neutral-800 hover:border-sky-400 transition p-6 rounded-xl bg-neutral-900">
                       
                        <div class="flex justify-between items-center mb-2">
                            <h2 class="text-xl font-semibold text-white">
                                Order #{{ $order->id }}
                            </h2>

                            <span class="px-3 py-1 text-sm rounded-full
                                @if($order->status === 'pending') bg-yellow-500/20 text-yellow-400
                                @elseif($order->status === 'shipped') bg-blue-500/20 text-blue-400
                                @elseif($order->status === 'delivered') bg-green-500/20 text-green-400
                                @else bg-gray-500/20 text-gray-300
                                @endif">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>

                        <p class="text-gray-400 text-sm">
                            {{ $order->created_at->format('F d, Y - h:i A') }}
                        </p>

                        <p class="text-sky-400 font-bold text-lg mt-3">
                            ₱{{ number_format($order->total, 2) }}
                        </p>
                    </a>
                @endforeach
            </div>
        @else
            <p class="text-gray-400 text-center text-lg mt-20">You don’t have any orders yet.</p>
        @endif
    </section>
</x-app-layout>
