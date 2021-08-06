<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;


class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate(
            [
                'first_name'=>'required|string',
                'last_name'=>'required|string',
                'user_name'=>'required|unique:users,user_name',
                'email'=>'required|string|unique:users,email',
                'password'=>'required|string|confirmed',
            ]);
        $user = User::create($request->input());

        $token = $user->createToken('appToken')->plainTextToken;

        return response()->json([
           'user'=>$user,
           'token'=>$token
        ],201);
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return response()->json([
            'message'=>'Logged out'
            ]);
    }

    public function login(Request $request){
        $fields = $request->validate([
           'email' => 'required|string|exists:users',
           'password' => 'required|string'
        ]);

        if(auth()->attempt(['email' => $fields['email'],'password'=>$fields['password']])){
            $user =auth()->user();
            $token = $user->createToken('appToken')->plainTextToken;

            return response()->json([
                'user' => $user,
                'token' => $token
            ],201);
        }

        return response()->json([
            'message' => 'Not invalid password or email'
        ]);


    }
}
