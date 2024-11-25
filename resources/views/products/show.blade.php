@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-6 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Product Details</h2>

    <div class="mb-4">
        <strong>Name:</strong>
        <p>{{ $product->product_name }}</p>
    </div>

    <div class="mb-4">
        <strong>Category:</strong>
        <p>{{ $product->category->category_name }}</p>
    </div>

    <div class="mb-4">
        <strong>Description:</strong>
        <p>{{ $product->description }}</p>
    </div>

    <div class="mb-4">
        <strong>Price:</strong>
        <p>Rp {{ number_format($product->price, 0, ',', '.') }}</p>
    </div>

    <div class="mb-4">
        <strong>Stock Quantity:</strong>
        <p>{{ $product->stok_quantity }}</p>
    </div>

    <div class="mb-4">
        <strong>Images:</strong>
        <div class="grid grid-cols-3 gap-4">
            @foreach (['image1_url', 'image2_url', 'image3_url', 'image4_url', 'image5_url'] as $imageField)
                @if ($product->$imageField)
                    <img src="{{ asset('storage/' . $product->$imageField) }}" alt="Product Image" class="w-32 h-32 object-cover rounded">
                @endif
            @endforeach
        </div>
    </div>

    <!-- Tombol Tambahkan ke Keranjang -->
    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mb-4">
        @csrf
        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Add to Cart</button>
    </form>

    <a href="{{ route('products.index') }}" class="px-4 py-2 bg-orange-500 text-white rounded">Back to Products</a>
</div>
@endsection
