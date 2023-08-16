<?php

namespace App\Http\Middleware;

// use Auth;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
    // Add custom parameters $role which pass from web.php
    public function handle(Request $request, Closure $next, $role)
    {
        // Check & verify with route
        if(Auth::check() && Auth::user()->role == $role){
            return $next($request);
        }

        return response()->json(['You do not have permission to access for this page.']);
    }
}
