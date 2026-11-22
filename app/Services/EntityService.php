<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\LoggerInterface;

function calculatePenalty(int $overdueDays, float $rate): float
{
    return $overdueDays * $rate;
}

echo '<p>Penalty: '.calculatePenalty(5, 2.5).'</p>';

function applyDiscount(float $price, float $discount): float
{
    if ($discount < 0 || $discount > 100) {
        throw new \Exception('Invalid discount!');
    }

    return $price - ($price * $discount / 100);
}

class EntityService
{
    public function __construct(
        private LoggerInterface $logger
    ) {}

    public function processBook(string $title): void
    {
        $this->logger->log("Book processed: $title");
    }
}
