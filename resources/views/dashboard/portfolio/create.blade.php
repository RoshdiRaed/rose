@extends('dashboard.layouts.new')

@section('title', __('Add New Portfolio Item'))

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <!-- Page Header -->
        <div class="md:flex md:items-center md:justify-between mb-6">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    @if (app()->getLocale() === 'ar')
                        إضافة عنصر محفظة جديد
                    @else
                        Add New Portfolio Item
                    @endif
                </h2>
                <nav class="flex" aria-label="{{ app()->getLocale() === 'ar' ? 'مسار التنقل' : 'Breadcrumb' }}">
                    <ol class="flex items-center space-x-4 {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : '' }}">
                        <li>
                            <div>
                                <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-gray-700">
                                    <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                    </svg>
                                    <span class="sr-only">
                                        @if (app()->getLocale() === 'ar')
                                            الرئيسية
                                        @else
                                            Home
                                        @endif
                                    </span>
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
                                <a href="{{ route('dashboard.portfolio.index') }}"
                                    class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700 {{ app()->getLocale() === 'ar' ? 'mr-4' : '' }}">
                                    @if (app()->getLocale() === 'ar')
                                        المحفظة
                                    @else
                                        Portfolio
                                    @endif
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
                                    @if (app()->getLocale() === 'ar')
                                        إضافة جديد
                                    @else
                                        Add New
                                    @endif
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4 {{ app()->getLocale() === 'ar' ? 'md:mr-4' : '' }}">
                <a href="{{ route('dashboard.portfolio.index') }}"
                    class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500 {{ app()->getLocale() === 'ar' ? '-mr-1 ml-2' : '' }}"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    @if (app()->getLocale() === 'ar')
                        العودة إلى المحفظة
                    @else
                        Back to Portfolio
                    @endif
                </a>
            </div>
        </div>

        <!-- Form -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <form action="{{ route('dashboard.portfolio.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="px-4 py-5 sm:p-6">
                    @if (session('success'))
                        <div class="mb-6 rounded-md bg-green-50 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3 {{ app()->getLocale() === 'ar' ? 'mr-3' : '' }}">
                                    <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="space-y-8 divide-y divide-gray-200">
                        <div>
                            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                <!-- English Title -->
                                <div class="sm:col-span-3">
                                    <label for="title_en" class="block text-sm font-medium text-gray-700">
                                        @if (app()->getLocale() === 'ar')
                                            العنوان بالإنجليزية
                                        @else
                                            English Title
                                        @endif
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" name="title_en" id="title_en" autocomplete="off"
                                            class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border-gray-300 rounded-md @error('title_en') border-red-300 @enderror"
                                            value="{{ old('title_en') }}" required>
                                        @error('title_en')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Arabic Title -->
                                <div class="sm:col-span-3">
                                    <label for="title_ar" class="block text-sm font-medium text-gray-700">
                                        @if (app()->getLocale() === 'ar')
                                            العنوان بالعربية
                                        @else
                                            Arabic Title
                                        @endif
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" name="title_ar" id="title_ar" autocomplete="off"
                                            dir="rtl"
                                            class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border-gray-300 rounded-md text-right @error('title_ar') border-red-300 @enderror"
                                            value="{{ old('title_ar') }}" required>
                                        @error('title_ar')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- English Description -->
                                <div class="sm:col-span-3">
                                    <label for="description_en" class="block text-sm font-medium text-gray-700">
                                        @if (app()->getLocale() === 'ar')
                                            الوصف بالإنجليزية
                                        @else
                                            English Description
                                        @endif
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <div class="mt-1">
                                        <textarea id="description_en" name="description_en" rows="3"
                                            class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border border-gray-300 rounded-md @error('description_en') border-red-300 @enderror"
                                            required>{{ old('description_en') }}</textarea>
                                        @error('description_en')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Arabic Description -->
                                <div class="sm:col-span-3">
                                    <label for="description_ar" class="block text-sm font-medium text-gray-700">
                                        @if (app()->getLocale() === 'ar')
                                            الوصف بالعربية
                                        @else
                                            Arabic Description
                                        @endif
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <div class="mt-1">
                                        <textarea id="description_ar" name="description_ar" rows="3" dir="rtl"
                                            class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border border-gray-300 rounded-md text-right @error('description_ar') border-red-300 @enderror"
                                            required>{{ old('description_ar') }}</textarea>
                                        @error('description_ar')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Category -->
                                <div class="sm:col-span-3">
                                    <label for="category" class="block text-sm font-medium text-gray-700">
                                        @if (app()->getLocale() === 'ar')
                                            الفئة
                                        @else
                                            Category
                                        @endif
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" name="category" id="category" autocomplete="off"
                                            class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border-gray-300 rounded-md @error('category') border-red-300 @enderror"
                                            value="{{ old('category') }}" required>
                                        @error('category')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Image Upload -->
                                <div class="sm:col-span-6">
                                    <label class="block text-sm font-medium text-gray-700">
                                        @if (app()->getLocale() === 'ar')
                                            صورة المحفظة
                                        @else
                                            Portfolio Image
                                        @endif
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <div
                                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md @error('image') border-red-300 @enderror">
                                        <div class="space-y-1 text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor"
                                                fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path
                                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <div class="flex text-sm text-gray-600">
                                                <label for="image"
                                                    class="relative cursor-pointer bg-white rounded-md font-medium text-yellow-600 hover:text-yellow-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-yellow-500">
                                                    <span>
                                                        @if (app()->getLocale() === 'ar')
                                                            رفع ملف
                                                        @else
                                                            Upload a file
                                                        @endif
                                                    </span>
                                                    <input id="image" name="image" type="file" class="sr-only"
                                                        accept="image/png,image/jpeg,image/gif" required>
                                                </label>
                                                <p class="pl-1 {{ app()->getLocale() === 'ar' ? 'pr-1' : '' }}">
                                                    @if (app()->getLocale() === 'ar')
                                                        أو اسحب وأفلت
                                                    @else
                                                        or drag and drop
                                                    @endif
                                                </p>
                                            </div>
                                            <p class="text-xs text-gray-500">
                                                @if (app()->getLocale() === 'ar')
                                                    PNG، JPG، GIF حتى 5 ميجابايت
                                                @else
                                                    PNG, JPG, GIF up to 5MB
                                                @endif
                                            </p>
                                            @error('image')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div id="imagePreview" class="mt-2 hidden">
                                        <img id="previewImage" class="h-32 w-full object-cover rounded-md"
                                            alt="{{ app()->getLocale() === 'ar' ? 'معاينة صورة المحفظة' : 'Portfolio image preview' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-5">
                        <div
                            class="flex justify-end space-x-3 {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : '' }}">
                            <a href="{{ route('dashboard.portfolio.index') }}"
                                class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                @if (app()->getLocale() === 'ar')
                                    إلغاء
                                @else
                                    Cancel
                                @endif
                            </a>
                            <button type="submit"
                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 {{ app()->getLocale() === 'ar' ? 'mr-3' : '' }}">
                                @if (app()->getLocale() === 'ar')
                                    حفظ عنصر المحفظة
                                @else
                                    Save Portfolio Item
                                @endif
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('styles')
        <style>
            /* Custom styles for file input */
            .file-upload {
                position: relative;
                display: inline-block;
            }

            .file-upload__input {
                position: absolute;
                left: 0;
                top: 0;
                right: 0;
                bottom: 0;
                width: 100%;
                opacity: 0;
                cursor: pointer;
            }

            .file-upload__button {
                display: inline-block;
                padding: 0.5rem 1rem;
                background-color: #f59e0b;
                color: white;
                border-radius: 0.375rem;
                cursor: pointer;
            }

            .file-upload__button:hover {
                background-color: #d97706;
            }

            /* RTL adjustments for form */
            [dir="rtl"] .rounded-l-md {
                border-top-left-radius: 0;
                border-bottom-left-radius: 0;
                border-top-right-radius: 0.375rem;
                border-bottom-right-radius: 0.375rem;
            }

            [dir="rtl"] .rounded-r-md {
                border-top-right-radius: 0;
                border-bottom-right-radius: 0;
                border-top-left-radius: 0.375rem;
                border-bottom-left-radius: 0.375rem;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            // Preview image before upload
            function readURL(input) {
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const previewContainer = document.getElementById('imagePreview');
                        const previewImage = document.getElementById('previewImage');
                        previewContainer.classList.remove('hidden');
                        previewImage.src = e.target.result;
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            // Add event listener for file input change
            document.getElementById('image').addEventListener('change', function() {
                readURL(this);
            });
        </script>
    @endpush
@endsection
