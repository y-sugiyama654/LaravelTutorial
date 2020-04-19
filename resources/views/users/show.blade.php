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
        <aside class="col-md-4">
            <section class="user_info">
                <h1>
                    {!! gravatar_for($user) !!}
                    {{ $user->name }}
                </h1>
            </section>
        </aside>
    </div>

@endsection
