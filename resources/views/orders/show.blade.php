@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold mb-4 text-center text-gray-700">Order Details</h1>

    <div class="space-y-4">
        <div>
            <strong>Customer:</strong> {{ $order->customer->name }}
        </div>
        <div>
            <strong>Order Date:</strong> {{ $order->order_date }}
        </div>
        <div>
            <strong>Total Amount:</strong> Rp {{ number_format($order->total_amount, 0, ',', '.') }}
        </div>
        <div>
            <strong>Status:</strong> {{ $order->status }}
        </div>
    </div>

    <div class="mt-6 text-center">
        <a href="{{ route('orders.index') }}" class="px-6 py-3 bg-orange-500 text-white rounded hover:bg-orange-600">
            Back to Orders
        </a>
    </div>
</div>
@endsection
