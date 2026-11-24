<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Umoja II SDA Church') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/adventist-symbol--white.svg') }}" type="image/svg+xml">
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: 'Georgia', 'Times New Roman', serif;
        }
        [x-cloak] { display: none !important; }
    </style>
    @yield('styles')
</head>
<body class="antialiased bg-gray-50 text-gray-800">
    
    @include('partials.header')
    
    <main>
        @yield('content')
    </main>
    
    @include('partials.footer')
    
    @include('partials.prayer-modal')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
