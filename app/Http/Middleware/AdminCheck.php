<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Closure;
use Auth;


class AdminCheck
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
        if(Auth::check()){           
                return $next($request);
        }else{
           return redirect()->route('login');
        }
    }
}
