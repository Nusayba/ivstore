<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ZoneControllerTest extends WebTestCase
{
    public function testGetzones()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getZones');
    }

    public function testGetzone()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getZone');
    }

    public function testPostzone()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/postZone');
    }

    public function testPatchzone()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/patchZone');
    }

    public function testRemovezone()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/removeZone');
    }

}
