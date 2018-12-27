<?php

namespace App\Http\Middleware;

use Closure;
use \Auth;

class Admin
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
        if(Auth::check() && Auth::user()->hasRoleId(1))
            return $next($request);
        else
            return back();
    }
}
