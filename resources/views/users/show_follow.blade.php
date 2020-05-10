@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="row">
        <aside class="col-md-4">
            <section class="user_info">
                {!! gravatar_for($user) !!}
                <h1>{{ $user->name }}</h1>
                <span>{{ Html::linkRoute("users.show", "view my profile", $user->id) }}</span>
                <span><b>Microposts:</b> {{ $user->microposts()->count() }}</span>
            </section>
            <section class="stats">
                @include("shared.stats")
                @if ($users)
                    <div class="user_avatars">
                        @foreach ($users as $user)
                            <a href="{{ route("users.show", $user->id) }}" >{!! gravatar_for($user, ["size" => 30]) !!}</a>
                        @endforeach
                    </div>
                @endif
            </section>
        </aside>
        <div class="col-md-8">
            <h3>{{ $title }}</h3>
            @if ($users)
                <ul class="users follow">
                    @foreach ($users as $user)
                        @include("users.user", ["user" => $user])
                    @endforeach
                </ul>
                {{ $users->links() }}
            @endif
        </div>
    </div>
@endsection
