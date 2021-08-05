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
        $fields = $request->validate(
            [
                'first_name'=>'required|string',
                'last_name'=>'required|string',
                'user_name'=>'required|unique:users,user_name',
                'email'=>'required|string|unique:users,email',
                'password'=>'required|string|confirmed',
            ]);
        $user = User::create([
            'first_name' => $fields['first_name'],
            'last_name' => $fields['last_name'],
            'user_name' => $fields['user_name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

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
           'email'=>'required|string',
           'password'=>'required|string'
        ]);

        $user = User::where('email',$fields['email'])->first();
        if(!$user || !Hash::check($fields['password'],$user->password)){
            return response()->json([
                'message'=>'Not invalid password or email'
            ]);
        }

        $token = $user->createToken('appToken')->plainTextToken;

        return response()->json([
            'user'=>$user,
            'token'=>$token
        ],201);
    }
}
