<?php 
declare(strict_types=1);

namespace App\Shared\Domain\Collection;

class InvalidObjectCollectionException extends \Exception
{
    public function __construct(Object $actual, string $expected)
    {
        parent::__construct(
            sprintf('"%s" is not a valid object for collection. Expected "%s"', get_class($actual), $expected)
        );
    }
}