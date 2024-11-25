<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Menampilkan semua orders
    public function index()
    {
        $orders = Order::with('customer')->get();
        return view('orders.index', compact('orders'));
    }

    // Form untuk membuat order baru
    public function create()
    {
        $customers = Customer::all();
        return view('orders.create', compact('customers'));
    }

    // Simpan order baru ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'status' => 'required|string',
        ]);

        Order::create($validated);
        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    // Menampilkan detail dari satu order
    public function show(Order $order)
    {
        $order->load('customer'); // Pastikan data customer termuat
        return view('orders.show', compact('order'));
    }

    // Form untuk mengedit order
    public function edit(Order $order)
    {
        $customers = Customer::all();
        return view('orders.edit', compact('order', 'customers'));
    }

    // Update data order ke database
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'status' => 'required|string',
        ]);

        $order->update($validated);
        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    // Menghapus order dari database
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
