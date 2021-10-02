<?php

declare(strict_types=1);

namespace NaokiTsuchiya\LaravelBEAR;

use Ray\Di\InjectorInterface;

final class Injector
{
    public function __construct(private InjectorInterface $injector)
    {
    }

    public function __invoke(string $classString): mixed
    {
        return $this->injector->getInstance(interface: $classString);
    }
}
