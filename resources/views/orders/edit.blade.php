@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold mb-4 text-center text-gray-700">Edit Order</h1>

    <form action="{{ route('orders.update', $order) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="space-y-6">
            <div>
                <label for="customer_id" class="block text-sm font-medium text-gray-700">Customer</label>
                <select name="customer_id" id="customer_id" class="mt-1 p-3 border border-gray-300 rounded-md w-full">
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $customer->id == $order->customer_id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="order_date" class="block text-sm font-medium text-gray-700">Order Date</label>
                <input type="datetime-local" name="order_date" id="order_date" class="mt-1 p-3 border border-gray-300 rounded-md w-full" value="{{ $order->order_date->format('Y-m-d\TH:i') }}" required>
            </div>

            <div>
                <label for="total_amount" class="block text-sm font-medium text-gray-700">Total Amount</label>
                <input type="number" name="total_amount" id="total_amount" class="mt-1 p-3 border border-gray-300 rounded-md w-full" value="{{ $order->total_amount }}" required>
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <input type="text" name="status" id="status" class="mt-1 p-3 border border-gray-300 rounded-md w-full" value="{{ $order->status }}" required>
            </div>

            <div class="text-center">
                <button type="submit" class="px-6 py-3 bg-orange-500 text-white font-bold rounded-md hover:bg-orange-600">
                    Update Order
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
