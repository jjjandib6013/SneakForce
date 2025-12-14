<x-app-layout>
    <div class="max-w-3xl mx-auto p-6 text-white">

        <h1 class="text-3xl font-bold mb-6">Edit Product</h1>

        <form action="{{ route('admin.products.update', $product->id) }}"
            method="POST" enctype="multipart/form-data" class="space-y-6">

            @csrf @method('PUT')

            @include('admin.products.form')

            <button class="px-5 py-3 bg-sky-500 font-semibold rounded-xl">Update</button>
        </form>

    </div>
</x-app-layout>
