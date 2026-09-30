<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search =  $request->input('search');
        $sortby = $request->input('sortby', 'created_at');
        $order = $request->input('order','desc');
        $per_page = $request->input('per_page');


        $categories = Category::with('products')->when($search, function($query, $search ){
            return $query->where('name', 'LIKE', "%{$search}%");
        })->orderBy($sortby, $order)->paginate($per_page);
        
        return $categories;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|string|max:255",
            "description" => "nullable|string|max:255",
        ]);

        $category = Category::create($validated);
        return $validated;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::with('products')->findOrFail($id);
        return $category;
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
            "name" => "sometimes|string|max:255",
            "description" => "sometimes|string|max:255",
        ]);

        $category = Category::findOrFail($id)->update($validated);
        return "Updated Successfully";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories =Category::findOrFail( $id)->delete();
        return "Deleted Successfully";
    }
}
