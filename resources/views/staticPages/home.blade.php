@extends('layouts.app')

@section('title', 'Home ')

@section('content')
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
@endsection

