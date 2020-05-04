@extends('layouts.app')

@section('title', 'Edit Password')

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

    <h1>Reset Password</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('password_resets.update', ["password_reset" => $token]) }}" method="POST">
                @csrf
                @method('PUT')

                @include('shared.error_messages')

                {{ Form::hidden('email', $user->email) }}

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmation</label>
                    <input type="password" class="form-control" name="password_confirmation">
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
@endsection

