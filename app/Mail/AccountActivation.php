<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountActivation extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $activation_token;

    public function __construct($user, $activation_token)
    {
        $this->user = $user;
        $this->activation_token = $activation_token;
    }

    public function build()
    {
        return $this->from("noreply@example.com")
            ->subject("Account activation")
            ->view('emails.account_activations');
    }
}
