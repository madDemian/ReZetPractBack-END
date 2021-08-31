<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserPosts(User $user){
        return PostResource::collection($user->posts()->latest('created_at')->get());
    }

    public function getUserInfo(User $user){
        return new UserResource($user);
    }

    public function me(Request $request){
        return new UserResource($request->user());
    }
}
