<?php 
declare(strict_types=1);

namespace App\Posts\Application\Find;

use App\Posts\Application\Response\PostCollectionResponse;
use App\Posts\Domain\PostRepository;

final class FindAllPosts{
    private $repository;
    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function findAll() : PostCollectionResponse {
        $postCollection = $this->repository->all();        
        return new PostCollectionResponse($postCollection);
    }

    
}
