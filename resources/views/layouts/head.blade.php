<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
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

    </head>
    <body>
        <div id="app">
            @include('layouts.nav')
            <div class="container">
                @yield('content')
            </div>
            @include('layouts.footer')
        </div>

        <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
        <script src="{{ asset('js/effects.js') }}" charset="utf-8"></script>
        {{-- Scripts necesarios --}}
        <script src="{{ asset ('js/jquery.min.js')}}" ></script>
        <script src="{{ asset ('js/bootstrap.min.js')}}" ></script>
        @yield('scripts')

    </body>
</html>
