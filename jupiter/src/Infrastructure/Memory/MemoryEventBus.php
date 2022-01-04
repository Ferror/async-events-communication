<?php
declare(strict_types=1);

namespace App\Infrastructure\Memory;

use App\Application\EventBus;
use App\Domain\Event;

class MemoryEventBus implements EventBus
{
    private array $memory = [];

    public function propagate(Event $event): void
    {
        $this->memory[] = $event;
    }
}
