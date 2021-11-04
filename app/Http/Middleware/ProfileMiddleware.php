<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProfileMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $clientID)
    {
        if ($clientID != auth()->user()->id) 
        {
            return abort(403, 'Доступ запрещен!');
        }
        return $next($request);
    }
}
