@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Payments</h1>
        <a href="{{ route('payments.create') }}" class="px-4 py-2 bg-orange-500 text-white rounded shadow hover:bg-orange-600">
            Create Payment
        </a>
    </div>

    <div class="overflow-hidden rounded-lg shadow-md">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Payment Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Payment Method</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($payments as $payment)
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $payment->order_id }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $payment->payment_date }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $payment->payment_method }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $payment->amount }}</td>
                        <td class="px-6 py-4">
                    <a href="{{ route('payments.show', $payment) }}" class="text-blue-500 hover:underline">View</a> |
                    <a href="{{ route('payments.edit', $payment) }}" class="text-yellow-500 hover:underline">Edit</a> |
                    <form action="{{ route('payments.destroy', $payment) }}" method="POST" class="inline-block">
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
