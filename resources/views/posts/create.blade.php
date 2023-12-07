@extends('layouts.app')

@section('content')
    <div style="margin:20px;">
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <div class="post-form">
            <label for="title">Title:</label>
            <input type="text" name="title" required>
            <br>
            <label for="content">Content:</label>
            <textarea name="content" required></textarea>
            <br>
            <label for="publish_option">Publish Option:</label>
            <select name="publish_option" id="publish_option">
                <option value="now">Publish Now</option>
                <option value="scheduled">Schedule for Later</option>
            </select>
            <br>
            <div id="publish_date_input">
                <label for="publish_date">Publish Date:</label>
                <input type="datetime-local" name="publish_date">
                <br>
            </div>
            <button type="submit">Create Post</button>
        </div>
    </form>

    <h2>Unpublished Posts (Queue)</h2>
        @foreach($unpublishedPosts as $post)
            <div class="post-container">
                <div class="post-content">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->content }}</p>
                </div>

                @if($post->publish_date)
                    <div class="post-schedule-info">
                        (Scheduled for {{ $post->publish_date }})
                    </div>
                @endif

                <div class="post-actions">
                    <form action="{{ route('posts.schedule', $post->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <button type="submit">Publish Now</button>
                    </form>

                    <form action="{{ route('posts.edit', $post) }}" method="get">
                        <button type="submit">✏️</button>
                    </form>

                    <form action="{{ route('posts.updateStatus', $post) }}" method="post">
                        @csrf
                        @method('patch')
                        <button type="submit">➕</button>
                    </form>

                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">❌</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <script>
        document.getElementById('publish_option').addEventListener('change', function () {
            var publishDateInput = document.getElementById('publish_date_input');
            publishDateInput.style.display = (this.value === 'scheduled') ? 'block' : 'none';
        });
    </script>

@endsection

<style>
    .post-form {
        margin-bottom: 20px;
    }

    .post-container {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
    }

    .post-content {
        margin-bottom: 10px;
    }

    .post-schedule-info {
        color: #888;
        margin-bottom: 10px;
    }

    .body{
        padding: 10px
    }

    .post-actions {
        display: flex;
        gap: 20px;
        justify-content: start;
    }
</style>
