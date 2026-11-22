<?php

use App\Core\Database;
use App\Core\EntityFactory;
use App\Services\ConsoleLogger;
use App\Services\EntityService;
use App\Tasks\Car;
use App\Tasks\ExpressTrain;
use App\Tasks\Group;
use App\Tasks\Rectangle;
use App\Tasks\Student;
use App\Tasks\Train;
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
    echo \App\Services\applyDiscount(1000, 150);
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

echo '<h2>PHP OOP - Lab 4</h2>';

// Singleton
$db1 = Database::getInstance();
$db2 = Database::getInstance();

echo '<p>Same database instance: ';
echo $db1 === $db2 ? 'Yes' : 'No';
echo '</p>';

// Factory
$book = EntityFactory::createEntity('book', [
    'id' => '1',
    'createdAt' => '2026-11-22',
    'title' => 'Harry Potter',
]);

$reader = EntityFactory::createEntity('reader', [
    'id' => '2',
    'createdAt' => '2026-11-22',
    'name' => 'Anna',
]);

echo '<p>'.$book->getDetails().'</p>';
echo '<p>'.$reader->getDetails().'</p>';

// Trait and interface
echo '<p>JSON: '.$book->exportToJson().'</p>';

// Dependency Injection
$logger = new ConsoleLogger;
$service = new EntityService($logger);

echo '<p>';
$service->processBook('Harry Potter');
echo '</p>';

echo '<h2>Variant 13 - Student and Group</h2>';

$group = new Group(1, 'KN-42');

$student1 = new Student(1, 'Anna', 'Ivanenko', '2004-05-12');
$student2 = new Student(2, 'Oleh', 'Petrenko', '2003-08-20');

$group->addStudent($student1);
$group->addStudent($student2);

$found = $group->searchStudent(1);

echo '<p>Found student: '.$found->name.' '.$found->surname.'</p>';

$group->removeStudent(1);

echo '<p>After removal: ';
echo $group->searchStudent(1) === null ? 'Student not found' : 'Student found';
echo '</p>';

echo '<h2>Variant 13 - Vehicles</h2>';

$car = new Car(60);
$train = new Train(100);
$express = new ExpressTrain(200);

$distance = 300;

echo '<p>Car: '.$car->calculateTravelTime($distance).' hours</p>';
echo '<p>Train: '.$train->calculateTravelTime($distance).' hours</p>';
echo '<p>Express train: '.$express->calculateTravelTime($distance).' hours</p>';

echo '<h2>Variant 13 - Rectangle</h2>';

$rectangle = new Rectangle(5, 3);

echo '<p>Area: '.$rectangle->calculateArea().'</p>';
echo '<p>Perimeter: '.$rectangle->calculatePerimeter().'</p>';
