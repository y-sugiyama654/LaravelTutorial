<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StaticPagesControllerTest extends TestCase
{
    /**
     * rootページにアクセスしたらレスポンス200を返すこと
     *
     * @return void
     */
    public function testRootPageShouldReturn200()
    {
        // homeにアクセスする
        $response = $this->get('/');

        // homeにアクセスした際のレスポンスが200(成功)であること
        $response->assertStatus(200);
    }

    /**
     * homeページにアクセスしたらレスポンス200を返すこと
     *
     * @return void
     */
    public function testHomePageShouldReturn200()
    {
        // homeにアクセスする
        $response = $this->get('/home');

        // homeにアクセスした際のレスポンスが200(成功)であること
        $response->assertStatus(200);
    }

    /**
     * helpページにアクセスしたらレスポンス200を返すこと
     *
     * @return void
     */
    public function testHelpPageShouldReturn200()
    {
        // homeにアクセスする
        $response = $this->get('/help');

        // homeにアクセスした際のレスポンスが200(成功)であること
        $response->assertStatus(200);
    }

    /**
     * aboutページにアクセスしたらレスポンス200を返すこと
     *
     * @return void
     */
    public function testAboutPageShouldReturn200()
    {
        // homeにアクセスする
        $response = $this->get('/about');

        // homeにアクセスした際のレスポンスが200(成功)であること
        $response->assertStatus(200);
    }

    /**
     * contactページにアクセスしたらレスポンス200を返すこと
     *
     * @return void
     */
    public function testContactPageShouldReturn200()
    {
        // homeにアクセスする
        $response = $this->get('/contact');

        // homeにアクセスした際のレスポンスが200(成功)であること
        $response->assertStatus(200);
    }
}
