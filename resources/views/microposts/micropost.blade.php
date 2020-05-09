<div class="card-body" id="micropost-{{ $micropost->id }}">
    <div class="row no-gutters">
        <div class="col-md-1">
            <a href="{{ route("users.show", $micropost->user_id) }}">{!! gravatar_for($micropost->user, ["size" => 50]) !!}</a>
        </div>
        <div class="col-md-11">
            <span>{{ $micropost->content }}</span>
            <p>
                Posted {{ time_ago_in_words($micropost->created_at) }} ago.
                @if (Auth::id() == $micropost->user_id)
                    <a href="javascript:if(window.confirm('Yes Sure?')){document.deleteform{{ $micropost->id }}.submit()}" class="ml-2">delete</a>
                    {{ Form::open(["route" => ["microposts.destroy", $micropost->id], "method" => "delete", "name" => "deleteform{$micropost->id}"]) }}
                    {{ Form::close() }}
                @endif
            </p>
        </div>
    </div>
</div>
