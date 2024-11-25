<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\DiscountCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::with(['category', 'product'])->get();
        return view('discounts.index', compact('discounts'));
    }

    public function create()
    {
        $categories = DiscountCategory::all();
        $products = Product::all();
        return view('discounts.create', compact('categories', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_discount_id' => 'required|exists:discount_categories,id',
            'product_id' => 'required|exists:products,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'percentage' => 'required|integer|min:1|max:100',
        ]);

        Discount::create($request->all());
        return redirect()->route('discounts.index')->with('success', 'Discount created successfully.');
    }

    public function show(Discount $discount)
    {
        return view('discounts.show', compact('discount'));
    }

    public function edit(Discount $discount)
    {
        $categories = DiscountCategory::all();
        $products = Product::all();
        return view('discounts.edit', compact('discount', 'categories', 'products'));
    }

    public function update(Request $request, Discount $discount)
    {
        $request->validate([
            'category_discount_id' => 'required|exists:discount_categories,id',
            'product_id' => 'required|exists:products,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'percentage' => 'required|integer|min:1|max:100',
        ]);

        $discount->update($request->all());
        return redirect()->route('discounts.index')->with('success', 'Discount updated successfully.');
    }

    public function destroy(Discount $discount)
    {
        $discount->delete();
        return redirect()->route('discounts.index')->with('success', 'Discount deleted successfully.');
    }
}

