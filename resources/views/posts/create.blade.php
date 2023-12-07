@extends('layouts.app')

@section('content')
<div style="margin:20px;">
    <form action="{{ route('posts.store') }}" method="post" class="post-form">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" required class="form-input">
        <br>
        <label for="content">Content:</label>
        <textarea name="content" required class="form-input"></textarea>
        <br>
        <label for="publish_option">Publish Option:</label>
        <select name="publish_option" id="publish_option" class="form-input">
            <option value="scheduled">Schedule for Later</option>
            <option value="now">Publish Now</option>
        </select>
        <br>
        <div id="publish_date_input">
            <label for="publish_date">Publish Date:</label>
            <input type="datetime-local" name="publish_date" class="form-input">
            <br>
        </div>
        <button type="submit" class="btn-primary">Create Post ✍🏼</button>
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


                    <form action="{{ route('posts.edit', $post) }}" method="get">
                        <button type="submit" class="btn-edit">Edit ✏️</button>
                    </form>

                    <form action="{{ route('posts.updateStatus', $post) }}" method="post">
                        @csrf
                        @method('patch')
                        <button type="submit" class="btn-update">Add ➕</button>
                    </form>

                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn-delete">Delete 🗑️</button>
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
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-input {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .btn-primary {
        background-color: #2ecc71;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .post-container {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 8px;
    }

    .post-content {
        margin-bottom: 10px;
    }

    .post-schedule-info {
        color: #888;
        margin-bottom: 10px;
    }

    .post-actions {
        display: flex;
        gap: 20px;
        justify-content: start;
    }

    .btn-secondary,
    .btn-edit,
    .btn-update,
    .btn-delete {
        background-color: #3498db;
        color: #fff;
        padding: 5px 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-edit {
        background-color: #f39c12;
    }

    .btn-update {
        background-color: #2ecc71;
    }

    .btn-delete {
        background-color: #e74c3c;
    }
</style>
