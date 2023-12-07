<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\PostCreated;
use App\Events\PostUpdated;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        'App\Events\PostUpdated' => [
            'App\Listeners\PostUpdatedListener',
        ],
        'App\Events\PostCreated' => [
            'App\Listeners\PostCreatedListener',
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}
