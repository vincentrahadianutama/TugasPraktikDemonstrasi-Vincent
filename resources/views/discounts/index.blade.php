@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-semibold text-gray-900">Discounts</h2><br>
    <a href="{{ route('discounts.create') }}" class="px-4 py-2 bg-orange-500 text-white rounded">Add Discount</a>

    @if(session('success'))
        <div class="mt-4 text-green-500">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-6 overflow-hidden shadow sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Category</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Product</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Start Date</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">End Date</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Percentage</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($discounts as $discount)
                    <tr>
                        <td class="px-6 py-4 text-sm">{{ $discount->category->category_name }}</td>
                        <td class="px-6 py-4 text-sm">{{ $discount->product->product_name }}</td>
                        <td class="px-6 py-4 text-sm">{{ $discount->start_date }}</td>
                        <td class="px-6 py-4 text-sm">{{ $discount->end_date }}</td>
                        <td class="px-6 py-4 text-sm">{{ $discount->percentage }}%</td>
                        <td class="px-6 py-4">
                    <a href="{{ route('discounts.show', $discount) }}" class="text-blue-500 hover:underline">View</a> |
                    <a href="{{ route('discounts.edit', $discount) }}" class="text-yellow-500 hover:underline">Edit</a> |
                    <form action="{{ route('discounts.destroy', $discount) }}" method="POST" class="inline-block">
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
</div>
@endsection
