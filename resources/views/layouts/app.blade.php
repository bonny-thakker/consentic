<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Consentic</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="/images/favicon/manifest.json">

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ url('assets/plugins/bulma/bulma.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/bulma/extensions/badge.min.css') }}">
    {{--<link rel="stylesheet" href="{{ url('assets/plugins/bulma/extensions/bulma-tooltip.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/bulma/extensions/bulma-switch.min.css') }}">--}}
    <link rel="stylesheet" href="{{ url('assets/plugins/materialdesignicons/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/fontawesome/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/datatables/css/dataTables.bulma.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/datetimepicker/build/jquery.datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/dropzone/dist/min/dropzone.min.css') }}">

    <link rel="stylesheet" href="{{ mix('/assets/app/css/app.css') }}">
    @notify_css
    @yield('styles')

</head>
<body>
<div class="app-container">
    @include('layouts.app.header')
    <main class="app-content">
        @yield('content')
    </main>
    @include('layouts.web.footer')
</div>

<script src="{{ url('assets/plugins/jquery/jquery-3.3.1.min.js') }}"></script>
<script src="{{ url('assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1SJaISGLfa8fgasd2b_JhYkQC6LadL9Q&libraries=places   " async defer></script>
<script src="/assets/plugins/jquery-mask/dist/jquery.mask.min.js"></script>
<script src="/assets/plugins/datatables/dist/datatables.min.js"></script>
<script src="/assets/plugins/datatables/js/dataTables.bulma.min.js"></script>
<script src="/assets/plugins/dropzone/dist/min/dropzone.min.js"></script>
<script src="/assets/plugins/select2/dist/js/select2.full.min.js"></script>
<script src="/assets/plugins/select2/dist/js/select2-searchInputPlaceholder.js"></script>
<script src="/assets/plugins/momentjs/moment.js"></script>
<script src="/assets/plugins/datetimepicker/build/jquery.datetimepicker.full.min.js"></script>
{{--<script src="/assets/js/patient.js"></script>--}}
<script src="{{ url('assets/app/js/app.js') }}"></script>
<script src="{{ url('js/newsletter.js') }}"></script>
{{--<script src="{{ url('assets/js/socket.js') }}"></script>--}}
@notify_js
@notify_render

@yield('scripts')
@stack('jquery')
@if(env('APP_ENV') == 'production')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-71767609-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-71767609-13');
    </script>
@endif
</body>
</html>
