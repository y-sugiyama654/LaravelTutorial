<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Symfony\Component\DomCrawler\Crawler;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function dom($html)
    {
        $dom = new Crawler();
        $dom->addHTMLContent($html, "UTF-8");
        return $dom;
    }
}
