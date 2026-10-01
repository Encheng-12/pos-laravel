<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $sort_By = $request->input('sort_by', 'barcode'); // Default column to sort by
        $sort_Direction = $request->input('sort_direction', 'desc'); // Default direction
        $perPage = $request->input('per_page',12); // Default items per page

        // Ensure direction is valid
        $sort_Direction = strtolower($sort_Direction) === 'asc' ? 'asc' : 'desc';

        $product = Product::with('categories')->when($search, function($query, $search) {
            return $query->where('name', 'LIKE', "%{$search}%");        
        })->orderBy($sort_By, $sort_Direction)->paginate($perPage);

    return $product;
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
        $validate = $request->validate([
            'category_id'=>'required|exists:categories,id',
            'name'=>'required|string|max:255',
            'barcode'=>'nullable|string|max:255',
            'cost_pricer'=>'required|integer|min:1',
            'selling_price'=>'required|integer|min:1',
            'stock_quantity'=>'required|integer|min:1',
            'status'=>'nullable|string|max:255'
        ]);

        $product = Product::create($validate);                
        return $product;


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('categories')->findOrFail($id);
        return $product;

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'category_id'=>'sometimes|exists:categories,id',
            'name'=>'sometimes|string|max:255',
            'barcode'=>'sometimes|string|max:255',
            'cost_price'=>'sometimes|integer|min:1',
            'selling_price'=>'sometimes|integer|min:1',
            'stock_quantity'=>'sometimes|integer|min:1',
            'status'=>'sometimes|string|max:255'
        ]);

        $product = Product::findOrFail($id);
        $product->update($validate);                
        return $product;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product -> destroy($id);                
        return "Data delete successfully!";

    }
}
