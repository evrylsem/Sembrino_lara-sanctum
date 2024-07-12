<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('post.show', compact('posts'));
    }

    public function edit(Post $post)
    {
        Gate::authorize('update', $post);
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        Gate::authorize('update', $post);
        $request->validate([
            'title' => 'sometimes|string|max:255',
            'body' => 'sometimes|string',
        ]);
        $post->update($request->only('title', 'body'));
        return redirect()->route('posts');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        Post::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->intended('/posts');
    }

    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);
        $post->delete();
        return redirect()->route('posts')->with('success', 'Post deleted successfully.');
    }

    public function show(Post $post)
    {
        $post->load([
            'user',
            'comments' => function ($query) {
                $query->latest()->with('user');
            },
        ]);
        return view('post.detail', compact('post'));
    }
}
