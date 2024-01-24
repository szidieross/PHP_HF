<?php

$student_json = '[
    {
        "name" : "Kis Janos",
        "age"  : "15",
        "school" : "Marton Aron"
    },
    {
        "name" : "Nagy Peter",
        "age"  : "16",
        "school" : "Tamasi"
    },
    {
        "name" : "Egy Anna",
        "age"  : "16",
        "school" : "Kos Karoly"
    }
]';

// JSON dekódolása egy asszociatív tömbbé
$students = json_decode($student_json, true);

// Táblázat kiíratása
echo "<table border='1'>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>School</th>
        </tr>";

foreach ($students as $student) {
    echo "<tr>
            <td>{$student['name']}</td>
            <td>{$student['age']}</td>
            <td>{$student['school']}</td>
          </tr>";
}

echo "</table>";
