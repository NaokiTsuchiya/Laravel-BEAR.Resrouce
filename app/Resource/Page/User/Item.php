<?php

declare(strict_types=1);

namespace App\Resource\Page\User;

use BEAR\Resource\ResourceInterface;
use BEAR\Resource\ResourceObject;

class Item extends ResourceObject
{
    public function __construct(private ResourceInterface $resource)
    {
    }

    public function onGet(int $id): static
    {
        $this->body = $this->resource->get('app://user/item', ['id' => $id])->body;
        $this->body['_links'] = [
            'self' => ['href' => route('goUser', ['id' => $id], false)]
        ];

        return $this;
    }
}
