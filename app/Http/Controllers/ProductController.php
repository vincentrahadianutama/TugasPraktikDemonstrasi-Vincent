<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
        
    }

    public function index1()
{
    $products = Product::all(); // Pastikan model Product sudah diimport dan digunakan
    return view('home', compact('products'));
}


    public function create()
    {
        $categories = ProductCategory::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_category_id' => 'required',
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'stok_quantity' => 'required|integer',
            'image1_url' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'image2_url' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'image3_url' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'image4_url' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'image5_url' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $product = new Product($request->except('image1_url', 'image2_url', 'image3_url', 'image4_url', 'image5_url'));

        // Upload gambar jika ada
        foreach (['image1_url', 'image2_url', 'image3_url', 'image4_url', 'image5_url'] as $image) {
            if ($request->hasFile($image)) {
                $product[$image] = $request->file($image)->store('product_images', 'public');
            }
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_category_id' => 'required',
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'stok_quantity' => 'required|integer',
            'image1_url' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'image2_url' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'image3_url' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'image4_url' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'image5_url' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $product->update($request->except('image1_url', 'image2_url', 'image3_url', 'image4_url', 'image5_url'));

        // Upload gambar jika ada
        foreach (['image1_url', 'image2_url', 'image3_url', 'image4_url', 'image5_url'] as $image) {
            if ($request->hasFile($image)) {
                if ($product[$image]) {
                    Storage::disk('public')->delete($product[$image]);
                }
                $product[$image] = $request->file($image)->store('product_images', 'public');
            }
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function checkout($id)
    {
        $product = Product::findOrFail($id);

        return view('products.checkout', compact('product'));
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Category deleted successfully.');
        return redirect()->route('home')->with('success', 'Category deleted successfully.');

    }



}
