<?php 
declare(strict_types=1);

namespace App\Posts\Domain;

use App\Posts\Domain\ValueObject\PostBody;
use App\Posts\Domain\ValueObject\PostId;
use App\Posts\Domain\ValueObject\PostTitle;

final class Post {

    private PostId $id;
    private PostTitle $title;
    private PostBody $body;    

    public function __construct(PostId $PostId, PostTitle $postTitle, PostBody $postBody )
    {
        $this->id = $PostId;
        $this->title = $postTitle;
        $this->body = $postBody;
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

    public function toArray()
    {
        return [
            'id' => $this->id->value(),
            'title' => $this->title->value(),
            'body' => $this->body->value()
        ];

    }

}