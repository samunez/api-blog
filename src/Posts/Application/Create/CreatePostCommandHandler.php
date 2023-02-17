<?php 
declare(strict_types=1);

namespace App\Posts\Application\Create;

use App\Posts\Domain\ValueObject\PostBody;
use App\Posts\Domain\ValueObject\PostId;
use App\Posts\Domain\ValueObject\PostTitle;
use App\Shared\Domain\ValueObject\UuidValueObject;

final class CreatePostCommandHandler
{
    public function __construct(private readonly PostCreator $postCreator)
    {
        
    }

    public function __invoke(CreatePostCommand $command): void
    {
        $id = new PostId(UuidValueObject::generate());
        $title = new PostTitle($command->title());
        $body = new PostBody($command->body());
        ($this->postCreator)($id,$title,$body);
        
    }
    
}
