<!-- resources/views/posts/index.blade.php -->

@extends('layouts.app')

@section('content')
    @foreach($posts as $post)
        @if ($post->published)
            <div>
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>
                <p>
                    <a href="{{ route('posts.show', $post) }}">View Post</a>
                    | Comments: {{ $post->comments->count() }}
                    | Status: {{ $post->published ? 'Published' : 'Not Published' }}
                </p>
                | <form action="{{ route('posts.updateStatus', $post) }}" method="post" style="display:inline;">
                    @csrf
                    @method('patch')
                    <button type="submit">{{ $post->published ? 'Unpublish' : 'Publish' }}</button>
                </form>
            </div>
        @endif
    @endforeach
@endsection


