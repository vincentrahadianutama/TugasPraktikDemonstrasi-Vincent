@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold mb-4 text-center text-orange-500">Payment</h1>

    <form action="{{ route('payments.store') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label for="order_id" class="block text-sm font-medium text-gray-700">Order ID</label>
            <select name="order_id" id="order_id" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                @foreach ($orders as $order)
                    <option value="{{ $order->id }}">{{ $order->id }}</option>
                @endforeach
            </select>
            @error('order_id')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div>
            <label for="payment_date" class="block text-sm font-medium text-gray-700">Payment Date</label>
            <input type="datetime-local" name="payment_date" id="payment_date" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
            @error('payment_date')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div>
            <label for="payment_method" class="block text-sm font-medium text-gray-700">Payment Method</label>
            <input type="text" name="payment_method" id="payment_method" class="mt-1 p-3 border border-gray-300 rounded-md w-full" placeholder="Enter payment method" required>
            @error('payment_method')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div>
            <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
            <input type="number" name="amount" id="amount" class="mt-1 p-3 border border-gray-300 rounded-md w-full" placeholder="Enter payment amount" required>
            @error('amount')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="text-center">
            <button type="submit" class="px-6 py-3 bg-orange-500 text-white font-bold rounded-md hover:bg-orange-600">Save Payment</button>
        </div>
    </form>
</div>
@endsection
