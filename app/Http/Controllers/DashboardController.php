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
    
    public function contactSubmissions(Request $request)
    {
        $status = $request->query('status', 'all');
        
        // Get counts first - this ensures consistent counts across all statuses
        $counts = [
            'totalSubmissions' => ContactSubmission::count(),
            'newCount' => ContactSubmission::where('status', 'new')
                ->where('created_at', '>=', now()->subDay())
                ->count(),
            'readCount' => ContactSubmission::where('status', 'read')->count(),
            'archivedCount' => ContactSubmission::where('status', 'archived')->count()
        ];
        
        // Base query for submissions
        $query = ContactSubmission::query();
        
        // Apply status filter if not 'all'
        if ($status === 'new') {
            // Only show messages from the last 24 hours for 'new' status
            $query->where('status', 'new')
                  ->where('created_at', '>=', now()->subDay());
        } elseif ($status === 'read') {
            $query->where('status', 'read');
        } elseif ($status === 'archived') {
            $query->where('status', 'archived');
        }
        
        $submissions = $query->latest()->paginate(10);
        
        // Prepare response data
        $responseData = array_merge([
            'submissions' => $submissions,
            'currentStatus' => $status
        ], $counts);
        
        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json($responseData);
        }
        
        // Return view for regular requests
        return view('dashboard.contacts.index', $responseData);
    }
    
    public function markAsRead($id)
    {
        try {
            $submission = ContactSubmission::findOrFail($id);
            $submission->update([
                'status' => 'read',
                'read_at' => now()
            ]);
            
            return response()->json([
                'success' => true,
                'redirect' => url()->previous()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error marking as read: ' . $e->getMessage()
            ], 500);
        }
    }
    
    public function archive($id)
    {
        try {
            $submission = ContactSubmission::findOrFail($id);
            $submission->update([
                'status' => 'archived',
                'archived_at' => now()
            ]);
            
            return response()->json([
                'success' => true,
                'redirect' => url()->previous()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error archiving: ' . $e->getMessage()
            ], 500);
        }
    }

    public function deleteContactSubmission($id)
    {
        $submission = \App\Models\ContactSubmission::findOrFail($id);
        $submission->delete();
        
        $message = app()->getLocale() === 'ar' ? 'تم حذف التواصل بنجاح' : 'Contact submission deleted successfully';
        return redirect()->route('contact-submissions')
            ->with('success', $message);
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
                'title_en.required' => app()->getLocale() === 'ar' ? 'حقل العنوان بالإنجليزية مطلوب' : 'The English title field is required.',
                'title_en.max' => 'The English title may not be greater than 255 characters.',
                'title_ar.required' => app()->getLocale() === 'ar' ? 'حقل العنوان بالعربية مطلوب' : 'The Arabic title field is required.',
                'title_ar.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز العنوان بالعربية 255 حرفًا' : 'The Arabic title may not be greater than 255 characters.',
                'description_en.required' => app()->getLocale() === 'ar' ? 'حقل الوصف بالإنجليزية مطلوب' : 'The English description field is required.',
                'description_ar.required' => app()->getLocale() === 'ar' ? 'حقل الوصف بالعربية مطلوب' : 'The Arabic description field is required.',
                'icon.required' => app()->getLocale() === 'ar' ? 'حقل الأيقونة مطلوب' : 'The icon field is required.',
                'icon.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز اسم الأيقونة 1000 حرفًا' : 'The icon name may not be greater than 1000 characters.',
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
                'title_en.required' => app()->getLocale() === 'ar' ? 'حقل العنوان بالإنجليزية مطلوب' : 'The English title field is required.',
                'title_en.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز العنوان بالإنجليزية 255 حرفًا' : 'The English title may not be greater than 255 characters.',
                'title_ar.required' => app()->getLocale() === 'ar' ? 'حقل العنوان بالعربية مطلوب' : 'The Arabic title field is required.',
                'title_ar.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز العنوان بالعربية 255 حرفًا' : 'The Arabic title may not be greater than 255 characters.',
                'description_en.required' => app()->getLocale() === 'ar' ? 'حقل الوصف بالإنجليزية مطلوب' : 'The English description field is required.',
                'description_ar.required' => app()->getLocale() === 'ar' ? 'حقل الوصف بالعربية مطلوب' : 'The Arabic description field is required.',
                'icon.required' => app()->getLocale() === 'ar' ? 'حقل الأيقونة مطلوب' : 'The icon field is required.',
                'icon.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز اسم الأيقونة 1000 حرفًا' : 'The icon name may not be greater than 1000 characters.',
            ]
        );

        $service->update($validated);
        $message = app()->getLocale() === 'ar' ? 'تم تحديث الخدمة بنجاح!' : 'Service updated successfully!';
        return redirect()->route('dashboard.services.edit', $service)
            ->with('success', $message);
    }

    public function deleteService(Service $service)
    {
        $service->delete();
        $message = app()->getLocale() === 'ar' ? 'تم حذف الخدمة بنجاح' : 'Service deleted successfully';
        return back()->with('success', $message);
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
                'title_en.required' => app()->getLocale() === 'ar' ? 'حقل العنوان بالإنجليزية مطلوب' : 'The English title field is required.',
                'title_en.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز العنوان بالإنجليزية 255 حرفًا' : 'The English title may not be greater than 255 characters.',
                'title_ar.required' => app()->getLocale() === 'ar' ? 'حقل العنوان بالعربية مطلوب' : 'The Arabic title field is required.',
                'title_ar.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز العنوان بالعربية 255 حرفًا' : 'The Arabic title may not be greater than 255 characters.',
                'description_en.required' => app()->getLocale() === 'ar' ? 'حقل الوصف بالإنجليزية مطلوب' : 'The English description field is required.',
                'description_ar.required' => app()->getLocale() === 'ar' ? 'حقل الوصف بالعربية مطلوب' : 'The Arabic description field is required.',
                'image.required' => app()->getLocale() === 'ar' ? 'مطلوب صورة لعنصر المحفظة' : 'An image is required for the portfolio item.',
                'image.image' => app()->getLocale() === 'ar' ? 'يجب أن يكون الملف المرفوع صورة' : 'The uploaded file must be an image.',
                'image.max' => app()->getLocale() === 'ar' ? 'يجب أن لا يتجاوز حجم الصورة 5 ميجابايت' : 'The image size must not exceed 5MB.',
                'category.required' => app()->getLocale() === 'ar' ? 'حقل الفئة مطلوب' : 'The category field is required.',
                'category.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن تتجاوز الفئة 100 حرف' : 'The category may not be greater than 100 characters.',
            ]
        );

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('portfolio', 'public');
        }

        Portfolio::create($validated);
        $message = app()->getLocale() === 'ar' ? 'تمت إضافة عنصر المحفظة بنجاح!' : 'Portfolio item added successfully!';
        return redirect()->route('dashboard.portfolio.index')
            ->with('success', $message);
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
                'title_en.required' => app()->getLocale() === 'ar' ? 'حقل العنوان بالإنجليزية مطلوب' : 'The English title field is required.',
                'title_en.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز العنوان بالإنجليزية 255 حرفًا' : 'The English title may not be greater than 255 characters.',
                'title_ar.required' => app()->getLocale() === 'ar' ? 'حقل العنوان بالعربية مطلوب' : 'The Arabic title field is required.',
                'title_ar.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز العنوان بالعربية 255 حرفًا' : 'The Arabic title may not be greater than 255 characters.',
                'description_en.required' => app()->getLocale() === 'ar' ? 'حقل الوصف بالإنجليزية مطلوب' : 'The English description field is required.',
                'description_ar.required' => app()->getLocale() === 'ar' ? 'حقل الوصف بالعربية مطلوب' : 'The Arabic description field is required.',
                'image.image' => app()->getLocale() === 'ar' ? 'يجب أن يكون الملف المرفوع صورة' : 'The uploaded file must be an image.',
                'image.max' => app()->getLocale() === 'ar' ? 'يجب أن لا يتجاوز حجم الصورة 5 ميجابايت' : 'The image size must not exceed 5MB.',
                'category.required' => app()->getLocale() === 'ar' ? 'حقل الفئة مطلوب' : 'The category field is required.',
                'category.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن تتجاوز الفئة 100 حرف' : 'The category may not be greater than 100 characters.',
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
        $message = app()->getLocale() === 'ar' ? 'تم تحديث عنصر المحفظة بنجاح!' : 'Portfolio item updated successfully!';
        return redirect()->route('dashboard.portfolio.index')
            ->with('success', $message);
    }

    public function deletePortfolio(Portfolio $portfolio)
    {
        if ($portfolio->image) {
            Storage::disk('public')->delete($portfolio->image);
        }
        $portfolio->delete();
        $message = app()->getLocale() === 'ar' ? 'تم حذف عنصر المحفظة بنجاح' : 'Portfolio item deleted successfully';
        return back()->with('success', $message);
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
                'email.required' => app()->getLocale() === 'ar' ? 'حقل البريد الإلكتروني مطلوب' : 'The email address field is required.',
                'email.email' => app()->getLocale() === 'ar' ? 'الرجاء إدخال بريد إلكتروني صالح' : 'Please enter a valid email address.',
                'email.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز البريد الإلكتروني 255 حرفًا' : 'The email may not be greater than 255 characters.',
                'phone.required' => app()->getLocale() === 'ar' ? 'حقل رقم الهاتف مطلوب' : 'The phone number field is required.',
                'phone.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز رقم الهاتف 20 حرفًا' : 'The phone number may not be greater than 20 characters.',
                'address_en.required' => app()->getLocale() === 'ar' ? 'حقل العنوان بالإنجليزية مطلوب' : 'The English address field is required.',
                'address_en.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز العنوان بالإنجليزية 500 حرف' : 'The English address may not be greater than 500 characters.',
                'address_ar.required' => app()->getLocale() === 'ar' ? 'حقل العنوان بالعربية مطلوب' : 'The Arabic address field is required.',
                'address_ar.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز العنوان بالعربية 500 حرف' : 'The Arabic address may not be greater than 500 characters.',
                'facebook.url' => app()->getLocale() === 'ar' ? 'يجب أن يكون رابط فيسبوك صالحًا' : 'The Facebook URL must be a valid URL.',
                'facebook.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز رابط فيسبوك 255 حرفًا' : 'The Facebook URL may not be greater than 255 characters.',
                'twitter.url' => app()->getLocale() === 'ar' ? 'يجب أن يكون رابط تويتر صالحًا' : 'The Twitter URL must be a valid URL.',
                'twitter.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز رابط تويتر 255 حرفًا' : 'The Twitter URL may not be greater than 255 characters.',
                'instagram.url' => app()->getLocale() === 'ar' ? 'يجب أن يكون رابط إنستجرام صالحًا' : 'The Instagram URL must be a valid URL.',
                'instagram.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز رابط إنستجرام 255 حرفًا' : 'The Instagram URL may not be greater than 255 characters.',
                'linkedin.url' => app()->getLocale() === 'ar' ? 'يجب أن يكون رابط لينكد إن صالحًا' : 'The LinkedIn URL must be a valid URL.',
                'linkedin.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز رابط لينكد إن 255 حرفًا' : 'The LinkedIn URL may not be greater than 255 characters.',
            ]
        );

        $contactInfo = ContactInfo::firstOrNew();
        $contactInfo->fill($validated);
        $contactInfo->save();

        $message = app()->getLocale() === 'ar' ? 'تم تحديث معلومات الاتصال بنجاح!' : 'Contact information updated successfully!';
        return back()->with('success', $message);
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
            'title_en.required' => app()->getLocale() === 'ar' ? 'حقل العنوان بالإنجليزية مطلوب' : 'The English title field is required.',
            'title_ar.required' => app()->getLocale() === 'ar' ? 'حقل العنوان بالعربية مطلوب' : 'The Arabic title field is required.',
            'description_en.required' => app()->getLocale() === 'ar' ? 'حقل الوصف بالإنجليزية مطلوب' : 'The English description field is required.',
            'description_ar.required' => app()->getLocale() === 'ar' ? 'حقل الوصف بالعربية مطلوب' : 'The Arabic description field is required.',
            'image.image' => app()->getLocale() === 'ar' ? 'يجب أن يكون الصورة ملفًا صورة' : 'The image must be an image file.',
            'image.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز حجم الصورة 5 ميجابايت' : 'The image size must not exceed 5MB.',
            'cta_text_en.required' => app()->getLocale() === 'ar' ? 'حقل النص CTA بالإنجليزية مطلوب' : 'The English CTA text field is required.',
            'cta_text_en.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز النص CTA بالإنجليزية 100 حرفًا' : 'The English CTA text may not be greater than 100 characters.',
            'cta_text_ar.required' => app()->getLocale() === 'ar' ? 'حقل النص CTA بالعربية مطلوب' : 'The Arabic CTA text field is required.',
            'cta_text_ar.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز النص CTA بالعربية 100 حرفًا' : 'The Arabic CTA text may not be greater than 100 characters.',
            'cta_link.required' => app()->getLocale() === 'ar' ? 'حقل رابط CTA مطلوب' : 'The CTA link field is required.',
            'cta_link.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز رابط CTA 255 حرفًا' : 'The CTA link may not be greater than 255 characters.',
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
                'name_en.required' => app()->getLocale() === 'ar' ? 'حقل الاسم بالإنجليزية مطلوب' : 'The English name field is required.',
                'name_en.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز الاسم بالإنجليزية 255 حرفًا' : 'The English name may not be greater than 255 characters.',
                'name_ar.required' => app()->getLocale() === 'ar' ? 'حقل الاسم بالعربية مطلوب' : 'The Arabic name field is required.',
                'name_ar.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز الاسم بالعربية 255 حرفًا' : 'The Arabic name may not be greater than 255 characters.',
                'position_en.required' => app()->getLocale() === 'ar' ? 'حقل المنصب بالإنجليزية مطلوب' : 'The English position field is required.',
                'position_en.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز المنصب بالإنجليزية 255 حرفًا' : 'The English position may not be greater than 255 characters.',
                'position_ar.required' => app()->getLocale() === 'ar' ? 'حقل المنصب بالعربية مطلوب' : 'The Arabic position field is required.',
                'position_ar.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز المنصب بالعربية 255 حرفًا' : 'The Arabic position may not be greater than 255 characters.',
                'content_en.required' => app()->getLocale() === 'ar' ? 'حقل محتوى الشهادة بالإنجليزية مطلوب' : 'The English testimonial content is required.',
                'content_ar.required' => app()->getLocale() === 'ar' ? 'حقل محتوى الشهادة بالعربية مطلوب' : 'The Arabic testimonial content is required.',
                'rating.required' => app()->getLocale() === 'ar' ? 'حقل التقييم مطلوب' : 'The rating field is required.',
                'rating.integer' => app()->getLocale() === 'ar' ? 'يجب أن يكون التقييم رقمًا' : 'The rating must be a number.',
                'rating.min' => app()->getLocale() === 'ar' ? 'يجب أن يكون التقييم على الأقل 1 نجمة' : 'The rating must be at least 1 star.',
                'rating.max' => app()->getLocale() === 'ar' ? 'يجب أن لا يتجاوز التقييم 5 نجوم' : 'The rating may not be greater than 5 stars.',
                'image.image' => app()->getLocale() === 'ar' ? 'يجب أن يكون الملف المرفوع صورة' : 'The uploaded file must be an image.',
                'image.max' => app()->getLocale() === 'ar' ? 'يجب أن لا يتجاوز حجم الصورة 2 ميجابايت' : 'The image size must not exceed 2MB.',
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
                'name_en.required' => app()->getLocale() === 'ar' ? 'حقل الاسم بالإنجليزية مطلوب' : 'The English name field is required.',
                'name_en.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز الاسم بالإنجليزية 255 حرفًا' : 'The English name may not be greater than 255 characters.',
                'name_ar.required' => app()->getLocale() === 'ar' ? 'حقل الاسم بالعربية مطلوب' : 'The Arabic name field is required.',
                'name_ar.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز الاسم بالعربية 255 حرفًا' : 'The Arabic name may not be greater than 255 characters.',
                'position_en.required' => app()->getLocale() === 'ar' ? 'حقل المنصب بالإنجليزية مطلوب' : 'The English position field is required.',
                'position_en.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز المنصب بالإنجليزية 255 حرفًا' : 'The English position may not be greater than 255 characters.',
                'position_ar.required' => app()->getLocale() === 'ar' ? 'حقل المنصب بالعربية مطلوب' : 'The Arabic position field is required.',
                'position_ar.max' => app()->getLocale() === 'ar' ? 'لا يمكن أن يتجاوز المنصب بالعربية 255 حرفًا' : 'The Arabic position may not be greater than 255 characters.',
                'content_en.required' => app()->getLocale() === 'ar' ? 'حقل محتوى الشهادة بالإنجليزية مطلوب' : 'The English testimonial content is required.',
                'content_ar.required' => app()->getLocale() === 'ar' ? 'حقل محتوى الشهادة بالعربية مطلوب' : 'The Arabic testimonial content is required.',
                'rating.required' => app()->getLocale() === 'ar' ? 'حقل التقييم مطلوب' : 'The rating field is required.',
                'rating.integer' => app()->getLocale() === 'ar' ? 'يجب أن يكون التقييم رقمًا' : 'The rating must be a number.',
                'rating.min' => app()->getLocale() === 'ar' ? 'يجب أن يكون التقييم على الأقل 1 نجمة' : 'The rating must be at least 1 star.',
                'rating.max' => app()->getLocale() === 'ar' ? 'يجب أن لا يتجاوز التقييم 5 نجوم' : 'The rating may not be greater than 5 stars.',
                'image.image' => app()->getLocale() === 'ar' ? 'يجب أن يكون الملف المرفوع صورة' : 'The uploaded file must be an image.',
                'image.max' => app()->getLocale() === 'ar' ? 'يجب أن لا يتجاوز حجم الصورة 2 ميجابايت' : 'The image size must not exceed 2MB.',
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
            ->with('success', app()->getLocale() === 'ar' ? 'تم تحديث الشهادة بنجاح!' : 'Testimonial updated successfully!');
    }

    public function deleteTestimonial(Testimonial $testimonial)
    {
        if ($testimonial->image) {
            Storage::disk('public')->delete($testimonial->image);
        }
        $testimonial->delete();
        return redirect()->route('dashboard.testimonials.index')
                         ->with('success', app()->getLocale() === 'ar' ? 'تم حذف الشهادة بنجاح!' : 'Testimonial deleted successfully!');
    }
}
