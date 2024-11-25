@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold text-gray-700 mb-4">Add Favorites</h1>

    <form action="{{ route('wishlists.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="customer_id" class="block text-sm font-medium text-gray-700">Customer</label>
            <select name="customer_id" id="customer_id" class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm">
                @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="product_id" class="block text-sm font-medium text-gray-700">Product</label>
            <select name="product_id" id="product_id" class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm">
                @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Submit</button>
    </form>
</div>
@endsection
