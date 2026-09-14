<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Prdouct::with('categories')->get();
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
            'cid'=>'required|exists:categories,id',
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
            'cid'=>'required|exists:categories,id',
            'name'=>'required|string|max:255',
            'barcode'=>'nullable|string|max:255',
            'cost_pricer'=>'required|integer|min:1',
            'selling_price'=>'required|integer|min:1',
            'stock_quantity'=>'required|integer|min:1',
            'status'=>'nullable|string|max:255'
        ]);

        $product = Product::findOrFail($validate);                
        return $product;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product -> delete();                
        return "Data delete successfully!";

    }
}
