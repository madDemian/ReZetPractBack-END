<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;



class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        $token = $user->createToken('appToken')->plainTextToken;
        return response()->json([
            'token' => $token
        ], 201);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'message' => 'Logged out'
        ]);
    }

    public function login(LoginRequest $request)
    {
        if (auth()->attempt($request->validated())) {
            $user = auth()->user();
            $token = $user->createToken('appToken')->plainTextToken;
            return response()->json([
                'token' => $token
            ], 201);
        }
        return response()->json([
            'message' => 'Invalid password or email'
        ]);
    }

}
