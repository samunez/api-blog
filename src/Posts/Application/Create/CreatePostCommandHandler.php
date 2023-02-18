<?php 
declare(strict_types=1);

namespace App\Posts\Application\Create;


use App\Posts\Application\Response\PostResponse;
use App\Posts\Domain\ValueObject\PostBody;
use App\Posts\Domain\ValueObject\PostId;
use App\Posts\Domain\ValueObject\PostTitle;
use App\Shared\Domain\ValueObject\AuthorId;
use App\Shared\Domain\ValueObject\UuidValueObject;

final class CreatePostCommandHandler
{
    public function __construct(private readonly PostCreator $postCreator)
    {
        
    }

    public function __invoke(CreatePostCommand $command): PostResponse
    {        
        $id = new PostId(UuidValueObject::generate());
        $title = new PostTitle($command->title());
        $body = new PostBody($command->body());
        $authorId = new AuthorId($command->authorId());
        return ($this->postCreator)($id,$title,$body,$authorId);
        
    }
    
}
