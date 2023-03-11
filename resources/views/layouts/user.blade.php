<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/core/libs.min.css')}}" />

    <!-- Aos Animation Css -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/aos/dist/aos.css')}}" />

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/hope-ui.min.css?v=2.0.0')}}" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/custom.min.css?v=2.0.0')}}" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/dark.min.css')}}" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/customizer.min.css')}}" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/rtl.min.css')}}" />

    @stack('styles')


</head>

<body>
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>
    <!-- loader END -->

    @include('user.partials.__sidebar')

    @yield('content')

    @include('admin.partials._scripts')

</body>

</html>