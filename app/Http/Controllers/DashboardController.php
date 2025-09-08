<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Portfolio;
use App\Models\ContactInfo;
use App\Models\ContactSubmission;
use App\Models\About;
use App\Models\Testimonial;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Contact Submissions
    public function show($id)
    {
        $submission = ContactSubmission::findOrFail($id);
        return response()->json($submission);
    }
    
    public function contactSubmissions()
    {
        $submissions = ContactSubmission::latest()->paginate(10);
        
        // Get counts for each status
        $totalSubmissions = ContactSubmission::count();
        $newCount = ContactSubmission::where('status', 'new')->count();
        $readCount = ContactSubmission::where('status', 'read')->count();
        $archivedCount = ContactSubmission::where('status', 'archived')->count();
        
        return view('dashboard.contacts.index', [
            'submissions' => $submissions,
            'totalSubmissions' => $totalSubmissions,
            'newCount' => $newCount,
            'readCount' => $readCount,
            'archivedCount' => $archivedCount
        ]);
    }
    
    public function markAsRead($id)
    {
        $submission = ContactSubmission::findOrFail($id);
        $submission->update(['status' => 'read']);
        
        return response()->json(['success' => true]);
    }
    
    public function archive($id)
    {
        $submission = ContactSubmission::findOrFail($id);
        $submission->update(['status' => 'archived']);
        
        return response()->json(['success' => true]);
    }

    public function deleteContactSubmission($id)
    {
        $submission = \App\Models\ContactSubmission::findOrFail($id);
        $submission->delete();
        
        return redirect()->route('contact-submissions')
            ->with('success', 'Contact submission deleted successfully');
    }

    // Dashboard home
    public function index()
    {
        $stats = [
            'services' => Service::count(),
            'portfolio' => Portfolio::count(),
            'testimonials' => Testimonial::count(),
        ];
        
        return view('dashboard.index', compact('stats'));
    }

    // Services Management
    public function services()
    {
        $services = Service::latest()->paginate(10);
        return view('dashboard.services.index', compact('services'));
    }

    public function createService()
    {
        return view('dashboard.services.create');
    }

    public function storeService(Request $request)
    {
        $validated = $request->validate(
            [
                'title_en' => 'required|string|max:255',
                'title_ar' => 'required|string|max:255',
                'description_en' => 'required|string',
                'description_ar' => 'required|string',
                'icon' => 'required|string|max:1000',
            ],
            [
                'title_en.required' => 'The English title field is required.',
                'title_en.max' => 'The English title may not be greater than 255 characters.',
                'title_ar.required' => 'The Arabic title field is required.',
                'title_ar.max' => 'The Arabic title may not be greater than 255 characters.',
                'description_en.required' => 'The English description field is required.',
                'description_ar.required' => 'The Arabic description field is required.',
                'icon.required' => 'The icon field is required.',
                'icon.max' => 'The icon name may not be greater than 1000 characters.',
            ]
        );

        Service::create($validated);
        return redirect()->route('dashboard.services')
            ->with('success', 'Service created successfully!');
    }

    public function editService(Service $service)
    {
        return view('dashboard.services.edit', compact('service'));
    }

    public function updateService(Request $request, Service $service)
    {
        $validated = $request->validate(
            [
                'title_en' => 'required|string|max:255',
                'title_ar' => 'required|string|max:255',
                'description_en' => 'required|string',
                'description_ar' => 'required|string',
                'icon' => 'required|string|max:1000',
            ],
            [
                'title_en.required' => 'The English title field is required.',
                'title_en.max' => 'The English title may not be greater than 255 characters.',
                'title_ar.required' => 'The Arabic title field is required.',
                'title_ar.max' => 'The Arabic title may not be greater than 255 characters.',
                'description_en.required' => 'The English description field is required.',
                'description_ar.required' => 'The Arabic description field is required.',
                'icon.required' => 'The icon field is required.',
                'icon.max' => 'The icon name may not be greater than 1000 characters.',
            ]
        );

        $service->update($validated);
        return redirect()->route('dashboard.services.edit', $service)
            ->with('success', 'Service updated successfully!');
    }

    public function deleteService(Service $service)
    {
        $service->delete();
        return back()->with('success', 'Service deleted successfully');
    }

    // Portfolio Management
    public function portfolio()
    {
        $portfolios = Portfolio::latest()->paginate(10);
        return view('dashboard.portfolio.index', compact('portfolios'));
    }

    public function createPortfolio()
    {
        return view('dashboard.portfolio.create');
    }

    public function storePortfolio(Request $request)
    {
        $validated = $request->validate(
            [
                'title_en' => 'required|string|max:255',
                'title_ar' => 'required|string|max:255',
                'description_en' => 'required|string',
                'description_ar' => 'required|string',
                'image' => 'required|image|max:5120',
                'category' => 'required|string|max:100',
            ],
            [
                'title_en.required' => 'The English title field is required.',
                'title_en.max' => 'The English title may not be greater than 255 characters.',
                'title_ar.required' => 'The Arabic title field is required.',
                'title_ar.max' => 'The Arabic title may not be greater than 255 characters.',
                'description_en.required' => 'The English description field is required.',
                'description_ar.required' => 'The Arabic description field is required.',
                'image.required' => 'An image is required for the portfolio item.',
                'image.image' => 'The uploaded file must be an image.',
                'image.max' => 'The image size must not exceed 5MB.',
                'category.required' => 'The category field is required.',
                'category.max' => 'The category may not be greater than 100 characters.',
            ]
        );

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('portfolio', 'public');
        }

        Portfolio::create($validated);
        return redirect()->route('dashboard.portfolio.index')
            ->with('success', 'Portfolio item added successfully!');
    }

    public function editPortfolio(Portfolio $portfolio)
    {
        return view('dashboard.portfolio.edit', compact('portfolio'));
    }

    public function updatePortfolio(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate(
            [
                'title_en' => 'required|string|max:255',
                'title_ar' => 'required|string|max:255',
                'description_en' => 'required|string',
                'description_ar' => 'required|string',
                'image' => 'nullable|image|max:5120',
                'category' => 'required|string|max:100',
            ],
            [
                'title_en.required' => 'The English title field is required.',
                'title_en.max' => 'The English title may not be greater than 255 characters.',
                'title_ar.required' => 'The Arabic title field is required.',
                'title_ar.max' => 'The Arabic title may not be greater than 255 characters.',
                'description_en.required' => 'The English description field is required.',
                'description_ar.required' => 'The Arabic description field is required.',
                'image.image' => 'The uploaded file must be an image.',
                'image.max' => 'The image size must not exceed 5MB.',
                'category.required' => 'The category field is required.',
                'category.max' => 'The category may not be greater than 100 characters.',
            ]
        );

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($portfolio->image) {
                Storage::disk('public')->delete($portfolio->image);
            }
            $validated['image'] = $request->file('image')->store('portfolio', 'public');
        }

        $portfolio->update($validated);
        return redirect()->route('dashboard.portfolio.index')
            ->with('success', 'Portfolio item updated successfully!');
    }

    public function deletePortfolio(Portfolio $portfolio)
    {
        if ($portfolio->image) {
            Storage::disk('public')->delete($portfolio->image);
        }
        $portfolio->delete();
        return back()->with('success', 'Portfolio item deleted successfully');
    }

    // Contact Info Management
    public function contactInfo()
    {
        $contactInfo = ContactInfo::firstOrNew();
        return view('dashboard.contact.edit', compact('contactInfo'));
    }

    public function updateContactInfo(Request $request)
    {
        $validated = $request->validate(
            [
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'address_en' => 'required|string|max:500',
                'address_ar' => 'required|string|max:500',
                'map_embed' => 'nullable|string',
                'facebook' => 'nullable|url|max:255',
                'twitter' => 'nullable|url|max:255',
                'instagram' => 'nullable|url|max:255',
                'linkedin' => 'nullable|url|max:255',
            ],
            [
                'email.required' => 'The email address field is required.',
                'email.email' => 'Please enter a valid email address.',
                'email.max' => 'The email may not be greater than 255 characters.',
                'phone.required' => 'The phone number field is required.',
                'phone.max' => 'The phone number may not be greater than 20 characters.',
                'address_en.required' => 'The English address field is required.',
                'address_en.max' => 'The English address may not be greater than 500 characters.',
                'address_ar.required' => 'The Arabic address field is required.',
                'address_ar.max' => 'The Arabic address may not be greater than 500 characters.',
                'facebook.url' => 'The Facebook URL must be a valid URL.',
                'facebook.max' => 'The Facebook URL may not be greater than 255 characters.',
                'twitter.url' => 'The Twitter URL must be a valid URL.',
                'twitter.max' => 'The Twitter URL may not be greater than 255 characters.',
                'instagram.url' => 'The Instagram URL must be a valid URL.',
                'instagram.max' => 'The Instagram URL may not be greater than 255 characters.',
                'linkedin.url' => 'The LinkedIn URL must be a valid URL.',
                'linkedin.max' => 'The LinkedIn URL may not be greater than 255 characters.',
            ]
        );

        $contactInfo = ContactInfo::firstOrNew();
        $contactInfo->fill($validated);
        $contactInfo->save();

        return back()->with('success', 'Contact information updated successfully!');
    }

    // Welcome Page Content Management
    public function welcomeContent()
    {
        $about = About::firstOrNew();
        return view('dashboard.welcome.edit', compact('about'));
    }

    public function updateWelcomeContent(Request $request)
    {
        $validated = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'image' => 'nullable|image|max:5120',
            'cta_text_en' => 'required|string|max:100',
            'cta_text_ar' => 'required|string|max:100',
            'cta_link' => 'required|string|max:255',
        ], [
            'title_en.required' => 'The English title field is required.',
            'title_ar.required' => 'The Arabic title field is required.',
            'description_en.required' => 'The English description field is required.',
            'description_ar.required' => 'The Arabic description field is required.',
            'image.image' => 'The image must be an image file.',
            'image.max' => 'The image size must not exceed 5MB.',
            'cta_text_en.required' => 'The English CTA text field is required.',
            'cta_text_en.max' => 'The English CTA text may not be greater than 100 characters.',
            'cta_text_ar.required' => 'The Arabic CTA text field is required.',
            'cta_text_ar.max' => 'The Arabic CTA text may not be greater than 100 characters.',
            'cta_link.required' => 'The CTA link field is required.',
            'cta_link.max' => 'The CTA link may not be greater than 255 characters.',
        ]);

        $about = About::firstOrNew();
        
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($about->image) {
                Storage::disk('public')->delete($about->image);
            }
            $validated['image'] = $request->file('image')->store('about', 'public');
        }

        $about->fill($validated);
        $about->save();

        return back()->with('success', 'Welcome page content updated successfully!');
    }

    // Testimonials Management
    public function testimonials()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('dashboard.testimonials.index', compact('testimonials'));
    }

    public function createTestimonial()
    {
        return view('dashboard.testimonials.create');
    }

    public function storeTestimonial(Request $request)
    {
        $validated = $request->validate(
            [
                'name_en' => 'required|string|max:255',
                'name_ar' => 'required|string|max:255',
                'position_en' => 'required|string|max:255',
                'position_ar' => 'required|string|max:255',
                'content_en' => 'required|string',
                'content_ar' => 'required|string',
                'rating' => 'required|integer|min:1|max:5',
                'image' => 'nullable|image|max:2048',
            ],
            [
                'name_en.required' => 'The English name field is required.',
                'name_en.max' => 'The English name may not be greater than 255 characters.',
                'name_ar.required' => 'The Arabic name field is required.',
                'name_ar.max' => 'The Arabic name may not be greater than 255 characters.',
                'position_en.required' => 'The English position field is required.',
                'position_en.max' => 'The English position may not be greater than 255 characters.',
                'position_ar.required' => 'The Arabic position field is required.',
                'position_ar.max' => 'The Arabic position may not be greater than 255 characters.',
                'content_en.required' => 'The English testimonial content is required.',
                'content_ar.required' => 'The Arabic testimonial content is required.',
                'rating.required' => 'The rating field is required.',
                'rating.integer' => 'The rating must be a number.',
                'rating.min' => 'The rating must be at least 1 star.',
                'rating.max' => 'The rating may not be greater than 5 stars.',
                'image.image' => 'The uploaded file must be an image.',
                'image.max' => 'The image size must not exceed 2MB.',
            ]
        );

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('testimonials', 'public');
        }

        Testimonial::create($validated);
        return redirect()->route('dashboard.testimonials.index')
            ->with('success', 'Testimonial added successfully!');
    }

    public function editTestimonial(Testimonial $testimonial)
    {
        return view('dashboard.testimonials.edit', compact('testimonial'));
    }

    public function updateTestimonial(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate(
            [
                'name_en' => 'required|string|max:255',
                'name_ar' => 'required|string|max:255',
                'position_en' => 'required|string|max:255',
                'position_ar' => 'required|string|max:255',
                'content_en' => 'required|string',
                'content_ar' => 'required|string',
                'rating' => 'required|integer|min:1|max:5',
                'image' => 'nullable|image|max:2048',
            ],
            [
                'name_en.required' => 'The English name field is required.',
                'name_en.max' => 'The English name may not be greater than 255 characters.',
                'name_ar.required' => 'The Arabic name field is required.',
                'name_ar.max' => 'The Arabic name may not be greater than 255 characters.',
                'position_en.required' => 'The English position field is required.',
                'position_en.max' => 'The English position may not be greater than 255 characters.',
                'position_ar.required' => 'The Arabic position field is required.',
                'position_ar.max' => 'The Arabic position may not be greater than 255 characters.',
                'content_en.required' => 'The English testimonial content is required.',
                'content_ar.required' => 'The Arabic testimonial content is required.',
                'rating.required' => 'The rating field is required.',
                'rating.integer' => 'The rating must be a number.',
                'rating.min' => 'The rating must be at least 1 star.',
                'rating.max' => 'The rating may not be greater than 5 stars.',
                'image.image' => 'The uploaded file must be an image.',
                'image.max' => 'The image size must not exceed 2MB.',
            ]
        );

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($testimonial->image) {
                Storage::disk('public')->delete($testimonial->image);
            }
            $validated['image'] = $request->file('image')->store('testimonials', 'public');
        }

        $testimonial->update($validated);
        return redirect()->route('dashboard.testimonials.index')
            ->with('success', 'Testimonial updated successfully!');
    }

    public function deleteTestimonial(Testimonial $testimonial)
    {
        if ($testimonial->image) {
            Storage::disk('public')->delete($testimonial->image);
        }
        $testimonial->delete();
        return back()->with('success', 'Testimonial deleted successfully');
    }
}
