@extends('dashboard.layouts.new')

@section('title', __('Add New Testimonial'))

@push('styles')
<style>
    .rating-stars input[type="radio"] {
        display: none;
    }
    .rating-stars label i {
        transition: all 0.2s ease-in-out;
        cursor: pointer;
        font-size: 1.25rem;
        color: #e2e8f0;
    }
    .rating-stars input[type="radio"]:checked ~ label i,
    .rating-stars label:hover i,
    .rating-stars label:hover ~ label i {
        color: #f59e0b;
    }
    .image-upload-container {
        border: 2px dashed #e5e7eb;
        border-radius: 0.5rem;
        padding: 2rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
        background-color: #f9fafb;
    }
    .image-upload-container:hover,
    .image-upload-container.dragover {
        border-color: #f59e0b;
        background-color: #fefce8;
    }
    .preview-image {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #fff;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    }
</style>
@endpush

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Page Header -->
    <div class="md:flex md:items-center md:justify-between mb-6">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                {{ __('Add New Testimonial') }}
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
                            <a href="{{ route('dashboard.testimonials.index') }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">
                                {{ __('Testimonials') }}
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-4 text-sm font-medium text-gray-500">
                                {{ __('Add New') }}
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
            <a href="{{ route('dashboard.testimonials.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                {{ __('Back to Testimonials') }}
            </a>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <form action="{{ route('dashboard.testimonials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="px-4 py-5 sm:p-6">
                <div class="space-y-8 divide-y divide-gray-200">
                    <div>
                        <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                            <!-- English Section -->
                            <div class="sm:col-span-3">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('English Version') }}</h3>
                                <div class="mt-4 space-y-6">
                                    <div>
                                        <label for="name_en" class="block text-sm font-medium text-gray-700">
                                            {{ __('Name') }} <span class="text-red-500">*</span>
                                        </label>
                                        <div class="mt-1">
                                            <input type="text" name="name_en" id="name_en" autocomplete="off"
                                                class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border-gray-300 rounded-md @error('name_en') border-red-300 @enderror"
                                                value="{{ old('name_en') }}" required>
                                            @error('name_en')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <label for="position_en" class="block text-sm font-medium text-gray-700">
                                            {{ __('Position') }} <span class="text-red-500">*</span>
                                        </label>
                                        <div class="mt-1">
                                            <input type="text" name="position_en" id="position_en" autocomplete="off"
                                                class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border-gray-300 rounded-md @error('position_en') border-red-300 @enderror"
                                                value="{{ old('position_en') }}" required>
                                            @error('position_en')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <label for="content_en" class="block text-sm font-medium text-gray-700">
                                            {{ __('Testimonial') }} <span class="text-red-500">*</span>
                                        </label>
                                        <div class="mt-1">
                                            <textarea id="content_en" name="content_en" rows="4"
                                                class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border border-gray-300 rounded-md @error('content_en') border-red-300 @enderror"
                                                required>{{ old('content_en') }}</textarea>
                                            @error('content_en')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Arabic Section -->
                            <div class="sm:col-span-3">
                                <h3 class="text-lg font-medium leading-6 text-gray-900 text-right">{{ __('Arabic Version') }}</h3>
                                <div class="mt-4 space-y-6" dir="rtl">
                                    <div>
                                        <label for="name_ar" class="block text-sm font-medium text-gray-700">
                                            {{ __('Name') }} <span class="text-red-500">*</span>
                                        </label>
                                        <div class="mt-1">
                                            <input type="text" name="name_ar" id="name_ar" autocomplete="off" dir="rtl"
                                                class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border-gray-300 rounded-md text-right @error('name_ar') border-red-300 @enderror"
                                                value="{{ old('name_ar') }}" required>
                                            @error('name_ar')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <label for="position_ar" class="block text-sm font-medium text-gray-700">
                                            {{ __('Position') }} <span class="text-red-500">*</span>
                                        </label>
                                        <div class="mt-1">
                                            <input type="text" name="position_ar" id="position_ar" autocomplete="off" dir="rtl"
                                                class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border-gray-300 rounded-md text-right @error('position_ar') border-red-300 @enderror"
                                                value="{{ old('position_ar') }}" required>
                                            @error('position_ar')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <label for="content_ar" class="block text-sm font-medium text-gray-700">
                                            {{ __('Testimonial') }} <span class="text-red-500">*</span>
                                        </label>
                                        <div class="mt-1">
                                            <textarea id="content_ar" name="content_ar" rows="4" dir="rtl"
                                                class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border border-gray-300 rounded-md text-right @error('content_ar') border-red-300 @enderror"
                                                required>{{ old('content_ar') }}</textarea>
                                            @error('content_ar')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Rating & Image Section -->
                            <div class="sm:col-span-6 pt-5">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('Rating & Profile Image') }}</h3>
                                <div class="mt-4 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                                    <!-- Rating -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">
                                            {{ __('Rating') }} <span class="text-red-500">*</span>
                                        </label>
                                        <div class="mt-1 flex items-center">
                                            <div class="rating-stars flex">
                                                @for($i = 5; $i >= 1; $i--)
                                                    <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}"
                                                        {{ old('rating') == $i ? 'checked' : '' }} required>
                                                    <label for="star{{ $i }}" class="cursor-pointer">
                                                        <i class="far fa-star text-gray-300"></i>
                                                    </label>
                                                @endfor
                                            </div>
                                            <span id="rating-value" class="ml-3 text-sm text-gray-600 font-medium">
                                                {{ old('rating') ? old('rating') . ' Star' . (old('rating') > 1 ? 's' : '') : 'Not rated' }}
                                            </span>
                                        </div>
                                        @error('rating')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                        <p class="mt-2 text-sm text-gray-500">{{ __('Select a rating from 1 to 5 stars') }}</p>
                                    </div>

                                    <!-- Image Upload -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">
                                            {{ __('Profile Image') }}
                                        </label>
                                        <div class="mt-1">
                                            <div class="image-upload-container relative" id="image-upload-container">
                                                <input type="file" class="hidden" id="image" name="image" accept="image/*">
                                                <!-- Initial Upload Prompt -->
                                                <div id="upload-prompt" class="space-y-2">
                                                    <div class="mx-auto w-12 h-12 flex items-center justify-center bg-yellow-50 rounded-full">
                                                        <i class="fas fa-camera text-yellow-500 text-lg"></i>
                                                    </div>
                                                    <div class="text-sm text-gray-600">
                                                        <p class="font-medium">{{ __('Upload a profile photo') }}</p>
                                                        <p class="text-xs text-gray-500 mt-1">{{ __('Recommended: 200x200px (Max: 2MB)') }}</p>
                                                    </div>
                                                </div>
                                                <!-- File Info & Preview -->
                                                <div id="file-info" class="hidden">
                                                    <div class="flex flex-col items-center">
                                                        <div class="relative mb-3">
                                                            <img id="previewImg" src="#" alt="Preview" class="preview-image">
                                                            <button type="button" id="change-image" class="absolute -bottom-2 -right-2 bg-white rounded-full p-1 shadow-sm hover:bg-gray-100 focus:outline-none">
                                                                <i class="fas fa-sync-alt text-yellow-500 text-xs"></i>
                                                            </button>
                                                        </div>
                                                        <div class="text-center">
                                                            <p id="file-name" class="text-sm font-medium text-gray-700 truncate max-w-xs"></p>
                                                            <button type="button" id="remove-file" class="mt-1 text-xs text-red-500 hover:text-red-700 focus:outline-none">
                                                                <i class="fas fa-times mr-1"></i> {{ __('Remove') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('image')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Footer -->
                    <div class="pt-5">
                        <div class="flex justify-end">
                            <a href="{{ route('dashboard.testimonials.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
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
        const starInputs = document.querySelectorAll('.rating-stars input[type="radio"]');
        const ratingValue = document.getElementById('rating-value');
        
        starInputs.forEach(star => {
            if (star.checked) {
                updateStarRating(star.value);
            }
            
            star.addEventListener('change', function() {
                updateStarRating(this.value);
            });
        });
        
        function updateStarRating(value) {
            const stars = document.querySelectorAll('.rating-stars label i');
            stars.forEach((star, index) => {
                if (index < value) {
                    star.classList.remove('far');
                    star.classList.add('fas', 'text-yellow-500');
                } else {
                    star.classList.remove('fas', 'text-yellow-500');
                    star.classList.add('far', 'text-gray-300');
                }
            });
            ratingValue.textContent = value + ' Star' + (value > 1 ? 's' : '');
        }
        
        // Image Upload Functionality
        const imageInput = document.getElementById('image');
        const uploadContainer = document.getElementById('image-upload-container');
        const uploadPrompt = document.getElementById('upload-prompt');
        const fileInfo = document.getElementById('file-info');
        const previewImg = document.getElementById('previewImg');
        const fileName = document.getElementById('file-name');
        const removeFileBtn = document.getElementById('remove-file');
        const changeImageBtn = document.getElementById('change-image');
        
        uploadContainer.addEventListener('click', function(e) {
            if (e.target === uploadContainer || e.target.closest('#upload-prompt')) {
                imageInput.click();
            }
        });
        
        if (changeImageBtn) {
            changeImageBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                imageInput.click();
            });
        }
        
        if (removeFileBtn) {
            removeFileBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                resetFileInput();
            });
        }
        
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                if (!file.type.match('image.*')) {
                    alert('Please select an image file (JPEG, PNG, etc.)');
                    return;
                }
                
                if (file.size > 2 * 1024 * 1024) {
                    alert('Image size should be less than 2MB');
                    return;
                }
                
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    uploadPrompt.classList.add('hidden');
                    fileInfo.classList.remove('hidden');
                    fileName.textContent = file.name;
                    uploadContainer.classList.add('border-yellow-400', 'bg-yellow-50');
                };
                
                reader.readAsDataURL(file);
            }
        });
        
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadContainer.addEventListener(eventName, preventDefaults, false);
        });
        
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        ['dragenter', 'dragover'].forEach(eventName => {
            uploadContainer.addEventListener(eventName, highlight, false);
        });
        
        ['dragleave', 'drop'].forEach(eventName => {
            uploadContainer.addEventListener(eventName, unhighlight, false);
        });
        
        function highlight() {
            uploadContainer.classList.add('border-yellow-400', 'bg-yellow-50');
        }
        
        function unhighlight() {
            if (!fileInfo.classList.contains('hidden')) {
                uploadContainer.classList.add('border-yellow-400', 'bg-yellow-50');
            } else {
                uploadContainer.classList.remove('border-yellow-400', 'bg-yellow-50');
            }
        }
        
        uploadContainer.addEventListener('drop', handleDrop, false);
        
        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            
            if (files.length) {
                imageInput.files = files;
                const event = new Event('change');
                imageInput.dispatchEvent(event);
            }
        }
        
        function resetFileInput() {
            imageInput.value = '';
            uploadPrompt.classList.remove('hidden');
            fileInfo.classList.add('hidden');
            uploadContainer.classList.remove('border-yellow-400', 'bg-yellow-50');
        }
        
        @if(old('rating'))
            updateStarRating({{ old('rating') }});
        @endif
    });
</script>
@endpush