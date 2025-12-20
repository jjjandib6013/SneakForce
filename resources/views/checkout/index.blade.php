<x-app-layout>
<section class="min-h-screen bg-neutral-950 py-14 px-6">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-4xl font-bold text-white mb-10">Checkout</h1>

        <form action="{{ route('checkout.store') }}" method="POST" class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            @csrf

            {{-- LEFT --}}
            <div class="lg:col-span-2 space-y-10">

                {{-- CONTACT --}}
                <div class="bg-neutral-900 p-8 rounded-3xl border border-neutral-800">
                    <h2 class="text-xl font-semibold text-white mb-6">Contact Info</h2>
                    <div class="grid sm:grid-cols-2 gap-5">
                        <input name="full_name" placeholder="Full Name"
                            value="{{ old('full_name', $prefill->user_name ?? auth()->user()->name) }}"
                            class="checkout-input text-black">

                        <input name="email" type="email" placeholder="Email"
                            value="{{ old('email', $prefill->user_email ?? auth()->user()->email) }}"
                            class="checkout-input text-black">

                        <input name="phone" placeholder="Phone Number"
                            value="{{ old('phone', $prefill->phone ?? auth()->user()->phone) }}"
                            class="checkout-input sm:col-span-2 text-black">
                    </div>
                </div>

                {{-- SHIPPING --}}
                <div class="bg-neutral-900 p-8 rounded-3xl border border-neutral-800">
                    <h2 class="text-xl font-semibold text-white mb-6">Shipping Address</h2>
                    <div class="grid sm:grid-cols-2 gap-5">
                        <input name="address" placeholder="Street Address"
                            value="{{ old('address', $prefill->address ?? auth()->user()->address) }}"
                            class="checkout-input sm:col-span-2 text-black">

                        <input name="city" placeholder="City"
                            value="{{ old('city', $prefill->city ?? auth()->user()->city) }}"
                            class="checkout-input text-black">

                        <input name="province" placeholder="Province"
                            value="{{ old('province', $prefill->province ?? auth()->user()->province) }}"
                            class="checkout-input text-black">

                        <input name="postal_code" placeholder="Postal Code"
                            value="{{ old('postal_code', $prefill->postal_code ?? auth()->user()->postal_code) }}"
                            class="checkout-input text-black">

                        <input type="hidden" name="country" value="Philippines">
                    </div>
                </div>

                {{-- PAYMENT --}}
                <div class="bg-neutral-900 p-8 rounded-3xl border border-neutral-800">
                    <h2 class="text-xl font-semibold text-white mb-6">Payment Method</h2>

                    <div class="grid sm:grid-cols-3 gap-5">
                        <button type="button" data-method="cod" class="pay-btn h-12 rounded-lg">💵 Cash on Delivery</button>
                        <button type="button" data-method="gcash" class="pay-btn h-12 rounded-lg">📱 GCash</button>
                        <button type="button" data-method="card" class="pay-btn h-12 rounded-lg">💳 Card</button>
                    </div>

                    <input type="hidden" name="payment_method" id="payment_method">

                    {{-- CARD DETAILS --}}
                    <div id="cardFields" class="hidden mt-6 grid sm:grid-cols-2 gap-4 opacity-0 transform translate-y-4 transition-all duration-300">
                        <input name="card_number" placeholder="Card Number" class="checkout-input sm:col-span-2 text-black">
                        <input name="card_expiration" placeholder="MM / YY" class="checkout-input text-black">
                        <input name="card_cvv" placeholder="CVV" class="checkout-input text-black">
                    </div>
                </div>

                <button type="submit" name="submit" class="w-full py-4 rounded-2xl bg-sky-500 text-black font-bold text-lg hover:bg-sky-400 transition shadow-lg">Place Order</button>
            </div>

            {{-- RIGHT SUMMARY --}}
            <div class="bg-neutral-900 p-8 rounded-3xl border border-neutral-800 h-fit sticky top-10">
                <h2 class="text-xl font-semibold text-white mb-6">Order Summary</h2>
                @php $total = $cart->sum(fn($i)=>$i->product->price*$i->quantity); @endphp
                <div class="space-y-3 text-gray-300">
                    @foreach($cart as $item)
                        <div class="flex justify-between">
                            <span>{{ $item->product->name }} × {{ $item->quantity }}</span>
                            <span>₱{{ number_format($item->product->price * $item->quantity, 2) }}</span>
                        </div>
                    @endforeach
                </div>
                <div class="border-t border-neutral-800 mt-5 pt-4 flex justify-between text-white font-bold text-lg">
                    <span>Total</span>
                    <span>₱{{ number_format($total, 2) }}</span>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
const buttons = document.querySelectorAll('.pay-btn');
const methodInput = document.getElementById('payment_method');
const cardFields = document.getElementById('cardFields');

buttons.forEach(btn => {
    btn.addEventListener('click', () => {
        // reset all buttons
        buttons.forEach(b => {
            b.classList.remove('border-sky-500','ring-2','ring-sky-500','scale-105','bg-gradient-to-r','from-sky-500','to-blue-400','animate-pulse');
            b.classList.add('border-neutral-700','bg-neutral-900');
        });

        // activate clicked
        btn.classList.remove('border-neutral-700','bg-neutral-900');
        btn.classList.add('border-sky-500','ring-2','ring-sky-500','scale-105','bg-gradient-to-r','from-sky-500','to-blue-400','animate-pulse');

        // set value
        methodInput.value = btn.dataset.method;

        // toggle card fields
        if(btn.dataset.method==='card'){
            cardFields.classList.remove('hidden');
            setTimeout(() => {
                cardFields.classList.remove('opacity-0','translate-y-4');
                cardFields.classList.add('opacity-100','translate-y-0');
            },50);
        } else {
            cardFields.classList.add('opacity-0','translate-y-4');
            setTimeout(()=>cardFields.classList.add('hidden'),200);
        }
    });
});

// Validate payment method before submit
document.getElementById('checkoutForm').addEventListener('submit', function(e){
    if(!methodInput.value){
        e.preventDefault();
        alert('Please select a payment method!');
    }

        const paymentMethod = "{{ old('payment_method', $prefill->payment_method ?? '') }}";
    if(paymentMethod){
        const btn = document.querySelector(`.pay-btn[data-method="${paymentMethod}"]`);
        if(btn){ btn.click(); } // pre-select the payment method
    }   
});
</script>

<style>
.pay-btn{
    @apply w-full py-8 rounded-3xl text-white font-semibold bg-neutral-900 border border-neutral-700 transition-all duration-200 transform;
}
.checkout-input{
    @apply px-4 py-3 rounded-xl bg-neutral-800 text-white border border-neutral-700 focus:ring-2 focus:ring-sky-500 focus:outline-none transition;
}
</style>
</x-app-layout>
