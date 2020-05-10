@unless ($user == Auth::user())
    <div id="follow_form">
        @if (Auth::user()->isFollowing($user->id))
            @include("users.unfollow")
        @else
            @include("users.follow")
        @endif
    </div>
@endunless
