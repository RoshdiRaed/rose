<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        try {
            $user = $request->authenticate();
            
            // Check if user is verified
            if (!$user->is_verified) {
                Auth::logout();
                return redirect()->route('login')
                    ->withErrors(['email' => 'Please verify your email address before logging in.']);
            }
            
            $request->session()->regenerate();
            
            // Redirect to the intended URL or dashboard
            return redirect()->intended(route('dashboard'));
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
