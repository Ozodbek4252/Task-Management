<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('components.styles')
    @livewireStyles
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-sans antialiased">
    
    <div id="layout-wrapper">
        @include('components.navbar')
        @include('components.sidebar')
        <div class="main-content">
            <div class="page-content">
                {{ $slot }}
            </div>
        </div>
    </div>
    
    <div class="rightbar-overlay"></div>
    
    @stack('modals')
    @include('components.scripts')
    @livewireScripts
</body>
</html>
