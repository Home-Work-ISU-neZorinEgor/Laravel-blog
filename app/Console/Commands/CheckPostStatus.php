<?php

namespace App\Console\Commands;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckPostStatus extends Command
{
    protected $signature = 'posts:check-status';
    protected $description = 'Check and update status of scheduled posts';

    public function handle()
    {
        $posts = Post::where('published', false)->whereNotNull('publish_date')->get();

        foreach ($posts as $post) {
            if (Carbon::now()->gte($post->publish_date)) {
                $post->published = true;
                $post->save();
            }
        }

        $this->info('Post statuses checked and updated successfully.');
    }
}