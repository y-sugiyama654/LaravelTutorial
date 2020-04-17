<!DOCTYPE html>
    <html>
        <head>
            <title>@yield('title') | Larave Tutorial Sample App</title>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- CSRF Token -->
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <!-- Styles -->
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        </head>
        <body>
            @yield('content')
            <!-- Scripts -->
            <script src="{{ asset('js/app.js') }}"></script>
        </body>
    </html>
</html>
