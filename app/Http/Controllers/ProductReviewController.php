<?php

namespace App\Http\Controllers;

use App\Models\ProductReview;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function index()
    {
        $reviews = ProductReview::with(['customer', 'product'])->has('customer')->has('product')->get();
        return view('product_reviews.index', compact('reviews'));
    }


    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('product_reviews.create', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);

        ProductReview::create($request->all());

        return redirect()->route('product_reviews.index')->with('success', 'Review added successfully!');
    }

    public function edit(ProductReview $productReview)
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('product_reviews.edit', compact('productReview', 'customers', 'products'));
    }

    public function update(Request $request, ProductReview $productReview)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);

        $productReview->update($request->all());

        return redirect()->route('product_reviews.index')->with('success', 'Review updated successfully!');
    }

    public function destroy(ProductReview $productReview)
    {
        $productReview->delete();

        return redirect()->route('product_reviews.index')->with('success', 'Review deleted successfully!');
    }
}
