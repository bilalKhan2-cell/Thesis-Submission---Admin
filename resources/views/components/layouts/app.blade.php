<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Online Thesis Submission Portal" />
    <link rel="icon" type="image/x-icon" href="{{ asset('img/layouts/downloads.ico') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('vendor/fonts/boxicons.css') }}" />

    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />

    <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    
    <link rel="stylesheet" href="{{ asset('vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/datatable.css') }}">
    
    <script src="{{ asset('vendor/js/helpers.js') }}"></script>
    
    <script src="{{ asset('js/config.js') }}"></script>
    @livewire('footer')
    <title>{{ $title ?? 'Page Title' }}</title>
    @livewireStyles
    @livewireScripts
    <script src="{{ asset('vendor/js/datatable.js') }}"></script>
</head>

<body>
    
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            @livewire('sidebar')
            <div class="layout-page">
                @livewire('header')
                
                <div class="content-wrapper">
                    
                    <div class="container-xxl flex-grow-1 container-p-y">
                        {{ $slot }}
                    </div>
                    
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
</body>
</html>