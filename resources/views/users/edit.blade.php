@extends('layouts.app')

@section('title', 'Edit')

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

    <h1>Update your profile</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                @include('shared.error_messages')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmation</label>
                    <input type="password" class="form-control" name="password_confirmation">
                </div>

                <button type="submit" class="btn btn-success">Save changes</button>
            </form>
            <hr>
            <div>
                {!! gravatar_for($user) !!}
                <a href="http://gravatar.com/emails" target="_blank">change</a>
            </div>
        </div>
    </div>
@endsection
