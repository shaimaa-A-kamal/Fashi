<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;

class isAdminMiddleware
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
        if( auth()->check() && (auth()->user()->user_type == 2))
               return $next($request);
        else 
             abort(403);
    }
}
