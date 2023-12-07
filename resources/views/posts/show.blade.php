@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    <h2>Comments</h2>
    <ul>
        @foreach($post->comments as $comment)
            <li>
                {{ $comment->content }}
                <form action="{{ route('comments.destroy', $comment) }}" method="post" style="display:inline;">
                    @csrf
                    @method('delete')
                    <button type="submit">x</button>
                </form>
            </li>
        @endforeach
    </ul>

    <form action="{{ route('comments.store', $post) }}" method="post">
        @csrf
        <label for="content">Add Comment:</label>
        <textarea name="content" required></textarea>
        <button type="submit">Submit</button>
    </form>
@endsection

<style>
.post-details-container {
    border: 1px solid #ccc;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.post-title {
    font-size: 24px;
    color: #333;
    margin-bottom: 10px;
}

.post-content {
    color: #555;
    margin-bottom: 20px;
}

.comments-section {
    margin-top: 20px;
}

.comment-list {
    list-style-type: none;
    padding: 0;
}

.comment-item {
    border-bottom: 1px solid #ccc;
    padding: 10px 0;
}

.comment-content {
    color: #777;
}

.comment-form {
    margin-top: 20px;
}

.comment-form label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

.comment-form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
}

.comment-form button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

</style>   