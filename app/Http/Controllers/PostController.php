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

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $post = Post::create($request->all());

        return $post;
    }

    public function destroy($id)
    {
        $result = Post::find($id)->delete();
        return response()->json(['id'=>$id]);
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
