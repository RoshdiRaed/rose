@extends('dashboard.layouts.new')

@section('title', __('Manage Portfolio'))

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <!-- Page Header -->
        <div class="md:flex md:items-center md:justify-between mb-8">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    @if (app()->getLocale() === 'ar')
                        عناصر المحفظة
                    @else
                        Portfolio Items
                    @endif
                </h2>
                <p class="mt-1 text-sm text-gray-600">
                    @if (app()->getLocale() === 'ar')
                        إدارة عناصر محفظتك وعرض أعمالك
                    @else
                        Manage your portfolio items and showcase your work
                    @endif
                </p>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4 {{ app()->getLocale() === 'ar' ? 'md:mr-4' : '' }}">
                <a href="{{ route('dashboard.portfolio.create') }}"
                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-all duration-200 transform hover:-translate-y-0.5">
                    <svg class="-ml-1 mr-2 h-5 w-5 {{ app()->getLocale() === 'ar' ? '-mr-1 ml-2' : '' }}"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    @if (app()->getLocale() === 'ar')
                        إضافة عنصر جديد
                    @else
                        Add New Item
                    @endif
                </a>
            </div>
        </div>

        <!-- Portfolio Items -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider {{ app()->getLocale() === 'ar' ? 'text-right' : '' }}">
                                @if (app()->getLocale() === 'ar')
                                    الصورة
                                @else
                                    Image
                                @endif
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider {{ app()->getLocale() === 'ar' ? 'text-right' : '' }}">
                                @if (app()->getLocale() === 'ar')
                                    الإنجليزية
                                @else
                                    English
                                @endif
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider {{ app()->getLocale() === 'ar' ? 'text-right' : '' }}">
                                @if (app()->getLocale() === 'ar')
                                    العربية
                                @else
                                    Arabic
                                @endif
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider {{ app()->getLocale() === 'ar' ? 'text-right' : '' }}">
                                @if (app()->getLocale() === 'ar')
                                    الفئة
                                @else
                                    Category
                                @endif
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                @if (app()->getLocale() === 'ar')
                                    الإجراءات
                                @else
                                    Actions
                                @endif
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($portfolios as $item)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($item->image)
                                        <div
                                            class="flex-shrink-0 h-16 w-16 rounded-md overflow-hidden transform transition-transform duration-200 hover:scale-105">
                                            <img class="h-full w-full object-cover"
                                                src="{{ asset('storage/' . $item->image) }}"
                                                alt="{{ app()->getLocale() === 'ar' ? $item->title_ar : $item->title_en }}">
                                        </div>
                                    @else
                                        <div
                                            class="flex-shrink-0 h-16 w-16 rounded-md bg-gray-100 flex items-center justify-center transform transition-transform duration-200 hover:scale-105">
                                            <svg class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $item->title_en }}</div>
                                    <div class="text-sm text-gray-500 mt-1 line-clamp-2">{{ $item->description_en }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900 text-right" dir="rtl">
                                        {{ $item->title_ar }}</div>
                                    <div class="text-sm text-gray-500 text-right mt-1 line-clamp-2" dir="rtl">
                                        {{ $item->description_ar }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        {{ $item->category }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div
                                        class="flex justify-end space-x-3 {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : '' }}">
                                        <a href="{{ route('dashboard.portfolio.edit', $item) }}"
                                            class="text-yellow-600 hover:text-yellow-800 transition-colors duration-200 transform hover:scale-110"
                                            title="{{ app()->getLocale() === 'ar' ? 'تعديل' : 'Edit' }}"
                                            aria-label="{{ app()->getLocale() === 'ar' ? 'تعديل عنصر المحفظة' : 'Edit portfolio item' }}">
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('dashboard.portfolio.delete', $item) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                onclick="confirmDelete(event, '{{ app()->getLocale() === 'ar' ? 'هل أنت متأكد أنك تريد حذف' : 'Are you sure you want to delete' }} <strong>{{ $item->title_en }}</strong> ({{ $item->title_ar }})? {{ app()->getLocale() === 'ar' ? 'لا يمكن التراجع عن هذا الإجراء.' : 'This action cannot be undone.' }}')"
                                                class="text-red-600 hover:text-red-800 transition-colors duration-200 transform hover:scale-110"
                                                title="{{ app()->getLocale() === 'ar' ? 'حذف' : 'Delete' }}"
                                                aria-label="{{ app()->getLocale() === 'ar' ? 'حذف عنصر المحفظة' : 'Delete portfolio item' }}">
                                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <h3 class="mt-2 text-sm font-semibold text-gray-900">
                                        @if (app()->getLocale() === 'ar')
                                            لا توجد عناصر محفظة
                                        @else
                                            No portfolio items
                                        @endif
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600">
                                        @if (app()->getLocale() === 'ar')
                                            ابدأ بإنشاء عنصر محفظة جديد.
                                        @else
                                            Get started by creating a new portfolio item.
                                        @endif
                                    </p>
                                    <div class="mt-6">
                                        <a href="{{ route('dashboard.portfolio.create') }}"
                                            class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-all duration-200 transform hover:-translate-y-0.5">
                                            <svg class="-ml-1 mr-2 h-5 w-5 {{ app()->getLocale() === 'ar' ? '-mr-1 ml-2' : '' }}"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            @if (app()->getLocale() === 'ar')
                                                إضافة عنصر جديد
                                            @else
                                                Add New Item
                                            @endif
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Delete Confirmation Modal -->
            <div id="deleteConfirmationModal" class="fixed z-10 inset-0 overflow-y-auto hidden"
                aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity modal-backdrop"
                        aria-hidden="true"></div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div
                        class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-md sm:w-full sm:p-6 modal-content">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" aria-hidden="true">
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

            @if ($portfolios->hasPages())
                <div class="bg-gray-50 px-4 py-3 sm:px-6 flex items-center justify-between border-t border-gray-200">
                    <div class="flex-1 flex justify-between sm:hidden">
                        <a href="{{ $portfolios->previousPageUrl() }}"
                            class="{{ $portfolios->onFirstPage() ? 'opacity-50 cursor-not-allowed' : '' }} inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-all duration-200">
                            @if (app()->getLocale() === 'ar')
                                السابق
                            @else
                                Previous
                            @endif
                        </a>
                        <a href="{{ $portfolios->nextPageUrl() }}"
                            class="{{ $portfolios->hasMorePages() ? '' : 'opacity-50 cursor-not-allowed' }} ml-3 inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-all duration-200 {{ app()->getLocale() === 'ar' ? 'mr-3' : '' }}">
                            @if (app()->getLocale() === 'ar')
                                التالي
                            @else
                                Next
                            @endif
                        </a>
                    </div>
                    <div class="hidden sm:flex sm:items-center sm:justify-between w-full">
                        <div>
                            <p class="text-sm text-gray-600">
                                @if (app()->getLocale() === 'ar')
                                    عرض
                                    <span class="font-medium">{{ $portfolios->firstItem() }}</span>
                                    إلى
                                    <span class="font-medium">{{ $portfolios->lastItem() }}</span>
                                    من
                                    <span class="font-medium">{{ $portfolios->total() }}</span>
                                    النتائج
                                @else
                                    Showing
                                    <span class="font-medium">{{ $portfolios->firstItem() }}</span>
                                    to
                                    <span class="font-medium">{{ $portfolios->lastItem() }}</span>
                                    of
                                    <span class="font-medium">{{ $portfolios->total() }}</span>
                                    results
                                @endif
                            </p>
                        </div>
                        <div>
                            <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm {{ app()->getLocale() === 'ar' ? '-space-x-reverse' : '' }}"
                                aria-label="{{ app()->getLocale() === 'ar' ? 'التصفح' : 'Pagination' }}">
                                {{ $portfolios->links('vendor.pagination.tailwind') }}
                            </nav>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @push('styles')
        <style>
            /* Table enhancements */
            table {
                border-collapse: separate;
                border-spacing: 0;
                border-radius: 0.5rem;
                overflow: hidden;
            }

            th,
            td {
                transition: background-color 0.2s ease;
                vertical-align: middle !important;
            }

            th {
                background-color: #f9fafb;
                font-weight: 600;
                letter-spacing: 0.05em;
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

            /* Pagination styling */
            .pagination .page-link {
                position: relative;
                display: block;
                padding: 0.5rem 0.75rem;
                margin-left: -1px;
                line-height: 1.25;
                color: #4b5563;
                background-color: #fff;
                border: 1px solid #d1d5db;
                transition: all 0.2s ease;
            }

            [dir="rtl"] .pagination .page-link {
                margin-left: 0;
                margin-right: -1px;
            }

            .pagination .page-item.active .page-link {
                z-index: 10;
                color: #fff;
                background-color: #f59e0b;
                border-color: #f59e0b;
            }

            .pagination .page-item:not(.disabled) .page-link:hover {
                color: #1f2937;
                background-color: #f3f4f6;
                border-color: #d1d5db;
                transform: translateY(-1px);
            }

            .pagination .page-item.disabled .page-link {
                color: #9ca3af;
                pointer-events: none;
                background-color: #fff;
            }

            .pagination .page-item:first-child .page-link {
                border-top-left-radius: 0.375rem;
                border-bottom-left-radius: 0.375rem;
            }

            .pagination .page-item:last-child .page-link {
                border-top-right-radius: 0.375rem;
                border-bottom-right-radius: 0.375rem;
            }

            [dir="rtl"] .pagination .page-item:first-child .page-link {
                border-top-right-radius: 0.375rem;
                border-bottom-right-radius: 0.375rem;
                border-top-left-radius: 0;
                border-bottom-left-radius: 0;
            }

            [dir="rtl"] .pagination .page-item:last-child .page-link {
                border-top-left-radius: 0.375rem;
                border-bottom-left-radius: 0.375rem;
                border-top-right-radius: 0;
                border-bottom-right-radius: 0;
            }

            /* Responsive adjustments */
            @media (max-width: 640px) {
                table {
                    display: block;
                    overflow-x: auto;
                    -webkit-overflow-scrolling: touch;
                }

                th,
                td {
                    min-width: 150px;
                }

                .modal-content {
                    max-width: 90%;
                }
            }
        </style>
    @endpush

    @push('scripts')
        <script>
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
