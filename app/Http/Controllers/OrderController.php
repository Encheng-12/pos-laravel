<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_Product;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $search         = $request->input('search');
        $sort_By        = $request->input('sort_by', 'invoice_no');
        $sort_Direction = $request->input('sort_direction', 'asc');
        $perPage        = $request->input('per_page', 10);

        $sort_Direction = strtolower($sort_Direction) === 'asc' ? 'asc' : 'desc';

        return Order::with(['customer', 'order_products.products'])
            ->when($search, function ($query, $search) {
                return $query->where('invoice_no', 'LIKE', "%{$search}%");
            })
            ->orderBy($sort_By, $sort_Direction)
            ->paginate($perPage);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cashier_id'         => 'required|exists:users,id',
            'customer_id'        => 'required|exists:users,id',
            'invoice_no'         => 'required|string|max:255|unique:orders,invoice_no',
            'tax'                => 'required|numeric|min:0',
            'status'             => 'required|string|max:255',
            'items'              => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity'   => 'required|integer|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
            'items.*.discount'   => 'nullable|numeric|min:0',
        ]);

        return DB::transaction(function () use ($validated) {
            // 1. Create Order shell
            $order = Order::create([
                'cashier_id'  => $validated['cashier_id'],
                'customer_id' => $validated['customer_id'],
                'invoice_no'  => $validated['invoice_no'],
                'tax'         => $validated['tax'],
                'subtotal'    => 0,
                'discount'    => 0,
                'total'       => 0,
                'status'      => $validated['status'],
            ]);

            // 2. Insert line items into order_product
            foreach ($validated['items'] as $item) {
                $qty       = $item['quantity'];
                $unitPrice = $item['unit_price'];
                $discount  = $item['discount'] ?? 0;
                $amount    = ($qty * $unitPrice) - $discount;

                Order_Product::create([
                    'order_id'   => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity'   => $qty,
                    'unit_price' => $unitPrice,
                    'discount'   => $discount,
                    'amount'     => max(0, $amount),
                ]);
            }

            // 3. Summarize total price from order_product and update the order table
            $order->recalculateTotals();

            return response()->json($order->load(['customer', 'order_products.products']), 201);
        });
    }

    public function show(string $id)
    {
        return Order::with(['customer', 'order_products.products'])->findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'cashier_id'  => 'sometimes|exists:users,id',
            'customer_id' => 'sometimes|exists:users,id',
            'invoice_no'  => 'sometimes|string|max:255',
            'subtotal'    => 'sometimes|numeric|min:0',
            'tax'         => 'sometimes|numeric|min:0',
            'discount'    => 'sometimes|numeric|min:0',
            'status'      => 'sometimes|string|max:255',
        ]);

        $order = Order::findOrFail($id);
        $order->update($validated);

        return response()->json($order->load(['customer', 'order_products.products']));
    }

    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return response()->json(['message' => 'Data deleted successfully!']);
    }
}