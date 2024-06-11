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

echo "<pre>";

$books = json_decode($jsonData, true);

$sortedBooks = [];
foreach ($books as $book) {
    $category = $book['category'];
    $sortedBooks[$category][] = $book;
}

echo "<table border='1'>
        <tr>
            <th>Category</th>
            <th>Title</th>
            <th>Author</th>
            <th>Publication Year</th>
        </tr>";

foreach ($sortedBooks as $category => $booksInCategory) {
    echo "<tr>
            <td colspan='4' align='center'><strong>$category</strong></td>
          </tr>";

    foreach ($booksInCategory as $book) {
        echo "<tr>
                <td></td>
                <td>{$book['title']}</td>
                <td>{$book['author']}</td>
                <td>{$book['publication_year']}</td>
              </tr>";
    }
}

echo "</table>";
