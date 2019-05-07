<!DOCTYPE html>
<html class=no-js lang={{ str_replace('_', '-', app()->getLocale()) }}S>
<head>
    <meta charset=utf-8 />
    <title>@yield('title') | Consentic</title>
    <meta content="width=device-width, initial-scale=1.0" name=viewport />

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/2.1.19/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ url('assets/plugins/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ mix('/assets/web/css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('/assets/web/css/auth.css') }}">
    @yield('styles')

    <!-- Global Spark Object -->
    <script>
        window.Spark = @json(array_merge(Spark::scriptVariables(), []));
    </script>

    @stack('spark-scripts')


</head>

<body>
<div class=app-container id="spark-app" v-cloak>
    @include('layouts.web.header')
    <main class=app-content id="auth-form">
        @yield('content')
    </main>
    @include('layouts.web.footer')
</div>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{ url('assets/web/js/app.js') }}"></script>

<script src="{{ mix('js/app.js') }}"></script>
<script src="/js/sweetalert.min.js"></script>

@yield('scripts')
@stack('jquery')
@include('layouts.web.ga')

</body>
</html>