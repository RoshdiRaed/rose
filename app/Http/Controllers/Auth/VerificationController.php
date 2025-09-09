<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\EmailVerificationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class VerificationController extends Controller
{
    /**
     * Show the verification form
     */
    public function show()
    {
        if (Auth::check() && Auth::user()->is_verified) {
            return redirect()->route('dashboard');
        }
        
        return view('auth.verify');
    }

    /**
     * Handle the verification code submission
     */
    public function verify(Request $request)
    {
        $request->validate([
            'verification_code' => 'required|digits:6'
        ]);

        $user = Auth::user();

        // Check if the code matches and is not expired (15 minutes)
        if ($user->verification_code === $request->verification_code && 
            $user->verification_code_sent_at->addMinutes(15)->isFuture()) {
            
            // Check if this is the first user and make them admin if not already
            if (User::count() === 1) {
                $user->update([
                    'is_verified' => true,
                    'is_admin' => true,
                    'verification_code' => null,
                    'verification_code_sent_at' => null
                ]);
            } else {
                $user->update([
                    'is_verified' => true,
                    'verification_code' => null,
                    'verification_code_sent_at' => null
                ]);
            }

            return redirect()->route('dashboard')
                ->with('status', 'Email verified successfully!');
        }

        return back()->withErrors([
            'verification_code' => 'The verification code is invalid or has expired.'
        ]);
    }

    /**
     * Resend the verification code
     */
    public function resend()
    {
        $user = Auth::user();
        
        // Generate new verification code
        $verificationCode = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        
        $user->update([
            'verification_code' => $verificationCode,
            'verification_code_sent_at' => now()
        ]);

        // Send verification email
        $user->notify(new EmailVerificationNotification($verificationCode));

        return back()->with('status', 'A new verification code has been sent to your email.');
    }
}
