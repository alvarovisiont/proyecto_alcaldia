<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Closure;
use App\User;
class MiddlwareRutas
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


        return $next($request);
    }
}