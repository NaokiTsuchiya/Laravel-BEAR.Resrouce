<?php

declare(strict_types=1);

namespace NaokiTsuchiya\LaravelBEAR;

use BEAR\Resource\ResourceInterface;
use Illuminate\Support\ServiceProvider;
use Ray\Compiler\ScriptInjector;
use Ray\Compiler\ScriptinjectorModule;
use Ray\Di\AbstractModule;
use Ray\Di\InjectorInterface;

class InjectorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $scriptDir = storage_path('tmp');
        $this->app->singleton(
            abstract: InjectorInterface::class,
            concrete: static function () use ($scriptDir): InjectorInterface {
               return new Scriptinjector(
                   scriptDir: $scriptDir,
                   lazyModule: static function () use ($scriptDir): AbstractModule {
                       return new ScriptinjectorModule(
                           scriptDir: $scriptDir,
                           module: new AppModule()
                       );
                   }
               );
            }
        );

        $this->app->instance(
            abstract: ResourceInterface::class,
            instance: $this->app->call(
                callback: Injector::class,
                parameters: ['classString' => ResourceInterface::class]
            )
        );
    }
}
