@php empty($user) && $user = Auth::user() @endphp
<div class="stats text-center mb-3">
    <span class="mr-3">
        <a href="{{ route("following", $user->id) }}">
            <strong id="following" class="stat">
                {{ $user->following()->count() }}
            </strong>
            following
        </a>
    </span>
    <span>
        <a href="{{ route("followers", $user->id) }}">
            <strong id="followers" class="stat">
                {{ $user->followers()->count() }}
            </strong>
            followers
        </a>
    </span>
</div>
