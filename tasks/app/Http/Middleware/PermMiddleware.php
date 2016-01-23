<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PermMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       

        if(Auth::guest()) {
            return redirect('/login');
        }

        $user = Auth::user();
        if(!$user->is('admin')) {
            return redirect('/');
        }

        

        return $next($request);
    }
}
