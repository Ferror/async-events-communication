<?php
declare(strict_types=1);

namespace App\Domain;

/**
 * operacje nie będące częścią encji ani wartości
 * bezstanowe wyliczenia
 */
class Service
{
    public function calculate(int $beginning): int
    {
        return $beginning * 2;
    }
}
