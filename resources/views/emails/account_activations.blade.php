<h1>Sample App</h1>

<p>Hi {{ $user->name }},</p>

<p>
    Welcome to the Sample App! Click on the link below to activate your account:
</p>

{{ Html::link(route("activation",["token" => $activation_token, "email" => $user->email]), "Activate") }}
