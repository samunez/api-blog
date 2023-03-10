<?php

declare(strict_types=1);

namespace App\Posts\Application\Create;

final class CreatePostCommand
{
    public function __construct(        
        private readonly string $title,
        private readonly string $body,
        private readonly string $authorId
    ) {
    }

    
    
    public function authorId(): string
    {
        return $this->authorId;
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
