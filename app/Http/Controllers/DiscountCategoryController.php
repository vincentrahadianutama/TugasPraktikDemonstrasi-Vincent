<?php

namespace App\Http\Controllers;

use App\Models\DiscountCategory;
use Illuminate\Http\Request;

class DiscountCategoryController extends Controller
{
    public function index()
    {
        $categories = DiscountCategory::all();
        return view('discount_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('discount_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        DiscountCategory::create($request->all());
        return redirect()->route('discount_categories.index')->with('success', 'Discount category created successfully.');
    }

    public function show(DiscountCategory $discountCategory)
    {
        return view('discount_categories.show', compact('discountCategory'));
    }

    public function edit(DiscountCategory $discountCategory)
    {
        return view('discount_categories.edit', compact('discountCategory'));
    }

    public function update(Request $request, DiscountCategory $discountCategory)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $discountCategory->update($request->all());
        return redirect()->route('discount_categories.index')->with('success', 'Discount category updated successfully.');
    }

    public function destroy(DiscountCategory $discountCategory)
    {
        $discountCategory->delete();
        return redirect()->route('discount_categories.index')->with('success', 'Discount category deleted successfully.');
    }
}
