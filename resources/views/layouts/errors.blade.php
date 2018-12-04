<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, height=device-height">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @yield('styles')

        <!-- Icon -->
        <link rel="icon" href="/img/logoAEI-azul.png">
    </head>
    <body>
        <div id="app">
            <div class="container-fluid d-flex align-items-center justify-content-center">
                @yield('content')
            </div>
        </div>


        <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
        @yield('scripts')

    </body>
</html>
