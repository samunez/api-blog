<?php 
declare(strict_types=1);

namespace App\Shared\Domain;

use App\Shared\Domain\ValueObject\AuthorId;

final class InvalidAuthorException extends \Exception
{
    public function __construct(AuthorId $authorId)
    {
        parent::__construct(
            sprintf('Author <%s> not found',$authorId->value()),404
        );
        
    }
    
}
