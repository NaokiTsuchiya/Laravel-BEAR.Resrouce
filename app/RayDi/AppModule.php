<?php

declare(strict_types=1);

namespace App\RayDi;

use BEAR\Resource\Module\HalModule;
use BEAR\Resource\Module\ResourceModule;
use Ray\Di\AbstractModule;

final class AppModule extends AbstractModule
{
    protected function configure(): void
    {
        $this->install(new HalModule(new ResourceModule('NaokiTsuchiya\LaravelBEAR')));
    }
}
