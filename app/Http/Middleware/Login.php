<?php

namespace App\Http\Middleware;

use Closure;

class Login
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
        //前置中间件
       //echo 11111;
       $response=$next($request);
        //后置中间件
        //echo 2222;
        return $response;

    }
}
