<?php 

declare(strict_types=1);

namespace App\Posts\Domain;

use App\Shared\Domain\Collection\ObjectCollection;

final class PostCollection extends ObjectCollection
{
    protected function className(): string
    {
        return Post::class;
    }
    
}

