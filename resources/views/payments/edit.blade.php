@extends('layouts.app')

@section('content')
    <h1>Edit Payment</h1>
    <form action="{{ route('payments.update', $payment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="order_id">Order ID</label>
        <select name="order_id" required>
            @foreach ($orders as $order)
                <option value="{{ $order->id }}" {{ $payment->order_id == $order->id ? 'selected' : '' }}>{{ $order->id }}</option>
            @endforeach
        </select><br>

        <label for="payment_date">Payment Date</label>
        <input type="datetime-local" name="payment_date" value="{{ $payment->payment_date->format('Y-m-d\TH:i') }}" required><br>

        <label for="payment_method">Payment Method</label>
        <input type="text" name="payment_method" value="{{ $payment->payment_method }}" required><br>

        <label for="amount">Amount</label>
        <input type="number" name="amount" value="{{ $payment->amount }}" required><br>

        <button type="submit">Update Payment</button>
    </form>
@endsection
