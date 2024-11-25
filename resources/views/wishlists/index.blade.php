@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-semibold text-gray-900">Favorites</h2><br>
    <a href="{{ route('wishlists.create') }}" class="px-4 py-2 bg-orange-500 text-white rounded">Add Favorites</a>

    @if(session('success'))
        <div class="mt-4 text-green-500">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-6 overflow-hidden shadow sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">ID</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Customer</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Product</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($wishlists as $wishlist)
                <tr>
                    <td class="px-6 py-4 text-sm">{{ $wishlist->id }}</td>
                    <td class="px-6 py-4 text-sm">{{ $wishlist->customer->name }}</td>
                    <td class="px-6 py-4 text-sm">{{ $wishlist->product->product_name }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('wishlists.edit', $wishlist) }}" class="text-yellow-500 hover:underline">Edit</a> |
                        <form action="{{ route('wishlists.destroy', $wishlist) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this wishlist?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
