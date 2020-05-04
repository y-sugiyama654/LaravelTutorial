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

    <h1>Forgot Password</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('password_resets.store') }}" method="POST">
                @csrf

                @include('shared.error_messages')

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email">
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
@endsection
