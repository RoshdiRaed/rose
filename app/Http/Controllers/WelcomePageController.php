<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WelcomePageController extends Controller
{
    /**
     * Show the form for editing the welcome page content.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $settings = [
            'welcome_heading_en' => Setting::get('welcome_heading_en'),
            'welcome_heading_ar' => Setting::get('welcome_heading_ar'),
            'welcome_subheading_en' => Setting::get('welcome_subheading_en'),
            'welcome_subheading_ar' => Setting::get('welcome_subheading_ar'),
            'welcome_description_en' => Setting::get('welcome_description_en'),
            'welcome_description_ar' => Setting::get('welcome_description_ar'),
            'welcome_button_text_en' => Setting::get('welcome_button_text_en'),
            'welcome_button_text_ar' => Setting::get('welcome_button_text_ar'),
            'welcome_button_url' => Setting::get('welcome_button_url'),
            'welcome_background' => Setting::get('welcome_background'),
            'welcome_video_url' => Setting::get('welcome_video_url'),
        ];

        return view('dashboard.welcome.edit', compact('settings'));
    }

    /**
     * Update the welcome page content.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'welcome_heading_en' => 'required|string|max:255',
            'welcome_heading_ar' => 'required|string|max:255',
            'welcome_subheading_en' => 'required|string|max:255',
            'welcome_subheading_ar' => 'required|string|max:255',
            'welcome_description_en' => 'required|string',
            'welcome_description_ar' => 'required|string',
            'welcome_button_text_en' => 'required|string|max:50',
            'welcome_button_text_ar' => 'required|string|max:50',
            'welcome_button_url' => 'required|url|max:255',
            'welcome_background' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120', // 5MB max
            'welcome_video_url' => 'nullable|url|max:255',
        ]);

        // Handle file upload
        if ($request->hasFile('welcome_background')) {
            // Delete old background if exists
            $oldBackground = Setting::get('welcome_background');
            if ($oldBackground && Storage::disk('public')->exists($oldBackground)) {
                Storage::disk('public')->delete($oldBackground);
            }
            
            $path = $request->file('welcome_background')->store('welcome', 'public');
            $data['welcome_background'] = $path;
        } else {
            unset($data['welcome_background']);
        }

        // Save settings
        foreach ($data as $key => $value) {
            Setting::set($key, $value);
        }

        return redirect()->route('dashboard.welcome.edit')
            ->with('success', 'Welcome page content updated successfully.');
    }
}
