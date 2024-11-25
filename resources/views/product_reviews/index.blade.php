@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-semibold text-gray-900">Product Reviews</h2><br>
    <a href="{{ route('product_reviews.create') }}" class="px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600">Add Review</a>

    @if(session('success'))
        <div class="mt-4 text-green-500">{{ session('success') }}</div>
    @endif

    <div class="mt-6 overflow-hidden shadow sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Customer</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Product</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Rating</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Comment</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $review)
                    <tr class="border-t">
                        <td class="px-6 py-4 text-sm">{{ $review->customer->name ?? 'Unknown Customer' }}</td>
                        <td class="px-6 py-4 text-sm">{{ $review->product->product_name ?? 'Unknown Product' }}</td>
                        <td class="px-6 py-4 text-sm">{{ $review->rating }}</td>
                        <td class="px-6 py-4 text-sm">{{ $review->comment }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('product_reviews.edit', $review) }}" class="text-blue-500 hover:underline">Edit</a> |
                            <form action="{{ route('product_reviews.destroy', $review) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
