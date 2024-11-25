@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-semibold text-gray-900">Customer List</h2><br>
    <a href="{{ route('customers.create') }}" class="px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600">Add Customer</a>

    @if(session('success'))
        <div class="mt-4 text-green-500">{{ session('success') }}</div>
    @endif

    <div class="mt-6 overflow-hidden shadow sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Email</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Phone</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr class="border-t">
                        <td class="px-6 py-4 text-sm">{{ $customer->name }}</td>
                        <td class="px-6 py-4 text-sm">{{ $customer->email }}</td>
                        <td class="px-6 py-4 text-sm">{{ $customer->phone ?? 'N/A' }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('customers.show', $customer) }}" class="text-blue-500 hover:underline">View</a> |
                            <a href="{{ route('customers.edit', $customer) }}" class="text-yellow-500 hover:underline">Edit</a> |
                            <form action="{{ route('customers.destroy', $customer) }}" method="POST" class="inline-block">
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
