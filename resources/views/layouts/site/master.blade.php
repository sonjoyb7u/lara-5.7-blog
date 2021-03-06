<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title'){{ config('app.name', 'LARA 5.7 BLOG') }}</title>
    <link rel="icon" href="{{ asset('assets/site/img/Fevicon.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('assets/site/vendors/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/vendors/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/vendors/owl-carousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/vendors/owl-carousel/owl.carousel.min.css') }}">
    <!-- Sweet Alert Css -->
    <link href="{{ asset('assets/admin/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/site/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/vendors/toastr/css/toastr.min.css') }}">
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
<script src="{{ asset('assets/admin/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/site/js/mail-script.js') }}"></script>
<script src="{{ asset('assets/site/js/main.js') }}"></script>
<script src="{{ asset('assets/site/vendors/toastr/js/toastr.min.js') }}"></script>
{!! Toastr::message() !!}
<script>
    // Toastr Message generate js...
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    toastr.error('{{ $error }}', 'Error', {
        closeButton: true,
        progressBar: true,
    });
    @endforeach
    @endif
</script>
@stack('js')
</body>
</html>
