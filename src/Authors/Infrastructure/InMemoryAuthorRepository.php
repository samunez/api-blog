<?php 
declare(strict_types=1);

namespace App\Authors\Infrastructure;

use App\Authors\Domain\Author;
use App\Authors\Domain\AuthorRepository;
use App\Authors\Domain\ValueObject\AuthorName;
use App\Shared\Domain\ValueObject\AuthorId;

final class InMemoryAuthorRepository implements AuthorRepository
{

    private $authors = [];

    public function __construct()
    {
        $this->authors[] = new Author(
            new AuthorId('b86d9c16-dce8-4b57-be04-383532385b87'),
            new AuthorName('Pedro Ramirez')
        );
        $this->authors[] = new Author(
            new AuthorId('74e3f6a8-c2ac-4d11-bd07-8e9ff4ca6780'),
            new AuthorName('Maria Gomez')
        );
    }

    public function findById(AuthorId $id): ?Author
    {        
        foreach($this->authors as $author){            
            if($author->id()->value() === $id->value()){                
                return $author;
            }
        }
        return null;
    }
}