<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = [
            [
                'id' => 1,
                'title' => 'First Post',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'creator' => [
                    'name' => 'John Doe',
                    'email' => 'john@example.com',
                    'created_at' => '2024-06-01'
                ],
            ],
            [
                'id' => 2,
                'title' => 'Second Post',
                'description' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'creator' => [
                    'name' => 'Jane Smith',
                    'email' => 'jane@example.com',
                    'created_at' => '2024-06-02'
                ],
            ],
            [
                'id' => 3,
                'title' => 'Third Post',
                'description' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'creator' => [
                    'name' => 'Alice Johnson',
                    'email' => 'alice@example.com',
                    'created_at' => '2024-06-03'
                ],
            ],
        ];
        return view('posts.index', ['posts' => $posts]);
    }

    public function show($id)
    {
        $post = [
            'id' => $id,
            'title' => 'Post Title',
            'creator' => [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'created_at' => '2024-06-01'
            ],
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
        ];
        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        return to_route('posts.index');
    }

    public function edit($id)
    {
        $post = [
            'id' => $id,
            'title' => 'Post Title',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',

        ];
        return view('posts.edit', ['post' => $post]);
    }

    public function update($id)
    {
        return to_route('posts.index');
    }

    public function destroy($id)
    {
        
        return to_route('posts.index');
    }
}
