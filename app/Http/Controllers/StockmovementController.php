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
        //
        // $stockmovement = StockMovement::all();   
        // return response()->json($stockmovement);
        $search = $request->input('search');
        $sortby  = $request->input('sortby');
        $order = $request->input('order');
        $per_page = $request->input('page'); // Default to 10 items per page if not specified
    $stockMovements = StockMovement::with(['product'])->when($search, function ($query, $search) {
        return $query
            ->where('type', 'LIKE', "%{$search}%")
            ->orWhere('reference', 'LIKE', "%{$search}%");
    })->orderBy($sortby, $order)->paginate($per_page);

    

    return $stockMovements;
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
