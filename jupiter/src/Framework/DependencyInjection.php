<?php
declare(strict_types=1);

namespace App\Framework;

use App\Application\DecoratedEventBus;
use App\Infrastructure\Http\HttpEventBus;
use App\Infrastructure\Memory\MemoryEventBus;

class DependencyInjection
{
    private static array $services = [];

    public function __construct()
    {
        static::$services = [
            \App\Application\EventBus::class => new DecoratedEventBus(
                new MemoryEventBus(),
                new HttpEventBus(
                    new \GuzzleHttp\Client([
                        'base_uri' => 'http://mars',
                        'timeout'  => 2.0,
                    ])
                ),
                new HttpEventBus(
                    new \GuzzleHttp\Client([
                        'base_uri' => 'http://saturn',
                        'timeout'  => 2.0,
                    ])
                ),
            ),
        ];
    }

    public static function get(string $class): mixed
    {
        return static::$services[$class];
    }
}
