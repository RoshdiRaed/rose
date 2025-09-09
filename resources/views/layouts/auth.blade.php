<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Royal Security') }} - {{ __('Login') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .auth-bg {
            background-image: url("{{ asset('/img/9.jpg') }}");
            background-size: cover;
            background-position: center;
            position: relative;
        }
        .auth-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
        }
        .auth-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #f59e0b;
            color: #1f2937;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #d97706;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .form-input {
            border-radius: 0.5rem;
            border: 1px solid #e5e7eb;
            padding: 0.75rem 1rem;
            width: 100%;
            transition: all 0.3s ease;
        }
        .form-input:focus {
            border-color: #f59e0b;
            ring: 2px solid #fde68a;
            outline: none;
        }
        .link {
            color: #f59e0b;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .link:hover {
            color: #d97706;
            text-decoration: underline;
        }
        [dir='rtl'] .rtl\:text-right {
            text-align: right;
        }
    </style>
</head>
<body class="font-sans antialiased">
    @extends('components.navbar')
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">{{ config('app.name', 'Royal Security') }}</h1>
                <p class="mt-2 text-gray-600">{{ __('Sign in to your account') }}</p>
            </div>

            <div class="auth-card p-8">
                @yield('content')
            </div>
        </div>
    </div>
    @extends('layouts.footer')
</body>
</html>
