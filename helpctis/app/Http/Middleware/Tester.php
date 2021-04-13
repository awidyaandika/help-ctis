<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Tester
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
        if(auth()->user()->position == 'tester'){
            return $next($request);
        }

        return redirect('home')->with('error',"Only tester can access!");
    }
}
