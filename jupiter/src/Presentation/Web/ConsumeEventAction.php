<?php
declare(strict_types=1);

namespace App\Presentation\Web;

use App\Application\EventBus;
use App\Domain\Event;
use App\Framework\DependencyInjection;
use Symfony\Component\Routing\Annotation\Route;

class ConsumeEventAction
{
    private EventBus $bus;

    public function __construct(DependencyInjection $di)
    {
        $this->bus = $di::get(EventBus::class);
    }

    #[Route(path: '/consume', methods: ['POST'])]
    public function __invoke()
    {
        $this->bus->propagate(new Event('name'));
    }
}
