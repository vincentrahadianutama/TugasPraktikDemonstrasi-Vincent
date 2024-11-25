@extends('layouts.app')

@section('content')

    <!-- Hero Section -->
    <section class="bg-orange-100 py-16">
        <div class="container mx-auto text-center px-4">
            <h2 class="text-4xl font-bold text-orange-600">Selamat Datang di Toko Kue Kami!</h2>
            <p class="mt-4 text-lg text-gray-700">Rasakan kue terbaik dengan cita rasa yang tak terlupakan.</p>
            <button onclick="scrollToProducts()" class="mt-6 bg-orange-500 text-white py-2 px-4 rounded hover:bg-orange-600 transition">
                Lihat Produk
            </button>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-16 bg-white">
        <div class="container mx-auto text-center px-4">
            <h2 class="text-3xl font-bold text-gray-800">Produk Kami</h2>

            @if($products->isEmpty())
                <p class="mt-6 text-gray-500">Belum ada produk yang tersedia saat ini.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
                    @foreach ($products as $product)
                        <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                            <!-- Gambar Produk -->
                            @if($product->image1_url)
                                <img src="{{ asset('storage/' . $product->image1_url) }}" alt="{{ $product->product_name }}" class="w-full h-48 object-cover rounded">
                            @else
                                <img src="https://via.placeholder.com/300x200?text=No+Image" alt="No Image" class="w-full h-48 object-cover rounded">
                            @endif

                            <!-- Nama Produk -->
                            <h3 class="mt-4 text-xl font-semibold text-gray-800">{{ $product->product_name }}</h3>
                            <!-- Harga Produk -->
                            <p class="text-orange-500 font-bold text-lg">Rp {{ number_format($product->price ?? 0, 0, ',', '.') }}</p>
                            <!-- Tombol -->
                            <a href="{{ route('products.show', $product) }}" class="mt-4 bg-orange-500 text-white py-2 px-4 rounded hover:bg-orange-600 transition">
                                Tambah ke Keranjang
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <script>
        function scrollToProducts() {
            const productsSection = document.getElementById('products');
            if (productsSection) {
                productsSection.scrollIntoView({ behavior: 'smooth' });
            }
        }
    </script>

@endsection
