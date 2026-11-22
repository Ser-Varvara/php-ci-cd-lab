<?php

$categories = ['Science', 'History', 'Fantasy', 'Biography', 'Technology'];
sort($categories);

$book = [
    'id' => 1,
    'title' => 'Harry Potter',
    'author' => 'J. K. Rowling',
    'year' => 1997,
    'isbn' => '9780747532699',
];

echo '<h2>Book categories</h2>';
echo '<ul>';

foreach ($categories as $category) {
    echo "<li>$category</li>";
}

echo '</ul>';

echo '<h2>Book information</h2>';
echo '<ul>';

foreach ($book as $key => $value) {
    echo "<li>$key: $value</li>";
}

echo '</ul>';
