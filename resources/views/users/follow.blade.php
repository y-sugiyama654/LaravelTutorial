{{ Form::open(["route" => "relationships.store"]) }}
{{ Form::hidden('followed_id', $user->id) }}
{{ Form::submit("Follow", ["class" => "btn btn-primary"]) }}
{{ Form::close() }}
