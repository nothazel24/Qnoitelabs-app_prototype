<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\Facades\Auth;

class LoginResponse implements LoginResponseContract
{
    /**
     * Handle the login response.
     */
    public function toResponse($request)
    {
        $role = Auth::user()->role;

        if ($role === 'admin' || $role === 'author') {
            return redirect()->intended('/admin/dashboard');
        }

        return redirect()->intended('/price');
    }
}
