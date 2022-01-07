<?php
declare(strict_types=1);

namespace App\Domain;

/**
 * byty zmieniające się w czasie
 * posiada tożsamość niezależna od atrybutów
 * posiada cykl życia
 */
class Entity
{
    public function __construct(
        private string $identifier,
        private int $counter,
    )
    {
    }

    public function increment(): void
    {
        $this->counter++;
    }

    public function getCounter(): int
    {
        return $this->counter;
    }
}
