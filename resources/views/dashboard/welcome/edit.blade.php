@extends('dashboard.layouts.new')

@section('title', __('Edit Welcome Page'))

@push('styles')
<style>
    .image-upload-container {
        border: 2px dashed #d1d5db;
        border-radius: 0.5rem;
        padding: 2rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .image-upload-container:hover {
        border-color: #9ca3af;
    }
    .image-upload-container.dragover {
        background-color: #f3f4f6;
        border-color: #3b82f6;
    }
    .image-preview {
        max-width: 100%;
        max-height: 300px;
        margin-top: 1rem;
        border-radius: 0.375rem;
    }
    .language-tab {
        border: 1px solid #e5e7eb;
        border-radius: 0.5rem;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }
    .language-tab h3 {
        color: #374151;
        font-size: 1.125rem;
        font-weight: 600;
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 1px solid #e5e7eb;
    }
</style>
@endpush

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <!-- Page Header -->
    <div class="md:flex md:items-center md:justify-between mb-6">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                {{ __('Welcome Page Content') }}
            </h2>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-4">
                    <li>
                        <div>
                            <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-gray-700">
                                <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                </svg>
                                <span class="sr-only">{{ __('Home') }}</span>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-4 text-sm font-medium text-gray-500">
                                {{ __('Welcome Page') }}
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
            <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
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
        
        <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
            <div class="px-4 py-5 sm:px-6 bg-gray-50">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
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
                        <h3 class="flex items-center">
                            <span class="h-5 w-5 mr-2 text-blue-500">🇬🇧</span>
                            {{ __('English Content') }}
                        </h3>
                        <div class="space-y-4">
                            <div>
                                <label for="title_en" class="block text-sm font-medium text-gray-700">{{ __('Title') }} *</label>
                                <input type="text" name="title_en" id="title_en" value="{{ old('title_en', $about->title_en ?? '') }}" required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                                @error('title_en')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="description_en" class="block text-sm font-medium text-gray-700">{{ __('Description') }} *</label>
                                <textarea name="description_en" id="description_en" rows="4" required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">{{ old('description_en', $about->description_en ?? '') }}</textarea>
                                @error('description_en')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="cta_text_en" class="block text-sm font-medium text-gray-700">{{ __('Button Text') }} *</label>
                                <input type="text" name="cta_text_en" id="cta_text_en" value="{{ old('cta_text_en', $about->cta_text_en ?? 'Get Started') }}" required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
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
                        <div class="space-y-4">
                            <div>
                                <label for="title_ar" class="block text-sm font-medium text-gray-700">{{ __('Title') }} *</label>
                                <input type="text" name="title_ar" id="title_ar" value="{{ old('title_ar', $about->title_ar ?? '') }}" required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 text-right focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                                @error('title_ar')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="description_ar" class="block text-sm font-medium text-gray-700">{{ __('Description') }} *</label>
                                <textarea name="description_ar" id="description_ar" rows="4" required dir="rtl"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 text-right focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">{{ old('description_ar', $about->description_ar ?? '') }}</textarea>
                                @error('description_ar')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="cta_text_ar" class="block text-sm font-medium text-gray-700">{{ __('Button Text') }} *</label>
                                <input type="text" name="cta_text_ar" id="cta_text_ar" value="{{ old('cta_text_ar', $about->cta_text_ar ?? 'ابدأ الآن') }}" required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 text-right focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                                @error('cta_text_ar')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6">
                    <label for="cta_link" class="block text-sm font-medium text-gray-700">{{ __('Button Link') }} *</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                            {{ url('/') }}/
                        </span>
                        <input type="text" name="cta_link" id="cta_link" value="{{ old('cta_link', str_replace(url('/') . '/', '', $about->cta_link ?? 'contact')) }}" required
                            class="focus:ring-yellow-500 focus:border-yellow-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                    </div>
                    @error('cta_link')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        
        <!-- Image Upload Section -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
            <div class="px-4 py-5 sm:px-6 bg-gray-50">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    {{ __('Hero Image') }}
                </h3>
                <p class="mt-1 text-sm text-gray-500">
                    {{ __('Upload or update the hero image. Recommended size: 1200x800px.') }}
                </p>
            </div>
            
            <div class="px-4 py-5 sm:p-6">
                <div class="space-y-4">
                    <!-- Current Image Preview -->
                    @if(isset($about->image) && $about->image)
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Current Image') }}</label>
                            <div class="relative inline-block">
                                <img src="{{ asset('storage/' . $about->image) }}" alt="Current Hero Image" class="h-48 w-auto rounded-lg shadow-sm">
                                <div class="absolute top-2 right-2">
                                    <button type="button" id="remove-current-image" class="p-1 bg-white rounded-full shadow-md text-red-600 hover:bg-red-50">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <input type="hidden" name="remove_image" id="remove-image-flag" value="0">
                        </div>
                    @endif

                    <!-- Image Upload -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ isset($about->image) && $about->image ? __('Change Image') : __('Upload Image') }}
                        </label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="image-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-yellow-600 hover:text-yellow-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-yellow-500">
                                        <span>{{ __('Upload a file') }}</span>
                                        <input id="image-upload" name="image" type="file" class="sr-only" accept="image/*">
                                    </label>
                                    <p class="pl-1">{{ __('or drag and drop') }}</p>
                                </div>
                                <p class="text-xs text-gray-500">
                                    PNG, JPG, GIF up to 5MB
                                </p>
                            </div>
                        </div>
                        @error('image')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        
                        <!-- New Image Preview -->
                        <div id="new-image-preview" class="mt-4 hidden">
                            <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('New Image Preview') }}</label>
                            <img id="image-preview" class="h-48 w-auto rounded-lg shadow-sm">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="flex justify-end mb-8">
            <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                {{ __('Cancel') }}
            </button>
            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
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
        const uploadContainer = document.querySelector('.border-dashed');
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
            uploadContainer.classList.add('border-yellow-500', 'bg-yellow-50');
        }
        
        function unhighlight() {
            uploadContainer.classList.remove('border-yellow-500', 'bg-yellow-50');
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
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    // Show the new image preview
                    imagePreview.src = e.target.result;
                    newImagePreview.classList.remove('hidden');
                    
                    // Hide the current image preview if exists
                    if (document.querySelector('[id^=current-image-preview]')) {
                        document.querySelector('[id^=current-image-preview]').style.display = 'none';
                    }
                };
                
                reader.readAsDataURL(file);
            }
        }
        
        // Remove current image
        if (removeCurrentImageBtn) {
            removeCurrentImageBtn.addEventListener('click', function(e) {
                e.preventDefault();
                if (confirm('Are you sure you want to remove this image?')) {
                    // Hide the current image
                    this.closest('.mb-4').style.display = 'none';
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
