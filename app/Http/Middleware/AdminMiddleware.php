<?php

namespace DestinyH\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( Auth::check() && Auth::user()->user_rol == "admin")
        {
            return $next($request);
        }else if (Auth::check() && Auth::user()->user_rol == "member")
        {
            return redirect()->route('logout');
        }
        return redirect()->route('gLogin');

    }
}
