<?php 
declare(strict_types=1);

namespace App\Posts\Application\Find;

use App\Authors\Application\AuthorFinder;
use App\Posts\Application\Response\PostCollectionResponse;
use App\Posts\Domain\PostRepository;

final class FindAllPosts{
    private $postRepository;
    private $authorFinder;

    public function __construct(PostRepository $postRepository,AuthorFinder $authorFinder)
    {
        $this->postRepository = $postRepository;
        $this->authorFinder = $authorFinder;
    }

    public function findAll() : PostCollectionResponse {
        $postCollection = $this->postRepository->all();        
        return new PostCollectionResponse($postCollection,$this->authorFinder);
    }

    
}
