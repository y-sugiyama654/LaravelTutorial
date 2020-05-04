@extends('layouts.app')

@section('title', 'Log in')

<style>
    #error_explanation {
        color: red;
    }

    #error_explanation ul {
        color: red;
        margin: 0 0 15px 0;
    }
</style>

@section('content')

    <h1>Log in</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('sessions.store') }}" method="POST">
                @csrf

                @include('shared.error_messages')

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    {{ Html::linkRoute("password_resets.create", "(forgot password)") }}
                    <input type="password" class="form-control" name="password">
                </div>

                <div class="form-group">
                    {{ Form::hidden("remember_me", "0") }}
                    {{ Form::checkbox("remember_me", "1", null, ["id" => "session_remember_me"]) }}
                    <span>Remember me on this computer</span>
                </div>

                <button type="submit" class="btn btn-success">Log in</button>
                <p>New User? <a href="{{ route('signup') }}">Sign up now!</a></p>
            </form>
        </div>
    </div>
@endsection
