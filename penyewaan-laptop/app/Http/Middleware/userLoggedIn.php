<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class userLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Session()->has("loginUser") and (url("/")==$request->url() or url("loginAdmin")==$request->url() or url("loginUser")==$request->url() or url("registerUser")==$request->url())){
            return back();
        }
        return $next($request);
    }
}
