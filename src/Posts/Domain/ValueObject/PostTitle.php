<?php 
declare(strict_types=1);

namespace App\Posts\Domain\ValueObject;

use App\Shared\Domain\ValueObject\StringValueObject;

final class PostTitle extends StringValueObject
{
    public function __construct(protected string $value)
    {
       if (empty($value)){
        throw new \InvalidArgumentException("Error Processing Request", 1);        
       }
    }
}
