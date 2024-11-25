@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Discount Category Details</h1>

    <div class="p-4 border rounded-md shadow">
        <p><strong>Category Name:</strong> {{ $discountCategory->category_name }}</p>
    </div>

    <a href="{{ route('discount_categories.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md mt-4 inline-block">Back to List</a>
</div>
@endsection
