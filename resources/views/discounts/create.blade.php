@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-semibold text-gray-900">Add New Discount</h2>

    <form action="{{ route('discounts.store') }}" method="POST" class="mt-6">
        @csrf
        <div class="mb-4">
            <label for="category_discount_id" class="block text-sm font-medium text-gray-700">Category</label>
            <select name="category_discount_id" id="category_discount_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" class="text-black">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="product_id" class="block text-sm font-medium text-gray-700">Product</label>
            <select name="product_id" id="product_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" required>
                <option value="">Select Product</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
            <input type="datetime-local" name="start_date" id="start_date" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" required>
        </div>

        <div class="mb-4">
            <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
            <input type="datetime-local" name="end_date" id="end_date" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" required>
        </div>

        <div class="mb-4">
            <label for="percentage" class="block text-sm font-medium text-gray-700">Percentage (%)</label>
            <input type="number" name="percentage" id="percentage" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" min="1" max="100" required>
        </div>

        <div class="mt-6">
            <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded">Save Discount</button>
            <a href="{{ route('discounts.index') }}" class="ml-4 text-gray-500">Cancel</a>
        </div>
    </form>
</div>
@endsection
