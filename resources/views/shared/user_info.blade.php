



<div class="card-body">
    <div class="row no-gutters">
        <div class="col-md-1">
            <a href="{{ route("users.show", Auth::id()) }}">{!! gravatar_for(Auth::user(), ["size" => 50]) !!}</a>
        </div>
        <div class="col-md-11">
            <h1>{{ Auth::user()->name }}</h1>
            <span>{{ Html::linkRoute("users.show", "view my profile", Auth::id()) }}</span>
            <span>{{ Auth::user()->microposts()->count() . " " . str_plural('micropost', Auth::user()->microposts()->count()) }}</span>
        </div>
    </div>
</div>
