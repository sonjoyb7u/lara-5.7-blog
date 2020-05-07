<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title'){{ config('app.name', 'LARA-5.7-BLOG') }}</title>
    <link rel="icon" href="{{ asset('assets/site/img/Fevicon.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('assets/site/vendors/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/vendors/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/vendors/owl-carousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/vendors/owl-carousel/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/site/css/style.css') }}">
    @stack('css')
</head>
<body>
<!--================Header Menu Area =================-->
@includeIf('layouts.site.components.header')
<!--================Header Menu Area =================-->

<main class="site-main">
    <!--================Hero Banner start =================-->
    @yield('banner')
    <!--================Hero Banner end =================-->
    <!--================ Blog slider start =================-->
    @yield('category-slider')
    <!--================ Blog slider end =================-->

    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                @yield('content')
                </div>

                <!-- Start Blog Post Siddebar -->
                <div class="col-lg-4 sidebar-widgets">
                @includeIf('layouts.site.components.right-sidebar')
                </div>
            </div>
            <!-- End Blog Post Siddebar -->
        </div>
    </section>
    <!--================ End Blog Post Area =================-->
</main>

<!--================ Start Footer Area =================-->
@includeIf('layouts.site.components.footer')
<!--================ End Footer Area =================-->

<script src="{{ asset('assets/site/vendors/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/site/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/site/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/site/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('assets/site/js/mail-script.js') }}"></script>
<script src="{{ asset('assets/site/js/main.js') }}"></script>
@stack('js')
</body>
</html>
