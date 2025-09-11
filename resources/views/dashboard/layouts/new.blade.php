@php
    // Navigation configuration with direct translations
    $navItems = [
        [
            'route' => 'dashboard',
            'active' => request()->routeIs('dashboard'),
            'text' => app()->getLocale() === 'ar' ? 'لوحة التحكم' : 'Dashboard',
            'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'
        ],
        [
            'route' => 'dashboard.services.index',
            'active' => request()->routeIs('dashboard.services.*'),
            'text' => app()->getLocale() === 'ar' ? 'الخدمات' : 'Services',
            'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'
        ],
        [
            'route' => 'dashboard.portfolio.index',
            'active' => request()->routeIs('dashboard.portfolio.*'),
            'text' => app()->getLocale() === 'ar' ? 'الأعمال السابقة' : 'Portfolio',
            'icon' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10'
        ],
        [
            'route' => 'dashboard.testimonials.index',
            'active' => request()->routeIs('dashboard.testimonials.*'),
            'text' => app()->getLocale() === 'ar' ? 'آراء العملاء' : 'Testimonials',
            'icon' => 'M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z'
        ]
    ];
@endphp

{{-- Debug: Current locale is "{{ app()->getLocale() }}" --}}
{{-- Debug: Dashboard translation: {{ __('dashboard.nav.dashboard') }} --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Royal Security') }} - 
        @if(app()->getLocale() === 'ar')
            لوحة التحكم
        @else
            Dashboard
        @endif
    </title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=ibm-plex-sans-arabic:300,400,500,600,700|inter:300,400,500,600,700" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        [x-cloak] { display: none !important; }
        * {
            font-family: 'IBM Plex Sans Arabic', sans-serif;
        }
        /* Adjust spacing for Arabic navigation links */
        [dir="rtl"] .sm\:space-x-8 {
            margin-right: 1.5rem; /* Ensure consistent spacing in RTL */
        }
        [dir="rtl"] .sm\:space-x-8 > * + * {
            margin-right: 2rem; /* Add space between nav items in RTL */
        }
        [dir="rtl"] .nav-link {
            padding-right: 0.5rem;
            padding-left: 0.5rem;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 w-full bg-white shadow-md z-50" x-data="{ isOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('home') }}" class="flex items-center">
                            <img class="h-8 w-auto" src="{{ asset('img/logo.png') }}" alt="Logo">
                            <span class="ml-2 text-xl font-bold text-gray-900">{{ config('app.name') }}</span>
                        </a>
                    </div>

                    <!-- Desktop Navigation Links -->
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-1 rtl:space-x-reverse">
                        @foreach($navItems as $item)
                            <a href="{{ route($item['route']) }}" 
                               class="inline-flex items-center px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ $item['active'] ? 'bg-yellow-50 text-yellow-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}"
                               @if($item['active']) aria-current="page" @endif>
                                <svg class="flex-shrink-0 h-5 w-5 {{ app()->getLocale() === 'ar' ? 'ml-2' : 'mr-2' }}" 
                                     xmlns="http://www.w3.org/2000/svg" 
                                     fill="none" 
                                     viewBox="0 0 24 24" 
                                     stroke="currentColor"
                                     aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}" />
                                </svg>
                                {{ $item['text'] }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Right Side Controls -->
                <div class="flex items-center space-x-4 rtl:space-x-reverse">
                    <!-- Language Switcher -->
                    <div x-data="{ open: false }" class="relative">
                        <button 
                            @click="open = !open"
                            @keydown.escape="open = false"
                            @click.away="open = false"
                            class="flex items-center space-x-1 text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 rounded-full p-1"
                            :aria-expanded="open"
                            aria-haspopup="true">
                            <span class="sr-only">{{ __('Change language') }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                            </svg>
                            <span class="hidden sm:inline">{{ strtoupper(app()->getLocale()) }}</span>
                            <svg :class="{'transform rotate-180': open}" class="ml-1 h-4 w-4 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Language dropdown -->
                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
                             role="menu" 
                             aria-orientation="vertical" 
                             tabindex="-1">
                            <div class="py-1" role="none">
                                <form action="{{ route('language.switch', 'en') }}" method="GET" class="block w-full text-left">
                                    @csrf
                                    <button type="submit" class="w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 flex items-center {{ app()->getLocale() === 'en' ? 'bg-gray-100 text-gray-900' : 'text-gray-700' }}" role="menuitem">
                                        <span class="ml-2">English</span>
                                        @if(app()->getLocale() === 'en')
                                            <svg class="ml-auto h-5 w-5 text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        @endif
                                    </button>
                                </form>
                                <form action="{{ route('language.switch', 'ar') }}" method="GET" class="block w-full text-left">
                                    @csrf
                                    <button type="submit" class="w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 flex items-center {{ app()->getLocale() === 'ar' ? 'bg-gray-100 text-gray-900' : 'text-gray-700' }}" role="menuitem">
                                        <span class="ml-2">العربية</span>
                                        @if(app()->getLocale() === 'ar')
                                            <svg class="ml-auto h-5 w-5 text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        @endif
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Profile dropdown -->
                    <div class="ml-3 relative" x-data="{ open: false }">
                        <div>
                            <button @click="open = !open" 
                                    @keydown.escape="open = false"
                                    @click.away="open = false"
                                    type="button" 
                                    class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500" 
                                    :aria-expanded="open"
                                    aria-haspopup="true">
                                <span class="sr-only">
                                    {{ app()->getLocale() === 'ar' ? 'فتح قائمة المستخدم' : 'Open user menu' }}
                                </span>
                                <div class="h-8 w-8 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-600 font-semibold">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                            </button>
                        </div>
                        <!-- Dropdown menu -->
                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50" 
                             role="menu" 
                             aria-orientation="vertical" 
                             tabindex="-1">
                            <a href="{{ route('profile.edit') }}" 
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" 
                               role="menuitem" 
                               tabindex="-1">
                                {{ app()->getLocale() === 'ar' ? 'الملف الشخصي' : 'Profile' }}
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" 
                                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" 
                                        role="menuitem" 
                                        tabindex="-1">
                                    {{ app()->getLocale() === 'ar' ? 'تسجيل الخروج' : 'Log Out' }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="isOpen = !isOpen" 
                            type="button" 
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-yellow-500" 
                            :aria-expanded="isOpen"
                            :aria-label="isOpen ? __('Close main menu') : __('Open main menu')">
                        <!-- Icon when menu is closed -->
                        <svg x-show="!isOpen" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!-- Icon when menu is open -->
                        <svg x-show="isOpen" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div x-show="isOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="sm:hidden" 
             id="mobile-menu"
             x-cloak>
            <div class="pt-2 pb-3 space-y-1">
                @foreach($navItems as $item)
                    <a href="{{ route($item['route']) }}" 
                       class="block pl-3 pr-4 py-2 border-l-4 {{ $item['active'] ? 'bg-yellow-50 border-yellow-500 text-yellow-700' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }} text-base font-medium transition-colors duration-150"
                       @if($item['active']) aria-current="page" @endif>
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 h-5 w-5 {{ app()->getLocale() === 'ar' ? 'ml-2' : 'mr-2' }}" 
                                 xmlns="http://www.w3.org/2000/svg" 
                                 fill="none" 
                                 viewBox="0 0 24 24" 
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}" />
                            </svg>
                            {{ $item['text'] }}
                        </div>
                    </a>
                @endforeach
                
                <!-- Mobile User Menu -->
                <div class="border-t border-gray-200 pt-2 mt-2">
                    <div class="px-4 py-2 flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-10 w-10 rounded-full text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                    <div class="mt-1 space-y-1">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">
                            {{ __('Profile') }}
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
                
                <!-- Mobile Language Switcher -->
                <div class="border-t border-gray-200 pt-2 mt-2">
                    <div class="px-4 py-2 text-sm font-medium text-gray-500">
                        {{ __('Change Language') }}
                    </div>
                    <div class="space-y-1">
                        <form action="{{ route('language.switch', 'en') }}" method="GET" class="block w-full">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 flex items-center {{ app()->getLocale() === 'en' ? 'bg-gray-100 text-gray-900' : 'text-gray-700' }}">
                                <span class="ml-2">English</span>
                                @if(app()->getLocale() === 'en')
                                    <svg class="ml-auto h-5 w-5 text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                @endif
                            </button>
                        </form>
                        <form action="{{ route('language.switch', 'ar') }}" method="GET" class="block w-full">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 flex items-center {{ app()->getLocale() === 'ar' ? 'bg-gray-100 text-gray-900' : 'text-gray-700' }}">
                                <span class="ml-2">العربية</span>
                                @if(app()->getLocale() === 'ar')
                                    <svg class="ml-auto h-5 w-5 text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                @endif
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="pt-24 pb-12">
        @yield('content')
    </main>

    <!-- Footer -->
    <div class="bg-white border-t border-gray-200">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <p class="text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} {{ config('app.name') }}. 
                @if(app()->getLocale() === 'ar')
                    جميع الحقوق محفوظة
                @else
                    All rights reserved.
                @endif
            </p>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true
        });

        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            const isHidden = menu.classList.contains('hidden');
            
            if (isHidden) {
                menu.classList.remove('hidden');
                menu.classList.add('block');
            } else {
                menu.classList.add('hidden');
                menu.classList.remove('block');
            }
        });

        // Profile dropdown toggle
        const userMenuButton = document.getElementById('user-menu-button');
        const userMenu = document.getElementById('user-menu');
        
        if (userMenuButton && userMenu) {
            userMenuButton.addEventListener('click', function() {
                const isHidden = userMenu.classList.contains('hidden');
                
                if (isHidden) {
                    userMenu.classList.remove('hidden');
                    userMenu.classList.add('block');
                } else {
                    userMenu.classList.add('hidden');
                    userMenu.classList.remove('block');
                }
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(event) {
                if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                    userMenu.classList.add('hidden');
                    userMenu.classList.remove('block');
                }
            });
        }
    </script>
    @stack('scripts')
</body>
</html>