<?php

namespace App\Http\Middleware;

use Closure;

class CunsomerKeyMiddleware
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
        if ($request->header('consumer_key') !== 'aaa0c9402fa7539d359abc00b1e8ad51af40b095f165a763680510c5b47402f4' &&  $request->header('consumer_secret') !== 'cs_9829116bf184bdab46fb34281fb5a9ee16679437'){
            //return  'NOT ACCESS REQUEST';
            return redirect('http://protool.az');
        }else{
            return $next($request);

        }
    }
}
