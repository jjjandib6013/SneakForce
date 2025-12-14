@props(['product', 'name'])

<div class="bg-neutral-900 rounded-2xl p-5 border border-neutral-800 transition
            hover:-translate-y-2 hover:shadow-[0_0_40px_rgba(0,200,255,0.3)]"
     data-aos="zoom-in">

    {{-- IMAGE --}}
    <img src="{{ asset('storage/' . $product->image) }}"
         class="rounded-xl mb-4 w-full">

    {{-- NAME --}}
    <h3 class="text-xl font-semibold text-white">
        {{ $product->name }}
    </h3>

    {{-- DESCRIPTION --}}
    <p class="text-gray-400 text-sm mb-2">
        {{ $product->description }}
    </p>

    {{-- PRICE --}}
    <span class="text-sky-400 font-bold">
        ₱{{ number_format($product->price, 2) }}
    </span>

    {{-- ADD TO CART --}}
    <form x-data @submit.prevent="
        fetch('{{ route('cart.add', $product->id) }}', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify({
                name: '{{ $product->name }}',
                price: {{ $product->price }},
                image: '{{ $product->image }}',
                quantity: 1
            })
        })
        .then(res => res.json())
        .then(data => {
            window.dispatchEvent(new CustomEvent('cart-updated', { detail: { count: data.cartCount } }))

            window.dispatchEvent(new CustomEvent('toast', { 
                detail: { message: 'Product added to cart!' }
            }))
        })
    ">
        <!-- Add the dynamic 'name' attribute here -->
        <button type="submit"
            name="{{ $name }}"
            class="w-full px-4 py-2 bg-sky-500 text-black font-bold rounded-xl hover:bg-sky-400 transition">
            Add to Cart
        </button>
    </form>

</div>
