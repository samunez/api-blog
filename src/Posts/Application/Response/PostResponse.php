<?php 
declare(strict_types=1);

namespace App\Posts\Application\Response;

use App\Posts\Domain\Post;

final class PostResponse
{
    private string $id;
    private string $title;
    private string $body;

    public function __construct(Post $post)
    {
        $this->id = $post->id()->value();
        $this->title = $post->title()->value();
        $this->body = $post->body()->value();
    }
    
    

    
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

    public function toArray(): array
    {
        return [
            'id' => $this->id(),
            'title' => $this->title(),
            'body' => $this->body()
        ];
    }
}
