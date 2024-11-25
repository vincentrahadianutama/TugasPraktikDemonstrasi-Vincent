<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua produk
        $products = Product::all();

        // Kirim data ke view
        return view('home', compact('products'));
    }
}

