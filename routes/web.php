<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\AboutController;
// use App\Http\Controllers\ContactInfoController;
use App\Http\Controllers\WelcomePageController;
use Illuminate\Support\Facades\Route;

// Language Switch Route
Route::get('language/{lang}', [\App\Http\Controllers\LanguageController::class, 'switchLang'])
    ->name('language.switch');

// Public Routes
Route::get('/', function () {
    $services = \App\Models\Service::active()->ordered()->take(3)->get();
    $about = \App\Models\About::first();
    return view('welcome', compact('services', 'about'));
})->name('home');

Route::get('/services', function () {
    return view('service');
})->name('services');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/portfolio', function () {
    return view('portfolio');
})->name('portfolio');

Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

// Authentication Routes
require __DIR__.'/auth.php';

// Dashboard Routes (Protected by auth and admin middleware)
// The 'verified' middleware is now applied at the route group level
Route::middleware(['auth', 'admin'])->group(function () {
    // Dashboard Home
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Contact Submissions
    Route::get('/contact-submissions', [DashboardController::class, 'contactSubmissions'])->name('contact-submissions');
    Route::get('/contact-submissions/{id}', [DashboardController::class, 'show'])->name('contact-submissions.show');
    Route::post('/contact-submissions/{id}/read', [DashboardController::class, 'markAsRead'])->name('contact-submissions.read');
    Route::post('/contact-submissions/{id}/archive', [DashboardController::class, 'archive'])->name('contact-submissions.archive');
    Route::delete('/contact-submissions/{id}', [DashboardController::class, 'deleteContactSubmission'])->name('contact-submissions.destroy');

    // About Page Routes
    // Route::get('/dashboard/about', [AboutController::class, 'edit'])->name('dashboard.about.edit');
    // Route::put('/dashboard/about', [AboutController::class, 'update'])->name('dashboard.about.update');
    
    // // Contact Info Routes
    // Route::get('/dashboard/contact-info', [ContactInfoController::class, 'edit'])->name('dashboard.contact-info.edit');
    // Route::put('/dashboard/contact-info', [ContactInfoController::class, 'update'])->name('dashboard.contact-info.update');
    
    // Welcome Page Editor Routes
    Route::get('/dashboard/welcome', [WelcomePageController::class, 'edit'])->name('dashboard.welcome.edit');
    Route::put('/dashboard/welcome', [WelcomePageController::class, 'update'])->name('dashboard.welcome.update');

    // Services Management
    Route::prefix('dashboard/services')->name('dashboard.services.')->group(function () {
        Route::get('/', [DashboardController::class, 'services'])->name('index');
        Route::get('/create', [DashboardController::class, 'createService'])->name('create');
        Route::post('/', [DashboardController::class, 'storeService'])->name('store');
        Route::get('/{service}/edit', [DashboardController::class, 'editService'])->name('edit');
        Route::put('/{service}', [DashboardController::class, 'updateService'])->name('update');
        Route::delete('/{service}', [DashboardController::class, 'deleteService'])->name('delete');
    });

    // Portfolio Management
    Route::prefix('dashboard/portfolio')->name('dashboard.portfolio.')->group(function () {
        Route::get('/', [DashboardController::class, 'portfolio'])->name('index');
        Route::get('/create', [DashboardController::class, 'createPortfolio'])->name('create');
        Route::post('/', [DashboardController::class, 'storePortfolio'])->name('store');
        Route::get('/{portfolio}/edit', [DashboardController::class, 'editPortfolio'])->name('edit');
        Route::put('/{portfolio}', [DashboardController::class, 'updatePortfolio'])->name('update');
        Route::delete('/{portfolio}', [DashboardController::class, 'deletePortfolio'])->name('delete');
    });

    // Testimonials Management
    Route::prefix('dashboard/testimonials')->name('dashboard.testimonials.')->group(function () {
        Route::get('/', [DashboardController::class, 'testimonials'])->name('index');
        Route::get('/create', [DashboardController::class, 'createTestimonial'])->name('create');
        Route::post('/', [DashboardController::class, 'storeTestimonial'])->name('store');
        Route::get('/{testimonial}/edit', [DashboardController::class, 'editTestimonial'])->name('edit');
        Route::put('/{testimonial}', [DashboardController::class, 'updateTestimonial'])->name('update');
        Route::delete('/{testimonial}', [DashboardController::class, 'deleteTestimonial'])->name('delete');
    });

    // Contact Information
    Route::prefix('dashboard/contact')->name('dashboard.contact.')->group(function () {
        Route::get('/', [DashboardController::class, 'contactInfo'])->name('edit');
        Route::put('/', [DashboardController::class, 'updateContactInfo'])->name('update');
    });

    // Welcome Page Content
    Route::prefix('dashboard/welcome')->name('dashboard.welcome.')->group(function () {
        Route::get('/', [DashboardController::class, 'welcomeContent'])->name('edit');
        Route::put('/', [DashboardController::class, 'updateWelcomeContent'])->name('update');
    });
});
