{{ Form::open(["route" => ["relationships.destroy", $user->id], "method" => "delete"]) }}
{{ Form::submit("Unfollow", ["class" => "btn"]) }}
{{ Form::close() }}
