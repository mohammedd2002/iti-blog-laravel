<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::with(['user'])->paginate(10);
        return view('posts.index', ['posts' => $posts]);
        // return Inertia::render('posts/Index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {

        // return response()->json($post->load('user'));
        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        $user = User::all();
        return view('posts.create', ['user' => $user]);
    }

    public function store(StorePostRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image');
        }


        Post::create($validatedData);
        return to_route('posts.index');
    }

    public function edit($id)
    {
        $user = User::all();
        $post = Post::find($id);
        return view('posts.edit', ['post' => $post, 'user' => $user]);
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $validatedData = $request->validated();
        $post = Post::find($id);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image');
        }

        $post->update($validatedData);
        return to_route('posts.index');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();
        return to_route('posts.index', [], 303);
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->paginate(10);
        return view('posts.trashed', ['posts' => $posts]);
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->find($id);
        $post->restore();
        return to_route('posts.trashed');
    }
}
