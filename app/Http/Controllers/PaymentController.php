<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        // $payment = Payment::all();
        // return response()->json($payment);
        $search = $request->input('search');
        $sortby = $request->input('sortby');
        $order = $request->input('order');

    $payments = Payment::with('order')
        ->when($search, function ($query, $search) {
            return $query->where('payment_method', 'LIKE', "%{$search}%")
                ->orWhere('reference_no', 'LIKE', "%{$search}%");
        })
        ->orderBy($sortby, $order)
        ->get();

    return $payments;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'payment_method' => 'required|string',
            'amount' => 'required|numeric',
            'reference_no' => 'required|string',
            'paid_at' => 'required|date',
        ]);

        $payment = Payment::create($validated);
        return response()->json($payment, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $payment = Payment::findOrFail($id);
        return response()->json($payment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'payment_method' => 'required|string',
            'amount' => 'required|numeric',
            'reference_no' => 'required|string',
            'paid_at' => 'required|date',
        ]);

        $payment = Payment::findOrFail($id);
        $payment->update($validated);
        return response()->json($payment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return response()->json(null, 204);
    }
}
