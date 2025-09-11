<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;

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
        // 1. Session (current session)
        // 2. Cookie (persists across sessions)
        // 3. Default from config
        
        $validLocales = ['en', 'ar'];
        $locale = null;
        
        // First check session
        if (Session::has('locale') && in_array(Session::get('locale'), $validLocales)) {
            $locale = Session::get('locale');
        }
        // Then check cookie
        elseif (Request::hasCookie('locale') && in_array(Request::cookie('locale'), $validLocales)) {
            $locale = Request::cookie('locale');
            // Update session from cookie
            Session::put('locale', $locale);
        }
        
        // If no valid locale found, use the default from config
        if (!$locale || !in_array($locale, $validLocales)) {
            $locale = config('app.locale', 'en');
            Session::put('locale', $locale);
        }
        
        // Set the application locale
        $this->app->setLocale($locale);
        
        // Force set the locale for the current request
        if (function_exists('app')) {
            app()->setLocale($locale);
        }
        
        // Set the application direction based on locale
        $direction = $locale === 'ar' ? 'rtl' : 'ltr';
        config(['app.direction' => $direction]);
        
        // Update cookie if needed
        if (Request::cookie('locale') !== $locale) {
            Cookie::queue('locale', $locale, 60 * 24 * 365); // 1 year
        }
    }
}
