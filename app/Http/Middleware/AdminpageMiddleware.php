<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminpageMiddleware
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
        if(Auth::user()->roles->first()->id == 1)
            return $next($request);
        return redirect('/');
    }
}
