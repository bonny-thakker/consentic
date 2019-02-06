<!DOCTYPE html>
<html class=no-js lang=en_US>
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

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/2.1.19/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ url('assets/plugins/animate.css/animate.min.css') }}">
    <link href="/assets/css/app.css" rel=stylesheet />
    <link href="/assets/css/pricing.css" rel="stylesheet">
    <style>
        .title {
            font-size: {{ $settings->siteTitleSize }} !important;
        }
        .subtitle {
            font-size: {{ $settings->siteSubtitleSize }} !important;
        }
        .title.is-1 {
            font-size: {{ $settings->siteH1Size }} !important;
        }
        .title.is-2 {
            font-size: {{ $settings->siteH2Size }} !important;
        }
        .title.is-3 {
            font-size: {{ $settings->siteH3Size }} !important;
        }
        .title.is-4 {
            font-size: {{ $settings->siteH4Size }} !important;
        }
        .title.is-5 {
            font-size: {{ $settings->siteH5Size }} !important;
        }
        .title.is-6 {
            font-size: {{ $settings->siteH6Size }} !important;
        }
        #navbar-menu {
            font-size: {{ $settings->siteMenuSize }} !important;
        }
        .app-footer .menu-list {
            font-size: {{ $settings->siteMenuSize }} !important;
        }
        .form-header-size {
            font-size: {{ $settings->siteFormHeaderSize }} !important;
        }
        .site-input-size {
            font-size: {{ $settings->siteInputSize }} !important;
        }
        .pricing-table .pricing-plan .plan-header {
            font-size: 2rem;
            padding: 0;
        }
        .pricing-table .pricing-plan .plan-item {
            font-size: 1.25rem;
        }
    </style>
    @yield('style')
</head>

<body>
<div class=app-container>
    @include('frontend.layouts.header')
    <main class=app-content>
        @yield('content')
    </main>
    @include('frontend.layouts.footer')
</div>

@if (! Auth::check())
    @include('pages.login')
@endif

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/sweetalert2@7.15.1/dist/sweetalert2.all.min.js"></script>
<script src="{{ url('assets/js/app.js') }}"></script>
<script src="{{ url('assets/js/auth.js') }}"></script>
<script src="{{ url('assets/js/newsletter.js') }}"></script>
@yield('script')

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-71767609-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-71767609-13');
</script>

</body>
</html>