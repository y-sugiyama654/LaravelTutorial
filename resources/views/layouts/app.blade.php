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
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        </body>
    </html>
</html>
