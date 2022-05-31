<?php
declare(strict_types=1);

namespace App\Domain;

/**
 * kolekcje obiektów domenowych, które traktowane są jako spójna całość i granica transakcji
 * sprawdzają niezmienniki systemu
 * komunikacja z agregatem możliwa tylko przez obiekt, który jest korzeniem (ang. Aggregate Root)
 *
 * agregaty nie mają referencji do innych agregatów
 * modyfikujemy jeden agregat w transakcji
 * są jednostkami persystencji (zapisywane w całości)
 */
class Aggregate
{
    public function __construct(
        private ValueObject $valueObject,
        private Entity $entity,
        private Service $service,
    )
    {
    }

    public function execute(): Events
    {
        $events = new Events();

        $this->entity->increment();
        $events->add(new Event('Incremented entity value', ['value' => $this->entity->getCounter()]));

        $value = $this->service->calculate($this->valueObject->toInteger());
        $events->add(new Event('Calculated service value', ['value' => $value]));

        return $events;
    }
}
