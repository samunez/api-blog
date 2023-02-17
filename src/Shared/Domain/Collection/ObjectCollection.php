<?php 
declare(strict_types=1);

namespace App\Shared\Domain\Collection;

abstract class ObjectCollection
{
    protected ?array $objects;

    public function __construct(array $objects = null)
    {
        if (!empty($objects)) {
            foreach ($objects as $object) {
                if (false === is_a($object, $this->className())) {
                    throw new InvalidObjectCollectionException($object, $this->className());
                }
            }
        }
        $this->objects = $objects;
    }

    public static function init(): self
    {
        return new static([]);
    }

    abstract protected function className(): string;

    public function getCollection(): array
    {
        return $this->objects;
    }

    public function first()
    {
        return reset($this->objects);
    }

    public function last()
    {
        return end($this->objects);
    }

    public function key()
    {
        return key($this->getCollection());
    }

    public function next()
    {
        return next($this->objects);
    }

    public function current()
    {
        return current($this->objects);
    }

    public function removeElement($element): bool
    {
        $key = array_search($element, $this->objects, true);

        if ($key === false) {
            return false;
        }

        unset($this->objects[$key]);

        return true;
    }

    public function contains($element): bool
    {
        return in_array($element, $this->objects, true);
    }

    public function get($key)
    {
        return $this->objects[$key] ?? null;
    }

    public function getKeys()
    {
        return array_keys($this->objects);
    }

    public function getValues()
    {
        return array_values($this->objects);
    }

    public function count(): int
    {
        return count($this->objects);
    }

    public function set($key, $value): void
    {
        $this->objects[$key] = $value;
    }

    public function add($element): void
    {
        $this->objects[] = $element;
    }

    public function isEmpty(): bool
    {
        return empty($this->objects);
    }

    public function clear(): void
    {
        $this->objects = [];
    }

    public function applyReverse()
    {
        $this->objects = array_reverse($this->getCollection());
    }

    public function reverse(): array
    {
        return array_reverse($this->objects);
    }
}