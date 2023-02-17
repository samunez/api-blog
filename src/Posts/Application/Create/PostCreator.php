<?php 

declare(strict_types=1);

namespace App\Posts\Application\Create;

use App\Posts\Application\Response\PostResponse;
use App\Posts\Domain\Post;
use App\Posts\Domain\PostRepository;
use App\Posts\Domain\ValueObject\PostBody;
use App\Posts\Domain\ValueObject\PostId;
use App\Posts\Domain\ValueObject\PostTitle;

final class PostCreator {

    
    public function __construct(private readonly PostRepository $postRepository)
    {        
        
        
    }

    public function __invoke(PostId $id, PostTitle $title, PostBody $body) : PostResponse
    {
        $post = new Post($id,$title,$body);
        $this->postRepository->save($post);
        return new PostResponse($post);
    }

}