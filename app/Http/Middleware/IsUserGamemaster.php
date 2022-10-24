<?php

namespace App\Http\Middleware;

use Closure;

class IsUserGamemaster
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
        if(auth()->user()->role == 'gamemaster' or auth()->user()->role == 'admin')
            return $next($request);

        return redirect(route('login'));
    }
}
