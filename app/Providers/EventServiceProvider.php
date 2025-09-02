<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        \Illuminate\Auth\Events\Registered::class => [
            \App\Listeners\SendRegisterNotification::class,
        ],

        \Illuminate\Auth\Events\PasswordReset::class => [
            \App\Listeners\SendPasswordUpdateNotification::class,
        ],
    ];
}
