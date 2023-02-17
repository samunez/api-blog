<?php 
declare(strict_types=1);

namespace App\Posts\Application\Find;

use App\Authors\Domain\AuthorRepository;
use App\Posts\Application\Response\PostCollectionResponse;
use App\Posts\Domain\PostRepository;

final class FindAllPosts{
    private $postRepository;
    private $authorRepository;

    public function __construct(PostRepository $postRepository,AuthorRepository $authorRepository)
    {
        $this->postRepository = $postRepository;
        $this->authorRepository = $authorRepository;        
    }

    public function findAll() : PostCollectionResponse {
        $postCollection = $this->postRepository->all();        
        return new PostCollectionResponse($postCollection,$this->authorRepository);
    }

    
}
