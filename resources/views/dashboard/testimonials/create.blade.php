@extends('dashboard.layouts.new')

@section('title', __('Add New Testimonial'))

@push('styles')
    <style>
        /* General Styles */
        body {
            font-family: 'Inter', 'IBM Plex Sans Arabic', sans-serif;
        }

        /* Improved form container */
        .form-container {
            background: linear-gradient(145deg, #ffffff, #f8fafc);
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            padding: 2rem;
        }

        /* Input and textarea styles */
        input,
        textarea {
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input:focus,
        textarea:focus {
            border-color: #f59e0b;
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.1);
        }

        /* Rating Stars */
        .rating-stars {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .rating-stars input[type="radio"] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .rating-stars label {
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .rating-stars label:hover {
            transform: scale(1.2);
        }

        .rating-stars svg {
            width: 1.75rem;
            height: 1.75rem;
            fill: #d1d5db;
            transition: fill 0.2s ease;
        }

        .rating-stars input:checked+label svg {
            fill: #eab308;
        }

        .rating-stars label:hover svg {
            fill: #facc15;
        }

        /* Image Upload */
        .image-upload-container {
            border: 2px dashed #d1d5db;
            border-radius: 0.75rem;
            padding: 1.5rem;
            background: #f9fafb;
            transition: all 0.3s ease;
        }

        .image-upload-container:hover,
        .image-upload-container.dragover {
            border-color: #f59e0b;
            background: #fefce8;
            transform: translateY(-2px);
        }

        #previewImg {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .image-upload-container:hover #upload-prompt {
            animation: pulse 1.5s infinite;
        }

        /* RTL Adjustments */
        [dir="rtl"] {
            font-family: 'IBM Plex Sans Arabic', sans-serif;
        }

        [dir="rtl"] .text-left {
            text-align: right;
        }

        [dir="rtl"] .text-right {
            text-align: left;
        }

        [dir="rtl"] .text-center {
            text-align: center;
        }

        [dir="rtl"] .flex {
            direction: rtl;
        }

        [dir="rtl"] .justify-end {
            justify-content: flex-start;
        }

        [dir="rtl"] .space-x-4> :not(:first-child) {
            margin-left: 0;
            margin-right: 1rem;
        }

        [dir="rtl"] .space-x-2> :not(:first-child) {
            margin-left: 0;
            margin-right: 0.5rem;
        }

        [dir="rtl"] .ml-3 {
            margin-left: 0;
            margin-right: 0.75rem;
        }

        [dir="rtl"] .ml-4 {
            margin-left: 0;
            margin-right: 1rem;
        }

        [dir="rtl"] .mr-2 {
            margin-right: 0;
            margin-left: 0.5rem;
        }

        [dir="rtl"] .-ml-1 {
            margin-left: 0;
            margin-right: -0.25rem;
        }

        [dir="rtl"] .mr-1 {
            margin-right: 0;
            margin-left: 0.25rem;
        }

        [dir="rtl"] .mr-1\.5 {
            margin-right: 0;
            margin-left: 0.375rem;
        }

        [dir="rtl"] .image-upload-section {
            flex-direction: row-reverse;
            gap: 1rem;
        }

        [dir="rtl"] .image-upload-section .image-upload-container {
            order: 1;
        }

        [dir="rtl"] .image-upload-section .label-container {
            order: 2;
        }
    </style>
@endpush

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <!-- Page Header -->
        <div class="md:flex md:items-center md:justify-between mb-8">
            <div class="flex-1 min-w-0">
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">
                    {{ __('Add New Testimonial') }}
                </h2>
                <nav class="flex mt-2" aria-label="{{ __('Breadcrumb') }}">
                    <ol class="flex items-center space-x-4 {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : '' }}">
                        <li>
                            <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-gray-700">
                                <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                </svg>
                                <span class="sr-only">{{ __('Home') }}</span>
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <a href="{{ route('dashboard.testimonials.index') }}"
                                    class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700 {{ app()->getLocale() === 'ar' ? 'mr-4' : '' }}">
                                    {{ __('Testimonials') }}
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span
                                    class="ml-4 text-sm font-medium text-gray-500 {{ app()->getLocale() === 'ar' ? 'mr-4' : '' }}">
                                    {{ __('Add New') }}
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4 {{ app()->getLocale() === 'ar' ? 'md:mr-4' : '' }}">
                <a href="{{ route('dashboard.testimonials.index') }}"
                    class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors duration-200">
                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500 {{ app()->getLocale() === 'ar' ? '-mr-1 ml-2' : '' }}"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ __('Back to Testimonials') }}
                </a>
            </div>
        </div>

        <!-- Form -->
        <div class="form-container">
            <form action="{{ route('dashboard.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-10">
                    <div>
                        <div class="grid grid-cols-1 gap-y-8 gap-x-6 sm:grid-cols-2">
                            <!-- English Section -->
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ __('English Version') }}</h3>
                                <div class="space-y-6">
                                    <div>
                                        <label for="name_en" class="block text-sm font-medium text-gray-700">
                                            {{ __('Name') }} <span class="text-red-500">*</span>
                                        </label>
                                        <div class="mt-1.5">
                                            <input type="text" name="name_en" id="name_en" autocomplete="off"
                                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm transition-all duration-200 @error('name_en') border-red-300 @enderror"
                                                value="{{ old('name_en') }}" required aria-label="{{ __('Name') }}">
                                            @error('name_en')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <label for="position_en" class="block text-sm font-medium text-gray-700">
                                            {{ __('Position') }} <span class="text-red-500">*</span>
                                        </label>
                                        <div class="mt-1.5">
                                            <input type="text" name="position_en" id="position_en" autocomplete="off"
                                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm transition-all duration-200 @error('position_en') border-red-300 @enderror"
                                                value="{{ old('position_en') }}" required
                                                aria-label="{{ __('Position') }}">
                                            @error('position_en')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <label for="content_en" class="block text-sm font-medium text-gray-700">
                                            {{ __('Testimonial') }} <span class="text-red-500">*</span>
                                        </label>
                                        <div class="mt-1.5">
                                            <textarea id="content_en" name="content_en" rows="4"
                                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm transition-all duration-200 @error('content_en') border-red-300 @enderror"
                                                required aria-label="{{ __('Testimonial') }}">{{ old('content_en') }}</textarea>
                                            @error('content_en')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Arabic Section -->
                            <div dir="rtl">
                                <h3 class="text-xl font-semibold text-gray-900 mb-4 text-right">{{ __('Arabic Version') }}
                                </h3>
                                <div class="space-y-6">
                                    <div>
                                        <label for="name_ar" class="block text-sm font-medium text-gray-700 text-right">
                                            {{ __('Name') }} <span class="text-red-500">*</span>
                                        </label>
                                        <div class="mt-1.5">
                                            <input type="text" name="name_ar" id="name_ar" autocomplete="off"
                                                dir="rtl"
                                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm text-right transition-all duration-200 @error('name_ar') border-red-300 @enderror"
                                                value="{{ old('name_ar') }}" required aria-label="{{ __('Name') }}">
                                            @error('name_ar')
                                                <p class="mt-1 text-sm text-red-600 text-right">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <label for="position_ar"
                                            class="block text-sm font-medium text-gray-700 text-right">
                                            {{ __('Position') }} <span class="text-red-500">*</span>
                                        </label>
                                        <div class="mt-1.5">
                                            <input type="text" name="position_ar" id="position_ar" autocomplete="off"
                                                dir="rtl"
                                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm text-right transition-all duration-200 @error('position_ar') border-red-300 @enderror"
                                                value="{{ old('position_ar') }}" required
                                                aria-label="{{ __('Position') }}">
                                            @error('position_ar')
                                                <p class="mt-1 text-sm text-red-600 text-right">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <label for="content_ar"
                                            class="block text-sm font-medium text-gray-700 text-right">
                                            {{ __('Testimonial') }} <span class="text-red-500">*</span>
                                        </label>
                                        <div class="mt-1.5">
                                            <textarea id="content_ar" name="content_ar" rows="4" dir="rtl"
                                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm text-right transition-all duration-200 @error('content_ar') border-red-300 @enderror"
                                                required aria-label="{{ __('Testimonial') }}">{{ old('content_ar') }}</textarea>
                                            @error('content_ar')
                                                <p class="mt-1 text-sm text-red-600 text-right">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Rating & Image Section -->
                            <div class="sm:col-span-2 pt-8">
                                <h3 class="text-xl font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">
                                    {{ __('Rating & Profile Image') }}
                                </h3>
                                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2">
                                    <!-- Rating -->
                                    <div class="space-y-4">
                                        <div
                                            class="flex items-center justify-between {{ app()->getLocale() === 'ar' ? 'flex-row-reverse' : '' }}">
                                            <label class="block text-sm font-medium text-gray-700">
                                                {{ __('Rating') }} <span class="text-red-500">*</span>
                                            </label>
                                            <span id="rating-value"
                                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                {{ old('rating') ? old('rating') . ' ' . (old('rating') > 1 ? __('Stars') : __('Star')) : __('Not rated') }}
                                            </span>
                                        </div>
                                        <div
                                            class="rating-stars flex space-x-1 {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : '' }}">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <div class="relative">
                                                    <input type="radio" id="star{{ $i }}" name="rating"
                                                        value="{{ $i }}"
                                                        {{ old('rating') == $i ? 'checked' : '' }} class="hidden-radio">
                                                    <label for="star{{ $i }}"
                                                        class="cursor-pointer flex items-center justify-center">
                                                        <svg class="star w-7 h-7" viewBox="0 0 24 24" aria-hidden="true">
                                                            <path
                                                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                                        </svg>
                                                    </label>
                                                </div>
                                            @endfor
                                        </div>
                                        @error('rating')
                                            <p
                                                class="mt-1 text-sm text-red-600 flex items-center {{ app()->getLocale() === 'ar' ? 'flex-row-reverse text-right' : '' }}">
                                                <svg class="h-4 w-4 mr-1 {{ app()->getLocale() === 'ar' ? 'ml-1' : '' }}"
                                                    fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                {{ $message }}
                                            </p>
                                        @enderror
                                        <p
                                            class="mt-2 text-sm text-gray-500 flex items-center {{ app()->getLocale() === 'ar' ? 'flex-row-reverse text-right' : '' }}">
                                            <svg class="h-4 w-4 mr-1.5 text-blue-500 {{ app()->getLocale() === 'ar' ? 'ml-1.5' : '' }}"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            {{ __('Select a rating from 1 to 5 stars') }}
                                        </p>
                                    </div>


                                    <style>
                                        /* Rating Stars */
                                        .rating-stars {
                                            display: flex;
                                            align-items: center;
                                            gap: 0.75rem;
                                        }

                                        .rating-stars input[type="radio"] {
                                            position: absolute;
                                            opacity: 0;
                                            width: 1px;
                                            /* Small non-zero size to ensure clickability */
                                            height: 1px;
                                            margin: 0;
                                            /* Remove default margins */
                                            z-index: -1;
                                            /* Keep behind labels */
                                        }

                                        .rating-stars label {
                                            cursor: pointer;
                                            transition: transform 0.2s ease;
                                            display: flex;
                                            align-items: center;
                                            justify-content: center;
                                        }

                                        .rating-stars label:hover {
                                            transform: scale(1.2);
                                        }

                                        .rating-stars svg {
                                            width: 1.75rem;
                                            height: 1.75rem;
                                            fill: #d1d5db;
                                            transition: fill 0.2s ease;
                                        }

                                        .rating-stars input:checked+label svg {
                                            fill: #eab308;
                                        }

                                        .rating-stars input:focus+label svg {
                                            outline: 2px solid #f59e0b;
                                            outline-offset: 2px;
                                        }

                                        .rating-stars label:hover svg,
                                        .rating-stars input:hover+label svg {
                                            fill: #facc15;
                                        }
                                    </style>

                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            // Rating Stars Functionality
                                            const ratingStars = document.querySelectorAll('.rating-stars input[type="radio"]');
                                            const ratingValue = document.getElementById('rating-value');
                                            let currentRating = {{ old('rating', 0) }};

                                            function updateStars(rating) {
                                                ratingStars.forEach((star, index) => {
                                                    const starIcon = star.nextElementSibling.querySelector('.star');
                                                    if (index < rating) {
                                                        star.checked = true;
                                                        starIcon.style.fill = '#eab308';
                                                    } else {
                                                        star.checked = false;
                                                        starIcon.style.fill = '#d1d5db';
                                                    }
                                                });
                                                if (rating > 0) {
                                                    const starsLabel = rating > 1 ? '{{ __('Stars') }}' : '{{ __('Star') }}';
                                                    ratingValue.textContent = `${rating} ${starsLabel}`;
                                                    ratingValue.className =
                                                        'inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800';
                                                } else {
                                                    ratingValue.textContent = '{{ __('Not rated') }}';
                                                    ratingValue.className =
                                                        'inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800';
                                                }
                                                currentRating = rating;
                                            }

                                            // Initialize stars based on old input or default
                                            updateStars(currentRating);

                                            ratingStars.forEach((star, index) => {
                                                const starNumber = index + 1;
                                                star.addEventListener('change', () => {
                                                    updateStars(starNumber);
                                                });

                                                const label = star.nextElementSibling;
                                                label.addEventListener('click', (e) => {
                                                    e.preventDefault(); // Prevent double-click issues
                                                    star.checked = true;
                                                    star.dispatchEvent(new Event('change')); // Trigger change event
                                                });

                                                label.addEventListener('mouseenter', () => {
                                                    ratingStars.forEach((s, i) => {
                                                        const hoverLabel = s.nextElementSibling;
                                                        const hoverStar = hoverLabel.querySelector('.star');
                                                        if (i < starNumber) {
                                                            hoverStar.style.fill = '#facc15';
                                                        } else {
                                                            hoverStar.style.fill = '#d1d5db';
                                                        }
                                                    });
                                                });

                                                label.addEventListener('mouseleave', () => {
                                                    updateStars(currentRating);
                                                });
                                            });

                                            // Rest of your existing JavaScript for image upload...
                                        });
                                    </script>

                                    <!-- Image Upload -->
                                    <div
                                        class="space-y-4 image-upload-section flex {{ app()->getLocale() === 'ar' ? 'flex-row-reverse' : '' }} gap-4">
                                        <div class="label-container flex-1">
                                            <label class="block text-sm font-medium text-gray-700">
                                                {{ __('Profile Image') }}
                                                <span
                                                    class="text-xs font-normal text-gray-500">({{ __('Optional') }})</span>
                                            </label>
                                            <p class="mt-2 text-xs text-gray-500">
                                                {{ __('Recommended: 200x200px (Max: 2MB)') }}
                                            </p>
                                            @error('image')
                                                <p
                                                    class="mt-1 text-sm text-red-600 flex items-center {{ app()->getLocale() === 'ar' ? 'flex-row-reverse text-right' : '' }}">
                                                    <svg class="h-4 w-4 mr-1 {{ app()->getLocale() === 'ar' ? 'ml-1' : '' }}"
                                                        fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                        <div class="image-upload-container relative group w-64"
                                            id="image-upload-container">
                                            <input type="file" class="hidden" id="image" name="image"
                                                accept="image/*" aria-label="{{ __('Upload profile image') }}">
                                            <div id="upload-prompt"
                                                class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center cursor-pointer hover:border-yellow-500 hover:shadow-md transition-all duration-200">
                                                <div class="space-y-3">
                                                    <div
                                                        class="mx-auto w-12 h-12 flex items-center justify-center bg-yellow-50 rounded-full group-hover:bg-yellow-100">
                                                        <svg class="h-6 w-6 text-yellow-500" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path
                                                                d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 0113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                            <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-medium text-gray-700">
                                                            {{ __('Drag & drop your photo') }}
                                                        </p>
                                                        <p class="text-xs text-gray-500 mt-1">
                                                            {{ __('or click to browse') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="file-info" class="hidden">
                                                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                                    <div
                                                        class="flex items-center space-x-4 {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : '' }}">
                                                        <div class="relative">
                                                            <img id="previewImg" src="#"
                                                                alt="{{ __('Preview') }}"
                                                                class="w-16 h-16 rounded-full object-cover border-2 border-white shadow-sm">
                                                            <button type="button" id="change-image"
                                                                class="absolute -bottom-1 -right-1 bg-white rounded-full p-1.5 shadow-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2"
                                                                title="{{ __('Change image') }}"
                                                                aria-label="{{ __('Change image') }}">
                                                                <svg class="h-4 w-4 text-yellow-500" fill="currentColor"
                                                                    viewBox="0 0 20 20">
                                                                    <path
                                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.379-8.379-2.828-2.828z" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        <div class="flex-1 min-w-0">
                                                            <p id="file-name"
                                                                class="text-sm font-medium text-gray-900 truncate"></p>
                                                            <div
                                                                class="mt-1 flex items-center space-x-2 {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : '' }}">
                                                                <span class="text-xs text-gray-500 flex items-center">
                                                                    <svg class="h-4 w-4 mr-1 {{ app()->getLocale() === 'ar' ? 'ml-1' : '' }}"
                                                                        fill="currentColor" viewBox="0 0 20 20">
                                                                        <path fill-rule="evenodd"
                                                                            d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm3 2h6v4H7V5zm8 8v2h1v-2h-1zm-2-2H7v4h6v-4zm2 0h1V9h-1v2zm1-3V5h-1v1h1zM5 5v1H4V5h1zm0 3H4v1h1V8zm-1 3h1v1H4v-1zm9-6v1h1V5h-1zM4 13h1v1H4v-1zm9 0v1h1v-1h-1z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                    {{ __('Image') }}
                                                                </span>
                                                                <button type="button" id="remove-file"
                                                                    class="text-xs text-red-500 hover:text-red-700 focus:outline-none flex items-center">
                                                                    <svg class="h-4 w-4 mr-1 {{ app()->getLocale() === 'ar' ? 'ml-1' : '' }}"
                                                                        fill="currentColor" viewBox="0 0 20 20">
                                                                        <path fill-rule="evenodd"
                                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                    {{ __('Remove') }}
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Footer -->
                        <div class="pt-6">
                            <div class="flex justify-end {{ app()->getLocale() === 'ar' ? 'justify-start' : '' }} gap-3">
                                <a href="{{ route('dashboard.testimonials.index') }}"
                                    class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors duration-200">
                                    {{ __('Cancel') }}
                                </a>
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg text-sm font-medium text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors duration-200 {{ app()->getLocale() === 'ar' ? 'mr-3' : 'ml-3' }}">
                                    <svg class="-ml-1 mr-2 h-5 w-5 {{ app()->getLocale() === 'ar' ? '-mr-1 ml-2' : '' }}"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ __('Save Testimonial') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Rating Stars Functionality
            const ratingStars = document.querySelectorAll('.rating-stars input[type="radio"]');
            const ratingValue = document.getElementById('rating-value');
            let currentRating = {{ old('rating', 0) }};

            function updateStars(rating) {
                ratingStars.forEach((star, index) => {
                    const label = star.nextElementSibling;
                    const starIcon = label.querySelector('.star');
                    if (index < rating) {
                        star.checked = true;
                        starIcon.style.fill = '#eab308';
                    } else {
                        star.checked = false;
                        starIcon.style.fill = '#d1d5db';
                    }
                });
                if (rating > 0) {
                    const starsLabel = rating > 1 ? '{{ __('Stars') }}' : '{{ __('Star') }}';
                    ratingValue.textContent = `${rating} ${starsLabel}`;
                    ratingValue.className =
                        'inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800';
                } else {
                    ratingValue.textContent = '{{ __('Not rated') }}';
                    ratingValue.className =
                        'inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800';
                }
                currentRating = rating;
            }

            updateStars(currentRating);

            ratingStars.forEach((star, index) => {
                const starNumber = index + 1;
                star.addEventListener('change', () => {
                    updateStars(starNumber);
                });
                const label = star.nextElementSibling;
                label.addEventListener('mouseenter', () => {
                    for (let i = 0; i < ratingStars.length; i++) {
                        const hoverLabel = ratingStars[i].nextElementSibling;
                        const hoverStar = hoverLabel.querySelector('.star');
                        if (i < starNumber) {
                            hoverStar.style.fill = '#facc15';
                        } else {
                            hoverStar.style.fill = '#d1d5db';
                        }
                    }
                });
                label.addEventListener('mouseleave', () => {
                    updateStars(currentRating);
                });
            });

            // Image Upload Functionality
            const imageInput = document.getElementById('image');
            const uploadContainer = document.getElementById('image-upload-container');
            const uploadPrompt = document.getElementById('upload-prompt');
            const fileInfo = document.getElementById('file-info');
            const previewImg = document.getElementById('previewImg');
            const fileName = document.getElementById('file-name');
            const changeImageBtn = document.getElementById('change-image');
            const removeFileBtn = document.getElementById('remove-file');

            uploadContainer.addEventListener('click', (e) => {
                if (e.target === uploadContainer || e.target.closest('#upload-prompt')) {
                    imageInput.click();
                }
            });

            changeImageBtn?.addEventListener('click', (e) => {
                e.stopPropagation();
                imageInput.click();
            });

            removeFileBtn?.addEventListener('click', (e) => {
                e.stopPropagation();
                imageInput.value = '';
                uploadPrompt.classList.remove('hidden');
                fileInfo.classList.add('hidden');
                uploadContainer.classList.remove('border-yellow-500', 'bg-yellow-50', 'shadow-md');
            });

            imageInput.addEventListener('change', (e) => {
                const file = e.target.files[0];
                if (file) {
                    if (!file.type.match('image.*')) {
                        alert('{{ __('Please select an image file (JPEG, PNG, etc.)') }}');
                        return;
                    }
                    if (file.size > 2 * 1024 * 1024) {
                        alert('{{ __('Image size should be less than 2MB') }}');
                        return;
                    }
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        previewImg.src = e.target.result;
                        uploadPrompt.classList.add('hidden');
                        fileInfo.classList.remove('hidden');
                        fileName.textContent = file.name;
                        uploadContainer.classList.add('border-yellow-500', 'bg-yellow-50', 'shadow-md');
                    };
                    reader.readAsDataURL(file);
                }
            });

            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                uploadContainer.addEventListener(eventName, (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                });
            });

            ['dragenter', 'dragover'].forEach(eventName => {
                uploadContainer.addEventListener(eventName, () => {
                    uploadContainer.classList.add('border-yellow-500', 'bg-yellow-50', 'shadow-md');
                });
            });

            ['dragleave', 'drop'].forEach(eventName => {
                uploadContainer.addEventListener(eventName, () => {
                    if (!fileInfo.classList.contains('hidden')) {
                        uploadContainer.classList.add('border-yellow-500', 'bg-yellow-50',
                            'shadow-md');
                    } else {
                        uploadContainer.classList.remove('border-yellow-500', 'bg-yellow-50',
                            'shadow-md');
                    }
                });
            });

            uploadContainer.addEventListener('drop', (e) => {
                const file = e.dataTransfer.files[0];
                if (file && file.type.match('image.*')) {
                    imageInput.files = e.dataTransfer.files;
                    const event = new Event('change');
                    imageInput.dispatchEvent(event);
                }
            });

            @if (old('rating'))
                updateStars({{ old('rating') }});
            @endif
        });
    </script>
@endpush
