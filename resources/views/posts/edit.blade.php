@extends('layouts.app')

@section('content')
    <div class="edit-form-container">
        <h1>Edit Post</h1>

        <form action="{{ route('posts.update', $post) }}" method="post">
            @csrf
            @method('patch')

            <label for="title" class="edit-form-label">Title:</label>
            <input type="text" name="title" value="{{ $post->title }}" required class="edit-form-input">

            <label for="content" class="edit-form-label">Content:</label>
            <textarea name="content" required class="edit-form-textarea">{{ $post->content }}</textarea>

            <button type="submit" class="edit-form-button">Update</button>
        </form>

        <form action="{{ route('posts.destroy', $post) }}" method="post" style="display:inline;">
            @csrf
            @method('delete')
            <button type="submit" class="edit-form-delete">Delete</button>
        </form>
    </div>
@endsection

<style>
.edit-form-container {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
}

.edit-form-label {
    display: block;
    margin-bottom: 8px;
}

.edit-form-input {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

.edit-form-textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

.edit-form-button {
    background-color: #3498db;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.edit-form-button:hover {
    background-color: #2980b9;
}

.edit-form-delete {
    background-color: #e74c3c;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.edit-form-delete:hover {
    background-color: #c0392b;
}

    </style>