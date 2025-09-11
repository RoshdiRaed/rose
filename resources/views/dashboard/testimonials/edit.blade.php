@extends('dashboard.layouts.new')

@section('title', __('Edit Testimonial: :name', ['name' => $testimonial->name_en]))

@push('styles')
    <style>
        /* General Styles */
        body {
            font-family: 'IBM Plex Sans Arabic', sans-serif;
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

        [dir="rtl"] .flex {
            direction: rtl;
        }

        [dir="rtl"] .justify-end {
            justify-content: flex-start;
        }

        [dir="rtl"] .space-x-3>*+* {
            margin-left: 0;
            margin-right: 0.75rem;
        }

        [dir="rtl"] .space-x-4>*+* {
            margin-left: 0;
            margin-right: 1rem;
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

        [dir="rtl"] .mr-4 {
            margin-right: 0;
            margin-left: 1rem;
        }

        /* Profile image positioning for RTL */
        [dir="rtl"] .profile-image-container {
            display: flex;
            flex-direction: row-reverse;
            align-items: center;
        }

        [dir="rtl"] .profile-image-container .avatar {
            margin-left: 1rem;
            margin-right: 0;
        }
    </style>
@endpush

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <!-- Page Header -->
        <div class="md:flex md:items-center md:justify-between mb-6">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    {{ __('Edit Testimonial') }}
                </h2>
                <nav class="flex" aria-label="{{ __('Breadcrumb') }}">
                    <ol class="flex items-center space-x-4 {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : '' }}">
                        <li>
                            <div>
                                <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-gray-700">
                                    <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                    </svg>
                                    <span class="sr-only">{{ __('Home') }}</span>
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
                                    {{ $testimonial->name_en }}
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
            <div
                class="mt-4 flex md:mt-0 md:ml-4 space-x-3 {{ app()->getLocale() === 'ar' ? 'md:mr-4 space-x-reverse' : '' }}">
                <a href="{{ route('dashboard.testimonials.index') }}"
                    class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500 {{ app()->getLocale() === 'ar' ? '-mr-1 ml-2' : '' }}"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ __('Back to Testimonials') }}
                </a>
                <button type="button" onclick="confirmDelete({{ $testimonial->id }})"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    <svg class="-ml-1 mr-2 h-5 w-5 {{ app()->getLocale() === 'ar' ? '-mr-1 ml-2' : '' }}"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ __('Delete') }}
                </button>
            </div>
        </div>

        <!-- Form -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <form action="{{ route('dashboard.testimonials.update', $testimonial) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="px-4 py-5 sm:p-6">
                    <div class="space-y-8 divide-y divide-gray-200">
                        <div>
                            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                <!-- English Name -->
                                <div class="sm:col-span-3">
                                    <label for="name_en" class="block text-sm font-medium text-gray-700">
                                        {{ __('English Name') }} <span class="text-red-500">*</span>
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" name="name_en" id="name_en" autocomplete="off"
                                            class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border-gray-300 rounded-md @error('name_en') border-red-300 @enderror"
                                            value="{{ old('name_en', $testimonial->name_en) }}" required>
                                        @error('name_en')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Arabic Name -->
                                <div class="sm:col-span-3">
                                    <label for="name_ar" class="block text-sm font-medium text-gray-700">
                                        {{ __('Arabic Name') }} <span class="text-red-500">*</span>
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" name="name_ar" id="name_ar" autocomplete="off"
                                            dir="rtl"
                                            class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border-gray-300 rounded-md text-right @error('name_ar') border-red-300 @enderror"
                                            value="{{ old('name_ar', $testimonial->name_ar) }}" required>
                                        @error('name_ar')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- English Position -->
                                <div class="sm:col-span-3">
                                    <label for="position_en" class="block text-sm font-medium text-gray-700">
                                        {{ __('English Position') }} <span class="text-red-500">*</span>
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" name="position_en" id="position_en" autocomplete="off"
                                            class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border-gray-300 rounded-md @error('position_en') border-red-300 @enderror"
                                            value="{{ old('position_en', $testimonial->position_en) }}" required>
                                        @error('position_en')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Arabic Position -->
                                <div class="sm:col-span-3">
                                    <label for="position_ar" class="block text-sm font-medium text-gray-700">
                                        {{ __('Arabic Position') }} <span class="text-red-500">*</span>
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" name="position_ar" id="position_ar" autocomplete="off"
                                            dir="rtl"
                                            class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border-gray-300 rounded-md text-right @error('position_ar') border-red-300 @enderror"
                                            value="{{ old('position_ar', $testimonial->position_ar) }}" required>
                                        @error('position_ar')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Rating -->
                                <div class="sm:col-span-3">
                                    <label for="rating" class="block text-sm font-medium text-gray-700">
                                        {{ __('Rating') }} <span class="text-red-500">*</span>
                                    </label>
                                    <div class="mt-1">
                                        <select name="rating" id="rating"
                                            class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border-gray-300 rounded-md @error('rating') border-red-300 @enderror"
                                            required>
                                            @for ($i = 1; $i <= 5; $i++)
                                                <option value="{{ $i }}"
                                                    {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>
                                                    {{ $i }} {{ $i === 1 ? __('Star') : __('Stars') }}
                                                </option>
                                            @endfor
                                        </select>
                                        @error('rating')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Profile Image -->
                                <div class="sm:col-span-3">
                                    <label class="block text-sm font-medium text-gray-700">
                                        {{ __('Profile Image') }}
                                    </label>
                                    <div
                                        class="mt-1 profile-image-container flex items-center {{ app()->getLocale() === 'ar' ? 'flex-row-reverse' : '' }}">
                                        <div class="mr-4 avatar {{ app()->getLocale() === 'ar' ? 'ml-4' : '' }}">
                                            @if ($testimonial->image)
                                                <img src="{{ asset('storage/' . $testimonial->image) }}"
                                                    alt="{{ $testimonial->name_en }}"
                                                    class="h-24 w-24 rounded-full object-cover border-2 border-gray-200">
                                            @else
                                                <div
                                                    class="h-24 w-24 rounded-full bg-gray-200 flex items-center justify-center">
                                                    <svg class="h-12 w-12 text-gray-400" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1"
                                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex">
                                                <input type="file" id="image" name="image" accept="image/*"
                                                    class="hidden" onchange="previewImage(this)">
                                                <label for="image"
                                                    class="cursor-pointer inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500 {{ app()->getLocale() === 'ar' ? '-mr-1 ml-2' : '' }}"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    {{ __('Change') }}
                                                </label>
                                            </div>
                                            <p class="mt-2 text-xs text-gray-500">
                                                {{ __('Recommended size: 200x200px. Max file size: 2MB.') }}
                                            </p>
                                            @error('image')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div id="imagePreview" class="mt-3 hidden">
                                        <p class="text-sm font-medium text-gray-700 mb-1">{{ __('Preview') }}:</p>
                                        <img id="previewImg" src="#" alt="{{ __('Preview') }}"
                                            class="h-24 w-24 rounded-full object-cover border-2 border-yellow-400">
                                    </div>
                                </div>

                                <!-- English Testimonial -->
                                <div class="sm:col-span-6">
                                    <label for="content_en" class="block text-sm font-medium text-gray-700">
                                        {{ __('English Testimonial') }} <span class="text-red-500">*</span>
                                    </label>
                                    <div class="mt-1">
                                        <textarea id="content_en" name="content_en" rows="4"
                                            class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border border-gray-300 rounded-md @error('content_en') border-red-300 @enderror"
                                            required>{{ old('content_en', $testimonial->content_en) }}</textarea>
                                        @error('content_en')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Arabic Testimonial -->
                                <div class="sm:col-span-6">
                                    <label for="content_ar" class="block text-sm font-medium text-gray-700">
                                        {{ __('Arabic Testimonial') }} <span class="text-red-500">*</span>
                                    </label>
                                    <div class="mt-1">
                                        <textarea id="content_ar" name="content_ar" rows="4" dir="rtl"
                                            class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border border-gray-300 rounded-md text-right @error('content_ar') border-red-300 @enderror"
                                            required>{{ old('content_ar', $testimonial->content_ar) }}</textarea>
                                        @error('content_ar')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="pt-5">
                            <div class="flex justify-end {{ app()->getLocale() === 'ar' ? 'justify-start' : '' }}">
                                <a href="{{ route('dashboard.testimonials.index') }}"
                                    class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                    {{ __('Cancel') }}
                                </a>
                                <button type="submit"
                                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 {{ app()->getLocale() === 'ar' ? 'mr-3' : '' }}">
                                    <svg class="-ml-1 mr-2 h-5 w-5 {{ app()->getLocale() === 'ar' ? '-mr-1 ml-2' : '' }}"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ __('Update Testimonial') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Delete Confirmation Modal -->
        <div id="deleteModal{{ $testimonial->id }}" class="fixed z-50 inset-0 overflow-y-auto hidden" 
            aria-labelledby="modal-title" role="dialog" aria-modal="true">
           <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
               <!-- Background overlay -->
               <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" 
                    onclick="closeModal({{ $testimonial->id }})"></div>
               
               <!-- This element is to trick the browser into centering the modal contents. -->
               <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
               
               <!-- Modal panel -->
               <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6"
                    dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                   <div>
                       <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                           <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                               viewBox="0 0 24 24" stroke="currentColor">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                   d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                           </svg>
                       </div>
                       <div class="mt-3 text-center sm:mt-5">
                           <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                               {{ __('Delete Testimonial') }}
                           </h3>
                           <div class="mt-2">
                               <p class="text-sm text-gray-500">
                                   {{ __('Are you sure you want to delete this testimonial? This action cannot be undone.') }}
                               </p>
                               <p class="text-sm font-medium text-gray-700 mt-1">
                                   "{{ $testimonial->name_en }}"
                               </p>
                           </div>
                       </div>
                   </div>
                   
                   <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                       <!-- Delete Button -->
                       <form action="{{ route('dashboard.testimonials.delete', $testimonial) }}" method="POST" 
                             class="inline-block {{ app()->getLocale() === 'ar' ? 'sm:col-start-1' : 'sm:col-start-2' }}">
                           @csrf
                           @method('DELETE')
                           <button type="submit"
                               class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:text-sm transition-colors duration-200">
                               {{ __('Delete') }}
                           </button>
                       </form>
                       
                       <!-- Cancel Button -->
                       <button type="button" onclick="closeModal({{ $testimonial->id }})"
                           class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 sm:mt-0 {{ app()->getLocale() === 'ar' ? 'sm:col-start-2' : 'sm:col-start-1' }} sm:text-sm transition-colors duration-200">
                           {{ __('Cancel') }}
                       </button>
                   </div>
               </div>
           </div>
       </div>
    </div>

    @push('scripts')
        <script>
            // Preview image before upload
            function previewImage(input) {
                const preview = document.getElementById('previewImg');
                const previewContainer = document.getElementById('imagePreview');

                if (input.files && input.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        previewContainer.classList.remove('hidden');
                        previewContainer.classList.add('block');
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            // Close modal when clicking outside
            window.onclick = function(event) {
                if (event.target.classList.contains('modal-backdrop')) {
                    document.querySelectorAll('.modal').forEach(modal => {
                        modal.classList.remove('modal-open');
                        setTimeout(() => {
                            modal.classList.add('hidden');
                            document.body.classList.remove('overflow-hidden');
                        }, 300);
                    });
                }
            };

            // Close modals with Escape key
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    document.querySelectorAll('.modal').forEach(modal => {
                        modal.classList.remove('modal-open');
                        setTimeout(() => {
                            modal.classList.add('hidden');
                            document.body.classList.remove('overflow-hidden');
                        }, 300);
                    });
                }
            });

            // Modal functions
            function confirmDelete(id) {
                const modal = document.getElementById(`deleteModal${id}`);
                modal.classList.remove('hidden');
                modal.classList.add('modal-open');
                document.body.classList.add('overflow-hidden');
            }

            function closeModal(id) {
                const modal = document.getElementById(`deleteModal${id}`);
                modal.classList.remove('modal-open');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                }, 300);
            }
        </script>
    @endpush
@endsection
