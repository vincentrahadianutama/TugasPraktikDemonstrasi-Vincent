@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Category Details</h1>

    <div class="p-4 border rounded-md shadow">
        <p><strong>Category Name:</strong> {{ $productCategory->category_name }}</p>
    </div>

    <a href="{{ route('product_categories.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md mt-4 inline-block">Back to List</a>
</div>
@endsection
