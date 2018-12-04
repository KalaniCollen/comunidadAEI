<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" prefix="og: http://ogp.me/ns#">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        @yield('styles')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Icon Site -->
        <link rel="icon" type="image/png" href="/img/logoAEI-azul.png">

    </head>
    <body>
        <div id="app">
            @include('layouts.nav')
            <div class="container-fluid">
                @yield('content')
            </div>
            @include('layouts.footer')
        </div>

        <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
        <script src="{{ asset('js/effects.js') }}" charset="utf-8"></script>
        @yield('scripts')
        @stack('scripts')
    </body>
</html>
