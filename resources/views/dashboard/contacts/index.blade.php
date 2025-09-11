@extends('dashboard.layouts.new')

@section('title', __('Contact Form Submissions'))

@push('styles')
    <style>
        /* General Styles */
        body {
            font-family: 'IBM Plex Sans Arabic', sans-serif;
        }

        .message-preview {
            max-width: 300px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            display: inline-block;
        }

        .status-badge {
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
        }

        .status-new {
            background-color: #DBEAFE;
            color: #1E40AF;
        }

        .status-read {
            background-color: #D1FAE5;
            color: #065F46;
        }

        .status-archived {
            background-color: #F3F4F6;
            color: #4B5563;
        }

        /* Enhanced Modal Styles */
        .modal {
            transition: all 0.3s ease;
        }

        .modal-content {
            transform: scale(0.7);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .modal-open .modal-content {
            transform: scale(1);
            opacity: 1;
        }

        .modal-backdrop {
            backdrop-filter: blur(4px);
        }

        .modal-button {
            transition: all 0.2s ease;
        }

        .modal-button:hover {
            transform: translateY(-1px);
        }

        /* RTL Adjustments */
        [dir="rtl"] {
            font-family: 'IBM Plex Sans Arabic', sans-serif;
        }

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

        [dir="rtl"] .space-x-2>*+* {
            margin-left: 0;
            margin-right: 0.5rem;
        }

        [dir="rtl"] .space-x-4>*+* {
            margin-left: 0;
            margin-right: 1rem;
        }

        [dir="rtl"] .ml-4 {
            margin-left: 0;
            margin-right: 1rem;
        }

        [dir="rtl"] .mr-4 {
            margin-right: 0;
            margin-left: 1rem;
        }

        [dir="rtl"] .-ml-1 {
            margin-left: 0;
            margin-right: -0.25rem;
        }

        [dir="rtl"] .mr-2 {
            margin-right: 0;
            margin-left: 0.5rem;
        }

        [dir="rtl"] .pl-3 {
            padding-left: 0;
            padding-right: 0.75rem;
        }

        [dir="rtl"] .pr-8 {
            padding-right: 0;
            padding-left: 2rem;
        }

        /* Name column avatar positioning for RTL */
        [dir="rtl"] .name-column-container {
            display: flex;
            flex-direction: row-reverse;
            align-items: center;
        }

        [dir="rtl"] .name-column-container .avatar {
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
                    {{ __('Contact Form Submissions') }}
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
                                <span
                                    class="ml-4 text-sm font-medium text-gray-500 {{ app()->getLocale() === 'ar' ? 'mr-4' : '' }}">
                                    {{ __('Contact Submissions') }}
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4 {{ app()->getLocale() === 'ar' ? 'md:mr-4' : '' }}">
                <div class="relative">
                    <select id="status-filter"
                        class="appearance-none bg-white border border-gray-300 rounded-md py-2 pl-3 pr-8 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 {{ app()->getLocale() === 'ar' ? 'text-right pr-3 pl-8' : '' }}">
                        <option value="all" {{ ($currentStatus ?? 'all') === 'all' ? 'selected' : '' }}>
                            {{ __('All Submissions') }}</option>
                        <option value="new" {{ ($currentStatus ?? '') === 'new' ? 'selected' : '' }}>
                            {{ __('New') }}</option>
                        <option value="read" {{ ($currentStatus ?? '') === 'read' ? 'selected' : '' }}>
                            {{ __('Read') }}</option>
                        <option value="archived" {{ ($currentStatus ?? '') === 'archived' ? 'selected' : '' }}>
                            {{ __('Archived') }}</option>
                    </select>
                    <div
                        class="pointer-events-none absolute inset-y-0 {{ app()->getLocale() === 'ar' ? 'left-0' : 'right-0' }} flex items-center px-2 text-gray-700">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4 mb-6">
            <!-- Total Submissions -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1 {{ app()->getLocale() === 'ar' ? 'mr-5' : '' }}">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">{{ __('Total Submissions') }}</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900" data-count="total">
                                        {{ $totalSubmissions }}
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- New Submissions -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1 {{ app()->getLocale() === 'ar' ? 'mr-5' : '' }}">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">{{ __('New') }}</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900" data-count="new">
                                        {{ $newCount }}
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Read Submissions -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1 {{ app()->getLocale() === 'ar' ? 'mr-5' : '' }}">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">{{ __('Read') }}</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900" data-count="read">
                                        {{ $readCount }}
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Archived Submissions -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-gray-500 rounded-md p-3">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1 {{ app()->getLocale() === 'ar' ? 'mr-5' : '' }}">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">{{ __('Archived') }}</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900" data-count="archived">
                                        {{ $archivedCount }}
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submissions Table -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
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
                                <p class="text-sm font-medium text-green-800">
                                    {{ session('success') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider {{ app()->getLocale() === 'ar' ? 'text-right' : '' }}">
                                    {{ __('Name') }}
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider {{ app()->getLocale() === 'ar' ? 'text-right' : '' }}">
                                    {{ __('Contact') }}
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider {{ app()->getLocale() === 'ar' ? 'text-right' : '' }}">
                                    {{ __('Message') }}
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider {{ app()->getLocale() === 'ar' ? 'text-right' : '' }}">
                                    {{ __('Status') }}
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider {{ app()->getLocale() === 'ar' ? 'text-right' : '' }}">
                                    {{ __('Submitted') }}
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">{{ __('Actions') }}</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($submissions as $submission)
                                <tr id="submission-{{ $submission->id }}"
                                    class="hover:bg-gray-50 {{ $submission->status === 'new' ? 'bg-blue-50' : '' }}">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div
                                            class="name-column-container flex items-center {{ app()->getLocale() === 'ar' ? 'flex-row-reverse' : '' }}">
                                            <div
                                                class="flex-shrink-0 h-10 w-10 rounded-full bg-yellow-100 flex items-center justify-center avatar {{ app()->getLocale() === 'ar' ? 'ml-4' : 'mr-4' }}">
                                                <span
                                                    class="text-yellow-600 font-medium">{{ strtoupper(substr($submission->name, 0, 1)) }}</span>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $submission->name }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{ $submission->subject ?? __('No Subject') }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            <a href="mailto:{{ $submission->email }}"
                                                class="text-yellow-600 hover:text-yellow-900">
                                                {{ $submission->email }}
                                            </a>
                                        </div>
                                        @if ($submission->phone)
                                            <div class="text-sm text-gray-500">
                                                <a href="tel:{{ $submission->phone }}" class="hover:text-gray-700">
                                                    {{ $submission->phone }}
                                                </a>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900 message-preview"
                                            title="{{ $submission->message }}"
                                            dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                            {{ Str::limit(strip_tags($submission->message), 70) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="status-badge status-{{ $submission->status }}">
                                            {{ __(ucfirst($submission->status)) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="tooltip"
                                            data-tooltip="{{ $submission->created_at->format(app()->getLocale() === 'ar' ? 'j F Y \في h:i ص' : 'F j, Y \a\t g:i A') }}">
                                            {{ $submission->created_at->diffForHumans() }}
                                        </div>
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium {{ app()->getLocale() === 'ar' ? 'text-left' : '' }}">
                                        <div
                                            class="flex items-center justify-end space-x-2 {{ app()->getLocale() === 'ar' ? 'justify-start space-x-reverse' : '' }}">
                                            @if ($submission->status !== 'read')
                                                <button onclick="confirmMarkAsRead({{ $submission->id }}, event);"
                                                    class="text-blue-600 hover:text-blue-900"
                                                    title="{{ __('Mark as Read') }}">
                                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </button>
                                            @endif
                                            @if ($submission->status !== 'archived')
                                                <button onclick="confirmArchive({{ $submission->id }}, event);"
                                                    class="text-yellow-600 hover:text-yellow-900"
                                                    title="{{ __('Archive') }}">
                                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <button onclick="viewMessage({{ $submission->id }})"
                                                class="text-yellow-600 hover:text-yellow-900"
                                                title="{{ __('View Message') }}">
                                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button>

                                            <a href="mailto:{{ $submission->email }}"
                                                class="text-blue-600 hover:text-blue-900" title="{{ __('Reply') }}">
                                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                </svg>
                                            </a>

                                            <form action="{{ route('contact-submissions.destroy', $submission->id) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    onclick="confirmDelete(event, '{{ __('Are you sure you want to delete this submission?') }}')"
                                                    class="text-red-600 hover:text-red-900" title="{{ __('Delete') }}">
                                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Message Modal -->
                                <div id="messageModal{{ $submission->id }}"
                                    class="fixed z-10 inset-0 overflow-y-auto hidden modal" aria-labelledby="modal-title"
                                    role="dialog" aria-modal="true">
                                    <div
                                        class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity modal-backdrop"
                                            aria-hidden="true"></div>
                                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                            aria-hidden="true">&#8203;</span>
                                        <div
                                            class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full sm:p-6 modal-content">
                                            <div>
                                                <div class="flex justify-between items-start">
                                                    <div>
                                                        <h3 class="text-lg leading-6 font-medium text-gray-900"
                                                            id="modal-title"
                                                            dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                                            {{ $submission->subject ?? __('Message from :name', ['name' => $submission->name]) }}
                                                        </h3>
                                                        <p class="mt-1 text-sm text-gray-500">
                                                            {{ $submission->created_at->format(app()->getLocale() === 'ar' ? 'j F Y \في h:i ص' : 'F j, Y \a\t g:i A') }}
                                                        </p>
                                                    </div>
                                                    <button type="button"
                                                        onclick="closeModal('messageModal{{ $submission->id }}')"
                                                        class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 modal-button">
                                                        <span class="sr-only">{{ __('Close') }}</span>
                                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="mt-6 border-t border-gray-200 pt-4">
                                                    <div
                                                        class="name-column-container flex items-center {{ app()->getLocale() === 'ar' ? 'flex-row-reverse' : '' }}">
                                                        <div
                                                            class="flex-shrink-0 h-10 w-10 rounded-full bg-yellow-100 flex items-center justify-center avatar {{ app()->getLocale() === 'ar' ? 'ml-4' : 'mr-4' }}">
                                                            <span
                                                                class="text-yellow-600 font-medium">{{ strtoupper(substr($submission->name, 0, 1)) }}</span>
                                                        </div>
                                                        <div>
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ $submission->name }}
                                                            </div>
                                                            <div
                                                                class="text-sm text-gray-500 {{ app()->getLocale() === 'ar' ? 'flex flex-row-reverse' : '' }}">
                                                                <a href="mailto:{{ $submission->email }}"
                                                                    class="text-yellow-600 hover:text-yellow-900">
                                                                    {{ $submission->email }}
                                                                </a>
                                                                @if ($submission->phone)
                                                                    <span class="mx-1">•</span>
                                                                    <a href="tel:{{ $submission->phone }}"
                                                                        class="text-gray-600 hover:text-gray-900">
                                                                        {{ $submission->phone }}
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <div class="text-sm text-gray-700 whitespace-pre-line"
                                                            dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                                            {{ $submission->message }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense {{ app()->getLocale() === 'ar' ? 'sm:grid-flow-row-dense-reverse' : '' }}">
                                                <a href="mailto:{{ $submission->email }}"
                                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-yellow-600 text-base font-medium text-white hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 sm:col-start-2 sm:text-sm modal-button">
                                                    <svg class="-ml-1 mr-2 h-5 w-5 {{ app()->getLocale() === 'ar' ? '-mr-1 ml-2' : '' }}"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path
                                                            d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                                    </svg>
                                                    {{ __('Reply') }}
                                                </a>
                                                <button type="button"
                                                    onclick="closeModal('messageModal{{ $submission->id }}')"
                                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 sm:mt-0 sm:col-start-1 sm:text-sm modal-button">
                                                    {{ __('Close') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <div class="text-2xl font-bold text-gray-900" data-count="total">
                                            {{ number_format($totalSubmissions) }}</div>
                                        <div class="mt-1 text-sm text-gray-500">
                                            {{ __('Total Submissions') }}
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($submissions->hasPages())
                    <div class="mt-6">
                        {{ $submissions->links() }}
                    </div>
                @endif
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div id="deleteConfirmationModal" class="fixed z-10 inset-0 overflow-y-auto hidden modal"
            aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity modal-backdrop" aria-hidden="true">
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6 modal-content">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div
                            class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left {{ app()->getLocale() === 'ar' ? 'sm:mr-4 sm:text-right' : '' }}">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                {{ __('Delete Submission') }}
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    {{ __('Are you sure you want to delete this submission? This action cannot be undone.') }}
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
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:w-auto sm:text-sm modal-button">
                                {{ __('Delete') }}
                            </button>
                        </form>
                        <button type="button" onclick="closeModal('deleteConfirmationModal')"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 sm:mt-0 sm:w-auto sm:text-sm modal-button">
                            {{ __('Cancel') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mark as Read Confirmation Modal -->
        <div id="markAsReadConfirmationModal" class="fixed z-10 inset-0 overflow-y-auto hidden modal"
            aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity modal-backdrop" aria-hidden="true">
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6 modal-content">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div
                            class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left {{ app()->getLocale() === 'ar' ? 'sm:mr-4 sm:text-right' : '' }}">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                {{ __('Mark as Read') }}
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    {{ __('Are you sure you want to mark this submission as read?') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse {{ app()->getLocale() === 'ar' ? 'sm:flex-row' : '' }}">
                        <button type="button" id="confirmReadButton"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm modal-button {{ app()->getLocale() === 'ar' ? 'sm:mr-3' : '' }}">
                            {{ __('Mark as Read') }}
                        </button>
                        <button type="button" onclick="closeModal('markAsReadConfirmationModal')"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 sm:mt-0 sm:w-auto sm:text-sm modal-button">
                            {{ __('Cancel') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Archive Confirmation Modal -->
        <div id="archiveConfirmationModal" class="fixed z-10 inset-0 overflow-y-auto hidden modal"
            aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity modal-backdrop" aria-hidden="true">
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6 modal-content">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-yellow-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-yellow-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                            </svg>
                        </div>
                        <div
                            class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left {{ app()->getLocale() === 'ar' ? 'sm:mr-4 sm:text-right' : '' }}">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                {{ __('Archive Submission') }}
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    {{ __('Are you sure you want to archive this submission?') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse {{ app()->getLocale() === 'ar' ? 'sm:flex-row' : '' }}">
                        <button type="button" id="confirmArchiveButton"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-yellow-600 text-base font-medium text-white hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 sm:ml-3 sm:w-auto sm:text-sm modal-button {{ app()->getLocale() === 'ar' ? 'sm:mr-3' : '' }}">
                            {{ __('Archive') }}
                        </button>
                        <button type="button" onclick="closeModal('archiveConfirmationModal')"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 sm:mt-0 sm:w-auto sm:text-sm modal-button">
                            {{ __('Cancel') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let currentSubmissionId = null;

        // Show confirmation dialog for marking as read
        function confirmMarkAsRead(id, event = null) {
            if (event) event.preventDefault();

            currentSubmissionId = id;
            const modal = document.getElementById('markAsReadConfirmationModal');
            modal.classList.remove('hidden');
            modal.classList.add('modal-open');
            document.body.classList.add('overflow-hidden');

            const confirmButton = document.getElementById('confirmReadButton');
            confirmButton.onclick = function() {
                markAsRead(id, event);
            };
        }

        // Mark as Read function
        function markAsRead(id, event = null) {
            if (event) event.preventDefault();

            const button = document.getElementById('confirmReadButton');
            const originalHtml = button.innerHTML;

            button.disabled = true;
            button.innerHTML =
                '<svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline-block {{ app()->getLocale() === 'ar' ? '-mr-1 ml-2' : '' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> ' +
                '{{ __('Processing...') }}';

            fetch(`/contact-submissions/${id}/read`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        closeModal('markAsReadConfirmationModal');
                        window.location.reload();
                    } else {
                        throw new Error(data.message || '{{ __('Failed to mark as read') }}');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert(error.message || '{{ __('An error occurred. Please try again.') }}');
                    button.disabled = false;
                    button.innerHTML = originalHtml;
                });
        }

        // Show confirmation dialog for archiving
        function confirmArchive(id, event = null) {
            if (event) event.preventDefault();

            currentSubmissionId = id;
            const modal = document.getElementById('archiveConfirmationModal');
            modal.classList.remove('hidden');
            modal.classList.add('modal-open');
            document.body.classList.add('overflow-hidden');

            const confirmButton = document.getElementById('confirmArchiveButton');
            confirmButton.onclick = function() {
                archiveSubmission(id, event);
            };
        }

        // Archive Submission function
        function archiveSubmission(id, event = null) {
            if (event) event.preventDefault();

            const button = document.getElementById('confirmArchiveButton');
            const originalHtml = button.innerHTML;

            button.disabled = true;
            button.innerHTML =
                '<svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline-block {{ app()->getLocale() === 'ar' ? '-mr-1 ml-2' : '' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> ' +
                '{{ __('Processing...') }}';

            fetch(`/contact-submissions/${id}/archive`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        closeModal('archiveConfirmationModal');
                        window.location.reload();
                    } else {
                        throw new Error(data.message || '{{ __('Failed to archive') }}');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert(error.message || '{{ __('An error occurred while archiving. Please try again.') }}');
                    button.disabled = false;
                    button.innerHTML = originalHtml;
                });
        }

        // View Message function
        function viewMessage(id, event = null) {
            if (event) event.preventDefault();

            const modal = document.getElementById(`messageModal${id}`);
            modal.classList.remove('hidden');
            modal.classList.add('modal-open');
            document.body.classList.add('overflow-hidden');

            const row = document.querySelector(`#submission-${id}`);
            if (!row) return;

            const statusBadge = row.querySelector('.status-badge');
            if (statusBadge && statusBadge.textContent.trim() === '{{ __('New') }}') {
                markAsRead(id, event);
            }
        }

        // Helper function to update counts - always refreshes the page for consistency
        function updateCounts() {
            window.location.reload();
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('modal-open');
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }, 300);
        }

        function confirmDelete(event, message) {
            event.preventDefault();
            const form = event.target.closest('form');
            document.getElementById('deleteForm').action = form.action;
            const modal = document.getElementById('deleteConfirmationModal');
            modal.classList.remove('hidden');
            modal.classList.add('modal-open');
            document.body.classList.add('overflow-hidden');
        }

        // Close modals when clicking outside
        window.onclick = function(event) {
            if (event.target.classList.contains('modal-backdrop')) {
                document.querySelectorAll('.fixed.inset-0.overflow-y-auto').forEach(modal => {
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
                document.querySelectorAll('.fixed.inset-0.overflow-y-auto').forEach(modal => {
                    modal.classList.remove('modal-open');
                    setTimeout(() => {
                        modal.classList.add('hidden');
                        document.body.classList.remove('overflow-hidden');
                    }, 300);
                });
            }
        });

        // Filter submissions by status
        document.getElementById('status-filter').addEventListener('change', function() {
            const status = this.value;
            window.location.href = `?status=${status}`;
        });

        // Set the selected status in the filter dropdown
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const status = urlParams.get('status') || 'all';
            document.getElementById('status-filter').value = status;

            // Initialize modals to ensure proper animation state
            document.querySelectorAll('.modal-content').forEach(modal => {
                modal.classList.add('modal-open');
                setTimeout(() => modal.classList.remove('modal-open'), 10);
            });
        });
    </script>
@endpush
