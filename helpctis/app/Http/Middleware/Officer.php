<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Officer
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
        if(auth()->user()->position == 'officer'){
            return $next($request);
        }

        return redirect('home')->with('error',"Only officer can access!");
    }
}
