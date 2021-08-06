<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $post=Post::create($request->post());
        return response()->json($post);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->noContent(204);
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

