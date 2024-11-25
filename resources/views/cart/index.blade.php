@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Shopping Cart</h2>

    {{-- Display Success or Error Messages --}}
    @if(session('success'))
        <div class="mb-4 text-green-500">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-4 text-red-500">
            {{ session('error') }}
        </div>
    @endif

    {{-- Check if Cart is Empty --}}
    @if(empty($cart))
        <p>Your cart is empty.</p>
    @else
        {{-- Cart Table --}}
        <table class="min-w-full divide-y divide-gray-200 mb-6">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Product</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Price</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Quantity</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $item)
                    <tr>
                        <td class="px-6 py-4">{{ $item['name'] }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                        <td class="px-6 py-4">{{ $item['quantity'] }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Total Price --}}
        <div class="mb-6">
            <strong>Total: Rp {{ number_format($totalPrice, 0, ',', '.') }}</strong>
        </div>

        {{-- Checkout Form --}}
        <form action="{{ route('cart.checkout') }}" method="POST">
            @csrf
            <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded">Checkout</button>
        </form>
    @endif
</div>
@endsection
