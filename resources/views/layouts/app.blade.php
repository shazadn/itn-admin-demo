<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="description" content="Unique and Experienced Asian Wedding Planner based in UK, USA and Pakistan offering wide range of service including venue, catering and decoration etc." />
        <meta property="og:image" content="{{ asset('images/pic02.png') }}" />
        <title>Asian Wedding Planner based in UK, USA and Pakistan | {{ config('app.name') }}</title>
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <noscript><link rel="stylesheet" href="{{ asset('css/noscript.css') }}" /></noscript>
    </head>
    <body class="is-preload">
        <div id="page-wrapper">
            <div id="wrapper">
                @yield('content')
                <div class="copyright">{{ config('app.name') }} &copy; {{ date('Y') }}. Built By: <a href="http://www.swiftweb.services" target="_blank">Swift Web Services</a></div>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script>app.run();</script>
    </body>
</html>
