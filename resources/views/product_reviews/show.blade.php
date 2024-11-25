@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-2xl font-bold mb-4">Product Review Details</h1>
    <div class="mb-4">
        <h2 class="text-lg font-semibold text-gray-700">Customer:</h2>
        <p class="text-gray-900">{{ $productReview->customer->name }}</p>
    </div>
    <div class="mb-4">
        <h2 class="text-lg font-semibold text-gray-700">Product:</h2>
        <p class="text-gray-900">{{ $productReview->product->product_name }}</p>
    </div>
    <div class="mb-4">
        <h2 class="text-lg font-semibold text-gray-700">Rating:</h2>
        <p class="text-gray-900">{{ $productReview->rating }}</p>
    </div>
    <div class="mb-4">
        <h2 class="text-lg font-semibold text-gray-700">Comment:</h2>
        <p class="text-gray-900">{{ $productReview->comment }}</p>
    </div>
    <a href="{{ route('product_reviews.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back</a>
</div>
@endsection
