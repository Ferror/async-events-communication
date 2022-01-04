<?php
declare(strict_types=1);

namespace App\Infrastructure\Http;

class HttpEventBus implements \App\Application\EventBus
{
    public function __construct(
        private \GuzzleHttp\Client $client,
    )
    {
    }

    public function propagate(\App\Domain\Event $event): void
    {
        $this->client->requestAsync('POST', '/events', ['json' => $event->toArray()]);
    }
}
