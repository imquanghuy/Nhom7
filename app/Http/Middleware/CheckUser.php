<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUser
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
        if (auth()->check()){
            if ($request->user()->hasVerifiedEmail()){
                return redirect()->route('home');
            }
            return $next($request);
        }
        return redirect()->route('home');
    }
}
