@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-semibold mb-6">Add Customer</h1>
    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required class="mt-1 block w-full rounded border-gray-300 shadow-sm">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required class="mt-1 block w-full rounded border-gray-300 shadow-sm">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password" required class="mt-1 block w-full rounded border-gray-300 shadow-sm">
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="mt-1 block w-full rounded border-gray-300 shadow-sm">
            @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="address1" class="block text-sm font-medium text-gray-700">Address 1</label>
            <textarea name="address1" id="address1" rows="3" class="mt-1 block w-full rounded border-gray-300 shadow-sm">{{ old('address1') }}</textarea>
        </div>
        <div class="mb-4">
            <label for="address2" class="block text-sm font-medium text-gray-700">Address 2</label>
            <textarea name="address2" id="address2" rows="3" class="mt-1 block w-full rounded border-gray-300 shadow-sm">{{ old('address2') }}</textarea>
        </div>
        <div class="mb-4">
            <label for="address3" class="block text-sm font-medium text-gray-700">Address 3</label>
            <textarea name="address3" id="address3" rows="3" class="mt-1 block w-full rounded border-gray-300 shadow-sm">{{ old('address3') }}</textarea>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('customers.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded mr-2">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded">Save</button>
        </div>
    </form>
</div>
@endsection
