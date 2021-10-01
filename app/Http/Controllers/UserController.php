<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use BEAR\Resource\ResourceInterface;
use Illuminate\Http\Response;
use NaokiTsuchiya\LaravelBEAR\AppModule;
use Ray\Di\Injector;

class UserController extends Controller
{
    private ResourceInterface $resource;

    public function __construct()
    {
        $injector = new Injector(new AppModule(), storage_path('tmp'));
        $resource = $injector->getInstance(ResourceInterface::class);
        assert($resource instanceof ResourceInterface);
        $this->resource = $resource;
    }

    public function __invoke(string $id): Response
    {
        $user = $this->resource->get('app://self/user', ['id' => (int) $id]);

        return new Response((string) $user, $user->code, $user->headers);
    }
}
