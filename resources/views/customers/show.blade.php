@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-semibold mb-6">Customer Details</h1>
    <div class="mb-4">
        <strong>Name:</strong> {{ $customer->name }}
    </div>
    <div class="mb-4">
        <strong>Email:</strong> {{ $customer->email }}
    </div>
    <div class="mb-4">
        <strong>Phone:</strong> {{ $customer->phone ?? 'N/A' }}
    </div>
    <div class="mb-4">
        <strong>Address 1:</strong> {{ $customer->address1 ?? 'N/A' }}
    </div>
    <div class="mb-4">
        <strong>Address 2:</strong> {{ $customer->address2 ?? 'N/A' }}
    </div>
    <div class="mb-4">
        <strong>Address 3:</strong> {{ $customer->address3 ?? 'N/A' }}
    </div>
    <div class="flex justify-end">
        <a href="{{ route('customers.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded">Back</a>
    </div>
</div>
@endsection
