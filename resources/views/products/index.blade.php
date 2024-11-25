@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-semibold text-gray-900">Products</h2><br>
    <a href="{{ route('products.create') }}" class="px-4 py-2 bg-orange-500 text-white rounded">Add Product</a>

    @if(session('success'))
        <div class="mt-4 text-green-500">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-6 overflow-hidden shadow sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Product Name</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Category</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Price</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Stock</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Image</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="px-6 py-4 text-sm">{{ $product->product_name }}</td>
                        <td class="px-6 py-4 text-sm">{{ $product->category->category_name }}</td>
                        <td class="px-6 py-4 text-sm">{{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 text-sm">{{ $product->stok_quantity }}</td>
                        <td class="px-6 py-4 text-sm">
                            @if($product->image1_url && file_exists(storage_path('app/public/' . $product->image1_url)))
                                <img src="{{ asset('storage/' . $product->image1_url) }}" alt="Image" class="w-16 h-16 object-cover rounded">
                            @else
                                <img src="https://via.placeholder.com/64?text=No+Image" alt="No Image" class="w-16 h-16 object-cover rounded">
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('products.show', $product) }}" class="text-blue-500 hover:underline">View</a> |
                            <a href="{{ route('products.edit', $product) }}" class="text-yellow-500 hover:underline">Edit</a> |
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
