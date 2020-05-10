<ul style="list-style:none" class="mb-2">
    <li>
        {!! gravatar_for($user, ["size" => 50]) !!}
        {{ Html::linkRoute("users.show", $user->name, [$user->id]) }}
        {{-- adminユーザーのみ削除リンク表示 --}}
        @if (Auth::user()->admin === 1 && Auth::user() != $user)
            | <a href="javascript:if(window.confirm('Yes Sure?')){document.deleteform{{$user->id}}.submit()}">delete</a>
            {{ Form::open(["route" => ["users.destroy", $user->id], "method" => "delete", "name" => "deleteform{$user->id}"]) }}
            {{ Form::close() }}
        @endif
    </li>
</ul>
