<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return response()->json($posts);
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);
        $user = auth()->user();
        $post=Post::create(['content'=>$request['content'], 'user_id'=>$user->id]);
        return response()->json($post);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->noContent();
    }

    public function update(Request $request,Post $post)
    {
        $request->validate([
            'content' => 'required',
        ]);
        $post->update($request->input());
        return response()->json($post);
    }

    public function show(Post $post)
    {
        return response()->json($post);
    }

}

