@extends('dashboard.layouts.new')

@section('title', __('Edit Welcome Page'))

@push('styles')
<style>
    /* General Styles */
    body {
        font-family: 'Inter', 'IBM Plex Sans Arabic', sans-serif;
    }

    /* Form Container */
    .form-container {
        background: linear-gradient(145deg, #ffffff, #f8fafc);
        border-radius: 1rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        padding: 2rem;
    }

    /* Input and Textarea Styles */
    input, textarea {
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }
    input:focus, textarea:focus {
        border-color: #f59e0b;
        box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.1);
    }

    /* Language Tab */
    .language-tab {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 0.75rem;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        transition: transform 0.2s ease;
    }
    .language-tab:hover {
        transform: translateY(-2px);
    }
    .language-tab h3 {
        color: #1f2937;
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 1rem;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid #e5e7eb;
    }

    /* Image Upload */
    .image-upload-container {
        border: 2px dashed #d1d5db;
        border-radius: 0.75rem;
        padding: 2rem;
        background: #f9fafb;
        transition: all 0.3s ease;
    }
    .image-upload-container:hover,
    .image-upload-container.dragover {
        border-color: #f59e0b;
        background: #fefce8;
        transform: translateY(-2px);
    }
    .image-preview {
        max-height: 200px;
        width: auto;
        border-radius: 0.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }
    .image-upload-container:hover .upload-prompt {
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
    [dir="rtl"] .space-x-4 > :not(:first-child) {
        margin-left: 0;
        margin-right: 1rem;
    }
    [dir="rtl"] .ml-4 {
        margin-left: 0;
        margin-right: 1rem;
    }
    [dir="rtl"] .mr-2 {
        margin-right: 0;
        margin-left: 0.5rem;
    }
    [dir="rtl"] .language-tab h3 {
        justify-content: flex-end;
    }
    [dir="rtl"] .rounded-l-md {
        border-radius: 0 0.375rem 0.375rem 0;
    }
    [dir="rtl"] .rounded-r-md {
        border-radius: 0.375rem 0 0 0.375rem;
    }
</style>
@endpush

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    <!-- Page Header -->
    <div class="md:flex md:items-center md:justify-between mb-8">
        <div class="flex-1 min-w-0">
            <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">
                {{ __('Edit Welcome Page') }}
            </h2>
            <nav class="flex mt-2" aria-label="{{ __('Breadcrumb') }}">
                <ol class="flex items-center space-x-4 {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : '' }}">
                    <li>
                        <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-gray-700">
                            <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <span class="sr-only">{{ __('Home') }}</span>
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-4 text-sm font-medium text-gray-500 {{ app()->getLocale() === 'ar' ? 'mr-4' : '' }}">
                                {{ __('Welcome Page') }}
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4 {{ app()->getLocale() === 'ar' ? 'md:mr-4' : '' }}">
            <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg text-sm font-medium text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors duration-200">
                <svg class="-ml-1 mr-2 h-5 w-5 {{ app()->getLocale() === 'ar' ? '-mr-1 ml-2' : '' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                </svg>
                {{ __('View Live') }}
            </a>
        </div>
    </div>

    <form action="{{ route('dashboard.welcome.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-container mb-8">
            <div class="px-4 py-5 sm:px-6 bg-gray-50 rounded-t-lg">
                <h3 class="text-xl font-semibold text-gray-900">
                    {{ __('Hero Section') }}
                </h3>
                <p class="mt-1 text-sm text-gray-500">
                    {{ __('Customize the main hero section of your welcome page.') }}
                </p>
            </div>
            
            <div class="px-4 py-5 sm:p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- English Content -->
                    <div class="language-tab">
                        <h3 class="flex items-center {{ app()->getLocale() === 'ar' ? 'justify-end' : '' }}">
                            <span class="h-5 w-5 mr-2 text-blue-500 {{ app()->getLocale() === 'ar' ? 'ml-2' : '' }}">🇬🇧</span>
                            {{ __('English Content') }}
                        </h3>
                        <div class="space-y-6">
                            <div>
                                <label for="title_en" class="block text-sm font-medium text-gray-700">{{ __('Title') }} <span class="text-red-500">*</span></label>
                                <input type="text" name="title_en" id="title_en" value="{{ old('title_en', $about->title_en ?? '') }}" required
                                    class="mt-1.5 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm transition-all duration-200 @error('title_en') border-red-300 @enderror"
                                    aria-label="{{ __('Title') }}">
                                @error('title_en')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="description_en" class="block text-sm font-medium text-gray-700">{{ __('Description') }} <span class="text-red-500">*</span></label>
                                <textarea name="description_en" id="description_en" rows="4" required
                                    class="mt-1.5 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm transition-all duration-200 @error('description_en') border-red-300 @enderror"
                                    aria-label="{{ __('Description') }}">{{ old('description_en', $about->description_en ?? '') }}</textarea>
                                @error('description_en')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="cta_text_en" class="block text-sm font-medium text-gray-700">{{ __('Button Text') }} <span class="text-red-500">*</span></label>
                                <input type="text" name="cta_text_en" id="cta_text_en" value="{{ old('cta_text_en', $about->cta_text_en ?? 'Get Started') }}" required
                                    class="mt-1.5 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm transition-all duration-200 @error('cta_text_en') border-red-300 @enderror"
                                    aria-label="{{ __('Button Text') }}">
                                @error('cta_text_en')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <!-- Arabic Content -->
                    <div class="language-tab" dir="rtl">
                        <h3 class="flex items-center justify-end">
                            <span class="h-5 w-5 ml-2 text-green-500">🇸🇦</span>
                            {{ __('Arabic Content') }}
                        </h3>
                        <div class="space-y-6">
                            <div>
                                <label for="title_ar" class="block text-sm font-medium text-gray-700 text-right">{{ __('Title') }} <span class="text-red-500">*</span></label>
                                <input type="text" name="title_ar" id="title_ar" value="{{ old('title_ar', $about->title_ar ?? '') }}" required
                                    class="mt-1.5 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm text-right transition-all duration-200 @error('title_ar') border-red-300 @enderror"
                                    dir="rtl" aria-label="{{ __('Title') }}">
                                @error('title_ar')
                                    <p class="mt-1 text-sm text-red-600 text-right">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="description_ar" class="block text-sm font-medium text-gray-700 text-right">{{ __('Description') }} <span class="text-red-500">*</span></label>
                                <textarea name="description_ar" id="description_ar" rows="4" required dir="rtl"
                                    class="mt-1.5 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm text-right transition-all duration-200 @error('description_ar') border-red-300 @enderror"
                                    aria-label="{{ __('Description') }}">{{ old('description_ar', $about->description_ar ?? '') }}</textarea>
                                @error('description_ar')
                                    <p class="mt-1 text-sm text-red-600 text-right">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="cta_text_ar" class="block text-sm font-medium text-gray-700 text-right">{{ __('Button Text') }} <span class="text-red-500">*</span></label>
                                <input type="text" name="cta_text_ar" id="cta_text_ar" value="{{ old('cta_text_ar', $about->cta_text_ar ?? 'ابدأ الآن') }}" required
                                    class="mt-1.5 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm text-right transition-all duration-200 @error('cta_text_ar') border-red-300 @enderror"
                                    dir="rtl" aria-label="{{ __('Button Text') }}">
                                @error('cta_text_ar')
                                    <p class="mt-1 text-sm text-red-600 text-right">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-8">
                    <label for="cta_link" class="block text-sm font-medium text-gray-700">{{ __('Button Link') }} <span class="text-red-500">*</span></label>
                    <div class="mt-1.5 flex rounded-lg shadow-sm">
                        <span class="inline-flex items-center px-3 rounded-l-lg border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm {{ app()->getLocale() === 'ar' ? 'rounded-r-lg rounded-l-none border-l-0 border-r' : '' }}">
                            {{ url('/') }}/
                        </span>
                        <input type="text" name="cta_link" id="cta_link" value="{{ old('cta_link', str_replace(url('/') . '/', '', $about->cta_link ?? 'contact')) }}" required
                            class="flex-1 block w-full rounded-r-lg border-gray-300 focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm transition-all duration-200 {{ app()->getLocale() === 'ar' ? 'rounded-l-lg rounded-r-none' : '' }} @error('cta_link') border-red-300 @enderror"
                            aria-label="{{ __('Button Link') }}">
                    </div>
                    @error('cta_link')
                        <p class="mt-1 text-sm text-red-600 {{ app()->getLocale() === 'ar' ? 'text-right' : '' }}">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        
        <!-- Image Upload Section -->
        <div class="form-container mb-8">
            <div class="px-4 py-5 sm:px-6 bg-gray-50 rounded-t-lg">
                <h3 class="text-xl font-semibold text-gray-900">
                    {{ __('Hero Image') }}
                </h3>
                <p class="mt-1 text-sm text-gray-500">
                    {{ __('Upload or update the hero image. Recommended size: 1200x800px, max 5MB.') }}
                </p>
            </div>
            
            <div class="px-4 py-5 sm:p-6">
                <div class="space-y-6">
                    <!-- Current Image Preview -->
                    @if(isset($about->image) && $about->image)
                        <div class="mb-6" id="current-image-preview">
                            <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Current Image') }}</label>
                            <div class="relative inline-block">
                                <img src="{{ asset('storage/' . $about->image) }}" alt="{{ __('Current Hero Image') }}" class="image-preview">
                                <button type="button" id="remove-current-image" class="absolute top-2 right-2 p-1.5 bg-white rounded-full shadow-md text-red-600 hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2" aria-label="{{ __('Remove current image') }}">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </div>
                            <input type="hidden" name="remove_image" id="remove-image-flag" value="0">
                        </div>
                    @endif

                    <!-- Image Upload -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ isset($about->image) && $about->image ? __('Change Image') : __('Upload Image') }}
                        </label>
                        <div class="image-upload-container">
                            <input id="image-upload" name="image" type="file" class="hidden" accept="image/*" aria-label="{{ __('Upload hero image') }}">
                            <div class="upload-prompt text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 0113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z"/>
                                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z"/>
                                </svg>
                                <div class="mt-2 flex text-sm text-gray-600 justify-center">
                                    <label for="image-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-yellow-600 hover:text-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                        <span>{{ __('Upload a file') }}</span>
                                    </label>
                                    <p class="pl-1 {{ app()->getLocale() === 'ar' ? 'pr-1' : '' }}">{{ __('or drag and drop') }}</p>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">
                                    {{ __('PNG, JPG, GIF up to 5MB') }}
                                </p>
                            </div>
                            <div id="new-image-preview" class="mt-4 hidden">
                                <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('New Image Preview') }}</label>
                                <img id="image-preview" class="image-preview" alt="{{ __('New Image Preview') }}">
                            </div>
                        </div>
                        @error('image')
                            <p class="mt-2 text-sm text-red-600 {{ app()->getLocale() === 'ar' ? 'text-right' : '' }}">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        
        <div class="flex justify-end gap-3 {{ app()->getLocale() === 'ar' ? 'justify-start' : '' }}">
            <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors duration-200">
                {{ __('Cancel') }}
            </button>
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg text-sm font-medium text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors duration-200 {{ app()->getLocale() === 'ar' ? 'mr-3' : 'ml-3' }}">
                <svg class="-ml-1 mr-2 h-5 w-5 {{ app()->getLocale() === 'ar' ? '-mr-1 ml-2' : '' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                {{ __('Save Changes') }}
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Elements
        const uploadContainer = document.querySelector('.image-upload-container');
        const fileInput = document.getElementById('image-upload');
        const imagePreview = document.getElementById('image-preview');
        const newImagePreview = document.getElementById('new-image-preview');
        const removeCurrentImageBtn = document.getElementById('remove-current-image');
        const removeImageFlag = document.getElementById('remove-image-flag');
        
        // Only proceed if elements exist
        if (!uploadContainer || !fileInput) return;
        
        // Handle drag and drop
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadContainer.addEventListener(eventName, preventDefaults, false);
            if (eventName === 'dragenter' || eventName === 'dragover') {
                uploadContainer.addEventListener(eventName, highlight, false);
            } else {
                uploadContainer.addEventListener(eventName, unhighlight, false);
            }
        });
        
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        function highlight() {
            uploadContainer.classList.add('border-yellow-500', 'bg-yellow-50', 'shadow-md');
        }
        
        function unhighlight() {
            if (!newImagePreview.classList.contains('hidden')) {
                uploadContainer.classList.add('border-yellow-500', 'bg-yellow-50', 'shadow-md');
            } else {
                uploadContainer.classList.remove('border-yellow-500', 'bg-yellow-50', 'shadow-md');
            }
        }
        
        // Handle dropped files
        uploadContainer.addEventListener('drop', handleDrop, false);
        
        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            handleFiles(files);
        }
        
        // Handle file selection
        fileInput.addEventListener('change', function() {
            if (this.files && this.files.length) {
                handleFiles(this.files);
            }
        });
        
        function handleFiles(files) {
            const file = files[0];
            if (file && file.type.match('image.*')) {
                if (file.size > 5 * 1024 * 1024) {
                    alert('{{ __("Image size should be less than 5MB") }}');
                    return;
                }
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    // Show the new image preview
                    imagePreview.src = e.target.result;
                    newImagePreview.classList.remove('hidden');
                    uploadContainer.classList.add('border-yellow-500', 'bg-yellow-50', 'shadow-md');
                    
                    // Hide the current image preview if exists
                    const currentImagePreview = document.getElementById('current-image-preview');
                    if (currentImagePreview) {
                        currentImagePreview.style.display = 'none';
                    }
                };
                
                reader.readAsDataURL(file);
            } else {
                alert('{{ __("Please select an image file (JPEG, PNG, GIF, etc.)") }}');
            }
        }
        
        // Remove current image
        if (removeCurrentImageBtn) {
            removeCurrentImageBtn.addEventListener('click', function(e) {
                e.preventDefault();
                if (confirm('{{ __("Are you sure you want to remove this image?") }}')) {
                    // Hide the current image
                    const currentImagePreview = document.getElementById('current-image-preview');
                    if (currentImagePreview) {
                        currentImagePreview.style.display = 'none';
                    }
                    // Set the remove flag to 1
                    removeImageFlag.value = '1';
                    // Show the upload container
                    uploadContainer.closest('div').style.display = 'block';
                }
            });
        }
        
        // Handle cancel button
        const cancelBtn = document.querySelector('button[type="button"]');
        if (cancelBtn) {
            cancelBtn.addEventListener('click', function() {
                window.location.href = '{{ route("dashboard") }}';
            });
        }
    });
</script>
@endpush
