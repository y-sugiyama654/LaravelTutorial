<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UsersSignupTest extends TestCase
{
    public function testInvalidSignup()
    {
        $this->get(route('signup'));
        $count = User::all()->count();
        $response = $this->followingRedirects()
            ->post('/signup', [
                'name' => "Example User",
                'email' => "user@example.com",
                'password' => "password",
                'password_confirmation' => "password"
            ]);
        $this->assertSame($count + 1, User::all()->count());
        $response->assertViewIs("users.show");
        $this->assertTrue(Auth::check());
    }
}
