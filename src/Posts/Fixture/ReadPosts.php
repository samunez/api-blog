<?php
declare(strict_types=1);

namespace App\Posts\Fixture;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class ReadPosts
{
    private $client;    

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function fetchPostsByLength(int $length): array
    {
        $response = $this->client->request(
            'GET',
            'https://jsonplaceholder.typicode.com/posts'
        );

        $statusCode = $response->getStatusCode();        
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();        
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]
        return array_slice($content,0,$length);
    }
}
