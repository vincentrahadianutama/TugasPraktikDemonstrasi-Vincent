@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-2xl font-bold mb-4">Edit Product Review</h1>
    <form action="{{ route('product_reviews.update', $productReview) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="customer_id" class="block text-gray-700">Customer</label>
            <select name="customer_id" id="customer_id" class="w-full p-2 border rounded">
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $customer->id == $productReview->customer_id ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="product_id" class="block text-gray-700">Product</label>
            <select name="product_id" id="product_id" class="w-full p-2 border rounded">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ $product->id == $productReview->product_id ? 'selected' : '' }}>
                        {{ $product->product_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="rating" class="block text-gray-700">Rating</label>
            <input type="number" name="rating" id="rating" value="{{ $productReview->rating }}" min="1" max="5" class="w-full p-2 border rounded">
        </div>
        <div class="mb-4">
            <label for="comment" class="block text-gray-700">Comment</label>
            <textarea name="comment" id="comment" rows="3" class="w-full p-2 border rounded">{{ $productReview->comment }}</textarea>
        </div>
        <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Update</button>
    </form>
</div>
@endsection
