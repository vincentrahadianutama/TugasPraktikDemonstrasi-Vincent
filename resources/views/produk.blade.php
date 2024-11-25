@extends('layouts.app')

@section('content')
    <main class="container mx-auto my-8 px-4">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">Produk Kami</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Card Produk 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://kioskcokelat.com/cdn/shop/articles/chocolate-cake-2021-09-02-07-16-28-utc.jpg?v=1667546337&width=1600" alt="Kue Coklat" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800">Kue Coklat</h3>
                    <p class="text-orange-500 font-bold">Rp 50.000</p>
                    <button class="mt-4 w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 rounded">
                        Tambah ke Keranjang
                    </button>
                </div>
            </div>

            <!-- Card Produk 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//100/MTA-56560914/mujabakes_muja_bakes_kue_keju_gondrong_cheese_special_cake_full01_ntbmvezu.jpg" alt="Kue Keju" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800">Kue Keju</h3>
                    <p class="text-orange-500 font-bold">Rp 45.000</p>
                    <button class="mt-4 w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 rounded">
                        Tambah ke Keranjang
                    </button>
                </div>
            </div>

            <!-- Card Produk 3 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://clairmontcake.co.id/wp-content/uploads/2022/11/deluxe-red-velvet-nutella-low-e1667879953720.jpg" alt="Kue Tart" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800">Kue Tart</h3>
                    <p class="text-orange-500 font-bold">Rp 80.000</p>
                    <button class="mt-4 w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 rounded">
                        Tambah ke Keranjang
                    </button>
                </div>
            </div>

            <!-- Card Produk 4 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://www.prochiz.com/wp-content/uploads/2021/11/redvelvet-layer-cake-scaled.jpg" alt="Kue Red Velvet" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800">Kue Red Velvet</h3>
                    <p class="text-orange-500 font-bold">Rp 70.000</p>
                    <button class="mt-4 w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 rounded">
                        Tambah ke Keranjang
                    </button>
                </div>
            </div>

        </div>
    </main>

@endsection
