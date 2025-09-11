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
    /**
     * The application instance.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function __construct(\Illuminate\Contracts\Foundation\Application $app)
    {
        $this->app = $app;
    }
    public function switchLang($lang)
    {
        // Validate the language
        if (!in_array($lang, ['en', 'ar'])) {
            return redirect()->back()->with('error', 'Invalid language selected');
        }
        
        // Set the locale in the session
        session(['locale' => $lang]);
        
        // Set the cookie for future requests
        return redirect()->back()
            ->withCookie(cookie()->forever('locale', $lang))
            ->with('status', 'Language changed successfully');
    }
}
