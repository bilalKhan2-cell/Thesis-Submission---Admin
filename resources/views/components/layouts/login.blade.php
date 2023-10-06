<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login - Sindh University Online Thesis Submission Portal (UOS - OTSP)</title>

    <meta name="description" content="" />

    <link rel="icon" type="image/x-icon" href="{{ asset('img/layouts/downloads.ico') }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('vendor/fonts/boxicons.css')}}" />

    <link rel="stylesheet" href="{{asset('vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('css/demo.css')}}" />

    <link rel="stylesheet" href="{{asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <link rel="stylesheet" href="{{asset('vendor/css/pages/page-auth.css')}}" />
    
    <script src="{{asset('vendor/js/helpers.js')}}"></script>

    <script src="{{asset('js/config.js')}}"></script>
    @livewireStyles
</head>

<body>

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
              {{ $slot }}
            </div>
        </div>
    </div>

    @livewireScripts
    @livewire('footer')

</body>

</html>