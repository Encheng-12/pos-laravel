<?php

namespace App\Http\Controllers;

use App\Models\StockMovement;
use Illuminate\Http\Request;

class StockmovementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $search = $request->input('search');

    $sortby = $request->input('sortby', 'created_at');
    $order = $request->input('order', 'desc');

    $perPage = $request->input('per_page', 10);

    $type = $request->input('type', 'all');

    $stockMovements = StockMovement::with('product')
        ->when($type !== 'all', function ($query) use ($type) {
            $query->where('type', $type);
        })
        ->when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('type', 'LIKE', "%{$search}%")
                      ->orWhere('reference', 'LIKE', "%{$search}%");
            });
        })
        ->orderBy($sortby, $order)
        ->paginate($perPage);

    return response()->json($stockMovements);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|string',
            'quantity' => 'required|numeric',
            'reference' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $stockmovement = StockMovement::create($validated);
        return response()->json($stockmovement, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $stockmovement = StockMovement::findOrFail($id);
        return response()->json($stockmovement);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|string',
            'quantity' => 'required|numeric',
            'reference' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $stockmovement = StockMovement::findOrFail($id);
        $stockmovement->update($validated);
        return response()->json($stockmovement);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $stockmovement = StockMovement::findOrFail($id);
        $stockmovement->delete();
        return response()->json(null, 204);
    }
}
