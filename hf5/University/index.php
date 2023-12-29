<?php

require_once "Student.php";
require_once "Subject.php";
require_once "University.php";

//ToDo
echo "<pre>";

$uni = new University();

$student1 = new Student("Annabeth", "01");
$student2 = new Student("Percy", "02");
$student3 = new Student('Charlie', '003');

$uni->addSubject("1", "Math");
$uni->addSubject("2", "Physics");
$uni->addSubject("3", "Gym");
$uni->addStudentOnSubject("1", $student1);
$uni->addStudentOnSubject("1", $student2);
$uni->addStudentOnSubject("2", $student1);
$uni->addStudentOnSubject("3", $student2);
$uni->addStudentOnSubject("3", $student3);
echo($uni->print());

echo "</pre>";
