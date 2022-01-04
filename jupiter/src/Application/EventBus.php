<?php
declare(strict_types=1);

namespace App\Application;

use App\Domain\Event;

interface EventBus
{
    public function propagate(Event $event): void;
}
