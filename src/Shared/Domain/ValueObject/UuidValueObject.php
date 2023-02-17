<?php 
declare(strict_types=1);

namespace App\Shared\Domain\ValueObject;


use Ramsey\Uuid\Uuid;

class UuidValueObject
{
    protected string $id;

    public function __construct(string $id)
    {
        if (! $this->isValid($id)){
            throw new \InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', static::class, $id));
        }        

        $this->id = $id;
    }

    public static function generate(): string
    {
        return Uuid::uuid4()->toString();
    }

    public function value(): string
    {
        return $this->id;
    }

    private function isValid(string $id): bool
    {
        return Uuid::isValid($id);
    }

    public function __toString(): string
    {
        return $this->value();
    }
}