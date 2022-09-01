<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class LinkTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create()
    {
       $url = 'https://www.google.com/';
        $builder = new \AshAllenDesign\ShortURL\Classes\Builder();

        $shortURLObject = $builder->destinationUrl($url)->make();
        $shortURL = $shortURLObject->default_short_url;
       
        if(!$shortURL) {
            // $response->assertStatus(200);
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
}
