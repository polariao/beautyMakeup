<?php

namespace App\Http\Middleware;

use Closure;

class HomeLogin
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
        if (!session('student')){
          return  redirect('home/login');
        }
        return $next($request);
    }
}
