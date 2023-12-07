<!-- resources/views/posts/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>

    <form action="{{ route('posts.update', $post) }}" method="post">
        @csrf
        @method('patch')
        
        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ $post->title }}" required>

        <label for="content">Content:</label>
        <textarea name="content" required>{{ $post->content }}</textarea>

        <button type="submit">Update</button>
    </form>

    <form action="{{ route('posts.destroy', $post) }}" method="post" style="display:inline;">
        @csrf
        @method('delete')
        <button type="submit">Delete</button>
    </form>
@endsection
