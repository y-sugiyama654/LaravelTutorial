<header class="navbar navbar-fixed-top navbar-dark bg-dark">
    <div class="container">
        <a href="{{ route('home') }}" id="logo">Sample App</a>
        <nav class="navbar navbar-expand-lg">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav dropdown">
                    <a class="nav-item nav-link" href="{{ route('home') }}">Home</a>
                    <a class="nav-item nav-link" href="{{ route('help') }}">Help</a>
                    @if (Auth::check())
                        <div class="dropdown">
                            <a type="button" id="dropdown1"
                                    class="nav-item nav-link"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                Account
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdown1">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="javascript:document.logoutform.submit()">Log out</a>
                                {{ Form::open(["route" => "logout", "method" => "delete", "name" => "logoutform"]) }}
                                {{ Form::close() }}
                            </div>
                        </div>
                    @else
                        <a class="nav-item nav-link" href="{{ route('login') }}">Log in</a>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</header>
