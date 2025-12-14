<x-app-layout>
    <div class="p-6 text-white">

        <div class="flex justify-between mb-6">
            <form class="flex gap-2" method="GET">
                <input type="text" name="search" placeholder="Search..."
                    class="px-3 py-2 rounded-md bg-neutral-800 text-gray-300"
                    value="{{ request('search') }}" />

                <select name="category"
                        class="px-3 py-2 rounded-md bg-neutral-800 text-gray-300"
                        onchange="this.form.submit()">
                    <option value="">All Categories</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" 
                            {{ request('category') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>

                <button class="px-4 py-2 bg-sky-500 rounded-md">
                    Search
                </button>
            </form>

            <a href="{{ route('admin.products.create') }}"
               class="px-4 py-2 bg-sky-500 rounded-md font-semibold">
                + New Product
            </a>
        </div>

        {{-- TABLE --}}
        <table class="w-full text-left">
            <thead>
                <tr class="border-b border-neutral-800 uppercase text-gray-500 text-sm">
                    <th class="p-3">Image</th>
                    <th class="p-3">Name</th>
                    <th class="p-3">Category</th>
                    <th class="p-3">Price</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $product)
                    <tr class="border-b border-neutral-800">
                        <td class="p-3">
                            @if($product->image)
                                <img src="{{ asset('storage/'.$product->image) }}" class="w-16 h-16 object-cover rounded-lg">
                            @else
                                <span class="text-gray-500">No image</span>
                            @endif
                        </td>
                        <td class="p-3">{{ $product->name }}</td>
                        <td class="p-3">
                            @if ($product->categories->count())
                                {{ $product->categories->pluck('name')->join(', ') }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td class="p-3">₱{{ number_format($product->price,2) }}</td>
                        <td class="p-3">
                            <a href="{{ route('admin.products.edit', $product->id) }}" 
                               class="text-sky-400 mr-4">Edit</a>

                            <form action="{{ route('admin.products.destroy', $product->id) }}" 
                                  method="POST"
                                  class="inline"
                                  onsubmit="return confirm('Delete product?')">
                                @csrf @method('DELETE')
                                <button class="text-red-500">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <div class="mt-8">
            {{ $products->links() }}
        </div>
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

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        @if(session('success'))
            window.dispatchEvent(new CustomEvent('admin-toast', {
                detail: { message: "{{ session('success') }}" }
            }));
        @endif
    });
</script>
</x-app-layout>
