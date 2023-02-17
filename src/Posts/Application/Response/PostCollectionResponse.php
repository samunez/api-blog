<?php 
declare(strict_types=1);

namespace App\Posts\Application\Response;

use App\Authors\Domain\Author;
use App\Authors\Domain\AuthorRepository;
use App\Authors\Domain\ValueObject\AuthorName;
use App\Posts\Domain\PostCollection;
use App\Shared\Domain\ValueObject\AuthorId;

final class PostCollectionResponse
{
    private array $posts;

    public function __construct(PostCollection $postCollection,AuthorRepository $authorRepository)
    {
        
        foreach($postCollection->getCollection() as $post){            
            $author = $authorRepository->findById($post->authorId());
            $this->posts[] = new PostResponse($post,$author);
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