<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class LanguageController extends Controller
{
    public function switchLang($lang)
    {
        // Validate the language
        if (!in_array($lang, ['en', 'ar'])) {
            return redirect()->back()->with('error', 'Invalid language selected');
        }

        // Get the previous URL
        $previousUrl = url()->previous();
        $baseUrl = url('/');
        
        // Create a response to redirect back
        $response = redirect()->back()
            ->withCookie(cookie()->forever('locale', $lang))
            ->with('status', 'Language changed to ' . ($lang === 'en' ? 'English' : 'العربية'));
        
        // If we're on the homepage, redirect to the same page with the new language
        if (parse_url($previousUrl, PHP_URL_PATH) === '/') {
            $response = redirect($baseUrl)
                ->withCookie(cookie()->forever('locale', $lang))
                ->with('status', 'Language changed to ' . ($lang === 'en' ? 'English' : 'العربية'));
        }
        
        // Store the locale in the session
        Session::put('locale', $lang);
        
        return $response;
    }
}
