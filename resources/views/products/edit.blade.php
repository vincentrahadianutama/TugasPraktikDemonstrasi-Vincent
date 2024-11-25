@extends('layouts.app')

@section('content')
<button class="px-4 py-2 bg-orange-500 text-white rounded"><a href="/product_categories">Manage Categories</a></button>
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Edit Product</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="product_name" class="block text-sm font-medium text-gray-700">Product Name</label>
            <input type="text" name="product_name" id="product_name" value="{{ old('product_name', $product->product_name) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>

        <div class="mb-4">
            <label for="product_category_id" class="block text-sm font-medium text-gray-700">Category</label>
            <select name="product_category_id" id="product_category_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $product->product_category_id ? 'selected' : '' }} class="text-black">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
            <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>

        <div class="mb-4">
            <label for="stok_quantity" class="block text-sm font-medium text-gray-700">Stock Quantity</label>
            <input type="number" name="stok_quantity" id="stok_quantity" value="{{ old('stok_quantity', $product->stok_quantity) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>

        @for ($i = 1; $i <= 5; $i++)
            <div class="mb-4">
                <label for="image{{ $i }}_url" class="block text-sm font-medium text-gray-700">Image {{ $i }}</label>
                <input type="file" name="image{{ $i }}_url" id="image{{ $i }}_url" class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                @if ($product->{'image'.$i.'_url'})
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $product->{'image'.$i.'_url'}) }}" alt="Image {{ $i }}" class="h-20">
                    </div>
                @endif
            </div>
        @endfor

        <div class="mb-4">
            <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded">Update Product</button>
        </div>
    </form>
</div>
@endsection
