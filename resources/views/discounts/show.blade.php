@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-semibold text-gray-900">Discount Details</h2>

    <div class="mt-6">
        <div class="mb-4">
            <span class="font-medium text-gray-700">Category:</span> {{ $discount->category->name }}
        </div>
        <div class="mb-4">
            <span class="font-medium text-gray-700">Product:</span> {{ $discount->product->product_name }}
        </div>
        <div class="mb-4">
            <span class="font-medium text-gray-700">Start Date:</span> {{ $discount->start_date }}
        </div>
        <div class="mb-4">
            <span class="font-medium text-gray-700">End Date:</span> {{ $discount->end_date }}
        </div>
        <div class="mb-4">
            <span class="font-medium text-gray-700">Percentage:</span> {{ $discount->percentage }}%
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('discounts.edit', $discount) }}" class="px-4 py-2 bg-yellow-500 text-white rounded">Edit</a>
        <a href="{{ route('discounts.index') }}" class="ml-4 text-gray-500">Back to List</a>
    </div>
</div>
@endsection
