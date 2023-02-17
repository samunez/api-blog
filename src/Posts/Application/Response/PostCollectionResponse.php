<?php 
declare(strict_types=1);

namespace App\Posts\Application\Response;

use App\Posts\Domain\PostCollection;

final class PostCollectionResponse
{
    private array $posts;

    public function __construct(PostCollection $postCollection)
    {
        foreach($postCollection->getCollection() as $post){            
            $this->posts[] = new PostResponse($post);
        }        
    }

    public function posts(): array
    {
        return $this->posts;
    }

    public function toArray()
    {
        return array_map(function ($post) {
            return $post->toArray();
        }, $this->posts());
    }
}