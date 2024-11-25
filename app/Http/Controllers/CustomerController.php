<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|min:6',
            'phone' => 'nullable|max:15',
            'address1' => 'nullable',
            'address2' => 'nullable',
            'address3' => 'nullable',
        ]);

        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'address3' => $request->address3,
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer created successfully!');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'password' => 'nullable|min:6',
            'phone' => 'nullable|max:15',
            'address1' => 'nullable',
            'address2' => 'nullable',
            'address3' => 'nullable',
        ]);

        $data = $request->only(['name', 'email', 'phone', 'address1', 'address2', 'address3']);
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $customer->update($data);

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
    }
}
