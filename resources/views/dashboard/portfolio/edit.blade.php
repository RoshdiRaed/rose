@extends('dashboard.layouts.new')

@section('title', __('Edit Portfolio Item: :name', ['name' => $portfolio->title_en]))

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Page Header -->
    <div class="md:flex md:items-center md:justify-between mb-6">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                {{ __('Edit Portfolio Item') }}
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
                            <a href="{{ route('dashboard.portfolio.index') }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">
                                {{ __('Portfolio') }}
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-4 text-sm font-medium text-gray-500">
                                {{ $portfolio->title_en }}
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4 space-x-3">
            <a href="{{ route('dashboard.portfolio.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                {{ __('Back to Portfolio') }}
            </a>
            <button type="button" onclick="confirmDelete({{ $portfolio->id }})" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
                {{ __('Delete') }}
            </button>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <form action="{{ route('dashboard.portfolio.update', $portfolio) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="px-4 py-5 sm:p-6">
                <div class="space-y-8 divide-y divide-gray-200">
                    <div>
                        <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                            <!-- English Title -->
                            <div class="sm:col-span-3">
                                <label for="title_en" class="block text-sm font-medium text-gray-700">
                                    {{ __('English Title') }} <span class="text-red-500">*</span>
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
                                    {{ __('Arabic Title') }} <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-1">
                                    <input type="text" name="title_ar" id="title_ar" autocomplete="off" dir="rtl"
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
                                    {{ __('English Description') }} <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-1">
                                    <textarea id="description_en" name="description_en" rows="3" 
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
                                    {{ __('Arabic Description') }} <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-1">
                                    <textarea id="description_ar" name="description_ar" rows="3" dir="rtl"
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
                                    {{ __('Category') }} <span class="text-red-500">*</span>
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
                                    {{ __('Portfolio Image') }}
                                </label>
                                <div class="mt-1 flex items-center">
                                    <div class="mr-4">
                                        @if($portfolio->image)
                                            <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title_en }}" class="h-32 w-32 object-cover rounded-md">
                                        @else
                                            <div class="h-32 w-32 bg-gray-200 rounded-md flex items-center justify-center">
                                                <svg class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md @error('image') border-red-300 @enderror">
                                            <div class="space-y-1 text-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <div class="flex text-sm text-gray-600">
                                                    <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-yellow-600 hover:text-yellow-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-yellow-500">
                                                        <span>{{ __('Change Image') }}</span>
                                                        <input id="image" name="image" type="file" class="sr-only">
                                                    </label>
                                                    <p class="pl-1">{{ __('or drag and drop') }}</p>
                                                </div>
                                                <p class="text-xs text-gray-500">
                                                    {{ __('PNG, JPG, GIF up to 5MB') }}
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
                        <div class="flex justify-end">
                            <a href="{{ route('dashboard.portfolio.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                {{ __('Update Portfolio Item') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal{{ $portfolio->id }}" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                <div>
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-5">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            {{ __('Delete Portfolio Item') }}
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                {{ __('Are you sure you want to delete this portfolio item? This action cannot be undone.') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                    <form action="{{ route('dashboard.portfolio.delete', $portfolio) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:col-start-2 sm:text-sm">
                            {{ __('Delete') }}
                        </button>
                    </form>
                    <button type="button" onclick="closeModal({{ $portfolio->id }})" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 sm:mt-0 sm:col-start-1 sm:text-sm">
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
    function readURL(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const preview = document.getElementById('imagePreview');
                if (!preview) {
                    // Create preview container if it doesn't exist
                    const previewContainer = document.createElement('div');
                    previewContainer.id = 'imagePreview';
                    previewContainer.className = 'mt-2';
                    
                    const previewImage = document.createElement('img');
                    previewImage.id = 'previewImage';
                    previewImage.className = 'h-32 w-32 object-cover rounded-md';
                    previewImage.src = e.target.result;
                    
                    previewContainer.appendChild(previewImage);
                    input.parentNode.parentNode.parentNode.appendChild(previewContainer);
                } else {
                    // Update existing preview
                    const previewImage = document.getElementById('previewImage');
                    previewImage.src = e.target.result;
                }
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Add event listener for file input change
    document.getElementById('image').addEventListener('change', function() {
        readURL(this);
    });

    // Modal functions
    function confirmDelete(id) {
        const modal = document.getElementById(`deleteModal${id}`);
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }
    
    function closeModal(id) {
        const modal = document.getElementById(`deleteModal${id}`);
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }
    
    // Close modal when clicking outside
    window.onclick = function(event) {
        if (event.target.classList.contains('bg-gray-500')) {
            const modals = document.querySelectorAll('[id^="deleteModal"]');
            modals.forEach(modal => {
                modal.classList.add('hidden');
            });
            document.body.classList.remove('overflow-hidden');
        }
    }
</script>
@endpush

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
</style>
@endsection

@push('scripts')
<script>
    // Update file input label and show preview
    document.addEventListener('DOMContentLoaded', function() {
        // For image preview
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    imagePreview.classList.remove('d-none');
                }
                
                reader.readAsDataURL(file);
                
                // Update file label
                const fileName = file.name;
                const nextSibling = e.target.nextElementSibling;
                nextSibling.innerText = fileName;
            }
        });
    });
</script>
@endpush
