<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::all();
        return $data;
    }

    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $post->create($request->post());

        return $post;
    }

    public function destroy(Post $post)
    {
        $result = $post ->delete();
        return response()->json($result);
    }

    public function update(Request $request,Post $post)
    {
        $request->validate([
            'content' => 'required',
        ]);
        $post->update([
            'content' => $request->input('content')
        ]);
        return response()->json($post);
    }
    public function show(Post $post)
    {
        return response()->json($post);
    }

}

