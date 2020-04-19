<!DOCTYPE html>
    <html>
        <head>

            <title>{{ setFullTitle($__env->yieldContent('title')) }}</title>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- CSRF Token -->
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <!-- Styles -->
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

            @include('partials.shim')
        </head>
        <body>
            @include('partials.header')
            <div class="container">
                <div class="mt-4">
                    @if(session('message'))
                        @foreach (session('message') as $message_type => $message)
                            <div class="alert alert-{{ $message_type }}">{{ $message }}</div>
                        @endforeach
                    @endif
                    @yield('content')
                    @include('partials.footer')
                </div>
            </div>
            <!-- Scripts -->
            <script src="{{ asset('js/app.js') }}"></script>
        </body>
    </html>
</html>
