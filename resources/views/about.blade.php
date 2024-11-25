@extends('layouts.app')

@section('content')

    <section class="bg-white py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center text-orange-500 mb-4">Tentang Kami</h2>
            <p class="text-center text-gray-600 mb-12">
                Selamat datang di Gâteau mémoire, tempat dimana cita rasa dan kualitas bertemu dalam setiap gigitan!
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Kolom Kiri -->
                <div>
                    <h3 class="text-2xl font-semibold text-orange-500 mb-4">Siapa Kami</h3>
                    <p class="text-gray-700 mb-6">
                        Kami adalah toko kue yang berdedikasi untuk menyediakan kue-kue berkualitas tinggi dengan cita rasa yang autentik. Dengan tim yang terdiri dari ahli kue berpengalaman, kami selalu berusaha memberikan yang terbaik kepada pelanggan kami.
                    </p>
                    <h3 class="text-2xl font-semibold text-orange-500 mb-4">Misi Kami</h3>
                    <p class="text-gray-700 mb-6">
                        Misi kami adalah menghadirkan kebahagiaan dalam setiap gigitan melalui produk yang kami sajikan, serta menjadi pilihan utama bagi pecinta kue di mana saja.
                    </p>
                </div>

                <!-- Kolom Kanan -->
                <div class="flex justify-center">
                    <img src="https://lumiere-a.akamaihd.net/v1/images/open-uri20150422-20810-f3qxzs_4923c203.jpeg?region=0%2C0%2C600%2C600" alt="Tentang Kami" class="rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </section>

@endsection