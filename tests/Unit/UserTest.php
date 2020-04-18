<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

    private $attributes;

    public function setUp():void
    {
        parent::setUp();

        $this->attributes = [
            'name'     => 'テスト太郎',
            'email'     => 'hoge@example.com',
            'password' => bcrypt('test'),
        ];
    }

    public function testUserShouldBeStored()
    {
        User::create($this->attributes);
        $this->assertDatabaseHas('users', $this->attributes);
    }

    public function testUserNameShouldBePresent()
    {
        $data = $this->attributes;

        // 名前を空欄にする
        $data['name'] = "   ";

        User::create($this->attributes);
        //$this->assertDatabaseHas('users', $this->attributes);
        $this->assertCount(1, User::all());
    }

}
