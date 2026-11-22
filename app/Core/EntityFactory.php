<?php

declare(strict_types=1);

namespace App\Core;

use App\Models\AbstractEntity;
use App\Models\Book;
use App\Models\Reader;

class EntityFactory
{
    public static function createEntity(string $type, array $data): AbstractEntity
    {
        return match ($type) {
            'book' => new Book($data['id'], $data['createdAt'], $data['title']),
            'reader' => new Reader($data['id'], $data['createdAt'], $data['name']),
            default => throw new \InvalidArgumentException('Unknown entity type'),
        };
    }
}
