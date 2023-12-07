<?php

namespace App\Listeners;

use App\Events\PostUpdated;

class PostUpdatedListener
{
    public function handle(PostUpdated $event)
    {

        $event->post->update(['processed' => true]);
    }
}

