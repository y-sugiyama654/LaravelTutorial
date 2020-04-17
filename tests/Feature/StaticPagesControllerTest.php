<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StaticPagesControllerTest extends TestCase
{
    private $baseTitle;

    protected function setUp():void
    {
        parent::setUp();
        $this->baseTitle = "Laravel Tutorial Sample App";
    }


    /**
     * rootページにアクセスしたらレスポンス200を返すこと
     *
     * @return void
     */
    public function testRootPageShouldReturn200()
    {
        // homeにアクセスする
        $response = $this->get('/');

        // リクエストで送られるDOMを取得
        $dom = $this->dom($response->content());

        // homeにアクセスした際のレスポンスが200(成功)であること
        $response->assertStatus(200);

        // タイトルがページ名と同一であること
        $this->assertSame("Home | {$this->baseTitle}", $dom->filter("title")->text());
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

        // リクエストで送られるDOMを取得
        $dom = $this->dom($response->content());

        // homeにアクセスした際のレスポンスが200(成功)であること
        $response->assertStatus(200);

        // タイトルがページ名と同一であること
        $this->assertSame("Home | {$this->baseTitle}", $dom->filter("title")->text());
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

        // リクエストで送られるDOMを取得
        $dom = $this->dom($response->content());

        // homeにアクセスした際のレスポンスが200(成功)であること
        $response->assertStatus(200);

        // タイトルがページ名と同一であること
        $this->assertSame("Help | {$this->baseTitle}", $dom->filter("title")->text());
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

        // リクエストで送られるDOMを取得
        $dom = $this->dom($response->content());

        // homeにアクセスした際のレスポンスが200(成功)であること
        $response->assertStatus(200);

        // タイトルがページ名と同一であること
        $this->assertSame("About | {$this->baseTitle}", $dom->filter("title")->text());
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

        // リクエストで送られるDOMを取得
        $dom = $this->dom($response->content());

        // homeにアクセスした際のレスポンスが200(成功)であること
        $response->assertStatus(200);

        // タイトルがページ名と同一であること
        $this->assertSame("Contact | {$this->baseTitle}", $dom->filter("title")->text());
    }
}
