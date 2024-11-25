<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gâteau mémoire')</title>
    @vite('resources/css/app.css')
    <style>
        /* Pastikan body mengambil tinggi penuh */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1; /* Isi sisa ruang antara header dan footer */
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100">

    <!-- Header -->
    <header class="bg-orange-500 text-white py-4">
        <div class="container mx-auto flex justify-between items-center px-4 max-w-screen-xl">
            <h1 class="text-2xl font-bold">Gâteau mémoire</h1>
            <!-- Hamburger Menu for Mobile -->
            <button id="menu-toggle" class="text-white md:hidden focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
            <!-- Navigation -->
            <nav id="menu" class="hidden md:block">
                <ul class="flex flex-col md:flex-row md:space-x-4">
                    <li><a href="/" class="block md:inline hover:underline">Home</a></li>
                    <li><a href="/about" class="block md:inline hover:underline">About</a></li>
                    <li><a href="/products" class="block md:inline hover:underline">Products</a></li>
                    <li><a href="/discounts" class="block md:inline hover:underline">Discounts</a></li>
                    <li><a href="/customers" class="block md:inline hover:underline">Customer</a></li>
                    <li><a href="/orders" class="block md:inline hover:underline">Order</a></li>
                    <li><a href="/payments" class="block md:inline hover:underline">Payment</a></li>
                    <li><a href="/product_reviews" class="block md:inline hover:underline">Reviews</a></li>
                    <li><a href="/wishlists" class="block md:inline hover:underline">Favorite</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto p-4 max-w-screen-xl">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center px-4 max-w-screen-xl">
            <p>&copy; 2024 Created by <u><a href="https://www.instagram.com/vncnt_ru/" class="hover:text-orange-400">Vincent Rahadian Utama.</a></u></p>
        </div>
    </footer>

    <script>
        // Hamburger Menu Toggle
        const menuToggle = document.getElementById('menu-toggle');
        const menu = document.getElementById('menu');

        menuToggle.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
