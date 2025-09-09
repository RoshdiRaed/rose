<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Skip verification check for these routes
        if ($request->is('verify-email*') || $request->is('email/verification-notification*')) {
            return $next($request);
        }

        if (Auth::check() && !Auth::user()->is_verified) {
            return redirect()->route('verification.notice')
                ->with('status', 'Please verify your email address to access this page.');
        }

        return $next($request);
    }
}
