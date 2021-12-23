<?php

namespace App\Http\Middleware;

use Closure;

class CustomerMidlleware
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
        if (Auth::guard('customer')->check() ){
            return $next($request);
        }else{
            return redirect()->route('site.home');
        }
    }
}
