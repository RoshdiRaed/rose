<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // If user is already authenticated, redirect to dashboard
                // but only if they're trying to access login or register pages
                if ($request->routeIs('login') || $request->routeIs('register')) {
                    return redirect()->route('dashboard');
                }
                
                // For other routes, continue with the request
                return $next($request);
            }
        }

        return $next($request);
    }
}
