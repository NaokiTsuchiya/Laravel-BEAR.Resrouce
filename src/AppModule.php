<?php

declare(strict_types=1);

namespace NaokiTsuchiya\LaravelBEAR;

use BEAR\Resource\Module\HalModule;
use BEAR\Resource\Module\ResourceModule;
use Ray\Di\AbstractModule;

class AppModule extends AbstractModule
{
    protected function configure()
    {
        $this->install(new ResourceModule('NaokiTsuchiya\LaravelBEAR'));
        $this->install(new HalModule());
    }
}
