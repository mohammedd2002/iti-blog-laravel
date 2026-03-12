<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store($id)
    {
        $post = Post::find($id);
        $post->comments()->create(request()->all());
        return to_route('posts.show', ['id' => $id]);
    }


    public function edit(Comment $comment)
    {
        return view('comments.edit', ['comment' => $comment]);
    }

  
    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->all());
        return to_route('posts.show', ['id' => $comment->commentable_id]);
    }


    public function destroy( $id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return back();
    }
}
