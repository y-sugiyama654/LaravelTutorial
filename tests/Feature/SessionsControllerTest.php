<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionsControllerTest extends TestCase
{

    public function testShouldGetCreate()
    {
        // loginページにアクセスする
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

}
