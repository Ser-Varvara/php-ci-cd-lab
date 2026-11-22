<?php

declare(strict_types=1);

namespace App\Models;

class Reader extends AbstractEntity
{
    public function __construct(
        string $id,
        string $createdAt,
        private string $name
    ) {
        parent::__construct($id, $createdAt);
    }

    public function getDetails(): string
    {
        return "Reader: {$this->name}, ID: {$this->id}";
    }
}
