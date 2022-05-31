<?php
declare(strict_types=1);

namespace App\Domain;

class Repository
{
    public function __construct(
        private array $entities = [],
    )
    {
    }

    public function find(string $identifier): Entity
    {
        return $this->entities[$identifier];
    }
}
