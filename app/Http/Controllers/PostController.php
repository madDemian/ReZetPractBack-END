<?php

namespace App\Http\Controllers;
use App\Http\Resources\PostResource;

use App\Http\Requests\PostRequest;
use App\Models\Post;


class PostController extends Controller
{
    public function index()
    {
        return PostResource::collection(Post::orderBy('created_at', 'desc')->get());
    }

    public function store(PostRequest $request)
    {
        $post = auth()->user()->posts()->create($request->validated());
        return new PostResource($post);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->noContent();
    }

    public function update(PostRequest $request,Post $post)
    {
        $post->update($request->validated());
        return new PostResource($post);
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }

}

