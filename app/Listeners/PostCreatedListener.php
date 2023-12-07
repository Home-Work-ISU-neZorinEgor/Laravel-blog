<?php

namespace App\Listeners;

use App\Events\PostCreated;
use Illuminate\Support\Facades\Log;

class PostCreatedListener
{
    public function handle(PostCreated $event)
    {
        Log::info('New post created: ' . $event->post->title);
    }
}
