<h1>Password reset</h1>

<p>To reset your password click the link below:</p>

{{ Html::link(route("password_resets.edit", ["password_reset" => $reset_token, "email" => $user->email]), "Reset password") }}

<p>This link will expire in two hours.</p>

<p>
    If you did not request your password to be reset, please ignore this email and
    your password will stay as it is.
</p>
