<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script defer src="{{ asset('js/app.js') }}"></script>

        {{ $styles ?? '' }}
    </head>
    <body class="font-sans antialiased bg-gray-50 text-gray-900">
        <!-- Admin Layout Wrapper -->
        <div x-data="{ sidebarOpen: false }" class="flex flex-col h-screen w-full overflow-hidden bg-gray-50">
            
            <!-- Topbar -->
            @include('layouts.admin.topbar')
            
            <!-- Main Content Area -->
            <div class="flex flex-1 min-h-0 relative">
                <!-- Mobile sidebar backdrop -->
                <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 z-40 bg-gray-900/50 lg:hidden" @click="sidebarOpen = false" style="display: none;"></div>

                <!-- Sidebar -->
                @include('layouts.admin.sidebar')
                
                <!-- Page Content -->
                <main class="flex-1 min-w-0 overflow-y-auto overflow-x-hidden p-4 sm:p-6 lg:p-8">
                    <div class="max-w-7xl mx-auto w-full space-y-8">
                        {{ $slot }}
                    </div>
                </main>
            </div>
            
        </div>

        {{ $scripts ?? '' }}
    </body>
</html>
