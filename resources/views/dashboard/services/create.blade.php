@extends('dashboard.layouts.new')

@section('title', __('Add New Service'))

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <!-- Page Header -->
        <div class="md:flex md:items-center md:justify-between mb-6">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    @if (app()->getLocale() === 'ar')
                        إضافة خدمة جديدة
                    @else
                        Add New Service
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
                                <a href="{{ route('dashboard.services.index') }}"
                                    class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700 {{ app()->getLocale() === 'ar' ? 'mr-4' : '' }}">
                                    @if (app()->getLocale() === 'ar')
                                        الخدمات
                                    @else
                                        Services
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
                                        إضافة جديدة
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
                <a href="{{ route('dashboard.services.index') }}"
                    class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500 {{ app()->getLocale() === 'ar' ? '-mr-1 ml-2' : '' }}"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    @if (app()->getLocale() === 'ar')
                        العودة إلى الخدمات
                    @else
                        Back to Services
                    @endif
                </a>
            </div>
        </div>

        <!-- Form -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <form action="{{ route('dashboard.services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="px-4 py-5 sm:p-6">
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
                                        <textarea id="description_en" name="description_en" rows="4"
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
                                        <textarea id="description_ar" name="description_ar" rows="4" dir="rtl"
                                            class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border border-gray-300 rounded-md text-right @error('description_ar') border-red-300 @enderror"
                                            required>{{ old('description_ar') }}</textarea>
                                        @error('description_ar')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Icon -->
                                <div class="sm:col-span-6">
                                    <label for="icon" class="block text-sm font-medium text-gray-700">
                                        @if (app()->getLocale() === 'ar')
                                            الأيقونة
                                        @else
                                            Icon
                                        @endif
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <span
                                            class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm {{ app()->getLocale() === 'ar' ? 'rounded-r-md rounded-l-none border-l-0 border-r' : '' }}">
                                            <i id="icon-preview"
                                                class="fas fa-{{ old('icon', 'cog') }} text-gray-400"></i>
                                        </span>
                                        <input type="text" name="icon" id="icon"
                                            value="{{ old('icon', 'cog') }}"
                                            class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none {{ app()->getLocale() === 'ar' ? 'rounded-l-md' : 'rounded-r-md' }} focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm border-gray-300 @error('icon') border-red-300 @enderror"
                                            placeholder="{{ app()->getLocale() === 'ar' ? 'مثال: shield-alt، lock، user-shield' : 'e.g., shield-alt, lock, user-shield' }}"
                                            required>
                                        <span
                                            class="inline-flex items-center px-3 {{ app()->getLocale() === 'ar' ? 'rounded-r-none rounded-l-md border-r-0 border-l' : 'rounded-r-md border-l-0 border-r' }} border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                            <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank"
                                                class="text-yellow-600 hover:text-yellow-500"
                                                title="{{ app()->getLocale() === 'ar' ? 'تصفح الأيقونات' : 'Browse Icons' }}">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </span>
                                    </div>
                                    @error('icon')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-2 text-sm text-gray-500">
                                        @if (app()->getLocale() === 'ar')
                                            أدخل اسم أيقونة Font Awesome (بدون البادئة 'fa-')
                                        @else
                                            Enter a Font Awesome icon name (without the 'fa-' prefix)
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-5">
                            <div class="flex justify-end {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : '' }}">
                                <a href="{{ route('dashboard.services.index') }}"
                                    class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                    @if (app()->getLocale() === 'ar')
                                        إلغاء
                                    @else
                                        Cancel
                                    @endif
                                </a>
                                <button type="submit"
                                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 {{ app()->getLocale() === 'ar' ? 'mr-3' : '' }}">
                                    <svg class="-ml-1 mr-2 h-5 w-5 {{ app()->getLocale() === 'ar' ? '-mr-1 ml-2' : '' }}"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    @if (app()->getLocale() === 'ar')
                                        حفظ الخدمة
                                    @else
                                        Save Service
                                    @endif
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .form-container {
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 0.5rem;
            overflow: hidden;
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
        document.addEventListener('DOMContentLoaded', function() {
            const iconInput = document.getElementById('icon');
            const iconPreview = document.getElementById('icon-preview');

            // Update icon preview on input
            iconInput.addEventListener('input', function() {
                updateIconPreview();
            });

            // Initial update
            updateIconPreview();

            function updateIconPreview() {
                const iconValue = iconInput.value.trim() || 'cog';

                // Remove all classes that start with 'fa-'
                Array.from(iconPreview.classList).forEach(className => {
                    if (className.startsWith('fa-')) {
                        iconPreview.classList.remove(className);
                    }
                });

                // Add the new icon class
                iconPreview.classList.add('fa-' + iconValue);

                // Update the icon preview's title for better accessibility
                iconPreview.setAttribute('title', 'fa-' + iconValue);
            }
        });
    </script>
@endpush
