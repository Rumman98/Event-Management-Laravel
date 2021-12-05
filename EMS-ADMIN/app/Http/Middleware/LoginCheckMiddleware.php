<?php

namespace App\Http\Middleware;

use Closure;

class LoginCheckMiddleware
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
        if($request->session()->has('phone_number'))
        {
            return $next($request);
        }
        else
        {
            return redirect('/login');
        }
    }
}
