<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if locale is passed as a query parameter
        if ($request->has('lang') && in_array($request->get('lang'), ['en', 'ar'])) {
            $locale = $request->get('lang');
            session(['locale' => $locale]);
        }

        // Set locale from session or default to 'en'
        $locale = session('locale', 'en');

        if (in_array($locale, ['en', 'ar'])) {
            App::setLocale($locale);
        }

        return $next($request);
    }
}
