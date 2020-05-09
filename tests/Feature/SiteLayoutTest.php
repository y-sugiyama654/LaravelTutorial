<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SiteLayoutTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLayoutLinks()
    {
        $response = $this->get('/');
        $response->assertViewIs("static_pages.home");
        $dom = $this->dom($response->content());
        $this->assertSame(url("/home"), $dom->filter('a:contains("Sample App")')->attr("href"));
        $this->assertSame(url("/home"), $dom->filter('a:contains("Home")')->attr("href"));
        $this->assertSame(route("help"), $dom->filter('a:contains("Help")')->attr("href"));
        $this->assertSame(route("about"), $dom->filter('a:contains("About")')->attr("href"));
        $this->assertSame(route("contact"), $dom->filter('a:contains("Contact")')->attr("href"));
    }
}
