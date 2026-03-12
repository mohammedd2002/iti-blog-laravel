<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::paginate(10);
        return view('posts.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        $user = User::all();
        return view('posts.create', ['user' => $user]);
    }

    public function store()
    {
        Post::create(request()->all());
        return to_route('posts.index');
    }

    public function edit($id)
    {
        $user = User::all();
        $post = Post::find($id);
        return view('posts.edit', ['post' => $post , 'user' => $user]);
    }

    public function update($id)
    {
        $post = Post::find($id);
        $post->update(request()->all());
        return to_route('posts.index');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return to_route('posts.index');
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
