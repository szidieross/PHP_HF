<?php

require_once "Student.php";
require_once "Subject.php";
require_once "University.php";

//ToDo
echo "<pre>";

$student1 = new Student("Annabeth", "01");
$student2 = new Student("Percy", "02");
$student3 = new Student('Charlie', '003');
$uni = new University();
// echo ($student1->getStudentNumber());
// echo ($student1->getName());
// echo "<br/>";

// $subject1=new Subject("1","Maths");
// echo($subject1->getCode());
// echo($subject1->getName());
// $subject1->setStudent($student1);
// $subject1->setStudent($student2);
// echo "<br/>";
// var_dump($subject1->getStudents());



$uni->addSubject("1", "Math");
$uni->addStudentOnSubject("1", $student1);
$uni->addStudentOnSubject("1", $student2);
echo($uni->print());
// echo "<br/>hi im percy jackson";

$university = new University();

    // Add subjects
    $subject1 = $university->addSubject('1', 'Math');
    $subject2 = $university->addSubject('2', 'Physics');

    // Add students to subjects

    // Add a student to a subject via the University class
    $newStudent = new Student('David', '004');
    $university->addStudentOnSubject('1', $newStudent);

    // Print students for a subject
    $mathStudents = $university->getStudentsForSubject('MATH101');
    echo '<h2>Math Students</h2>';
    foreach ($mathStudents as $student) {
        echo $student->getName() . ' - ' . $student->getStudentNumber() . '<br>';
    }

    // Get total number of students
    $totalStudents = $university->getNumberOfStudents();
    echo '<h2>Total Number of Students: ' . $totalStudents . '</h2>';

    // Display university information
    echo $university->print();

echo "</pre>";
