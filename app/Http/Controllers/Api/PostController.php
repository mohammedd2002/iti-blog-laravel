<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        //    return Post::all();
        $posts = Post::with('user')->paginate(10);
        return PostResource::collection($posts);
    }


    public function store(StorePostRequest $request)
    {
        $validatedData = $request->validated();
        $post = Post::create($validatedData);
        return new PostResource($post);
    }


    public function show(string $id)
    {
        // return Post::find($id);
        $post = Post::with('user')->find($id);
        return new PostResource($post);
    }

    public function update(Request $request, string $id) {}


    public function destroy(string $id) {}
}
