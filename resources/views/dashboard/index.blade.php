@extends('dashboard.layouts.new')

@section('title', __('Dashboard'))

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Welcome Header -->
    <div class="text-center py-12">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-4" data-aos="fade-up">
            {{ __('Welcome to Your Dashboard') }}
        </h1>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            {{ __('Manage your website content and settings efficiently') }}
        </p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 mb-12">
        <!-- Services Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg" data-aos="fade-up">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-yellow-50">
                        <svg class="h-8 w-8 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1h1.5a1.5 1.5 0 011.5 1.5v1.5H5V6.5A1.5 1.5 0 016.5 5H8V4h3zM5 10h14v8a2 2 0 01-2 2H7a2 2 0 01-2-2v-8z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ __('Services') }}</h3>
                        <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Service::count() }}</p>
                    </div>
                </div>
                <div class="mt-6">
                    <a href="{{ route('dashboard.services.index') }}" class="inline-flex items-center text-yellow-600 hover:text-yellow-800 font-medium">
                        {{ __('Manage Services') }}
                        <svg class="ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Portfolio Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg" data-aos="fade-up" data-aos-delay="100">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-yellow-50">
                        <svg class="h-8 w-8 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ __('Portfolio') }}</h3>
                        <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Portfolio::count() }}</p>
                    </div>
                </div>
                <div class="mt-6">
                    <a href="{{ route('dashboard.portfolio.index') }}" class="inline-flex items-center text-yellow-600 hover:text-yellow-800 font-medium">
                        {{ __('View Portfolio') }}
                        <svg class="ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Testimonials Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg" data-aos="fade-up" data-aos-delay="200">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-yellow-50">
                        <svg class="h-8 w-8 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ __('Testimonials') }}</h3>
                        <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Testimonial::count() }}</p>
                    </div>
                </div>
                <div class="mt-6">
                    <a href="{{ route('dashboard.testimonials.index') }}" class="inline-flex items-center text-yellow-600 hover:text-yellow-800 font-medium">
                        {{ __('View Testimonials') }}
                        <svg class="ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Messages Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg" data-aos="fade-up" data-aos-delay="300">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-yellow-50">
                        <svg class="h-8 w-8 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ __('Messages') }}</h3>
                        <p class="text-2xl font-bold text-gray-900">{{ \App\Models\ContactSubmission::count() }}</p>
                    </div>
                </div>
                <div class="mt-6">
                    <a href="{{ route('contact-submissions') }}" class="inline-flex items-center text-yellow-600 hover:text-yellow-800 font-medium">
                        {{ __('View Messages') }}
                        <svg class="ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8" data-aos="fade-up">
        <div class="p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-6">{{ __('Quick Actions') }}</h2>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <a href="{{ route('dashboard.services.create') }}" class="group p-4 border border-gray-200 rounded-lg hover:bg-yellow-50 transition-colors">
                    <div class="flex items-center">
                        <div class="p-2 bg-yellow-100 rounded-md text-yellow-600 group-hover:bg-yellow-200 transition-colors">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                        <span class="ml-3 font-medium text-gray-700">{{ __('Add New Service') }}</span>
                    </div>
                </a>
                <a href="{{ route('dashboard.portfolio.create') }}" class="group p-4 border border-gray-200 rounded-lg hover:bg-yellow-50 transition-colors">
                    <div class="flex items-center">
                        <div class="p-2 bg-yellow-100 rounded-md text-yellow-600 group-hover:bg-yellow-200 transition-colors">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                        <span class="ml-3 font-medium text-gray-700">{{ __('Add Portfolio Item') }}</span>
                    </div>
                </a>
                <a href="{{ route('dashboard.testimonials.create') }}" class="group p-4 border border-gray-200 rounded-lg hover:bg-yellow-50 transition-colors">
                    <div class="flex items-center">
                        <div class="p-2 bg-yellow-100 rounded-md text-yellow-600 group-hover:bg-yellow-200 transition-colors">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                        <span class="ml-3 font-medium text-gray-700">{{ __('Add Testimonial') }}</span>
                    </div>
                </a>
                <a href="{{ route('profile.edit') }}" class="group p-4 border border-gray-200 rounded-lg hover:bg-yellow-50 transition-colors">
                    <div class="flex items-center">
                        <div class="p-2 bg-yellow-100 rounded-md text-yellow-600 group-hover:bg-yellow-200 transition-colors">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <span class="ml-3 font-medium text-gray-700">{{ __('Update Profile') }}</span>
                    </div>
                </a>
            </div>
        </div>
    </div>

<!-- Welcome Page Management Section -->
<div class="bg-white rounded-xl shadow-md overflow-hidden mb-8" data-aos="fade-up" data-aos-delay="100">
    <div class="p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-xl font-bold text-gray-900">{{ __('Welcome Page Management') }}</h2>
                <p class="text-gray-600 mt-1">{{ __('Customize your website\'s welcome page content') }}</p>
            </div>
            <div class="p-3 bg-red-50 rounded-lg">
                <svg class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            </div>
        </div>
        
        <div class="bg-gradient-to-r from-red-50 to-pink-50 rounded-lg p-6 border border-red-100">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-red-900 mb-2">{{ __('Homepage Content') }}</h3>
                    <p class="text-red-700 mb-4">{{ __('Update headlines, descriptions, images, and other content displayed on your website\'s welcome page') }}</p>
                    <div class="flex items-center text-sm text-red-600">
                        <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ __('Changes will be reflected immediately on your live website') }}
                    </div>
                </div>
                <div class="ml-6">
                    <a href="{{ route('dashboard.welcome.edit') }}" class="inline-flex items-center px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors duration-200 shadow-md hover:shadow-lg">
                        <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        {{ __('Edit Welcome Page') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Initialize AOS -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    });
</script>
@endsection