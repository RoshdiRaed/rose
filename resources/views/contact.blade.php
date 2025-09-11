@extends('layouts.app')

@section('title', app()->getLocale() === 'ar' ? 'رويال سيكيوريتي | تواصلوا معنا' : 'Royal Security | Contact')

@section('content')
    <!-- Toast Container -->
    <div id="toast-container" class="fixed top-4 right-4 z-50 space-y-2"></div>

    <!-- Hero Section (Static) -->
    <section
        class="h-96 bg-cover bg-center flex items-center justify-center text-center bg-gradient-to-r from-indigo-900 to-gray-900">
        <div class="max-w-4xl px-6 text-white">
            <h1 class="text-5xl md:text-6xl font-extrabold mb-4 leading-tight">
                {{ app()->getLocale() === 'ar' ? 'تواصلوا معنا' : 'Get in Touch' }}
            </h1>
            <p class="text-lg md:text-xl max-w-2xl mx-auto">
                {{ app()->getLocale() === 'ar' ? 'تواصلوا مع رويال سيكيوريتي لمناقشة احتياجاتكم الأمنية واكتشاف الحلول المخصصة لمؤسستكم.' : 'Contact Royal Security to discuss your security needs and discover tailored solutions for your organization.' }}
            </p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="bg-gray-50 p-8 rounded-xl shadow-lg card-hover">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">
                    {{ app()->getLocale() === 'ar' ? 'أرسل لنا رسالة' : 'Send Us a Message' }}
                </h2>
                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6" id="contact-form">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            {{ app()->getLocale() === 'ar' ? 'الاسم الكامل' : 'Full Name' }}
                        </label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm input-focus @error('name') border-red-500 @enderror"
                            required>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            {{ app()->getLocale() === 'ar' ? 'البريد الإلكتروني' : 'Email Address' }}
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm input-focus @error('email') border-red-500 @enderror"
                            required>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">
                            {{ app()->getLocale() === 'ar' ? 'رقم الهاتف' : 'Phone Number' }}
                        </label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm input-focus @error('phone') border-red-500 @enderror">
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">
                            {{ app()->getLocale() === 'ar' ? 'الرسالة' : 'Message' }}
                        </label>
                        <textarea id="message" name="message" rows="5"
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm input-focus @error('message') border-red-500 @enderror"
                            required>{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <button type="submit"
                            class="btn-primary w-full bg-yellow-400 text-gray-900 px-6 py-3 rounded-lg font-semibold hover:bg-yellow-500 transition-colors duration-200">
                            {{ app()->getLocale() === 'ar' ? 'إرسال الرسالة' : 'Submit Message' }}
                        </button>
                    </div>
                </form>
            </div>
            <!-- Contact Info & Map -->
            <div class="space-y-8">
                @php $contactInfo = \App\Models\ContactInfo::first(); @endphp
                <div class="bg-gray-50 p-8 rounded-xl shadow-lg card-hover">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">
                        {{ app()->getLocale() === 'ar' ? 'معلومات الاتصال' : 'Contact Information' }}
                    </h2>
                    <ul class="space-y-4 text-gray-600">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-yellow-400 mr-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>
                                {{ app()->getLocale() === 'ar' ? ($contactInfo ? $contactInfo->address_ar : 'غزة، فلسطين') : ($contactInfo ? $contactInfo->address_en : 'Gaza Strip, Palestine') }}
                            </span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-yellow-400 mr-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            <a href="tel:{{ $contactInfo ? $contactInfo->phone : '+970-59-999999' }}"
                                class="hover:text-yellow-400">
                                <span dir="ltr">{{ $contactInfo ? $contactInfo->phone : '059999999' }}</span>
                            </a>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-yellow-400 mr-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            <a href="mailto:{{ $contactInfo ? $contactInfo->email : 'info@royalsecurity.ps' }}"
                                class="hover:text-yellow-400">
                                {{ $contactInfo ? $contactInfo->email : 'info@royalsecurity.ps' }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="bg-gray-50 p-8 rounded-xl shadow-lg card-hover">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">
                        {{ app()->getLocale() === 'ar' ? 'موقعنا' : 'Our Location' }}
                    </h2>
                    <div class="h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                        {!! $contactInfo && $contactInfo->map_embed
                            ? $contactInfo->map_embed
                            : '<p class="text-gray-500">' .
                                (app()->getLocale() === 'ar'
                                    ? 'عنصر نائب للخريطة التفاعلية (قم بتضمين خرائط جوجل أو ما شابه هنا)'
                                    : 'Interactive Map Placeholder (Embed Google Maps or similar here)') .
                                '</p>' !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .toast {
            min-width: 300px;
            padding: 1rem 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            transform: translateX(100%);
            transition: all 0.3s ease-in-out;
            margin-bottom: 0.5rem;
        }

        .toast.show {
            transform: translateX(0);
        }

        .toast-success {
            background-color: #10B981;
            color: white;
        }

        .toast-error {
            background-color: #EF4444;
            color: white;
        }

        .toast-warning {
            background-color: #F59E0B;
            color: white;
        }

        .toast-info {
            background-color: #3B82F6;
            color: white;
        }

        .toast-close {
            background: none;
            border: none;
            color: white;
            font-size: 1.25rem;
            cursor: pointer;
            padding: 0;
            margin-left: 1rem;
            opacity: 0.8;
        }

        .toast-close:hover {
            opacity: 1;
        }
    </style>

    <script>
        // Toast functionality
        function showToast(message, type = 'success', duration = 5000) {
            const toastContainer = document.getElementById('toast-container');
            const toast = document.createElement('div');
            toast.className = `toast toast-${type}`;

            toast.innerHTML = `
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="mr-3">
                            ${getToastIcon(type)}
                        </div>
                        <span>${message}</span>
                    </div>
                    <button class="toast-close" onclick="closeToast(this.parentElement.parentElement)">
                        &times;
                    </button>
                </div>
            `;

            toastContainer.appendChild(toast);

            // Show toast with animation
            setTimeout(() => {
                toast.classList.add('show');
            }, 100);

            // Auto remove toast after duration
            setTimeout(() => {
                closeToast(toast);
            }, duration);
        }

        function getToastIcon(type) {
            const icons = {
                success: '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>',
                error: '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>',
                warning: '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>',
                info: '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>'
            };
            return icons[type] || icons.info;
        }

        function closeToast(toast) {
            toast.classList.remove('show');
            setTimeout(() => {
                if (toast.parentElement) {
                    toast.parentElement.removeChild(toast);
                }
            }, 300);
        }

        // Show toast messages from Laravel session
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                showToast("{{ session('success') }}", 'success');
            @endif

            @if (session('error'))
                showToast("{{ session('error') }}", 'error');
            @endif

            @if (session('warning'))
                showToast("{{ session('warning') }}", 'warning');
            @endif

            @if (session('info'))
                showToast("{{ session('info') }}", 'info');
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    showToast("{{ $error }}", 'error');
                @endforeach
            @endif
        });

        // Handle form submission with AJAX (optional)
        document.getElementById('contact-form').addEventListener('submit', function(e) {
            // Uncomment below for AJAX submission
            /*
            e.preventDefault();
            
            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            
            // Disable button and show loading state
            submitBtn.disabled = true;
            submitBtn.textContent = '{{ app()->getLocale() === 'ar' ? 'جاري الإرسال...' : 'Sending...' }}';
            
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast(data.message || '{{ app()->getLocale() === 'ar' ? 'تم إرسال رسالتك بنجاح!' : 'Your message has been sent successfully!' }}', 'success');
                    this.reset(); // Clear form
                } else {
                    showToast(data.message || '{{ app()->getLocale() === 'ar' ? 'حدث خطأ أثناء إرسال الرسالة.' : 'An error occurred while sending your message.' }}', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('{{ app()->getLocale() === 'ar' ? 'حدث خطأ أثناء إرسال الرسالة.' : 'An error occurred while sending your message.' }}', 'error');
            })
            .finally(() => {
                // Re-enable button
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
            });
            */
        });
    </script>
@endsection
