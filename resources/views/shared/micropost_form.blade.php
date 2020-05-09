{{ Form::open(["route" => "microposts.store"]) }}
@include('shared.error_messages')
<div class="field">
    {{ Form::textarea('content', null, ["placeholder" => "Compose new micropost..."]) }}
</div>
{{ Form::submit("Post", ["class" => "btn btn-primary mt-2"]) }}
{{ Form::close() }}
