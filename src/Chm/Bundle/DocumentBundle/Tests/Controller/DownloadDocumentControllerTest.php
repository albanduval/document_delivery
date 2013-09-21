<?php

namespace Chm\Bundle\DocumentBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DownloadDocumentControllerTest extends WebTestCase
{
    public function testDownload()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/download/{document_slug}');
    }

}
