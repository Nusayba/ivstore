<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ActivePeriodeControllerTest extends WebTestCase
{
    public function testGetactiveperiodes()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getActivePeriodes');
    }

    public function testPostactiveperiode()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/postActivePeriode');
    }

    public function testGetactiveperiode()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getActivePeriode');
    }

    public function testRemoveactiveperiode()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/removeActivePeriode');
    }

    public function testPushactiveperiode()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/pushActivePeriode');
    }

}
