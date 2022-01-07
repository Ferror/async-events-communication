<?php
declare(strict_types=1);

namespace App\Presentation\Web;

use App\Application\EventBus;
use App\Domain\Aggregate;
use App\Domain\Repository;
use App\Domain\Service;
use App\Domain\ValueObject;
use Symfony\Component\HttpFoundation\Response;

class Action
{
    public function __construct(
        private Repository $repository,
        private EventBus $eventBus,
    )
    {
    }

    public function __invoke(): Response
    {
        $aggregate = new Aggregate(
            new ValueObject(1),
            $this->repository->find('identifier'),
            new Service(),
        );
        $events = $aggregate->execute();

        foreach ($events as $event) {
            $this->eventBus->propagate($event);
        }

        return new Response();
    }
}
