<?php

$json = '{
    "book": {
        "name": "Harry Potter and the Goblet of Fire",
        "author": "J. K. Rowling",
        "year": 2000,
        "characters": ["Harry Potter", "Hermione Granger", "Ron Weasley"],
        "genre": "Fantasy Fiction",
        "price": {
            "paperback": "$10.40", "hardcover": "$20.32", "kindle": "4.11"
        }
    }
}';

// JSON dekódolása egy asszociatív tömbbé
$data = json_decode($json, true);

// Különböző elemek kiíratása
echo "<br/>Könyv címe: " . $data['book']['name'] . PHP_EOL;
echo "<br/>Szerző: " . $data['book']['author'] . PHP_EOL;
echo "<br/>Megjelenés éve: " . $data['book']['year'] . PHP_EOL;

echo "<br/>Karakterek: " . implode(", ", $data['book']['characters']) . PHP_EOL;

echo "<br/>Műfaj: " . $data['book']['genre'] . PHP_EOL;

echo "<br/>Árak:" . PHP_EOL;
echo "<br/>  Paperback: " . $data['book']['price']['paperback'] . PHP_EOL;
echo "<br/>  Hardcover: " . $data['book']['price']['hardcover'] . PHP_EOL;
echo "<br/>  Kindle: " . $data['book']['price']['kindle'] . PHP_EOL;
