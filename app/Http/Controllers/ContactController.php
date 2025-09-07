<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        Log::info('Contact form submitted', $request->all());
        
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'message' => 'required|string',
            ]);

            Log::info('Validation passed', $validated);
            
            $submission = ContactSubmission::create($validated);
            Log::info('Submission created', ['id' => $submission->id]);

            return Redirect::route('contact')
                ->with('success', 'Your message has been sent successfully!');
                
        } catch (\Exception $e) {
            Log::error('Contact form submission failed: ' . $e->getMessage(), [
                'exception' => $e,
                'input' => $request->all()
            ]);
            
            return Redirect::route('contact')
                ->with('error', 'There was an error sending your message. Please try again.')
                ->withInput();
        }
    }
}
