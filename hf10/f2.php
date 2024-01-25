<?php

$jsonData = '[
    {
        "title": "The Catcher in the Rye",
        "author": "J.D. Salinger",
        "publication_year": 1951,
        "category": "Fiction"
    },
    {
        "title": "To Kill a Mockingbird",
        "author": "Harper Lee",
        "publication_year": 1960,
        "category": "Fiction"
    },
    {
        "title": "1984",
        "author": "George Orwell",
        "publication_year": 1949,
        "category": "Dystopian"
    },
    {
        "title": "The Great Gatsby",
        "author": "F. Scott Fitzgerald",
        "publication_year": 1925,
        "category": "Fiction"
    },
    {
        "title": "Brave New World",
        "author": "Aldous Huxley",
        "publication_year": 1932,
        "category": "Dystopian"
    }
]';

$books = json_decode($jsonData, true);

$sortedBooks = [];
foreach ($books as $book) {
    $category = $book['category'];
    $sortedBooks[$category][] = $book;
}

echo '<table border="1">';
echo '<tr><th>Kategória</th><th>Cím</th><th>Szerző</th><th>Kiadás Éve</th></tr>';

foreach ($sortedBooks as $category => $categoryBooks) {
    echo "<tr><td colspan='4'><b>{$category}</b></td></tr>";

    foreach ($categoryBooks as $book) {
        echo "<tr><td></td><td>{$book['title']}</td><td>{$book['author']}</td><td>{$book['publication_year']}</td></tr>";
    }
}

echo '</table>';