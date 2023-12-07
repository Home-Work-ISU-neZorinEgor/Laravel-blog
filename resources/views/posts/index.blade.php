@extends('layouts.app')

@section('content')
<div style="margin:20px;">
    <div class="table-container">
        <table class="post-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    @if ($post->published)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->content }}</td>
                            <td class="post-actions">
                                <a href="{{ route('posts.show', $post) }}">View Post</a>
                                | Comments: {{ $post->comments->count() }}
                                | Status: {{ $post->published ? 'Published' : 'Not Published' }}
                                |
                                <form action="{{ route('posts.updateStatus', $post) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <button type="submit">{{ $post->published ? 'Unpublish' : 'Publish' }}</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    </div>

@endsection



<style>
.table-container {
    margin-top: 20px;
}

.post-table {
    width: 100%;
    border-collapse: collapse;
}

.post-table th, .post-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.post-table th {
    background-color: #f2f2f2;
}

/* Post Styles */
.post-container {
    margin-bottom: 20px;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
}

.post-title {
    font-size: 1.5em;
    margin-bottom: 10px;
}

.post-content {
    margin-bottom: 15px;
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