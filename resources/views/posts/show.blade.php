@extends('layouts.app')

@section('content')
<div style="margin:20px;">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    <h2>Comments</h2>
    @foreach($post->comments as $comment)
        <div class="comment-container">
            <p class="comment-content">{{ $comment->content }}</p>
            <div class="comment-actions">
                <form action="{{ route('comments.destroy', $comment) }}" method="post" style="display:inline;">
                    @csrf
                    @method('delete')
                    <button type="submit">Delete</button>
                </form>
            </div>
        </div>
    @endforeach

    <div class="comment-form">
        <form action="{{ route('comments.store', $post) }}" method="post">
            @csrf
            <label for="content">Add Comment:</label>
            <textarea name="content" required></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection


<style>
.comment-container {
    margin-bottom: 20px;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.comment-content {
    margin-bottom: 10px;
    color: #555;
}

.comment-actions button {
    background-color: #e74c3c;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
}

.comment-actions button:hover {
    background-color: #c0392b;
}

.comment-form {
    margin-top: 20px;
}

.comment-form label {
    display: block;
    margin-bottom: 8px;
}

.comment-form textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

.comment-form button {
    background-color: #3498db;
    color: #fff;
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.comment-form button:hover {
    background-color: #2980b9;
}

</style>   