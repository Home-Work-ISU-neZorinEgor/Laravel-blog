<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Jobs\SchedulePostJob;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Queue;
use App\Events\PostUpdated;
use App\Events\PostCreated;


class PostController extends Controller
{
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
    
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $unpublishedPosts = Post::where('published', false)->get();
        return view('posts.create', compact('unpublishedPosts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
    
        $post = Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'published' => false, // По умолчанию пост создается с неопубликованным статусом
        ]);
    
        event(new PostCreated($post));
    
        return redirect()->route('posts.create');
    }
    
    public function schedule($id)
{
    $post = Post::findOrFail($id);

    if ($post->publish_date && Carbon::now()->gte($post->publish_date)) {
        $post->published = true;
        $post->save();
    }

    return redirect()->route('posts.create');
}
    public function update(Request $request, Post $post)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    $post->update([
        'title' => $request->input('title'),
        'content' => $request->input('content'),
    ]);

    event(new PostUpdated($post));

    return redirect()->route('posts.create');
}

public function updateStatus(Post $post)
{
    $post->update(['published' => !$post->published]);

    event(new PostUpdated($post));

    return back();
}

public function edit(Post $post)
{
    return view('posts.edit', compact('post'));
}

    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }
}
