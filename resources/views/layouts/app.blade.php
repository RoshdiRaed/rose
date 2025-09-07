<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', app()->getLocale() === 'ar' ? 'رويال سيكيوريتي | قطاع غزة' : 'Royal Security | Gaza Strip')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Noto+Naskh+Arabic:wght@400;600;700&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    @vite(['resources/js/app.js'])
    <style>
        * {
            font-family: 'IBM Plex Sans Arabic', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 leading-relaxed">
    @include('components.navbar')
    
    @yield('content')

    @include('layouts.footer')

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 1000,
        });
    </script>
</body>
</html>
