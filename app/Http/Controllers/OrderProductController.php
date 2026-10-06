<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order_Product;
use App\Models\Order;

class OrderProductController extends Controller
{
    /**
     * Display a listing of order products (Filtered by order_id when passed).
     */
    public function index(Request $request)
    {
        $search  = $request->input('search');
        $sortby  = $request->input('sortby', 'created_at');
        $order   = $request->input('sort_direction', 'asc');
        $perPage = $request->input('per_page', 15);

        $query = Order_Product::with(['orders', 'products']);

        // Filter by order_id if present in request
        if ($request->has('order_id')) {
            $query->where('order_id', $request->input('order_id'));
        }

        // Filter by product search query
        if ($search) {
            $query->whereHas('products', function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%");
            });
        }

        $orderProducts = $query->orderBy($sortby, $order)->paginate($perPage);

        return response()->json($orderProducts);
    }

    /**
     * Store a newly created order product in storage and update parent order totals.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id'   => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0',
            'discount'   => 'nullable|numeric|min:0',
        ]);

        $qty       = $validated['quantity'];
        $unitPrice = $validated['unit_price'];
        $discount  = $validated['discount'] ?? 0;

        // Calculate amount for this line item
        $validated['amount'] = max(0, ($qty * $unitPrice) - $discount);

        $orderProduct = Order_Product::create($validated);

        // Recalculate and save parent order totals in orders table
        Order::find($validated['order_id'])?->recalculateTotals();

        return response()->json($orderProduct->load('products'), 201);
    }

    /**
     * Display the specified order product.
     */
    public function show(string $id)
    {
        $orderProduct = Order_Product::with(['orders', 'products'])->findOrFail($id);

        return response()->json($orderProduct);
    }

    /**
     * Update the specified order product in storage and update parent order totals.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'order_id'   => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0',
            'discount'   => 'nullable|numeric|min:0',
        ]);

        $qty       = $validated['quantity'];
        $unitPrice = $validated['unit_price'];
        $discount  = $validated['discount'] ?? 0;

        // Recalculate amount for this line item
        $validated['amount'] = max(0, ($qty * $unitPrice) - $discount);

        $orderProduct = Order_Product::findOrFail($id);
        $orderProduct->update($validated);

        // Recalculate and save parent order totals in orders table
        Order::find($validated['order_id'])?->recalculateTotals();

        return response()->json([
            'message' => 'Updated Successfully!',
            'data'    => $orderProduct->load('products'),
        ]);
    }

    /**
     * Remove the specified order product from storage and update parent order totals.
     */
    public function destroy(string $id)
    {
        $orderProduct = Order_Product::findOrFail($id);
        $orderId = $orderProduct->order_id;

        $orderProduct->delete();

        // Recalculate parent order totals after line item removal
        Order::find($orderId)?->recalculateTotals();

        return response()->json(['message' => 'Deleted Successfully!']);
    }
}