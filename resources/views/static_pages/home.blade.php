@extends('layouts.app')

@section('title', 'Home ')

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

    {{-- ログイン時の表示 --}}
    @if (Auth::check())

        <div class="row">
            <div class="col-md-4">
                <div class="user_info">
                    @include("shared.user_info")
                </div>
                <div class="stats">
                    @include ("shared.stats")
                </div>
                <div class="micropost_form">
                    @include("shared.micropost_form")
                </div>
            </div>
            <div class="col-md-8">
                <h3>Micropost Feed</h3>
                @includeWhen($feed_items, "shared.feed")
            </div>
        </div>

    @else
    {{-- 未ログイン時の表示 --}}
    <div class="center jumbotron">
        <h1>Welcome to the Sample App</h1>

        <h2>
            This is the home page for the
            <a href="https://railstutorial.jp/">Ruby on Rails Tutorial</a>
            sample application.
        </h2>

        <a href="{{ route('signup') }}" class="btn btn-lg btn-primary">Sign up now!</a>
    </div>

    <img src="{{ asset("rails.png") }}" alt="Rails logo">
    @endif
@endsection

