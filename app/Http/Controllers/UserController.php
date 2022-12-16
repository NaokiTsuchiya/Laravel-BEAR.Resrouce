<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use BEAR\Resource\ResourceInterface;
use Illuminate\Http\Response;
use Ray\RayDiForLaravel\Attribute\Injectable;

#[Injectable]
class UserController extends Controller
{
    public function __construct(private ResourceInterface $resource)
    {
    }

    public function __invoke(string $id): Response
    {
        $user = $this->resource->get('page://self/user/item', ['id' => (int) $id]);

        return new Response((string) $user, $user->code, $user->headers);
    }
}
