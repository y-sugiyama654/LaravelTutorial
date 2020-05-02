<?php

namespace Tests\Unit;

use App\Mail\AccountActivation;
use App\User;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\TestCase;

class MailerTest extends TestCase
{
//    public function testAccountActivation()
//    {
//        Mail::fake();
//
//        $user = User::find(1);
//
//        $activation_token = str_random(22);
//        Mail::to($user)->send(new AccountActivation($user, $activation_token));
//        Mail::assertSent(AccountActivation::class, function ($mail) use ($user, $activation_token) {
//            $mail->build();
//            $this->assertEquals("Account activation", $mail->subject);
//            $this->assertTrue($mail->hasTo($user->email));
//            $this->assertTrue($mail->hasFrom("noreply@example.com"));
//            $this->assertEquals($user->name, $mail->user->name);
//            $this->assertEquals($activation_token, $mail->activation_token);
//            $this->assertEquals($user->email, $mail->user->email);
//            return true;
//        });
//    }
}
