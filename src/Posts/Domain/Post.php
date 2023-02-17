<?php 
declare(strict_types=1);

namespace App\Posts\Domain;

use App\Posts\Domain\ValueObject\PostBody;
use App\Posts\Domain\ValueObject\PostId;
use App\Posts\Domain\ValueObject\PostTitle;
use App\Shared\Domain\ValueObject\AuthorId;

final class Post {

    private PostId $id;
    private PostTitle $title;
    private PostBody $body;    
    private AuthorId $authorId;

    public function __construct(PostId $PostId, PostTitle $postTitle, PostBody $postBody,AuthorId $authorId )
    {
        $this->id = $PostId;
        $this->title = $postTitle;
        $this->body = $postBody;
        $this->authorId = $authorId;
    }

    public function id() : PostId 
    {
        return $this->id;
    }

    public function title(): PostTitle
    {
        return $this->title;
    }

    public function body(): PostBody
    {
        return $this->body;
    }

    public function authorId(): AuthorId
    {
        return $this->authorId;
    }

    public function toArray()
    {
        return [
            'id' => $this->id->value(),
            'title' => $this->title->value(),
            'body' => $this->body->value(),
            'author_id' => $this->authorId()->value()
        ];

    }


    
    
}