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
        $validLocales = ['en', 'ar'];
        $locale = null;

        // 1. Check URL parameter first (for testing)
        if ($request->has('lang') && in_array($request->get('lang'), $validLocales)) {
            $locale = $request->get('lang');
            session(['locale' => $locale]);
            
            // Set cookie for future requests
            return redirect($request->url())
                ->withCookie(cookie()->forever('locale', $locale));
        }
        
        // 2. Check session first
        if (session()->has('locale') && in_array(session('locale'), $validLocales)) {
            $locale = session('locale');
        }
        // 3. Then check cookie
        elseif ($request->hasCookie('locale') && in_array($request->cookie('locale'), $validLocales)) {
            $locale = $request->cookie('locale');
            session(['locale' => $locale]);
        }
        // 4. Default to config
        else {
            $locale = config('app.locale', 'en');
            session(['locale' => $locale]);
        }

        // Set the application locale
        app()->setLocale($locale);
        
        // Force set the locale for the current request
        if (function_exists('app')) {
            app()->setLocale($locale);
        }
        
        // Set the application direction based on locale
        $direction = $locale === 'ar' ? 'rtl' : 'ltr';
        config(['app.direction' => $direction]);
        
        // Set the locale in the request
        $request->setLocale($locale);

        return $next($request);
    }
}
