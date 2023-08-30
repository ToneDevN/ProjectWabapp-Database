<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsPoser
{
    /**z
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->is_poser == 1) {
            return $next($request);
        }
        elseif (auth()->user()->is_poser == 2){
            return $next($request);
        }
        

        return redirect('home')->with('error', "You is User");
    }
}
