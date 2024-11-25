@extends('layouts.app')

@section('content')

<section class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Bagian Gambar Produk -->
        <div class="flex justify-center">
            <img src="{{ asset($product->image1_url) }}" alt="Gambar Produk" class="rounded-lg shadow-md w-full h-full object-cover">
        </div>

        <!-- Bagian Deskripsi Produk -->
        <div>
            <h2 class="text-3xl font-bold text-orange-500 mb-4">{{ $product->product_name }}</h2>
            <p class="text-gray-600 mb-4">
                {{ $product->description }}
            </p>
            <p class="text-xl font-semibold text-gray-800 mb-4">Harga: <span class="text-orange-500">Rp {{ number_format($product->price, 0, ',', '.') }}</span></p>
            
            <div class="flex items-center space-x-4 mb-6">
                <label for="quantity" class="text-sm font-medium text-gray-700">Jumlah:</label>
                <input type="number" id="quantity" name="quantity" min="1" max="{{ $product->stok_quantity }}" value="1" class="p-2 border border-gray-300 rounded-md w-20">
            </div>
            
            <button class="w-full md:w-auto px-6 py-3 bg-orange-500 text-white font-bold rounded-md hover:bg-orange-600">
                Tambah ke Keranjang
            </button>
        </div>
    </div>

    <!-- Bagian Informasi Tambahan Produk -->
    <div class="mt-10">
        <h3 class="text-2xl font-semibold mb-4 text-gray-800">Informasi Tambahan</h3>
        <p class="text-gray-600">Produk ini menggunakan bahan-bahan berkualitas tinggi untuk menghasilkan rasa yang lezat dan menggugah selera. Cocok untuk segala acara dan dibuat dengan penuh dedikasi.</p>
    </div>

    <a href="{{ route('checkout', ['id' => $product->id]) }}" class="w-full md:w-auto px-6 py-3 bg-blue-500 text-white font-bold rounded-md hover:bg-blue-600">
    Checkout
</a>

</section>

@endsection
