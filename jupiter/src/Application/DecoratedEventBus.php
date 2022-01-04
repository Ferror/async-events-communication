<?php
declare(strict_types=1);

namespace App\Application;

class DecoratedEventBus implements \App\Application\EventBus
{
    /**
     * @var \App\Application\EventBus[]
     */
    private array $buses;

    public function __construct(
        \App\Application\EventBus... $buses,
    )
    {
        $this->buses = $buses;
    }

    public function propagate(\App\Domain\Event $event): void
    {
        foreach ($this->buses as $bus) {
            $bus->propagate($event);
        }
    }
}
