<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', setting('site_name', 'ATS - Enterprise IT Infrastructure'))</title>
    
    <!-- Meta Tags for SEO -->
    <meta name="description" content="@yield('meta_description', setting('site_description', 'ATS delivers cutting-edge networking, secure storage, and scalable computing solutions.'))">
    
    <!-- External Assets -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Space+Grotesk:wght@500;700&amp;display=swap"
        rel="stylesheet">
        
    <!-- Local Assets -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <script src="{{ asset('assets/js/tailwind-config.js') }}"></script>
    
    @stack('styles')
</head>

<body class="font-sans text-dark bg-gray-light">
    
    <!-- Top Bar & Navbar -->
    @section('header')
        @include('partials.header')
    @show

    <!-- Main Content Area -->
    <main id="main-content">
        @yield('content')
    </main>

    <!-- Footer Area -->
    @section('footer')
        @include('partials.footer')
    @show

    <!-- Mobile Navigation (Drawer & Tab Bar) -->
    @include('partials.navigation')

    <!-- Global Scripts -->
    <script src="{{ asset('assets/js/shared-components.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    
    @stack('scripts')
</body>

</html>
