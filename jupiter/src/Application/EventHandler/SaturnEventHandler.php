<?php
declare(strict_types=1);

namespace App\Application\EventConsumer;

use App\Domain\Event;
use Psr\Log\LoggerInterface;

class SaturnEventHandler
{
    public function __construct(
        private LoggerInterface $logger,
    )
    {
    }

    public function __invoke(Event $event): void
    {
        $this->logger->info('consumed event: ' . implode(', ', $event->toArray()));
    }
}
