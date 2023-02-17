<?php 
declare(strict_types=1);

namespace App\Authors\Application;

use App\Authors\Domain\AuthorRepository;
use App\Shared\Domain\InvalidAuthorException;
use App\Shared\Domain\ValueObject\AuthorId;

final class AuthorFinder
{   
    private $authorRepository; 
    public function __construct(AuthorRepository $authorRepository)
    {   
        $this->authorRepository = $authorRepository;
    }

    public function __invoke(AuthorId $id)
    {
        $author = $this->authorRepository->findById($id);        
        if (empty($author)){
            throw new InvalidAuthorException($id);
        }
        return $author;
    }
}




