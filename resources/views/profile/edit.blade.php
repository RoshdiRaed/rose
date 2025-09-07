@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">{{ __('Profile') }}</h1>
        
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">{{ __('Profile') }}</h1>
                <a href="{{ route('dashboard') }}" 
                   class="inline-flex items-center bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold px-4 py-2 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    {{ __('Dashboard') }}
                </a>
            </div>
            <h2 class="text-lg font-semibold mb-4">{{ __('Profile Information') }}</h2>
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-lg font-semibold mb-4">{{ __('Update Password') }}</h2>
            @include('profile.partials.update-password-form')
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-lg font-semibold mb-4 text-red-600">{{ __('Delete Account') }}</h2>
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection