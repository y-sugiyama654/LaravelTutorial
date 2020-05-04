<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordReset extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $reset_token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $reset_token)
    {
        $this->user = $user;
        $this->reset_token = $reset_token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("noreply@example.com")
            ->subject("Password reset")
            ->view('emails.password_reset');
    }
}
