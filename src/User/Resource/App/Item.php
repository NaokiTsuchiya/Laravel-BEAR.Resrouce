<?php

declare(strict_types=1);

namespace NaokiTsuchiya\LaravelBEAR\User\Resource\App;

use BEAR\Resource\ResourceObject;

class Item extends ResourceObject
{
    /** @var array<array{name: string}>  */
    private array $user = [['name' => 'test']];

    public function onGet(int $id): static
    {
        $this->body = $this->user[0];

        return $this;
    }
}
