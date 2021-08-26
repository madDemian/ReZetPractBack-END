<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Http\Resources\UserWithPostsResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserPosts(User $user){
        return new UserWithPostsResource($user);
    }
    public function authMe(Request $request){
        return new UserResource($request->user());
    }
}
