<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserPosts(User $user){
        return response()->json($user->posts()->get());
    }
    public function authMe(Request $request){
        return response()->json($request->user());
    }
}
