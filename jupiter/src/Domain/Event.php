<?php
declare(strict_types=1);

namespace App\Domain;

class Event
{
    public function __construct(
        private string $name,
    )
    {
    }

    public function toArray(): array
    {
        return ['name' => $this->name];
    }
}
