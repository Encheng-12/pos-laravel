<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::with('customer')->get();
        return $order;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'cashier_id'=>'required|exists:users,id',
            'customer_id'=>'required|exists:users,id',
            'invoice_no'=>'required|string|max:255',
            'subtotal'=>'required|integer|min:1',
            'tax'=>'required|integer|min:1',
            'discount'=>'required|integer|min:1',
            'status'=>'required|string|max:255'
        ]);
        
        $order = Order::create($validate);
        return $order;


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::with('customer')->findOrFail($id);
        return $order;


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'cashier_id'=>'required|exists:users,id',
            'customer_id'=>'required|exists:users,id',
            'invoice_no'=>'required|string|max:255',
            'subtotal'=>'required|integer|min:1',
            'tax'=>'required|integer|min:1',
            'discount'=>'required|integer|min:1',
            'status'=>'required|string|max:255'
        ]);
        
        $order = Order::findOrFail($validate);
        return $order;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order -> delete();
        return "Data delete successfully!";
    }
}
