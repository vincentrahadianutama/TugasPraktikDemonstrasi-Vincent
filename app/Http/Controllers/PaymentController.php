<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Menampilkan daftar pembayaran
    public function index()
    {
        $payments = Payment::all();
        return view('payments.index', compact('payments'));
    }

    // Menampilkan form untuk membuat pembayaran baru
    public function create()
    {
        $orders = Order::all(); // Menampilkan daftar order untuk pilihan
        return view('payments.create', compact('orders'));
    }

    // Menyimpan data pembayaran baru
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'payment_date' => 'required|date',
            'payment_method' => 'required|string',
            'amount' => 'required|integer|min:1',
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.index')->with('success', 'Payment created successfully!');
    }

    // Menampilkan detail pembayaran
    public function show($id)
    {
        $payment = Payment::findOrFail($id);
        return view('payments.show', compact('payment'));
    }

    // Menampilkan form untuk mengedit pembayaran
    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        $orders = Order::all();
        return view('payments.edit', compact('payment', 'orders'));
    }

    // Memperbarui data pembayaran
    public function update(Request $request, $id)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'payment_date' => 'required|date',
            'payment_method' => 'required|string',
            'amount' => 'required|integer|min:1',
        ]);

        $payment = Payment::findOrFail($id);
        $payment->update($request->all());

        return redirect()->route('payments.index')->with('success', 'Payment updated successfully!');
    }

    // Menghapus pembayaran
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully!');
    }
}
