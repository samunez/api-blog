<?php 

declare(strict_types=1);

namespace App\Posts\Application\Create;

use App\Authors\Application\AuthorFinder;
use App\Posts\Application\Response\PostResponse;
use App\Posts\Domain\Post;
use App\Posts\Domain\PostRepository;
use App\Posts\Domain\ValueObject\PostBody;
use App\Posts\Domain\ValueObject\PostId;
use App\Posts\Domain\ValueObject\PostTitle;
use App\Shared\Domain\ValueObject\AuthorId;

final class PostCreator {

    
    public function __construct(
        private readonly PostRepository $postRepository,
        private readonly AuthorFinder $authorFinder,
    ){
        
    }

    public function __invoke(PostId $id, PostTitle $title, PostBody $body,AuthorId $authorId) : PostResponse
    {
        $author = $this->authorFinder->__invoke($authorId);
        $post = new Post($id,$title,$body,$authorId);
        $this->postRepository->save($post);
        return new PostResponse($post,$author);
    }

}