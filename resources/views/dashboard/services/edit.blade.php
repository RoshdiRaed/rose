@extends('dashboard.layouts.new')

@section('title', __('Edit Service: :name', ['name' => $service->title_en]))


@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <div class="md:flex md:items-center md:justify-between mb-8">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    @if (app()->getLocale() === 'ar')
                        تعديل الخدمة
                    @else
                        Edit Service
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
                                    {{ app()->getLocale() === 'ar' ? $service->title_ar : $service->title_en }}
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
            <div
                class="mt-4 flex md:mt-0 md:ml-4 space-x-3 {{ app()->getLocale() === 'ar' ? 'md:mr-4 space-x-reverse' : '' }}">
                <a href="{{ route('dashboard.services.index') }}"
                    class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-all duration-200 transform hover:-translate-y-0.5">
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
                <form action="{{ route('dashboard.services.delete', $service) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="button"
                        onclick="confirmDelete(event, '{{ app()->getLocale() === 'ar' ? 'هل أنت متأكد أنك تريد حذف' : 'Are you sure you want to delete' }} <strong>{{ $service->title_en }}</strong> ({{ $service->title_ar }})? {{ app()->getLocale() === 'ar' ? 'لا يمكن التراجع عن هذا الإجراء.' : 'This action cannot be undone.' }}')"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-200 transform hover:-translate-y-0.5">
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

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <form action="{{ route('dashboard.services.update', $service) }}" method="POST">
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
                                            value="{{ old('title_en', $service->title_en) }}" required>
                                        @error('title_en')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

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
                                            value="{{ old('title_ar', $service->title_ar) }}" required>
                                        @error('title_ar')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

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
                                            required>{{ old('description_en', $service->description_en) }}</textarea>
                                        @error('description_en')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

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
                                            required>{{ old('description_ar', $service->description_ar) }}</textarea>
                                        @error('description_ar')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

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
                                                class="fas fa-{{ old('icon', $service->icon) }} text-gray-400"></i>
                                        </span>
                                        <input type="text" name="icon" id="icon"
                                            value="{{ old('icon', $service->icon) }}"
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
                            <div
                                class="flex justify-end space-x-3 {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : '' }}">
                                <a href="{{ route('dashboard.services.index') }}"
                                    class="inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-all duration-200 transform hover:-translate-y-0.5">
                                    @if (app()->getLocale() === 'ar')
                                        إلغاء
                                    @else
                                        Cancel
                                    @endif
                                </a>
                                <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-all duration-200 transform hover:-translate-y-0.5">
                                    <svg class="-ml-1 mr-2 h-5 w-5 {{ app()->getLocale() === 'ar' ? '-mr-1 ml-2' : '' }}"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    @if (app()->getLocale() === 'ar')
                                        تحديث الخدمة
                                    @else
                                        Update Service
                                    @endif
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

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
                                    حذف الخدمة
                                @else
                                    Delete Service
                                @endif
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-600" id="deleteConfirmationMessage"></p>
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
            .form-container {
                border-collapse: separate;
                border-spacing: 0;
                border-radius: 0.5rem;
                overflow: hidden;
            }

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

            /* RTL adjustments for form and modal */
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

            @media (max-width: 640px) {
                .modal-content {
                    max-width: 90%;
                }
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const iconInput = document.getElementById('icon');
                const iconPreview = document.getElementById('icon-preview');

                iconInput.addEventListener('input', function() {
                    updateIconPreview();
                });

                updateIconPreview();

                function updateIconPreview() {
                    const iconValue = iconInput.value.trim() || 'cog';
                    Array.from(iconPreview.classList).forEach(className => {
                        if (className.startsWith('fa-')) {
                            iconPreview.classList.remove(className);
                        }
                    });
                    iconPreview.classList.add('fa-' + iconValue);
                    iconPreview.setAttribute('title', 'fa-' + iconValue);
                }
            });

            function confirmDelete(event, message) {
                event.preventDefault();
                const form = event.target.closest('form');
                document.getElementById('deleteForm').action = form.action;
                document.getElementById('deleteConfirmationMessage').innerHTML = message;
                const modal = document.getElementById('deleteConfirmationModal');
                modal.classList.remove('hidden');
                modal.querySelector('button[type="submit"]').focus();
                document.body.classList.add('overflow-hidden');
            }

            function closeModal(modalId) {
                const modal = document.getElementById(modalId);
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }

            window.addEventListener('click', function(event) {
                if (event.target.classList.contains('modal-backdrop')) {
                    document.querySelectorAll('.fixed.inset-0.overflow-y-auto').forEach(modal => {
                        modal.classList.add('hidden');
                    });
                    document.body.classList.remove('overflow-hidden');
                }
            });

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
