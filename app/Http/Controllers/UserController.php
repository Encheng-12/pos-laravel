<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('orders')->get();

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
            "email" => "nullable|email|unique:students,email",
            "address" => "nullable|string|max:255",
            "phone_number" => "required|integer|max:13",
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
            "name" => "required|string|max:255",
            "email" => "nullable|email|unique:students,email",
            "address" => "nullable|string|max:255",
            "phone_number" => "required|integer|max:13",
            "role" => "nullable|string",
            "status" => "nullable|string",
        ]);

        $user = User::findOrFail($id)->update($validated);
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::findOrFail($id)->delete();
        return "delete successfully";
    }
}
