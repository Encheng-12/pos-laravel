<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order_Product;
class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search   = $request->input('search');
        $sortby   = $request->input('sortby', 'created_at');
        $order    = $request->input('order', 'desc');
        $perPage  = $request->input('per_page', 15); // Fallback to 15 if not passed



        $query = Order_Product::with('products');

        // Filter by order_id if present in request
        if ($request->has('order_id')) {
            $query->where('order_id', $request->input('order_id'));}

        $orderProducts = Order_Product::with(['orders', 'products'])
            ->when($search, function ($query, $search) {
                // Search inside the related 'product' table by product name
                $query->whereHas('product', function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%");
                });
            })
            ->orderBy($sortby, $order)
            ->paginate($perPage);

        return response()->json($orderProducts);
        // return response()->json($query->paginate($request->get('per_page', 10)));

    }   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
{
    $validated = $request->validate([
        'order_id'   => 'required|exists:orders,id',
        'product_id' => 'required|exists:products,id',
        'quantity'   => 'required|integer|min:1',
        'unit_price' => 'required|numeric|min:0',
        'discount'   => 'nullable|numeric|min:0',
        'amount'     => 'required|numeric|min:0',
    ]);

    $orderProduct = Order_Product::create($validated);

    return response()->json($orderProduct, 201);
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order_products = Order_Product::with(['orders','products'])->findOrFail($id);

        return $order_products;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'order_id'   => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0',
            'discount'   => 'nullable|numeric|min:0',
            'amount'     => 'required|numeric|min:0',
        ]);

        $order_products = Order_Product::findOrFail($id)->update( $validated );
        return "Updated Successfully!";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order_products = Order_Product::findOrFail($id)->delete();
        return "Updated Successfully!";
    }
}
