<?php

declare(strict_types=1);

namespace App\Posts\Application\Create;

final class CreatePostCommand
{
    public function __construct(
        private readonly string $id,
        private readonly string $title,
        private readonly string $body,
        //private readonly int $authorId
    ) {
    }

    
    /*
    public function authorId(): int
    {
        return $this->authorId;
    }
    */

    
    public function id(): string
    {
        return $this->id;
    }
    
    public function title(): string
    {
        return $this->title;
    }
    
    public function body(): string
    {
        return $this->body;
    }
}
