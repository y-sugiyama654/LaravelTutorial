@extends('layouts.app')

@section('title', 'All Users')

@section('content')

    <h1>All Users</h1>
    <div class="card">
        <div class="card-body">
            @foreach ($users as $user)
                @include('users.user')
            @endforeach
        </div>
    </div>
    <br>
    {{ $users->links() }}

@endsection
