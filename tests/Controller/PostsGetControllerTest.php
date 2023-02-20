<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostsGetControllerTest extends WebTestCase
{
    public function testShouldResponseSuccessful(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/posts');
        $this->assertResponseIsSuccessful();          
    }
}
