<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserPosts(User $user){
        return PostResource::collection(Post::orderBy('created_at', 'desc')->get());
    }
    public function authMe(Request $request){
        return new UserResource($request->user());
    }
}
