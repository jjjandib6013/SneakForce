<div
    x-data="{
        open: false,
        orderId: null
    }"
    x-on:open-cancel-modal.window="
        open = true;
        orderId = $event.detail.id;
    "
    x-show="open"
    x-transition
    x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/70"
>
    <div class="bg-neutral-900 border border-neutral-800 rounded-2xl p-8 w-full max-w-md">

        <!-- HEADER -->
        <h2 class="text-2xl font-bold text-white mb-2">
            Cancel Order
        </h2>
        <p class="text-gray-400 mb-6">
            Please tell us why you’re cancelling this order.
        </p>

        <!-- FORM -->
        <form method="POST" action="{{ route('orders.cancel') }}">
            @csrf

            <!-- ORDER ID -->
            <input type="hidden" name="order_id" :value="orderId">

            <!-- REASON -->
            <label class="block text-gray-400 text-sm mb-2">Reason</label>
            <select
                name="reason"
                required
                class="w-full bg-neutral-800 text-white rounded-xl px-4 py-3 mb-4">
                <option value="">Select a reason</option>
                <option value="Changed my mind">Changed my mind</option>
                <option value="Ordered by mistake">Ordered by mistake</option>
                <option value="Found a better price">Found a better price</option>
                <option value="Delivery is too slow">Delivery is too slow</option>
                <option value="Other">Other</option>
            </select>

            <!-- OPTIONAL NOTE -->
            <label class="block text-gray-400 text-sm mb-2">Additional notes (optional)</label>
            <textarea
                name="note"
                rows="3"
                placeholder="Type here.q.."
                class="w-full bg-neutral-800 text-white rounded-xl px-4 py-3 mb-6"></textarea>

            <!-- ACTIONS -->
            <div class="flex justify-end gap-3">
                <button
                    type="button"
                    @click="open = false"
                    class="px-4 py-2 rounded-xl bg-neutral-700 text-white hover:bg-neutral-600">
                    Keep Order
                </button>

                <button
                    type="submit"
                    class="px-5 py-2 rounded-xl bg-red-500 hover:bg-red-400 text-black font-bold">
                    Confirm Cancel
                </button>
            </div>
        </form>
    </div>
</div>
