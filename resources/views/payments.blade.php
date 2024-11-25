@extends('layouts.app')

@section('content')
<body class="bg-gray-100">

<section class="bg-orange-100 py-16">
    <div class="container mx-auto max-w-lg bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold text-orange-600 text-center mb-6">Pembayaran</h2>
        
        <!-- Informasi Ringkasan Pembelian -->
        <div class="bg-gray-50 p-4 rounded-lg mb-6">
            <h3 class="text-lg font-semibold text-gray-800">Ringkasan Pembelian</h3>
            <p class="text-gray-600 mt-2">Nama Produk: Kue Coklat</p>
            <p class="text-gray-600">Jumlah: 2</p>
            <p class="text-gray-600">Total Harga: <span class="font-bold text-orange-600">Rp 100.000</span></p>
        </div>

        <!-- Form Pembayaran -->
        <form action="/process-payments" method="POST" class="space-y-4">
            @csrf

            <!-- Nama Lengkap -->
            <div>
                <label for="full_name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" id="full_name" name="full_name" required class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Nama lengkap Anda">
            </div>

            <!-- Alamat Pengiriman -->
            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Alamat Pengiriman</label>
                <textarea id="address" name="address" rows="3" required class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Alamat lengkap pengiriman"></textarea>
            </div>

            <!-- Metode Pembayaran -->
            <div>
                <label for="payments_method" class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                <select id="payments_method" name="payments_method" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                    <option value="bank_transfer">Transfer Bank</option>
                    <option value="credit_card">Kartu Kredit</option>
                    <option value="e_wallet">E-Wallet</option>
                </select>
            </div>

            <!-- Nomor Kartu Kredit (Opsional) -->
            <div id="credit_card_section" class="hidden">
                <label for="card_number" class="block text-sm font-medium text-gray-700">Nomor Kartu Kredit</label>
                <input type="text" id="card_number" name="card_number" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Masukkan nomor kartu kredit Anda">
            </div>

            <!-- Tombol Bayar -->
            <button type="submit" class="w-full py-3 bg-orange-500 text-white font-bold rounded-md hover:bg-orange-600 transition">
                Bayar Sekarang
            </button>
        </form>
    </div>
</section>

<script>
// JavaScript untuk menampilkan/menghilangkan input nomor kartu kredit
document.getElementById('payments_method').addEventListener('change', function () {
    const creditCardSection = document.getElementById('credit_card_section');
    if (this.value === 'credit_card') {
        creditCardSection.classList.remove('hidden');
    } else {
        creditCardSection.classList.add('hidden');
    }
});
</script>

@endsection
