<?php
declare(strict_types=1);

namespace App\Domain;

class Event
{
    public static function fromArray(array $data): Event
    {
        return new self ($data['name']);
    }

    public function __construct(
        private string $name,
    )
    {
    }

    public function is(string $name)
    {
        return $this->name === $name;
    }

    public function toArray(): array
    {
        return ['name' => $this->name];
    }
}
