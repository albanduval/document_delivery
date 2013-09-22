<?php

namespace Chm\Bundle\DocumentBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DocumentUploadControllerTest extends WebTestCase
{
    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/edit/{id}');
    }

}
