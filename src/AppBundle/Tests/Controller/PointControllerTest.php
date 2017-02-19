<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PointControllerTest extends WebTestCase
{
    public function testPostpoint()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/postPoint');
    }

    public function testPatchpoint()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/patchPoint');
    }

    public function testRemovepoint()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/RemovePoint');
    }

}
