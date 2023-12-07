<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'published', 'publish_date'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function togglePublish()
    {
        $this->update(['published' => !$this->published]);
    }
}
