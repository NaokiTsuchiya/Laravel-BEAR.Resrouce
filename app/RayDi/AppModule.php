<?php

declare(strict_types=1);

namespace App\RayDi;

use BEAR\Resource\ImportApp;
use BEAR\Resource\Module\HalModule;
use BEAR\Resource\Module\ImportAppModule;
use BEAR\Resource\Module\ResourceModule;
use Ray\Di\AbstractModule;

final class AppModule extends AbstractModule
{
    protected function configure(): void
    {
        $this->install(new ImportAppModule([new ImportApp('user', 'NaokiTsuchiya\LaravelBEAR\User', 'app')]));
        $this->install(new HalModule(new ResourceModule('App')));
    }
}
