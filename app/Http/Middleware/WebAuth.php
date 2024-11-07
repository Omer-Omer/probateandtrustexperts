<?php

namespace App\Http\Middleware;

use Closure;

class WebAuth
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
        // dd($request->all());
        if(auth()->user()->role == 3){

            return $next($request);
        }

        return redirect('login')->with("error","You don't have user access.");
    }
}
