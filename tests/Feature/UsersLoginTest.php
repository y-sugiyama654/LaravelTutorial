<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersLoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLoginWithInvalidInformation()
    {
        // ログインフォームに移動
        $response = $this->get('/login');

        // ログインフォームに遷移しているか確認
        $response->assertViewIs('sessions.create');

        // ログイン情報をPOST
        $response = $this->followingRedirects()
            ->post('/login', [
                'email' => "",
                'password' => "",
            ]);

        // ログインフォームにリダイレクト
        $response->assertViewIs('sessions.create');

        // エラーメッセージの存在確認
        $response->assertSeeText('Invalid email/password combination');

        // 別のページに移動
        $response = $this->get('/');

        // エラーメッセージの存在確認
        $response->assertDontSeeText('Invalid email/password combination');
    }
}
