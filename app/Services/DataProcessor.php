<?php

declare(strict_types=1);

// Таблиця 3.2, задача 6
function sumNumbers(array $numbers): int
{
    $sum = 0;

    foreach ($numbers as $number) {
        if ($number > 0) {
            $sum += $number;
        }
    }

    return $sum;
}

// Таблиця 3.3, задача 7
function findMatchingWords(string $text): array
{
    $words = explode(' ', $text);
    $result = [];

    for ($i = 0; $i < count($words) - 1; $i++) {
        if (strtolower($words[$i][0]) === strtolower(substr($words[$i + 1], -1))) {
            $result[] = $words[$i];
        }
    }

    return $result;
}

// Таблиця 3.4, задача 3
function shuffleWords(string $text): string
{
    $words = explode(' ', $text);
    shuffle($words);

    return implode(' ', $words);
}
