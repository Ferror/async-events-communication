<?php
declare(strict_types=1);

namespace App\Presentation\Web;

use App\Application\EventConsumer\MarsEventHandler;
use App\Application\EventConsumer\SaturnEventHandler;
use App\Domain\Event;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConsumeEventAction
{
    public function __construct(
        private LoggerInterface $logger,
    )
    {
    }

    #[Route(path: '/consume', methods: ['POST'])]
    public function __invoke(Request $request): Response
    {
        $body = json_decode($request->getContent(false), true, 512, JSON_THROW_ON_ERROR);
        $event = Event::fromArray($body);
        $this->logger->info('received event: ' . implode(', ', $event->toArray()));

        if ($event->is('mars-event')) {
            (new MarsEventHandler($this->logger))($event);
        }

        if ($event->is('saturn-event')) {
            (new SaturnEventHandler($this->logger))($event);
        }

        return new Response('', 200);
    }
}
