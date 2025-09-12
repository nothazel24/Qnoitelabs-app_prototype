<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'admin' || Auth::user() === 'author') {
            return $next($request);
        }

        return redirect()->route('home.main')->with([
            'messages' => 'Anda bukan admin!',
            'type'     => 'danger',
            'id'       => 'failed-notification'
        ]);
    }
}

