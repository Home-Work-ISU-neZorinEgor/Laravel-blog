@extends('layouts.app')

@section('content')
<div style="margin:20px;">
    @foreach($posts as $post)
        @if ($post->published)
            <div class="post-container">
                <h2 class="post-title">{{ $post->title }}</h2>
                <p class="post-content">{{ $post->content }}</p>
                <div class="post-actions">
                    <a href="{{ route('posts.show', $post) }}">View Post</a>
                    | Comments: {{ $post->comments->count() }}
                    |
                    <form action="{{ route('posts.updateStatus', $post) }}" method="post">
                        @csrf
                        @method('patch')
                        <button type="submit">{{ $post->published ? 'Unpublish' : 'Publish' }}</button>
                    </form>
                </div>
            </div>
        @endif
    @endforeach
</div>
@endsection




<style>
/* Add these styles to your styles.css file */

.post-container {
    margin-bottom: 20px;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.post-title {
    font-size: 1.5em;
    margin-bottom: 10px;
    color: #333;
}

.post-content {
    margin-bottom: 15px;
    color: #555;
}

.post-actions {
    display: flex;
    align-items: center;
}

.post-actions a {
    margin-right: 10px;
    text-decoration: none;
    color: #3498db;
}

.post-actions button {
    background-color: #3498db;
    color: #fff;
    border: none;
    padding: 8px 12px;
    border-radius: 4px;
    cursor: pointer;
}

.post-actions button:hover {
    background-color: #2980b9;
}


</style>