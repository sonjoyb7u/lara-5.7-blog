<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title'){{ config('app.name', 'LARA 5.7 BLOG') }}</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link href="{{ asset('assets/admin/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="{{ asset('assets/admin/plugins/node-waves/waves.css') }}" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="{{ asset('assets/admin/plugins/animate-css/animate.css') }}" rel="stylesheet" />
    <!-- Morris Chart Css-->
    <link href="{{ asset('assets/admin/plugins/morrisjs/morris.css') }}" rel="stylesheet" />
    <!-- Sweet Alert Css -->
    <link href="{{ asset('assets/admin/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />
    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/magnific-popup/css/magnific-popup.min.css') }}">
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('assets/admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/custom/css/custom.css') }}" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('assets/admin/css/themes/all-themes.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/toastr/css/toastr.min.css') }}">
    @stack('css')

</head>
<body class="theme-blue">

@if(request()->is('admin/*') || request()->is('author/*'))
<div class="theme-blue">
    <!-- ## TOP HEADER ## -->
    @includeIf('layouts.admin.components.header')
    <!-- ## LEFT SIDEBAR ## -->
    @includeIf('layouts.admin.components.left-sidebar')
    <!-- ## MAIN CONTENT ## -->
    <section class="content">
        @yield('main-content')
    </section>
</div>
@endif

@if(request()->is('login'))
<div class="login-page">
    @yield('login-content')
</div>
@elseif(request()->is('register'))
<div class="signup-page">
    @yield('register-content')
</div>
@endif


<!-- Jquery Core Js -->
<script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap Core Js -->
<script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.js') }}"></script>
<!-- Select Plugin Js -->
<script src="{{ asset('assets/admin/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
<!-- Slimscroll Plugin Js -->
<script src="{{ asset('assets/admin/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
<!-- Waves Effect Plugin Js -->
<script src="{{ asset('assets/admin/plugins/node-waves/waves.js') }}"></script>
<!-- Validation Plugin Js -->
<script src="{{ asset('assets/admin/plugins/jquery-validation/jquery.validate.js') }}"></script>
<!-- Jquery CountTo Plugin Js -->
<script src="{{ asset('assets/admin/plugins/jquery-countto/jquery.countTo.js') }}"></script>
<!-- Morris Plugin Js -->
<script src="{{ asset('assets/admin/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/morrisjs/morris.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<!-- Magnific Popup core JS file -->
<script src="{{ asset('assets/admin/plugins/magnific-popup/js/jquery.magnific-popup.min.js') }}"></script>
<!-- ChartJs -->
<script src="{{ asset('assets/admin/plugins/chartjs/Chart.bundle.js') }}"></script>
<!-- Flot Charts Plugin Js -->
<script src="{{ asset('assets/admin/plugins/flot-charts/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/flot-charts/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/flot-charts/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/flot-charts/jquery.flot.categories.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/flot-charts/jquery.flot.time.js') }}"></script>
<!-- Sparkline Chart Plugin Js -->
<script src="{{ asset('assets/admin/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>
<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('assets/admin/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
<!-- Custom Js -->
<script src="{{ asset('assets/admin/js/admin.js') }}"></script>
<script src="{{ asset('assets/admin/js/pages/tables/jquery-datatable.js') }}"></script>
<script src="{{ asset('assets/admin/js/pages/index.js') }}"></script>
<script src="{{ asset('assets/admin/js/pages/examples/sign-in.js') }}"></script>
<script src="{{ asset('assets/admin/js/pages/examples/sign-up.js') }}"></script>
<!-- Demo Js -->
<script src="{{ asset('assets/admin/js/demo.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/toastr/js/toastr.min.js') }}"></script>
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
<script src="{{ asset('assets/admin/custom/js/custom.js') }}"></script>
@stack('js')

</body>
</html>

