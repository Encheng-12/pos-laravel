<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search =  $request->input('search');
        $sortby = $request->input('sortby');
        $order = $request->query('order','desc');
        
        $users = User::with('orders')->when($search, function($query, $search ){
            return $query->where('name', 'LIKE', "%{$search}%");
        })->orderBy($sortby,$order)->get();

        return $users;
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
            "email" => "nullable|email|unique:users,email",
            "address" => "nullable|string|max:255",
            "phone_number" => "required|string|max:13|regex:/^[0-9\-\+]+$/",
            "role" => "nullable|string",
            "status" => "nullable|string",
        ]);

        $user = User::create([$validated]);
        return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::with('orders')->findOrFail($id);

        return $users;
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
            "email" => "sometimes|email|unique:users,email,". $id,
            "address" => "somtimes|string|max:255",
            "phone_number" => "sometimes|string|max:13|regex:/^[0-9\-\+]+$/",
            "role" => "sometimes|string",
            "status" => "sometimes|string",
        ]);

        $user = User::findOrFail($id)->update($validated);
        return "Updated Successfully!";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::findOrFail($id)->delete();
        return "Deleted Successfully";
    }
}
