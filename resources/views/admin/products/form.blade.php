<div class="space-y-4">

    {{-- NAME --}}
    <label class="block text-sm text-gray-400 mb-2">Name</label>
    <input type="text" name="name"
        placeholder="Product Name"
        class="w-full px-4 py-3 bg-neutral-800 rounded-xl"
        value="{{ old('name', $product->name ?? '') }}">

    {{-- DESCRIPTION --}}
    <label class="block text-sm text-gray-400 mb-2">Description</label>
    <textarea name="description"
        rows="4"
        placeholder="Description"
        class="w-full px-4 py-3 bg-neutral-800 rounded-xl">{{ old('description', $product->description ?? '') }}</textarea>

    {{-- PRICE --}}
    <label class="block text-sm text-gray-400 mb-2">Price</label>
    <input type="number" step="0.01" name="price"
        placeholder="Price"
        class="w-full px-4 py-3 bg-neutral-800 rounded-xl"
        value="{{ old('price', $product->price ?? '') }}">


    {{-- MODERN CATEGORY SELECTOR --}}
    @php
        $selectedCategories = old(
            'category_ids',
            isset($product) ? $product->categories->pluck('id')->toArray() : []
        );
    @endphp

    <div x-data="{ selected: @js($selectedCategories) }">

        <label class="block text-sm text-gray-400 mb-2">Categories</label>

        <div class="flex flex-wrap gap-2">

            @foreach($categories as $cat)
                <button
                    type="button"
                    class="px-4 py-2 rounded-full border 
                        transition
                        cursor-pointer
                        text-sm
                        "
                    :class="selected.includes({{ $cat->id }})
                            ? 'bg-sky-500 text-white border-sky-500'
                            : 'bg-neutral-800 text-gray-300 border-neutral-600'"
                    @click="
                        if (selected.includes({{ $cat->id }})) {
                            selected = selected.filter(id => id !== {{ $cat->id }});
                        } else {
                            selected.push({{ $cat->id }});
                        }
                    "
                >
                    {{ $cat->name }}
                </button>
            @endforeach

        </div>

        {{-- Hidden inputs sent to backend --}}
        <template x-for="id in selected" :key="id">
            <input type="hidden" name="category_ids[]" :value="id">
        </template>

    </div>



    {{-- IMAGE UPLOAD --}}
    <label class="block text-sm text-gray-400 mb-2">Image</label>
    <input type="file" name="image"
        class="w-full px-4 py-3 bg-neutral-800 rounded-xl">

    {{-- SHOW CURRENT IMAGE IF EDITING --}}
    @if(isset($product) && $product->image)
        <img src="{{ asset('storage/'.$product->image) }}"
             class="w-32 rounded-xl mt-3">
    @endif

</div>

<!-- Admin Toast Notification -->
<div 
    x-data="{ show:false, message:'', timeout:null }"
    @admin-toast.window="
        message = $event.detail.message;
        show = true;
        clearTimeout(timeout);
        timeout = setTimeout(() => show = false, 2000);
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
