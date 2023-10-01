<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="description"
        content="{{ __('Productify is a production management system build to simplify production or manufacturing process. Productify is lightweight, secure and fast and based on laravel.') }}">
    <meta name="keywords"
        content="{{ __('Productify, Production management system, Manufacturing system, Inventory system, Stock management, Workshop management, Row material management, Garments System, Food and Beverage, Furniture Companies') }}">
    <meta name="author" content="{{ __('Codeshaper') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>{{ $settings['companyTagline'] }}</title>
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ $settings['favicon'] }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ $settings['favicon'] }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ $settings['favicon'] }}">
    <link rel="manifest" href="{{ asset('/site.webmanifest') }}">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <!-- Main css -->
    <link rel="stylesheet" type="text/css" href=" {{ asset('css/app.css') }} ">
    <!-- Admin panel css -->
    <link rel="stylesheet" type="text/css" href=" {{ asset('css/main.css') }} ">
    @yield('extra-style')
</head>

<body class="hold-transition sidebar-mini 
      @if (session('isDark')) dark-mode @endif
      @if (session('isNavFixed')) layout-navbar-fixed @endif
      @if (session('isSidebarCollapsed')) sidebar-collapse @endif
      @if (session('isSidebarFixed')) layout-fixed @endif"
      >
    <div class="wrapper" id="app">
        <!-- Navbar -->
        @include('backend_template.components.top_nav')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @if(Auth::guard('superadmin')->check())
    @include('backend_template.components.sidebar_superadmin')
    @endif
    @if(Auth::guard('admin')->check())
    @include('backend_template.components.sidebar_admin')
    @endif
    @if(Auth::guard('wholeseller')->check())
    @include('backend_template.components.sidebar_wholeseller')
    @endif
    @if(Auth::guard('retailer')->check())
    @include('backend_template.components.sidebar_retailer')
    @endif
    @if(Auth::guard('shopkeeper')->check())
    @include('backend_template.components.sidebar_shopkeeper')
    @endif
    @if(Auth::guard('customer')->check())
    @include('backend_template.components.sidebar_customer')
    @endif

        <!-- /.Main Sidebar Container -->

        <!-- page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.page content-->

        <!-- Main Footer -->
        @include('backend_template.components.footer')
        <!--/. Main Footer -->
    </div>
    <!-- ./wrapper -->


    @include('backend_template.components.sidebar_settings')

    <!-- REQUIRED SCRIPTS -->
    <script src="{{ asset('js/app.js') }} "></script>
    <script src="{{ asset('js/main.js') }} "></script>
    <script src="{{ asset('js/sidebar_control.js') }} "></script>
    @yield('extra-script')
    <!-- Language script -->

</body>

</html>
