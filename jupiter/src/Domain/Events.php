<?php
declare(strict_types=1);

namespace App\Domain;

use Countable;

class Events implements Countable
{
    public function __construct(
        private array $events = [],
    )
    {
    }

    public function add(Event $event): void
    {
        $this->events[] = $event;
    }

    public function clear(): void
    {
        $this->events = [];
    }

    public function getEvents(): array
    {
        return $this->events;
    }

    public function count(): int
    {
        return count($this->events);
    }
}
