@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Discount Categories</h1>

    <a href="{{ route('discount_categories.create') }}" class="bg-orange-500 text-white px-4 py-2 rounded-md mb-4 inline-block">Add Category</a>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500">#</th>
                <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500">Category Name</th>
                <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium text-gray-500">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td class="px-6 py-4 border-b border-gray-200">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">{{ $category->category_name }}</td>
                    <td class="px-6 py-4">
                    <a href="{{ route('discount_categories.show', $category) }}" class="text-blue-500 hover:underline">View</a> |
                    <a href="{{ route('discount_categories.edit', $category) }}" class="text-yellow-500 hover:underline">Edit</a> |
                    <form action="{{ route('discount_categories.destroy', $category) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                    </form>
                </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
