@extends('dashboard.layouts.new')

@section('title', __('Edit Portfolio Item: :name', ['name' => $portfolio->title_en]))

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <!-- Page Header -->
        <div class="md:flex md:items-center md:justify-between mb-8">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    @if (app()->getLocale() === 'ar')
                        تعديل عنصر المحفظة
                    @else
                        Edit Portfolio Item
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
                                    {{ app()->getLocale() === 'ar' ? $portfolio->title_ar : $portfolio->title_en }}
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
            <div
                class="mt-4 flex md:mt-0 md:ml-4 space-x-3 {{ app()->getLocale() === 'ar' ? 'md:mr-4 space-x-reverse' : '' }}">
                <a href="{{ route('dashboard.portfolio.index') }}"
                    class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-all duration-200 transform hover:-translate-y-0.5">
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
                <form action="{{ route('dashboard.portfolio.delete', $portfolio) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="button"
                        onclick="confirmDelete(event, '{{ app()->getLocale() === 'ar' ? 'هل أنت متأكد أنك تريد حذف' : 'Are you sure you want to delete' }} <strong>{{ app()->getLocale() === 'ar' ? $portfolio->title_ar : $portfolio->title_en }}</strong> ({{ app()->getLocale() === 'ar' ? $portfolio->title_en : $portfolio->title_ar }})? {{ app()->getLocale() === 'ar' ? 'لا يمكن التراجع عن هذا الإجراء.' : 'This action cannot be undone.' }}')"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-200 transform hover:-translate-y-0.5">
                        <svg class="-ml-1 mr-2 h-5 w-5 {{ app()->getLocale() === 'ar' ? '-mr-1 ml-2' : '' }}"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                        @if (app()->getLocale() === 'ar')
                            حذف
                        @else
                            Delete
                        @endif
                    </button>
                </form>
            </div>
        </div>

        <!-- Form -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <form action="{{ route('dashboard.portfolio.update', $portfolio) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                                            value="{{ old('title_en', $portfolio->title_en) }}" required>
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
                                            value="{{ old('title_ar', $portfolio->title_ar) }}" required>
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
                                            required>{{ old('description_en', $portfolio->description_en) }}</textarea>
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
                                            required>{{ old('description_ar', $portfolio->description_ar) }}</textarea>
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
                                            value="{{ old('category', $portfolio->category) }}" required>
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
                                    </label>
                                    <div
                                        class="mt-1 flex items-center space-x-4 {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : '' }}">
                                        <div id="imagePreview"
                                            class="mr-4 {{ app()->getLocale() === 'ar' ? 'ml-4' : '' }}">
                                            @if ($portfolio->image)
                                                <img id="previewImage" src="{{ asset('storage/' . $portfolio->image) }}"
                                                    alt="{{ app()->getLocale() === 'ar' ? $portfolio->title_ar : $portfolio->title_en }}"
                                                    class="h-32 w-32 object-cover rounded-md">
                                            @else
                                                <div
                                                    class="h-32 w-32 bg-gray-200 rounded-md flex items-center justify-center">
                                                    <svg class="h-12 w-12 text-gray-400" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1"
                                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="flex-1">
                                            <div
                                                class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md @error('image') border-red-300 @enderror">
                                                <div class="space-y-1 text-center">
                                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor"
                                                        fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                        <path
                                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                    <div class="flex text-sm text-gray-600">
                                                        <label for="image"
                                                            class="relative cursor-pointer bg-white rounded-md font-medium text-yellow-600 hover:text-yellow-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-yellow-500">
                                                            <span>
                                                                @if (app()->getLocale() === 'ar')
                                                                    تغيير الصورة
                                                                @else
                                                                    Change Image
                                                                @endif
                                                            </span>
                                                            <input id="image" name="image" type="file"
                                                                class="sr-only" accept="image/png,image/jpeg,image/gif">
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-5">
                            <div
                                class="flex justify-end space-x-3 {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : '' }}">
                                <a href="{{ route('dashboard.portfolio.index') }}"
                                    class="inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-all duration-200 transform hover:-translate-y-0.5">
                                    @if (app()->getLocale() === 'ar')
                                        إلغاء
                                    @else
                                        Cancel
                                    @endif
                                </a>
                                <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-all duration-200 transform hover:-translate-y-0.5">
                                    @if (app()->getLocale() === 'ar')
                                        تحديث عنصر المحفظة
                                    @else
                                        Update Portfolio Item
                                    @endif
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Delete Confirmation Modal -->
        <div id="deleteConfirmationModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title"
            role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity modal-backdrop" aria-hidden="true">
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-md sm:w-full sm:p-6 modal-content">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div
                            class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left {{ app()->getLocale() === 'ar' ? 'sm:mr-4 sm:text-right' : '' }}">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                @if (app()->getLocale() === 'ar')
                                    حذف عنصر المحفظة
                                @else
                                    Delete Portfolio Item
                                @endif
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-600" id="deleteConfirmationMessage">
                                    <!-- Dynamic message will be set by JavaScript -->
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse {{ app()->getLocale() === 'ar' ? 'sm:flex-row' : '' }}">
                        <form id="deleteForm" method="POST"
                            class="sm:ml-3 {{ app()->getLocale() === 'ar' ? 'sm:mr-3' : '' }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:w-auto sm:text-sm transition-all duration-200 transform hover:-translate-y-0.5">
                                @if (app()->getLocale() === 'ar')
                                    حذف
                                @else
                                    Delete
                                @endif
                            </button>
                        </form>
                        <button type="button" onclick="closeModal('deleteConfirmationModal')"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 sm:mt-0 sm:w-auto sm:text-sm transition-all duration-200 transform hover:-translate-y-0.5">
                            @if (app()->getLocale() === 'ar')
                                إلغاء
                            @else
                                Cancel
                            @endif
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            /* Form enhancements */
            .form-container {
                border-collapse: separate;
                border-spacing: 0;
                border-radius: 0.5rem;
                overflow: hidden;
            }

            /* Modal enhancements */
            .modal-backdrop {
                backdrop-filter: blur(6px);
            }

            .modal-content {
                transform: scale(0.95);
                transition: transform 0.3s ease, opacity 0.3s ease;
            }

            .modal-content.active {
                transform: scale(1);
            }

            /* Responsive adjustments */
            @media (max-width: 640px) {
                .modal-content {
                    max-width: 90%;
                }
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
                        let previewImage = document.getElementById('previewImage');

                        if (!previewImage) {
                            // Create preview image if it doesn't exist
                            previewImage = document.createElement('img');
                            previewImage.id = 'previewImage';
                            previewImage.className = 'h-32 w-32 object-cover rounded-md';
                            previewContainer.innerHTML = '';
                            previewContainer.appendChild(previewImage);
                        }

                        previewImage.src = e.target.result;
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            // Add event listener for file input change
            document.getElementById('image').addEventListener('change', function() {
                readURL(this);
            });

            // Modal functions
            function confirmDelete(event, message) {
                event.preventDefault();
                const form = event.target.closest('form');
                document.getElementById('deleteForm').action = form.action;
                document.getElementById('deleteConfirmationMessage').innerHTML = message;
                const modal = document.getElementById('deleteConfirmationModal');
                modal.classList.remove('hidden');
                modal.querySelector('button[type="submit"]').focus(); // Focus on delete button for accessibility
                document.body.classList.add('overflow-hidden');
            }

            function closeModal(modalId) {
                const modal = document.getElementById(modalId);
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }

            // Close modal on outside click
            window.addEventListener('click', function(event) {
                if (event.target.classList.contains('modal-backdrop')) {
                    document.querySelectorAll('.fixed.inset-0.overflow-y-auto').forEach(modal => {
                        modal.classList.add('hidden');
                    });
                    document.body.classList.remove('overflow-hidden');
                }
            });

            // Close modal on Escape key
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    document.querySelectorAll('.fixed.inset-0.overflow-y-auto').forEach(modal => {
                        modal.classList.add('hidden');
                    });
                    document.body.classList.remove('overflow-hidden');
                }
            });
        </script>
    @endpush
@endsection
