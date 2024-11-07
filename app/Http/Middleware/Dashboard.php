<?php

namespace App\Http\Middleware;

use Closure;

class Dashboard
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
        // dd(auth()->user());
        if(auth()->user()->login_type == 'dashboard' && auth()->user()->role == 1){
            return $next($request);
        }

        return redirect('login')->with("error","You don't have admin access.");
    }
}
