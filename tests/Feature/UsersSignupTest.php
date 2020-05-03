<?php

namespace Tests\Feature;

use App\Mail\AccountActivation;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class UsersSignupTest extends TestCase
{
    use RefreshDatabase;

    public function testInvalidSignup()
    {
        $this->get("signup");
        $count = User::all()->count();
        $response = $this->followingRedirects()
            ->post(route("signup"), [
                "name" => "",
                "email" => "user@invalid",
                "password" => "foo",
                "password_confirmation" => "bar"
            ]);
        $this->assertSame($count, User::all()->count());
        $response->assertViewIs("users.create");
        $dom = $this->dom($response->content());
        $this->assertSame(1, $dom->filter('div#error_explanation')->count());
        $this->assertSame(1, $dom->filter('div.alert-danger')->count());
    }

    public function testValidSignupWithAccountActivation()
    {
        Mail::fake();

        $this->get(route('signup'));
        $count = User::all()->count();
        $response = $this->followingRedirects()
            ->post(route('signup'), [
                'name' => "Example User",
                'email' => "user@example.com",
                'password' => "password",
                'password_confirmation' => "password"
            ]);
        $this->assertSame($count + 1, User::all()->count());
        Mail::assertSent(AccountActivation::class, 1);
        $user = User::where("email", "user@example.com")->first();
        $activation_token = str_random(22);
        $user->activation_digest = bcrypt($activation_token);
        $user->update();
        $this->assertSame(0, $user->activated);
        $this->post("login", ["email" => $user->email, "password" => "password"]);
        $this->assertFalse(Auth::check());
        $this->get(route("activation", ["token" => "invalid token", "email" => $user->email]));
        $this->assertFalse(Auth::check());
        $this->get(route("activation", ["token" => $activation_token, "email" => "wrong"]));
        $this->assertFalse(Auth::check());
        $response = $this->get(route("activation", ["token" => $activation_token, "email" => $user->email]));
        $this->assertSame(1, User::find($user->id)->activated);
        $response->assertRedirect(route("users.show", $user->id));
        $this->assertTrue(Auth::check());
    }
}
