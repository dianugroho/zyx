<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthEmailVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // $userRole = Auth::user()->role()->first()->role;
        $userEmailVerified = Auth::user()->email_verified_at;
        if($userEmailVerified !== null) {
            return $next($request);
        }

        abort(403);
    }
}
