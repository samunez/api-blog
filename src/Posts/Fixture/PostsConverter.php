<?php 

declare(strict_types=1);

namespace App\Posts\Fixture;

use App\Posts\Domain\Post;
use App\Posts\Domain\ValueObject\PostBody;
use App\Posts\Domain\ValueObject\PostId;
use App\Posts\Domain\ValueObject\PostTitle;
use App\Shared\Domain\ValueObject\UuidValueObject;

final class PostsConverter
{
    private array $posts;

    public function __construct(array $array)
    {
        foreach($array as $element){
            $post = new Post(
                new PostId(UuidValueObject::generate()),
                new PostTitle($element['title']),
                new PostBody($element['body']),                
            );            
            $this->posts[] = $post;            
        }
    }

    public function toArray(){
        return $this->posts;
    }
    
}
