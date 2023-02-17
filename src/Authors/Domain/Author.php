<?php 
declare(strict_types=1);

namespace App\Authors\Domain;

use App\Shared\Domain\ValueObject\AuthorId;
use App\Authors\Domain\ValueObject\AuthorName; 

final class Author
{
    private AuthorId $id;
    private AuthorName $name;

    public function __construct(AuthorId $id,AuthorName $name)
    {
        $this->id = $id;
        $this->name = $name;        
    }
    
    public function name(): AuthorName
    {
        return $this->name;
    }

    
    public function id(): AuthorId
    {
        return $this->id;
    }
}