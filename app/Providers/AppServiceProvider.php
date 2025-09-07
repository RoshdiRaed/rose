<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Set the application locale based on the following priority:
        // 1. URL parameter (for testing)
        // 2. Session (current session)
        // 3. Cookie (persists across sessions)
        // 4. Default from config
        
        $locale = null;
        
        // Check URL parameter first (for testing)
        if (Request::has('lang') && in_array(Request::get('lang'), ['en', 'ar'])) {
            $locale = Request::get('lang');
            Session::put('locale', $locale);
            Cookie::queue('locale', $locale, 60 * 24 * 365); // 1 year
        }
        // Then check session
        elseif (Session::has('locale')) {
            $locale = Session::get('locale');
        }
        // Then check cookie
        elseif (Request::hasCookie('locale')) {
            $locale = Request::cookie('locale');
            // Update session from cookie
            Session::put('locale', $locale);
        }
        
        // Set the locale if valid, otherwise fallback to config
        if ($locale && in_array($locale, ['en', 'ar'])) {
            // Set the application locale
            App::setLocale($locale);
            
            // Set the application direction based on locale
            config(['app.direction' => $locale === 'ar' ? 'rtl' : 'ltr']);
            
            // Update session and cookie if needed
            if (Session::get('locale') !== $locale) {
                Session::put('locale', $locale);
            }
            
            if (Request::cookie('locale') !== $locale) {
                Cookie::queue('locale', $locale, 60 * 24 * 365); // 1 year
            }
        } else {
            // Fallback to config
            App::setLocale(config('app.locale'));
        }
    }
}
