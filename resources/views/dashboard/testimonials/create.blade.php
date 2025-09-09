@extends('dashboard.layouts.new')

@section('title', __('Add New Testimonial'))

@push('styles')
<style>
    .rating-stars {
        display: flex;
        align-items: center;
        gap: 0.5rem; /* Increased spacing between stars */
    }
    .rating-stars input[type="radio"] {
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }
    .rating-stars label {
        cursor: pointer;
        padding: 0.3rem;
        transition: transform 0.3s ease, color 0.3s ease; /* Smoother transition */
    }
    .rating-stars label:hover {
        transform: rotate(15deg); /* Rotate instead of scale on hover */
    }
    .rating-stars .fa-star {
        transition: color 0.3s ease;
        font-size: 1.5rem; /* Larger stars */
        color: #d1d5db; /* Lighter gray for unselected stars */
    }
    .rating-stars input[type="radio"]:checked + label .fa-star {
        color: #eab308; /* Brighter yellow for selected stars */
        font-weight: 900; /* Solid star for selected */
    }
    .rating-stars label:hover .fa-star {
        color: #facc15; /* Slightly lighter yellow for hover */
    }
    .image-upload-container {
        border: 2px dashed #e5e7eb;
        border-radius: 0.5rem;
        padding: 2rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        background-color: #f9fafb;
    }
    .image-upload-container:hover,
    .image-upload-container.dragover {
        border-color: #f59e0b;
        background-color: #fefce8;
    }
    #previewImg {
        width: 64px;
        height: 64px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }
    .image-upload-container:hover #upload-prompt {
        animation: pulse 2s infinite;
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
                        <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-gray-700">
                            <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <span class="sr-only">{{ __('Home') }}</span>
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            <a href="{{ route('dashboard.testimonials.index') }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">
                                {{ __('Testimonials') }}
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
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
                            <div class="sm:col-span-6 pt-6">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-200">
                                    <i class="fas fa-star-half-alt text-yellow-500 mr-2"></i>
                                    {{ __('Rating & Profile Image') }}
                                </h3>
                                <div class="mt-6 grid grid-cols-1 gap-8 sm:grid-cols-2">
                                    <!-- Rating -->
                                    <div class="space-y-3">
                                        <div class="flex items-center justify-between">
                                            <label class="block text-sm font-medium text-gray-700">
                                                {{ __('Rating') }} <span class="text-red-500">*</span>
                                            </label>
                                            <span id="rating-value" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                {{ old('rating') ? old('rating') . ' ' . __('Star') . (old('rating') > 1 ? 's' : '') : __('Not rated') }}
                                            </span>
                                        </div>
                                        <div class="rating-stars flex space-x-1">
                                            @for($i = 1; $i <= 5; $i++)
                                                <div class="relative">
                                                    <input type="radio" 
                                                           id="star{{ $i }}" 
                                                           name="rating" 
                                                           value="{{ $i }}"
                                                           {{ old('rating') == $i ? 'checked' : '' }}
                                                           class="sr-only">
                                                    <label for="star{{ $i }}" class="cursor-pointer">
                                                        <i class="far fa-star text-2xl {{ old('rating') >= $i ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                                    </label>
                                                </div>
                                            @endfor
                                        </div>
                                        @error('rating')
                                            <p class="mt-1 text-sm text-red-600 flex items-center">
                                                <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                            </p>
                                        @enderror
                                        <p class="mt-2 text-sm text-gray-500 flex items-center">
                                            <i class="fas fa-info-circle mr-1.5 text-blue-500"></i>
                                            {{ __('Select a rating from 1 to 5 stars') }}
                                        </p>
                                    </div>

                                    <!-- Image Upload -->
                                    <div class="space-y-3">
                                        <label class="block text-sm font-medium text-gray-700">
                                            {{ __('Profile Image') }}
                                            <span class="text-xs font-normal text-gray-500">({{ __('Optional') }})</span>
                                        </label>
                                        <div class="image-upload-container relative group" id="image-upload-container">
                                            <input type="file" class="hidden" id="image" name="image" accept="image/*">
                                            <div id="upload-prompt" class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center cursor-pointer hover:border-yellow-400 transition-colors duration-200 group-hover:shadow-md">
                                                <div class="space-y-3">
                                                    <div class="mx-auto w-16 h-16 flex items-center justify-center bg-yellow-50 rounded-full group-hover:bg-yellow-100 transition-colors duration-200">
                                                        <i class="fas fa-cloud-upload-alt text-yellow-500 text-2xl"></i>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-medium text-gray-700">
                                                            {{ __('Drag & drop your photo') }}
                                                        </p>
                                                        <p class="text-xs text-gray-500 mt-1">
                                                            {{ __('or click to browse') }}
                                                        </p>
                                                        <p class="text-xs text-gray-400 mt-2">
                                                            {{ __('Recommended: 200x200px (Max: 2MB)') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="file-info" class="hidden">
                                                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                                    <div class="flex items-center space-x-4">
                                                        <div class="relative">
                                                            <img id="previewImg" src="#" alt="Preview" class="w-16 h-16 rounded-full object-cover border-2 border-white shadow-sm">
                                                            <button type="button" id="change-image" class="absolute -bottom-1 -right-1 bg-white rounded-full p-1.5 shadow-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2" title="{{ __('Change image') }}">
                                                                <i class="fas fa-pencil-alt text-yellow-500 text-xs"></i>
                                                            </button>
                                                        </div>
                                                        <div class="flex-1 min-w-0">
                                                            <p id="file-name" class="text-sm font-medium text-gray-900 truncate"></p>
                                                            <div class="mt-1 flex items-center space-x-2">
                                                                <span class="text-xs text-gray-500">
                                                                    <i class="far fa-image mr-1"></i> {{ __('Image') }}
                                                                </span>
                                                                <button type="button" id="remove-file" class="text-xs text-red-500 hover:text-red-700 focus:outline-none flex items-center">
                                                                    <i class="fas fa-trash-alt mr-1"></i> {{ __('Remove') }}
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @error('image')
                                            <p class="mt-1 text-sm text-red-600 flex items-center">
                                                <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                            </p>
                                        @enderror
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
        const ratingStars = document.querySelectorAll('.rating-stars input[type="radio"]');
        const ratingValue = document.getElementById('rating-value');
        let currentRating = {{ old('rating', 0) }};

        function updateStars(rating) {
            ratingStars.forEach((star, index) => {
                const label = star.nextElementSibling;
                const starIcon = label.querySelector('.fa-star');
                if (index < rating) {
                    star.checked = true;
                    starIcon.classList.add('text-yellow-400', 'fas');
                    starIcon.classList.remove('text-gray-300', 'far');
                } else {
                    star.checked = false;
                    starIcon.classList.add('text-gray-300', 'far');
                    starIcon.classList.remove('text-yellow-400', 'fas');
                }
            });
            if (rating > 0) {
                const starsLabel = rating > 1 ? '{{ __("Stars") }}' : '{{ __("Star") }}';
                ratingValue.textContent = `${rating} ${starsLabel}`;
                ratingValue.className = 'inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800';
            } else {
                ratingValue.textContent = '{{ __("Not rated") }}';
                ratingValue.className = 'inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800';
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
                    const hoverStar = hoverLabel.querySelector('.fa-star');
                    if (i < starNumber) {
                        hoverStar.classList.add('text-yellow-300');
                    } else {
                        hoverStar.classList.remove('text-yellow-300');
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
            uploadContainer.classList.remove('border-yellow-400', 'bg-yellow-50');
        });

        imageInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file) {
                if (!file.type.match('image.*')) {
                    alert('{{ __("Please select an image file (JPEG, PNG, etc.)") }}');
                    return;
                }
                if (file.size > 2 * 1024 * 1024) {
                    alert('{{ __("Image size should be less than 2MB") }}');
                    return;
                }
                const reader = new FileReader();
                reader.onload = (e) => {
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
            uploadContainer.addEventListener(eventName, (e) => {
                e.preventDefault();
                e.stopPropagation();
            });
        });

        ['dragenter', 'dragover'].forEach(eventName => {
            uploadContainer.addEventListener(eventName, () => {
                uploadContainer.classList.add('border-yellow-400', 'bg-yellow-50');
            });
        });

        ['dragleave', 'drop'].forEach(eventName => {
            uploadContainer.addEventListener(eventName, () => {
                if (!fileInfo.classList.contains('hidden')) {
                    uploadContainer.classList.add('border-yellow-400', 'bg-yellow-50');
                } else {
                    uploadContainer.classList.remove('border-yellow-400', 'bg-yellow-50');
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

        @if(old('rating'))
            updateStars({{ old('rating') }});
        @endif
    });
</script>
@endpush