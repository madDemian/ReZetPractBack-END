<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserPosts(User $user){
        return UserResource::collection($user->posts()->get());
    }
    public function authMe(Request $request){
        return new UserResource($request->user());
    }
}
