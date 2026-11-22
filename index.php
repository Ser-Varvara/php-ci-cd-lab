<?php

use Faker\Factory;

require_once 'vendor/autoload.php';

$faker = Factory::create();

$years = [];

for ($i = 0; $i < 10; $i++) {
    $years[] = $faker->numberBetween(1990, 2025);
}

$minYear = 2010;

$filtered = array_filter($years, function ($year) use ($minYear) {
    return $year > $minYear;
});

echo '<h2>All publication years</h2>';
echo implode(', ', $years);

echo '<h2>Books published after 2010</h2>';
echo implode(', ', $filtered);

require_once 'app/Services/EntityService.php';

echo '<h2>Exception handling</h2>';

try {
    echo applyDiscount(1000, 150);
} catch (Exception $e) {
    echo 'Error: '.$e->getMessage();
} finally {
    echo '<p>Calculation completed.</p>';
}

require_once 'app/Services/DataProcessor.php';

echo '<h2>Individual tasks - Variant 13</h2>';

$numbers = [1, 2, 3, 4, 5];
echo '<p>Sum: '.sumNumbers($numbers).'</p>';

$text = 'elephant apple tiger rabbit';
echo '<p>Matching words: '.implode(', ', findMatchingWords($text)).'</p>';

echo '<p>Shuffled words: '.shuffleWords($text).'</p>';
