<?php 

declare(strict_types=1);

namespace App\Authors\Domain;

use App\Shared\Domain\Collection\ObjectCollection;

final class AuthorCollection extends ObjectCollection
{
    protected function className(): string
    {
        return Author::class;
    }
    
}