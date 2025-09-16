<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with([
                'messages' => 'Silahkan login terlebih dahulu',
                'type' => 'danger',
                'id' => 'failed-notification'
            ]);
        }

        $user = Auth::user();

        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        abort(Response::HTTP_FORBIDDEN, 'You do not have the necessary permissions to access this page.');
    }
}