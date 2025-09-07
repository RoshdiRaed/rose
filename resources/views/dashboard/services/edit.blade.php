@extends('dashboard.layouts.new')

@section('title', __('Edit Service: :name', ['name' => $service->title_en]))

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Page Header -->
    <div class="md:flex md:items-center md:justify-between mb-6">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                {{ __('Edit Service') }}
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
                            <a href="{{ route('dashboard.services.index') }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">
                                {{ __('Services') }}
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-4 text-sm font-medium text-gray-500">
                                {{ $service->title_en }}
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4 space-x-3">
            <a href="{{ route('dashboard.services.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                {{ __('Back to Services') }}
            </a>
            <button type="button" onclick="confirmDelete({{ $service->id }})" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
                {{ __('Delete') }}
            </button>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <form action="{{ route('dashboard.services.update', $service) }}" method="POST">
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
                                        value="{{ old('title_en', $service->title_en) }}" required>
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
                                        value="{{ old('title_ar', $service->title_ar) }}" required>
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
                                    <textarea id="description_en" name="description_en" rows="4" 
                                        class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border border-gray-300 rounded-md @error('description_en') border-red-300 @enderror"
                                        required>{{ old('description_en', $service->description_en) }}</textarea>
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
                                    <textarea id="description_ar" name="description_ar" rows="4" dir="rtl"
                                        class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border border-gray-300 rounded-md text-right @error('description_ar') border-red-300 @enderror"
                                        required>{{ old('description_ar', $service->description_ar) }}</textarea>
                                    @error('description_ar')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Icon -->
                            <div class="sm:col-span-6">
                                <label for="icon" class="block text-sm font-medium text-gray-700">
                                    {{ __('Icon') }} <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                        <i id="icon-preview" class="fas fa-{{ old('icon', $service->icon) }} text-gray-400"></i>
                                    </span>
                                    <input type="text" name="icon" id="icon" value="{{ old('icon', $service->icon) }}" 
                                        class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm border-gray-300 @error('icon') border-red-300 @enderror"
                                        placeholder="e.g., shield-alt, lock, user-shield" required>
                                    <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                        <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank" class="text-yellow-600 hover:text-yellow-500" title="{{ __('Browse Icons') }}">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </span>
                                </div>
                                @error('icon')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <p class="mt-2 text-sm text-gray-500">{{ __('Enter a Font Awesome icon name (without the \'fa-\' prefix)') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-5">
                        <div class="flex justify-end">
                            <a href="{{ route('dashboard.services.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                {{ __('Update Service') }}
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection

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
