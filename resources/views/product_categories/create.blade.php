@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Add New Category</h1>

    <form action="{{ route('product_categories.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="category_name" class="block text-sm font-medium text-gray-700">Category Name</label>
            <input type="text" id="category_name" name="category_name" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
        </div>
        <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded-md">Save</button>
    </form>
</div>
@endsection
