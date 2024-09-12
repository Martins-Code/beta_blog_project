<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required|string|max:255|unique:posts,title',
            'body' => 'required',

        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();

        Post::create($incomingFields);
        return redirect('/');
    }


    public function index()
    {

        // $posts = Post::all();
        // $posts = Post::with('user')->latest()->get();

        $posts = [];
        if (auth()->check()) {
            // Fetch the authenticated user's posts
            $posts = auth()->user()->userPost()->latest()->get();
        }
        // Return the view with posts data
        return view('index', ['posts' => $posts]);
    }


    public function showEditScreen(Post $post)
    {

        if (!auth()->check()) {
            // If not authenticated, redirect to the homepage
            return redirect('/');
        }

        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }
        return view('edit-post', ['post' => $post]);
    }

    public function updatePost(Post $post, Request $request)
    {

        if (!auth()->check()) {
            // If not authenticated, redirect to the homepage
            return redirect('/');
        }

        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }

        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required',

        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $post->update($incomingFields);
        return redirect('/');
    }


    public function deletePost(Post $post)
    {
        if (!auth()->check()) {
            // If not authenticated, redirect to the homepage
            return redirect('/');
        }

        if (auth()->user()->id === $post['user_id']) {
            $post->delete();
        }

        return redirect('/');
    }
}
