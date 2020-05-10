@extends('layouts.app')

@section('title', $user->name)

<style>
        .gravatar {
            float: left;
            margin-right: 10px;
            border-radius: 50%;
        }

        .gravatar_edit {
            margin-top: 15px;
        }
</style>

@section('content')
    <div class="row">
        <div class="col-md-4">
            <section class="user_info">
                <h1>
                    {!! gravatar_for($user) !!}
                    {{ $user->name }}
                </h1>
            </section>
            <section class="stats">
                @include("shared.stats")
            </section>
        </div>
        <div class="col-md-8">
            @includeWhen (Auth::check(), "users.follow_form")
            @if ($user->microposts())
                <h3>Microposts ({{ $user->microposts()->count() }})</h3>
                @foreach ($microposts as $micropost)
                    <div class="card microposts mb-2">
                        @include("microposts.micropost")
                    </div>
                @endforeach
                {{ $microposts->links() }}
            @endif
        </div>
    </div>
@endsection
