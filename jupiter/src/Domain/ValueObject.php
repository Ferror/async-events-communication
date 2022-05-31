<?php
declare(strict_types=1);

namespace App\Domain;

/**
 * nie zmieniają się w czasie
 * wartość jest ich tożsamością
 * opisują, się atrybutami
 */
class ValueObject
{
    public function __construct(
        private int $value,
    )
    {
    }

    public function toInteger(): int
    {
        return $this->value;
    }
}
