<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * User Login: Verify credentials and issue a Sanctum token.
     */
    public function login(Request $request): JsonResponse
    {
        // 1. Validate incoming credentials
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // 2. Find user by email
        $user = User::where('email', $credentials['email'])->first();
        // dd($user);
        // if($credentials['password']){
        //     $data = [
        //         'origin' => Hash::make($credentials['password'],['rounds' => 12]),
        //         'password' => $user->password,
        //     ];
        //     dd($data);
        // }

        // 3. Verify password hash
        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            return revsponse()->json([
                'message' => 'Invalid email or password.',
            ], 401);
        }

        // 4. Check account status (optional business rule)
        if ($user->status !== 'active') {
            return response()->json([
                'message' => 'Your account is inactive. Please contact support.',
            ], 403);
        }

        // 5. Create Sanctum token
        // 'pos-token' is a label for the device/client
        $token = $user->createToken('pos-token')->plainTextToken;

        // 6. Return token and user details to client
        return response()->json([
            'message'    => 'Login successful',
            'token'      => $token,
            'token_type' => 'Bearer',
            'user'       => [
                'id'    => $user->id,
                'name'  => $user->name,
                'email' => $user->email,
                'role'  => $user->role,
            ],
        ], 200);
    }

    /**
     * Get Current Authenticated User profile.
     */
    public function me(Request $request): JsonResponse
    {
        return response()->json($request->user());
    }

    /**
     * User Logout: Revoke current Sanctum token.
     */
    public function logout(Request $request): JsonResponse
    {
        // Safely delete the token used for the current request
        $request->user()?->currentAccessToken()?->delete();

        return response()->json([
            'message' => 'Logged out successfully',
        ], 200);
    }
}