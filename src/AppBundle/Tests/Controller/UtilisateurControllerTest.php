<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UtilisateurControllerTest extends WebTestCase
{
    public function testGetutilisateurs()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getUtilisateurs');
    }

    public function testGetutilisateur()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getUtilisateur');
    }

    public function testPostutilisateur()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/postUtilisateur');
    }

    public function testPatchutilisateur()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/patchUtilisateur');
    }

    public function testRemoveutilisateur()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/removeUtilisateur');
    }

}
