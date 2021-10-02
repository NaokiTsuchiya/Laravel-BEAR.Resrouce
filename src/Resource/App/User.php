<?php

declare(strict_types=1);

namespace NaokiTsuchiya\LaravelBEAR\Resource\App;

use BEAR\Resource\ResourceObject;

class User extends ResourceObject
{
    /** @var array<array{name: string}>  */
    private array $user = [['name' => 'test']];

    public function onGet(int $id): static
    {
        $this->body = $this->user[0];
        $this->body['_links'] = [
            'self' => ['href' => route('goUser', ['id' => $id], false)] // Fixme: remove laravel helper
        ];

        return $this;
    }
}
