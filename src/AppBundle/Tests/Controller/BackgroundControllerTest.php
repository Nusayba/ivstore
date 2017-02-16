<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BackgroundControllerTest extends WebTestCase
{
    public function testGetbackgrounds()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getBackgrounds');
    }

    public function testGetbackground()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getBackground');
    }

    public function testPostbackground()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/postBackground');
    }

    public function testPatchbackground()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/patchBackground');
    }

    public function testRemovebackground()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/removeBackground');
    }

}
