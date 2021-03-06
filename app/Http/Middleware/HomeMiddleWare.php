<?php

namespace App\Http\Middleware;

use Closure;

class HomeMiddleWare
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
        if(!$request->session()->has('homeuser')){
			return redirect("home/login");
		}

        return $next($request);
    }
}
