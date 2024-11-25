<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::with('customer', 'product')->get();
        return view('wishlists.index', compact('wishlists'));
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('wishlists.create', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
        ]);

        Wishlist::create($request->all());
        return redirect()->route('wishlists.index')->with('success', 'Wishlist created successfully.');
    }

    public function edit(Wishlist $wishlist)
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('wishlists.edit', compact('wishlist', 'customers', 'products'));
    }

    public function update(Request $request, Wishlist $wishlist)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
        ]);

        $wishlist->update($request->all());
        return redirect()->route('wishlists.index')->with('success', 'Wishlist updated successfully.');
    }

    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();
        return redirect()->route('wishlists.index')->with('success', 'Wishlist deleted successfully.');
    }
}
